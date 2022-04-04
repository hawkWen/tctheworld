@include('layouts.betflix.header')

<div class="content-wrapper shadow-lg bg-main">
   <div class="nav_menuTop" >
      <div class="container">
         <div class="row">
            <div class="" style="position: absolute;right: 15px;z-index: 999;" class="shadow">
               <!--<a href="index.php"><img src="images/joker/thailand.png" style="height:24px;position: relative;top: 7px;" alt=""></a>
               <a href="index.php"><img src="images/joker/united-kingdom.png" style="height:24px;position: relative;top: 7px;" alt=""></a>-->
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
      <a href="{{ secure_url('games') }}" class="btn_black-G">
      <i class="far fa-arrow-alt-circle-left" style="position: relative; top: 2px;"></i>
      กลับ </a>
      <div class="main_wrapper black_bg">
         <div class="p-0">
            <div class="row">
               <div class="col-md-12 pb-4">
                  <div class="wrapper-game">
                     <center>
                        <div id="myBtnContainer_grid">
                           <div class="shadow_select_G">
                              <div class="row pr-2 pl-2">
                                 <div class="col-3 p-0 m-0 border-right">
                                    <button class="btn select_G_grid active w-100 rounded-left" onclick="filter_gridSelection('all')">
                                    <i class="img-icon all_game"></i>
                                    <br>
                                    <span class="txt_img-icon"> เกมทั้งหมด </span>
                                    </button>
                                 </div>

                                 <div class="col-3 p-0 m-0 border-left">
                                    <button class="btn select_G_grid w-100" onclick="filter_gridSelection('1')">
                                    <i class="img-icon slot"></i>
                                    <br>
                                    <span class="txt_img-icon"> สล็อต </span>
                                    </button>
                                 </div>
                    
                                 <div class="col-3 p-0 m-0 border-right">
                                    <button class="btn select_G_grid w-100" onclick="filter_gridSelection('2')">
                                    <i class="img-icon fishing"></i>
                                    <br>
                                    <span class="txt_img-icon"> ยิงปลา </span> </button>
                                 </div>
                        
                                 <div class="col-3 p-0 m-0">
                                    <button class="btn select_G_grid w-100 rounded-right" onclick="filter_gridSelection('3')">
                                    <i class="img-icon tablegame"></i>
                                    <br>
                                    <span class="txt_img-icon"> เกมโต๊ะ </span> </button>
                                 </div>
                  
                              </div>
                           </div>
                        </div>
                     </center>
                     <center>
                        <div class="mt-3">
                           <img src="img/partners/{{ $partnerdetail->image }}" alt="" class="joker_G">
                        </div>
                        <div class="grid-wrapper_drid container">
                           <div class="content">
                              @foreach($games_data as $key => $value)
                              <div class="filter_grid grid-item {{ $value->game_type }}">
                                 <div class="bg-gradient-game_grid">
                                    <div class="image">
                                       <a href="javascript:void(0)" onclick="link('/seamless/launch?gameid={{ $value->id }}&hash={{ \Auth::user()->hash }}')">
                                          <img src="{{ $value->image_large }}" class="img-fluid rounded">
                                          <p class="listName_game">{{ $value->name }}</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              @endforeach
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
                window.history.pushState('games', 'เกมส์ทั้งหมด', args)
                $('body').html(data)
            }
        });
    }
</script>

@include('layouts.betflix.footer')