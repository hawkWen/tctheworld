@extends('layouts.app')

@section('content')
{{--*/ usort($tableGrid, "SiteHelpers::_sort") /*--}}
<div class="page-titles">
  <h2> {{ $pageTitle }} <small> {{ $pageNote }} </small></h2>
</div>
<div  class="card">
	<div class="card-body">
		<div class="toolbar-nav">
			<div class="row">
				<div class="col-md-6">
					<div class="btn-group">
						<button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-bars"></i> Bulk Action </button>
				        <ul class="dropdown-menu">
				         @if($access['is_excel'] ==1)
							<li class="nav-item"><a href="{{ secure_url( $pageModule .'/export?do=excel&return='.$return) }}" class="nav-link"> Export CSV </a></li>	
						@endif
				        </ul>
				    </div>	
				</div>    
			</div>
		<div >

	


		 {!! Form::open(array('url'=>'reportdailysum/delete/', 'class'=>'form-horizontal' ,'id' =>'SximoTable' )) !!}
		 <div class="table-responsive" style="min-height:300px;">
	    <table class="table table-hover table-striped  ">
	        <thead>
				<tr>		
					@foreach ($tableGrid as $t)
						@if($t['view'] =='1')
							<th>{{ $t['label'] }}</th>
						@endif
					@endforeach
				  </tr>
	        </thead>

	        <tbody>
	        	<?php $sumdeposit =0; $sumwithdraw = 0; $sumdiff = 0; ?>
							
	            @foreach ($rowData as $row)
	                <tr>	
					@foreach ($tableGrid as $field)
						 @if($field['view'] =='1')
						 	<?php $limited = isset($field['limited']) ? $field['limited'] :''; ?>
						 	@if(SiteHelpers::filterColumn($limited ))
							 <td>					 
							 	@if($field['field']=='sumdeposit'||$field['field']=='sumwithdraw')
							 		@if($field['field']=='sumdeposit')
							 		<?php 
							 			$sumdeposit=$sumdeposit+$row->sumdeposit; 
							 			$sumwithdraw=$sumwithdraw+$row->sumwithdraw;
							 			$sumdiff=$sumdiff+$row->diff;
							 		?>
							 		<span style="color: green;"> {{ number_format($row->{$field['field']},2) }}</span>
							 		@else
							 		<span style="color: red;"> {{ number_format($row->{$field['field']},2) }}</span>
							 		@endif
							 	@elseif($field['field']=='diff')
							 		@if($row->diff<0)
							 			<span style="color: red;"> {{ number_format($row->{$field['field']},2) }}</span>
							 		@else
							 			<span style="color: green;"> {{ number_format($row->{$field['field']},2) }}</span>
							 		@endif
							 	@else
							 		{!! SiteHelpers::formatRows($row->{$field['field']},$field ,$row ) !!}	
							 	@endif					 
							 </td>
							@endif	
						 @endif					 
					 @endforeach				 
					
	                </tr>
					
	            @endforeach
	              
	        </tbody>
	      	<tfoot>
				<tr>		
					<th>รวม</th>
					<th>{{ number_format($sumdeposit,2) }}</th>
					<th>{{ number_format($sumwithdraw,2) }}</th>
					<th>{{ number_format($sumdiff,2) }}</th>
				</tr>
	        </tfoot>
	    </table>
		<input type="hidden" name="md" value="" />
		</div>
		{!! Form::close() !!}
		
		
	</div>  
</div>
@stop