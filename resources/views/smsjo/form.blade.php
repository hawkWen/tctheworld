@if($setting['form-method'] =='native')
<div class="card">
	<div class="card-body">
@endif
		<div class="form-ajax-box">
		{!! Form::open(array('url'=>'smsjo?return='.$return, 'class'=>'form-horizontal  sximo-form validated','files' => true , 'parsley-validate'=>'','novalidate'=>' ','id'=> 'smsjoFormAjax')) !!}

			<div class="toolbar-nav">	
				<div class="row">	
					
					<div class="col-md-6">
						<a href="javascript://ajax" onclick="ajaxViewClose('#{{ $pageModule }}')" class="tips btn btn-sm btn-danger  " title="{{ __('core.btn_back') }}" ><i class="fa  fa-times"></i></a>
					</div>
					<div class="col-sm-6 text-right">	
						<div class="btn-group">
							<button type="submit" class="btn btn-sm  btn-primary " name="apply"> {{ Lang::get('core.sb_apply') }} </button>
							<button type="submit" class="btn btn-sm btn-success" name="save">  {{ Lang::get('core.sb_save') }} </button>
						</div>	
					</div>	
							
				</div>
			</div>	
				<div class="row">

			
			<div class="col-md-12">
						<fieldset><legend> smsjo</legend>
				{!! Form::hidden('id', $row['id']) !!}					
									  <div class="form-group row  " >
										<label for="Subject" class=" control-label col-md-4 "> Subject </label>
										<div class="col-md-8">
										  <input  type='text' name='subject' id='subject' value='{{ $row['subject'] }}' 
						     class='form-control form-control-sm ' /> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="Message" class=" control-label col-md-4 "> Message </label>
										<div class="col-md-8">
										  <input  type='text' name='message' id='message' value='{{ $row['message'] }}' 
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
	 
	
	 
				
	var form = $('#smsjoFormAjax'); 
	form.parsley();
	form.submit(function(){
		
		if(form.parsley().isValid()){			
			var options = { 
				dataType:      'json', 
				beforeSubmit :  function(){
				},
				success: function(data) {
					if(data.status == 'success')
					{
						ajaxViewClose('#{{ $pageModule }}');
						var table = $('#smsjoTable').DataTable();
						table.ajax.reload();
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