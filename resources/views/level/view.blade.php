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
						<a href="{{ ($prevnext['prev'] != '' ? secure_url('level/'.$prevnext['prev'].'?return='.$return ) : '#') }}" class="tips btn btn-primary btn-sm" onclick="ajaxViewDetail('#level',this.href); return false; "><i class="fa fa-arrow-left"></i>  </a>	
						<a href="{{ ($prevnext['next'] != '' ? secure_url('level/'.$prevnext['next'].'?return='.$return ) : '#') }}" class="tips btn btn-primary  btn-sm " onclick="ajaxViewDetail('#level',this.href); return false; "> <i class="fa fa-arrow-right"></i>  </a>
			   		</div>			
				</div>	

				
			</div>
		</div>	
		
@endif	

		<table class="table  table-bordered" >
			<tbody>	
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Id', (isset($fields['id']['language'])? $fields['id']['language'] : array())) }}</td>
						<td>{{ $row->id}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Affiliate Id', (isset($fields['affiliate_id']['language'])? $fields['affiliate_id']['language'] : array())) }}</td>
						<td>{{ $row->affiliate_id}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('ลำดับ', (isset($fields['level_order']['language'])? $fields['level_order']['language'] : array())) }}</td>
						<td>{{ $row->level_order}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('ชื่อระดับชั้น', (isset($fields['level_name']['language'])? $fields['level_name']['language'] : array())) }}</td>
						<td>{{ $row->level_name}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('ส่วนแบ่ง', (isset($fields['commission']['language'])? $fields['commission']['language'] : array())) }}</td>
						<td>{{ $row->commission}} </td>
						
					</tr>
				
			</tbody>	
		</table>  
			
		 	
		 
@if($setting['view-method'] =='native')
	</div>
</div>
@endif		