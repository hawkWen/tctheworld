@if($setting['form-method'] =='native')
<div class="card">
	<div class="card-body">
@endif
		<div class="form-ajax-box">
		{!! Form::open(array('url'=>'withdraw?return='.$return, 'class'=>'form-horizontal  sximo-form validated','files' => true , 'parsley-validate'=>'','novalidate'=>' ','id'=> 'withdrawFormAjax')) !!}

		<div class="toolbar-nav">	
			<div class="row">	
					
				<div class="col-md-6 ">
					<a href="javascript://ajax" onclick="ajaxViewClose('#{{ $pageModule }}')" class="tips btn btn-sm  btn-danger" title="{{ __('core.btn_back') }}" ><i class="fa  fa-times"></i></a>			
				</div>
				<div class="col-sm-6 text-right">	
					<div class="btn-group">
						<button type="submit" class="btn btn-sm btn-primary  " name="apply">{{ Lang::get('core.sb_apply') }} </button>
						<button type="submit" class="btn btn-sm btn-success " name="save">  {{ Lang::get('core.sb_save') }} </button>
					</div>	
				</div>
						
			</div>
		</div>	


		<div class="col-md-12">
						<fieldset><legend> ถอนเงิน</legend>
				{!! Form::hidden('withdraw_id', $row['withdraw_id']) !!}					
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
							
		<input type="hidden" name="action_task" value="save" />

		{!! Form::close() !!}
		</div>
@if($setting['form-method'] =='native')

	</div>
</div>
@endif
@include('sximo.module.template.ajax.formjavascript')


<script type="text/javascript">
$(document).ready(function() { 
	 
	
	
		$("#bank_id").jCombo("{!! secure_url('withdraw/comboselect?filter=banks:bank_id:bank_name') !!}",
		{  selected_value : '{{ $row["bank_id"] }}' });
		
		$("#promotion_id").jCombo("{!! secure_url('withdraw/comboselect?filter=promotions:id:promotion_name') !!}",
		{  selected_value : '{{ $row["promotion_id"] }}' });
		
		$("#bankweb_id").jCombo("{!! secure_url('withdraw/comboselect?filter=bank_web:id:bank_name') !!}",
		{  selected_value : '{{ $row["bankweb_id"] }}' });
		 	
	 
	
	var form = $('#withdrawFormAjax'); 
	form.parsley();
	form.submit(function(){
		
		if(form.parsley().isValid()){			
			var options = { 
				dataType:      'json', 
				beforeSubmit :  function() {
				},
				success		:   function(data) {

					if(data.status == 'success')
					{
						ajaxViewClose('#{{ $pageModule }}');
						ajaxFilter('#{{ $pageModule }}','{{ $pageUrl }}/data');
						notyMessage(data.message);	
						$('#sximo-modal').modal('hide');	
					} else {
						notyMessageError(data.message);	
						return false;
					}	

				}  
			}  
			$(this).ajaxSubmit(options); 
			return false;
						
		} else {
			return false;
		}		
	
	});

});

</script>		 