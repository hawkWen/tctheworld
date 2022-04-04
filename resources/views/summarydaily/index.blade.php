@extends('layouts.app')

@section('content')
<script src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js" nonce=""></script>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css">
<style type="text/css">
	td {
    white-space: nowrap;
}
</style>
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
							<li class="nav-item"><a href="{{ url( $pageModule .'/export?do=excel&return='.$return) }}" class="nav-link"> Export CSV </a></li>	
						@endif
				        </ul>
				    </div>	
				</div>    
			</div>
		<div >

	
<input id="daterange"  style="width: 200px;">

		 {!! Form::open(array('url'=>'summarydaily/delete/', 'class'=>'form-horizontal' ,'id' =>'SximoTable' )) !!}
		 <div class="table-responsive" style="min-height:300px;" >
	    <table class="table table-hover table-striped  " id="table_1">
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
							
	            @foreach ($rowData as $row)
	                <tr>
					@foreach ($tableGrid as $field)
						 @if($field['view'] =='1')
						 	<?php $limited = isset($field['limited']) ? $field['limited'] :''; ?>
						 	@if(SiteHelpers::filterColumn($limited ))
							 <td>					
							 	@if($field['field']=='diff')

							 		@if($row->diff>0)
							 			<span style="color:green">+{{ $row->diff }}</span> 
							 		@else
							 		  <span style="color:red">{{ $row->diff }}</span>
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
	      
	    </table>
		<input type="hidden" name="md" value="" />
		</div>
		{!! Form::close() !!}
		
		
		@include('footer')
	</div>  
</div>

<script type="text/javascript">
	$(function() {
 var table = $("#table_1").DataTable({
    paging: false,
    "order": [[ 0, "desc" ]]
});

 // Date range vars
 minDateFilter = "";
 maxDateFilter = "";

 $("#daterange").daterangepicker({
        locale: {
            format: 'DD/MM/YYYY'
        }
    });
 $("#daterange").on("apply.daterangepicker", function(ev, picker) {
  minDateFilter = Date.parse(picker.startDate);
  maxDateFilter = Date.parse(picker.endDate);
  
  $.fn.dataTable.ext.search.push(function(settings, data, dataIndex) {
  var date = Date.parse(data[0]);

  if (
   (isNaN(minDateFilter) && isNaN(maxDateFilter)) ||
   (isNaN(minDateFilter) && date <= maxDateFilter) ||
   (minDateFilter <= date && isNaN(maxDateFilter)) ||
   (minDateFilter <= date && date <= maxDateFilter)
  ) {
   return true;
  }
  return false;
 });
 table.draw();
}); 
  

});
 
 

</script>
@stop