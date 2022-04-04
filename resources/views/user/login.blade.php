@extends('layouts.login')

@section('content')
	
<div class="ajaxLoading"></div>
	    
	<div class="form-signin">
			
			
	 
		    	@if(Session::has('status'))
		    		@if(session('status') =='success')
		    			<div class="alert alert-success mb-1" role="alert">
                        	{!! Session::get('message') !!}
                    	</div>
					@else
						<div class="alert alert-danger mb-1" role="alert">
							{!! Session::get('message') !!}
							@foreach($errors->all() as $error)
								<li>{{ $error }}</li>
							@endforeach
						</div>
					@endif		
				@endif

		
	

		
		<div id="tab-sign-in" class="authentication-form">
            
            <div class="splash-page mt-5 mb-5">
                <div class="mb-3">
        @if(file_exists(public_path().'/uploads/images/'.config('sximo')['cnf_logo']) && config('sximo')['cnf_logo'] !='')
        <img src="{{ asset('uploads/images/'.config('sximo')['cnf_logo'])}}" alt="{{ config('sximo')['cnf_appname'] }}" class="imaged w-50 square"> 
        @else
        <img src="{{ asset('img/logo-icon.png') }}" alt="icon" class="imaged w-50 square"> 
        @endif

        </div>
                <h2 class="mb-2 text-primary">เข้าสู่ระบบ</h2>
              
            </div>

			{!! Form::open(array('url'=>'user/signin', 'id'=>'LoginAjax' , 'parsley-validate'=>'','novalidate'=>' ')) !!}

               
                <div class="card">
                    <div class="card-body pb-1">
                          <div class="form-group basic">
                            <div class="input-wrapper not-empty text-white">
                             <label class="label text-light pb-1" for="password4">เบอร์โทรศัพท์</label>
                                <input type="tel" id="inputtel" class="form-control is-valid"  name="username"  placeholder="ล็อกอินด้วยเบอร์โทร" required autofocus>

                                    
                                    <i class="clear-input">
                                    <ion-icon name="close-circle"></ion-icon>
                                </i>
                            </div>
                            
                        </div>
        
                        <div class="form-group basic">
                            <div class="input-wrapper not-empty text-white">
                                <label class="label text-light pb-1" for="password4">รหัสผ่าน</label>
                                  <input id="password-field" type="password" class="form-control" name="password"  placeholder="กรอกรหัสผ่าน">
              <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"><i class="ion ion-md-eye text-white"  id="togglePassword"></i></span>

                           
              
                            </div>
                        </div>
                    </div>
                </div>

          		<div class="row mt-2">
                <div class="col-6">
                    <div class="checkbox mb-3">             
                          <input type="checkbox" class="filled-in" id="remember" name="remember" value="1"  style="display: inline-block;" /> 
                          <label for="remember" class="text-muted"> จำฉันไว้  </label>
                      </div>
                </div>  
                <div class="col-6 text-right">
                    <a href="#" class="forgot text-muted"> ลืมรหัสผ่าน? </a>
                </div>
            	</div>  

               


            	<div class=" pt-2 pb-2 " >                         
                    <p class="text-center text-muted ">                     
                        ต้องการสมัครสมาชิกใช่ไหม?
                        <a href="{{ secure_url('user/verify')}}">สมัครสมาชิก </a>
                    </p>                    
            	</div>  

                <div class="form-button-group  transparent">
                    <button type="submit" class="btn btn-primary btn-block btn-lg">เข้าสู่ระบบ</button>
                </div>

            </form>		
		</div>
		

		<div class=" m-t" id="tab-forgot" style="display: none">				
<div id="tab-sign-in" class="authentication-form">
            
            <div class="splash-page mt-5 mb-5">
                <div class="mb-3">        @if(file_exists(public_path().'/uploads/images/'.config('sximo')['cnf_logo']) && config('sximo')['cnf_logo'] !='')
        <img src="{{ asset('uploads/images/'.config('sximo')['cnf_logo'])}}" alt="{{ config('sximo')['cnf_appname'] }}" class="imaged w-50 square"> 
        @else
        <img src="{{ asset('img/logo-icon.png') }}" alt="icon" class="imaged w-50 square"> 
        @endif</div>
                <h2 class="mb-2 text-primary">ลืมรหัสผ่าน</h2>
              
            </div>
            
            {!! Form::open(array('url'=>'user/otpforgot', 'class'=>'form-vertical ', 'parsley-validate'=>'','novalidate'=>' ')) !!}
              
                <div class="card">
                    <div class="card-body pb-1">
                           <div class="form-group basic">
                            <div class="input-wrapper">
                                                                <label class="label text-light" for="password4">เบอร์โทรศัพท์</label>

                                <input type="mobile" class="form-control" id="mobile" name="username" placeholder="เบอร์โทรศัพท์">

                                <i class="clear-input">
                                    <ion-icon name="close-circle" role="img" class="md hydrated" aria-label="close circle"></ion-icon>
                                </i>
                            </div>
                        </div>
        
                        
                </div>
                 </div>
 

               


                <div class=" pt-2 pb-2 " >                         
                    <p class="text-center text-light ">                     
                        ระบบจะส่งรหัสให้คุณทางโทรศัพท์ผ่านทางข้อความ
                    </p>                    
                </div>  

               



			

                <div class="row mt-2">
                <div class="col-6">
                    
                </div>  
                <div class="col-6 text-right">
                    <a href="javascript:;" class="forgot text-muted"> กลับไปเข้าสู่ระบบ </a>  
                </div>
            	</div>  

                <div class="form-button-group transparent">
                    <button type="submit" class="btn btn-primary btn-block btn-lg">ยืนยัน</button>
                </div>

            </form>
		</div>


		
	</div>
	
 



<!-- toast center iconed -->
        <div id="toast-11" class="toast-box toast-center">
            <div class="in">
                <ion-icon name="checkmark-circle" class="text-success"></ion-icon>
                <div class="text">
                    {!! Session::get('message') !!}
                </div>
            </div>
            <button type="button" class="btn btn-sm btn-text-light close-button">CLOSE</button>
        </div>
<!-- toast center iconed -->

<script type="text/javascript">
	$(document).ready(function(){

		$('.forgot').on('click',function(){
			$('#tab-forgot').toggle();
			$('#tab-sign-in').toggle();
		})

	});



</script>

@stop