<div class="m-t" style="padding-top:25px;">	
    <div class="row m-b-lg animated fadeInDown delayp1 text-center">
        <h3> {{ $pageTitle }} <small> {{ $pageNote }} </small></h3>
        <hr />       
    </div>
</div>
<div class="m-t">
	<div class="table-responsive" > 	

		<table class="table table-striped table-bordered" >
			<tbody>	
		
			
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Id', (isset($fields['id']['language'])? $fields['id']['language'] : array())) }}</td>
						<td>{{ $row->id}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('username', (isset($fields['user_id']['language'])? $fields['user_id']['language'] : array())) }}</td>
						<td>{{ SiteHelpers::formatLookUp($row->user_id,'user_id','1:tb_users:id:username') }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Gameusername', (isset($fields['gameusername']['language'])? $fields['gameusername']['language'] : array())) }}</td>
						<td>{{ $row->gameusername}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('ชื่อเกมส์', (isset($fields['gamename']['language'])? $fields['gamename']['language'] : array())) }}</td>
						<td>{{ $row->gamename}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('ค่าย', (isset($fields['partner']['language'])? $fields['partner']['language'] : array())) }}</td>
						<td>{{ SiteHelpers::formatLookUp($row->partner,'partner','1:game_partners:short_name:name') }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('รายการเดิมพัน', (isset($fields['bet_id']['language'])? $fields['bet_id']['language'] : array())) }}</td>
						<td>{{ $row->bet_id}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('เครดิตก่อนหน้า', (isset($fields['credit_before']['language'])? $fields['credit_before']['language'] : array())) }}</td>
						<td>{{ $row->credit_before}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('เงินเดิมพัน', (isset($fields['bet_amount']['language'])? $fields['bet_amount']['language'] : array())) }}</td>
						<td>{{ $row->bet_amount}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('เงินที่ได้', (isset($fields['payout_amount']['language'])? $fields['payout_amount']['language'] : array())) }}</td>
						<td>{{ $row->payout_amount}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('เครดิตหลังจาก', (isset($fields['credit_after']['language'])? $fields['credit_after']['language'] : array())) }}</td>
						<td>{{ $row->credit_after}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('วันเวลา', (isset($fields['systemdate']['language'])? $fields['systemdate']['language'] : array())) }}</td>
						<td>{{ $row->systemdate}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('ประเภท', (isset($fields['bet_type']['language'])? $fields['bet_type']['language'] : array())) }}</td>
						<td>{{ $row->bet_type}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('ฟรีสปิน?', (isset($fields['spacialbet']['language'])? $fields['spacialbet']['language'] : array())) }}</td>
						<td>{!! SiteHelpers::formatRows($row->spacialbet,$fields['spacialbet'],$row ) !!} </td>
						
					</tr>
						
					<tr>
						<td width='30%' class='label-view text-right'></td>
						<td> <a href="javascript:history.go(-1)" class="btn btn-primary"> Back To Grid <a> </td>
						
					</tr>					
				
			</tbody>	
		</table>   

	 
	
	</div>
</div>	