@if($setting['form-method'] =='native')
<div class="card">
	<div class="card-body">
@endif
		<div class="form-ajax-box">
		{!! Form::open(array('url'=>'lastgamehistory?return='.$return, 'class'=>'form-horizontal  sximo-form validated','files' => true , 'parsley-validate'=>'','novalidate'=>' ','id'=> 'lastgamehistoryFormAjax')) !!}

			<div class="toolbar-nav">	
				<div class="row">	
					
					<div class="col-md-6">
						<a href="javascript://ajax" onclick="ajaxViewClose('#{{ $pageModule }}')" class="tips btn btn-sm btn-danger  " title="{{ __('core.btn_back') }}" ><i class="fa  fa-times"></i></a>
					</div>
					<div class="col-sm-6 text-right">	
						<div class="btn-group">
							<button type="submit" class="btn btn-sm  btn-primary " name="apply"> {{ Lang::get('core.sb_apply') }} </button>
							<button type="submit" class="btn btn-sm btn-success" name="save">  {{ Lang::get('core.sb_save') }} </button>
						</div>	
					</div>	
							
				</div>
			</div>	
				<div class="row">

			
			<div class="col-md-12">
						<fieldset><legend> lastgamehistory</legend>
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
										<label for="Game Id" class=" control-label col-md-4 "> Game Id </label>
										<div class="col-md-8">
										  <input  type='text' name='game_id' id='game_id' value='{{ $row['game_id'] }}' 
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
										  <input  type='text' name='bet_amount' id='bet_amount' value='{{ $row['bet_amount'] }}' 
						     class='form-control form-control-sm ' /> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="Payout Amount" class=" control-label col-md-4 "> Payout Amount </label>
										<div class="col-md-8">
										  <input  type='text' name='payout_amount' id='payout_amount' value='{{ $row['payout_amount'] }}' 
						     class='form-control form-control-sm ' /> 
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
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="Bonus Mode" class=" control-label col-md-4 "> Bonus Mode </label>
										<div class="col-md-8">
										  <input  type='text' name='bonus_mode' id='bonus_mode' value='{{ $row['bonus_mode'] }}' 
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
	 
	
	 
				
	var form = $('#lastgamehistoryFormAjax'); 
	form.parsley();
	form.submit(function(){
		
		if(form.parsley().isValid()){			
			var options = { 
				dataType:      'json', 
				beforeSubmit :  function(){
				},
				success: function(data) {
					if(data.status == 'success')
					{
						ajaxViewClose('#{{ $pageModule }}');
						var table = $('#lastgamehistoryTable').DataTable();
						table.ajax.reload();
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