<?php namespace App\Http\Controllers;

use App\Models\Withdraw;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;
use Validator, Input, Redirect ; 

class WithdrawController extends Controller {

	protected $layout = "layouts.main";
	protected $data = array();	
	public $module = 'withdraw';
	static $per_page	= '10';
	
	public function __construct() 
	{
		parent::__construct();
		$this->model = new Withdraw();
		
		$this->info = $this->model->makeInfo( $this->module);
		$this->access = array();
	
		$this->data = array(
			'pageTitle'			=> 	$this->info['title'],
			'pageNote'			=>  $this->info['note'],
			'pageModule'		=> 'withdraw',
			'pageUrl'			=>  url('withdraw'),
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

					if($request->input('withdraw_id')!=''){


							if($request->input('username')!=''){

								$userdata = \DB::table('tb_users')->where('username','=',$request->input('username'))->first();

								if($userdata==''){
									return response()->json(['status' => 'error', 'message' => 'ไม่พบ user นี้' ]);
										exit();
								}else{
									$data['user_id'] = $userdata->id;
								}

							}
						
							$withdrawcheck = \DB::table('withdraw')->where('withdraw_id','=',$data['withdraw_id'])->first();
							
							if($withdrawcheck->status=='confirmed'){
								return response()->json(array(
									'message'	=> 'รายการนี้ยืนยันไปแล้ว',
									'status'	=> 'error'
								));	
								exit();
							}

					}


					\SiteHelpers::tranHistory( $data['user_id'], 0, 0, $data['amount'], 'ปรับปรุงสถานะการถอนโดยแอดมิน', 'success', $request);
					

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
	
	function postAddwithdraw( Request $request ) 
	{
	

				$userid = \Auth::user()->id;

				$username = \Auth::user()->username;

				$gameusername = \Auth::user()->gameusername;

				$balanceuser = \DB::connection('mysql2')->table('tb_users')->where('gameusername', '=', $gameusername)->first();

				$userbalance = $balanceuser->balance;

				$userbonus = $balanceuser->bonus;

				$bonus_mode = \Auth::user()->bonus_mode;

				$bank_id = \Auth::user()->bank;

				$max_withdraw = \Auth::user()->max_withdraw;

				$amount_withdraw = 0;

				$userturnover = \Auth::user()->turnover;

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

				$website = \DB::table('site_settings')->where('key','=','website')->first();


				$client = new \GuzzleHttp\Client();

				$endpoint = $website->value."/sms/linenotify.php";





				$promotions_current_user = \DB::table('promotions_current_user')
			            ->join('promotions', 'promotions_current_user.promotion_id', '=', 'promotions.id')
			            ->select('promotions_current_user.*', 'promotions.promotion_name')
			            ->where('promotions_current_user.user_id','=',$userid)
			            ->get();

			if($promotions_current_user->count()>0){


				if($bonus_mode==1){

								$userpromotion = $promotions_current_user[0];
								$userturn = 0;
								$proturnover = $userpromotion->turnover;
								if($userpromotion->turn_type=='turn'){
									

									$stdate = $userpromotion->date_time;

									$nowdate = date("Y-m-d H:i:s");

						

									$userturn = \DB::connection('mysql2')->table('game_histories')->where([
												['gameusername','=',$gameusername],
												['bonus_mode','=',0],
												['agent','=',\Auth::user()->agent_id]
											])->whereBetween('systemdate',[$stdate, $nowdate])->sum('bet_amount');

								
								}else{
									$userturn = $userbalance;
								}

								if($userturn<$proturnover){
									return response()->json(['status' => 'error', 'message' => 'คุณยังทำเทิร์นไม่ถึงเป้า' ]);
									exit();
								}else{

									\SiteHelpers::tranHistory($userid, $userbalance, 0, '-'.$userpromotion->withdraw_amount, 'ทำรายการถอนตัดเครดิตโปรโมชั่น '.$userpromotion->promotion_name, 'wait', $request);

									if($userpromotion->type=='fix'){

										$canwithdraw = $userbalance;
										if($userpromotion->turn_type=='turn'){
											
											if($canwithdraw>$userpromotion->withdraw_amount){
												$canwithdraw = $userpromotion->withdraw_amount;
											}
										}else{
											$canwithdraw = $userpromotion->withdraw_amount;
										}

										\DB::table('withdraw')->insert(
												     array(
																'user_id' => $userid,
																'bank_id' =>  $bank_id,
																'amount' => $canwithdraw,
																'promotion_id' => $userpromotion->promotion_id,
																'reduce_credit' => $userbalance,
																'status' => 'wait',
																'username' => $username
												     )
												);

\DB::connection('mysql2')->table('tb_users')->where('gameusername', $gameusername)->update(['balance' => $userbonus,'bonus' => 0,'bonus_mode' => 0,'turnover' => 0]);
\DB::table('tb_users')->where('gameusername', $gameusername)->update(['balance' => $userbonus,'bonus' => 0,'bonus_mode' => 0,'turnover' => 0]);

										\DB::table('promotions_current_user')->where('user_id', '=', $userid)->delete();



										$response = $client->request( 'POST', $endpoint, [
										  'form_params' => [
										    'username' => $username, 
										    'amount' => $canwithdraw,
										    'credit' => $userbalance,
										    'maxwithdraw' => $userpromotion->withdraw_amount,
										    'promotion' => $userpromotion->promotion_name
										  ],
										] );

									}else{

								


										$canwithdraw = $userbalance;
										if($userpromotion->turn_type=='turn'){
											
											if($canwithdraw>$userpromotion->withdraw_amount&&$userpromotion->withdraw_amount!=0){
												$canwithdraw = $userpromotion->withdraw_amount;
											}
										}else{
											$canwithdraw = $userpromotion->withdraw_amount;
										}


										\DB::table('withdraw')->insert(
												     array(
																'user_id' => $userid,
																'bank_id' =>  $bank_id,
																'amount' => $canwithdraw,
																'promotion_id' => $userpromotion->promotion_id,
																'reduce_credit' => $userbalance,
																'status' => 'wait',
																'username' => $username
												     )
												);

\DB::connection('mysql2')->table('tb_users')->where('gameusername', $gameusername)->update(['balance' => $userbonus,'bonus' => 0,'bonus_mode' => 0,'turnover' => 0]);
\DB::table('tb_users')->where('gameusername', $gameusername)->update(['balance' => $userbonus,'bonus' => 0,'bonus_mode' => 0,'turnover' => 0]);								

										\DB::table('promotions_current_user')->where('user_id', '=', $userid)->delete();


										$response = $client->request( 'POST', $endpoint, [
										  'form_params' => [
										    'username' => $username, 
										    'amount' => $canwithdraw,
										    'credit' => $userbalance,
										    'maxwithdraw' => $userpromotion->withdraw_amount,
										    'promotion' => $userpromotion->promotion_name
										  ],
										] );


									}

									

									return response()->json(['status' => 'success', 'message' => 'แจ้งถอนสำเร็จ' ]);

								}


					}elseif($bonus_mode==2){


								$userpromotion = $promotions_current_user[0];
								$userturn = 0;
								$proturnover = $userpromotion->turnover;
								if($userpromotion->turn_type=='turn'){
									

									$stdate = $userpromotion->date_time;

									$nowdate = date("Y-m-d H:i:s");

						

									$userturn = \DB::connection('mysql2')->table('game_histories')->where([
												['gameusername','=',\Auth::user()->gameusername],
												['bonus_mode','=',0],
												['agent','=',\Auth::user()->agent_id]
											])->whereBetween('systemdate',[$stdate, $nowdate])->sum('bet_amount');

								
								}else{
									$userturn = $userbalance;
								}

								if($userturn<$proturnover){
									return response()->json(['status' => 'error', 'message' => 'คุณยังทำยอดไม่ถึงเป้า' ]);
									exit();
								}else{

									\SiteHelpers::tranHistory($userid, $userbalance, 0, '-'.$userbalance, 'ทำรายการถอนตัดเครดิตโปรโมชั่น '.$userpromotion->promotion_name, 'wait', $request);

									

										$canwithdraw = $userbalance;


										\DB::table('withdraw')->insert(
												     array(
																'user_id' => $userid,
																'bank_id' =>  $bank_id,
																'amount' => $userbalance,
																'promotion_id' => $userpromotion->promotion_id,
																'reduce_credit' => $userbalance,
																'status' => 'wait',
																'username' => $username
												     )
												);

\DB::connection('mysql2')->table('tb_users')->where('gameusername', $gameusername)->update(['balance' => 0,'turnover' => 0]);
\DB::table('tb_users')->where('gameusername', $gameusername)->update(['balance' => 0,'turnover' => 0]);

										\DB::table('promotions_current_user')->where('user_id', '=', $userid)->delete();


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


										$response = $client->request( 'POST', $endpoint, [
										  'form_params' => [
										    'username' => $username, 
										    'amount' => $canwithdraw,
										    'credit' => $canwithdraw,
										    'maxwithdraw' => 999999999,
										    'promotion' => $userpromotion->promotion_name
										  ],
										] );

									

									return response()->json(['status' => 'success', 'message' => 'แจ้งถอนสำเร็จ' ]);

								}

					}

					
					

				}else{


						

				  		
				  		if($userbalance<100){
							return response()->json(['status' => 'error', 'message' => 'ถอนขั้นต่ำ 100 บาท' ]);
							exit();
						}

						$last_deposit_id = 0;

				  		$last_deposit = \DB::table('deposit')->where('user_id','=',$userid)->where('status','=','confirmed')->orderBy('deposit_id', 'DESC')->first();

				  		/*if(!empty($last_deposit))
				  		{
				  			$last_deposit_id = $last_deposit->deposit_id;

				  			$stdate = date("Y-m-d H:i:s",strtotime($last_deposit->date_time));
							$nowdate = date("Y-m-d H:i:s");

							$minturn = $userturnover;
							$minamont = $minturn*2;

							if($userbalance<$minamont)
							{
							

							    $userturn = \DB::connection('mysql2')->table('game_histories')->where([
												['user_id','=',\Auth::user()->id],
												['bonus_mode','=',0],
												['agent','=',\Auth::user()->agent_id]
											])->whereBetween('systemdate',[$stdate, $nowdate])->sum('bet_amount');


								if($userturn<$minturn){
									return response()->json(['status' => 'error', 'message' => 'คุณต้องมียอดเล่นอย่างน้อย 1 เท่า ของยอดฝาก' ]);
									exit();
								} 

							}
				  		}*/

				  		$amount_withdraw=$userbalance;

\DB::connection('mysql2')->table('tb_users')->where('gameusername', $gameusername)->update(['balance' => 0,'turnover' => 0]);
\DB::table('tb_users')->where('gameusername', $gameusername)->update(['balance' => 0,'turnover' => 0]);

				  		$userwithdraw = \DB::table('tb_users')->where('id', $userid)->first();

				  		$max_withdraw = 9999999;

				  		if($userwithdraw->balance==0){

				  				\DB::table('withdraw')->insert(
								     array(
												'user_id' => $userid,
												'bank_id' =>  $bank_id,
												'amount' => $amount_withdraw,
												'promotion_id' => 0,
												'reduce_credit' => $userbalance,
												'status' => 'wait',
												'username' => $username,
												'deposit_id' => $last_deposit_id,
												'max_withdraw' => $max_withdraw
												

								     )
								);
						
						\SiteHelpers::tranHistory($userid, $userbalance, 0, '-'.$amount_withdraw, 'ทำรายการถอน', 'wait', $request);



								$response = $client->request( 'POST', $endpoint, [
									  'form_params' => [
									    'username' => $username, 
									    'amount' => $userbalance,
									    'credit' => $userbalance,
									    'maxwithdraw' => $max_withdraw,
									    'promotion' => 'ไม่รับโปร'
									  ],
									] );

								// url will be: http://my.domain.com/test.php?key1=5&key2=ABC;

								//$statusCode = $response->getStatusCode();

								return response()->json(['status' => 'success', 'message' => 'แจ้งถอนสำเร็จ' ]);
				  		}else{

				  			return response()->json(['status' => 'error', 'message' => 'คุณแจ้งถอนไปแล้ว' ]);
							exit();

				  		}

						
				}



				
	}

}