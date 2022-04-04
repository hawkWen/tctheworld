

		 {!! Form::open(array('url'=>'affiliate/savepublic', 'class'=>'form-horizontal','files' => true , 'parsley-validate'=>'','novalidate'=>' ')) !!}

	@if(Session::has('messagetext'))
	  
		   {!! Session::get('messagetext') !!}
	   
	@endif
	<ul class="parsley-error-list">
		@foreach($errors->all() as $error)
			<li>{{ $error }}</li>
		@endforeach
	</ul>		


<div class="col-md-12">
						<fieldset><legend> รายละเอียด</legend>
				{!! Form::hidden('id', $row['id']) !!}					
									  <div class="form-group row  " >
										<label for="ชื่อ affiliate" class=" control-label col-md-4 "> ชื่อ affiliate </label>
										<div class="col-md-8">
										  <input  type='text' name='affiliate_name' id='affiliate_name' value='{{ $row['affiliate_name'] }}' 
						     class='form-control form-control-sm ' /> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="ฝากขั้นต่ำที่ได้รับค่าคอม" class=" control-label col-md-4 "> ฝากขั้นต่ำที่ได้รับค่าคอม <span class="asterix"> * </span></label>
										<div class="col-md-8">
										  <input  type='text' name='deposit_min' id='deposit_min' value='{{ $row['deposit_min'] }}' 
						required     class='form-control form-control-sm ' /> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="ขั้นต่ำที่ถอนค่าคอมได้" class=" control-label col-md-4 "> ขั้นต่ำที่ถอนค่าคอมได้ <span class="asterix"> * </span></label>
										<div class="col-md-8">
										  <input  type='text' name='withdraw_min' id='withdraw_min' value='{{ $row['withdraw_min'] }}' 
						required     class='form-control form-control-sm ' /> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="ค่าธรรมเนียม" class=" control-label col-md-4 "> ค่าธรรมเนียม <span class="asterix"> * </span></label>
										<div class="col-md-8">
										  <input  type='text' name='fee' id='fee' value='{{ $row['fee'] }}' 
						required     class='form-control form-control-sm ' /> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="การคิดค่าคอม" class=" control-label col-md-4 "> การคิดค่าคอม </label>
										<div class="col-md-8">
										  
					
					<input type='radio' name='duedate' value ='daily'  @if($row['duedate'] == 'daily') checked="checked" @endif class='filled-in' id='duedate-0'> <label for='duedate-0'>รายวัน </label>
					
					<input type='radio' name='duedate' value ='weekly'  @if($row['duedate'] == 'weekly') checked="checked" @endif class='filled-in' id='duedate-1'> <label for='duedate-1'>รายสัปดาห์ </label>
					
					<input type='radio' name='duedate' value ='monthly'  @if($row['duedate'] == 'monthly') checked="checked" @endif class='filled-in' id='duedate-2'> <label for='duedate-2'>รายเดือน </label> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="ส่วนแบ่ง" class=" control-label col-md-4 "> ส่วนแบ่ง </label>
										<div class="col-md-8">
										  <input  type='text' name='percent_commission' id='percent_commission' value='{{ $row['percent_commission'] }}' 
						     class='form-control form-control-sm ' /> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="รายได้สูงสุดต่อคน" class=" control-label col-md-4 "> รายได้สูงสุดต่อคน </label>
										<div class="col-md-8">
										  <input  type='text' name='max_income' id='max_income' value='{{ $row['max_income'] }}' 
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
		$('.addC').relCopy({});
		 

		$('.removeCurrentFiles').on('click',function(){
			var removeUrl = $(this).attr('href');
			$.get(removeUrl,function(response){});
			$(this).parent('div').empty();	
			return false;
		});		
		
	});
	</script>		 
