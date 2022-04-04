

		 {!! Form::open(array('url'=>'level/savepublic', 'class'=>'form-horizontal','files' => true , 'parsley-validate'=>'','novalidate'=>' ')) !!}

	@if(Session::has('messagetext'))
	  
		   {!! Session::get('messagetext') !!}
	   
	@endif
	<ul class="parsley-error-list">
		@foreach($errors->all() as $error)
			<li>{{ $error }}</li>
		@endforeach
	</ul>		


<div class="col-md-12">
						<fieldset><legend> level</legend>
				{!! Form::hidden('id', $row['id']) !!}					
									  <div class="form-group row  " >
										<label for="Affiliate Id" class=" control-label col-md-4 "> Affiliate Id </label>
										<div class="col-md-8">
										  <select name='affiliate_id' rows='5' id='affiliate_id' class='select2 '   ></select> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="Level Order" class=" control-label col-md-4 "> Level Order <span class="asterix"> * </span></label>
										<div class="col-md-8">
										  <input  type='text' name='level_order' id='level_order' value='{{ $row['level_order'] }}' 
						required     class='form-control form-control-sm ' /> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="Level Name" class=" control-label col-md-4 "> Level Name </label>
										<div class="col-md-8">
										  <input  type='text' name='level_name' id='level_name' value='{{ $row['level_name'] }}' 
						     class='form-control form-control-sm ' /> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="Commission" class=" control-label col-md-4 "> Commission <span class="asterix"> * </span></label>
										<div class="col-md-8">
										  <input  type='text' name='commission' id='commission' value='{{ $row['commission'] }}' 
						required     class='form-control form-control-sm ' /> 
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
		
		
		$("#affiliate_id").jCombo("{!! secure_url('level/comboselect?filter=affiliate_settings:id:affiliate_name') !!}",
		{  selected_value : '{{ $row["affiliate_id"] }}' });
		 

		$('.removeCurrentFiles').on('click',function(){
			var removeUrl = $(this).attr('href');
			$.get(removeUrl,function(response){});
			$(this).parent('div').empty();	
			return false;
		});		
		
	});
	</script>		 
