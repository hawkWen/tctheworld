

		 {!! Form::open(array('url'=>'usersapi/savepublic', 'class'=>'form-horizontal','files' => true , 'parsley-validate'=>'','novalidate'=>' ')) !!}

	@if(Session::has('messagetext'))
	  
		   {!! Session::get('messagetext') !!}
	   
	@endif
	<ul class="parsley-error-list">
		@foreach($errors->all() as $error)
			<li>{{ $error }}</li>
		@endforeach
	</ul>		


<div class="col-md-12">
						<fieldset><legend> แก้ไขข้อมูลลูกค้า</legend>
				{!! Form::hidden('id', $row['id']) !!}					
									  <div class="form-group row  " >
										<label for="Hash" class=" control-label col-md-4 "> Hash </label>
										<div class="col-md-8">
										  <textarea name='hash' rows='5' id='hash' class='form-control form-control-sm '  
				           >{{ $row['hash'] }}</textarea> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="ยูสเซอร์" class=" control-label col-md-4 "> ยูสเซอร์ </label>
										<div class="col-md-8">
										  <input  type='text' name='username' id='username' value='{{ $row['username'] }}' 
						  readonly   class='form-control form-control-sm ' /> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="ชื่อ" class=" control-label col-md-4 "> ชื่อ </label>
										<div class="col-md-8">
										  <input  type='text' name='first_name' id='first_name' value='{{ $row['first_name'] }}' 
						     class='form-control form-control-sm ' /> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="นามสกุล" class=" control-label col-md-4 "> นามสกุล </label>
										<div class="col-md-8">
										  <input  type='text' name='last_name' id='last_name' value='{{ $row['last_name'] }}' 
						     class='form-control form-control-sm ' /> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="ธนาคาร" class=" control-label col-md-4 "> ธนาคาร </label>
										<div class="col-md-8">
										  <select name='bank' rows='5' id='bank' class='select2 '   ></select> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="เลขบัญชี" class=" control-label col-md-4 "> เลขบัญชี <span class="asterix"> * </span></label>
										<div class="col-md-8">
										  <input  type='text' name='account_number' id='account_number' value='{{ $row['account_number'] }}' 
						required     class='form-control form-control-sm ' /> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="เบอร์โทร" class=" control-label col-md-4 "> เบอร์โทร </label>
										<div class="col-md-8">
										  <input  type='text' name='phone' id='phone' value='{{ $row['phone'] }}' 
						     class='form-control form-control-sm ' /> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="LINE ID" class=" control-label col-md-4 "> LINE ID </label>
										<div class="col-md-8">
										  <input  type='text' name='lineid' id='lineid' value='{{ $row['lineid'] }}' 
						     class='form-control form-control-sm ' /> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="อีเมล" class=" control-label col-md-4 "> อีเมล </label>
										<div class="col-md-8">
										  <input  type='text' name='email' id='email' value='{{ $row['email'] }}' 
						     class='form-control form-control-sm ' /> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="ช่องทาง" class=" control-label col-md-4 "> ช่องทาง </label>
										<div class="col-md-8">
										  <select name='channel' rows='5' id='channel' class='select2 '   ></select> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="ผู้แนะนำ" class=" control-label col-md-4 "> ผู้แนะนำ </label>
										<div class="col-md-8">
										  <select name='ref' rows='5' id='ref' class='select2 '   ></select> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="ยอดเงิน" class=" control-label col-md-4 "> ยอดเงิน </label>
										<div class="col-md-8">
										  <input  type='text' name='balance' id='balance' value='{{ $row['balance'] }}' 
						     class='form-control form-control-sm ' /> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="ยอดโบนัส" class=" control-label col-md-4 "> ยอดโบนัส </label>
										<div class="col-md-8">
										  <input  type='text' name='bonus' id='bonus' value='{{ $row['bonus'] }}' 
						     class='form-control form-control-sm ' /> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="Coins" class=" control-label col-md-4 "> Coins </label>
										<div class="col-md-8">
										  <input  type='text' name='coins' id='coins' value='{{ $row['coins'] }}' 
						     class='form-control form-control-sm ' /> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="รอบหมุนกงล้อ" class=" control-label col-md-4 "> รอบหมุนกงล้อ </label>
										<div class="col-md-8">
										  <input  type='text' name='wheel_rounds' id='wheel_rounds' value='{{ $row['wheel_rounds'] }}' 
						     class='form-control form-control-sm ' /> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="Turnover" class=" control-label col-md-4 "> Turnover </label>
										<div class="col-md-8">
										  <textarea name='turnover' rows='5' id='turnover' class='form-control form-control-sm '  
				           >{{ $row['turnover'] }}</textarea> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="Bonus Mode" class=" control-label col-md-4 "> Bonus Mode </label>
										<div class="col-md-8">
										  <textarea name='bonus_mode' rows='5' id='bonus_mode' class='form-control form-control-sm '  
				           >{{ $row['bonus_mode'] }}</textarea> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="IP" class=" control-label col-md-4 "> IP </label>
										<div class="col-md-8">
										  <textarea name='IP' rows='5' id='IP' class='form-control form-control-sm '  
				           >{{ $row['IP'] }}</textarea> 
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
		
		
		$("#bank").jCombo("{!! url('usersapi/comboselect?filter=banks:bank_id:bank_name') !!}",
		{  selected_value : '{{ $row["bank"] }}' });
		
		$("#channel").jCombo("{!! url('usersapi/comboselect?filter=channel:channel_id:channel_name') !!}",
		{  selected_value : '{{ $row["channel"] }}' });
		
		$("#ref").jCombo("{!! url('usersapi/comboselect?filter=tb_users:id:username') !!}",
		{  selected_value : '{{ $row["ref"] }}' });
		 

		$('.removeCurrentFiles').on('click',function(){
			var removeUrl = $(this).attr('href');
			$.get(removeUrl,function(response){});
			$(this).parent('div').empty();	
			return false;
		});		
		
	});
	</script>		 
