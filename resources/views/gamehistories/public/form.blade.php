

		 {!! Form::open(array('url'=>'gamehistories/savepublic', 'class'=>'form-horizontal','files' => true , 'parsley-validate'=>'','novalidate'=>' ')) !!}

	@if(Session::has('messagetext'))
	  
		   {!! Session::get('messagetext') !!}
	   
	@endif
	<ul class="parsley-error-list">
		@foreach($errors->all() as $error)
			<li>{{ $error }}</li>
		@endforeach
	</ul>		


<div class="col-md-12">
						<fieldset><legend> ประวัติการเล่นเกม</legend>
				{!! Form::hidden('id', $row['id']) !!}					
									  <div class="form-group row  " >
										<label for="User Id" class=" control-label col-md-4 "> User Id </label>
										<div class="col-md-8">
										  <input  type='text' name='user_id' id='user_id' value='{{ $row['user_id'] }}' 
						     class='form-control form-control-sm ' /> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="Gameusername" class=" control-label col-md-4 "> Gameusername </label>
										<div class="col-md-8">
										  <input  type='text' name='gameusername' id='gameusername' value='{{ $row['gameusername'] }}' 
						     class='form-control form-control-sm ' /> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="Partner" class=" control-label col-md-4 "> Partner </label>
										<div class="col-md-8">
										  <input  type='text' name='partner' id='partner' value='{{ $row['partner'] }}' 
						     class='form-control form-control-sm ' /> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="Bet Id" class=" control-label col-md-4 "> Bet Id </label>
										<div class="col-md-8">
										  <input  type='text' name='bet_id' id='bet_id' value='{{ $row['bet_id'] }}' 
						     class='form-control form-control-sm ' /> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="Bet Amount" class=" control-label col-md-4 "> Bet Amount </label>
										<div class="col-md-8">
										  <textarea name='bet_amount' rows='5' id='bet_amount' class='form-control form-control-sm '  
				           >{{ $row['bet_amount'] }}</textarea> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="Credit Before" class=" control-label col-md-4 "> Credit Before </label>
										<div class="col-md-8">
										  <input  type='text' name='credit_before' id='credit_before' value='{{ $row['credit_before'] }}' 
						     class='form-control form-control-sm ' /> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="Payout Amount" class=" control-label col-md-4 "> Payout Amount </label>
										<div class="col-md-8">
										  <textarea name='payout_amount' rows='5' id='payout_amount' class='form-control form-control-sm '  
				           >{{ $row['payout_amount'] }}</textarea> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="Credit After" class=" control-label col-md-4 "> Credit After </label>
										<div class="col-md-8">
										  <input  type='text' name='credit_after' id='credit_after' value='{{ $row['credit_after'] }}' 
						     class='form-control form-control-sm ' /> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="Systemdate" class=" control-label col-md-4 "> Systemdate </label>
										<div class="col-md-8">
										  
					{!! Form::text('systemdate', $row['systemdate'],array('class'=>'form-control form-control-sm datetime')) !!}
				 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="Bet Type" class=" control-label col-md-4 "> Bet Type </label>
										<div class="col-md-8">
										  <input  type='text' name='bet_type' id='bet_type' value='{{ $row['bet_type'] }}' 
						     class='form-control form-control-sm ' /> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="Spacialbet" class=" control-label col-md-4 "> Spacialbet </label>
										<div class="col-md-8">
										  <input  type='text' name='spacialbet' id='spacialbet' value='{{ $row['spacialbet'] }}' 
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
