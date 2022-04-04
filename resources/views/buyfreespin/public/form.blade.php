

		 {!! Form::open(array('url'=>'buyfreespin/savepublic', 'class'=>'form-horizontal','files' => true , 'parsley-validate'=>'','novalidate'=>' ')) !!}

	@if(Session::has('messagetext'))
	  
		   {!! Session::get('messagetext') !!}
	   
	@endif
	<ul class="parsley-error-list">
		@foreach($errors->all() as $error)
			<li>{{ $error }}</li>
		@endforeach
	</ul>		


<div class="col-md-12">
						<fieldset><legend> buyfreespin</legend>
				{!! Form::hidden('id', $row['id']) !!}					
									  <div class="form-group row  " >
										<label for="User Id" class=" control-label col-md-4 "> User Id </label>
										<div class="col-md-8">
										  <input  type='text' name='user_id' id='user_id' value='{{ $row['user_id'] }}' 
						     class='form-control form-control-sm ' /> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="Username" class=" control-label col-md-4 "> Username </label>
										<div class="col-md-8">
										  <input  type='text' name='username' id='username' value='{{ $row['username'] }}' 
						     class='form-control form-control-sm ' /> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="Agent" class=" control-label col-md-4 "> Agent </label>
										<div class="col-md-8">
										  <input  type='text' name='agent' id='agent' value='{{ $row['agent'] }}' 
						     class='form-control form-control-sm ' /> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="Type" class=" control-label col-md-4 "> Type </label>
										<div class="col-md-8">
										  <input  type='text' name='type' id='type' value='{{ $row['type'] }}' 
						     class='form-control form-control-sm ' /> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="Amount" class=" control-label col-md-4 "> Amount </label>
										<div class="col-md-8">
										  <input  type='text' name='amount' id='amount' value='{{ $row['amount'] }}' 
						     class='form-control form-control-sm ' /> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="Product" class=" control-label col-md-4 "> Product </label>
										<div class="col-md-8">
										  <input  type='text' name='product' id='product' value='{{ $row['product'] }}' 
						     class='form-control form-control-sm ' /> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="Category" class=" control-label col-md-4 "> Category </label>
										<div class="col-md-8">
										  <input  type='text' name='category' id='category' value='{{ $row['category'] }}' 
						     class='form-control form-control-sm ' /> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="GameName" class=" control-label col-md-4 "> GameName </label>
										<div class="col-md-8">
										  <input  type='text' name='gameName' id='gameName' value='{{ $row['gameName'] }}' 
						     class='form-control form-control-sm ' /> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="RoundId" class=" control-label col-md-4 "> RoundId </label>
										<div class="col-md-8">
										  <input  type='text' name='roundId' id='roundId' value='{{ $row['roundId'] }}' 
						     class='form-control form-control-sm ' /> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="RefId" class=" control-label col-md-4 "> RefId </label>
										<div class="col-md-8">
										  <input  type='text' name='refId' id='refId' value='{{ $row['refId'] }}' 
						     class='form-control form-control-sm ' /> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="Timestamp" class=" control-label col-md-4 "> Timestamp </label>
										<div class="col-md-8">
										  <input  type='text' name='timestamp' id='timestamp' value='{{ $row['timestamp'] }}' 
						     class='form-control form-control-sm ' /> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="Bal After" class=" control-label col-md-4 "> Bal After </label>
										<div class="col-md-8">
										  <input  type='text' name='bal_after' id='bal_after' value='{{ $row['bal_after'] }}' 
						     class='form-control form-control-sm ' /> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="Bal Before" class=" control-label col-md-4 "> Bal Before </label>
										<div class="col-md-8">
										  <input  type='text' name='bal_before' id='bal_before' value='{{ $row['bal_before'] }}' 
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
