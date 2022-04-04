<?php namespace App\Http\Controllers;

use App\Models\Affiliate;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;
use Validator, Input, Redirect ; 

class AffiliateController extends Controller {

	protected $layout = "layouts.main";
	protected $data = array();	
	public $module = 'affiliate';
	static $per_page	= '10';
	
	public function __construct() 
	{
		parent::__construct();
		$this->model = new Affiliate();
		$this->modelview = new  \App\Models\Level();
		$this->info = $this->model->makeInfo( $this->module);
		$this->access = array();
	
		$this->data = array(
			'pageTitle'			=> 	$this->info['title'],
			'pageNote'			=>  $this->info['note'],
			'pageModule'		=> 'affiliate',
			'pageUrl'			=>  url('affiliate'),
			'return' 			=> 	self::returnUrl()	
		);		
		$this->data['subgrid']	= (isset($this->info['config']['subgrid']) ? $this->info['config']['subgrid'][0] : array()); 		
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
		
		$id = ''; 	
	 	$relation_key = $this->modelview->makeInfo($this->info['config']['subform']['module']);
	 	$this->data['accesschild'] = $this->modelview->validAccess($relation_key['id'] , session('gid'));	
	 	$this->data['relation_key'] = $relation_key['key'];
	 	$this->data['subform'] = $this->detailview($this->modelview ,  $this->info['config']['subform'] ,$id );
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
		
		$id = ''; 	
	 	$relation_key = $this->modelview->makeInfo($this->info['config']['subform']['module']);
	 	$this->data['accesschild'] = $this->modelview->validAccess($relation_key['id'] , session('gid'));	
	 	$this->data['relation_key'] = $relation_key['key'];
	 	$this->data['subform'] = $this->detailview($this->modelview ,  $this->info['config']['subform'] ,$id );
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
					$this->detailviewsave( $this->modelview , $request->all() ,$this->info['config']['subform'] , $id) ;
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


	function postAddpromotionrefer( Request $request ) 
	{
	
				$userid = \Auth::user()->id;

				$userbalance = \Auth::user()->balance;

				$bonusmode = \Auth::user()->bonus_mode;

				$bonususername = \Auth::user()->bonususername;
				
				$ref_bonus = $request->input('ref_bonus');

				$amount = $request->input('amount');

				

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

				if($bonusmode==0){

					$promotion = \DB::table('promotions')->where('promotion_category_id','=',11)->first();

							$status = 'wait';
							if($promotion->promotion_type=='auto'){
								$status = 'confirmed';
							}else{
								$status = 'wait';
							}

							$round = 1;

							$turnover = $promotion->turnover;

							$credit_before = $userbalance;

	

							$deposit_amount = 0;
							$value = $amount;

							$credit_amount = $userbalance;	


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
							
					

								
									
								 	\DB::table('tb_users')->where('id', $userid)->update(['bonus' => $value,'balance' => $credit_amount,'bonus_mode' => 1]);

								 	\DB::table('tb_users')->where('id', $ref_bonus)->update(['ref_bonus' => 1]);

								 	return response()->json(['status' => 'success', 'message' => 'ร่วมโปรโมชั่นสำเร็จ' ]);

						

				}else{
					return response()->json(['status' => 'error', 'message' => 'ไม่สามารถรับโปรโมชั่นซ้อนกันได้' ]);
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
		//	\DB::table('affiliate_level')->whereIn('affiliate_id',$request->input('ids'))->delete();
			\SiteHelpers::auditTrail( $request , "ID : ".implode(",",$request->input('ids'))."  , Has Been Removed Successfull");
			// redirect
        	return ['message'=>__('core.note_success_delete'),'status'=>'success'];	
	
		} else {
			return ['message'=>__('No Item Deleted'),'status'=>'error'];				
		}

	}		

}