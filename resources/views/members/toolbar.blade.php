<div class="card card-custom">
									<div class="card-header">
										<div class="card-title">
											<span class="card-icon">
												<i class="flaticon2-layers text-primary"></i>
											</span>
											<h3 class="card-label">Individual Column Search</h3>
										</div>
										<div class="card-toolbar">
											<!--begin::Dropdown-->
											<div class="dropdown dropdown-inline mr-2">
												<button type="button" class="btn btn-light-primary font-weight-bolder dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
												<i class="la la-download"></i>Export</button>
												<!--begin::Dropdown Menu-->
												<div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
													<ul class="nav flex-column nav-hover">
														<li class="nav-header font-weight-bolder text-uppercase text-primary pb-2">Choose an option:</li>
														<li class="nav-item">
															<a href="#" class="nav-link">
																<i class="nav-icon la la-print"></i>
																<span class="nav-text">Print</span>
															</a>
														</li>
														<li class="nav-item">
															<a href="#" class="nav-link">
																<i class="nav-icon la la-copy"></i>
																<span class="nav-text">Copy</span>
															</a>
														</li>
														<li class="nav-item">
															<a href="#" class="nav-link">
																<i class="nav-icon la la-file-excel-o"></i>
																<span class="nav-text">Excel</span>
															</a>
														</li>
														<li class="nav-item">
															<a href="#" class="nav-link">
																<i class="nav-icon la la-file-text-o"></i>
																<span class="nav-text">CSV</span>
															</a>
														</li>
														<li class="nav-item">
															<a href="#" class="nav-link">
																<i class="nav-icon la la-file-pdf-o"></i>
																<span class="nav-text">PDF</span>
															</a>
														</li>
													</ul>
												</div>
												<!--end::Dropdown Menu-->
											</div>
											<!--end::Dropdown-->
											<!--begin::Button-->
											<a href="#" class="btn btn-primary font-weight-bolder">
											<i class="la la-plus"></i>New Record</a>
											<!--end::Button-->
										</div>
									</div>


												<!-- Toolbar Top -->
		<div class="toolbar-nav">
			<div class="row ">
				<div class="col-md-4 ">
					<div class="input-group text-left">
					      
					      <input type="text" class="form-control form-control-sm dosearch" data-target="{{ secure_url($pageModule) }}" data-div="{{ $pageModule }}" aria-label="..." placeholder=" search  ">
					</div>  
					    
				</div>
				<div class="col-md-8 text-right"> 	
					<div class="btn-group">
						@if($access['is_add'] ==1)
							{!! SiteHelpers::buttonActionCreate($pageModule,$setting) !!}
						@endif
						<div class="btn-group ">
							<button type="button" class="btn  btn-sm  btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Bulk Action </button>
					        <ul class="dropdown-menu">
					        @if($access['is_remove'] ==1)
								 <li class="nav-item"><a href="javascript://ajax"   class="nav-link tips Action_Row" code="remove" title="{{ __('core.btn_remove') }}">
								Remove Selected </a></li>
							@endif
							@if($access['is_add'] ==1)							
								<li class="nav-item"><a href="javascript://ajax" class="nav-link Action_Row" code="copy" title="Copy" > Copy selected</a></li>
								<div class="dropdown-divider"></div>
								<li class="nav-item"><a href="{{ secure_url($pageModule .'/import?return='.$return) }}" onclick="SximoModal(this.href, 'Import CSV'); return false;" class="nav-link">Import CSV</a></li>
							@endif	
							<div class="dropdown-divider"></div>

					        @if($access['is_excel'] ==1)
								<li class="nav-item"><a href="{{ secure_url( $pageModule .'/export?do=excel&return='.$return) }}" class="nav-link "> Export Excel </a></li>	
							@endif
							@if($access['is_csv'] ==1)
								<li class="nav-item"><a href="{{ secure_url( $pageModule .'/export?do=csv&return='.$return) }}" class="nav-link "> Export CSV </a></li>	
							@endif
							@if($access['is_pdf'] ==1)
								<li class="nav-item"><a href="{{ secure_url( $pageModule .'/export?do=pdf&return='.$return) }}" class="nav-link "> Export PDF </a></li>	
							@endif
							@if($access['is_print'] ==1)
								<li class="nav-item"><a href="{{ secure_url( $pageModule .'/export?do=print&return='.$return) }}" class="nav-link "> Print Document </a></li>	
							@endif
							<div class="dropdown-divider"></div>
							<li class="nav-item"><a href="{{ secure_url($pageModule) }}"  class="nav-link "> Clear Search </a></li>
					        </ul>
					        <a href="{{ secure_url($pageModule) }}" class="tips btn btn-sm btn-warning" title="{{ __('core.btn_reload') }}" ><i class="fa  fa-sync-alt"></i></a>
					    </div>    

					    
					</div>	
				</div>
				    
			</div>					
			<!-- End Toolbar Top -->
		</div>	