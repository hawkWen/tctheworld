@extends('layouts.app')

@section('content')
<div class="page-titles">
  <h2> {{ $pageTitle }} <small> {{ $pageNote }} </small></h2>
</div>
<div class="card">
	<div class="card-body">


	{!! Form::open(array('url'=>'promotionauto?return='.$return, 'class'=>'form-horizontal  validated sximo-form','files' => true ,'id'=> 'FormTable' )) !!}
	<div class="toolbar-nav">
		<div class="row">
			<div class="col-md-6 " >
				 <a href="{{ secure_url($pageModule.'?return='.$return) }}" class="tips btn btn-danger  btn-sm "  title="{{ __('core.btn_back') }}" ><i class="fa  fa-times"></i></a>
			</div>
			<div class="col-md-6  text-right " >
				<div class="btn-group">
					
						<button name="apply" class="tips btn btn-sm btn-info  "  title="{{ __('core.btn_back') }}" > {{ __('core.sb_apply') }} </button>
						<button name="save" class="tips btn btn-sm btn-primary "  id="saved-button" title="{{ __('core.btn_back') }}" > {{ __('core.sb_save') }} </button> 
						
					
				</div>		
			</div>
			
		</div>
	</div>	


	
	<ul class="parsley-error-list">
		@foreach($errors->all() as $error)
			<li>{{ $error }}</li>
		@endforeach
	</ul>		
	<div class="">
		<div class="col-md-12">
						<fieldset><legend> โบนัสอัตโนมัติ</legend>
				{!! Form::hidden('id', $row['id']) !!}					
									  <div class="form-group row  " >
										<label for="หมวดหมู่" class=" control-label col-md-4 "> หมวดหมู่ <span class="asterix"> * </span></label>
										<div class="col-md-8">
										  
					<?php $promotion_category_id = explode(',',$row['promotion_category_id']);
					$promotion_category_id_opt = array( '12' => 'โบนัสอัตโนมัติ' , ); ?>
					<select name='promotion_category_id' rows='5' required  class='select2 '  > 
						<?php 
						foreach($promotion_category_id_opt as $key=>$val)
						{
							echo "<option  value ='$key' ".($row['promotion_category_id'] == $key ? " selected='selected' " : '' ).">$val</option>"; 						
						}						
						?></select> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="ชื่อโปร" class=" control-label col-md-4 "> ชื่อโปร <span class="asterix"> * </span></label>
										<div class="col-md-8">
										  <input  type='text' name='promotion_name' id='promotion_name' value='{{ $row['promotion_name'] }}' 
						required     class='form-control form-control-sm ' /> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="รายละเอียด" class=" control-label col-md-4 "> รายละเอียด <span class="asterix"> * </span></label>
										<div class="col-md-8">
										  <textarea name='promotion_detail' rows='5' id='editor' class='form-control form-control-sm editor '  
						required >{{ $row['promotion_detail'] }}</textarea> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="รูปโปร" class=" control-label col-md-4 "> รูปโปร </label>
										<div class="col-md-8">
										  
					<a href="javascript:void(0)" class="btn btn-xs btn-primary pull-right" onclick="addMoreFiles('image')"><i class="fa fa-plus"></i></a>
					<div class="imageUpl multipleUpl">	
						<div class="fileUpload btn " > 
						    <span>  <i class="fa fa-camera"></i>  </span>
						    <div class="title"> Browse File </div>
						    <input type="file" name="image[]" class="upload"   accept="image/x-png,image/gif,image/jpeg"     />
						</div>		
					</div>
					<ul class="uploadedLists " >
					<?php $cr= 0; 
					$row['image'] = explode(",",$row['image']);
					?>
					@foreach($row['image'] as $files)
						@if(file_exists('./uploads/images/promotions/'.$files) && $files !='')
						<li id="cr-<?php echo $cr;?>" class="">							
							<a href="{{ url('/uploads/images/promotions//'.$files) }}" target="_blank" >
							{!! SiteHelpers::showUploadedFile( $files ,"/uploads/images/",100) !!}
							</a> 
							<span class="pull-right removeMultiFiles" rel="cr-<?php echo $cr;?>" url="/uploads/images/promotions/{{$files}}">
							<i class="fa fa-trash-o  btn btn-xs btn-danger"></i></span>
							<input type="hidden" name="currimage[]" value="{{ $files }}"/>
							<?php ++$cr;?>
						</li>
						@endif
					
					@endforeach
					</ul>
					 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="เงินฝาก" class=" control-label col-md-4 "> เงินฝาก <span class="asterix"> * </span></label>
										<div class="col-md-8">
										  <input  type='text' name='deposit_amount' id='deposit_amount' value='{{ $row['deposit_amount'] }}' 
						required     class='form-control form-control-sm ' /> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="ชนิด" class=" control-label col-md-4 "> ชนิด <span class="asterix"> * </span></label>
										<div class="col-md-8">
										  
					<?php $type = explode(',',$row['type']);
					$type_opt = array( 'percent' => 'คิดแบบเปอเซ็นต์' ,  'fix' => 'ให้แบบตายตัว' , ); ?>
					<select name='type' rows='5' required  class='select2 '  > 
						<?php 
						foreach($type_opt as $key=>$val)
						{
							echo "<option  value ='$key' ".($row['type'] == $key ? " selected='selected' " : '' ).">$val</option>"; 						
						}						
						?></select> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="รวมรับ" class=" control-label col-md-4 "> รวมรับ <span class="asterix"> * </span></label>
										<div class="col-md-8">
										  <input  type='text' name='value' id='value' value='{{ $row['value'] }}' 
						required     class='form-control form-control-sm ' /> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="โบนัสสูงสุด" class=" control-label col-md-4 "> โบนัสสูงสุด <span class="asterix"> * </span></label>
										<div class="col-md-8">
										  <input  type='text' name='max_bonus' id='max_bonus' value='{{ $row['max_bonus'] }}' 
						required     class='form-control form-control-sm ' /> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="การนับเทิน" class=" control-label col-md-4 "> การนับเทิน </label>
										<div class="col-md-8">
										  
					
					<input type='radio' name='turn_type' value ='amount'  @if($row['turn_type'] == 'amount') checked="checked" @endif class='filled-in' id='turn_type-0'> <label for='turn_type-0'>ทำยอดเงิน </label>
					
					<input type='radio' name='turn_type' value ='turn'  @if($row['turn_type'] == 'turn') checked="checked" @endif class='filled-in' id='turn_type-1'> <label for='turn_type-1'>ทำยอดเล่น </label> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="เทิร์น" class=" control-label col-md-4 "> เทิร์น <span class="asterix"> * </span></label>
										<div class="col-md-8">
										  <input  type='text' name='turnover' id='turnover' value='{{ $row['turnover'] }}' 
						required     class='form-control form-control-sm ' /> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="เกี่ยวข้อง" class=" control-label col-md-4 "> เกี่ยวข้อง </label>
										<div class="col-md-8">
										  <select name='relate_promotion_id' rows='5' id='relate_promotion_id' class='select2 '   ></select> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="ถอนได้" class=" control-label col-md-4 "> ถอนได้ <span class="asterix"> * </span></label>
										<div class="col-md-8">
										  <input  type='text' name='withdraw_amount' id='withdraw_amount' value='{{ $row['withdraw_amount'] }}' 
						required     class='form-control form-control-sm ' /> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="ถอนได้สูงสุด" class=" control-label col-md-4 "> ถอนได้สูงสุด </label>
										<div class="col-md-8">
										  <input  type='text' name='max_withdraw' id='max_withdraw' value='{{ $row['max_withdraw'] }}' 
						     class='form-control form-control-sm ' /> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="เงื่อนไข" class=" control-label col-md-4 "> เงื่อนไข </label>
										<div class="col-md-8">
										  <input  type='text' name='note' id='note' value='{{ $row['note'] }}' 
						     class='form-control form-control-sm ' /> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="ครั้ง" class=" control-label col-md-4 "> ครั้ง <span class="asterix"> * </span></label>
										<div class="col-md-8">
										  <input  type='text' name='get_times' id='get_times' value='{{ $row['get_times'] }}' 
						required     class='form-control form-control-sm ' /> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="สถานะ" class=" control-label col-md-4 "> สถานะ <span class="asterix"> * </span></label>
										<div class="col-md-8">
										  
					
					<input type='radio' name='active' value ='1' required @if($row['active'] == '1') checked="checked" @endif class='filled-in' id='active-0'> <label for='active-0'>active </label>
					
					<input type='radio' name='active' value ='0' required @if($row['active'] == '0') checked="checked" @endif class='filled-in' id='active-1'> <label for='active-1'>inactive </label> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="ประเภท" class=" control-label col-md-4 "> ประเภท <span class="asterix"> * </span></label>
										<div class="col-md-8">
										  
					<?php $promotion_type = explode(',',$row['promotion_type']);
					$promotion_type_opt = array( 'auto' => 'auto' ,  'approved' => 'approved' , ); ?>
					<select name='promotion_type' rows='5' required  class='select2 '  > 
						<?php 
						foreach($promotion_type_opt as $key=>$val)
						{
							echo "<option  value ='$key' ".($row['promotion_type'] == $key ? " selected='selected' " : '' ).">$val</option>"; 						
						}						
						?></select> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="กิจกรรม?" class=" control-label col-md-4 "> กิจกรรม? <span class="asterix"> * </span></label>
										<div class="col-md-8">
										  
					
					<input type='radio' name='activity' value ='0' required @if($row['activity'] == '0') checked="checked" @endif class='filled-in' id='activity-0'> <label for='activity-0'>ไม่ </label>
					
					<input type='radio' name='activity' value ='1' required @if($row['activity'] == '1') checked="checked" @endif class='filled-in' id='activity-1'> <label for='activity-1'>ใช่ </label> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="Post Date" class=" control-label col-md-4 "> Post Date </label>
										<div class="col-md-8">
										  
					{!! Form::text('post_date', $row['post_date'],array('class'=>'form-control form-control-sm datetime')) !!}
				 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="ชนิดเกม" class=" control-label col-md-4 "> ชนิดเกม <span class="asterix"> * </span></label>
										<div class="col-md-8">
										  
					<?php $game_type = explode(',',$row['game_type']);
					$game_type_opt = array( 'SLOT' => 'SLOT' ,  'FISHING' => 'FISHING' , ); ?>
					<select name='game_type' rows='5' required  class='select2 '  > 
						<?php 
						foreach($game_type_opt as $key=>$val)
						{
							echo "<option  value ='$key' ".($row['game_type'] == $key ? " selected='selected' " : '' ).">$val</option>"; 						
						}						
						?></select> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="ราคา coins" class=" control-label col-md-4 "> ราคา coins <span class="asterix"> * </span></label>
										<div class="col-md-8">
										  <input  type='text' name='coin_amount' id='coin_amount' value='{{ $row['coin_amount'] }}' 
						required     class='form-control form-control-sm ' /> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="จำนวนหมุนวงล้อ" class=" control-label col-md-4 "> จำนวนหมุนวงล้อ <span class="asterix"> * </span></label>
										<div class="col-md-8">
										  <input  type='text' name='wheel_spins' id='wheel_spins' value='{{ $row['wheel_spins'] }}' 
						required     class='form-control form-control-sm ' /> 
										 </div> 
										 
									  </div> </fieldset></div>

	</div>
	
	<input type="hidden" name="action_task" value="save" />
	{!! Form::close() !!}
	</div>
</div>
		 
   <script type="text/javascript">
	$(document).ready(function() { 
		
		
		
		$("#relate_promotion_id").jCombo("{!! url('promotionauto/comboselect?filter=promotions:id:promotion_name') !!}",
		{  selected_value : '{{ $row["relate_promotion_id"] }}' });
		 	
		 	 

		$('.removeMultiFiles').on('click',function(){
			var removeUrl = '{{ secure_url("promotionauto/removefiles?file=")}}'+$(this).attr('url');
			$(this).parent().remove();
			$.get(removeUrl,function(response){});
			$(this).parent('div').empty();	
			return false;
		});		
		
	});
	</script>		 
@stop