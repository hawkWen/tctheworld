<?php namespace App\Http\Controllers;

use App\Models\Deposit;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;
use Validator, Input, Redirect ; 

class DepositController extends Controller {

	protected $layout = "layouts.main";
	protected $data = array();	
	public $module = 'deposit';
	static $per_page	= '50';
	
	public function __construct() 
	{
		parent::__construct();
		$this->model = new Deposit();
		
		$this->info = $this->model->makeInfo( $this->module);
		$this->access = array();
	
		$this->data = array(
			'pageTitle'			=> 	$this->info['title'],
			'pageNote'			=>  $this->info['note'],
			'pageModule'		=> 'deposit',
			'pageUrl'			=>  url('deposit'),
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

		$userbalance=0;
					$bonus_mode=0;
					$balanceuser = 0;
					$gameusername='';


		$task = $request->input('action_task');
		switch ($task)
		{
			default:
				$rules = $this->validateForm();
				$validator = Validator::make($request->all(), $rules);
				if ($validator->passes()) 
				{
					$data = $this->validatePost( $request );

					if($data['amount']>99999){
						return response()->json(['status' => 'error', 'message' => 'ใส่ผิดแล้วดูดีๆ' ]);
										exit();
					}
					if($request->input('deposit_id')!='')
					{
						if($request->input('username')!=''){

								$userdata = \DB::table('tb_users')->where('username','=',$request->input('username'))->first();

								$balanceuser = \DB::connection('mysql2')->table('tb_users')->where('gameusername', '=', $userdata->gameusername)->first();

								if($userdata==''){
									return response()->json(['status' => 'error', 'message' => 'ไม่พบ user นี้' ]);
										exit();
								}else{
									$data['username'] = $userdata->username;
									$data['user_id'] = $userdata->id;
									$userbalance = $balanceuser->balance;
									$bonus_mode = $userdata->bonus_mode;
									$gameusername = $userdata->gameusername;
								}

						}

						
						
						if($data['status']=='confirmed'){


						$depositcheck = \DB::table('deposit')->where('deposit_id','=',$data['deposit_id'])->first();

							if($depositcheck->status=='confirmed'){
								return response()->json(array(
									'message'	=> 'รายการนี้ยืนยันไปแล้ว',
									'status'	=> 'error'
								));	
							}else{


									$amount = $data['amount'];

									$userid = $data['user_id'];

									$userdata = \DB::table('tb_users')->where('id','=',$userid)->first();

									$gameusername = $userdata->gameusername;

									$balanceuser = \DB::connection('mysql2')->table('tb_users')->where('gameusername', '=', $gameusername)->first();

									$userbalance = $balanceuser->balance;


										\SiteHelpers::tranHistory( $userid, $userbalance, $userbalance+$amount, $amount, 'เพิ่มปรับปรุงรายการฝากโดยแอดมิน', 'success', $request);

									if($amount>=300&&$amount<1000){

                                        $round = floor($amount/300);

                                        $coin = $round*100;

                                        \DB::table('tb_users')->where('id', $userid)->increment('coins',$coin);

                                        \SiteHelpers::tranHistory($userid, 0, 0,0, 'ฝากเงินได้รับเพรช '.$coin.' เพรช', 'success', $request);

                           	 		}elseif($amount>=1000){

                           	 			$coin = 500;

                                        \DB::table('tb_users')->where('id', $userid)->increment('coins',$coin);

                                        \SiteHelpers::tranHistory($userid, 0, 0,0, 'ฝากเงินได้รับเพรช '.$coin.' เพรช', 'success', $request);


                           	 		}

                           	 		if($bonus_mode==2){


	                           	 		$promotion_user = \DB::table('promotions_current_user')->where('user_id','=',$userid)->first();
	                                    
	                                    $addamount = ($promotion_user->value/100)*$amount;

	                                    if($addamount>$promotion_user->max_bonus)
	                                    {
	                                        $addamount=$promotion_user->max_bonus;
	                                    }

	                                    $newamount = $amount+$addamount;

	                                    $credit_before = $userbalance;

	                                    $credit_after = $userbalance+$newamount;

	                                    $turnover = $credit_after*2;

	       								\DB::table('promotions_current_user')->where('user_id', $userid)->update(['turnover' => $turnover,'credit_before' => $credit_before,'credit_after' => $credit_after,'credit_additional' => $addamount]);

                                    
										\DB::connection('mysql2')->table('tb_users')->where('gameusername', $gameusername)->update(['balance' => \DB::raw('balance + '.$newamount)]);
										\DB::table('tb_users')->where('gameusername', $gameusername)->update(['balance' => \DB::raw('balance + '.$newamount)]);

	                                    \SiteHelpers::tranHistory( $userid, $credit_before, $credit_after, $addamount, 'เพิ่มโบนัสอัตโนมัติ', 'success', $request);

		                            }else{

						\DB::connection('mysql2')->table('tb_users')->where('gameusername', $gameusername)->update(['balance' => \DB::raw('balance + '.$amount),'turnover' => $userbalance+$amount]);

						\DB::table('tb_users')->where('gameusername', $gameusername)->update(['balance' => $userbalance+$amount,'turnover' => $userbalance+$amount]);
		                            }

										

											
								
							}

						}
						
					}else{


					if($request->input('user_id')==0){
						if($request->input('username')!=''){

								$userdata = \DB::table('tb_users')->where('username','=',$request->input('username'))->first();

								$balanceuser = \DB::connection('mysql2')->table('tb_users')->where('gameusername', '=', $userdata->gameusername)->first();

								if($userdata==''){
									return response()->json(['status' => 'error', 'message' => 'ไม่พบ user นี้' ]);
										exit();
								}else{
									$data['username'] = $userdata->username;
									$data['user_id'] = $userdata->id;
									$userbalance = $balanceuser->balance;
									$bonus_mode = $userdata->bonus_mode;
									$gameusername = $userdata->gameusername;
								}

							}

						}
						
						
						if($data['status']=='confirmed'){


									
									$amount = $data['amount'];

									$userid = $data['user_id'];

										\SiteHelpers::tranHistory( $userid, $userbalance, $userbalance+$amount, $amount, 'เพิ่มปรับปรุงรายการฝากโดยแอดมิน', 'success', $request);

									if($amount>=300&&$amount<1000){

                                        $round = floor($amount/300);

                                        $coin = $round*100;

                                        \DB::table('tb_users')->where('id', $userid)->increment('coins',$coin);

                                        \SiteHelpers::tranHistory($userid, 0, 0,0, 'ฝากเงินได้รับเพรช '.$coin.' เพรช', 'success', $request);

                           	 		}elseif($amount>=1000){

                           	 			$coin = 500;

                                        \DB::table('tb_users')->where('id', $userid)->increment('coins',$coin);

                                        \SiteHelpers::tranHistory($userid, 0, 0,0, 'ฝากเงินได้รับเพรช '.$coin.' เพรช', 'success', $request);


                           	 		}

                           	 		if($bonus_mode==2){


	                           	 		$promotion_user = \DB::table('promotions_current_user')->where('user_id','=',$userid)->first();
	                                    
	                                    $addamount = ($promotion_user->value/100)*$amount;

	                                    if($addamount>$promotion_user->max_bonus)
	                                    {
	                                        $addamount=$promotion_user->max_bonus;
	                                    }

	                                    $newamount = $amount+$addamount;

	                                    $credit_before = $userbalance;

	                                    $credit_after = $userbalance+$newamount;

	                                    $turnover = $credit_after*2;

	       								\DB::table('promotions_current_user')->where('user_id', $userid)->update(['turnover' => $turnover,'credit_before' => $credit_before,'credit_after' => $credit_after,'credit_additional' => $addamount]);

                                    
										\DB::connection('mysql2')->table('tb_users')->where('gameusername', $gameusername)->update(['balance' => \DB::raw('balance + '.$newamount)]);
										\DB::table('tb_users')->where('gameusername', $gameusername)->update(['balance' => $credit_after]);

	                                    \SiteHelpers::tranHistory( $userid, $credit_before, $credit_after, $addamount, 'เพิ่มโบนัสอัตโนมัติ', 'success', $request);

		                            }else{

\DB::connection('mysql2')->table('tb_users')->where('gameusername', $gameusername)->update(['balance' => \DB::raw('balance + '.$amount),'turnover' => $userbalance+$amount]);

\DB::table('tb_users')->where('gameusername', $gameusername)->update(['balance' => $userbalance+$amount,'turnover' => $userbalance+$amount]);

		                            }
									
								
						}
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

}