@if($setting['view-method'] =='native')
<div class="card">
	<div class="card-body">	
		<div class="toolbar-nav">
			<div class="row">
				<div class="col-md-6" >
			   		<a href="{{ ($prevnext['prev'] != '' ? secure_url('affiliate/'.$prevnext['prev'].'?return='.$return ) : '#') }}" class="tips btn btn-sm" onclick="ajaxViewDetail('#affiliate',this.href); return false; "><i class="fa fa-arrow-left"></i>  </a>	
					<a href="{{ ($prevnext['next'] != '' ? secure_url('affiliate/'.$prevnext['next'].'?return='.$return ) : '#') }}" class="tips btn btn-sm " onclick="ajaxViewDetail('#affiliate',this.href); return false; "> <i class="fa fa-arrow-right"></i>  </a>					
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