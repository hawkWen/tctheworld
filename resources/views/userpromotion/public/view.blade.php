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
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('วันเวลาที่รับ', (isset($fields['date_time']['language'])? $fields['date_time']['language'] : array())) }}</td>
						<td>{{ $row->date_time}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('User Id', (isset($fields['user_id']['language'])? $fields['user_id']['language'] : array())) }}</td>
						<td>{{ SiteHelpers::formatLookUp($row->user_id,'user_id','1:tb_users:id:username') }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Promotion Id', (isset($fields['promotion_id']['language'])? $fields['promotion_id']['language'] : array())) }}</td>
						<td>{{ SiteHelpers::formatLookUp($row->promotion_id,'promotion_id','1:promotions:id:promotion_name') }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('เครดิตก่อนรับโปร', (isset($fields['credit_before']['language'])? $fields['credit_before']['language'] : array())) }}</td>
						<td>{{ $row->credit_before}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('เครดิตหลังรับโปร', (isset($fields['credit_after']['language'])? $fields['credit_after']['language'] : array())) }}</td>
						<td>{{ $row->credit_after}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('เครดิตคงเหลือ', (isset($fields['credit_amount']['language'])? $fields['credit_amount']['language'] : array())) }}</td>
						<td>{{ $row->credit_amount}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('เครดิตที่ได้รับโปร', (isset($fields['credit_additional']['language'])? $fields['credit_additional']['language'] : array())) }}</td>
						<td>{{ $row->credit_additional}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('เครดิตที่ออกจากโปรได้', (isset($fields['credit_remain']['language'])? $fields['credit_remain']['language'] : array())) }}</td>
						<td>{{ $row->credit_remain}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Lock', (isset($fields['lock']['language'])? $fields['lock']['language'] : array())) }}</td>
						<td>{{ $row->lock}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('ยอดเงินเพื่อรับโปร', (isset($fields['deposit_amount']['language'])? $fields['deposit_amount']['language'] : array())) }}</td>
						<td>{{ $row->deposit_amount}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('ชนิด', (isset($fields['type']['language'])? $fields['type']['language'] : array())) }}</td>
						<td>{{ $row->type}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Value', (isset($fields['value']['language'])? $fields['value']['language'] : array())) }}</td>
						<td>{{ $row->value}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Turnover', (isset($fields['turnover']['language'])? $fields['turnover']['language'] : array())) }}</td>
						<td>{{ $row->turnover}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('เชื่อมโยงกับโปร', (isset($fields['relate_promotion_id']['language'])? $fields['relate_promotion_id']['language'] : array())) }}</td>
						<td>{{ SiteHelpers::formatLookUp($row->relate_promotion_id,'relate_promotion_id','1:promotions:id:promotion_name') }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('ยอดที่ถอนได้', (isset($fields['withdraw_amount']['language'])? $fields['withdraw_amount']['language'] : array())) }}</td>
						<td>{{ $row->withdraw_amount}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('เงื่อนไขพิเศษ', (isset($fields['note']['language'])? $fields['note']['language'] : array())) }}</td>
						<td>{{ $row->note}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('จำนวนครั้งที่รับได้', (isset($fields['get_times']['language'])? $fields['get_times']['language'] : array())) }}</td>
						<td>{{ $row->get_times}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('รอบที่รับ', (isset($fields['round']['language'])? $fields['round']['language'] : array())) }}</td>
						<td>{{ $row->round}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('ประเภทโปรโมชั่น', (isset($fields['promotion_type']['language'])? $fields['promotion_type']['language'] : array())) }}</td>
						<td>{{ $row->promotion_type}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Bonususername', (isset($fields['bonususername']['language'])? $fields['bonususername']['language'] : array())) }}</td>
						<td>{{ $row->bonususername}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('สถานะ', (isset($fields['status']['language'])? $fields['status']['language'] : array())) }}</td>
						<td>{!! SiteHelpers::formatRows($row->status,$fields['status'],$row ) !!} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Urls', (isset($fields['urls']['language'])? $fields['urls']['language'] : array())) }}</td>
						<td>{{ $row->urls}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Images', (isset($fields['images']['language'])? $fields['images']['language'] : array())) }}</td>
						<td>{{ $row->images}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Activity', (isset($fields['activity']['language'])? $fields['activity']['language'] : array())) }}</td>
						<td>{{ $row->activity}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Remark', (isset($fields['remark']['language'])? $fields['remark']['language'] : array())) }}</td>
						<td>{{ $row->remark}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Game Type', (isset($fields['game_type']['language'])? $fields['game_type']['language'] : array())) }}</td>
						<td>{{ $row->game_type}} </td>
						
					</tr>
						
					<tr>
						<td width='30%' class='label-view text-right'></td>
						<td> <a href="javascript:history.go(-1)" class="btn btn-primary"> Back To Grid <a> </td>
						
					</tr>					
				
			</tbody>	
		</table>   

	 
	
	</div>
</div>	