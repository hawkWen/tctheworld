@if($setting['form-method'] =='native')
<div class="card">
	<div class="card-body">
@endif
		<div class="form-ajax-box">
		{!! Form::open(array('url'=>'deposit?return='.$return, 'class'=>'form-horizontal  sximo-form validated','files' => true , 'parsley-validate'=>'','novalidate'=>' ','id'=> 'depositFormAjax')) !!}

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
						<fieldset><legend> ฝากเงิน</legend>
				{!! Form::hidden('deposit_id', $row['deposit_id']) !!}					
									  <div class="form-group row  " >
										<label for="วันที่เวลา" class=" control-label col-md-4 "> วันที่เวลา <span class="asterix"> * </span></label>
										<div class="col-md-8">
						@if($row['date_time']=='')

											<?php $dt = date("Y-m-d").' '.date("H:i"); ?>
										  
					{!! Form::text('date_time', $dt,array('class'=>'form-control form-control-sm')) !!}

											@else

					{!! Form::text('date_time', $row['date_time'],array('class'=>'form-control form-control-sm')) !!}

											@endif
										 </div> 
										 
									  </div> 					
	
@if($row['deposit_id']=='')
                                                                        <div class="form-group row  " >
										<label for="User id" class=" control-label col-md-4 "> Username <span class="asterix"> * </span></label>
										<div class="col-md-8">
										  <input  type='text' name='username' id='username' value='' 
						required     class='form-control form-control-sm ' /> 
<input  type='hidden' name='user_id' id='user_id' value='0' /> 
										 </div> 
									  </div> 			
@else
									  <div class="form-group row  " >
@if($row['user_id']==0||$row['user_id']=='')
										<label for="Username" class=" control-label col-md-4 "> Username <span class="asterix"> * </span></label>
@else
<label for="User id" class=" control-label col-md-4 "> User id <span class="asterix"> * </span></label>
@endif
										<div class="col-md-8">
@if($row['user_id']==0||$row['user_id']=='')
                                         <input  type='text' name='username' id='username' value='' 
						     class='form-control form-control-sm ' /> 
<input  type='hidden' name='user_id' id='user_id' value='0' />
@else
										  <input  type='text' name='user_id' id='user_id' value='{{ $row['user_id'] }}'  class='form-control form-control-sm '  readonly/> 
@endif
										 </div> 
									  </div> 
@endif
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
							if($row['deposit_id']==''&&$key=='confirmed'){
								echo "<option  value ='$key' selected='selected'>$val</option>"; 	
							}else{
								echo "<option  value ='$key' ".($row['status'] == $key ? " selected='selected' " : '' ).">$val</option>"; 
							}
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
	 
	
	
		$("#bankweb_id").jCombo("{!! secure_url('deposit/comboselect?filter=bank_web:id:bank_name|bank_account_no|bank_account_name') !!}",
		{  selected_value : '{{ $row["bankweb_id"] }}' });
		 	
	 
	
	var form = $('#depositFormAjax'); 
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