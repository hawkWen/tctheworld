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
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('รูปปก', (isset($fields['image_normal']['language'])? $fields['image_normal']['language'] : array())) }}</td>
						<td>{{ $row->image_normal}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('ชื่อเกม', (isset($fields['name']['language'])? $fields['name']['language'] : array())) }}</td>
						<td>{{ $row->name}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Id', (isset($fields['id']['language'])? $fields['id']['language'] : array())) }}</td>
						<td>{{ $row->id}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('รูป', (isset($fields['image_large']['language'])? $fields['image_large']['language'] : array())) }}</td>
						<td>{{ $row->image_large}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Code', (isset($fields['code']['language'])? $fields['code']['language'] : array())) }}</td>
						<td>{{ $row->code}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('ค่าย', (isset($fields['partner']['language'])? $fields['partner']['language'] : array())) }}</td>
						<td>{{ SiteHelpers::formatLookUp($row->partner,'partner','1:game_partners:short_name:image') }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Gameid', (isset($fields['gameid']['language'])? $fields['gameid']['language'] : array())) }}</td>
						<td>{{ $row->gameid}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('หมวดหมู่', (isset($fields['game_category_id']['language'])? $fields['game_category_id']['language'] : array())) }}</td>
						<td>{{ SiteHelpers::formatLookUp($row->game_category_id,'game_category_id','1:game_category:id:category_name') }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('ประเภท', (isset($fields['game_type']['language'])? $fields['game_type']['language'] : array())) }}</td>
						<td>{{ SiteHelpers::formatLookUp($row->game_type,'game_type','1:game_type:id:name') }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('สถานะ', (isset($fields['active']['language'])? $fields['active']['language'] : array())) }}</td>
						<td>{!! SiteHelpers::formatRows($row->active,$fields['active'],$row ) !!} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('วันที่', (isset($fields['date_time']['language'])? $fields['date_time']['language'] : array())) }}</td>
						<td>{{ $row->date_time}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Min Bet', (isset($fields['min_bet']['language'])? $fields['min_bet']['language'] : array())) }}</td>
						<td>{{ $row->min_bet}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Max Bet', (isset($fields['max_bet']['language'])? $fields['max_bet']['language'] : array())) }}</td>
						<td>{{ $row->max_bet}} </td>
						
					</tr>
						
					<tr>
						<td width='30%' class='label-view text-right'></td>
						<td> <a href="javascript:history.go(-1)" class="btn btn-primary"> Back To Grid <a> </td>
						
					</tr>					
				
			</tbody>	
		</table>   

	 
	
	</div>
</div>	