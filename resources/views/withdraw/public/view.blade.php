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
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('วันที่', (isset($fields['date_time']['language'])? $fields['date_time']['language'] : array())) }}</td>
						<td>{{ $row->date_time}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Withdraw Id', (isset($fields['withdraw_id']['language'])? $fields['withdraw_id']['language'] : array())) }}</td>
						<td>{{ $row->withdraw_id}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('ยูสเซฮร์', (isset($fields['username']['language'])? $fields['username']['language'] : array())) }}</td>
						<td>{{ $row->username}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Join Username', (isset($fields['join_username']['language'])? $fields['join_username']['language'] : array())) }}</td>
						<td>{{ $row->join_username}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('ถอนไปยังบัญชี', (isset($fields['user_id']['language'])? $fields['user_id']['language'] : array())) }}</td>
						<td>{{ SiteHelpers::formatLookUp($row->user_id,'user_id','1:tb_users:id:first_name|last_name|account_number') }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('ธนาคาร', (isset($fields['bank_id']['language'])? $fields['bank_id']['language'] : array())) }}</td>
						<td>{{ SiteHelpers::formatLookUp($row->bank_id,'bank_id','1:banks:bank_id:bank_name') }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('โปรโมชั่น', (isset($fields['promotion_id']['language'])? $fields['promotion_id']['language'] : array())) }}</td>
						<td>{{ SiteHelpers::formatLookUp($row->promotion_id,'promotion_id','1:promotions:id:promotion_name') }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('ถอน', (isset($fields['amount']['language'])? $fields['amount']['language'] : array())) }}</td>
						<td>{{ $row->amount}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('เครดิต', (isset($fields['reduce_credit']['language'])? $fields['reduce_credit']['language'] : array())) }}</td>
						<td>{{ $row->reduce_credit}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('ธนาคารถอน', (isset($fields['bankweb_id']['language'])? $fields['bankweb_id']['language'] : array())) }}</td>
						<td>{{ SiteHelpers::formatLookUp($row->bankweb_id,'bankweb_id','1:bank_web:id:bank_name|bank_account_no|bank_account_name') }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('ฝาก', (isset($fields['deposit_id']['language'])? $fields['deposit_id']['language'] : array())) }}</td>
						<td>{{ SiteHelpers::formatLookUp($row->deposit_id,'deposit_id','1:deposit:deposit_id:amount') }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('สูงสุด', (isset($fields['max_withdraw']['language'])? $fields['max_withdraw']['language'] : array())) }}</td>
						<td>{{ $row->max_withdraw}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Bank Transaction Id', (isset($fields['bank_transaction_id']['language'])? $fields['bank_transaction_id']['language'] : array())) }}</td>
						<td>{{ $row->bank_transaction_id}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('สถานะ', (isset($fields['status']['language'])? $fields['status']['language'] : array())) }}</td>
						<td>{!! SiteHelpers::formatRows($row->status,$fields['status'],$row ) !!} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Auto Status', (isset($fields['auto_status']['language'])? $fields['auto_status']['language'] : array())) }}</td>
						<td>{{ $row->auto_status}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('TransactionDateTime', (isset($fields['transactionDateTime']['language'])? $fields['transactionDateTime']['language'] : array())) }}</td>
						<td>{{ $row->transactionDateTime}} </td>
						
					</tr>
						
					<tr>
						<td width='30%' class='label-view text-right'></td>
						<td> <a href="javascript:history.go(-1)" class="btn btn-primary"> Back To Grid <a> </td>
						
					</tr>					
				
			</tbody>	
		</table>   

	 
	
	</div>
</div>	