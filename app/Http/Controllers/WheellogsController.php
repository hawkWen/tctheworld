<?php namespace App\Http\Controllers;

use App\Models\Wheellogs;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;
use Validator, Input, Redirect ; 

class WheellogsController extends Controller {

	protected $layout = "layouts.main";
	protected $data = array();	
	public $module = 'wheellogs';
	static $per_page	= '10';
	
	public function __construct() 
	{
		parent::__construct();
		$this->model = new Wheellogs();
		
		$this->info = $this->model->makeInfo( $this->module);
		$this->access = array();
	
		$this->data = array(
			'pageTitle'			=> 	$this->info['title'],
			'pageNote'			=>  $this->info['note'],
			'pageModule'		=> 'wheellogs',
			'pageUrl'			=>  url('wheellogs'),
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

	function postAddwheelresult( Request $request ) 
	{
			$userid = \Auth::user()->id;

				$gameusername = \Auth::user()->gameusername;

				$balanceuser = \DB::connection('mysql2')->table('tb_users')->where('gameusername', '=', $gameusername)->first();

				$userbalance = $balanceuser->balance;

				$userbonus = $balanceuser->bonus;

			$usercoins = \Auth::user()->coin;


			if($userbalance>50){
				return response()->json(['status' => 'error', 'message' => 'คุณต้องมีเครดิตต่ำกว่า 50 ถึงจะหมุนได้' ]);
				exit();
			}

			//$coin = $request->input('coin');wheelsetting
			$wheelsetting = \DB::table('wheelsetting')->get();
			

			$fruits = array();

			foreach ($wheelsetting as $key => $value) {
				$fruits[$value->value] = $value->percent;
			}
			/*echo '<pre>';
			print_r($fruits);
			echo '</pre>';*/

			///$fruits = array('0' => '40','5' => '40', '10' => '7', '25' => '4.98', '50' => '1.41', '100' => '1', '250' => '0.5', '500' => '0.1', '1000' => '0.01');

			$newFruits = array();
			foreach ($fruits as $fruit=>$value)
			{
			    $newFruits = array_merge($newFruits, array_fill(0, $value, $fruit));
			}

			$coin = $newFruits[array_rand($newFruits)];

		

			if($usercoins<100){

				\DB::table('wheel_logs')->insert(
								     array(
												'user_id' => $userid,
												'coins' =>  $coin

								     )
								);

				\DB::table('tb_users')->where('gameusername', $gameusername)->update(['balance' => $userbalance+$coin]);
				\DB::connection('mysql2')->table('tb_users')->where('gameusername', $gameusername)->update(['balance' => \DB::raw('balance + '.$coin)]);

				\DB::table('tb_users')->where('id', $userid)->decrement('coins',100);

				$user = \DB::table('tb_users')->where('id', $userid)->first();

				return response()->json(['status' => 'success', 'message' => 'คุณได้รับ '.$coin.' เครดิต','coin_wheel' => $coin,'current_balance' => $user->balance,'current_coin' => $user->coins,'coins_text' => number_format($user->coins),'balance_text' => number_format($user->balance) ]);
			}else{
				return response()->json(['status' => 'error', 'message' => 'คนไม่มีสิทธิ' ]);
			}

	}		

}