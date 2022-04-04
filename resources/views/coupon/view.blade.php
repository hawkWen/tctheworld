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
						<a href="{{ ($prevnext['prev'] != '' ? secure_url('coupon/'.$prevnext['prev'].'?return='.$return ) : '#') }}" class="tips btn btn-primary btn-sm" onclick="ajaxViewDetail('#coupon',this.href); return false; "><i class="fa fa-arrow-left"></i>  </a>	
						<a href="{{ ($prevnext['next'] != '' ? secure_url('coupon/'.$prevnext['next'].'?return='.$return ) : '#') }}" class="tips btn btn-primary  btn-sm " onclick="ajaxViewDetail('#coupon',this.href); return false; "> <i class="fa fa-arrow-right"></i>  </a>
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
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('รูปโปร', (isset($fields['image']['language'])? $fields['image']['language'] : array())) }}</td>
						<td>{!! SiteHelpers::formatRows($row->image,$fields['image'],$row ) !!} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('ชื่อโปร', (isset($fields['promotion_name']['language'])? $fields['promotion_name']['language'] : array())) }}</td>
						<td>{{ $row->promotion_name}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('หมวดหมู่', (isset($fields['promotion_category_id']['language'])? $fields['promotion_category_id']['language'] : array())) }}</td>
						<td>{{ SiteHelpers::formatLookUp($row->promotion_category_id,'promotion_category_id','1:promotion_category:id:category_name') }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('รายละเอียด', (isset($fields['promotion_detail']['language'])? $fields['promotion_detail']['language'] : array())) }}</td>
						<td>{{ $row->promotion_detail}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('ชนิด', (isset($fields['type']['language'])? $fields['type']['language'] : array())) }}</td>
						<td>{{ $row->type}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('ยอดฝาก', (isset($fields['deposit_amount']['language'])? $fields['deposit_amount']['language'] : array())) }}</td>
						<td>{{ $row->deposit_amount}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('รวมรับ', (isset($fields['value']['language'])? $fields['value']['language'] : array())) }}</td>
						<td>{{ $row->value}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('เทิร์น', (isset($fields['turnover']['language'])? $fields['turnover']['language'] : array())) }}</td>
						<td>{{ $row->turnover}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('เกี่ยวข้อง', (isset($fields['relate_promotion_id']['language'])? $fields['relate_promotion_id']['language'] : array())) }}</td>
						<td>{{ SiteHelpers::formatLookUp($row->relate_promotion_id,'relate_promotion_id','1:promotions:id:promotion_name') }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('ถอน', (isset($fields['withdraw_amount']['language'])? $fields['withdraw_amount']['language'] : array())) }}</td>
						<td>{{ $row->withdraw_amount}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('เงื่อนไข', (isset($fields['note']['language'])? $fields['note']['language'] : array())) }}</td>
						<td>{{ $row->note}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('ครั้ง', (isset($fields['get_times']['language'])? $fields['get_times']['language'] : array())) }}</td>
						<td>{{ $row->get_times}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('ประเภท', (isset($fields['promotion_type']['language'])? $fields['promotion_type']['language'] : array())) }}</td>
						<td>{{ $row->promotion_type}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('สูงสุด', (isset($fields['max_withdraw']['language'])? $fields['max_withdraw']['language'] : array())) }}</td>
						<td>{{ $row->max_withdraw}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('กิจกรรม', (isset($fields['activity']['language'])? $fields['activity']['language'] : array())) }}</td>
						<td>{{ $row->activity}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('สถานะ', (isset($fields['active']['language'])? $fields['active']['language'] : array())) }}</td>
						<td>{!! SiteHelpers::formatRows($row->active,$fields['active'],$row ) !!} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Post Date', (isset($fields['post_date']['language'])? $fields['post_date']['language'] : array())) }}</td>
						<td>{{ $row->post_date}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('ประเภทเกม', (isset($fields['game_type']['language'])? $fields['game_type']['language'] : array())) }}</td>
						<td>{{ $row->game_type}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('ราคา coins', (isset($fields['coin_amount']['language'])? $fields['coin_amount']['language'] : array())) }}</td>
						<td>{{ $row->coin_amount}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('หมุนกี่ครั้ง', (isset($fields['wheel_spins']['language'])? $fields['wheel_spins']['language'] : array())) }}</td>
						<td>{{ $row->wheel_spins}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Counts', (isset($fields['counts']['language'])? $fields['counts']['language'] : array())) }}</td>
						<td>{{ $row->counts}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Turn Type', (isset($fields['turn_type']['language'])? $fields['turn_type']['language'] : array())) }}</td>
						<td>{{ $row->turn_type}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Users Limit', (isset($fields['users_limit']['language'])? $fields['users_limit']['language'] : array())) }}</td>
						<td>{{ $row->users_limit}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Count Limit', (isset($fields['count_limit']['language'])? $fields['count_limit']['language'] : array())) }}</td>
						<td>{{ $row->count_limit}} </td>
						
					</tr>
				
			</tbody>	
		</table>  
			
		 	
		 
@if($setting['view-method'] =='native')
	</div>
</div>
@endif		