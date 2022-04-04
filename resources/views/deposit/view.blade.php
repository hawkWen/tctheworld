@if($setting['view-method'] =='native')
<div class="card">
	<div class="card-body">	
		<div class="toolbar-nav">
			<div class="row">
				<div class="col-md-6" >
			   		<a href="{{ ($prevnext['prev'] != '' ? secure_url('deposit/'.$prevnext['prev'].'?return='.$return ) : '#') }}" class="tips btn btn-sm" onclick="ajaxViewDetail('#deposit',this.href); return false; "><i class="fa fa-arrow-left"></i>  </a>	
					<a href="{{ ($prevnext['next'] != '' ? secure_url('deposit/'.$prevnext['next'].'?return='.$return ) : '#') }}" class="tips btn btn-sm " onclick="ajaxViewDetail('#deposit',this.href); return false; "> <i class="fa fa-arrow-right"></i>  </a>					
				</div>	

				<div class="col-md-6 text-right" >
					<a href="javascript://ajax" onclick="ajaxViewClose('#{{ $pageModule }}')" class="tips btn btn-sm  " title="{{ __('core.btn_back') }}"><i class="fa  fa-times"></i></a>		
				</div>
			</div>
		</div>	
@endif	

		<div class="p-5">
		  <!-- Nav tabs -->
		  <ul class="nav nav-tabs form-tab" role="tablist">
		  	<li class="nav-item">

		  		<a href="#home{{ $row->deposit_id }}" aria-controls="home" role="tab" data-toggle="tab" class="nav-link active">  {{ $pageTitle}} :   View Detail </a></li>
			@foreach($subgrid as $sub)
				<li class="nav-item">
					<a href="#{{ str_replace(" ","_",$sub['title']) }}{{ $row->{$sub['master_key']} }}" aria-controls="profile" role="tab" data-toggle="tab" class="nav-link ">
					{{ $pageTitle}} :  {{ $sub['title'] }}
					</a>
				</li>
			@endforeach
		  </ul>


		  <!-- Tab panes -->
		  <div class="tab-content m-t">
		  	<div role="tabpanel" class="tab-pane active" id="home{{ $row->deposit_id }}">

				<div class="table-responsive" >  
					<table class="table table-striped table-bordered" >
						<tbody>	
							
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Deposit Id', (isset($fields['deposit_id']['language'])? $fields['deposit_id']['language'] : array())) }}</td>
						<td>{{ $row->deposit_id}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('วันที่', (isset($fields['date_time']['language'])? $fields['date_time']['language'] : array())) }}</td>
						<td>{{ $row->date_time}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('ยูสเซอร์', (isset($fields['user_id']['language'])? $fields['user_id']['language'] : array())) }}</td>
						<td>{{ SiteHelpers::formatLookUp($row->user_id,'user_id','1:tb_users:id:username') }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('ยอด', (isset($fields['amount']['language'])? $fields['amount']['language'] : array())) }}</td>
						<td>{{ $row->amount}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('บัญชีปลายทาง', (isset($fields['bankweb_id']['language'])? $fields['bankweb_id']['language'] : array())) }}</td>
						<td>{{ SiteHelpers::formatLookUp($row->bankweb_id,'bankweb_id','1:bank_web:id:bank_name|bank_account_no') }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Trans Id', (isset($fields['trans_id']['language'])? $fields['trans_id']['language'] : array())) }}</td>
						<td>{{ $row->trans_id}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('โอนจากบัญชี', (isset($fields['ac_number']['language'])? $fields['ac_number']['language'] : array())) }}</td>
						<td>{{ $row->ac_number}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('ชื่อธนาคาร', (isset($fields['details']['language'])? $fields['details']['language'] : array())) }}</td>
						<td>{{ $row->details}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('ช่องทาง', (isset($fields['channel']['language'])? $fields['channel']['language'] : array())) }}</td>
						<td>{{ $row->channel}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('โดย', (isset($fields['entry_by']['language'])? $fields['entry_by']['language'] : array())) }}</td>
						<td>{{ SiteHelpers::formatLookUp($row->entry_by,'entry_by','1:tb_users:id:first_name|phone') }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('System Date', (isset($fields['system_date']['language'])? $fields['system_date']['language'] : array())) }}</td>
						<td>{{ $row->system_date}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Mode', (isset($fields['deposit_mode']['language'])? $fields['deposit_mode']['language'] : array())) }}</td>
						<td>{{ $row->deposit_mode}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Deposit Hold', (isset($fields['deposit_hold']['language'])? $fields['deposit_hold']['language'] : array())) }}</td>
						<td>{{ $row->deposit_hold}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('สถานะ', (isset($fields['status']['language'])? $fields['status']['language'] : array())) }}</td>
						<td>{!! SiteHelpers::formatRows($row->status,$fields['status'],$row ) !!} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Username', (isset($fields['username']['language'])? $fields['username']['language'] : array())) }}</td>
						<td>{{ $row->username}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Gameusername', (isset($fields['gameusername']['language'])? $fields['gameusername']['language'] : array())) }}</td>
						<td>{{ $row->gameusername}} </td>
						
					</tr>
						
						</tbody>	
					</table>  		
				</div>
				
		  	</div>
		  	@foreach($subgrid as $sub)
		  	<div role="tabpanel" class="tab-pane" id="{{ str_replace(" ","_",$sub['title']) }}{{ $row->{$sub['master_key']} }}"></div>
		  	@endforeach
		  </div>
		</div>
		 	
@if($setting['view-method'] =='native')
	</div>
</div>
@endif		
	

<script type="text/javascript">
	$(function(){
		$('.form-tab a').on('click', function (e) {
		  	e.preventDefault()
		  	$(this).tab('show')
		})
		<?php foreach($subgrid as $sub) { ?>
			$('#{{ str_replace(" ","_",$sub['title']) }}{{ $row->{$sub['master_key']} }}').load('{!! secure_url($sub['module']."/lookup?param=".implode("-",$sub)."-".$row->{$sub['master_key']})!!}')
		<?php } ?>

		
	})

</script>