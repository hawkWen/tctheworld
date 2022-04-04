

		 {!! Form::open(array('url'=>'balance/savepublic', 'class'=>'form-horizontal','files' => true , 'parsley-validate'=>'','novalidate'=>' ')) !!}

	@if(Session::has('messagetext'))
	  
		   {!! Session::get('messagetext') !!}
	   
	@endif
	<ul class="parsley-error-list">
		@foreach($errors->all() as $error)
			<li>{{ $error }}</li>
		@endforeach
	</ul>		


<div class="col-md-12">
						<fieldset><legend> balance</legend>
				{!! Form::hidden('id', $row['id']) !!}					
									  <div class="form-group row  " >
										<label for="Username" class=" control-label col-md-4 "> Username <span class="asterix"> * </span></label>
										<div class="col-md-8">
										  <input  type='text' name='username' id='username' value='{{ $row['username'] }}' 
						required  readonly   class='form-control form-control-sm ' /> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="Agent Id" class=" control-label col-md-4 "> Agent Id <span class="asterix"> * </span></label>
										<div class="col-md-8">
										  <input  type='text' name='agent_id' id='agent_id' value='{{ $row['agent_id'] }}' 
						required  readonly   class='form-control form-control-sm ' /> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="Bank" class=" control-label col-md-4 "> Bank <span class="asterix"> * </span></label>
										<div class="col-md-8">
										  <select name='bank' rows='5' id='bank' class='select2 ' required  ></select> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="Account Number" class=" control-label col-md-4 "> Account Number <span class="asterix"> * </span></label>
										<div class="col-md-8">
										  <input  type='text' name='account_number' id='account_number' value='{{ $row['account_number'] }}' 
						required     class='form-control form-control-sm ' /> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="Gameusername" class=" control-label col-md-4 "> Gameusername <span class="asterix"> * </span></label>
										<div class="col-md-8">
										  <input  type='text' name='gameusername' id='gameusername' value='{{ $row['gameusername'] }}' 
						required  readonly   class='form-control form-control-sm ' /> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="Gamepassword" class=" control-label col-md-4 "> Gamepassword <span class="asterix"> * </span></label>
										<div class="col-md-8">
										  <input  type='text' name='gamepassword' id='gamepassword' value='{{ $row['gamepassword'] }}' 
						required  readonly   class='form-control form-control-sm ' /> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="Balance" class=" control-label col-md-4 "> Balance <span class="asterix"> * </span></label>
										<div class="col-md-8">
										  <input  type='text' name='balance' id='balance' value='{{ $row['balance'] }}' 
						required  readonly   class='form-control form-control-sm ' /> 
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
		
		
		$("#bank").jCombo("{!! secure_url('balance/comboselect?filter=banks:bank_id:bank_name') !!}",
		{  selected_value : '{{ $row["bank"] }}' });
		 

		$('.removeCurrentFiles').on('click',function(){
			var removeUrl = $(this).attr('href');
			$.get(removeUrl,function(response){});
			$(this).parent('div').empty();	
			return false;
		});		
		
	});
	</script>		 
