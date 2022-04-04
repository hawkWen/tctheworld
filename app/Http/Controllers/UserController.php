<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\User;
use App\Libary\SiteHelpers;
use Socialize;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;
use Validator, Input, Redirect ; 
use Illuminate\Support\Str;

class UserController extends Controller {

	
	protected $layout = "layouts.main";

	public function __construct() {
		parent::__construct();
		$this->data = array();

	} 

	public function getRegister(Request $request) {
        
		if(config('sximo.cnf_regist') =='false') :    
			if(\Auth::check()):
				 return redirect('')->with(['message'=>'Youre already login','status'=>'error']);
			else:
				 return redirect('user/login');
			  endif;			  
		else :
			if(!empty($request->input('ref'))){
				$this->data['ref'] =  $request->input('ref');
			}
				$this->data['socialize'] =  config('services');

				return view('user.register', $this->data);  
		 endif ;       
	}

	public function getVerify() {
        
		if(config('sximo.cnf_regist') =='false') :    
			if(\Auth::check()):
				 return redirect('')->with(['message'=>'Youre already login','status'=>'error']);
			else:
				 return redirect('user/login');
			  endif;			  
		else :

					return redirect('user/register');
		 endif ;        
	}

public function postOtp(Request $request) {
        
		if(config('sximo.cnf_regist') =='false') :    
			if(\Auth::check()):
				 return redirect('')->with(['message'=>'Youre already login','status'=>'error']);
			else:
				 return redirect('user/login');
			  endif;			  
		else :

				if($request->has('username')){
					$rules = array(
						'username'=>'required|digits:10|unique:tb_users'
					);
					$validator = Validator::make($request->all(), $rules);
				
					if ($validator->passes()) {
						//return redirect('user/verify')->with(['message'=>'ยืนยัน OTP','status'=>'success', $request->input('username')]);
						$this->data['username'] = $request->input('username');
						if(!empty($request->input('ref'))){
							$this->data['ref'] = $request->input('ref');
						}
						return view('user.otp', $this->data);  
					}else{
						return redirect('user/verify')->with(['message'=>'The following errors occurred','status'=>'error'])
				->withErrors($validator)->withInput();
					}

				}else{

					return redirect('user/verify');
				}
		 endif ;        
	}

	public function postOtpforgot(Request $request) {
        
		

				if($request->has('username')){
					$rules = array(
						'username'=>'required|digits:10'
					);
					$validator = Validator::make($request->all(), $rules);
				
					if ($validator->passes()) {
						//return redirect('user/verify')->with(['message'=>'ยืนยัน OTP','status'=>'success', $request->input('username')]);
						 $username = \DB::table('tb_users')->where('username','=',$request->input('username'))->first();

						 if($username==''){

						 	return response()->json(['status' => 'error', 'message' => 'ไม่มีเบอร์นี้' ]);
						 	exit();

						 }


						$this->data['username'] = $request->input('username');
						
						return view('user.otp2', $this->data);  

					}else{
						return redirect('user/otpforgot');
					}

				}else{

					return redirect('user/otpforgot');
				}    
	}

	public function postResetpass( Request $request , $token = '')
	{
		$rules = array(
			'password'=>'required|alpha_num|between:6,12|confirmed',
			'password_confirmation'=>'required|alpha_num|between:6,12'
			);		
		$validator = Validator::make($request->all(), $rules);
		if ($validator->passes()) {
			
			$user =  User::where('username','=',$request->input('username'));
			if($user->count() >=1)
			{
				$data = $user->get();
				$user = User::find($data[0]->id);
				$user->reminder = '';
				$user->password = \Hash::make($request->input('password'));
				$user->save();			
			}

			return response()->json(['status' => 'success', 'message' => 'เปลี่ยนรหัสผ่านสำเร็จ' ]);
		} else {
			return response()->json(['status' => 'error', 'message' => 'การเชื่อมต่อขัดข้องกรุณาลองใหม่ภายหลัง' ]);
		}	
	
	}




	public function postCreate( Request $request) {
	
		$rules = array(
			'username'=>'required|digits:10|unique:tb_users',
			'firstname'=>'required',
			'lastname'=>'required',
			'password'=>'required|between:6,20|confirmed',
			'password_confirmation'=>'required|between:6,20',
			'bank'=>'required',
			'account_number'=>'required|numeric|unique:tb_users'
		);	

		if($request->has('mobile')) {
			unset($rules['password_confirmation']);
			$rules['password'] = 'required|between:6,12';
		} 
		else {
			if(config('sximo.cnf_recaptcha') =='true') 
			{
				$return = $this->reCaptcha($request->all());
				if($return !== false)
				{
					if($return['success'] !='true')
					{
						return response()->json(['status' => $return['success'], 'message' =>'Invalid reCpatcha']);	
					}
					
				}
			}
		}

		$validator = Validator::make($request->all(), $rules);
		if ($validator->passes()) {




						
			$agent_lastid = User::latest('id')->first();

			if($agent_lastid==''){
				$agent_lastid = 1;
			}else{
				$agent_lastid = $agent_lastid->id+1;
			}
			

			$agent_newid = str_pad($agent_lastid,7,"0",STR_PAD_LEFT);


			$gameusername = config('sximo.cnf_comname').$agent_newid;


						$code = rand(10000,10000000);			
						$authen = new User;
						$authen->username = $request->input('username');
						$authen->first_name = $request->input('firstname');
						$authen->last_name = $request->input('lastname');
						$authen->email = trim($request->input('email'));
						$authen->lineid = trim($request->input('lineid'));
						$authen->channel = trim($request->input('channel'));
						$authen->bank = trim($request->input('bank'));
						$authen->account_number = trim($request->input('account_number'));
						$authen->line_userId = $request->input('line_userid');
						$authen->phone = $request->input('username');
						
						$authen->activation = $code;  
						$authen->group_id = $this->config['cnf_group'];
						$authen->agent_id = config('sximo.cnf_appdesc');

						$authen->password = \Hash::make($request->input('password'));

						$authen->gameusername = $gameusername;

						$authen->gamepassword = $request->input('password');

						$authen->bonususername = $authen->gameusername.'xmrdb';

						$authen->bonuspassword = $authen->gamepassword.'xmrdb';

						$authen->hash = md5($authen->gameusername);
		
						$authen->active = 1;
						
						

						$addplayer = \DB::connection('mysql2')->table('tb_users')->insert(
								     array(
												'hash' => $authen->hash,     
												'gameusername' => $authen->gameusername,
												'bonususername' => $authen->bonususername,
												'agent_id' => $authen->agent_id,
												'username' => $authen->username,
												'user_id' => $agent_lastid,
												'active' => $authen->active

								     	)
						);


						if(empty($addplayer)){

								return response()->json(['status' => 'error', 'message' => 'ไม่สามารถสมัครได้ในขณะนี้' ]);
								exit();

						}


						$authen->save();


						if(!empty($request->input('ref'))){

							$getref = \DB::table('tb_users')->where('id','=',$request->input('ref'))->first();

							if(!empty($getref)){

								$authen->ref = $getref->id;

								\DB::table('ref_relate')->insert(
								     array(
												'ref_user_id' => $getref->id,     
												'user_id' =>  $agent_lastid

								     )
								);

							}

						}

						$message = "ขอบคุณที่สมัคร สมาชิกกับเรา";  


						return response()->json(['status' => 'success', 'message' => $message ]);


		} else {
			
				return response()->json(['status' => 'error', 'message' => $validator->errors() ]);
			
			
		}
	}
	
	public function getActivation( Request $request  )
	{
		$num = $request->input('code');
		if($num =='')
			return redirect('user/login')->with(['message'=>'Invalid Code Activation!','status'=>'error']);
		
		$user =  User::where('activation','=',$num)->get();
		if (count($user) >=1)
		{
			\DB::table('tb_users')->where('activation', $num )->update(array('active' => 1,'activation'=>''));
			return redirect('user/login')->with(['message'=>'Your account is active now!','status'=>'success']);
			
		} else {
			return redirect('user/login')->with(['message'=>'Invalid Code Activation!','status'=>'error']);
		}
		
		
	
	}

	public function getLogin() {
	
		if(\Auth::check())
		{
			return redirect('')->with(['message'=>'success','Youre already login','status'=>'success']);

		} else {
			$this->data['socialize'] =  config('services');
			return View('user.login',$this->data);
			
		}	
	}

	public function reCaptcha( $request)
	{
		if(!is_null($request['g-recaptcha-response']))
        {
            $api_url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . config('sximo.cnf_recaptchaprivatekey') . '&response='.$request['g-recaptcha-response'];
            $response = @file_get_contents($api_url);
            $data = json_decode($response, true);
 
           return $data;
        }
        else
        {
           return false ;
        }		
	}

		public function postSignin( Request $request) {

		$rules = array(
			'username'=>'required',
			'password'=>'required',
		);		
		if(config('sximo.cnf_recaptcha') =='true') {
			$return = $this->reCaptcha($request->all());
			if($return !== false)
			{
				if($return['success'] !='true')
				{
					return response()->json(['status' => $return['success'], 'message' =>'Invalid reCpatcha']);	
				}
				
			}
		}
		$validator = Validator::make($request->all(), $rules);
		if ($validator->passes()) {	

			$remember = (!is_null($request->get('remember')) ? 'true' : 'false' );
			
			if (\Auth::attempt(array('username'=>$request->input('username'), 'password'=> $request->input('password') ), $remember ))
			{
				if(\Auth::check())
				{
					$row = User::find(\Auth::user()->id); 	
					if($row->active ==0)
					{
						// inactive 
						if($request->ajax() == true )
						{
							return response()->json(['status' => 'error', 'message' => 'Your Account is not active']);
						} else {
							\Auth::logout();
							return redirect('user/login')->with(['status' => 'error', 'message' => 'Your Account is not active']);
						}
						
					} else if($row->active==2)
					{

						if($request->ajax() == true )
						{
							return response()->json(['status' => 'error', 'message' => 'บัญชีนี้ถูกระงับกรุณาติดต่อเจ้าหน้าที่']);
						} else {
							// BLocked users
							\Auth::logout();
							return redirect('user/login')->with(['status' => 'error', 'message' => 'บัญชีนี้ถูกระงับกรุณาติดต่อเจ้าหน้าที่']);
						}
					} else {
						\DB::table('tb_users')->where('id', '=',$row->id )->update(array('last_login' => date("Y-m-d H:i:s")));
						$level = 99;
						$sql = \DB::table('tb_groups')->where('group_id' , $row->group_id )->get();
				        if(count($sql))
				        {
				            $l = $sql[0];
				            $level = $l->level ;
				        }

						$session = array(
							'gid' => $row->group_id,
							'uid' => $row->id,
							'eid' => $row->email,
							'll' => $row->last_login,
							'fid' =>  $row->first_name.' '. $row->last_name,
							'username' =>  $row->username ,
							'join'	=>  $row->created_at ,
							'level'	=> $level 
						);
						/* Set Lang if available */
						if(!is_null($request->input('language')))
						{
							$session['lang'] = $request->input('language');		
						} else {
							$session['lang'] = config('sximo.cnf_lang');
							
						}


						$userid = $row->id;


						$userinfo = \DB::table('tb_users')->where('id', '=',$row->id )->first();
						
						if($request->ajax() == true )
						{

							if($row->group_id==1||$row->group_id==2||$row->group_id==4) :
								return redirect('dashboard');						
							else :
								return response()->json(['status' => 'success', 'url' => url('')]);
							endif;	

						} 
						else {
							session($session);
							if($row->group_id==1||$row->group_id==2||$row->group_id==4) :
								return redirect('dashboard');						
							else :
								return redirect('');
							endif;	
						}				
					}	
				}		
				
			} 
			else {

				if($request->ajax() == true )
				{
					return response()->json(['status' => 'error', 'message' => 'Your username/password combination was incorrect']);
				} else {

					return redirect('user/login')
						->with(['status' => 'error', 'message' => 'Your username/password combination was incorrect'])
						->withInput();					
				}
			}
		} 
		else {

				if($request->ajax() == true)
				{
					return response()->json(['status' => 'error', 'message' => 'The following  errors occurred']);
				} else {

					return redirect('user/login')
						->with(['status' => 'error', 'message' => 'The following  errors occurred'])
						->withErrors($validator)->withInput();
				}	

		}	
	}

    public function postSigninMobile(  Request $request ) {
        $rules = array(
            'email'                 =>'required|email',
            'password'              =>'required'
        );  
        $validator = Validator::make($request->all(), $rules);
        if ($validator->passes()) {
            $email      =  trim($request->input('email')) ;
            $password   =  trim($request->input('password')) ;
            if (\Auth::attempt(array('email'=> $email, 'password'=> $password ))) {

                $row = User::find(\Auth::user()->id);   
                if($row->status =='0')
                {
                    return response()->json(['status' => 'error', 'message' => ' Your account is active yet ' ]);
                } 
                else if( $row->status == '2') {
                    return response()->json(['status' => 'error', 'message' => ' Your account is blocked / banned ' ]);
                } 
                else {
                   
                    $data = array(
                            'gid' => $row->group_id,
                            'uid' => $row->id,
                            'eid' => $row->email,
                            'll' => $row->last_login,
                            'fid' =>  $row->name,
                            'uname'     => $row->username ,
                            'logged_in' => true ,
                            'join'  =>  $row->created_at                             
                        );
                    if(file_exists('./uploads/users/'.$row->avatar ) && $row->avatar !='') {
                            $data['avatar'] = asset('uploads/users/'.$row->avatar) ;
                        } else {
                            $data['avatar'] =  asset('uploads/users/avatar.png') ;
                        }
                    $data['access'] = [];

                    $token =  hash('sha256',Str::random(60)) ;

                    \DB::table('tb_token')->insert([
                    	'userId'	=> $row->id ,
                    	'token'		=> $token ,
                    	'created'	=> date("Y-m-d H:i:s")
                	]);

                    return response()->json([
                        'status' => 'success', 
                        'message' => 'You are Logged',
                        'token'=> $token,
                        'data'   => $data
                    ]);
                }
            } 
            else {
                return response()->json(['status' => 'error', 'message' => 'Your username/password combination was incorrect']);
            }
        }
        else {
            return response()->json(['status' => 'error', 'message' => $validator->errors() ]);
        }
    }

	public function getProfile() {
		
		if(!\Auth::check()) return redirect('user/login');
		
		
		$info =	User::find(\Auth::user()->id);
		$this->data = array(
			'pageTitle'	=> 'My Profile',
			'pageNote'	=> 'View Detail My Info',
			'info'		=> $info,
		);
		return view('user.profile',$this->data);
	}

	public function getTheme() {
		
		return view('layouts.palette');
	}	
	public function postSaveprofile( Request $request)
	{
		if(!\Auth::check()) return redirect('user/login');
		$rules = array(
			'first_name'=>'required|alpha_num|min:2',
			'last_name'=>'required|alpha_num|min:2',
			);	
			
		if($request->input('email') != \Session::get('eid'))
		{
			$rules['email'] = 'required|email|unique:tb_users';
		}	

		if(!is_null($request->file('avatar'))) $rules['avatar'] = 'mimes:jpg,jpeg,png,gif,bmp';

				
		$validator = Validator::make($request->all(), $rules);

		if ($validator->passes()) {
			
			
			if(!is_null($request->file('avatar')))
			{
				$file = $request->file('avatar'); 
				$destinationPath = './uploads/users/';
				$filename = $file->getClientOriginalName();
				$extension = $file->getClientOriginalExtension(); //if you need extension of the file
				$newfilename = \Session::get('uid').'.'.$extension;
				$uploadSuccess = $request->file('avatar')->move($destinationPath, $newfilename);				 
				if( $uploadSuccess ) {
				    $data['avatar'] = $newfilename; 
				}
				$orgFile = $destinationPath.'/'.$newfilename; 
				\SiteHelpers::cropImage('80' , '80' , $orgFile ,  $extension,	 $orgFile)	;
				
			}		
			
			$user = User::find(\Session::get('uid'));
			$user->first_name 	= $request->input('first_name');
			$user->last_name 	= $request->input('last_name');
			$user->email 		= $request->input('email');
			if(isset( $data['avatar']))  $user->avatar  = $newfilename; 			
			$user->save();

			$newUser = User::find(\Session::get('uid'));

			\Session::put('fid',$newUser->first_name.' '.$newUser->last_name);

			return redirect('user/profile')->with('message','Profile has been saved!')->with('status','success');
		} else {
			return redirect('user/profile')->with('message','The following errors occurred')->with('status','error')
			->withErrors($validator)->withInput();
		}	
	
	}
	
	public function postSavepassword( Request $request)
	{
		$rules = array(
			'password'=>'required|between:6,12',
			'password_confirmation'=>'required|between:6,12'
			);		
		$validator = Validator::make($request->all(), $rules);
		if ($validator->passes()) {
			$user = User::find(\Session::get('uid'));
			$user->password = \Hash::make($request->input('password'));
			$user->save();

			return redirect('user/profile')->with(['status' => 'success', 'message' => 'Password has been saved!'] );
		} else {
			return redirect('user/profile')->with(['status' => 'error', 'message' => 'The following errors occurred'])
			->withErrors($validator)->withInput();
		}	
	
	}	
	
	public function getReminder()
	{
	
		return view('user.remind');
	}	

	public function postRequest( Request $request)
	{

		$rules = array(
			'credit_email'=>'required|email'
		);	
		
		$validator = Validator::make($request->all(), $rules);
		if ($validator->passes()) {	
	
			$user =  User::where('email','=',$request->input('credit_email'));
			if($user->count() >=1)
			{
				$user = $user->get();
				$user = $user[0];
				$data = array('token'=>$request->input('_token'));	
				$to = $request->input('credit_email');
				$subject = "[ " .config('sximo.cnf_appname')." ] REQUEST PASSWORD RESET "; 
				$data['subject'] =  $subject;	
				$data['email'] = $to;

				if(config('sximo.cnf_mail') =='swift')
				{ 
					
					\Mail::send('user.emails.auth.reminder', $data, function ($message) use ($data)  {
			    		$message->to($data['email'])->subject($data['subject']);
			    	});	 
			    	

				}  else {

							
					$message = view('user.emails.auth.reminder', $data);
					$headers  = 'MIME-Version: 1.0' . "\r\n";
					$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
					$headers .= 'From: '.config('sximo.cnf_appname').' <'.config('sximo.cnf_email').'>' . "\r\n";
						mail($to, $subject, $message, $headers);	
				}					
			
				
				$affectedRows = User::where('email', '=',$user->email)
								->update(array('reminder' => $request->input('_token')));
								
				return redirect('user/login')->with(['message' => 'Please check your email','status'=>'success']);	
				
			} else {
				return redirect('user/login?reset')->with(['message' => 'Cant find email address','status'=>'error']);
			}

		}  else {
			return redirect('user/login?reset')->with(['message' => 'The following errors occurred','status'=>'error'])->withErrors($validator)->withInput();
		}	 
	}	
	
	public function getReset( $token = '')
	{
		if(\Auth::check()) return redirect('dashboard');

		$user = User::where('reminder','=',$token);;
		if($user->count() >=1)
		{
			$this->data['verCode']= $token;
			return view('user.remind',$this->data);

		} else {
			return redirect('user/login')->with(['message'=>'Cant find your reset code','status'=>'error']);
		}
		
	}	
	
	public function postDoreset( Request $request , $token = '')
	{
		$rules = array(
			'password'=>'required|alpha_num|between:6,12|confirmed',
			'password_confirmation'=>'required|alpha_num|between:6,12'
			);		
		$validator = Validator::make($request->all(), $rules);
		if ($validator->passes()) {
			
			$user =  User::where('reminder','=',$token);
			if($user->count() >=1)
			{
				$data = $user->get();
				$user = User::find($data[0]->id);
				$user->reminder = '';
				$user->password = \Hash::make($request->input('password'));
				$user->save();			
			}

			return redirect('changepassword')->with(['message'=>'เปลี่ยนรหัสผ่านเรียบร้อยแล้ว!','status'=>'success'] );
		} else {
			return redirect('changepassword')->with(['message'=>'รายการผิดพลาด','status'=>'error'])->withErrors($validator)->withInput();
		}	
	
	}	

	public function getLogout() {
		\Auth::logout();
		\Session::flush();
		return redirect('')->with(['message'=>'Your are now logged out!','status'=>'success']);
	}

	function socialize( $social )
	{
		return Socialize::driver($social)->redirect();
	}

	function autosocialize( $social )
	{
		$user = Socialize::driver($social)->user();		
		$users = \DB::table('tb_users')->where('email',$user->email)->get();

		if(count($users)){
			$row = $users[0];
			return self::autoSignin($row->id);		

		} else {
			return redirect('user/login')
				->with(['message'=>'You have not registered yet ','status'=>'error']);
		}
			
	}

	function autoSignin($id)
	{
		
		if(is_null($id)){
		  return redirect('user/login')
				->with(['message'=>'You have not registered yet ','status'=>'error']);
		} else{

		    \Auth::loginUsingId( $id );
			if(\Auth::check())
			{
				$row = User::find(\Auth::user()->id); 

				if($row->active =='0')
				{
					// inactive 
					\Auth::logout();
					return redirect('user/login')->with(['message'=>'Your Account is not active','status'=>'error']);

				} else if($row->active=='2')
				{
					// BLocked users
					\Auth::logout();
					return redirect('user/login')->with(['message'=>'Your Account is BLocked','status'=>'error']);
				} else {
					$session = array(
						'gid' => $row->group_id,
						'uid' => $row->id,
						'eid' => $row->email,
						'll' => $row->last_login,
						'fid' =>  $row->first_name.' '. $row->last_name,
						'username' =>  $row->username ,
						'join'	=>  $row->created_at
					);
					if($this->config['cnf_front'] =='false') :
						return redirect('dashboard');						
					else :
						return redirect('');
					endif;					
					
										
				}
				
				
			}
		}

	}
	
	
}