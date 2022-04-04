<?php include('header.php'); ?>




      <div class="content-wrapper shadow-lg bg-main" id="main--index">
         <div class="nav_menuTop">
            <div class="container">
               <div class="row">
                  <div class="" style="position: absolute;right: 15px;z-index: 999;" class="shadow">
                     <a href="index.php"><img src="images/home/thailand.png" style="height:24px;position: relative;top: 7px;" alt=""></a>
                     <a href="index.php"><img src="images/home/united-kingdom.png" style="height:24px;position: relative;top: 7px;" alt=""></a>
                  </div>
                  <div class="col-12 p-0 text-center mt-2 mb-2">
                     <a href="javascript:void(0)" onclick="goMain()">
                     <img src="images/betlix.png" style="" class="nav_menuToplogo">
                     </a>
                  </div>
               </div>
               <div class="row" style="">
                  <div class="col-7">
                     <div class="text-white txt_Navtop">
                        <i class="fas fa-user-alt"></i> <b><span id="username" style="font-weight: 100;"></span></b>
                        <span style="font-size: x-small;z-index: 999;"><a href="index.php" style="margin-left: 3px;"><i class="fas fa-sign-out-alt"></i></a></span>
                     </div>
                  </div>
                  <div class="col-5">
                     <div class="text-white txt_Navtop text-right">
                        <i class="fas fa-wallet"></i> เครดิต <span id="credit"></span>
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
            <div class="row m-0 mb-3">
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
                  <a href="message.php" class="all_message">
                     <span class="txtall_message" style="left:-9px;"><i class="fas fa-envelope"></i>
                  อ่านทั้งหมด</span>
                  </a>
               </div>
            </div>
            
            
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
                                          <img src="images/home/g_menu1_active.png" class="icon_g">
                                          <br>
                                          <span class="mm_none"> ทั้งหมด </span>
                                          </button>
                                       </div>
                                       <div class="col-3 p-0 m-0 border-right">
                                          <button class="btn select_G_grid w-100" onclick="filter_gridSelection('casino')"> <img src="images/home/g_menu2_active.png" class="icon_g">
                                          <br>
                                          <span class="mm_none"> คาสิโน </span>
                                          </button>
                                       </div>
                                       <div class="col-3 p-0 m-0 border-right">
                                          <button class="btn select_G_grid w-100" onclick="filter_gridSelection('slot')">
                                          <img src="images/home/g_menu3_active.png" class="icon_g">
                                          <br>
                                          <span class="mm_none"> สล็อต </span> </button>
                                       </div>
                                       <div class="col-3 p-0 m-0">
                                          <button class="btn select_G_grid w-100 rounded-right" onclick="filter_gridSelection('fishing')">
                                          <img src="images/home/g_menu4_active.png?v=0001" class="icon_g">
                                          <br>
                                          <span class="mm_none"> เกม/ยิงปลา </span> </button>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="text-center position-relative index-maintenance">
                                 <img src="images/home/index-maintenance.jpg?v=0001" class="w-100">
                                 <p>ปรับปรุงพฤหัสบดี เวลา 03:00 - 06:00 GMT+7</p>
                              </div>
                           </center>
                           <center>
                              <a href="joker.php"><img src="images/home/joker4.jpeg" class="img-fluid rounded-top rounded-right rounded-bottom rounded-left mt-1" style="width: 80%;" alt=""></a>
                              <a href="pgm.php"><img src="images/home/pp5.png" class="img-fluid rounded-top rounded-right rounded-bottom rounded-left mt-1" style="width: 80%;" alt=""></a>
                              <div class="pd-grid-wrapper_drid">
                                 <div class="grid-wrapper_drid container mt-2">
                                    <div class="content">
                                       <div class="filter_grid grid-item casino">
                                          <?php include('fireanimation.php'); ?>
                                          <div class="bg-gradient-game_grid ">
                                             <a href="javascript:void(0)" onClick="popitup('dg')">
                                                <div class="image shadow">
                                                   <img src="images/home/dg.png" class="img-fluid logoGame" style="">
                                                </div>
                                             </a>
                                          </div>
                                          <div class="text-center">
                                             <small class="wrapper-gametxtName"> DG </small>
                                          </div>
                                       </div>
                                       <div class="filter_grid grid-item slot">
                                          <?php include('fireanimation.php'); ?>
                                          <div class="bg-gradient-game_grid ">
                                             <a href="pgm.php">
                                                <div class="image shadow">
                                                   <img src="images/home/pplogo.png" class="img-fluid logoGame" style="">
                                                </div>
                                             </a>
                                          </div>
                                          <div class="text-center">
                                             <small class="wrapper-gametxtName"> PragmaticPlay </small>
                                          </div>
                                       </div>
                                       <div class="filter_grid grid-item slot casino fishing">
                                          <div class="bg-gradient-game_grid ">
                                             <img src="images/home/new.png" style="position: absolute;height: 20px;left: -5px;top: -3px;z-index:999">
                                             <a href="/swg">
                                                <div class="image shadow">
                                                   <img src="images/home/swg.png" class="img-fluid logoGame" style="">
                                                </div>
                                             </a>
                                          </div>
                                          <div class="text-center">
                                             <small class="wrapper-gametxtName"> SkyWind Group </small>
                                          </div>
                                       </div>
                                       <div class="filter_grid grid-item slot">
                                          <div class="bg-gradient-game_grid ">
                                             <img src="images/home/new.png" style="position: absolute;height: 20px;left: -5px;top: -3px;z-index:999">
                                             <a href="/aws">
                                                <div class="image shadow">
                                                   <img src="images/home/aws.png" class="img-fluid logoGame" style="">
                                                </div>
                                             </a>
                                          </div>
                                          <div class="text-center">
                                             <small class="wrapper-gametxtName"> AE Gaming Slot </small>
                                          </div>
                                       </div>
                                       <div class="filter_grid grid-item slot">
                                          <div class="bg-gradient-game_grid ">
                                             <img src="images/home/new.png" style="position: absolute;height: 20px;left: -5px;top: -3px;z-index:999">
                                             <a href="/gameslobby/1x2">
                                                <div class="image shadow">
                                                   <img src="images/home/1x2.png" class="img-fluid logoGame" style="">
                                                </div>
                                             </a>
                                          </div>
                                          <div class="text-center">
                                             <small class="wrapper-gametxtName"> 1x2 Gaming </small>
                                          </div>
                                       </div>
                                       <div class="filter_grid grid-item slot">
                                          <div class="bg-gradient-game_grid ">
                                             <img src="images/home/new.png" style="position: absolute;height: 20px;left: -5px;top: -3px;z-index:999">
                                             <a href="/gameslobby/hak">
                                                <div class="image shadow">
                                                   <img src="images/home/hak.png" class="img-fluid logoGame" style="">
                                                </div>
                                             </a>
                                          </div>
                                          <div class="text-center">
                                             <small class="wrapper-gametxtName"> Hacksaw Gaming </small>
                                          </div>
                                       </div>
                                       <div class="filter_grid grid-item slot casino fishing">
                                          <div class="bg-gradient-game_grid ">
                                             <a href="javascript:void(0)" onClick="popitup('cq9')">
                                                <div class="image shadow">
                                                   <img src="images/home/cq9.png" class="img-fluid logoGame" style="">
                                                </div>
                                             </a>
                                          </div>
                                          <div class="text-center">
                                             <small class="wrapper-gametxtName"> CQ9 </small>
                                          </div>
                                       </div>
                                       <div class="filter_grid grid-item slot">
                                          <div class="bg-gradient-game_grid ">
                                             <a href="/kg">
                                                <div class="image shadow">
                                                   <img src="images/home/kg.png" class="img-fluid logoGame" style="">
                                                </div>
                                             </a>
                                          </div>
                                          <div class="text-center">
                                             <small class="wrapper-gametxtName"> KA Gaming </small>
                                          </div>
                                       </div>
                                       <div class="filter_grid grid-item slot">
                                          <div class="bg-gradient-game_grid ">
                                             <a href="/gameslobby/fng">
                                                <div class="image shadow">
                                                   <img src="images/home/fng.png" class="img-fluid logoGame" style="">
                                                </div>
                                             </a>
                                          </div>
                                          <div class="text-center">
                                             <small class="wrapper-gametxtName"> Fantasma Games </small>
                                          </div>
                                       </div>
                                       <div class="filter_grid grid-item slot">
                                          <div class="bg-gradient-game_grid ">
                                             <a href="/gameslobby/nge">
                                                <div class="image shadow">
                                                   <img src="images/home/nge.png" class="img-fluid logoGame" style="">
                                                </div>
                                             </a>
                                          </div>
                                          <div class="text-center">
                                             <small class="wrapper-gametxtName"> NetGames Ent </small>
                                          </div>
                                       </div>
                                       <div class="filter_grid grid-item slot casino">
                                          <div class="bg-gradient-game_grid ">
                                             <a href="javascript:void(0)" onClick="popitup('r88')">
                                                <div class="image shadow">
                                                   <img src="images/home/r88.png" class="img-fluid logoGame" style="">
                                                </div>
                                             </a>
                                          </div>
                                          <div class="text-center">
                                             <small class="wrapper-gametxtName"> Rich88 </small>
                                          </div>
                                       </div>
                                       <div class="filter_grid grid-item slot casino fishing">
                                          <div class="bg-gradient-game_grid ">
                                             <a href="/jl">
                                                <div class="image shadow">
                                                   <img src="images/home/jl.png" class="img-fluid logoGame" style="">
                                                </div>
                                             </a>
                                          </div>
                                          <div class="text-center">
                                             <small class="wrapper-gametxtName"> JILI </small>
                                          </div>
                                       </div>
                                       <div class="filter_grid grid-item slot">
                                          <div class="bg-gradient-game_grid ">
                                             <a href="/gameslobby/pug">
                                                <div class="image shadow">
                                                   <img src="images/home/pug.png" class="img-fluid logoGame" style="">
                                                </div>
                                             </a>
                                          </div>
                                          <div class="text-center">
                                             <small class="wrapper-gametxtName"> Push Gaming </small>
                                          </div>
                                       </div>
                                       <div class="filter_grid grid-item slot">
                                          <div class="bg-gradient-game_grid ">
                                             <a href="/gameslobby/ga">
                                                <div class="image shadow">
                                                   <img src="images/home/ga.png" class="img-fluid logoGame" style="">
                                                </div>
                                             </a>
                                          </div>
                                          <div class="text-center">
                                             <small class="wrapper-gametxtName"> Game Art </small>
                                          </div>
                                       </div>
                                       <div class="filter_grid grid-item slot">
                                          <div class="bg-gradient-game_grid ">
                                             <a href="/gameslobby/png">
                                                <div class="image shadow">
                                                   <img src="images/home/png.png" class="img-fluid logoGame" style="">
                                                </div>
                                             </a>
                                          </div>
                                          <div class="text-center">
                                             <small class="wrapper-gametxtName"> Play n Go </small>
                                          </div>
                                       </div>
                                       <div class="filter_grid grid-item slot">
                                          <div class="bg-gradient-game_grid ">
                                             <a href="/gameslobby/nlc">
                                                <div class="image shadow">
                                                   <img src="images/home/nlc.png" class="img-fluid logoGame" style="">
                                                </div>
                                             </a>
                                          </div>
                                          <div class="text-center">
                                             <small class="wrapper-gametxtName"> Nolimit City </small>
                                          </div>
                                       </div>
                                       <div class="filter_grid grid-item slot">
                                          <div class="bg-gradient-game_grid ">
                                             <a href="/gameslobby/tk">
                                                <div class="image shadow">
                                                   <img src="images/home/tk.png" class="img-fluid logoGame" style="">
                                                </div>
                                             </a>
                                          </div>
                                          <div class="text-center">
                                             <small class="wrapper-gametxtName"> Thunderkick </small>
                                          </div>
                                       </div>
                                       <div class="filter_grid grid-item slot">
                                          <div class="bg-gradient-game_grid ">
                                             <a href="/gameslobby/ygg">
                                                <div class="image shadow">
                                                   <img src="images/home/ygg.png" class="img-fluid logoGame" style="">
                                                </div>
                                             </a>
                                          </div>
                                          <div class="text-center">
                                             <small class="wrapper-gametxtName"> Yggdrasil </small>
                                          </div>
                                       </div>
                                       <div class="filter_grid grid-item slot">
                                          <div class="bg-gradient-game_grid ">
                                             <a href="/gameslobby/qs">
                                                <div class="image shadow">
                                                   <img src="images/home/qs.png" class="img-fluid logoGame" style="">
                                                </div>
                                             </a>
                                          </div>
                                          <div class="text-center">
                                             <small class="wrapper-gametxtName"> Quickspin </small>
                                          </div>
                                       </div>
                                       <div class="filter_grid grid-item slot">
                                          <div class="bg-gradient-game_grid ">
                                             <a href="/gameslobby/hab">
                                                <div class="image shadow">
                                                   <img src="images/home/hab.png" class="img-fluid logoGame" style="">
                                                </div>
                                             </a>
                                          </div>
                                          <div class="text-center">
                                             <small class="wrapper-gametxtName"> Habanero </small>
                                          </div>
                                       </div>
                                       <div class="filter_grid grid-item slot">
                                          <div class="bg-gradient-game_grid ">
                                             <a href="/gameslobby/rlx">
                                                <div class="image shadow">
                                                   <img src="images/home/rlx.png" class="img-fluid logoGame" style="">
                                                </div>
                                             </a>
                                          </div>
                                          <div class="text-center">
                                             <small class="wrapper-gametxtName"> Relax Gaming </small>
                                          </div>
                                       </div>
                                       <div class="filter_grid grid-item slot">
                                          <div class="bg-gradient-game_grid ">
                                             <a href="/gameslobby/ds">
                                                <div class="image shadow">
                                                   <img src="images/home/ds.png" class="img-fluid logoGame" style="">
                                                </div>
                                             </a>
                                          </div>
                                          <div class="text-center">
                                             <small class="wrapper-gametxtName"> Dragoon Soft </small>
                                          </div>
                                       </div>
                                       <div class="filter_grid grid-item slot">
                                          <div class="bg-gradient-game_grid ">
                                             <a href="/gameslobby/red">
                                                <div class="image shadow">
                                                   <img src="images/home/red.png" class="img-fluid logoGame" style="">
                                                </div>
                                             </a>
                                          </div>
                                          <div class="text-center">
                                             <small class="wrapper-gametxtName"> Red Tiger </small>
                                          </div>
                                       </div>
                                       <div class="filter_grid grid-item slot">
                                          <div class="bg-gradient-game_grid ">
                                             <a href="/gameslobby/bng">
                                                <div class="image shadow">
                                                   <img src="images/home/bng.png" class="img-fluid logoGame" style="">
                                                </div>
                                             </a>
                                          </div>
                                          <div class="text-center">
                                             <small class="wrapper-gametxtName"> Booongo </small>
                                          </div>
                                       </div>
                                       <div class="filter_grid grid-item slot">
                                          <div class="bg-gradient-game_grid ">
                                             <a href="/gameslobby/ids">
                                                <div class="image shadow">
                                                   <img src="images/home/ids.png" class="img-fluid logoGame" style="">
                                                </div>
                                             </a>
                                          </div>
                                          <div class="text-center">
                                             <small class="wrapper-gametxtName"> Iron Dog </small>
                                          </div>
                                       </div>
                                       <div class="filter_grid grid-item slot">
                                          <div class="bg-gradient-game_grid ">
                                             <a href="/gameslobby/kgl">
                                                <div class="image shadow">
                                                   <img src="images/home/kgl.png" class="img-fluid logoGame" style="">
                                                </div>
                                             </a>
                                          </div>
                                          <div class="text-center">
                                             <small class="wrapper-gametxtName"> Kalamba Games </small>
                                          </div>
                                       </div>
                                       <div class="filter_grid grid-item slot casino fishing">
                                          <div class="bg-gradient-game_grid ">
                                             <a href="/km">
                                                <div class="image shadow">
                                                   <img src="images/home/kingmakerlogobf.png" class="img-fluid logoGame" style="">
                                                </div>
                                             </a>
                                          </div>
                                          <div class="text-center">
                                             <small class="wrapper-gametxtName"> KINGMAKER </small>
                                          </div>
                                       </div>
                                       <div class="filter_grid grid-item slot fishing">
                                          <div class="bg-gradient-game_grid ">
                                             <a href="/fc">
                                                <div class="image shadow">
                                                   <img src="images/home/fachailogobf.png" class="img-fluid logoGame" style="">
                                                </div>
                                             </a>
                                          </div>
                                          <div class="text-center">
                                             <small class="wrapper-gametxtName"> Fachai </small>
                                          </div>
                                       </div>
                                       <div class="filter_grid grid-item slot casino fishing">
                                          <div class="bg-gradient-game_grid ">
                                             <a href="javascript:void(0)" onClick="popitup('amb')">
                                                <div class="image shadow">
                                                   <img src="images/home/ambpokerlogobf.png" class="img-fluid logoGame" style="">
                                                </div>
                                             </a>
                                          </div>
                                          <div class="text-center">
                                             <small class="wrapper-gametxtName"> AMB Poker </small>
                                          </div>
                                       </div>
                                       <div class="filter_grid grid-item slot fishing">
                                          <div class="bg-gradient-game_grid ">
                                             <a href="/funky">
                                                <div class="image shadow">
                                                   <img src="images/home/funky.png" class="img-fluid logoGame" style="">
                                                </div>
                                             </a>
                                          </div>
                                          <div class="text-center">
                                             <small class="wrapper-gametxtName"> Funky Games </small>
                                          </div>
                                       </div>
                                       <div class="filter_grid grid-item casino">
                                          <div class="bg-gradient-game_grid ">
                                             <a href="javascript:void(0)" onClick="popitup('gd88')">
                                                <div class="image shadow">
                                                   <img src="images/home/GD88.png" class="img-fluid logoGame" style="">
                                                </div>
                                             </a>
                                          </div>
                                          <div class="text-center">
                                             <small class="wrapper-gametxtName"> Green Dragon </small>
                                          </div>
                                       </div>
                                       <div class="filter_grid grid-item slot fishing">
                                          <div class="bg-gradient-game_grid ">
                                             <a href="/gamatron">
                                                <div class="image shadow">
                                                   <img src="images/home/gamatron2.png" class="img-fluid logoGame" style="">
                                                </div>
                                             </a>
                                          </div>
                                          <div class="text-center">
                                             <small class="wrapper-gametxtName"> Gamatron </small>
                                          </div>
                                       </div>
                                       <div class="filter_grid grid-item casino">
                                          <div class="bg-gradient-game_grid ">
                                             <a href="javascript:void(0)" onClick="popitup('sexy')">
                                                <div class="image shadow">
                                                   <img src="images/home/AE-Sexy-Logo.png" class="img-fluid logoGame" style="">
                                                </div>
                                             </a>
                                          </div>
                                          <div class="text-center">
                                             <small class="wrapper-gametxtName"> Sexy </small>
                                          </div>
                                       </div>
                                       <div class="filter_grid grid-item casino fishing">
                                          <div class="bg-gradient-game_grid ">
                                             <a href="/bg">
                                                <div class="image shadow">
                                                   <img src="images/home/bg.png" class="img-fluid logoGame" style="">
                                                </div>
                                             </a>
                                          </div>
                                          <div class="text-center">
                                             <small class="wrapper-gametxtName"> BG </small>
                                          </div>
                                       </div>
                                       <div class="filter_grid grid-item slot">
                                          <div class="bg-gradient-game_grid ">
                                             <a href="javascript:void(0)" onClick="popitup('ps')">
                                                <div class="image shadow">
                                                   <img src="images/home/ps3.png" class="img-fluid logoGame" style="">
                                                </div>
                                             </a>
                                          </div>
                                          <div class="text-center">
                                             <small class="wrapper-gametxtName"> PlayStar </small>
                                          </div>
                                       </div>
                                       <div class="filter_grid grid-item slot fishing">
                                          <div class="bg-gradient-game_grid ">
                                             <a href="javascript:void(0)" onClick="popitup('sp')">
                                                <div class="image shadow">
                                                   <img src="images/home/simpler20play.png" class="img-fluid logoGame" style="">
                                                </div>
                                             </a>
                                          </div>
                                          <div class="text-center">
                                             <small class="wrapper-gametxtName"> SimplePlay </small>
                                          </div>
                                       </div>
                                       <div class="filter_grid grid-item slot fishing">
                                          <div class="bg-gradient-game_grid ">
                                             <a href="/ep">
                                                <div class="image shadow">
                                                   <img src="images/home/evoplay2.png" class="img-fluid logoGame" style="">
                                                </div>
                                             </a>
                                          </div>
                                          <div class="text-center">
                                             <small class="wrapper-gametxtName"> Evoplay Ent. </small>
                                          </div>
                                       </div>
                                       <div class="filter_grid grid-item slot">
                                          <div class="bg-gradient-game_grid ">
                                             <a href="/netent">
                                                <div class="image shadow">
                                                   <img src="images/home/NetEnt.png" class="img-fluid logoGame" style="">
                                                </div>
                                             </a>
                                          </div>
                                          <div class="text-center">
                                             <small class="wrapper-gametxtName"> NetEnt </small>
                                          </div>
                                       </div>
                                       <div class="filter_grid grid-item slot fishing">
                                          <?php include('fireanimation.php'); ?>
                                          <div class="bg-gradient-game_grid ">
                                             <a href="/mg">
                                                <div class="image shadow">
                                                   <img src="images/home/microgaming.png" class="img-fluid logoGame" style="">
                                                </div>
                                             </a>
                                          </div>
                                          <div class="text-center">
                                             <small class="wrapper-gametxtName"> Micro Gaming </small>
                                          </div>
                                       </div>
                                       <div class="filter_grid grid-item slot">
                                          <div class="bg-gradient-game_grid ">
                                             <a href="javascript:void(0)" onClick="popitup('ttg')">
                                                <div class="image shadow">
                                                   <img src="images/home/toptrend20gaming.png" class="img-fluid logoGame" style="">
                                                </div>
                                             </a>
                                          </div>
                                          <div class="text-center">
                                             <small class="wrapper-gametxtName"> TTG </small>
                                          </div>
                                       </div>
                                       <div class="filter_grid grid-item casino">
                                          <div class="bg-gradient-game_grid ">
                                             <a href="/wm">
                                                <div class="image shadow">
                                                   <img src="images/home/wm.png" class="img-fluid logoGame" style="">
                                                </div>
                                             </a>
                                          </div>
                                          <div class="text-center">
                                             <small class="wrapper-gametxtName"> WM </small>
                                          </div>
                                       </div>
                                       <div class="filter_grid grid-item casino">
                                          <div class="bg-gradient-game_grid ">
                                             <a href="javascript:void(0)" onClick="popitup('ag')">
                                                <div class="image shadow">
                                                   <img src="images/home/asia20gaming.png" class="img-fluid logoGame" style="">
                                                </div>
                                             </a>
                                          </div>
                                          <div class="text-center">
                                             <small class="wrapper-gametxtName"> Asia Gaming </small>
                                          </div>
                                       </div>
                                       <div class="filter_grid grid-item slot">
                                          <div class="bg-gradient-game_grid ">
                                             <a href="javascript:void(0)" onClick="popitup('pg')">
                                                <div class="image shadow">
                                                   <img src="images/home/pg.png" class="img-fluid logoGame" style="">
                                                </div>
                                             </a>
                                          </div>
                                          <div class="text-center">
                                             <small class="wrapper-gametxtName"> PG </small>
                                          </div>
                                       </div>
                                       <div class="filter_grid grid-item casino">
                                          <div class="bg-gradient-game_grid ">
                                             <a href="javascript:void(0)" onClick="popitup('sa')">
                                                <div class="image shadow">
                                                   <img src="images/home/saGame.png" class="img-fluid logoGame" style="">
                                                </div>
                                             </a>
                                          </div>
                                          <div class="text-center">
                                             <small class="wrapper-gametxtName"> SA Gaming </small>
                                          </div>
                                       </div>
                                       <div class="filter_grid grid-item slot fishing">
                                          <div class="bg-gradient-game_grid ">
                                             <a href="joker.php">
                                                <div class="image shadow">
                                                   <img src="images/home/joker2.png" class="img-fluid logoGame" style="">
                                                </div>
                                             </a>
                                          </div>
                                          <div class="text-center">
                                             <small class="wrapper-gametxtName"> Joker </small>
                                          </div>
                                       </div>
                                       <div class="filter_grid grid-item slot">
                                          <div class="bg-gradient-game_grid ">
                                             <a href="/gameslobby/bpg">
                                                <div class="image shadow">
                                                   <img src="images/home/bpg.png" class="img-fluid logoGame" style="">
                                                </div>
                                             </a>
                                          </div>
                                          <div class="text-center">
                                             <small class="wrapper-gametxtName"> Blueprint Gaming </small>
                                          </div>
                                       </div>
                                       <div class="filter_grid grid-item slot">
                                          <div class="bg-gradient-game_grid ">
                                             <a href="/gameslobby/mav">
                                                <div class="image shadow">
                                                   <img src="images/home/mav.png" class="img-fluid logoGame" style="">
                                                </div>
                                             </a>
                                          </div>
                                          <div class="text-center">
                                             <small class="wrapper-gametxtName"> Maverick </small>
                                          </div>
                                       </div>
                                       <div class="filter_grid grid-item casino">
                                          <div class="bg-gradient-game_grid Coming_soon">
                                             <div class="divComing_soon">
                                                <div class="txtComing_soon">เร็วๆนี้ <br>
                                                   00:00
                                                </div>
                                             </div>
                                             <a>
                                                <div class="image shadow">
                                                   <img src="images/home/eg.png" class="img-fluid logoGame" style="">
                                                </div>
                                             </a>
                                          </div>
                                          <div class="text-center">
                                             <small class="wrapper-gametxtName"> Evolution Gaming </small>
                                          </div>
                                       </div>
                                       <div class="filter_grid grid-item casino">
                                          <div class="bg-gradient-game_grid Coming_soon">
                                             <div class="divComing_soon">
                                                <div class="txtComing_soon">ปิดปรับปรุง <br></div>
                                             </div>
                                             <a>
                                                <div class="image shadow">
                                                   <img src="images/home/gdg.png" class="img-fluid logoGame" style="">
                                                </div>
                                             </a>
                                          </div>
                                          <div class="text-center">
                                             <small class="wrapper-gametxtName"> Gold Diamond </small>
                                          </div>
                                       </div>
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
 


     <?php include('footer.php'); ?>