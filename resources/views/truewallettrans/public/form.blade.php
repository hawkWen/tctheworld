

		 {!! Form::open(array('url'=>'truewallettrans', 'class'=>'form-horizontal','files' => true , 'parsley-validate'=>'','novalidate'=>' ')) !!}

	@if(Session::has('messagetext'))
	  
		   {!! Session::get('messagetext') !!}
	   
	@endif
	<ul class="parsley-error-list">
		@foreach($errors->all() as $error)
			<li>{{ $error }}</li>
		@endforeach
	</ul>		


<div class="col-md-12">
						<fieldset><legend> truewallettrans</legend>
				{!! Form::hidden('id', $row['id']) !!}					
									  <div class="form-group row  " >
										<label for="เบอร์โทร" class=" control-label col-md-4 "> เบอร์โทร <span class="asterix"> * </span></label>
										<div class="col-md-8">
										  <input  type='text' name='phone' id='phone' value='{{ $row['phone'] }}' 
						required     class='form-control form-control-sm ' /> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="ช่องทาง" class=" control-label col-md-4 "> ช่องทาง <span class="asterix"> * </span></label>
										<div class="col-md-8">
										  
					<?php $name = explode(',',$row['name']);
					$name_opt = array( 'โอนเงิน' => 'โอนเงิน' ,  'ถอนเงิน' => 'ถอนเงิน' , ); ?>
					<select name='name' rows='5' required  class='select2 '  > 
						<?php 
						foreach($name_opt as $key=>$val)
						{
							echo "<option  value ='$key' ".($row['name'] == $key ? " selected='selected' " : '' ).">$val</option>"; 						
						}						
						?></select> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="วันเวลา" class=" control-label col-md-4 "> วันเวลา <span class="asterix"> * </span></label>
										<div class="col-md-8">
										  
					{!! Form::text('date', $row['date'],array('class'=>'form-control form-control-sm datetime')) !!}
				 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="ยอด" class=" control-label col-md-4 "> ยอด <span class="asterix"> * </span></label>
										<div class="col-md-8">
										  <input  type='text' name='amount' id='amount' value='{{ $row['amount'] }}' 
						required     class='form-control form-control-sm ' /> 
										 </div> 
										 
									  </div> </fieldset></div>

			<div style="clear:both"></div>	
				
					
				  <div class="form-group">
					<label class="col-sm-4 text-right">&nbsp;</label>
					<div class="col-sm-8">	
					<button type="submit" name="apply" class="btn btn-default btn-sm" ><i class="fa  fa-check-circle"></i> {{ Lang::get('core.sb_apply') }}</button>
					<button type="submit" name="submit" class="btn btn-default btn-sm" ><i class="fa  fa-save "></i> {{ Lang::get('core.sb_save') }}</button>
				  </div>	  
			
		</div> 
		 <input type="hidden" name="action_task" value="public" />
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
