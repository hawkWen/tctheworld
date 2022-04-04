@if($setting['view-method'] =='native')
<div class="card">
	<div class="card-body">	
		<div class="toolbar-nav">
			<div class="row">
				<div class="col-md-6" >
			   		<a href="{{ ($prevnext['prev'] != '' ? secure_url('balance/'.$prevnext['prev'].'?return='.$return ) : '#') }}" class="tips btn btn-sm" onclick="ajaxViewDetail('#balance',this.href); return false; "><i class="fa fa-arrow-left"></i>  </a>	
					<a href="{{ ($prevnext['next'] != '' ? secure_url('balance/'.$prevnext['next'].'?return='.$return ) : '#') }}" class="tips btn btn-sm " onclick="ajaxViewDetail('#balance',this.href); return false; "> <i class="fa fa-arrow-right"></i>  </a>					
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

		  		<a href="#home{{ $row->id }}" aria-controls="home" role="tab" data-toggle="tab" class="nav-link active">  {{ $pageTitle}} :   View Detail </a></li>
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
		  	<div role="tabpanel" class="tab-pane active" id="home{{ $row->id }}">

				<div class="table-responsive" >  
					<table class="table table-striped table-bordered" >
						<tbody>	
							
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('User id', (isset($fields['id']['language'])? $fields['id']['language'] : array())) }}</td>
						<td>{{ $row->id}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Agent Id', (isset($fields['agent_id']['language'])? $fields['agent_id']['language'] : array())) }}</td>
						<td>{{ $row->agent_id}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Username', (isset($fields['username']['language'])? $fields['username']['language'] : array())) }}</td>
						<td>{{ $row->username}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Bank', (isset($fields['bank']['language'])? $fields['bank']['language'] : array())) }}</td>
						<td>{{ SiteHelpers::formatLookUp($row->bank,'bank','1:banks:bank_id:bank_name') }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Account Number', (isset($fields['account_number']['language'])? $fields['account_number']['language'] : array())) }}</td>
						<td>{{ $row->account_number}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Gameusername', (isset($fields['gameusername']['language'])? $fields['gameusername']['language'] : array())) }}</td>
						<td>{{ $row->gameusername}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Gamepassword', (isset($fields['gamepassword']['language'])? $fields['gamepassword']['language'] : array())) }}</td>
						<td>{{ $row->gamepassword}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Balance', (isset($fields['balance']['language'])? $fields['balance']['language'] : array())) }}</td>
						<td>{{ $row->balance}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Linkgame', (isset($fields['linkgame']['language'])? $fields['linkgame']['language'] : array())) }}</td>
						<td><a href="https://play.moradok88.com/seamless/launch.php?username={{$row->gameusername}}&agent={agent_id}">{{ $row->linkgame}} </a> </td>
						
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