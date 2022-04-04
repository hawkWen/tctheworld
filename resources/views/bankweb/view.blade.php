@if($setting['view-method'] =='native')
<div class="card">
	<div class="card-body">	
		<div class="toolbar-nav">
			<div class="row">
				<div class="col-md-6" >
					<a href="javascript://ajax" onclick="ajaxViewClose('#{{ $pageModule }}')" class="tips btn btn-sm btn-danger  " title="{{ __('core.btn_back') }}"><i class="fa  fa-times"></i></a>	
				</div>
				<div class="col-md-6 text-right " >
					<div class="btn-group">
						<a href="{{ ($prevnext['prev'] != '' ? secure_url('bankweb/'.$prevnext['prev'].'?return='.$return ) : '#') }}" class="tips btn btn-primary btn-sm" onclick="ajaxViewDetail('#bankweb',this.href); return false; "><i class="fa fa-arrow-left"></i>  </a>	
						<a href="{{ ($prevnext['next'] != '' ? secure_url('bankweb/'.$prevnext['next'].'?return='.$return ) : '#') }}" class="tips btn btn-primary  btn-sm " onclick="ajaxViewDetail('#bankweb',this.href); return false; "> <i class="fa fa-arrow-right"></i>  </a>
			   		</div>			
				</div>	

				
			</div>
		</div>	
		
@endif	

		<table class="table  table-bordered" >
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
				
			</tbody>	
		</table>  
			
		 	
		 
@if($setting['view-method'] =='native')
	</div>
</div>
@endif		