

		 {!! Form::open(array('url'=>'gamepartners/savepublic', 'class'=>'form-horizontal','files' => true , 'parsley-validate'=>'','novalidate'=>' ')) !!}

	@if(Session::has('messagetext'))
	  
		   {!! Session::get('messagetext') !!}
	   
	@endif
	<ul class="parsley-error-list">
		@foreach($errors->all() as $error)
			<li>{{ $error }}</li>
		@endforeach
	</ul>		


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
		
		
		$("#game_type").jCombo("{!! secure_url('gamepartners/comboselect?filter=game_type:id:name') !!}",
		{  selected_value : '{{ $row["game_type"] }}' });
		 

		$('.removeCurrentFiles').on('click',function(){
			var removeUrl = $(this).attr('href');
			$.get(removeUrl,function(response){});
			$(this).parent('div').empty();	
			return false;
		});		
		
	});
	</script>		 
