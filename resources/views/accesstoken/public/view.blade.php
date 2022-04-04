<div class="container" class="pt-3 pb-3">
    <div class="row m-b-lg animated fadeInDown delayp1 text-center">
        <h3> {{ $pageTitle }} <small> {{ $pageNote }} </small></h3>
        <hr />       
    </div>
</div>
<div class="m-t">
	<div class="table-container" > 	

		<table class="table table-striped table-bordered" >
			<tbody>	
		
			
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Token Id', (isset($fields['token_id']['language'])? $fields['token_id']['language'] : array())) }}</td>
						<td>{{ $row->token_id}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Access Token', (isset($fields['access_token']['language'])? $fields['access_token']['language'] : array())) }}</td>
						<td>{{ $row->access_token}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Otp', (isset($fields['otp']['language'])? $fields['otp']['language'] : array())) }}</td>
						<td>{{ $row->otp}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Otp Ref', (isset($fields['otp_ref']['language'])? $fields['otp_ref']['language'] : array())) }}</td>
						<td>{{ $row->otp_ref}} </td>
						
					</tr>
						
					<tr>
						<td width='30%' class='label-view text-right'></td>
						<td> <a href="javascript:history.go(-1)"> Back To Grid <a> </td>
						
					</tr>					
				
			</tbody>	
		</table>   

	 
	
	</div>
</div>	