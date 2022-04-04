@if($setting['form-method'] =='native')
<div class="card">
	<div class="card-body">
@endif
		<div class="form-ajax-box">
		{!! Form::open(array('url'=>'gamelists?return='.$return, 'class'=>'form-horizontal  sximo-form validated','files' => true , 'parsley-validate'=>'','novalidate'=>' ','id'=> 'gamelistsFormAjax')) !!}

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
						<fieldset><legend> gamelists</legend>
				{!! Form::hidden('id', $row['id']) !!}					
									  <div class="form-group row  " >
										<label for="เกม" class=" control-label col-md-4 "> เกม </label>
										<div class="col-md-8">
										  <input  type='text' name='name' id='name' value='{{ $row['name'] }}' 
						     class='form-control form-control-sm ' /> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="Code" class=" control-label col-md-4 "> Code </label>
										<div class="col-md-8">
										  <input  type='text' name='code' id='code' value='{{ $row['code'] }}' 
						     class='form-control form-control-sm ' /> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="Image Large" class=" control-label col-md-4 "> Image Large </label>
										<div class="col-md-8">
										  <input  type='text' name='image_large' id='image_large' value='{{ $row['image_large'] }}' 
						     class='form-control form-control-sm ' /> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="Image Normal" class=" control-label col-md-4 "> Image Normal </label>
										<div class="col-md-8">
										  <input  type='text' name='image_normal' id='image_normal' value='{{ $row['image_normal'] }}' 
						     class='form-control form-control-sm ' /> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="ค่ายเกม" class=" control-label col-md-4 "> ค่ายเกม </label>
										<div class="col-md-8">
										  <select name='partner' rows='5' id='partner' class='select2 '   ></select> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="Gameid" class=" control-label col-md-4 "> Gameid </label>
										<div class="col-md-8">
										  <input  type='text' name='gameid' id='gameid' value='{{ $row['gameid'] }}' 
						     class='form-control form-control-sm ' /> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="หมวดหมู่" class=" control-label col-md-4 "> หมวดหมู่ </label>
										<div class="col-md-8">
										  <select name='game_category_id[]' multiple rows='5' id='game_category_id' class='select2 '   ></select> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="Active" class=" control-label col-md-4 "> Active </label>
										<div class="col-md-8">
										  
					
					<input type='radio' name='active' value ='1'  @if($row['active'] == '1') checked="checked" @endif class='filled-in' id='active-0'> <label for='active-0'>active </label>
					
					<input type='radio' name='active' value ='0'  @if($row['active'] == '0') checked="checked" @endif class='filled-in' id='active-1'> <label for='active-1'>inactive </label> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="Date Time" class=" control-label col-md-4 "> Date Time </label>
										<div class="col-md-8">
										  
				
					{!! Form::text('date_time', $row['date_time'],array('class'=>'form-control form-control-sm date')) !!} 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="Game Type" class=" control-label col-md-4 "> Game Type </label>
										<div class="col-md-8">
										  <select name='game_type' rows='5' id='game_type' class='select2 '   ></select> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="Min Bet" class=" control-label col-md-4 "> Min Bet </label>
										<div class="col-md-8">
										  <input  type='text' name='min_bet' id='min_bet' value='{{ $row['min_bet'] }}' 
						     class='form-control form-control-sm ' /> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="Max Bet" class=" control-label col-md-4 "> Max Bet </label>
										<div class="col-md-8">
										  <input  type='text' name='max_bet' id='max_bet' value='{{ $row['max_bet'] }}' 
						     class='form-control form-control-sm ' /> 
										 </div> 
										 
									  </div> </fieldset></div>									
							
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
	 
	
	
		$("#partner").jCombo("{!! secure_url('gamelists/comboselect?filter=game_partners:short_name:name') !!}",
		{  selected_value : '{{ $row["partner"] }}' });
		
		$("#game_category_id").jCombo("{!! secure_url('gamelists/comboselect?filter=game_category:id:category_name') !!}",
		{  selected_value : '{{ $row["game_category_id"] }}' });
		
		$("#game_type").jCombo("{!! secure_url('gamelists/comboselect?filter=game_type:id:name') !!}",
		{  selected_value : '{{ $row["game_type"] }}' });
		 	
	 
	
	var form = $('#gamelistsFormAjax'); 
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