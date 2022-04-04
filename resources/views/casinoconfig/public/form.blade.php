

		 {!! Form::open(array('url'=>'casinoconfig/savepublic', 'class'=>'form-horizontal','files' => true , 'parsley-validate'=>'','novalidate'=>' ')) !!}

	@if(Session::has('messagetext'))
	  
		   {!! Session::get('messagetext') !!}
	   
	@endif
	<ul class="parsley-error-list">
		@foreach($errors->all() as $error)
			<li>{{ $error }}</li>
		@endforeach
	</ul>		


<div class="col-md-12">
						<fieldset><legend> casinoconfig</legend>
				{!! Form::hidden('id', $row['id']) !!}					
									  <div class="form-group row  " >
										<label for="Name" class=" control-label col-md-4 "> Name </label>
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
										<label for="Production Token" class=" control-label col-md-4 "> Production Token </label>
										<div class="col-md-8">
										  <input  type='text' name='production_token' id='production_token' value='{{ $row['production_token'] }}' 
						     class='form-control form-control-sm ' /> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="Production Key" class=" control-label col-md-4 "> Production Key </label>
										<div class="col-md-8">
										  <input  type='text' name='production_key' id='production_key' value='{{ $row['production_key'] }}' 
						     class='form-control form-control-sm ' /> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="Test Token" class=" control-label col-md-4 "> Test Token </label>
										<div class="col-md-8">
										  <input  type='text' name='test_token' id='test_token' value='{{ $row['test_token'] }}' 
						     class='form-control form-control-sm ' /> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="Test Key" class=" control-label col-md-4 "> Test Key </label>
										<div class="col-md-8">
										  <input  type='text' name='test_key' id='test_key' value='{{ $row['test_key'] }}' 
						     class='form-control form-control-sm ' /> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="Game Test Url" class=" control-label col-md-4 "> Game Test Url </label>
										<div class="col-md-8">
										  <input  type='text' name='game_test_url' id='game_test_url' value='{{ $row['game_test_url'] }}' 
						     class='form-control form-control-sm ' /> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="Game Production Url" class=" control-label col-md-4 "> Game Production Url </label>
										<div class="col-md-8">
										  <input  type='text' name='game_production_url' id='game_production_url' value='{{ $row['game_production_url'] }}' 
						     class='form-control form-control-sm ' /> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="Active" class=" control-label col-md-4 "> Active </label>
										<div class="col-md-8">
										  <input  type='text' name='active' id='active' value='{{ $row['active'] }}' 
						     class='form-control form-control-sm ' /> 
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
		
		 

		$('.removeCurrentFiles').on('click',function(){
			var removeUrl = $(this).attr('href');
			$.get(removeUrl,function(response){});
			$(this).parent('div').empty();	
			return false;
		});		
		
	});
	</script>		 
