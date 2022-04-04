<?php namespace App\Http\Controllers;

use App\Http\Controllers;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\User;

class DashboardController extends Controller {

	public function __construct()
	{
		parent::__construct();
		
        $this->data = array(
            'pageTitle' =>  $this->config['cnf_appname'],
            'pageNote'  =>  'Welcome to Dashboard',
            
        );			
	}

	public function index( Request $request )
	{

		if(!\Auth::check()) 
			return redirect('user/login')->with('status', 'error')->with('message','You are not login');

		if(\Auth::user()->group_id==3)
			return redirect('user/login')->with('status', 'error')->with('message','You are not login');
		
		$yesterday = date("Y-m-d", strtotime("-1 day"));

		$this->data['bankweb'] = \DB::table('bank_web')->where('use','!=','none')->orderBy('id','DESC')->get();


		$useractive = \DB::table('tb_users')->whereRaw('date(`last_login`) = curdate()')->get();

		$usercreate = \DB::table('tb_users')->whereRaw('date(created_at) = curdate()')->get();

		//$this->data['winloss'] = \DB::table('users_turnover')->whereRaw('winloss > 299 and `date` =  "'.$yesterday.'"')->sum('winloss');

		$this->data['winloss'] = 0;

		//$this->data['get_winloss'] = \DB::table('users_turnover')->whereRaw('get_wl_nopro > 0 and `date` = "'.$yesterday.'"')->sum('get_wl_nopro');

		$this->data['get_winloss'] = 0;
		$true = \DB::table('bank_web')->where('use','=','truewallet')->first();


	$this->data['truetoday'] = 0;

		$this->data['useractive'] = $useractive->count();

		$this->data['usercreate'] = $usercreate->count();

		$this->data['allcredit'] = \DB::table('tb_users')->where('group_id','=',3)->sum('balance');

		$this->data['allbonus'] = \DB::table('tb_users')->where('group_id','=',3)->sum('bonus');

		$this->data['coins'] = \DB::table('wheel_logs')->whereRaw('date(`date_time`) = curdate()')->sum('coins');


	//	return redirect('user/login')->with('status', 'error')->with('message','You are not login');
		return view('dashboard.index',$this->data);
	}	


	


}