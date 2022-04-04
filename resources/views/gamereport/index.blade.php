@extends('layouts.app')

@section('content')
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css" rel="stylesheet" type="text/css" />
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
<style type="text/css">

#datepicker > span:hover{cursor: pointer;}
</style>
<div class="page-titles">
  <h2> ประวัติการเล่น <small> </small></h2>
</div>
<div  class="card">
	<div class="card-body"> 
		<div class="p-5">


<div class="toolbar-nav">
<div class="row">
<div class="col-md-2 text-left">
<div class="input-group">
	<input type="text" class="form-control " id="gameusername" value="" placeholder="ป้อน ยูสเกมของ เว็บ เช่น olf880000001">

</div>
</div>
<div class="col-md-1">
<div id="datepicker" class="input-group date" data-date-format="yyyy-mm-dd">
    <input class="form-control" type="text" id="dateselect" readonly />
    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span> 
<input type="hidden" name="page" value="1"></div>

</div>
<div class="col-md-1 text-left"><button type="button" class="btn  btn-default btn-sm" id="go" style="float:left;" autofocus><i class="fa fa-refresh"></i> ค้นหา</button>
	
</div>
</div>
</div>
		<div class="table-responsive" style="min-height:300px;">
	    <table class="table table-hover table-striped  ">
	        <thead>
				<tr>
					<th>id</th>
					<th>gameusername</th>
					<th>ชื่อเกมส์</th>
					<th>ค่าย</th>
					<th>bet_id</th>
					<th>เครดิตก่อน</th>
					<th>เงินเดิมพัน</th>
					<th>เงินที่ได้</th>
					<th>เครดิตหลัง</th>
					<th>วัน-เวลา</th>
					<th>bet_type</th>
					<th>spacialbet</th>
					<th>ประเภทเกม</th>
				  </tr>
	        </thead>

	        <tbody>
							 
	            @foreach ($report as $row)
	                <tr>
								<td>{{ $row->id }} </td>
					<td>{{ $row->gameusername }} </td>
					<td>{{ $row->game_id }} </td>
					<td>{{ $row->partner }} </td>
					<td>{{ $row->bet_id }} </td>
					<td>{{ $row->credit_before }} </td>
					<td>{{ $row->bet_amount }} </td>
					<td>{{ $row->payout_amount }} </td>
					<td>{{ $row->credit_after }} </td>
					<td>{{ $row->systemdate }} </td>
					<td>{{ $row->bet_type }} </td>
					<td>{{ $row->spacialbet }} </td>
					<td>@if($row->game_type==3)
									casino
							@elseif($row->game_type==2)
									fishing
							@elseif($row->game_type==1)
									slot
							@else
									tablegame/etc
							@endif
					</td>
	                </tr>
					
	            @endforeach
	              
	        </tbody>
	      
	    </table>
		</div>
			
<div class="toolbar-footer">
<div class="row">
<div class="col-sm-4">
<div class="" style=" padding: 15px 0 0">
Displaying
<b> 1 </b>
To <b> 50 </b>
Of <b> {{ $count }} </b>
 </div>
</div>
<div class="col-sm-8 text-right" id="depositPaginate">
<nav>
<ul class="pagination">
@if(empty($_GET['page'])||$_GET['page']==1)
<li class="page-item  disabled" aria-disabled="true" aria-label="« Previous">
<span class="page-link" aria-hidden="true">‹</span>
</li>
<li class="page-item active" aria-current="page"><span class="page-link">1</span></li>
@else
<li class="page-item" aria-label="« Previous">
<a class="page-link" href="/gamereport?date={{ $_GET['date'] }}&gameusername={{ $_GET['gameusername'] }}&page={{ $_GET['page']-1 }}" rel="Previous" aria-label="« Previous">‹</a>
</li>
<li class="page-item active"><a class="page-link" href="/gamereport?date={{ $_GET['date'] }}&gameusername={{ $_GET['gameusername'] }}&page={{ $_GET['page'] }}">{{ $_GET['page'] }}</a></li>
@endif
<?php 
if(empty($_GET['date'])){

    $_GET['date'] = date('Y-m-d');
}
if(empty($_GET['gameusername'])){

    $_GET['gameusername'] = '';
}


?>
@if(empty($_GET['page']))
<li class="page-item">
<a class="page-link" href="/gamereport?date={{ $_GET['date'] }}&gameusername={{ $_GET['gameusername'] }}&page=2" rel="next" aria-label="Next »">›</a>
</li>
@else
<li class="page-item">
<a class="page-link" href="/gamereport?date={{ $_GET['date'] }}&gameusername={{ $_GET['gameusername'] }}&page={{ $_GET['page']+1 }}" rel="next" aria-label="Next »">›</a>
</li>
@endif
</ul>
</nav>
</div>
</div>
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
		window.location = '/gamereport?date='+$("#dateselect").val()+'&gameusername='+$("#gameusername").val();
});
	$(document).on('keypress',function(e) {
    if(e.which == 13) {
        $("#go").click();
    }
});
</script>

@endsection

