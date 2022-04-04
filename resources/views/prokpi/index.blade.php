@extends('layouts.app')

@section('content')
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css" rel="stylesheet" type="text/css" />
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
<style type="text/css">
	label{margin-left: 20px;}
#datepicker{width:180px; margin: 0 20px 20px 20px;}
#datepicker > span:hover{cursor: pointer;}
</style>
<div class="page-titles">
  <h2> {{ $pageTitle }} <small> {{ $pageNote }}  ประจำวันที่  {{ $date }} </small></h2>
</div>
<div  class="card">
	<div class="card-body"> 
		<div class="p-5">
<label>เลือกวัน: </label>
<div id="datepicker" class="input-group date" data-date-format="yyyy-mm-dd">
    <input class="form-control" type="text" id="dateselect" readonly />
    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
</div> <button id="go"> ไป </button>
		<div class="table-responsive" style="min-height:300px;">
	    <table class="table table-hover table-striped  ">
	        <thead>
				<tr>
					<th>โปรโมชั่น</th>
					<th>รับโปร</th>
					<th>เงินฝาก</th>
					<th>จำนวนถอน</th>
					<th>เงินถอน</th>
					<th>กำไร/ขาดทุน</th>
					<th>เครดิต</th>
					<th>ความง่าย</th>
				  </tr>
	        </thead>

	        <tbody>
							 
	            @foreach ($report as $row)
	                <tr>
								<td>{{ $row->โปรโมชั่น }} </td>
					<td>{{ $row->รับโปร }} </td>
					<td>{{ $row->เงินฝาก }} </td>
					<td>{{ $row->จำนวนถอน }} </td>
					<td>{{ $row->เงินถอน }} </td>
					<td>{{ $row->ส่วนต่าง }} </td>
					<td>{{ $row->เครดิต }} </td>
					<td>{{ $row->ความง่าย }} </td>
					
	                </tr>
					
	            @endforeach
	              
	        </tbody>
	      
	    </table>
		</div>
	</div>
</div>		
<script type="text/javascript">
	$(function () {
  $("#datepicker").datepicker({ 
        autoclose: true, 
        todayHighlight: true
  }).datepicker('update', new Date());
});

	$("#go").click(function() {
		window.location = '/prokpi?date='+$("#dateselect").val()
});

</script>
@endsection