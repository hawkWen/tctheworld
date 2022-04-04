@if($setting['form-method'] =='native')
<div class="card">
	<div class="card-body">
@endif
		<div class="form-ajax-box">
		{!! Form::open(array('url'=>'gamecategory?return='.$return, 'class'=>'form-horizontal  sximo-form validated','files' => true , 'parsley-validate'=>'','novalidate'=>' ','id'=> 'gamecategoryFormAjax')) !!}

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
						<fieldset><legend> gamecategory</legend>
				{!! Form::hidden('id', $row['id']) !!}					
									  <div class="form-group row  " >
										<label for="Category Name" class=" control-label col-md-4 "> Category Name </label>
										<div class="col-md-8">
										  <input  type='text' name='category_name' id='category_name' value='{{ $row['category_name'] }}' 
						     class='form-control form-control-sm ' /> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="Image" class=" control-label col-md-4 "> Image </label>
										<div class="col-md-8">
										  
						<div class="fileUpload btn " > 
						    <span>  <i class="fa fa-camera"></i>  </span>
						    <div class="title"> Browse File </div>
						    <input type="file" name="image" class="upload"   accept="image/x-png,image/gif,image/jpeg"     />
						</div>
						<div class="image-preview preview-upload">
							{!! SiteHelpers::showUploadedFile( $row["image"],"/uploads/images/game_categories/") !!}
						</div>
					 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="Game Type" class=" control-label col-md-4 "> Game Type </label>
										<div class="col-md-8">
										  <select name='game_type[]' multiple rows='5' id='game_type' class='select2 '   ></select> 
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
	 
	
	
		$("#game_type").jCombo("{!! secure_url('gamecategory/comboselect?filter=game_type:id:name') !!}",
		{  selected_value : '{{ $row["game_type"] }}' });
		 	
	 
	
	var form = $('#gamecategoryFormAjax'); 
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