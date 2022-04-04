<?php namespace App\Http\Controllers;

use App\Models\Getreturn;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;
use Validator, Input, Redirect ; 


class GetreturnController extends Controller {

	protected $layout = "layouts.main";
	protected $data = array();	
	public $module = 'getreturn';
	static $per_page	= '50';

	public function __construct()
	{
		
		parent::__construct();
		$this->model = new Getreturn();
		$this->info = $this->model->makeInfo( $this->module);
		$this->access = array();
	
		$this->data = array_merge(array(
			'pageTitle'	=> 	$this->info['title'],
			'pageNote'	=>  $this->info['note'],
			'pageModule'=> 'getreturn',
			'return'	=> self::returnUrl()
			
		),$this->data);


		
	}

	public function index( Request $request )
	{
		// Make Sure users Logged 
		if(!\Auth::check()) 
			return redirect('user/login')->with('status', 'error')->with('message','You are not login');
		$this->grab( $request) ;
		if($this->access['is_view'] ==0) 
			return redirect('dashboard')->with('message', __('core.note_restric'))->with('status','error');				
		// Render into template
		return view( $this->module.'.index',$this->data);
	}	
	function show( Request $request , $id ) 
	{
		/* Handle import , export and view */
		$task =$id ;
		switch( $task)
		{

			case 'export':
				return $this->getExport( $request );
				break;
	
		}
	}


	function postAddclaimwinloss( Request $request ) 
	{

		$userid = \Auth::user()->id;

		$username = \Auth::user()->username;

		$userbalance = \Auth::user()->balance;
		$bonus_mode = \Auth::user()->bonus_mode;


		if($bonus_mode==1){
				return response()->json(['status' => 'error', 'message' => 'ต้องออกจากโปรก่อนรับเงินคืน' ]);
						exit();
		}

		$yesterday = date("Y-m-d", strtotime("-1 day"));

		$users_return = \DB::table('users_turnover')->where('user_id','=',$userid)->where('date','=',$yesterday)->first();

		if($users_return->winloss<300){
			return response()->json(['status' => 'error', 'message' => 'ต้องมียอดเสียอย่างน้อย 300 บาท' ]);
						exit();
		}elseif($users_return->get_wl_nopro>0){
			return response()->json(['status' => 'error', 'message' => 'คุณได้รับยอดเสียของวันนี้ไปแล้ว' ]);
						exit();
		}else{


			$cashback = $users_return->winloss*0.1;

			\DB::table('tb_users')->where('id', $userid)->update(['balance' => \DB::raw('balance + '.$cashback)]);

			\DB::table('users_turnover')->where('user_id', $userid)->where('date','=',$yesterday)->update(['get_wl_nopro' => $cashback]);


			\SiteHelpers::tranHistory( $userid, $userbalance, $userbalance+$cashback, $cashback, 'รับยอดเสีย 10%', 'success', $request);

			return response()->json(['status' => 'success', 'message' => 'ได้รับ '.$cashback.' เครดิตแล้ว <br>สามารถตรวจสอบข้อมูลเครดิตได้ที่หน้าบันทึกรายการ' ]);

		}

	}
		
}