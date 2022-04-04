

		 {!! Form::open(array('url'=>'withdraw/savepublic', 'class'=>'form-horizontal','files' => true , 'parsley-validate'=>'','novalidate'=>' ')) !!}

	@if(Session::has('messagetext'))
	  
		   {!! Session::get('messagetext') !!}
	   
	@endif
	<ul class="parsley-error-list">
		@foreach($errors->all() as $error)
			<li>{{ $error }}</li>
		@endforeach
	</ul>		


<div class="col-md-12">
						<fieldset><legend> ถอนเงิน</legend>
				{!! Form::hidden('withdraw_id', $row['withdraw_id']) !!}					
									  <div class="form-group row  " >
										<label for="Username" class=" control-label col-md-4 "> Username </label>
										<div class="col-md-8">
										  <select name='user_id' rows='5' id='user_id' class='select2 '  readonly ></select> 
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
										<label for="ธนาคาร" class=" control-label col-md-4 "> ธนาคาร </label>
										<div class="col-md-8">
										  <select name='bank_id' rows='5' id='bank_id' class='select2 '  readonly ></select> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="ยอดที่ถอนได้" class=" control-label col-md-4 "> ยอดที่ถอนได้ </label>
										<div class="col-md-8">
										  <input  type='text' name='amount' id='amount' value='{{ $row['amount'] }}' 
						     class='form-control form-control-sm ' /> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="โปรโมชั่น" class=" control-label col-md-4 "> โปรโมชั่น </label>
										<div class="col-md-8">
										  <select name='promotion_id' rows='5' id='promotion_id' class='select2 '   ></select> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="เครดิตที่ตัด" class=" control-label col-md-4 "> เครดิตที่ตัด </label>
										<div class="col-md-8">
										  <input  type='text' name='reduce_credit' id='reduce_credit' value='{{ $row['reduce_credit'] }}' 
						  readonly   class='form-control form-control-sm ' /> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="สถานะ" class=" control-label col-md-4 "> สถานะ <span class="asterix"> * </span></label>
										<div class="col-md-8">
										  
					<?php $status = explode(',',$row['status']);
					$status_opt = array( 'wait' => 'รอตรวจสอบ' ,  'confirmed' => 'ยืนยัน' ,  'cancel' => 'ยกเลิก' ,  'error' => 'ผิดพลาด' ,  'approved' => 'ตรวจสอบแล้ว' , ); ?>
					<select name='status' rows='5' required  class='select2 '  > 
						<?php 
						foreach($status_opt as $key=>$val)
						{
							echo "<option  value ='$key' ".($row['status'] == $key ? " selected='selected' " : '' ).">$val</option>"; 						
						}						
						?></select> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="ธนาคารถอน" class=" control-label col-md-4 "> ธนาคารถอน </label>
										<div class="col-md-8">
										  <select name='bankweb_id' rows='5' id='bankweb_id' class='select2 '   ></select> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="วันเวลา" class=" control-label col-md-4 "> วันเวลา </label>
										<div class="col-md-8">
										  
					{!! Form::text('date_time', $row['date_time'],array('class'=>'form-control form-control-sm datetime')) !!}
				 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="Deposit Id" class=" control-label col-md-4 "> Deposit Id </label>
										<div class="col-md-8">
										  <input  type='text' name='deposit_id' id='deposit_id' value='{{ $row['deposit_id'] }}' 
						     class='form-control form-control-sm ' /> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="Max Withdraw" class=" control-label col-md-4 "> Max Withdraw </label>
										<div class="col-md-8">
										  <input  type='text' name='max_withdraw' id='max_withdraw' value='{{ $row['max_withdraw'] }}' 
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
		
		
		$("#user_id").jCombo("{!! secure_url('withdraw/comboselect?filter=tb_users:id:username|first_name|account_number') !!}",
		{  selected_value : '{{ $row["user_id"] }}' });
		
		$("#bank_id").jCombo("{!! secure_url('withdraw/comboselect?filter=banks:bank_id:bank_name') !!}",
		{  selected_value : '{{ $row["bank_id"] }}' });
		
		$("#promotion_id").jCombo("{!! secure_url('withdraw/comboselect?filter=promotions:id:promotion_name') !!}",
		{  selected_value : '{{ $row["promotion_id"] }}' });
		
		$("#bankweb_id").jCombo("{!! secure_url('withdraw/comboselect?filter=bank_web:id:bank_name') !!}",
		{  selected_value : '{{ $row["bankweb_id"] }}' });
		 

		$('.removeCurrentFiles').on('click',function(){
			var removeUrl = $(this).attr('href');
			$.get(removeUrl,function(response){});
			$(this).parent('div').empty();	
			return false;
		});		
		
	});
	</script>		 
