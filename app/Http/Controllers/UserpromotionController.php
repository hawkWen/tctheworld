<?php namespace App\Http\Controllers;


use App\Models\Userpromotion;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;
use Validator, Input, Redirect ; 
use Illuminate\Support\Facades\Auth;

class UserpromotionController extends Controller {

	protected $layout = "layouts.main";
	protected $data = array();	
	public $module = 'userpromotion';
	static $per_page	= '10';
	
	public function __construct() 
	{
		parent::__construct();
		$this->model = new Userpromotion();
		
		$this->info = $this->model->makeInfo( $this->module);
		$this->access = array();
	
		$this->data = array(
			'pageTitle'			=> 	$this->info['title'],
			'pageNote'			=>  $this->info['note'],
			'pageModule'		=> 'userpromotion',
			'pageUrl'			=>  url('userpromotion'),
			'return' 			=> 	self::returnUrl()	
		);		
				
	} 
	
	public function index()
	{
		if(!\Auth::check()) 
			return redirect('user/login')->with('msgstatus', 'error')->with('messagetext','You are not login');

		$this->access = $this->model->validAccess($this->info['id'] , session('gid'));
		if($this->access['is_view'] ==0) 
			return redirect('dashboard')->with('messagetext',\Lang::get('core.note_restric'))->with('msgstatus','error');
				
		$this->data['access']		= $this->access;			
		return view($this->module.'.index',$this->data);
	}
	function create( Request $request ) 
	{
		$id = 0;
		$this->hook( $request  );
		if($this->access['is_add'] ==0) 
			return redirect('dashboard')->with('message', __('core.note_restric'))->with('status','error');

		$this->data['row'] = $this->model->getColumnTable( $this->info['table']); 
		
		$this->data['id'] = '';
		$this->data['setting'] 		= $this->info['setting']; 
		return view($this->module.'.form',$this->data);
	}		
	function edit( Request $request , $id ) 
	{
		$this->hook( $request , $id );
		if(!isset($this->data['row']))
			return redirect($this->module)->with('message','Record Not Found !')->with('status','error');
		if($this->access['is_edit'] ==0 )
			return redirect('dashboard')->with('message',__('core.note_restric'))->with('status','error');

		$this->data['row'] = (array) $this->data['row'];
		
		$this->data['id'] = $id;
		return view($this->module.'.form',$this->data);
	}
	function show( Request $request , $id ) 
	{
		/* Handle import , export and view */
		$task =$id ;
		switch( $task)
		{
			case 'data':
				$this->grab( $request) ;
				return view( $this->module.'.table',$this->data);
				break;
			case 'search':
				return $this->getSearch();	
				break;
							
			case 'lookup':
				return $this->getLookup($request );
				break;				

			case 'comboselect':
				return $this->getComboselect( $request );
				break;
			case 'import':
				return $this->getImport( $request );
				break;
			case 'export':
				return $this->getExport( $request );
				break;
			default:
				$this->hook( $request , $id );
				if(!isset($this->data['row']))
					return redirect($this->module)->with('message','Record Not Found !')->with('status','error');

				if($this->access['is_detail'] ==0) 
					return redirect('dashboard')->with('message', __('core.note_restric'))->with('status','error');

				return view($this->module.'.view',$this->data);	
				break;		
		}
	}	

	function store( Request $request  )
	{
		$task = $request->input('action_task');
		switch ($task)
		{
			default:
				$rules = $this->validateForm();
				$validator = Validator::make($request->all(), $rules);
				if ($validator->passes()) 
				{
					$data = $this->validatePost( $request );
					$id = $this->model->insertRow($data , $request->input( $this->info['key']));
					
					/* Insert logs */
					$this->model->logs($request , $id);
					
					return response()->json(array(
						'status'=>'success',
						'message'=> __('core.note_success')
						));	
					
				} else {

					$message = $this->validateListError(  $validator->getMessageBag()->toArray() );
					return response()->json(array(
						'message'	=> $message,
						'status'	=> 'error'
					));	
				}
				break;
			case 'save':
				$rules = $this->validateForm();
				$validator = Validator::make($request->all(), $rules);
				$gameusername = '';
				if ($validator->passes()) 
				{
					$data = $this->validatePost( $request );
					if($request->input('id')==''){

						$userdata = \DB::table('tb_users')->where('username','=',$request->input('username'))->first();

	$balanceuser = \DB::connection('mysql2')->table('tb_users')->where('gameusername', '=', $userdata->gameusername)->first();

						if($userdata==''){
							return response()->json(['status' => 'error', 'message' => 'ไม่พบ user นี้' ]);
								exit();
						}

						$userid = $userdata->id;

						$userbalance = $balanceuser->balance;

						$user_wheel_rounds = $userdata->wheel_rounds;

						$bonususername = $userdata->gameusername;
						$gameusername = $userdata->gameusername;


						$promotions_current_user = \DB::table('promotions_current_user')->where('user_id','=',$userid)->get();

						if($promotions_current_user->count()==0){

							$promotion = \DB::table('promotions')->where('id','=',$request->input('promotion_id'))->first();

							if($promotion->get_times>0)
							{
								$promotions_history_user = \DB::table('promotions_history_users')->where([
									['user_id','=',$userid],
									['promotion_id','=',$promotion->id]
								])->get();

								if($promotions_history_user->count()>=$promotion->get_times){
									return response()->json(['status' => 'error', 'message' => 'คุณรับโปรโมชั่นเกินกำหนด' ]);
									exit();
								}
							}



							if($promotion->deposit_amount > $userbalance){
									return response()->json(['status' => 'error', 'message' => 'เงินไม่พอกรุณาเติมเครดิตก่อน' ]);
									exit();
							}


									$status = 'wait';
									if($promotion->promotion_type=='auto'){
										$status = 'confirmed';
									}else{
										$status = 'wait';
									}

									$round = 1;

									$turnover = $promotion->turnover;

									$credit_before = $userbalance;

								if($promotion->type=='fix')
								{

									$deposit_amount = $promotion->deposit_amount;
									$value = $promotion->value;

									$credit_amount = floatval($userbalance - $deposit_amount);	


									\DB::table('promotions_current_user')->insert(
									     array(
													'user_id' => $userid,
													'promotion_id' =>  $promotion->id,
													'credit_before' => $credit_before,
													'credit_after' => $value,
													'credit_amount' => $credit_amount,
													'credit_additional' => $value,
													'credit_remain' => 5,
													'lock' => 1,
													'deposit_amount' => $deposit_amount,
													'type' => $promotion->type,
													'value' => $value,
													'turnover' => $promotion->turnover,
													'relate_promotion_id' => $promotion->relate_promotion_id,
													'withdraw_amount' => $promotion->withdraw_amount,
													'note' => $promotion->note,
													'get_times' => $promotion->get_times,
													'round' => $round,
													'promotion_type' => $promotion->promotion_type,
													'status' => $status,
													'bonususername' => $bonususername,
													'game_type' => $promotion->game_type,
													'turn_type' => $promotion->turn_type

									     )
									);

									\DB::table('promotions_history_users')->insert(
									     array(
													'user_id' => $userid,
													'promotion_id' =>  $promotion->id,
													'credit_before' => $credit_before,
													'credit_after' => $value,
													'credit_amount' => $credit_amount,
													'credit_additional' => $value,
													'credit_remain' => 5,
													'lock' => 1,
													'deposit_amount' => $deposit_amount,
													'type' => $promotion->type,
													'value' => $value,
													'turnover' => $promotion->turnover,
													'relate_promotion_id' => $promotion->relate_promotion_id,
													'withdraw_amount' => $promotion->withdraw_amount,
													'note' => $promotion->note,
													'get_times' => $promotion->get_times,
													'round' => $round,
													'promotion_type' => $promotion->promotion_type,
													'status' => 'confirmed',
													'bonususername' => $bonususername,
													'game_type' => $promotion->game_type,
													'turn_type' => $promotion->turn_type
									     )
									);

									\SiteHelpers::tranHistory($userid, $credit_before, $credit_amount, $value, 'รับโปรโมชั่น '.$promotion->promotion_name.' ได้รับ'.$value.' เครดิต', 'success', $request);
									
								}else{

									$credit_amount = 0;

									$deposit_amount = $userbalance;

									$value = floatval($userbalance*$promotion->value/100);

									if($value > $promotion->max_withdraw){
										$value = $promotion->max_withdraw;
									}


									$value = $userbalance+$value;

									$turnover = $value*$turnover;

									\DB::table('promotions_current_user')->insert(
									     array(
													'user_id' => $userid,
													'promotion_id' =>  $promotion->id,
													'credit_before' => $credit_before,
													'credit_after' => $value,
													'credit_amount' => $credit_amount,
													'credit_additional' => $value,
													'credit_remain' => 5,
													'lock' => 1,
													'deposit_amount' => $deposit_amount,
													'type' => $promotion->type,
													'value' => $value,
													'turnover' => $turnover,
													'relate_promotion_id' => $promotion->relate_promotion_id,
													'withdraw_amount' => $value*$promotion->withdraw_amount,
													'note' => $promotion->note,
													'get_times' => $promotion->get_times,
													'round' => $round,
													'promotion_type' => $promotion->promotion_type,
													'status' => $status,
													'bonususername' => $bonususername,
													'game_type' => $promotion->game_type,
													'turn_type' => $promotion->turn_type

									     )
									);

									\DB::table('promotions_history_users')->insert(
									     array(
													'user_id' => $userid,
													'promotion_id' =>  $promotion->id,
													'credit_before' => $credit_before,
													'credit_after' => $value,
													'credit_amount' => $credit_amount,
													'credit_additional' => $value,
													'credit_remain' => 5,
													'lock' => 1,
													'deposit_amount' => $deposit_amount,
													'type' => $promotion->type,
													'value' => $value,
													'turnover' => $turnover,
													'relate_promotion_id' => $promotion->relate_promotion_id,
													'withdraw_amount' => $value*$promotion->withdraw_amount,
													'note' => $promotion->note,
													'get_times' => $promotion->get_times,
													'round' => $round,
													'promotion_type' => $promotion->promotion_type,
													'status' => $status,
													'bonususername' => $bonususername,
													'game_type' => $promotion->game_type,
													'turn_type' => $promotion->turn_type
									     )
									);

									\SiteHelpers::tranHistory($userid, $credit_before, $value, $value-$credit_before, 'รับโปรโมชั่น '.$promotion->promotion_name.' ได้รับ'.$value.' เครดิต', 'success', $request);

								}

									


								


										if($promotion->promotion_type=='auto'){


											
					\DB::connection('mysql2')->table('tb_users')->where('gameusername', $gameusername)->update(['bonus' => $credit_amount,'balance' => $value,'bonus_mode' => 1]);

					\DB::table('tb_users')->where('gameusername', $gameusername)->update(['bonus' => $credit_amount,'balance' => $value,'bonus_mode' => 1]);




										 	return response()->json(['status' => 'success', 'message' => 'ร่วมโปรโมชั่นสำเร็จ' ]);

										}else{

					\DB::connection('mysql2')->table('tb_users')->where('gameusername', $gameusername)->update(['bonus' => $credit_amount,'balance' => 0,'bonus_mode' => 1]);
					\DB::table('tb_users')->where('gameusername', $gameusername)->update(['bonus' => $credit_amount,'balance' => 0,'bonus_mode' => 1]);
											

											return response()->json(['status' => 'success', 'message' => 'กรุณารอการอนุมัติจากเจ้าหน้าที่' ]);
										
										}
									


							

						}else{
							return response()->json(['status' => 'error', 'message' => 'ไม่สามารถรับโปรโมชั่นซ้อนกันได้' ]);
						}

					}elseif($request->input('status')=='confirmed'){

						$promotions_current_usercheck = \DB::table('promotions_current_user')->where('id','=',$data['id'])->first();

							if($promotions_current_usercheck->status=='confirmed'){
								return response()->json(array(
									'message'	=> 'รายการนี้ยืนยันไปแล้ว',
									'status'	=> 'error'
								));	
							}else{

								$bonususername = $promotions_current_usercheck->bonususername;


\DB::connection('mysql2')->table('tb_users')->where('gameusername', $bonususername)->update(['balance' => $promotions_current_usercheck->credit_additional]);
\DB::table('tb_users')->where('gameusername', $bonususername)->update(['balance' => $promotions_current_usercheck->credit_additional]);

							}
					}
					elseif($request->input('status')=='cancel')
					{


					$promotions_current_usercheck = \DB::table('promotions_current_user')->where('user_id','=',$request->input('user_id'))->first();
						
					$bonususername = $promotions_current_usercheck->bonususername;

\DB::table('promotions_current_user')->where('user_id', '=', $request->input('user_id'))->delete();
\DB::connection('mysql2')->table('tb_users')->where('gameusername', $bonususername)->update(['balance' => 0,'bonus_mode' => 0]);
\DB::table('tb_users')->where('user_id', $request->input('user_id'))->update(['balance' => 0,'bonus_mode' => 0]);

					}

					$id = $this->model->insertRow($data , $request->input( $this->info['key']));
					
					/* Insert logs */
					$this->model->logs($request , $id);
					
					return response()->json(array(
						'status'=>'success',
						'message'=> __('core.note_success')
						));	
					
				} else {

					$message = $this->validateListError(  $validator->getMessageBag()->toArray() );
					return response()->json(array(
						'message'	=> $message,
						'status'	=> 'error'
					));	
				}
				break;
			case 'delete':
				$result = $this->destroy( $request );
				return response()->json($result);
				break;

			case 'import':
				return $this->PostImport( $request );
				break;

			case 'copy':
				$result = $this->copy( $request );
				return response()->json($result);
				break;		
		}	
	
	}	


	public function destroy( $request)
	{
		// Make Sure users Logged 
		if(!\Auth::check()) 
			return redirect('user/login')->with('status', 'error')->with('message','You are not login');

		$this->access = $this->model->validAccess($this->info['id'] , session('gid'));
		if($this->access['is_remove'] ==0) 
			return redirect('dashboard')
				->with('message', __('core.note_restric'))->with('status','error');
		// delete multipe rows 
		if(count($request->input('ids')) >=1)
		{
			$this->model->destroy($request->input('ids'));
		//	
			\SiteHelpers::auditTrail( $request , "ID : ".implode(",",$request->input('ids'))."  , Has Been Removed Successfull");
			// redirect
        	return ['message'=>__('core.note_success_delete'),'status'=>'success'];	
	
		} else {
			return ['message'=>__('No Item Deleted'),'status'=>'error'];				
		}

	}	

	function postAddpromotion( Request $request ) 
	{
	

				$userid = \Auth::user()->id;

				$gameusername = \Auth::user()->gameusername;

				$balanceuser = \DB::connection('mysql2')->table('tb_users')->where('gameusername', '=', $gameusername)->first();

				$userbalance = $balanceuser->balance;

				$user_wheel_rounds = \Auth::user()->wheel_rounds;

				$bonususername = \Auth::user()->gameusername;

				/*$pglackspin = \DB::select("SELECT DISTINCT (select g.name from gamelists g where  g.partner = 'pg' and g.gameid =p.game_id) as game ,
								IFNULL((select IFNULL(p2.is_end_round,0) from pgbetpayout p2 where p2.parent_bet_id = p.parent_bet_id 
								and p2.transactiontype = 'PAYOUT' and p2.is_end_round = 1),0) as endr 
								from pgbetpayout p where p.transactiontype = 'PAYOUT' and p.is_feature = 1 and p.is_end_round = 0 and p.user_id = ".$userid);

	
				if(!empty($pglackspin)){
					$lackgame = '';
					foreach ($pglackspin as $value) {
						if($value->endr==0){
							$lackgame = $value->game;
						}
					}

					if($lackgame!='')
					{
						return response()->json(['status' => 'error', 'message' => 'คุณยังมีรายการเล่นค้างอยู่ใน PG เกมส์ '.$lackgame ]);
						exit();
					}
				}*/

				$promotions_current_user = \DB::table('promotions_current_user')->where('user_id','=',$userid)->get();

				if($promotions_current_user->count()==0){

					$promotion = \DB::table('promotions')->where('id','=',$request->input('proid'))->first();

					if($promotion->get_times>0)
					{
						$promotions_history_user = \DB::table('promotions_history_users')->where([
							['user_id','=',$userid],
							['promotion_id','=',$promotion->id]
						])->get();

						if($promotions_history_user->count()>=$promotion->get_times){
							return response()->json(['status' => 'error', 'message' => 'คุณรับโปรโมชั่นเกินกำหนด' ]);
							exit();
						}
					}



					if($promotion->deposit_amount > $userbalance){
							return response()->json(['status' => 'error', 'message' => 'เงินไม่พอกรุณาเติมเครดิตก่อน' ]);
							exit();
					}


							$status = 'wait';
							if($promotion->promotion_type=='auto'){
								$status = 'confirmed';
							}else{
								$status = 'wait';
							}

							$round = 1;

							$turnover = $promotion->turnover;

							$credit_before = $userbalance;

						if($promotion->type=='fix')
						{

							$deposit_amount = $promotion->deposit_amount;
							$value = $promotion->value;

							$credit_amount = floatval($userbalance - $deposit_amount);	


							\DB::table('promotions_current_user')->insert(
							     array(
											'user_id' => $userid,
											'promotion_id' =>  $promotion->id,
											'credit_before' => $credit_before,
											'credit_after' => $value,
											'credit_amount' => $credit_amount,
											'credit_additional' => $value,
											'credit_remain' => 5,
											'lock' => 1,
											'deposit_amount' => $deposit_amount,
											'type' => $promotion->type,
											'value' => $value,
											'turnover' => $promotion->turnover,
											'relate_promotion_id' => $promotion->relate_promotion_id,
											'withdraw_amount' => $promotion->withdraw_amount,
											'note' => $promotion->note,
											'get_times' => $promotion->get_times,
											'round' => $round,
											'promotion_type' => $promotion->promotion_type,
											'status' => $status,
											'bonususername' => $bonususername,
											'game_type' => $promotion->game_type,
											'turn_type' => $promotion->turn_type

							     )
							);

							\DB::table('promotions_history_users')->insert(
							     array(
											'user_id' => $userid,
											'promotion_id' =>  $promotion->id,
											'credit_before' => $credit_before,
											'credit_after' => $value,
											'credit_amount' => $credit_amount,
											'credit_additional' => $value,
											'credit_remain' => 5,
											'lock' => 1,
											'deposit_amount' => $deposit_amount,
											'type' => $promotion->type,
											'value' => $value,
											'turnover' => $promotion->turnover,
											'relate_promotion_id' => $promotion->relate_promotion_id,
											'withdraw_amount' => $promotion->withdraw_amount,
											'note' => $promotion->note,
											'get_times' => $promotion->get_times,
											'round' => $round,
											'promotion_type' => $promotion->promotion_type,
											'status' => 'confirmed',
											'bonususername' => $bonususername,
											'game_type' => $promotion->game_type,
											'turn_type' => $promotion->turn_type
							     )
							);

							\SiteHelpers::tranHistory($userid, $credit_before, $credit_amount, '-'.$deposit_amount, 'รับโปรโมชั่น '.$promotion->promotion_name.' ได้รับ'.$value.' เครดิต', 'success', $request);
							
						}else{

							$credit_amount = 0;

							$deposit_amount = $userbalance;

							$value = floatval($userbalance*$promotion->value/100);

							if($value > $promotion->max_withdraw){
								$value = $promotion->max_withdraw;
							}


							$value = $userbalance+$value;

							$turnover = $value*$turnover;

							\DB::table('promotions_current_user')->insert(
							     array(
											'user_id' => $userid,
											'promotion_id' =>  $promotion->id,
											'credit_before' => $credit_before,
											'credit_after' => $value,
											'credit_amount' => $credit_amount,
											'credit_additional' => $value,
											'credit_remain' => 5,
											'lock' => 1,
											'deposit_amount' => $deposit_amount,
											'type' => $promotion->type,
											'value' => $value,
											'turnover' => $turnover,
											'relate_promotion_id' => $promotion->relate_promotion_id,
											'withdraw_amount' => $value*$promotion->withdraw_amount,
											'note' => $promotion->note,
											'get_times' => $promotion->get_times,
											'round' => $round,
											'promotion_type' => $promotion->promotion_type,
											'status' => $status,
											'bonususername' => $bonususername,
											'game_type' => $promotion->game_type,
											'turn_type' => $promotion->turn_type

							     )
							);

							\DB::table('promotions_history_users')->insert(
							     array(
											'user_id' => $userid,
											'promotion_id' =>  $promotion->id,
											'credit_before' => $credit_before,
											'credit_after' => $value,
											'credit_amount' => $credit_amount,
											'credit_additional' => $value,
											'credit_remain' => 5,
											'lock' => 1,
											'deposit_amount' => $deposit_amount,
											'type' => $promotion->type,
											'value' => $value,
											'turnover' => $turnover,
											'relate_promotion_id' => $promotion->relate_promotion_id,
											'withdraw_amount' => $value*$promotion->withdraw_amount,
											'note' => $promotion->note,
											'get_times' => $promotion->get_times,
											'round' => $round,
											'promotion_type' => $promotion->promotion_type,
											'status' => $status,
											'bonususername' => $bonususername,
											'game_type' => $promotion->game_type,
											'turn_type' => $promotion->turn_type
							     )
							);

							\SiteHelpers::tranHistory($userid, $credit_before, $value, $value-$credit_before, 'รับโปรโมชั่น '.$promotion->promotion_name.' ได้รับ'.$value.' เครดิต', 'success', $request);

						}

							


						


								if($promotion->promotion_type=='auto'){


									
						
\DB::connection('mysql2')->table('tb_users')->where('gameusername', $gameusername)->update(['bonus' => $credit_amount,'balance' => $value,'bonus_mode' => 1]);

\DB::table('tb_users')->where('gameusername', $gameusername)->update(['bonus' => $credit_amount,'balance' => $value,'bonus_mode' => 1]);


								 	return response()->json(['status' => 'success', 'message' => 'ร่วมโปรโมชั่นสำเร็จ' ]);

								}else{

\DB::connection('mysql2')->table('tb_users')->where('gameusername', $gameusername)->update(['bonus' => $credit_amount,'balance' => 0,'bonus_mode' => 1]);

\DB::table('tb_users')->where('gameusername', $gameusername)->update(['bonus' => $credit_amount,'balance' => 0,'bonus_mode' => 1]);
									

									return response()->json(['status' => 'success', 'message' => 'กรุณารอการอนุมัติจากเจ้าหน้าที่' ]);
								
								}
							


					

				}else{
					return response()->json(['status' => 'error', 'message' => 'ไม่สามารถรับโปรโมชั่นซ้อนกันได้' ]);
				}



				
	}	


	/*function postAddpromotioncoins( Request $request ) 
	{
	

				$userid = \Auth::user()->id;

				$userbalance = \Auth::user()->coins;

				$user_wheel_rounds = \Auth::user()->wheel_rounds;

				$bonususername = \Auth::user()->bonususername;

				/*$pglackspin = \DB::select("SELECT DISTINCT (select g.name from gamelists g where  g.partner = 'pg' and g.gameid =p.game_id) as game ,
								IFNULL((select IFNULL(p2.is_end_round,0) from pgbetpayout p2 where p2.parent_bet_id = p.parent_bet_id 
								and p2.transactiontype = 'PAYOUT' and p2.is_end_round = 1),0) as endr 
								from pgbetpayout p where p.transactiontype = 'PAYOUT' and p.is_feature = 1 and p.is_end_round = 0 and p.user_id = ".$userid);

	
				if(!empty($pglackspin)){
					$lackgame = '';
					foreach ($pglackspin as $value) {
						if($value->endr==0){
							$lackgame = $value->game;
						}
					}

					if($lackgame!='')
					{
						return response()->json(['status' => 'error', 'message' => 'คุณยังมีรายการเล่นค้างอยู่ใน PG เกมส์ '.$lackgame ]);
						exit();
					}
				}

				$promotions_current_user = \DB::table('promotions_current_user')->where('user_id','=',$userid)->get();

				if($promotions_current_user->count()==0){

					$promotion = \DB::table('promotions')->where('id','=',$request->input('proid'))->first();

					if($promotion->get_times>0)
					{
						$promotions_history_user = \DB::table('promotions_history_users')->where([
							['user_id','=',$userid],
							['promotion_id','=',$promotion->id]
						])->get();

						

						if($promotions_history_user->count()>=$promotion->get_times){
							return response()->json(['status' => 'error', 'message' => 'คุณรับโปรโมชั่นเกินกำหนด' ]);
							exit();
						}
					}



					if($promotion->coin_amount > $userbalance){
							return response()->json(['status' => 'error', 'message' => 'เหรียญไม่พอกรุณาหาเหรียญเพิ่ม' ]);
							exit();
					}


						if($promotion->type=='fix'){


							$round = 1;

							$credit_before = $userbalance;

							$deposit_amount = $promotion->coin_amount;
							$value = $promotion->value;

							$credit_amount = floatval($userbalance - $deposit_amount);

							$status = 'wait';
							if($promotion->promotion_type=='auto'){
								$status = 'confirmed';
							}else{
								$status = 'wait';
							}
							

							\DB::table('promotions_current_user')->insert(
							     array(
											'user_id' => $userid,
											'promotion_id' =>  $promotion->id,
											'credit_before' => $credit_before,
											'credit_after' => $value,
											'credit_amount' => $credit_amount,
											'credit_additional' => $value,
											'credit_remain' => 5,
											'lock' => 0,
											'deposit_amount' => $deposit_amount,
											'type' => $promotion->type,
											'value' => $value,
											'turnover' => $promotion->turnover,
											'relate_promotion_id' => $promotion->relate_promotion_id,
											'withdraw_amount' => $promotion->withdraw_amount,
											'note' => $promotion->note,
											'get_times' => $promotion->get_times,
											'round' => $round,
											'promotion_type' => $promotion->promotion_type,
											'status' => $status,
											'bonususername' => $bonususername,
											'game_type' => $promotion->game_type,
											'turn_type' => $promotion->turn_type

							     )
							);

							\DB::table('promotions_history_users')->insert(
							     array(
											'user_id' => $userid,
											'promotion_id' =>  $promotion->id,
											'credit_before' => $credit_before,
											'credit_after' => $value,
											'credit_amount' => $credit_amount,
											'credit_additional' => $value,
											'credit_remain' => 5,
											'lock' => 0,
											'deposit_amount' => $deposit_amount,
											'type' => $promotion->type,
											'value' => $value,
											'turnover' => $promotion->turnover,
											'relate_promotion_id' => $promotion->relate_promotion_id,
											'withdraw_amount' => $promotion->withdraw_amount,
											'note' => $promotion->note,
											'get_times' => $promotion->get_times,
											'round' => $round,
											'promotion_type' => $promotion->promotion_type,
											'status' => 'confirmed',
											'bonususername' => $bonususername,
											'game_type' => $promotion->game_type,
											'turn_type' => $promotion->turn_type
							     )
							);


							\SiteHelpers::tranHistory($userid, $credit_before, $credit_before, 0, 'รับโปรโมชั่นด้วยเหรียญ '.$promotion->promotion_name.' ได้รับ'.$value.' เครดิต', 'success', $request);


								if($promotion->promotion_type=='auto'){

									
									
								 	\DB::table('tb_users')->where('id', $userid)->update(['bonus' => $value,'coins' => $credit_amount,'bonus_mode' => 1]);



								 	return response()->json(['status' => 'success', 'message' => 'ร่วมโปรโมชั่นสำเร็จ' ]);

								}else{

									\DB::table('tb_users')->where('id', $userid)->update(['bonus' => 0,'coins' => $credit_amount,'bonus_mode' => 1]);

									return response()->json(['status' => 'success', 'message' => 'กรุณารอการอนุมัติจากเจ้าหน้าที่' ]);
								
								}
							

						}

					

				}else{
					return response()->json(['status' => 'error', 'message' => 'ไม่สามารถรับโปรโมชั่นซ้อนกันได้' ]);
				}



				
	}*/

	function postAddmission( Request $request ) 
	{
	

				$userid = \Auth::id();

				

				$bonususername = \Auth::user()->gameusername;
				$gameusername = \Auth::user()->gameusername;

				$balanceuser = \DB::connection('mysql2')->table('tb_users')->where('gameusername', '=', $gameusername)->first();
				$userbalance = $balanceuser->balance;

				/*$pglackspin = \DB::select("SELECT DISTINCT (select g.name from gamelists g where  g.partner = 'pg' and g.gameid =p.game_id) as game ,
								IFNULL((select IFNULL(p2.is_end_round,0) from pgbetpayout p2 where p2.parent_bet_id = p.parent_bet_id 
								and p2.transactiontype = 'PAYOUT' and p2.is_end_round = 1),0) as endr 
								from pgbetpayout p where p.transactiontype = 'PAYOUT' and p.is_feature = 1 and p.is_end_round = 0 and p.user_id = ".$userid);

	
				if(!empty($pglackspin)){
					$lackgame = '';
					foreach ($pglackspin as $value) {
						if($value->endr==0){
							$lackgame = $value->game;
						}
					}

					if($lackgame!='')
					{
						return response()->json(['status' => 'error', 'message' => 'คุณยังมีรายการเล่นค้างอยู่ใน PG เกมส์ '.$lackgame ]);
						exit();
					}
				}*/

				$promotions_current_user = \DB::table('promotions_current_user')->where('user_id','=',$userid)->get();

				if($promotions_current_user->count()==0){

					$promotion = \DB::table('promotions')->where('id','=',$request->input('proid'))->first();

					if($promotion->get_times==1)
					{
						$promotions_history_user = \DB::table('promotions_history_users')->where([
							['user_id','=',$userid],
							['get_times','=',1],
							['promotion_id','=',$promotion->id]
						])->get();

						

						if($promotions_history_user->count()>0){
							return response()->json(['status' => 'error', 'message' => 'โปรโมชั่นนี้รับได้เพียงครั้งเดียว' ]);
							exit();
						}
					}



					if($promotion->deposit_amount > $userbalance){
							return response()->json(['status' => 'error', 'message' => 'เงินไม่พอกรุณาเติมเครดิตก่อน' ]);
							exit();
					}


						if($promotion->type=='fix'){


							$round = 1;

							$credit_before = $userbalance ;

							$deposit_amount = $promotion->deposit_amount;
							$value = $promotion->value;

							$credit_amount = floatval($userbalance - $deposit_amount);

							$status = 'wait';
							if($promotion->promotion_type=='auto'){
								$status = 'confirmed';
							}else{
								$status = 'wait';
							}
							

							\DB::table('promotions_current_user')->insert(
							     array(
											'user_id' => $userid,
											'promotion_id' =>  $promotion->id,
											'credit_before' => $credit_before,
											'credit_after' => $value,
											'credit_amount' => $credit_amount,
											'credit_additional' => $value,
											'credit_remain' => 5,
											'lock' => 1,
											'deposit_amount' => $deposit_amount,
											'type' => $promotion->type,
											'value' => $value,
											'turnover' => $promotion->turnover,
											'relate_promotion_id' => $promotion->relate_promotion_id,
											'withdraw_amount' => $promotion->withdraw_amount,
											'note' => $promotion->note,
											'get_times' => $promotion->get_times,
											'round' => $round,
											'promotion_type' => $promotion->promotion_type,
											'status' => $status,
											'bonususername' => $bonususername,
											'game_type' => $promotion->game_type,
											'turn_type' => 'amount'

							     )
							);

							\DB::table('promotions_history_users')->insert(
							     array(
											'user_id' => $userid,
											'promotion_id' =>  $promotion->id,
											'credit_before' => $credit_before,
											'credit_after' => $value,
											'credit_amount' => $credit_amount,
											'credit_additional' => $value,
											'credit_remain' => 5,
											'lock' => 1,
											'deposit_amount' => $deposit_amount,
											'type' => $promotion->type,
											'value' => $value,
											'turnover' => $promotion->turnover,
											'relate_promotion_id' => $promotion->relate_promotion_id,
											'withdraw_amount' => $promotion->withdraw_amount,
											'note' => $promotion->note,
											'get_times' => $promotion->get_times,
											'round' => $round,
											'promotion_type' => $promotion->promotion_type,
											'status' => 'confirmed',
											'bonususername' => $bonususername,
											'game_type' => $promotion->game_type,
											'turn_type' => 'amount'
							     )
							);


							\SiteHelpers::tranHistory($userid, $credit_before, $credit_before, 0, 'ร่วมกิจกรรม '.$promotion->promotion_name.' ได้รับ'.$value.' เครดิต', 'success', $request);


								if($promotion->promotion_type=='auto'){


\DB::connection('mysql2')->table('tb_users')->where('gameusername', $gameusername)->update(['bonus' => $credit_amount,'balance' => $value,'bonus_mode' => 1]);

\DB::table('tb_users')->where('gameusername', $gameusername)->update(['bonus' => $credit_amount,'balance' => $value,'bonus_mode' => 1]);

								 	return response()->json(['status' => 'success', 'message' => 'ร่วมโปรโมชั่นสำเร็จ' ]);

								}else{



\DB::connection('mysql2')->table('tb_users')->where('gameusername', $gameusername)->update(['balance' => 0,'bonus' => $credit_amount,'bonus_mode' => 1]);

\DB::table('tb_users')->where('gameusername', $gameusername)->update(['balance' => 0,'bonus' => $credit_amount,'bonus_mode' => 1]);


									return response()->json(['status' => 'success', 'message' => 'กรุณารอการอนุมัติจากเจ้าหน้าที่' ]);
								
								}
							

						}

					

				}else{
					return response()->json(['status' => 'error', 'message' => 'ไม่สามารถรับโปรโมชั่นซ้อนกันได้' ]);
				}



				
	}	


	function postCouponcode( Request $request ) 
	{
	

				$userid = \Auth::user()->id;


				$bonususername = \Auth::user()->gameusername;
				$gameusername = \Auth::user()->gameusername;

				$balanceuser = \DB::connection('mysql2')->table('tb_users')->where('gameusername', '=', $gameusername)->first();
				$userbalance = $balanceuser->balance;

				/*$pglackspin = \DB::select("SELECT DISTINCT (select g.name from gamelists g where  g.partner = 'pg' and g.gameid =p.game_id) as game ,
								IFNULL((select IFNULL(p2.is_end_round,0) from pgbetpayout p2 where p2.parent_bet_id = p.parent_bet_id 
								and p2.transactiontype = 'PAYOUT' and p2.is_end_round = 1),0) as endr 
								from pgbetpayout p where p.transactiontype = 'PAYOUT' and p.is_feature = 1 and p.is_end_round = 0 and p.user_id = ".$userid);

	
				if(!empty($pglackspin)){
					$lackgame = '';
					foreach ($pglackspin as $value) {
						if($value->endr==0){
							$lackgame = $value->game;
						}
					}

					if($lackgame!='')
					{
						return response()->json(['status' => 'error', 'message' => 'คุณยังมีรายการเล่นค้างอยู่ใน PG เกมส์ '.$lackgame ]);
						exit();
					}
				}*/

				$promotions_current_user = \DB::table('promotions_current_user')->where('user_id','=',$userid)->get();

				if($promotions_current_user->count()==0){

					$promotion = \DB::table('promotions')->where([
							['active','=',1],
							['promotion_name','=',$request->input('code')],
							['promotion_category_id','=',15]
						])->first();  

					if(empty($promotion)){
						return response()->json(['status' => 'error', 'message' => 'คูปองนี้หมดอายุแล้วหรือไม่มีอยู่' ]);
							exit();
					}

					if($promotion->get_times==1)
					{
						$promotions_history_user = \DB::table('promotions_history_users')->where([
							['user_id','=',$userid],
							['get_times','=',1],
							['promotion_id','=',$promotion->id]
						])->get();

						if($promotions_history_user->count()>0){
							return response()->json(['status' => 'error', 'message' => 'คูปองนี้ใช้ได้เพียงครั้งเดียว' ]);
							exit();
						}
					}

					if($promotion->users_limit>=$promotion->count_limit)
					{
						return response()->json(['status' => 'error', 'message' => 'คูปองนี้ใช้ได้เพียงครั้งเดียว' ]);
							exit();
					}

						if($promotion->type=='fix'){


							$round = 1;

							$credit_before = $userbalance ;

							$deposit_amount = $promotion->deposit_amount;
							$value = $promotion->value;

							$credit_amount = floatval($userbalance - $deposit_amount);

							$status = 'wait';
							if($promotion->promotion_type=='auto'){
								$status = 'confirmed';
							}else{
								$status = 'wait';
							}
							

							\DB::table('promotions_current_user')->insert(
							     array(
											'user_id' => $userid,
											'promotion_id' =>  $promotion->id,
											'credit_before' => $credit_before,
											'credit_after' => $value,
											'credit_amount' => $credit_amount,
											'credit_additional' => $value,
											'credit_remain' => 5,
											'lock' => 1,
											'deposit_amount' => $deposit_amount,
											'type' => $promotion->type,
											'value' => $value,
											'turnover' => $promotion->turnover,
											'relate_promotion_id' => $promotion->relate_promotion_id,
											'withdraw_amount' => $promotion->withdraw_amount,
											'note' => $promotion->note,
											'get_times' => $promotion->get_times,
											'round' => $round,
											'promotion_type' => $promotion->promotion_type,
											'status' => $status,
											'bonususername' => $bonususername,
											'game_type' => $promotion->game_type,
											'turn_type' => $promotion->turn_type

							     )
							);

							\DB::table('promotions_history_users')->insert(
							     array(
											'user_id' => $userid,
											'promotion_id' =>  $promotion->id,
											'credit_before' => $credit_before,
											'credit_after' => $value,
											'credit_amount' => $credit_amount,
											'credit_additional' => $value,
											'credit_remain' => 5,
											'lock' => 1,
											'deposit_amount' => $deposit_amount,
											'type' => $promotion->type,
											'value' => $value,
											'turnover' => $promotion->turnover,
											'relate_promotion_id' => $promotion->relate_promotion_id,
											'withdraw_amount' => $promotion->withdraw_amount,
											'note' => $promotion->note,
											'get_times' => $promotion->get_times,
											'round' => $round,
											'promotion_type' => $promotion->promotion_type,
											'status' => 'confirmed',
											'bonususername' => $bonususername,
											'game_type' => $promotion->game_type,
											'turn_type' => $promotion->turn_type
							     )
							);


		\SiteHelpers::tranHistory($userid, $credit_before, $credit_before, 0, 'ใช้คูปอง '.$promotion->promotion_name.' ได้รับ'.$value.' เครดิต', 'success', $request);

		\DB::table('promotions')->where('id', $promotion->id)->increment('users_limit');


								if($promotion->promotion_type=='auto'){

							
\DB::connection('mysql2')->table('tb_users')->where('gameusername', $gameusername)->update(['bonus' => $credit_amount,'balance' => $value,'bonus_mode' => 1]);

\DB::table('tb_users')->where('gameusername', $gameusername)->update(['bonus' => $credit_amount,'balance' => $value,'bonus_mode' => 1]);

								 	return response()->json(['status' => 'success', 'message' => 'ร่วมโปรโมชั่นสำเร็จ' ]);

								}else{

							
\DB::connection('mysql2')->table('tb_users')->where('gameusername', $gameusername)->update(['balance' => 0,'bonus' => $credit_amount,'bonus_mode' => 1]);

\DB::table('tb_users')->where('gameusername', $gameusername)->update(['balance' => 0,'bonus' => $credit_amount,'bonus_mode' => 1]);
									return response()->json(['status' => 'success', 'message' => 'กรุณารอการอนุมัติจากเจ้าหน้าที่' ]);
								
								}
							

						}

					

				}else{
					return response()->json(['status' => 'error', 'message' => 'ไม่สามารถรับโปรโมชั่นซ้อนกันได้' ]);
				}



				
	}

		

	function postRemovepromotion( Request $request ) 
	{
			$userid = \Auth::id();

			

			$bonus_mode = \Auth::user()->bonus_mode;

				$gameusername = \Auth::user()->gameusername;

				$balanceuser = \DB::connection('mysql2')->table('tb_users')->where('gameusername', '=', $gameusername)->first();
				$userbalance = $balanceuser->balance;
				$userbonus = $balanceuser->bonus;

			/*$pglackspin = \DB::select("SELECT DISTINCT (select g.name from gamelists g where  g.partner = 'pg' and g.gameid =p.game_id) as game ,
								IFNULL((select IFNULL(p2.is_end_round,0) from pgbetpayout p2 where p2.parent_bet_id = p.parent_bet_id 
								and p2.transactiontype = 'PAYOUT' and p2.is_end_round = 1),0) as endr 
								from pgbetpayout p where p.transactiontype = 'PAYOUT' and p.is_feature = 1 and p.is_end_round = 0 and p.user_id = ".$userid);

	
			if(!empty($pglackspin)){
				$lackgame = '';
				foreach ($pglackspin as $value) {
					if($value->endr==0){
						$lackgame = $value->game;
					}
				}

				if($lackgame!='')
				{
					return response()->json(['status' => 'error', 'message' => 'คุณยังมีรายการเล่นค้างอยู่ใน PG เกมส์ '.$lackgame ]);
					exit();
				}
			}*/

			if($bonus_mode==0)
			{
				return response()->json(['status' => 'error', 'message' => 'คุณยังไม่ได้รับโปรโมชั่น' ]);
				exit();
			}elseif($bonus_mode==1)
			{

				if($userbalance<5){

					$promotions_current_user = \DB::table('promotions_current_user')->where('user_id','=',$userid)->first();

					if($promotions_current_user->status=='wait'&&$promotions_current_user->deposit_amount>0){

						$userbalancerefund=$userbalance+$promotions_current_user->deposit_amount;

\DB::connection('mysql2')->table('tb_users')->where('gameusername', $gameusername)->update(['balance' => $userbalancerefund,'bonus_mode' => 0]);
\DB::table('tb_users')->where('gameusername', $gameusername)->update(['balance' => $userbalancerefund,'bonus_mode' => 0]);

						\SiteHelpers::tranHistory($userid, $userbalance, $userbalancerefund, 0, 'คืนเงินและออกจากโปร', 'success', $request);

					}else{

		

\DB::connection('mysql2')->table('tb_users')->where('gameusername', $gameusername)->update(['bonus' => 0,'balance' => $userbonus,'bonus_mode' => 0]);
\DB::table('tb_users')->where('gameusername', $gameusername)->update(['bonus' => 0,'balance' => $userbonus,'bonus_mode' => 0]);

					\SiteHelpers::tranHistory($userid, $userbalance, $userbalance, 0, 'ออกจากโปรโมชั่น', 'success', $request);

					}



				\DB::table('promotions_current_user')->where('user_id', '=', $userid)->delete();

					return response()->json(['status' => 'success', 'message' => 'ออกจากโปรโมชั่นสำเร็จ' ]);
				}else{
					return response()->json(['status' => 'error', 'message' => 'ยอดโบนัสของคุณต้องน้อยกว่า 5' ]);
				}

			}elseif($bonus_mode==2)
			{

				if($userbalance<5){

					\DB::table('tb_users')->where('id', $userid)->update(['bonus_mode' => 0]);
					\DB::connection('mysql2')->table('tb_users')->where('gameusername', $gameusername)->update(['bonus_mode' => 0]);

					\DB::table('promotions_current_user')->where('user_id', '=', $userid)->delete();

					\SiteHelpers::tranHistory($userid,  0,0,0, 'ออกจากโปรโมชั่น', 'success', $request);

					return response()->json(['status' => 'success', 'message' => 'ออกจากโปรโมชั่นสำเร็จ' ]);
				}else{
					return response()->json(['status' => 'error', 'message' => 'ยอดเครดิตของคุณต้องน้อยกว่า 5' ]);
				}

			}

	}


	function postAddpromotionauto(Request $request){

			$userid = \Auth::user()->id;

			$bonus_mode = \Auth::user()->bonus_mode;

			$username = \Auth::user()->gameusername;


				$gameusername = \Auth::user()->gameusername;

				$balanceuser = \DB::connection('mysql2')->table('tb_users')->where('gameusername', '=', $gameusername)->first();
				$userbalance = $balanceuser->balance;
				$userbonus = $balanceuser->bonus;


			if($bonus_mode==1)
			{
				return response()->json(['status' => 'error', 'message' => 'ไม่สามารถรับโปรโมชั่นซ้อนกันได้' ]);
				exit();
			}


			if($bonus_mode==0){

				if($userbalance>5){
					return response()->json(['status' => 'error', 'message' => 'ยอดเครดิตของคุณต้องน้อยกว่า 5' ]);
					exit();
				}else{

		

\DB::connection('mysql2')->table('tb_users')->where('gameusername', $gameusername)->update(['bonus_mode' => 2]);
\DB::table('tb_users')->where('gameusername', $gameusername)->update(['bonus_mode' => 2]);

					\SiteHelpers::tranHistory($userid,  0,0,0, 'รับโบนัสอัตโนมัติทุกยอดฝาก10%', 'success', $request);

					$promotion = \DB::table('promotions')->where([
						['promotion_category_id','=',12],
						['active','=',1]
					])->first();

					\DB::table('promotions_current_user')->insertGetId(
								     array(
												'user_id' => $userid,
												'promotion_id' => $promotion->id,
												'credit_before' => 0,
												'credit_after' => 0,
												'credit_amount' => 0,
												'credit_additional' => 0,
												'credit_remain' => 0,
												'lock' => 1,
												'deposit_amount' => $promotion->deposit_amount,
												'type' => $promotion->type,
												'value' => $promotion->value,
												'turnover' => $promotion->turnover,
												'relate_promotion_id' => $promotion->relate_promotion_id,
												'withdraw_amount' => $promotion->withdraw_amount,
												'note' => $promotion->note,
												'get_times' => $promotion->get_times,
												'round' => 0,
												'promotion_type' => $promotion->promotion_type,
												'status' => 'confirmed',
												'bonususername' => $username,
												'game_type' => $promotion->game_type,
												'turn_type' => $promotion->turn_type,
												'max_bonus' => $promotion->max_bonus

								     )
								);

					return response()->json(['status' => 'success', 'message' => 'ร่วมโปรโมชั่นสำเร็จ' ]);
				}

			}elseif($bonus_mode==2){

				$promotions_current_user = \DB::table('promotions_current_user')
				            ->join('promotions', 'promotions_current_user.promotion_id', '=', 'promotions.id')
				            ->select('promotions_current_user.*', 'promotions.promotion_name')
				            ->where('promotions_current_user.user_id','=',$userid)
				            ->get();

						$userpromotion = $promotions_current_user[0];

				if($userbalance>5&&$userbalance<$userpromotion->turnover&&$userpromotion->turnover>2)
						{
								return response()->json(['status' => 'error', 'message' => 'คุณต้องมียอดน้อยกว่า 5 บาทถึงจะออกจากโบนัสอัตโนมัติได้' ]);
								exit();
						}

\DB::connection('mysql2')->table('tb_users')->where('gameusername', $gameusername)->update(['bonus_mode' => 0]);
\DB::table('tb_users')->where('gameusername', $gameusername)->update(['bonus_mode' => 0]);

				\DB::table('promotions_current_user')->where('user_id', '=', $userid)->delete();

				\SiteHelpers::tranHistory($userid,  0,0,0, 'ออกจากโบนัสอัตโนมัติ', 'success', $request);


				return response()->json(['status' => 'success', 'message' => 'ออกจากโปรโมชั่นสำเร็จ' ]);

			}


	}	

}