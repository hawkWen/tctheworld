<div id="kt_header" style="" class="header align-items-stretch">
                        <!--begin::Container-->
                        <div class="gradient-black container-fluid d-flex align-items-stretch justify-content-between">
                            <!--begin::Aside mobile toggle-->
                            <div class="d-flex align-items-center d-lg-none ms-n3 me-1" data-bs-toggle="tooltip" title="Show aside menu">
                                <div class="btn btn-icon btn-active-light-primary" id="kt_aside_mobile_toggle">
                                    <!--begin::Svg Icon | path: icons/stockholm/Text/Menu.svg-->
                                    <span class="svg-icon svg-icon-2x mt-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24" />
                                                <rect fill="#000000" x="4" y="5" width="16" height="3" rx="1.5" />
                                                <path d="M5.5,15 L18.5,15 C19.3284271,15 20,15.6715729 20,16.5 C20,17.3284271 19.3284271,18 18.5,18 L5.5,18 C4.67157288,18 4,17.3284271 4,16.5 C4,15.6715729 4.67157288,15 5.5,15 Z M5.5,10 L18.5,10 C19.3284271,10 20,10.6715729 20,11.5 C20,12.3284271 19.3284271,13 18.5,13 L5.5,13 C4.67157288,13 4,12.3284271 4,11.5 C4,10.6715729 4.67157288,10 5.5,10 Z" fill="#000000" opacity="0.3" />
                                            </g>
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </div>
                            </div>
                            <!--end::Aside mobile toggle-->
                            <!--begin::Mobile logo
                            <div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0">
                                <a href="index.html" class="d-lg-none">
                                    <img alt="Logo" src="/media/logos/logo-1-dark.svg" class="h-15px" />
                                </a>
                            </div>
                            <!--end::Mobile logo-->
                            <!--begin::Wrapper-->
                            <div class="d-flex align-items-stretch justify-content-between flex-lg-grow-1">
                                <!--begin::Navbar-->
                                <div class="d-flex align-items-center col-sm-6" id="kt_header_nav">
                                    <!--begin::Page title-->
                                    <div data-kt-place="true" data-kt-place-mode="prepend" data-kt-place-parent="{default: '#kt_content_container', 'lg': '#kt_header_nav'}" class="d-flex flex-column align-items-start me-3 flex-wrap mb-lg-0 lh-1">
                                       <div class="position-relative my-1">
                                        <!--begin::Svg Icon | path: icons/stockholm/General/Search.svg-->
                                        <span class="svg-icon svg-icon-3 svg-icon-gray-500 position-absolute top-50 translate-middle ps-10">
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24" />
                                                    <path d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                    <path d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z" fill="#000000" fill-rule="nonzero" />
                                                </g>
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                        <input type="text" class="form-control form-control-sm form-control-solid ps-10" name="Search Team" value="" placeholder="ลองค้นหา'Aztec'" />
                                    </div>
                                    <!--end::Search-->
                                        <!--end::Title-->
                                       
                                    </div>
                                    <!--end::Page title-->
                                </div>
                                <!--end::Navbar-->
                                <!--begin::Topbar-->
                                <div class="d-flex align-items-stretch flex-shrink-0">
                                    <!--begin::Toolbar wrapper-->
                                    <div class="d-flex align-items-stretch flex-shrink-0">
                                        <!--begin::Search-->
                                       
                                        <!--end::Search-->
                                    

                                        <!--end::Activities-->
                                
                                        <!--begin::User-->
                                        <div class="d-flex align-items-center ms-1 ms-lg-3" id="kt_header_user_menu_toggle">
                                             <span class="svg-icon svg-icon-muted svg-icon-2hx"> <img src="/img/icon-aside/wallet.svg" class="icon-menu"></span>
                                            <div class="d-flex flex-column align-items-right">
                                                           
                                                            <a href="#" class="fw-bold text-muted text-hover-primary fs-7">กระเป๋าเงิน</a>
                                                             <div class="fw-bolder d-flex align-items-center fs-5 text-light">{{ $user->balance }}
                                                            </div> 
                                            </div> <span class="badge badge-thb" style="top: 7px;  margin-left: 0.5em;" data-toggle="tooltip" data-placement="top"
                        title="ยอดเงินคงเหลือ">THB</span>
                                            <!--begin::Menu-->
                                            <div class="cursor-pointer symbol symbol-40px" data-kt-menu-trigger="click" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end" data-kt-menu-flip="bottom">
                                                <!--begin::Svg Icon | path: assets/media/icons/duotone/General/User.svg-->
                                       
                                        <!--end::Svg Icon-->
                                            </div>
                                            <!--begin::Menu-->
                                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold py-4 fs-6 w-275px" data-kt-menu="true">
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <div class="menu-content d-flex align-items-center px-3">
                                                        <!--begin::Avatar-->
                                                        <div class="symbol symbol-50px me-5">
                                                           <!--begin::Svg Icon | path: assets/media/icons/duotone/General/User.svg-->
                            <span class="svg-icon svg-icon-muted svg-icon-2hx"> <img src="/img/icon-aside/profile.svg" class="icon-menu"></span>
                            <!--end::Svg Icon-->
                                                        </div>
                                                        <!--end::Avatar-->
                                                        <!--begin::Username-->

                                                           <div class="d-flex flex-column">
                                                            <div class="fw-bolder d-flex align-items-center fs-5">{{ $user->username }}
                                                            <span class="badge badge-light-success fw-bolder fs-8 px-2 py-1 ms-2">User</span></div>
                                                            <a href="#" class="fw-bold text-muted text-hover-primary fs-7">{{ $user->first_name }} {{ $user->last_name }}</a>
                                                        </div>
                                                        <!--end::Username-->
                                                    </div>
                                                </div>
                                                <!--end::Menu item-->
                                                <!--begin::Menu separator-->
                                                <div class="separator my-2"></div>
                                                <!--end::Menu separator-->
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-5">
                                                    <a href="account/overview.html" class="menu-link px-5">My Profile</a>
                                                </div>
                                                <!--end::Menu item-->
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-5">
                                                    <a href="pages/projects/list.html" class="menu-link px-5">
                                                        <span class="menu-text">My Projects</span>
                                                        <span class="menu-badge">
                                                            <span class="badge badge-light-danger badge-circle fw-bolder fs-7">3</span>
                                                        </span>
                                                    </a>
                                                </div>
                                                <!--end::Menu item-->
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-5" data-kt-menu-trigger="hover" data-kt-menu-placement="left-start" data-kt-menu-flip="center, top">
                                                    <a href="#" class="menu-link px-5">
                                                        <span class="menu-title">My Subscription</span>
                                                        <span class="menu-arrow"></span>
                                                    </a>
                                                    <!--begin::Menu sub-->
                                                    <div class="menu-sub menu-sub-dropdown w-175px py-4">
                                                        <!--begin::Menu item-->
                                                        <div class="menu-item px-3">
                                                            <a href="account/referrals.html" class="menu-link px-5">Referrals</a>
                                                        </div>
                                                        <!--end::Menu item-->
                                                        <!--begin::Menu item-->
                                                        <div class="menu-item px-3">
                                                            <a href="account/billing.html" class="menu-link px-5">Billing</a>
                                                        </div>
                                                        <!--end::Menu item-->
                                                        <!--begin::Menu item-->
                                                        <div class="menu-item px-3">
                                                            <a href="account/statements.html" class="menu-link px-5">Payments</a>
                                                        </div>
                                                        <!--end::Menu item-->
                                                        <!--begin::Menu item-->
                                                        <div class="menu-item px-3">
                                                            <a href="account/statements.html" class="menu-link d-flex flex-stack px-5">Statements
                                                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="View your statements"></i></a>
                                                        </div>
                                                        <!--end::Menu item-->
                                                        <!--begin::Menu separator-->
                                                        <div class="separator my-2"></div>
                                                        <!--end::Menu separator-->
                                                        <!--begin::Menu item-->
                                                        <div class="menu-item px-3">
                                                            <div class="menu-content px-3">
                                                                <label class="form-check form-switch form-check-custom form-check-solid">
                                                                    <input class="form-check-input w-30px h-20px" type="checkbox" value="1" checked="checked" name="notifications" />
                                                                    <span class="form-check-label text-muted fs-7">Notifications</span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <!--end::Menu item-->
                                                    </div>
                                                    <!--end::Menu sub-->
                                                </div>
                                                <!--end::Menu item-->
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-5">
                                                    <a href="account/statements.html" class="menu-link px-5">My Statements</a>
                                                </div>
                                                <!--end::Menu item-->
                                                <!--begin::Menu separator-->
                                                <div class="separator my-2"></div>
                                                <!--end::Menu separator-->
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-5" data-kt-menu-trigger="hover" data-kt-menu-placement="left-start" data-kt-menu-flip="center, top">
                                                    <a href="#" class="menu-link px-5">
                                                        <span class="menu-title position-relative">Language
                                                        <span class="fs-8 rounded bg-light px-3 py-2 position-absolute translate-middle-y top-50 end-0">Slot
                                                        <img class="w-15px h-15px rounded-1 ms-2" src="/media/icons/duotone/game/slot.svg" alt="metronic" /></span></span>
                                                    </a>
                                                    <!--begin::Menu sub-->
                                                    <div class="menu-sub menu-sub-dropdown w-175px py-4">
                                                        <!--begin::Menu item-->
                                                        <div class="menu-item px-3">
                                                            <a href="account/settings.html" class="menu-link d-flex px-5 active">
                                                            <span class="symbol symbol-20px me-4">
                                                                <img class="rounded-1" src="/media/flags/united-states.svg" alt="metronic" />
                                                            </span>English</a>
                                                        </div>
                                                        <!--end::Menu item-->
                                                        <!--begin::Menu item-->
                                                        <div class="menu-item px-3">
                                                            <a href="account/settings.html" class="menu-link d-flex px-5">
                                                            <span class="symbol symbol-20px me-4">
                                                                <img class="rounded-1" src="/media/flags/spain.svg" alt="metronic" />
                                                            </span>Spanish</a>
                                                        </div>
                                                        <!--end::Menu item-->
                                                        <!--begin::Menu item-->
                                                        <div class="menu-item px-3">
                                                            <a href="account/settings.html" class="menu-link d-flex px-5">
                                                            <span class="symbol symbol-20px me-4">
                                                                <img class="rounded-1" src="/media/flags/germany.svg" alt="metronic" />
                                                            </span>German</a>
                                                        </div>
                                                        <!--end::Menu item-->
                                                        <!--begin::Menu item-->
                                                        <div class="menu-item px-3">
                                                            <a href="account/settings.html" class="menu-link d-flex px-5">
                                                            <span class="symbol symbol-20px me-4">
                                                                <img class="rounded-1" src="/media/flags/japan.svg" alt="metronic" />
                                                            </span>Japanese</a>
                                                        </div>
                                                        <!--end::Menu item-->
                                                        <!--begin::Menu item-->
                                                        <div class="menu-item px-3">
                                                            <a href="account/settings.html" class="menu-link d-flex px-5">
                                                            <span class="symbol symbol-20px me-4">
                                                                <img class="rounded-1" src="/media/flags/france.svg" alt="metronic" />
                                                            </span>French</a>
                                                        </div>
                                                        <!--end::Menu item-->
                                                    </div>
                                                    <!--end::Menu sub-->
                                                </div>
                                                <!--end::Menu item-->
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-5 my-1">
                                                    <a href="account/settings.html" class="menu-link px-5">Account Settings</a>
                                                </div>
                                                <!--end::Menu item-->
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-5">
                                                    <a href="authentication/flows/basic/sign-in.html" class="menu-link px-5">Sign Out</a>
                                                </div>
                                                <!--end::Menu item-->
                                            </div>
                                            <!--end::Menu-->
                                            <!--end::Menu-->
                                        </div>
                                        <!--end::User -->
                                        <!--begin::Heaeder menu toggle-->
                                        <!--end::Heaeder menu toggle-->
                                    </div>
                                    <!--end::Toolbar wrapper-->
                                </div>
                                <!--end::Topbar-->
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Container-->
                    </div>