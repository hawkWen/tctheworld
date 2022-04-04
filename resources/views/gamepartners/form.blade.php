@if($setting['form-method'] =='native')
<div class="card">
	<div class="card-body">
@endif
		<div class="form-ajax-box">
		{!! Form::open(array('url'=>'gamepartners?return='.$return, 'class'=>'form-horizontal  sximo-form validated','files' => true , 'parsley-validate'=>'','novalidate'=>' ','id'=> 'gamepartnersFormAjax')) !!}

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
						<fieldset><legend> ค่ายเกม</legend>
				{!! Form::hidden('id', $row['id']) !!}					
									  <div class="form-group row  " >
										<label for="ชื่อ" class=" control-label col-md-4 "> ชื่อ </label>
										<div class="col-md-8">
										  <input  type='text' name='name' id='name' value='{{ $row['name'] }}' 
						     class='form-control form-control-sm ' /> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="Short Name" class=" control-label col-md-4 "> Short Name </label>
										<div class="col-md-8">
										  <input  type='text' name='short_name' id='short_name' value='{{ $row['short_name'] }}' 
						     class='form-control form-control-sm ' /> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="รูป" class=" control-label col-md-4 "> รูป </label>
										<div class="col-md-8">
										  
						<div class="fileUpload btn " > 
						    <span>  <i class="fa fa-camera"></i>  </span>
						    <div class="title"> Browse File </div>
						    <input type="file" name="image" class="upload"   accept="image/x-png,image/gif,image/jpeg"     />
						</div>
						<div class="image-preview preview-upload">
							{!! SiteHelpers::showUploadedFile( $row["image"],"/uploads/images/partners/") !!}
						</div>
					 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="Thumbnail" class=" control-label col-md-4 "> Thumbnail </label>
										<div class="col-md-8">
										  
						<div class="fileUpload btn " > 
						    <span>  <i class="fa fa-camera"></i>  </span>
						    <div class="title"> Browse File </div>
						    <input type="file" name="thumbnail" class="upload"   accept="image/x-png,image/gif,image/jpeg"     />
						</div>
						<div class="thumbnail-preview preview-upload">
							{!! SiteHelpers::showUploadedFile( $row["thumbnail"],"/uploads/images/partners/thumbnail/") !!}
						</div>
					 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="Game Type" class=" control-label col-md-4 "> Game Type </label>
										<div class="col-md-8">
										  <select name='game_type' rows='5' id='game_type' class='select2 '   ></select> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="Active" class=" control-label col-md-4 "> Active </label>
										<div class="col-md-8">
										  
					
					<input type='radio' name='active' value ='1'  @if($row['active'] == '1') checked="checked" @endif class='filled-in' id='active-0'> <label for='active-0'>active </label>
					
					<input type='radio' name='active' value ='0'  @if($row['active'] == '0') checked="checked" @endif class='filled-in' id='active-1'> <label for='active-1'>inactive </label> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="ซ่อนค่ายในโปรโมชั่น" class=" control-label col-md-4 "> ซ่อนค่ายในโปรโมชั่น </label>
										<div class="col-md-8">
										  
					
					<input type='radio' name='hidden_pro' value ='1'  @if($row['hidden_pro'] == '1') checked="checked" @endif class='filled-in' id='hidden_pro-0'> <label for='hidden_pro-0'>ปิด </label>
					
					<input type='radio' name='hidden_pro' value ='0'  @if($row['hidden_pro'] == '0') checked="checked" @endif class='filled-in' id='hidden_pro-1'> <label for='hidden_pro-1'>เปิด </label> 
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
	 
	
	
		$("#game_type").jCombo("{!! secure_url('gamepartners/comboselect?filter=game_type:id:name') !!}",
		{  selected_value : '{{ $row["game_type"] }}' });
		 	
	 
	
	var form = $('#gamepartnersFormAjax'); 
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