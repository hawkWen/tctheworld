@if($setting['view-method'] =='native')
<div class="card">
	<div class="card-body">	
		<div class="toolbar-nav">
			<div class="row">
				
				<div class="col-md-6  text-left" >
			   		<a href="{{ ($prevnext['prev'] != '' ? secure_url('lastgamehistory/'.$prevnext['prev'].'?return='.$return ) : '#') }}" class="tips btn btn-sm btn-primary" onclick="ajaxViewDetail('#lastgamehistory',this.href); return false; "><i class="fa fa-arrow-left"></i>  </a>	
					<a href="{{ ($prevnext['next'] != '' ? secure_url('lastgamehistory/'.$prevnext['next'].'?return='.$return ) : '#') }}" class="tips btn btn-sm btn-primary" onclick="ajaxViewDetail('#lastgamehistory',this.href); return false; "> <i class="fa fa-arrow-right"></i>  </a>					
				</div>	
				<div class="col-md-6 text-right" >
					<a href="javascript://ajax" onclick="ajaxViewClose('#{{ $pageModule }}')" class="tips btn btn-sm btn-danger  " title="{{ __('core.btn_back') }}"><i class="fa  fa-times"></i></a>		
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
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('User Id', (isset($fields['user_id']['language'])? $fields['user_id']['language'] : array())) }}</td>
						<td>{{ $row->user_id}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Gameusername', (isset($fields['gameusername']['language'])? $fields['gameusername']['language'] : array())) }}</td>
						<td>{{ $row->gameusername}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('เกมส์', (isset($fields['game_id']['language'])? $fields['game_id']['language'] : array())) }}</td>
						<td>{{ SiteHelpers::formatLookUp($row->game_id,'game_id','1:gamelists:id:name') }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('ค่าย', (isset($fields['partner']['language'])? $fields['partner']['language'] : array())) }}</td>
						<td>{{ $row->partner}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Bet Id', (isset($fields['bet_id']['language'])? $fields['bet_id']['language'] : array())) }}</td>
						<td>{{ $row->bet_id}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('เครดิตก่อน', (isset($fields['credit_before']['language'])? $fields['credit_before']['language'] : array())) }}</td>
						<td>{{ $row->credit_before}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('ยอดเล่น', (isset($fields['bet_amount']['language'])? $fields['bet_amount']['language'] : array())) }}</td>
						<td>{{ $row->bet_amount}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('ยอดจ่าย', (isset($fields['payout_amount']['language'])? $fields['payout_amount']['language'] : array())) }}</td>
						<td>{{ $row->payout_amount}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('เครดิตหลัง', (isset($fields['credit_after']['language'])? $fields['credit_after']['language'] : array())) }}</td>
						<td>{{ $row->credit_after}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('วันเวลา', (isset($fields['systemdate']['language'])? $fields['systemdate']['language'] : array())) }}</td>
						<td>{{ $row->systemdate}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('ประเภท', (isset($fields['bet_type']['language'])? $fields['bet_type']['language'] : array())) }}</td>
						<td>{{ $row->bet_type}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('พิเศษ', (isset($fields['spacialbet']['language'])? $fields['spacialbet']['language'] : array())) }}</td>
						<td>{{ $row->spacialbet}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('รับโปร?', (isset($fields['bonus_mode']['language'])? $fields['bonus_mode']['language'] : array())) }}</td>
						<td>{{ $row->bonus_mode}} </td>
						
					</tr>
				
			</tbody>	
		</table>  
			
		 	
		 
@if($setting['view-method'] =='native')
	</div>
</div>
@endif		

@include('sximo.module.template.ajax.viewjavascript')