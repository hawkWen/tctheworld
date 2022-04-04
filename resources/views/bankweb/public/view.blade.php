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
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('รหัส', (isset($fields['id']['language'])? $fields['id']['language'] : array())) }}</td>
						<td>{{ $row->id}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('ชื่อธนาคาร', (isset($fields['bank_name']['language'])? $fields['bank_name']['language'] : array())) }}</td>
						<td>{{ $row->bank_name}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('โลโก้ธนาคาร', (isset($fields['bank_logo']['language'])? $fields['bank_logo']['language'] : array())) }}</td>
						<td>{!! SiteHelpers::formatRows($row->bank_logo,$fields['bank_logo'],$row ) !!} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('หมายเลขบัญชี', (isset($fields['bank_account_no']['language'])? $fields['bank_account_no']['language'] : array())) }}</td>
						<td>{{ $row->bank_account_no}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('ชื่อบัญชี', (isset($fields['bank_account_name']['language'])? $fields['bank_account_name']['language'] : array())) }}</td>
						<td>{{ $row->bank_account_name}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Use', (isset($fields['use']['language'])? $fields['use']['language'] : array())) }}</td>
						<td>{{ $row->use}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Device Id', (isset($fields['device_id']['language'])? $fields['device_id']['language'] : array())) }}</td>
						<td>{{ $row->device_id}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Api Refresh', (isset($fields['api_refresh']['language'])? $fields['api_refresh']['language'] : array())) }}</td>
						<td>{{ $row->api_refresh}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Balance', (isset($fields['balance']['language'])? $fields['balance']['language'] : array())) }}</td>
						<td>{{ $row->balance}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Password', (isset($fields['password']['language'])? $fields['password']['language'] : array())) }}</td>
						<td>{{ $row->password}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Pin', (isset($fields['pin']['language'])? $fields['pin']['language'] : array())) }}</td>
						<td>{{ $row->pin}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Tmn Id', (isset($fields['tmn_id']['language'])? $fields['tmn_id']['language'] : array())) }}</td>
						<td>{{ $row->tmn_id}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Login Token', (isset($fields['login_token']['language'])? $fields['login_token']['language'] : array())) }}</td>
						<td>{{ $row->login_token}} </td>
						
					</tr>
						
					<tr>
						<td width='30%' class='label-view text-right'></td>
						<td> <a href="javascript:history.go(-1)" class="btn btn-primary"> Back To Grid <a> </td>
						
					</tr>					
				
			</tbody>	
		</table>   

	 
	
	</div>
</div>	