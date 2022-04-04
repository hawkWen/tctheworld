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
						<a href="{{ ($prevnext['prev'] != '' ? secure_url('gametype/'.$prevnext['prev'].'?return='.$return ) : '#') }}" class="tips btn btn-primary btn-sm" onclick="ajaxViewDetail('#gametype',this.href); return false; "><i class="fa fa-arrow-left"></i>  </a>	
						<a href="{{ ($prevnext['next'] != '' ? secure_url('gametype/'.$prevnext['next'].'?return='.$return ) : '#') }}" class="tips btn btn-primary  btn-sm " onclick="ajaxViewDetail('#gametype',this.href); return false; "> <i class="fa fa-arrow-right"></i>  </a>
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
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Name', (isset($fields['name']['language'])? $fields['name']['language'] : array())) }}</td>
						<td>{{ $row->name}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Image Large', (isset($fields['image_large']['language'])? $fields['image_large']['language'] : array())) }}</td>
						<td>{!! SiteHelpers::formatRows($row->image_large,$fields['image_large'],$row ) !!} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Image Icon', (isset($fields['image_icon']['language'])? $fields['image_icon']['language'] : array())) }}</td>
						<td>{!! SiteHelpers::formatRows($row->image_icon,$fields['image_icon'],$row ) !!} </td>
						
					</tr>
				
			</tbody>	
		</table>  
			
		 	
		 
@if($setting['view-method'] =='native')
	</div>
</div>
@endif		