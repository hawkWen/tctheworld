@extends('layouts.app')

@section('content')
<div class="page-titles">
  <h2> {{ $pageTitle }} <small> {{ $pageNote }} </small></h2>
</div>
<div class="card">
	<div class="card-body">


	{!! Form::open(array('url'=>'promotionsuserhis?return='.$return, 'class'=>'form-horizontal  validated sximo-form','files' => true ,'id'=> 'FormTable' )) !!}
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
						<fieldset><legend> promotionsuserhis</legend>
				{!! Form::hidden('id', $row['id']) !!}					
									  <div class="form-group row  " >
										<label for="User Id" class=" control-label col-md-4 "> User Id </label>
										<div class="col-md-8">
										  <input  type='text' name='user_id' id='user_id' value='{{ $row['user_id'] }}' 
						     class='form-control form-control-sm ' /> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="Promotion Id" class=" control-label col-md-4 "> Promotion Id </label>
										<div class="col-md-8">
										  <input  type='text' name='promotion_id' id='promotion_id' value='{{ $row['promotion_id'] }}' 
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
										<label for="Credit Amount" class=" control-label col-md-4 "> Credit Amount </label>
										<div class="col-md-8">
										  <input  type='text' name='credit_amount' id='credit_amount' value='{{ $row['credit_amount'] }}' 
						     class='form-control form-control-sm ' /> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="Credit Remain" class=" control-label col-md-4 "> Credit Remain </label>
										<div class="col-md-8">
										  <textarea name='credit_remain' rows='5' id='credit_remain' class='form-control form-control-sm '  
				           >{{ $row['credit_remain'] }}</textarea> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="Credit Additional" class=" control-label col-md-4 "> Credit Additional </label>
										<div class="col-md-8">
										  <input  type='text' name='credit_additional' id='credit_additional' value='{{ $row['credit_additional'] }}' 
						     class='form-control form-control-sm ' /> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="Lock" class=" control-label col-md-4 "> Lock </label>
										<div class="col-md-8">
										  <input  type='text' name='lock' id='lock' value='{{ $row['lock'] }}' 
						     class='form-control form-control-sm ' /> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="Deposit Amount" class=" control-label col-md-4 "> Deposit Amount </label>
										<div class="col-md-8">
										  <input  type='text' name='deposit_amount' id='deposit_amount' value='{{ $row['deposit_amount'] }}' 
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
										<label for="Value" class=" control-label col-md-4 "> Value </label>
										<div class="col-md-8">
										  <input  type='text' name='value' id='value' value='{{ $row['value'] }}' 
						     class='form-control form-control-sm ' /> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="Turnover" class=" control-label col-md-4 "> Turnover </label>
										<div class="col-md-8">
										  <input  type='text' name='turnover' id='turnover' value='{{ $row['turnover'] }}' 
						     class='form-control form-control-sm ' /> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="Relate Promotion Id" class=" control-label col-md-4 "> Relate Promotion Id </label>
										<div class="col-md-8">
										  <input  type='text' name='relate_promotion_id' id='relate_promotion_id' value='{{ $row['relate_promotion_id'] }}' 
						     class='form-control form-control-sm ' /> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="Withdraw Amount" class=" control-label col-md-4 "> Withdraw Amount </label>
										<div class="col-md-8">
										  <input  type='text' name='withdraw_amount' id='withdraw_amount' value='{{ $row['withdraw_amount'] }}' 
						     class='form-control form-control-sm ' /> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="Note" class=" control-label col-md-4 "> Note </label>
										<div class="col-md-8">
										  <input  type='text' name='note' id='note' value='{{ $row['note'] }}' 
						     class='form-control form-control-sm ' /> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="Get Times" class=" control-label col-md-4 "> Get Times </label>
										<div class="col-md-8">
										  <input  type='text' name='get_times' id='get_times' value='{{ $row['get_times'] }}' 
						     class='form-control form-control-sm ' /> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="Date Time" class=" control-label col-md-4 "> Date Time </label>
										<div class="col-md-8">
										  
					{!! Form::text('date_time', $row['date_time'],array('class'=>'form-control form-control-sm datetime')) !!}
				 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="Round" class=" control-label col-md-4 "> Round </label>
										<div class="col-md-8">
										  <input  type='text' name='round' id='round' value='{{ $row['round'] }}' 
						     class='form-control form-control-sm ' /> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="Promotion Type" class=" control-label col-md-4 "> Promotion Type </label>
										<div class="col-md-8">
										  <textarea name='promotion_type' rows='5' id='promotion_type' class='form-control form-control-sm '  
				           >{{ $row['promotion_type'] }}</textarea> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="Status" class=" control-label col-md-4 "> Status </label>
										<div class="col-md-8">
										  <textarea name='status' rows='5' id='status' class='form-control form-control-sm '  
				           >{{ $row['status'] }}</textarea> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="Bonususername" class=" control-label col-md-4 "> Bonususername </label>
										<div class="col-md-8">
										  <textarea name='bonususername' rows='5' id='bonususername' class='form-control form-control-sm '  
				           >{{ $row['bonususername'] }}</textarea> 
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
			var removeUrl = '{{ secure_url("promotionsuserhis/removefiles?file=")}}'+$(this).attr('url');
			$(this).parent().remove();
			$.get(removeUrl,function(response){});
			$(this).parent('div').empty();	
			return false;
		});		
		
	});
	</script>		 
@stop