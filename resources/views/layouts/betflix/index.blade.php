
@include('layouts.betflix.header')
      <div class="content-wrapper shadow-lg bg-main" id="main--index">
         <div class="nav_menuTop">
            <div class="container">
               <div class="row">
                  <div class="" style="position: absolute;right: 15px;z-index: 999;" class="shadow">
                    
                  </div>
                  <div class="col-12 p-0 text-center mt-2 mb-2">
                     <a href="javascript:void(0)" onclick="goMain()">
                     <img src="/uploads/images/backend-logo.png" style="" class="nav_menuToplogo">
                     </a>
                  </div>
               </div>
               <div class="row" style="">
                  <div class="col-7">
                     <div class="text-white txt_Navtop">
                        <i class="fas fa-user-alt"></i> <b><span id="username" style="font-weight: 100;">{{ $user->gameusername }}</span></b>
                        <span style="font-size: x-small;z-index: 999;"><a href="{{ secure_url('games') }}" style="margin-left: 3px;"><i class="fas fa-sign-out-alt"></i></a></span>
                     </div>
                  </div>
                  <div class="col-5">
                     <div class="text-white txt_Navtop text-right">
                        <i class="fas fa-wallet"></i> เครดิต <span id="credit">{{ $credit_user->balance }}</span>
                        <a data-v-fae5bece="" onclick="pullGeneral()" id="refresh" class="refresh ml-1"><i data-v-fae5bece="" class="fas fa-redo"></i></a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div id="preloader">
            <div id="preloader-inner"></div>
         </div>
         <div class="container wrapper">
                  <a href="{{ secure_url('') }}" class="btn_black-G">
      <i class="far fa-arrow-alt-circle-left" style="position: relative; top: 2px;"></i>
      กลับ </a>
            <!--<div class="row m-0 mb-3">
               <div class="col-9 p-0">
                  <div class="marquee">
                     <a href="message.php">
                        <div class="caption">
                           <span id="caption"></span>
                        </div>
                     </a>
                  </div>
               </div>
               <div class="col-3 p-0">
                  <a href="#" class="all_message">
                     <span class="txtall_message" style="left:-9px;"><i class="fas fa-envelope"></i>
                  อ่านทั้งหมด</span>
                  </a>
               </div>
            </div>-->
            
            
            <div class="main_wrapper mt-1">
               <div class="p-0">
                  <div class="row">
                     <div class="col-md-12 mb-3">
                        <div class="wrapper-game">
                           <center>
                              <div id="myBtnContainer_grid">
                                 <div class="shadow_select_G">
                                    <div class="row pr-2 pl-2">
                                       <div class="col-3 p-0 m-0 border-right">
                                          <button class="btn select_G_grid active w-100 rounded-left" onclick="filter_gridSelection('all')">
                                          <img src="betflix/images/home/g_menu1_active.png" class="icon_g">
                                          <br>
                                          <span class="mm_none"> ทั้งหมด </span>
                                          </button>
                                       </div>
                                       <div class="col-3 p-0 m-0 border-right">
                                          <button class="btn select_G_grid w-100" onclick="filter_gridSelection('casino')"> <img src="betflix/images/home/g_menu2_active.png" class="icon_g">
                                          <br>
                                          <span class="mm_none"> คาสิโน </span>
                                          </button>
                                       </div>
                                       <div class="col-3 p-0 m-0 border-right">
                                          <button class="btn select_G_grid w-100" onclick="filter_gridSelection('slot')">
                                          <img src="betflix/images/home/g_menu3_active.png" class="icon_g">
                                          <br>
                                          <span class="mm_none"> สล็อต </span> </button>
                                       </div>
                                       <div class="col-3 p-0 m-0">
                                          <button class="btn select_G_grid w-100 rounded-right" onclick="filter_gridSelection('fishing')">
                                          <img src="betflix/images/home/g_menu4_active.png?v=0001" class="icon_g">
                                          <br>
                                          <span class="mm_none"> เกม/ยิงปลา </span> </button>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <!--<div class="text-center position-relative index-maintenance">
                                 <img src="betflix/images/home/index-maintenance.jpg?v=0001" class="w-100">
                                 <p>ปรับปรุงพฤหัสบดี เวลา 03:00 - 06:00 GMT+7</p>
                              </div>-->
                           </center>
                           <center>
                             <!-- <a href="joker.php"><img src="betflix/images/home/joker4.jpeg" class="img-fluid rounded-top rounded-right rounded-bottom rounded-left mt-1" style="width: 80%;" alt=""></a>
                              <a href="pgm.php"><img src="betflix/images/home/pp5.png" class="img-fluid rounded-top rounded-right rounded-bottom rounded-left mt-1" style="width: 80%;" alt=""></a>-->
                              <div class="pd-grid-wrapper_drid">
                                 <div class="grid-wrapper_drid container mt-2">
                                    <div class="content">
                                       @foreach($partners_data as $key => $value)
                                       <div class="filter_grid grid-item {{ $value->game_type }}">
                                          <div class="bg-gradient-game_grid ">
                                             @if($value->game_type=='casino')
                                             <a href="javascript:void(0)" onclick="link('/seamless/launch?hash={{ \Auth::user()->hash }}&casino={{ $value->short_name }}')">
                                             @elseif($value->game_type=='sport')
                                             <a href="javascript:void(0)" onclick="window.open('https://production.otb-api.com/SBO/launch/{{ \Auth::user()->hash }}/mobile')">
                                             @else
                                             <a href="javascript:void(0)" onclick="link('?partner={{ $value->short_name }}')">
                                             @endif
                                                <div class="image shadow">
                                                   <img src="img/partners/{{ $value->image }}" class="img-fluid logoGame" style="">
                                                </div>
                                             </a>
                                          </div>
                                          <div class="text-center">
                                             <small class="wrapper-gametxtName"> {{ $value->name }} </small>
                                          </div>
                                       </div>
                                       @endforeach
                                       
                                    </div>
                                 </div>
                              </div>
                           </center>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
 
<script type="text/javascript">
    function link(args) {
        $.ajax({
            url: args,
            method: "GET",
            success: function(data) {
                window.history.pushState('games', 'เกมส์ทั้งหมด | moradok88', args)
                $('body').html(data)
            }
        });
    }
</script>
@include('layouts.betflix.footer')