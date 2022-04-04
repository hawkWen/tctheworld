@extends('layouts.app')

@section('content')
<div class="page-titles">
  <h2> {{ $pageTitle }} <small> {{ $pageNote }} </small></h2>
</div>
<div class="card">
	<div class="card-body">


	{!! Form::open(array('url'=>'gamehistory?return='.$return, 'class'=>'form-horizontal  validated sximo-form','files' => true ,'id'=> 'FormTable' )) !!}
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
						<fieldset><legend> ประวัติการเล่น</legend>
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

	</div>
	
	<input type="hidden" name="action_task" value="save" />
	{!! Form::close() !!}
	</div>
</div>
		 
   <script type="text/javascript">
	$(document).ready(function() { 
		
		
		 	
		 	 

		$('.removeMultiFiles').on('click',function(){
			var removeUrl = '{{ secure_url("gamehistory/removefiles?file=")}}'+$(this).attr('url');
			$(this).parent().remove();
			$.get(removeUrl,function(response){});
			$(this).parent('div').empty();	
			return false;
		});		
		
	});
	</script>		 
@stop