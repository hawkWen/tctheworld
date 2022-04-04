@if($setting['form-method'] =='native')
<div class="card">
	<div class="card-body">
@endif
		<div class="form-ajax-box">
		{!! Form::open(array('url'=>'diamondshop?return='.$return, 'class'=>'form-horizontal  sximo-form validated','files' => true , 'parsley-validate'=>'','novalidate'=>' ','id'=> 'diamondshopFormAjax')) !!}

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
						<fieldset><legend> ร้านค้าเพชร</legend>
				{!! Form::hidden('id', $row['id']) !!}					
									  <div class="form-group row  " >
										<label for="รูป" class=" control-label col-md-4 "> รูป <span class="asterix"> * </span></label>
										<div class="col-md-8">
										  
						<div class="fileUpload btn " > 
						    <span>  <i class="fa fa-camera"></i>  </span>
						    <div class="title"> Browse File </div>
						    <input type="file" name="image" class="upload"   accept="image/x-png,image/gif,image/jpeg"     />
						</div>
						<div class="image-preview preview-upload">
							{!! SiteHelpers::showUploadedFile( $row["image"],"/uploads/images/products/") !!}
						</div>
					 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="ชื่อสินค้า" class=" control-label col-md-4 "> ชื่อสินค้า <span class="asterix"> * </span></label>
										<div class="col-md-8">
										  <input  type='text' name='product_name' id='product_name' value='{{ $row['product_name'] }}' 
						required     class='form-control form-control-sm ' /> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="รายละเอียด" class=" control-label col-md-4 "> รายละเอียด <span class="asterix"> * </span></label>
										<div class="col-md-8">
										  <textarea name='product_desc' rows='5' id='product_desc' class='form-control form-control-sm '  
				         required  >{{ $row['product_desc'] }}</textarea> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="ราคาเพชร" class=" control-label col-md-4 "> ราคาเพชร <span class="asterix"> * </span></label>
										<div class="col-md-8">
										  <input  type='text' name='diamond_price' id='diamond_price' value='{{ $row['diamond_price'] }}' 
						required     class='form-control form-control-sm ' /> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="แลกเครดิต" class=" control-label col-md-4 "> แลกเครดิต <span class="asterix"> * </span></label>
										<div class="col-md-8">
										  <input  type='text' name='convert_credit' id='convert_credit' value='{{ $row['convert_credit'] }}' 
						required     class='form-control form-control-sm ' /> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="ใช้งาน?" class=" control-label col-md-4 "> ใช้งาน? <span class="asterix"> * </span></label>
										<div class="col-md-8">
										  
					
					<input type='radio' name='active' value ='1' required @if($row['active'] == '1') checked="checked" @endif class='filled-in' id='active-0'> <label for='active-0'>เปิด </label>
					
					<input type='radio' name='active' value ='0' required @if($row['active'] == '0') checked="checked" @endif class='filled-in' id='active-1'> <label for='active-1'>ปิด </label> 
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
	 
	
	 	
	 
	
	var form = $('#diamondshopFormAjax'); 
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