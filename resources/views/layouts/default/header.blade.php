    <!-- App Sidebar -->
 <div class="modal fade panelbox panelbox-left" id="sidebarPanel" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content gradient-black">
                <div class="modal-body p-0">
                    <!-- profile box -->
                    <div class="profileBox pt-2 pb-2">
                     
                        <div class="in">
                            <strong>{{ $user->first_name }} {{ $user->last_name }}</strong>
                            <div class="text-muted"> <i class="ion ion-md-contact"></i> {{ $user->username }}</div>
                        </div>
                        <a href="#" class="btn btn-link btn-icon sidebar-close" data-dismiss="modal">
                            <ion-icon name="close-outline"></ion-icon>
                        </a>
                    </div>
                    <!-- * profile box -->
                    <!-- balance -->
                    <div class="sidebar-balance">
                        <div class="listview-title">กระเป๋าเงิน</div>
                        <div class="in">
                            <h1 class="amount"><span class="badge badge-thb" data-toggle="tooltip" data-placement="top"
                        title="ยอดเงินคงเหลือ">THB</span> {{ $user->balance }}</h1>
                        </div>
                    </div>
                    <!-- * balance -->
                    <!-- action group -->

                    <div class="action-group pb-2" style="justify-content: end;">
                          <div class="chip chip-media" style="margin-right: 1em;">

                         <span class="icon-menu" data-toggle="tooltip" data-placement="top"
                        title="เหรียญ" style="margin-right: 1em;"><img src="/images/svg/jewly.png" width="18"></span>
                        <span class="chip-label text-light">{{ number_format($user->coins) }}</span>
                    </div>
                               <div class="chip chip-media">
                         <span class="icon-menu" data-toggle="tooltip" data-placement="top"
                        title="เครดิต" style="padding-right: 1em;"><img src="/images/svg/coin.png"></span></span>
                        <span class="chip-label text-light">{{ number_format($user->bonus,2) }}</span>
                    </div>
                        
                    </div>
                    <!-- * action group -->
                    <!-- menu -->
                    <ul class="listview image-listview text gradient-black">
                        <li>
                            <a href="{{ secure_url('/promotion') }}" class="item">
                                <img src="/images/svg/โปรโมชั่น.png" class="icon-menu">
                                <div class="in">
                                    โปรโมชั่น
                                </div>
                            </a>
                        </li>
                    
                        <li>
                            <a href="{{ secure_url('/referral') }}" class="item">
                                <img src="/images/svg/ชวนเพื่อน.png" class="icon-menu">
                                <div class="in">
                                  ชวนเพื่อน
                                </div>
                            </a>
                        </li>

                        <li>
                            <a href="{{ secure_url('/wheel') }}" class="item active">
                                <img src="/images/svg/กงล้อ.png" class="icon-menu">
                                <div class="in">
                                    กงล้อ
                                    <span class="badge badge-primary">{{ $user->wheel_rounds }}</span>

                                </div>
                            </a>
                        </li>
                     
                       <!--<li>
                            <a href="#" class="item">
                                 <img src="/images/svg/คืนยอด.png" class="icon-menu">
                                <div class="in">
                                  คืนยอดเสีย
                                </div>
                            </a>
                        </li>-->
                        <li>
                            <a href="{{ secure_url('/user/logout') }}" class="item">
                                 <img src="/images/svg/logout.png" class="icon-menu">
                                <div class="in">
                                   ออกจากระบบ
                                </div>
                            </a>
                        </li>
                    </ul>
                    <!-- * others -->
                    
                </div>
            </div>
        </div>
    </div>
  
      <div class="appHeader bg-primary text-light">
                <div class="left">
                    <a href="#" class="headerButton" data-toggle="modal" data-target="#sidebarPanel">
             <ion-icon name="menu-outline"></ion-icon>
            </a>
                </div>
                <div class="pageTitle text-white">{{ $title }}</div>
                <div class="right">
                    <a href="https://bit.ly/3te2TCk" class="headerButton ">
                        <img src="/img/line.png" style="width: 35px;">
                    </a>
                </div>
            </div>