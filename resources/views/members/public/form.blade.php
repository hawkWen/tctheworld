

		 {!! Form::open(array('url'=>'members/savepublic', 'class'=>'form-horizontal','files' => true , 'parsley-validate'=>'','novalidate'=>' ')) !!}

	@if(Session::has('messagetext'))
	  
		   {!! Session::get('messagetext') !!}
	   
	@endif
	<ul class="parsley-error-list">
		@foreach($errors->all() as $error)
			<li>{{ $error }}</li>
		@endforeach
	</ul>		


<div class="col-md-12">
						<fieldset><legend> ลูกค้าทั้งหมด</legend>
				{!! Form::hidden('id', $row['id']) !!}					
									  <div class="form-group row  " >
										<label for="Group Id" class=" control-label col-md-4 "> Group Id </label>
										<div class="col-md-8">
										  <input  type='text' name='group_id' id='group_id' value='{{ $row['group_id'] }}' 
						     class='form-control form-control-sm ' /> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="Username" class=" control-label col-md-4 "> Username </label>
										<div class="col-md-8">
										  <input  type='text' name='username' id='username' value='{{ $row['username'] }}' 
						     class='form-control form-control-sm ' /> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="Password" class=" control-label col-md-4 "> Password </label>
										<div class="col-md-8">
										  <input  type='text' name='password' id='password' value='{{ $row['password'] }}' 
						     class='form-control form-control-sm ' /> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="Email" class=" control-label col-md-4 "> Email </label>
										<div class="col-md-8">
										  <input  type='text' name='email' id='email' value='{{ $row['email'] }}' 
						     class='form-control form-control-sm ' /> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="First Name" class=" control-label col-md-4 "> First Name </label>
										<div class="col-md-8">
										  <input  type='text' name='first_name' id='first_name' value='{{ $row['first_name'] }}' 
						     class='form-control form-control-sm ' /> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="Last Name" class=" control-label col-md-4 "> Last Name </label>
										<div class="col-md-8">
										  <input  type='text' name='last_name' id='last_name' value='{{ $row['last_name'] }}' 
						     class='form-control form-control-sm ' /> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="Birth Of Day" class=" control-label col-md-4 "> Birth Of Day </label>
										<div class="col-md-8">
										  <input  type='text' name='birth_of_day' id='birth_of_day' value='{{ $row['birth_of_day'] }}' 
						     class='form-control form-control-sm ' /> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="Address 1" class=" control-label col-md-4 "> Address 1 </label>
										<div class="col-md-8">
										  <input  type='text' name='address_1' id='address_1' value='{{ $row['address_1'] }}' 
						     class='form-control form-control-sm ' /> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="Address 2" class=" control-label col-md-4 "> Address 2 </label>
										<div class="col-md-8">
										  <input  type='text' name='address_2' id='address_2' value='{{ $row['address_2'] }}' 
						     class='form-control form-control-sm ' /> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="State" class=" control-label col-md-4 "> State </label>
										<div class="col-md-8">
										  <input  type='text' name='state' id='state' value='{{ $row['state'] }}' 
						     class='form-control form-control-sm ' /> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="City" class=" control-label col-md-4 "> City </label>
										<div class="col-md-8">
										  <input  type='text' name='city' id='city' value='{{ $row['city'] }}' 
						     class='form-control form-control-sm ' /> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="Phone" class=" control-label col-md-4 "> Phone </label>
										<div class="col-md-8">
										  <input  type='text' name='phone' id='phone' value='{{ $row['phone'] }}' 
						     class='form-control form-control-sm ' /> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="Country" class=" control-label col-md-4 "> Country </label>
										<div class="col-md-8">
										  <input  type='text' name='country' id='country' value='{{ $row['country'] }}' 
						     class='form-control form-control-sm ' /> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="Avatar" class=" control-label col-md-4 "> Avatar </label>
										<div class="col-md-8">
										  <input  type='text' name='avatar' id='avatar' value='{{ $row['avatar'] }}' 
						     class='form-control form-control-sm ' /> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="Active" class=" control-label col-md-4 "> Active </label>
										<div class="col-md-8">
										  <input  type='text' name='active' id='active' value='{{ $row['active'] }}' 
						     class='form-control form-control-sm ' /> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="Login Attempt" class=" control-label col-md-4 "> Login Attempt </label>
										<div class="col-md-8">
										  <input  type='text' name='login_attempt' id='login_attempt' value='{{ $row['login_attempt'] }}' 
						     class='form-control form-control-sm ' /> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="Last Login" class=" control-label col-md-4 "> Last Login </label>
										<div class="col-md-8">
										  
					{!! Form::text('last_login', $row['last_login'],array('class'=>'form-control form-control-sm datetime')) !!}
				 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="Created At" class=" control-label col-md-4 "> Created At </label>
										<div class="col-md-8">
										  
					{!! Form::text('created_at', $row['created_at'],array('class'=>'form-control form-control-sm datetime')) !!}
				 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="Updated At" class=" control-label col-md-4 "> Updated At </label>
										<div class="col-md-8">
										  
					{!! Form::text('updated_at', $row['updated_at'],array('class'=>'form-control form-control-sm datetime')) !!}
				 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="Reminder" class=" control-label col-md-4 "> Reminder </label>
										<div class="col-md-8">
										  <input  type='text' name='reminder' id='reminder' value='{{ $row['reminder'] }}' 
						     class='form-control form-control-sm ' /> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="Activation" class=" control-label col-md-4 "> Activation </label>
										<div class="col-md-8">
										  <input  type='text' name='activation' id='activation' value='{{ $row['activation'] }}' 
						     class='form-control form-control-sm ' /> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="Remember Token" class=" control-label col-md-4 "> Remember Token </label>
										<div class="col-md-8">
										  <input  type='text' name='remember_token' id='remember_token' value='{{ $row['remember_token'] }}' 
						     class='form-control form-control-sm ' /> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="Last Activity" class=" control-label col-md-4 "> Last Activity </label>
										<div class="col-md-8">
										  <input  type='text' name='last_activity' id='last_activity' value='{{ $row['last_activity'] }}' 
						     class='form-control form-control-sm ' /> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="Config" class=" control-label col-md-4 "> Config </label>
										<div class="col-md-8">
										  <textarea name='config' rows='5' id='config' class='form-control form-control-sm '  
				           >{{ $row['config'] }}</textarea> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="Bank" class=" control-label col-md-4 "> Bank </label>
										<div class="col-md-8">
										  <input  type='text' name='bank' id='bank' value='{{ $row['bank'] }}' 
						     class='form-control form-control-sm ' /> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="Account Number" class=" control-label col-md-4 "> Account Number </label>
										<div class="col-md-8">
										  <input  type='text' name='account_number' id='account_number' value='{{ $row['account_number'] }}' 
						     class='form-control form-control-sm ' /> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="Lineid" class=" control-label col-md-4 "> Lineid </label>
										<div class="col-md-8">
										  <input  type='text' name='lineid' id='lineid' value='{{ $row['lineid'] }}' 
						     class='form-control form-control-sm ' /> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="Channel" class=" control-label col-md-4 "> Channel </label>
										<div class="col-md-8">
										  <input  type='text' name='channel' id='channel' value='{{ $row['channel'] }}' 
						     class='form-control form-control-sm ' /> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="Bonus" class=" control-label col-md-4 "> Bonus </label>
										<div class="col-md-8">
										  <input  type='text' name='bonus' id='bonus' value='{{ $row['bonus'] }}' 
						     class='form-control form-control-sm ' /> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="Line UserId" class=" control-label col-md-4 "> Line UserId </label>
										<div class="col-md-8">
										  <input  type='text' name='line_userId' id='line_userId' value='{{ $row['line_userId'] }}' 
						     class='form-control form-control-sm ' /> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="Line DisplayName" class=" control-label col-md-4 "> Line DisplayName </label>
										<div class="col-md-8">
										  <input  type='text' name='line_displayName' id='line_displayName' value='{{ $row['line_displayName'] }}' 
						     class='form-control form-control-sm ' /> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="Line PictureUrl" class=" control-label col-md-4 "> Line PictureUrl </label>
										<div class="col-md-8">
										  <input  type='text' name='line_pictureUrl' id='line_pictureUrl' value='{{ $row['line_pictureUrl'] }}' 
						     class='form-control form-control-sm ' /> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="Agent Id" class=" control-label col-md-4 "> Agent Id </label>
										<div class="col-md-8">
										  <input  type='text' name='agent_id' id='agent_id' value='{{ $row['agent_id'] }}' 
						     class='form-control form-control-sm ' /> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="Balance" class=" control-label col-md-4 "> Balance </label>
										<div class="col-md-8">
										  <input  type='text' name='balance' id='balance' value='{{ $row['balance'] }}' 
						     class='form-control form-control-sm ' /> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="LastUpdate" class=" control-label col-md-4 "> LastUpdate </label>
										<div class="col-md-8">
										  <input  type='text' name='lastUpdate' id='lastUpdate' value='{{ $row['lastUpdate'] }}' 
						     class='form-control form-control-sm ' /> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="Gamepassword" class=" control-label col-md-4 "> Gamepassword </label>
										<div class="col-md-8">
										  <input  type='text' name='gamepassword' id='gamepassword' value='{{ $row['gamepassword'] }}' 
						     class='form-control form-control-sm ' /> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="Promotion Id" class=" control-label col-md-4 "> Promotion Id </label>
										<div class="col-md-8">
										  <input  type='text' name='promotion_id' id='promotion_id' value='{{ $row['promotion_id'] }}' 
						     class='form-control form-control-sm ' /> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="Ref" class=" control-label col-md-4 "> Ref </label>
										<div class="col-md-8">
										  <input  type='text' name='ref' id='ref' value='{{ $row['ref'] }}' 
						     class='form-control form-control-sm ' /> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="Gameusername" class=" control-label col-md-4 "> Gameusername </label>
										<div class="col-md-8">
										  <input  type='text' name='gameusername' id='gameusername' value='{{ $row['gameusername'] }}' 
						     class='form-control form-control-sm ' /> 
										 </div> 
										 
									  </div> </fieldset></div>

			<div style="clear:both"></div>	
				
					
				  <div class="form-group">
					<label class="col-sm-4 text-right">&nbsp;</label>
					<div class="col-sm-8">	
					<button type="submit" name="apply" class="btn btn-info btn-sm" ><i class="fa  fa-check-circle"></i> {{ Lang::get('core.sb_apply') }}</button>
					<button type="submit" name="submit" class="btn btn-primary btn-sm" ><i class="fa  fa-save "></i> {{ Lang::get('core.sb_save') }}</button>
				  </div>	  
			
		</div> 
		 
		 {!! Form::close() !!}
		 
   <script type="text/javascript">
	$(document).ready(function() { 
		
		 

		$('.removeCurrentFiles').on('click',function(){
			var removeUrl = $(this).attr('href');
			$.get(removeUrl,function(response){});
			$(this).parent('div').empty();	
			return false;
		});		
		
	});
	</script>		 
