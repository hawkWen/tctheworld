@if($setting['form-method'] =='native')
<div class="card">
	<div class="card-body">
@endif
		<div class="form-ajax-box">
		{!! Form::open(array('url'=>'affiliate?return='.$return, 'class'=>'form-horizontal  sximo-form validated','files' => true , 'parsley-validate'=>'','novalidate'=>' ','id'=> 'affiliateFormAjax')) !!}

		<div class="toolbar-nav">	
			<div class="row">	
					
				<div class="col-md-6 ">
					<a href="javascript://ajax" onclick="ajaxViewClose('#{{ $pageModule }}')" class="tips btn btn-sm  btn-danger" title="{{ __('core.btn_back') }}" ><i class="fa  fa-times"></i></a>			
				</div>
				<div class="col-sm-6 text-right">	
					<div class="btn-group">
						<button type="submit" class="btn btn-sm btn-primary  " name="apply">{{ Lang::get('core.sb_apply') }} </button>
						<button type="submit" class="btn btn-sm btn-success " name="save">  {{ Lang::get('core.sb_save') }} </button>
					</div>	
				</div>
						
			</div>
		</div>	


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
					
	@if($accesschild['is_add'] == '1' && $accesschild['is_edit'] == '1' )
	
	
	<fieldset>
	<legend> ลำดับชั้น </legend>
	
	<div class="table-responsive">
    <table class="table table-bordered ">
        <thead>
			<tr>
				@foreach ($subform['tableGrid'] as $t)
					@if($t['view'] =='1' && $t['field'] !='id' && $t['field'] != $relation_key)
						<th>{{ $t['label'] }}</th>
					@endif
				@endforeach
				<th></th>	
			  </tr>

        </thead>

        <tbody>
        @if(count($subform['rowData'])>=1)
            @foreach ($subform['rowData'] as $rows)
            <tr class="clone clonedInput">
									
			 @foreach ($subform['tableGrid'] as $field)
				 @if($field['view'] =='1' && $field['field'] !='id' && $field['field'] != $relation_key)
				 <td>					 
				 	{!! SiteHelpers::bulkForm($field['field'] , $subform['tableForm'] , $rows->{$field['field']}) !!}							 
				 </td>
				 @endif					 
			 
			 @endforeach
			 <td>
			 	<a onclick=" $(this).parents('.clonedInput').remove(); return false" href="#" class="remove btn ">-</a>
			 	<input type="hidden" name="counter[]">
			 	<input type="hidden" name="bulk_{{ $relation_key}}[]" value="{{  $rows->{$relation_key} }}" >
			 </td>
			@endforeach
			</tr> 

		@else
            <tr class="clone clonedInput">
									
			 @foreach ($subform['tableGrid'] as $field)

				 @if($field['view'] =='1' && $field['field'] !='id' && $field['field'] != $relation_key)
				 <td>					 
				 	{!! SiteHelpers::bulkForm($field['field'] , $subform['tableForm'] ) !!}							 
				 </td>
				 @endif					 
			 
			 @endforeach
			 <td>
			 	<a onclick=" $(this).parents('.clonedInput').remove(); return false" href="#" class="remove btn">-</a>
			 	<input type="hidden" name="counter[]">
			 	<input type="hidden" name="bulk_{{ $relation_key}}[]" value="" >
			 </td>
			
			</tr> 

		
		@endif	


        </tbody>	

     </table>  
     <input type="hidden" name="enable-masterdetail" value="true">
     </div>
     </fieldset>
	
     
     <a href="javascript:void(0);" class="addC btn btn-xs btn-info" rel=".clone"><i class="fa fa-plus"></i> New Item</a>
     <fieldset>
	@endif
    					
		<input type="hidden" name="action_task" value="save" />

		{!! Form::close() !!}
		</div>
@if($setting['form-method'] =='native')

	</div>
</div>
@endif
@include('sximo.module.template.ajax.formjavascript')


<script type="text/javascript">
$(document).ready(function() { 
	 
	$('.addC').relCopy({});
	 	
	 
	
	var form = $('#affiliateFormAjax'); 
	form.parsley();
	form.submit(function(){
		
		if(form.parsley().isValid()){			
			var options = { 
				dataType:      'json', 
				beforeSubmit :  function() {
				},
				success		:   function(data) {

					if(data.status == 'success')
					{
						ajaxViewClose('#{{ $pageModule }}');
						ajaxFilter('#{{ $pageModule }}','{{ $pageUrl }}/data');
						notyMessage(data.message);	
						$('#sximo-modal').modal('hide');	
					} else {
						notyMessageError(data.message);	
						return false;
					}	

				}  
			}  
			$(this).ajaxSubmit(options); 
			return false;
						
		} else {
			return false;
		}		
	
	});

});

</script>		 