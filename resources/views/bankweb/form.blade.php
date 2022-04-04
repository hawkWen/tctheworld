@if($setting['form-method'] =='native')
<div class="card">
	<div class="card-body">
@endif
		<div class="form-ajax-box">
		{!! Form::open(array('url'=>'bankweb?return='.$return, 'class'=>'form-horizontal  sximo-form validated','files' => true , 'parsley-validate'=>'','novalidate'=>' ','id'=> 'bankwebFormAjax')) !!}

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
						<fieldset><legend> bankweb</legend>
				{!! Form::hidden('id', $row['id']) !!}					
									  <div class="form-group row  " >
										<label for="Bank Name" class=" control-label col-md-4 "> Bank Name <span class="asterix"> * </span></label>
										<div class="col-md-8">
										  <input  type='text' name='bank_name' id='bank_name' value='{{ $row['bank_name'] }}' 
						required     class='form-control form-control-sm ' /> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="Bank Logo" class=" control-label col-md-4 "> Bank Logo </label>
										<div class="col-md-8">
										  
						<div class="fileUpload btn " > 
						    <span>  <i class="fa fa-camera"></i>  </span>
						    <div class="title"> Browse File </div>
						    <input type="file" name="bank_logo" class="upload"   accept="image/x-png,image/gif,image/jpeg"     />
						</div>
						<div class="bank_logo-preview preview-upload">
							{!! SiteHelpers::showUploadedFile( $row["bank_logo"],"/uploads/images/bank/") !!}
						</div>
					 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="Bank Account No" class=" control-label col-md-4 "> Bank Account No <span class="asterix"> * </span></label>
										<div class="col-md-8">
										  <input  type='text' name='bank_account_no' id='bank_account_no' value='{{ $row['bank_account_no'] }}' 
						required     class='form-control form-control-sm ' /> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="Bank Account Name" class=" control-label col-md-4 "> Bank Account Name <span class="asterix"> * </span></label>
										<div class="col-md-8">
										  <input  type='text' name='bank_account_name' id='bank_account_name' value='{{ $row['bank_account_name'] }}' 
						required     class='form-control form-control-sm ' /> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="ใช้สำหรับ" class=" control-label col-md-4 "> ใช้สำหรับ </label>
										<div class="col-md-8">
										  
					<?php $use = explode(',',$row['use']);
					$use_opt = array( 'none' => 'ไม่ได้ใช้' ,  'truewallet' => 'truewallet' ,  'depositbank' => 'ธนาคารฝาก' ,  'withdrawbank' => 'ธนาคารถอน' , ); ?>
					<select name='use' rows='5'   class='select2 '  > 
						<?php 
						foreach($use_opt as $key=>$val)
						{
							echo "<option  value ='$key' ".($row['use'] == $key ? " selected='selected' " : '' ).">$val</option>"; 						
						}						
						?></select> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="Device Id" class=" control-label col-md-4 "> Device Id </label>
										<div class="col-md-8">
										  <textarea name='device_id' rows='5' id='device_id' class='form-control form-control-sm '  
				           >{{ $row['device_id'] }}</textarea> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="Api Refresh" class=" control-label col-md-4 "> Api Refresh </label>
										<div class="col-md-8">
										  <textarea name='api_refresh' rows='5' id='api_refresh' class='form-control form-control-sm '  
				           >{{ $row['api_refresh'] }}</textarea> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="Balance" class=" control-label col-md-4 "> Balance </label>
										<div class="col-md-8">
										  <textarea name='balance' rows='5' id='balance' class='form-control form-control-sm '  
				           >{{ $row['balance'] }}</textarea> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="Password" class=" control-label col-md-4 "> Password </label>
										<div class="col-md-8">
										  <textarea name='password' rows='5' id='password' class='form-control form-control-sm '  
				           >{{ $row['password'] }}</textarea> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="Pin" class=" control-label col-md-4 "> Pin </label>
										<div class="col-md-8">
										  <textarea name='pin' rows='5' id='pin' class='form-control form-control-sm '  
				           >{{ $row['pin'] }}</textarea> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="Tmn Id" class=" control-label col-md-4 "> Tmn Id </label>
										<div class="col-md-8">
										  <textarea name='tmn_id' rows='5' id='tmn_id' class='form-control form-control-sm '  
				           >{{ $row['tmn_id'] }}</textarea> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="Login Token" class=" control-label col-md-4 "> Login Token </label>
										<div class="col-md-8">
										  <textarea name='login_token' rows='5' id='login_token' class='form-control form-control-sm '  
				           >{{ $row['login_token'] }}</textarea> 
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
	 
	
	 	
	 
	
	var form = $('#bankwebFormAjax'); 
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