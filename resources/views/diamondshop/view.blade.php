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
						<a href="{{ ($prevnext['prev'] != '' ? secure_url('diamondshop/'.$prevnext['prev'].'?return='.$return ) : '#') }}" class="tips btn btn-primary btn-sm" onclick="ajaxViewDetail('#diamondshop',this.href); return false; "><i class="fa fa-arrow-left"></i>  </a>	
						<a href="{{ ($prevnext['next'] != '' ? secure_url('diamondshop/'.$prevnext['next'].'?return='.$return ) : '#') }}" class="tips btn btn-primary  btn-sm " onclick="ajaxViewDetail('#diamondshop',this.href); return false; "> <i class="fa fa-arrow-right"></i>  </a>
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
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('รูป', (isset($fields['image']['language'])? $fields['image']['language'] : array())) }}</td>
						<td>{!! SiteHelpers::formatRows($row->image,$fields['image'],$row ) !!} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('ชื่อสินค้า', (isset($fields['product_name']['language'])? $fields['product_name']['language'] : array())) }}</td>
						<td>{{ $row->product_name}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('รายละเอียด', (isset($fields['product_desc']['language'])? $fields['product_desc']['language'] : array())) }}</td>
						<td>{{ $row->product_desc}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('หมวดหมู่', (isset($fields['product_category']['language'])? $fields['product_category']['language'] : array())) }}</td>
						<td>{{ $row->product_category}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('ราคาเพชร', (isset($fields['diamond_price']['language'])? $fields['diamond_price']['language'] : array())) }}</td>
						<td>{{ $row->diamond_price}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('แลกเครดิต', (isset($fields['convert_credit']['language'])? $fields['convert_credit']['language'] : array())) }}</td>
						<td>{{ $row->convert_credit}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('ใช้งาน?', (isset($fields['active']['language'])? $fields['active']['language'] : array())) }}</td>
						<td>{!! SiteHelpers::formatRows($row->active,$fields['active'],$row ) !!} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Tags', (isset($fields['tags']['language'])? $fields['tags']['language'] : array())) }}</td>
						<td>{{ $row->tags}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('วันที่สร้าง', (isset($fields['create_date']['language'])? $fields['create_date']['language'] : array())) }}</td>
						<td>{{ $row->create_date}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('วันหมดอายุ', (isset($fields['expired_date']['language'])? $fields['expired_date']['language'] : array())) }}</td>
						<td>{{ $row->expired_date}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('สำหรับ', (isset($fields['user_role']['language'])? $fields['user_role']['language'] : array())) }}</td>
						<td>{{ $row->user_role}} </td>
						
					</tr>
				
			</tbody>	
		</table>  
			
		 	
		 
@if($setting['view-method'] =='native')
	</div>
</div>
@endif		