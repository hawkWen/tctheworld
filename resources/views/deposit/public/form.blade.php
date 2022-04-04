

		 {!! Form::open(array('url'=>'deposit/savepublic', 'class'=>'form-horizontal','files' => true , 'parsley-validate'=>'','novalidate'=>' ')) !!}

	@if(Session::has('messagetext'))
	  
		   {!! Session::get('messagetext') !!}
	   
	@endif
	<ul class="parsley-error-list">
		@foreach($errors->all() as $error)
			<li>{{ $error }}</li>
		@endforeach
	</ul>		


<div class="col-md-12">
						<fieldset><legend> ฝากเงิน</legend>
				{!! Form::hidden('deposit_id', $row['deposit_id']) !!}					
									  <div class="form-group row  " >
										<label for="วันที่เวลา" class=" control-label col-md-4 "> วันที่เวลา <span class="asterix"> * </span></label>
										<div class="col-md-8">
										  <input  type='text' name='date_time' id='date_time' value='{{ $row['date_time'] }}' 
						required     class='form-control form-control-sm ' /> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="User id" class=" control-label col-md-4 "> User id <span class="asterix"> * </span></label>
										<div class="col-md-8">
										  <input  type='text' name='user_id' id='user_id' value='{{ $row['user_id'] }}' 
						required     class='form-control form-control-sm ' /> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="ยอดที่ฝาก" class=" control-label col-md-4 "> ยอดที่ฝาก <span class="asterix"> * </span></label>
										<div class="col-md-8">
										  <input  type='text' name='amount' id='amount' value='{{ $row['amount'] }}' 
						required     class='form-control form-control-sm ' /> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="สถานะ" class=" control-label col-md-4 "> สถานะ <span class="asterix"> * </span></label>
										<div class="col-md-8">
										  
					<?php $status = explode(',',$row['status']);
					$status_opt = array( 'wait' => 'กำลังตรวจสอบ' ,  'confirmed' => 'ทำรายการสำเร็จ' ,  'cancel' => 'ยกเลิก' ,  'error' => 'เกิดข้อผิดพลาด' , ); ?>
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
										<label for="ฝากเข้าที่" class=" control-label col-md-4 "> ฝากเข้าที่ <span class="asterix"> * </span></label>
										<div class="col-md-8">
										  <select name='bankweb_id' rows='5' id='bankweb_id' class='select2 ' required readonly ></select> 
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
		
		
		$("#bankweb_id").jCombo("{!! secure_url('deposit/comboselect?filter=bank_web:id:bank_name|bank_account_no|bank_account_name') !!}",
		{  selected_value : '{{ $row["bankweb_id"] }}' });
		 

		$('.removeCurrentFiles').on('click',function(){
			var removeUrl = $(this).attr('href');
			$.get(removeUrl,function(response){});
			$(this).parent('div').empty();	
			return false;
		});		
		
	});
	</script>		 
