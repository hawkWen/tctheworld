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
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Affiliate Name', (isset($fields['affiliate_name']['language'])? $fields['affiliate_name']['language'] : array())) }}</td>
						<td>{{ $row->affiliate_name}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Deposit Min', (isset($fields['deposit_min']['language'])? $fields['deposit_min']['language'] : array())) }}</td>
						<td>{{ $row->deposit_min}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Withdraw Min', (isset($fields['withdraw_min']['language'])? $fields['withdraw_min']['language'] : array())) }}</td>
						<td>{{ $row->withdraw_min}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Fee', (isset($fields['fee']['language'])? $fields['fee']['language'] : array())) }}</td>
						<td>{{ $row->fee}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Duedate', (isset($fields['duedate']['language'])? $fields['duedate']['language'] : array())) }}</td>
						<td>{{ $row->duedate}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Percent Commission', (isset($fields['percent_commission']['language'])? $fields['percent_commission']['language'] : array())) }}</td>
						<td>{{ $row->percent_commission}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Max Income', (isset($fields['max_income']['language'])? $fields['max_income']['language'] : array())) }}</td>
						<td>{{ $row->max_income}} </td>
						
					</tr>
						
					<tr>
						<td width='30%' class='label-view text-right'></td>
						<td> <a href="javascript:history.go(-1)" class="btn btn-primary"> Back To Grid <a> </td>
						
					</tr>					
				
			</tbody>	
		</table>   

	 
	
	</div>
</div>	