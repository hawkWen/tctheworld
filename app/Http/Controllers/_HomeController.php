<?php  namespace App\Http\Controllers;

use App\Models\Post;
use App\Library\Markdown;
use Mail;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;
use Validator, Input, Redirect ; 

class HomeController extends Controller {

	public function __construct()
	{
		parent::__construct();

		$this->data['pageLang'] = 'en';
		if(\Session::get('lang') != '')
		{
			$this->data['pageLang'] = \Session::get('lang');
		}	
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index( Request $request) 
	{


        \App::setLocale(\Session::get('lang'));

		if(config('sximo.cnf_front') =='false' && $request->segment(1) =='' ) :
			return redirect('dashboard');
		endif; 	

		//print_r( config('sximo'));

		$page = $request->segment(1);
		\DB::table('tb_pages')->where('alias',$page)->update(array('views'=> \DB::raw('views+1')));

		$this->data['pageactive'] = $page;
		if($page !='') {


			$sql = \DB::table('tb_pages')->where('alias','=',$page)->where('status','=','enable')->get();
			$row = $sql[0];
		if($page =='home') {
			if(file_exists(base_path().'/resources/views/layouts/desktop/template/'.$row->filename.'.blade.php') && $row->filename !='')
			{
				$page_template = 'layouts.desktop.template.'.$row->filename;
			} else {
				$page_template = 'layouts.desktop.template.page';
			}	

		}else{
			if(file_exists(base_path().'/resources/views/layouts/'.config('sximo.cnf_theme').'/template/'.$row->filename.'.blade.php') && $row->filename !='')
			{
				$page_template = 'layouts.'.config('sximo.cnf_theme').'.template.'.$row->filename;
			} else {
				$page_template = 'layouts.'.config('sximo.cnf_theme').'.template.page';
			}
		}



			if($row->access !='')
			{
				$access = json_decode($row->access,true);	
			} else {
				$access = array();
			}	

			// If guest not allowed 
			//if($row->allow_guest !=1)
			//{	
				$group_id = \Session::get('gid');		

				if($group_id==4){
					$group_id = 1;
				}		
				$isValid =  (isset($access[$group_id]) && $access[$group_id] == 1 ? 1 : 0 );	
				if($isValid ==0)
				{
					return redirect('')
						->with(['message' => __('core.note_restric') ,'status'=>'error']);				
				}
			//}





			if(!empty(\Auth::user()->id)){

			$promotions_current_user = \DB::table('promotions_current_user')
			            ->join('promotions', 'promotions_current_user.promotion_id', '=', 'promotions.id')
			            ->select('promotions_current_user.*', 'promotions.promotion_name')
			            ->where('promotions_current_user.user_id','=',\Auth::user()->id)
			            ->first();
				
				

				
					$this->data['promotions_current_user'] = $promotions_current_user;
			
			}

			if($page=='promotion'){

				$promotions_history_user_1_times = \DB::table('promotions_history_users')
						->where([
    						['user_id', '=', \Auth::user()->id],
    						['get_times', '=', 1],
						])->get();

				$notin = array();
				$key=0;
				if($promotions_history_user_1_times->count()>0){
					foreach ($promotions_history_user_1_times as $key => $value) {
						$notin[$key] = $value->promotion_id;
					}
				}else{
					$notin = [0];
				}

				$promotions_history_user_2_times = \DB::table('promotions_history_users')
						->whereRaw('promotion_id in (24,25,26,27,28) and user_id = '.\Auth::user()->id)
						->orderBy('id', 'DESC')
						->get();
				
				if($promotions_history_user_2_times->count()==0){
					$key++;
					$notin[$key] = 25;
					$key++;
					$notin[$key] = 26;
					$key++;
					$notin[$key] = 27;
					$key++;
					$notin[$key] = 28;
				}else{

					if($promotions_history_user_2_times[0]->promotion_id==24){
						$key++;
						$notin[$key] = 24;
						$key++;
						$notin[$key] = 26;
						$key++;
						$notin[$key] = 27;
						$key++;
						$notin[$key] = 28;
					}elseif($promotions_history_user_2_times[0]->promotion_id==25){
						$key++;
						$notin[$key] = 24;
						$key++;
						$notin[$key] = 25;
						$key++;
						$notin[$key] = 27;
						$key++;
						$notin[$key] = 28;
					}elseif($promotions_history_user_2_times[0]->promotion_id==26){
						$key++;
						$notin[$key] = 24;
						$key++;
						$notin[$key] = 25;
						$key++;
						$notin[$key] = 26;
						$key++;
						$notin[$key] = 28;
					}elseif($promotions_history_user_2_times[0]->promotion_id==27){
						$key++;
						$notin[$key] = 24;
						$key++;
						$notin[$key] = 25;
						$key++;
						$notin[$key] = 26;
						$key++;
						$notin[$key] = 27;
					}elseif($promotions_history_user_2_times[0]->promotion_id==28){
						$key++;
						$notin[$key] = 28;
						$key++;
						$notin[$key] = 25;
						$key++;
						$notin[$key] = 26;
						$key++;
						$notin[$key] = 27;
					}
					
				}

				/*$promotions_history_user_3_times = \DB::table('promotions_history_users')
						->whereRaw('promotion_id in (7,18) and user_id = '.\Auth::user()->id.' and Date(date_time) = CURDATE()')
						->orderBy('promotion_id', 'DESC')
						->get();
					$key++;
				if($promotions_history_user_3_times->count()==0){
					$notin[$key] = 18;
				}else{
					$notin[$key] = 7;
				}*/

			
				
				$this->data['promotions'] = \DB::table('promotions')->whereNotIn('id', $notin)->whereNotIn('active', [0])->whereNotIn('promotion_category_id',[9,15,12])->orderBy('id', 'DESC')->get();

				/*$countpro = array();
				foreach ($this->data['promotions'] as $key => $value) {
					
					$cc = \DB::table('promotions_history_users')->where('promotion_id', $value->id)->get();
					$countpro[$value->id] =  $cc->count();
				}

				$this->data['countpro'] = $countpro;*/
				

				//$promotions_history_user = \DB::table('promotions_history_users')->where('user_id','=',\Auth::user()->id)->get();
				$promotions_history_user = \DB::table('promotions_history_users')
			            ->join('promotions', 'promotions_history_users.promotion_id', '=', 'promotions.id')
			            ->select('promotions_history_users.*', 'promotions.promotion_name')
			            ->where('promotions_history_users.user_id','=',\Auth::user()->id)
			            ->get();



				if($promotions_history_user->count()==0){
					$this->data['promotions_history_user'] = 0;
				}else{
					$this->data['promotions_history_user'] = $promotions_history_user;
				}
				
			}elseif($page=='mission'){


				$notin = array();

				if(!empty(\Auth::user()->id)){

					$promotions_history_user_1_times = \DB::table('promotions_history_users')
							->where([
	    						['user_id', '=', \Auth::user()->id],
	    						['get_times', '=', 1],
							])->get();

					
					$key=0;


					if($promotions_history_user_1_times->count()>0){
						foreach ($promotions_history_user_1_times as $key => $value) {
							$notin[$key] = $value->promotion_id;
						}
					}else{
						$notin = [0];
					}

				}

				/*$promotions_history_user_3_times = \DB::table('promotions_history_users')
						->whereRaw('promotion_id = 7 and user_id = '.\Auth::user()->id.' and Date(date_time) = CURDATE()')
						->get();
					$key++;
				if($promotions_history_user_3_times->count()==0){
					$notin[$key] = 18;
				}else{
					$notin[$key] = 7;
				}*/


				
				$this->data['promotions'] = \DB::table('promotions')->whereNotIn('id', $notin)->where([
					['promotion_category_id','=',9],
					['active','=',1]
				])->get();


/*
				$countpro = array();

				foreach ($this->data['promotions'] as $key => $value) {
					
					$cc = \DB::table('promotions_history_users')->where('promotion_id', $value->id)->get();

					$countpro[$value->id] =  $cc->count();
				}
				

				$this->data['countpro'] = $countpro;
				//$promotions_history_user = \DB::table('promotions_history_users')->where('user_id','=',\Auth::user()->id)->get();
				/*if(!empty(\Auth::user()->id)){
					$promotions_history_user = \DB::table('promotions_history_users')
				            ->join('promotions', 'promotions_history_users.promotion_id', '=', 'promotions.id')
				            ->select('promotions_history_users.*', 'promotions.promotion_name')
				            ->where('promotions_history_users.user_id','=',\Auth::user()->id)
				            ->get();



					if($promotions_history_user->count()==0){
						$this->data['promotions_history_user'] = 0;
					}else{
						$this->data['promotions_history_user'] = $promotions_history_user;
					}

				}*/
				
			}elseif($page=='mytransinfo'){

				$deposit_data = \DB::table('deposit')->where('user_id','=',\Auth::user()->id)->get();

				if($deposit_data->count()==0){
					$this->data['deposit_data'] = 0;
				}else{
					$this->data['deposit_data'] = $deposit_data;
				}


				$withdraw_data = \DB::table('withdraw')->where('user_id','=',\Auth::user()->id)->get();

				if($withdraw_data->count()==0){
					$this->data['withdraw_data'] = 0;
				}else{
					$this->data['withdraw_data'] = $withdraw_data;
				}
				
			}elseif($page=='transaction'){

				$deposit_data = \DB::table('deposit')->where('deposit_id','=',$request->input('txid'))->get();

				if($deposit_data->count()==0){
					$this->data['deposit_data'] = 0;
				}else{
					$this->data['deposit_data'] = $deposit_data[0];
				}


			}elseif($page=='mission-detail'){

				$mission_data = \DB::table('promotions')->where('id','=',$request->input('id'))->get();

				if($mission_data->count()==0){
					$this->data['mission_data'] = 0;
				}else{
					$this->data['mission_data'] = $mission_data[0];
				}

				$cc = \DB::table('promotions_history_users')->where('promotion_id', $mission_data[0]->id)->get();
					$this->data['count_mission'] =  $cc->count();

					$this->data['title'] = $mission_data[0]->promotion_name;


			}elseif($page=='games'){


				if(!empty($request->input('partner')) && $request->input('partner') <> 'all'){
					$games_data = \DB::table('gamelists')->where('active','=',1)->orderBy('gameid', 'DESC')->where('partner','=',$request->input('partner'))->limit(30)->get();
				}else{
					$games_data = \DB::table('gamelists')->where('active','=',1)->limit(30)->orderBy('gameid', 'DESC')->get();
				}

				$partners_data = \DB::table('game_partners')->where('active','=',1)->get();

				$this->data['partners_data'] = $partners_data;
				
			/*	$games_new_data = \DB::table('gamelists')->orderBy('name', 'asc')->where('active','=',1)->where('game_category_id','like','%2%')->limit(12)->get();

				$games_hot_data = \DB::table('gamelists')->orderBy('name', 'asc')->where('active','=',1)->where('game_category_id','like','%3%')->limit(12)->get();

				$games_jackpot_data = \DB::table('gamelists')->orderBy('name', 'asc')->where('active','=',1)->where('game_category_id','like','%4%')->limit(12)->get();

				$games_freespin_data = \DB::table('gamelists')->orderBy('name', 'asc')->where('active','=',1)->where('game_category_id','like','%9%')->limit(12)->get();

				$games_recom_data = \DB::table('gamelists')->orderBy('name', 'asc')->where('active','=',1)->where('game_category_id','like','%10%')->limit(12)->get();*/
				
				$game_category = \DB::table('game_category')->get();

				$this->data['game_category'] = $game_category;
				$this->data['game_category_count'] = $game_category->count();

				$this->data['games_data'] = $games_data;
				$this->data['games_count'] = $games_data->count();

				/*$this->data['games_new_data'] = $games_new_data;
				$this->data['games_new_count'] = $games_new_data->count();

				$this->data['games_hot_data'] = $games_hot_data;
				$this->data['games_hot_count'] = $games_hot_data->count();

				$this->data['games_jackpot_data'] = $games_jackpot_data;
				$this->data['games_jackpot_count'] = $games_jackpot_data->count();

				$this->data['games_freespin_data'] = $games_freespin_data;
				$this->data['games_freespin_count'] = $games_freespin_data->count();

				$this->data['games_recom_data'] = $games_recom_data;
				$this->data['games_recom_count'] = $games_recom_data->count();*/

				
				$this->data['partners_data'] = $partners_data;
				
				$game_type = \DB::table('game_type')->get();
				$this->data['game_type'] = $game_type;
				$this->data['game_type_count'] = $game_type->count();
				

				$game_categories_data = \DB::table('game_category')->get();

				$this->data['game_categories_data'] = $game_categories_data;
				$this->data['game_categories_count'] = $game_categories_data->count();
				$this->data['req_partner'] = $request->input('partner');

			}elseif($page=='referral'){

				$referral_data = \DB::table('tb_users')->where('ref','=',\Auth::user()->id)->get();

				$referral = array();
				$referralcount = 0;
				foreach($referral_data as $key => $value){
					$referralcount++;
					$refdata = \DB::table('promotions_history_users')->where([
							['user_id','=',$value->id]
						])->orderBy('id', 'ASC')->first();

					$depositamount = 0;
					$status = 'n';
					if(!empty($refdata)&&$value->ref_bonus==1){

						$status = 'c';

					}elseif(!empty($refdata)&&$value->ref_bonus==0){

						if($refdata->promotion_id==81){
							$depositamount=($refdata->deposit_amount/2);
							$status = 'y';

							if($refdata->id>21329){
								if($depositamount>300){
									$depositamount=300;
								}
							}
						}elseif($refdata->promotion_id==184||$refdata->promotion_id==186){
							$depositamount=($refdata->deposit_amount/2);
							$status = 'y';
								if($depositamount>300){
									$depositamount=300;
								}
						}else{
							$status = 'e';
						}
					}else{
						$status = 'n';
					}
					$referral[$key]['amount'] = $depositamount;
					$referral[$key]['username'] = $value->username;
					$referral[$key]['user_id'] = $value->id;
					$referral[$key]['status'] = $status;
					$referral[$key]['created_at'] = $value->created_at;
				}

				$this->data['referral_data'] = json_decode(json_encode($referral));
				$this->data['referral_count'] = $referralcount;


			}elseif($page=='wheel'){

				$coins = \DB::table('tb_users')->select('coins')->where('id','=',\Auth::user()->id)->first();

				$wheel_logs = \DB::table('wheel_logs')->where('user_id','=',\Auth::user()->id)->offset(0)
                ->limit(5)
                ->orderBy('id','desc')
                ->get();
			
					$this->data['coins'] = $coins->coins;
				if($wheel_logs->count()>0){
					$this->data['wheel_logs'] = $wheel_logs;
				}

				$this->data['wheelsetting'] = \DB::table('wheelsetting')->get();

 
			}elseif($page=='cashback'){

				$yesterday = date("Y-m-d", strtotime("-1 day"));

				$cashback = \DB::table('users_turnover')->where('user_id','=',\Auth::user()->id)->where('date','=',$yesterday)->first();

				
			
					$this->data['cashback'] = $cashback;
			


			}elseif($page=='shop'){

			

				$shop = \DB::table('products')->where('active','=',1)->get();

				
			
					$this->data['shop'] = $shop;
			


			}

			$bankuser = \DB::table('banks')->where('bank_id','=',\Auth::user()->bank)->first();

			
			
			$this->data['bankuser'] = $bankuser;
			$this->data['pages'] = $page_template;		
			if($page!='mission-detail'){			
				
				$this->data['title'] = $row->title ;
			}
			$this->data['subtitle'] = $row->sinopsis ;
			$this->data['pageID'] = $row->pageID ;
			$this->data['content'] = \PostHelpers::formatContent($row->note);
			$this->data['note'] = $row->note;
			$this->data['user'] = \Auth::user();
			$site_settings = \DB::table('site_settings')->get();

			$site_setting_values = array();

			foreach ($site_settings as $key => $value) {
				$site_setting_values[$value->key] = $value->value;
			}

			$this->data['site_settings'] = (object) $site_setting_values;

			$bank_web = \DB::table('bank_web')->get();
			$this->data['bank_web'] = $bank_web;

			if($row->template =='frontend'){
				/*if($page =='home') {
					$page = 'layouts.desktop.index';
				}elseif($page =='games') {
					$page = 'layouts.default.homegamelist';
				}else{
					$page = 'layouts.'.config('sximo.cnf_theme').'.index';
				}*/

				if($page =='home') {
					$page = 'layouts.desktop.index';
				}else{
					$page = 'layouts.'.config('sximo.cnf_theme').'.index';
				}
				
				return view( $page, $this->data);
			}
			else {
				
				return view( $page_template, $this->data);
				
			}
			
						
		}
		else {
			$sql = \DB::table('tb_pages')->where('default','1')->get();
			if(count($sql)>=1)
			{
				// If guest not allowed 
				$row = $sql[0];

				if($row->access !='')
				{
					$access = json_decode($row->access,true)	;	
				} else {
					$access = array();
				}	

				if($row->allow_guest !=1)
				{	
					$group_id = \Session::get('gid');		
					if($group_id==4){
					$group_id = 1;
				}				
					$isValid =  (isset($access[$group_id]) && $access[$group_id] == 1 ? 1 : 0 );	
			
				
					if($isValid==0)
					{
						return redirect('user/login');	//->with(['message' => __('core.note_restric') ,'status'=>'error'])			
					}
				}

				$promotions_current_user = \DB::table('promotions_current_user')
			            ->join('promotions', 'promotions_current_user.promotion_id', '=', 'promotions.id')
			            ->select('promotions_current_user.*', 'promotions.promotion_name')
			            ->where('promotions_current_user.user_id','=',\Auth::user()->id)
			            ->first();
			           
			            if(!empty($promotions_current_user)){

			            	if($promotions_current_user->turn_type=='turn'){
			            		$userturn = 0;
			            		
				            	$stdate = $promotions_current_user->date_time;

				            

								$nowdate = date("Y-m-d H:i:s");

								$userturn = \DB::table('game_histories')->where([
									['user_id','=',\Auth::user()->id],
									['bonus_mode','=',1]
								])->whereBetween('systemdate',[$stdate, $nowdate])->sum('bet_amount');

								

								$this->data['userturn'] = $userturn;
							}

			            }
			            
				

			
					$this->data['promotions_current_user'] = $promotions_current_user;
			

				$this->data['title'] = $row->title ;
				$this->data['subtitle'] = $row->sinopsis ;
				if(file_exists(base_path().'/resources/views/layouts/'.config('sximo.cnf_theme').'/template/'.$row->filename.'.blade.php') && $row->filename !='')
				{
					$page_template = 'layouts.'.config('sximo.cnf_theme').'.template.'.$row->filename;
				} else {
					$page_template = 'layouts.'.config('sximo.cnf_theme').'.template.page';
				}				
				$balanceuser = \DB::table('banks')->where('bank_id','=',\Auth::user()->bank)->first();
				$site_settings = \DB::table('site_settings')->get();

				$site_setting_values = array();

				foreach ($site_settings as $key => $value) {
					$site_setting_values[$value->key] = $value->value;
				}

				$this->data['site_settings'] = (object) $site_setting_values;
				$bank_web = \DB::table('bank_web')->get();
				$this->data['bank_web'] = $bank_web;
				$this->data['bankuser'] = $balanceuser;
				$this->data['pages'] = $page_template;
				$this->data['pageID'] = $row->pageID ;
				$this->data['content'] = \PostHelpers::formatContent($row->note);
				$this->data['note'] = $row->note;
				$this->data['user'] = \Auth::user();
				$page = 'layouts.'.config('sximo.cnf_theme').'.index';


				return view( $page, $this->data);	

			} else {
				return 'Please Set Default Page';
			}	
		}
	}
	
	public function  getLang( Request $request , $lang='en')
	{
		$request->session()->put('lang', $lang);
		return  Redirect::back();
	}

	public function  getSkin($skin='sximo')
	{
		\Session::put('themes', $skin);
		return  Redirect::back();
	}		


	public function submit( Request $request )
	{
		$formID = $request->input('form_builder_id');

		$rows = \DB::table('tb_forms')->where('formID',$formID)->get();
		if(count($rows))
		{
			$row = $rows[0];
			$forms = json_decode($row->configuration,true);
			$content = array();
			$validation = array();
			foreach($forms as $key=>$val)
			{
				$content[$key] = (isset($_POST[$key]) ? $_POST[$key] : ''); 
				if($val['validation'] !='')
				{
					$validation[$key] = $val['validation'];
				}
			}
			
			$validator = Validator::make($request->all(), $validation);	
			if (!$validator->passes()) 
					return redirect()->back()->with(['status'=>'error','message'=>'Please fill required input !'])
							->withErrors($validator)->withInput();

			
			if($row->method =='email')
			{
				// Send To Email
				$data = array(
					'email'		=> $row->email ,
					'content'	=> $content ,
					'subject'	=> "[ " .config('sximo.cnf_appname')." ] New Submited Form ",
					'title'		=> $row->name 			
				);
			
				if( config('sximo.cnf_mail') =='swift' )
				{ 				
					\Mail::send('sximo.form.email', $data, function ( $message ) use ( $data ) {
			    		$message->to($data['email'])->subject($data['subject']);
			    	});		

				}  else {

					$message 	 = view('sximo.form.email', $data);
					$headers  	 = 'MIME-Version: 1.0' . "\r\n";
					$headers 	.= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
					$headers 	.= 'From: '. config('sximo.cnf_appname'). ' <'.config('sximo.cnf_email').'>' . "\r\n";
						mail($data['email'], $data['subject'], $message, $headers);	
				}
				
				return redirect()->back()->with(['status'=>'success','message'=> $row->success ]);

			} else {
				// Insert into database 
				\DB::table($row->tablename)->insert($content);
				return redirect()->back()->with(['status'=>'success','message'=>  $row->success  ]);
			
			}
		} else {

			return redirect()->back()->with(['status'=>'error','message'=>'Cant process the form !']);
		}


	}

	public function getLoad()
	{	
		$result = \DB::table('tb_notification')->where('userid',\Session::get('uid'))->where('is_read','0')->orderBy('created','desc')->limit(5)->get();

		$data = array();
		$i = 0;
		foreach($result as $row)
		{
			if(++$i <=10 )
			{
				if($row->postedBy =='' or $row->postedBy == 0)
				{
					$image = '<img src="'.asset('uploads/images/system.png').'" border="0" width="30" class="img-circle" />';
				} 
				else {
					$image = \SiteHelpers::avatar('30', $row->postedBy);
				}
				$data[] = array(
						'url'	=> $row->url,
						'title'	=> $row->title ,
						'icon'	=> $row->icon,
						'image'	=> $image,
						'text'	=> substr($row->note,0,100),
						'date'	=> date("d/m/y",strtotime($row->created))
					);
			}	
		}
	
		$data = array(
			'total'	=> count($result) ,
			'note'	=> $data
			);	
		 return response()->json($data);	
	}

	public function posts( Request $request ,  $category = '') 
	{

		$posts = \DB::table('tb_pages')
				->select('tb_pages.*','tb_users.username',\DB::raw('COUNT(commentID) AS comments'))
				->leftJoin('tb_users','tb_users.id','tb_pages.userid')
				->leftJoin('tb_comments','tb_comments.pageID','tb_pages.pageID')		
				->leftJoin('tb_categories','tb_categories.cid','tb_pages.cid')					
				->where('pagetype','post');
					/*
					if(!is_null($request->input('label'))){
						$keyword = trim($request->input('label'));
						$posts = $posts->where('labels', 'LIKE' , "%{$keyword}%%" ); 	
					}
					*/
	
				if( $category !=''  ) {
					$mode = 'category';
					$this->data['categoryDetail'] = Post::categoryDetail( $category );
					$posts = $posts->where('tb_categories.alias',$category )->paginate(10);					
				}
				else {
					$mode = 'all';

					$posts = $posts->groupBy('tb_pages.pageID')->paginate(10);
				}					

		$this->data['title']		= 'Post Articles';
		$this->data['posts']		= $posts;
		$this->data['pages']		= 'secure.posts.posts';
		$this->data['popular']		= Post::lists('popular');
		$this->data['headline']		= Post::lists('headline');
		$this->data['categories']		= Post::categories();
		$this->data['mode']			= $mode;


		$this->data['pages'] = 'layouts.'.config('sximo.cnf_theme').'.blog.index';	
		$page = 'layouts.'.config('sximo.cnf_theme').'.index';
		return view( $page , $this->data);	
	}

	public function read( Request $request , $read = '')  {

		$row = Post::read( $read );
	//	print_r($posts);exit;
		$comments = Post::comments( $row->pageID );
		$data = [
			'title'	=> $row->title ,
			'posts'	=> $row ,
			'comments'	=>  $comments ,
			'pages' => 'layouts.'.config('sximo.cnf_theme').'.blog.view',
			'popular'	=> Post::lists('popular') , 
			'categories'	=> Post::categories()
		];
		$page = 'layouts.'.config('sximo.cnf_theme').'.index';
		return view( $page , $data);	

	}



	public function comment( Request $request)
	{
		$rules = array(
			'comments'	=> 'required'
		);
		$validator = Validator::make($request->all(), $rules);	
		if ($validator->passes()) {

			$data = array(
					'userID'		=> \Session::get('uid'),
					'posted'		=> date('Y-m-d H:i:s') ,
					'comments'		=> $request->input('comments'),
					'pageID'		=> $request->input('pageID')
				);

			\DB::table('tb_comments')->insert($data);
			return redirect('posts/read/'.$request->input('alias'))
        		->with(['message'=>'Thank You , Your comment has been sent !','status'=>'success']);
		} else {
			return redirect('posts/'.$request->input('alias'))
				->with(['message'=>'The following errors occurred','status'=>'error']);	
		}
	}

	public function remove( Request $request, $pageID , $alias , $commentID )
	{
		if($commentID !='')
		{
			\DB::table('tb_comments')->where('commentID',$commentID)->delete();
			return redirect('posts/read/'.$alias)
				->with(['message'=>'Comment has been deleted !','status'=>'success']);
       
		} else {
			return redirect('posts/post/'.$alias)
				->with(['message'=>'Failed to remove comment !','status'=>'error']);
		}
	}

	public function set_theme( $id ){
		session(['set_theme'=> $id ]);
		return response()->json(['status'=>'success']);
	}


	function loadmoregames( Request $request ) 
	{
			$lseqno = $request->input('seqno');
			if($lseqno == 0){
				$lseqno = 30;
			}else{
				$lseqno = ($lseqno * 9) + 30;
			}
			
			if(!empty($request->input('partner')) && $request->input('partner') <> 'all'){
				$games_data_more = \DB::table('gamelists')->where('active','=',1)->orderBy('gameid', 'DESC')->where('partner','=',$request->input('partner'))->offset($lseqno)->limit(9)->get();
			}else{
				$games_data_more = \DB::table('gamelists')->where('active','=',1)->orderBy('gameid', 'DESC')->offset($lseqno)->limit(9)->get();
			}
			return response()->json($games_data_more);
	}	



}
