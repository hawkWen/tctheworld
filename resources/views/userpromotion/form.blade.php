@if($setting['form-method'] =='native')
<div class="card">
	<div class="card-body">
@endif
		<div class="form-ajax-box">
		{!! Form::open(array('url'=>'userpromotion?return='.$return, 'class'=>'form-horizontal  sximo-form validated','files' => true , 'parsley-validate'=>'','novalidate'=>' ','id'=> 'userpromotionFormAjax')) !!}

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
						<fieldset><legend> ลูกค้าที่รับโปรโมชั่นในตอนนี้</legend>
				{!! Form::hidden('id', $row['id']) !!}					
									  <div class="form-group row  " >
										<label for="Username" class=" control-label col-md-4 "> Username </label>
										<div class="col-md-8">
											@if($row['id']!='')
							<input  type='text' name='user_id' id='user_id' value='{{ $row['user_id'] }}' class='form-control form-control-sm ' readonly/>
											@else
							<input  type='text' name='username' id='username' value='' class='form-control form-control-sm ' />
											@endif 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="โปรโมชั่น" class=" control-label col-md-4 "> โปรโมชั่น </label>
										<div class="col-md-8">
										  <select name='promotion_id' rows='5' id='promotion_id' class='select2 '  readonly ></select> 
										 </div> 
										 
									  </div> 	
									  @if($row['id']!='')				
									  <div class="form-group row  " >
										<label for="สถานะ" class=" control-label col-md-4 "> สถานะ </label>
										<div class="col-md-8">
										  
					<?php $status = explode(',',$row['status']);
					$status_opt = array( 'wait' => 'รอตรวจสอบ' ,  'confirmed' => 'ยืนยัน' ,  'cancel' => 'ยกเลิก' , ); ?>
					<select name='status' rows='5'   class='select2 '  > 
						<?php 
						foreach($status_opt as $key=>$val)
						{
							echo "<option  value ='$key' ".($row['status'] == $key ? " selected='selected' " : '' ).">$val</option>"; 						
						}						
						?></select> 
										 </div> 
										 
									  </div> 
									  @endif
									</fieldset></div>									
							
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
	 
	
	
		$("#promotion_id").jCombo("{!! secure_url('userpromotion/comboselect?filter=promotions:id:promotion_name') !!}",
		{  selected_value : '{{ $row["promotion_id"] }}' });
		 	
	 
	
	var form = $('#userpromotionFormAjax'); 
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