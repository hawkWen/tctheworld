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
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Bank Id', (isset($fields['bank_id']['language'])? $fields['bank_id']['language'] : array())) }}</td>
						<td>{{ $row->bank_id}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Bankcode', (isset($fields['bankcode']['language'])? $fields['bankcode']['language'] : array())) }}</td>
						<td>{{ $row->bankcode}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Bank Name', (isset($fields['bank_name']['language'])? $fields['bank_name']['language'] : array())) }}</td>
						<td>{{ $row->bank_name}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Bank Logo', (isset($fields['bank_logo']['language'])? $fields['bank_logo']['language'] : array())) }}</td>
						<td>{!! SiteHelpers::formatRows($row->bank_logo,$fields['bank_logo'],$row ) !!} </td>
						
					</tr>
						
					<tr>
						<td width='30%' class='label-view text-right'></td>
						<td> <a href="javascript:history.go(-1)" class="btn btn-primary"> Back To Grid <a> </td>
						
					</tr>					
				
			</tbody>	
		</table>   

	 
	
	</div>
</div>	