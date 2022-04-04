

		 {!! Form::open(array('url'=>'userpromotion/savepublic', 'class'=>'form-horizontal','files' => true , 'parsley-validate'=>'','novalidate'=>' ')) !!}

	@if(Session::has('messagetext'))
	  
		   {!! Session::get('messagetext') !!}
	   
	@endif
	<ul class="parsley-error-list">
		@foreach($errors->all() as $error)
			<li>{{ $error }}</li>
		@endforeach
	</ul>		


<div class="col-md-12">
						<fieldset><legend> ลูกค้าที่รับโปรโมชั่นในตอนนี้</legend>
				{!! Form::hidden('id', $row['id']) !!}					
									  <div class="form-group row  " >
										<label for="ชื่อลูกค้า" class=" control-label col-md-4 "> ชื่อลูกค้า </label>
										<div class="col-md-8">
										  <select name='user_id' rows='5' id='user_id' class='select2 '  readonly ></select> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="โปรโมชั่น" class=" control-label col-md-4 "> โปรโมชั่น </label>
										<div class="col-md-8">
										  <select name='promotion_id' rows='5' id='promotion_id' class='select2 '  readonly ></select> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="Credit Additional" class=" control-label col-md-4 "> Credit Additional </label>
										<div class="col-md-8">
										  <input  type='text' name='credit_additional' id='credit_additional' value='{{ $row['credit_additional'] }}' 
						  readonly   class='form-control form-control-sm ' /> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="Date Time" class=" control-label col-md-4 "> Date Time </label>
										<div class="col-md-8">
										  
					{!! Form::text('date_time', $row['date_time'],array('class'=>'form-control form-control-sm datetime')) !!}
				 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="สถานะ" class=" control-label col-md-4 "> สถานะ </label>
										<div class="col-md-8">
										  
					<?php $status = explode(',',$row['status']);
					$status_opt = array( 'wait' => 'รอตรวจสอบ' ,  'confirmed' => 'ยืนยัน' ,  'cancel' => 'ยกเลิก' , ); ?>
					<select name='status' rows='5'   class='select2 '  > 
						<?php 
						foreach($status_opt as $key=>$val)
						{
							echo "<option  value ='$key' ".($row['status'] == $key ? " selected='selected' " : '' ).">$val</option>"; 						
						}						
						?></select> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="Bonususername" class=" control-label col-md-4 "> Bonususername </label>
										<div class="col-md-8">
										  <textarea name='bonususername' rows='5' id='bonususername' class='form-control form-control-sm '  
				           >{{ $row['bonususername'] }}</textarea> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="Urls" class=" control-label col-md-4 "> Urls </label>
										<div class="col-md-8">
										  <textarea name='urls' rows='5' id='urls' class='form-control form-control-sm '  
				           >{{ $row['urls'] }}</textarea> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="Images" class=" control-label col-md-4 "> Images </label>
										<div class="col-md-8">
										  
					<a href="javascript:void(0)" class="btn btn-xs btn-primary pull-right" onclick="addMoreFiles('images')"><i class="fa fa-plus"></i></a>
					<div class="imagesUpl multipleUpl">	
						<div class="fileUpload btn " > 
						    <span>  <i class="fa fa-camera"></i>  </span>
						    <div class="title"> Browse File </div>
						    <input type="file" name="images[]" class="upload"   accept="image/x-png,image/gif,image/jpeg"     />
						</div>		
					</div>
					<ul class="uploadedLists " >
					<?php $cr= 0; 
					$row['images'] = explode(",",$row['images']);
					?>
					@foreach($row['images'] as $files)
						@if(file_exists('./uploads/missions/'.$files) && $files !='')
						<li id="cr-<?php echo $cr;?>" class="">							
							<a href="{{ secure_url('/uploads/missions//'.$files) }}" target="_blank" >
							{!! SiteHelpers::showUploadedFile( $files ,"/uploads/images/",100) !!}
							</a> 
							<span class="pull-right removeMultiFiles" rel="cr-<?php echo $cr;?>" url="/uploads/missions/{{$files}}">
							<i class="fa fa-trash-o  btn btn-xs btn-danger"></i></span>
							<input type="hidden" name="currimages[]" value="{{ $files }}"/>
							<?php ++$cr;?>
						</li>
						@endif
					
					@endforeach
					</ul>
					 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="Activity" class=" control-label col-md-4 "> Activity </label>
										<div class="col-md-8">
										  <textarea name='activity' rows='5' id='activity' class='form-control form-control-sm '  
				           >{{ $row['activity'] }}</textarea> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="Remark" class=" control-label col-md-4 "> Remark </label>
										<div class="col-md-8">
										  <textarea name='remark' rows='5' id='remark' class='form-control form-control-sm '  
				           >{{ $row['remark'] }}</textarea> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="Game Type" class=" control-label col-md-4 "> Game Type </label>
										<div class="col-md-8">
										  <textarea name='game_type' rows='5' id='game_type' class='form-control form-control-sm '  
				           >{{ $row['game_type'] }}</textarea> 
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
		
		
		$("#user_id").jCombo("{!! secure_url('userpromotion/comboselect?filter=tb_users:id:username') !!}",
		{  selected_value : '{{ $row["user_id"] }}' });
		
		$("#promotion_id").jCombo("{!! secure_url('userpromotion/comboselect?filter=promotions:id:promotion_name') !!}",
		{  selected_value : '{{ $row["promotion_id"] }}' });
		 

		$('.removeCurrentFiles').on('click',function(){
			var removeUrl = $(this).attr('href');
			$.get(removeUrl,function(response){});
			$(this).parent('div').empty();	
			return false;
		});		
		
	});
	</script>		 
