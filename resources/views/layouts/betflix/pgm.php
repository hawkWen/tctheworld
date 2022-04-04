<?php include('header.php'); ?>





<div class="content-wrapper shadow-lg bg-main">
   <div class="nav_menuTop" >
      <div class="container">
         <div class="row">
            <div class="" style="position: absolute;right: 15px;z-index: 999;" class="shadow">
               <a href="index.php"><img src="images/pgm/thailand.png" style="height:24px;position: relative;top: 7px;" alt=""></a>
               <a href="index.php"><img src="images/pgm/united-kingdom.png" style="height:24px;position: relative;top: 7px;" alt=""></a>
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
      <a href="index.php" onclick="goBack()" class="btn_black-G">
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
                                 <div class="col-4 p-0 m-0 border-right">
                                    <button class="btn select_G_grid active w-100 rounded-left" onclick="filter_gridSelection('all')">
                                    <i class="img-icon all_game"></i>
                                    <br>
                                    <span class="txt_img-icon"> เกมทั้งหมด </span>
                                    </button>
                                 </div>
                                 <div class="col-4 p-0 m-0 border-left">
                                    <button class="btn select_G_grid w-100" onclick="filter_gridSelection('0')">
                                    <i class="img-icon slot"></i>
                                    <br>
                                    <span class="txt_img-icon"> สล็อต </span>
                                    </button>
                                 </div>
                                 <div class="col-4 p-0 m-0">
                                    <button class="btn select_G_grid w-100 rounded-right" onclick="filter_gridSelection('1')">
                                    <i class="img-icon freespin"></i>
                                    <br>
                                    <span class="txt_img-icon"> ฟรีสปิน </span> </button>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </center>
                     <center>
                        <div class="mt-3">
                           <img src="images/pgm/pragmaticplay.png" style="margin-bottom: -38px;margin-top: -18px;" alt="" class="joker_G">
                        </div>
                        <div class="grid-wrapper_drid container">
                           <div class="content">
                              <div class="filter_grid grid-item 0">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs25tigeryear')">
                                          <img src="images/pgm/vs25tigeryear.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Lucky New Year - Tiger Treasures</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 0">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vswayselements')">
                                          <img src="images/pgm/vswayselements.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Elemental Gems Megaways</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 1">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs10bookfallen')">
                                          <img src="images/pgm/vs10bookfallen.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Book of Fallen</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 0">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs10bblpop')">
                                          <img src="images/pgm/vs10bblpop.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Bubble Pop</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 0">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs20tweethouse')">
                                          <img src="images/pgm/vs20tweethouse.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">The Tweety House</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 1">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs20candvil')">
                                          <img src="images/pgm/vs20candvil.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Candy Village</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 1">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs20santawonder')">
                                          <img src="images/pgm/vs20santawonder.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Santa's Wonderland</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 1">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs10bxmasbnza')">
                                          <img src="images/pgm/vs10bxmasbnza.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Christmas Big Bass Bonanza</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 1">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs20pbonanza')">
                                          <img src="images/pgm/vs20pbonanza.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Pyramid Bonanza</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 1">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vswayscryscav')">
                                          <img src="images/pgm/vswayscryscav.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Crystal Caverns Megaways</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 0">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs243empcaishen')">
                                          <img src="images/pgm/vs243empcaishen.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Emperor Caishen</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 0">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs88hockattack')">
                                          <img src="images/pgm/vs88hockattack.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Hockey Attack</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 0">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vswaysbbb')">
                                          <img src="images/pgm/vswaysbbb.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Big Bass Bonanza Megaways</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 1">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs10runes')">
                                          <img src="images/pgm/vs10runes.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Gates of Valhalla</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 1">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vswaysxjuicy')">
                                          <img src="images/pgm/vswaysxjuicy.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Extra Juicy Megaways</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 1">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs40bigjuan')">
                                          <img src="images/pgm/vs40bigjuan.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Big Juan</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 0">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs20amuleteg')">
                                          <img src="images/pgm/vs20amuleteg.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Fortune of Giza</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 1">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs20smugcove')">
                                          <img src="images/pgm/vs20smugcove.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Smugglers Cove</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 1">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs20starlight')">
                                          <img src="images/pgm/vs20starlight.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Starlight Princess</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 1">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs20daydead')">
                                          <img src="images/pgm/vs20daydead.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Day of Dead</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 0">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs40wanderw')">
                                          <img src="images/pgm/vs40wanderw.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Wild Depths</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 0">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vswaysbankbonz')">
                                          <img src="images/pgm/vswaysbankbonz.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Cash Bonanza</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 1">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs20superx')">
                                          <img src="images/pgm/vs20superx.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Super X</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 1">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vswaysaztecking')">
                                          <img src="images/pgm/vswaysaztecking.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Aztec King Megaways</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 0">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs10starpirate')">
                                          <img src="images/pgm/vs10starpirate.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Star Pirates Code</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 1">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs20bermuda')">
                                          <img src="images/pgm/vs20bermuda.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Bermuda Riches</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 1">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs4096magician')">
                                          <img src="images/pgm/vs4096magician.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Magician's Secrets</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 0">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs12bbb')">
                                          <img src="images/pgm/vs12bbb.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Bigger Bass Bonanza</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 0">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs25btygold')">
                                          <img src="images/pgm/vs25btygold.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Bounty Gold</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 0">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs243chargebull')">
                                          <img src="images/pgm/vs243chargebull.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Raging Bull</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 1">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs25goldparty')">
                                          <img src="images/pgm/vs25goldparty.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Gold Party</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 0">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs25aztecking')">
                                          <img src="images/pgm/vs25aztecking.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Aztec King</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 1">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs576hokkwolf')">
                                          <img src="images/pgm/vs576hokkwolf.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Hokkaido Wolf</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 0">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs9piggybank')">
                                          <img src="images/pgm/vs9piggybank.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Piggy Bank Bills</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 1">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs20trsbox')">
                                          <img src="images/pgm/vs20trsbox.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Treasure Wild</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 1">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs20chickdrop')">
                                          <img src="images/pgm/vs20chickdrop.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Chicken Drop</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 0">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vswayswest')">
                                          <img src="images/pgm/vswayswest.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Mystic Chief</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 1">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vswaysyumyum')">
                                          <img src="images/pgm/vswaysyumyum.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Yum Yum Powerways</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 1">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vswayschilheat')">
                                          <img src="images/pgm/vswayschilheat.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Chilli Heat Megaways</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 1">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs20emptybank')">
                                          <img src="images/pgm/vs20emptybank.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Empty the Bank</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 1">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs20fparty2')">
                                          <img src="images/pgm/vs20fparty2.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Fruit Party 2</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 1">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vswayssamurai')">
                                          <img src="images/pgm/vswayssamurai.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Rise of Samurai Megaways</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 0">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs25rio')">
                                          <img src="images/pgm/vs25rio.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Heart of Rio</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 1">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs10nudgeit')">
                                          <img src="images/pgm/vs10nudgeit.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Rise of Giza PowerNudge</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 0">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs10luckcharm')">
                                          <img src="images/pgm/vs10luckcharm.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Lucky, Grace & Charm</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 1">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vswayslight')">
                                          <img src="images/pgm/vswayslight.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Lucky Lightning</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 1">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vswayslions')">
                                          <img src="images/pgm/vswayslions.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">5 Lions Megaways</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 0">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs20magicpot')">
                                          <img src="images/pgm/vs20magicpot.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">The Magic Cauldron</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 1">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs25hotfiesta')">
                                          <img src="images/pgm/vs25hotfiesta.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Hot Fiesta</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 0">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs20phoenixf')">
                                          <img src="images/pgm/vs20phoenixf.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Phoenix Forge</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 0">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs10amm')">
                                          <img src="images/pgm/vs10amm.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Amazing Money Machine</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 0">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs5drhs')">
                                          <img src="images/pgm/vs5drhs.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Dragon Hot Hold & Spin</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 0">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs25pandatemple')">
                                          <img src="images/pgm/vs25pandatemple.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Panda Fortune 2</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 0">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs20terrorv')">
                                          <img src="images/pgm/vs20terrorv.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Cash Elevator</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 1">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vswaysbufking')">
                                          <img src="images/pgm/vswaysbufking.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Buffalo King Megaways</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 0">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs10floatdrg')">
                                          <img src="images/pgm/vs10floatdrg.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Floating Dragon</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 1">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs20wildboost')">
                                          <img src="images/pgm/vs20wildboost.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Wild Booster</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 1">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs1024temuj')">
                                          <img src="images/pgm/vs1024temuj.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Temujin Treasures</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 0">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs20hburnhs')">
                                          <img src="images/pgm/vs20hburnhs.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Hot to Burn Hold and Spin</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 1">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vswayshammthor')">
                                          <img src="images/pgm/vswayshammthor.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Power of Thor Megaways</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 1">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs50juicyfr')">
                                          <img src="images/pgm/vs50juicyfr.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Juicy Fruits</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 0">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs10goldfish')">
                                          <img src="images/pgm/vs10goldfish.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Fishin Reels</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 0">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs25gldox')">
                                          <img src="images/pgm/vs25gldox.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Golden Ox</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 1">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs20olympgate')">
                                          <img src="images/pgm/vs20olympgate.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Gates of Olympus</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 1">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vswaysmadame')">
                                          <img src="images/pgm/vswaysmadame.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Madame Destiny Megaways</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 0">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs25jokerking')">
                                          <img src="images/pgm/vs25jokerking.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Joker King</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 1">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs20bonzgold')">
                                          <img src="images/pgm/vs20bonzgold.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Bonanza Gold</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 0">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs10eyestorm')">
                                          <img src="images/pgm/vs10eyestorm.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Eye of the Storm</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 0">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs20ekingrr')">
                                          <img src="images/pgm/vs20ekingrr.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Emerald King Rainbow Road</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 0">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs10bbbonanza')">
                                          <img src="images/pgm/vs10bbbonanza.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Big Bass Bonanza</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 0">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs5drmystery')">
                                          <img src="images/pgm/vs5drmystery.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Dragon Kingdom - Eyes of Fire</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 1">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs20midas')">
                                          <img src="images/pgm/vs20midas.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">The Hand of Midas</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 1">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs10wildtut')">
                                          <img src="images/pgm/vs10wildtut.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Mysterious Egypt</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 0">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs432congocash')">
                                          <img src="images/pgm/vs432congocash.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Congo Cash</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 1">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs20xmascarol')">
                                          <img src="images/pgm/vs20xmascarol.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Christmas Carol Megaways</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 0">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs25bkofkngdm')">
                                          <img src="images/pgm/vs25bkofkngdm.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Book Of Kingdoms</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 1">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs40voodoo')">
                                          <img src="images/pgm/vs40voodoo.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Voodoo Magic</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 0">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs40spartaking')">
                                          <img src="images/pgm/vs40spartaking.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Spartan King</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 0">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs10cowgold')">
                                          <img src="images/pgm/vs10cowgold.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Cowboys Gold</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 1">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs40pirgold')">
                                          <img src="images/pgm/vs40pirgold.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Pirate Gold Deluxe</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 0">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs10returndead')">
                                          <img src="images/pgm/vs10returndead.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Return of the Dead</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 0">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs20eking')">
                                          <img src="images/pgm/vs20eking.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Emerald King</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 1">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs20goldfever')">
                                          <img src="images/pgm/vs20goldfever.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Gems Bonanza</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 0">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs10mayangods')">
                                          <img src="images/pgm/vs10mayangods.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">John Hunter And The Mayan Gods</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 0">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs25walker')">
                                          <img src="images/pgm/vs25walker.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Wild Walker</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 0">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs1024dtiger')">
                                          <img src="images/pgm/vs1024dtiger.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">The Dragon Tiger</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 0">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs5ultra')">
                                          <img src="images/pgm/vs5ultra.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Ultra Hold and Spin</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 0">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs1024lionsd')">
                                          <img src="images/pgm/vs1024lionsd.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">5 Lions Dance</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 1">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vswayshive')">
                                          <img src="images/pgm/vswayshive.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Star Bounty</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 1">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs576treasures')">
                                          <img src="images/pgm/vs576treasures.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Wild Wild Riches</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 0">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs25samurai')">
                                          <img src="images/pgm/vs25samurai.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Rise of Samurai</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 1">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vswayswerewolf')">
                                          <img src="images/pgm/vswayswerewolf.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Curse of the Werewolf Megaways</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 0">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs25tigerwar')">
                                          <img src="images/pgm/vs25tigerwar.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">The Tiger Warrior</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 1">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vswaysdogs')">
                                          <img src="images/pgm/vswaysdogs.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">The Dog House Megaways</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 0">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs9aztecgemsdx')">
                                          <img src="images/pgm/vs9aztecgemsdx.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Aztec Gems Deluxe</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 0">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs20rhinoluxe')">
                                          <img src="images/pgm/vs20rhinoluxe.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Great Rhino Deluxe</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 0">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs1fufufu')">
                                          <img src="images/pgm/vs1fufufu.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Fu Fu Fu</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 0">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs20gorilla')">
                                          <img src="images/pgm/vs20gorilla.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Jungle Gorilla</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 0">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs5ultrab')">
                                          <img src="images/pgm/vs5ultrab.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Ultra Burn</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 0">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs25pyramid')">
                                          <img src="images/pgm/vs25pyramid.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Pyramid King</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 0">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs40streetracer')">
                                          <img src="images/pgm/vs40streetracer.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Street Racer</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 1">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vswaysrhino')">
                                          <img src="images/pgm/vswaysrhino.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Great Rhino Megaways</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 1">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs10bookoftut')">
                                          <img src="images/pgm/vs10bookoftut.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Book of Tut</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 1">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs20fruitparty')">
                                          <img src="images/pgm/vs20fruitparty.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Fruit Party</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 0">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs10threestar')">
                                          <img src="images/pgm/vs10threestar.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Three Star Fortune</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 0">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs75bronco')">
                                          <img src="images/pgm/vs75bronco.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Bronco Spirit</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 0">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs1money')">
                                          <img src="images/pgm/vs1money.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Money Money Money</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 1">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs40wildwest')">
                                          <img src="images/pgm/vs40wildwest.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Wild West Gold</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 0">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs40frrainbow')">
                                          <img src="images/pgm/vs40frrainbow.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Fruit Rainbow</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 0">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs5hotburn')">
                                          <img src="images/pgm/vs5hotburn.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Hot to Burn</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 0">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs117649starz')">
                                          <img src="images/pgm/vs117649starz.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Starz Megaways</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 0">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs4096mystery')">
                                          <img src="images/pgm/vs4096mystery.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Mysterious</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 0">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs1masterjoker')">
                                          <img src="images/pgm/vs1masterjoker.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Master Joker</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 0">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs243dancingpar')">
                                          <img src="images/pgm/vs243dancingpar.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Dance Party</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 0">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs25mmouse')">
                                          <img src="images/pgm/vs25mmouse.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Money Mouse</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 1">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs1600drago')">
                                          <img src="images/pgm/vs1600drago.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Drago - Jewels of Fortune</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 0">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs7776aztec')">
                                          <img src="images/pgm/vs7776aztec.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Aztec Bonanza</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 0">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs75empress')">
                                          <img src="images/pgm/vs75empress.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Golden Beauty</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 0">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs1ball')">
                                          <img src="images/pgm/vs1ball.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Lucky Dragon Ball</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 0">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs5super7')">
                                          <img src="images/pgm/vs5super7.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Super 7s </p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 0">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs8magicjourn')">
                                          <img src="images/pgm/vs8magicjourn.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Magic Journey</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 1">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs20sbxmas')">
                                          <img src="images/pgm/vs20sbxmas.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Sweet Bonanza Xmas</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 0">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs4096bufking')">
                                          <img src="images/pgm/vs4096bufking.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Buffalo King</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 0">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs5spjoker')">
                                          <img src="images/pgm/vs5spjoker.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Super Joker</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 0">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs10firestrike')">
                                          <img src="images/pgm/vs10firestrike.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Fire Strike</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 0">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs243fortseren')">
                                          <img src="images/pgm/vs243fortseren.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Greek Gods</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 0">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs20aladdinsorc')">
                                          <img src="images/pgm/vs20aladdinsorc.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Aladdin and the Sorcerer</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 1">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs20kraken')">
                                          <img src="images/pgm/vs20kraken.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Release the Kraken</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 0">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs20hercpeg')">
                                          <img src="images/pgm/vs20hercpeg.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Hercules and Pegasus</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 0">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs9hotroll')">
                                          <img src="images/pgm/vs9hotroll.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Hot Chilli</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 0">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs10vampwolf')">
                                          <img src="images/pgm/vs10vampwolf.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Vampires vs Wolves</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 0">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs20honey')">
                                          <img src="images/pgm/vs20honey.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Honey Honey Honey</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 0">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs1fortunetree')">
                                          <img src="images/pgm/vs1fortunetree.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Tree of Riches</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 0">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs25scarabqueen')">
                                          <img src="images/pgm/vs25scarabqueen.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">John Hunter and the Tomb of the Scarab Queen</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 0">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs40madwheel')">
                                          <img src="images/pgm/vs40madwheel.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">The Wild Machine</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 0">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs243mwarrior')">
                                          <img src="images/pgm/vs243mwarrior.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Monkey Warrior</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 1">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs20fruitsw')">
                                          <img src="images/pgm/vs20fruitsw.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Sweet Bonanza</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 0">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs243lionsgold')">
                                          <img src="images/pgm/vs243lionsgold.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">5 Lions Gold</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 0">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs7776secrets')">
                                          <img src="images/pgm/vs7776secrets.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Aztec Treasure</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 0">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs5trjokers')">
                                          <img src="images/pgm/vs5trjokers.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Triple Jokers</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 0">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs20chicken')">
                                          <img src="images/pgm/vs20chicken.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">The Great Chicken Escape</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 0">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs243caishien')">
                                          <img src="images/pgm/vs243caishien.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Caishen's Cash</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 0">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs20doghouse')">
                                          <img src="images/pgm/vs20doghouse.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">The Dog House</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 0">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'bndt')">
                                          <img src="images/pgm/bndt.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Dragon Tiger</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 0">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs25goldpig')">
                                          <img src="images/pgm/vs25goldpig.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Golden Pig</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 0">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'bnadvanced')">
                                          <img src="images/pgm/bnadvanced.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Dragon Bonus Baccarat</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 0">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs40pirate')">
                                          <img src="images/pgm/vs40pirate.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Pirate Gold</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 0">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs10fruity2')">
                                          <img src="images/pgm/vs10fruity2.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Extra Juicy</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 0">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs20leprexmas')">
                                          <img src="images/pgm/vs20leprexmas.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Leprechaun Carol</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 0">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs18mashang')">
                                          <img src="images/pgm/vs18mashang.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Treasure Horse</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 0">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs10egyptcls')">
                                          <img src="images/pgm/vs10egyptcls.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Ancient Egypt Classic</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 0">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs50safariking')">
                                          <img src="images/pgm/vs50safariking.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Safari King</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 0">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs20wildpix')">
                                          <img src="images/pgm/vs20wildpix.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Wild Pixies</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 0">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs5trdragons')">
                                          <img src="images/pgm/vs5trdragons.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Triple Dragons</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 0">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs20egypttrs')">
                                          <img src="images/pgm/vs20egypttrs.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Egyptian Fortunes</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 0">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs25mustang')">
                                          <img src="images/pgm/vs25mustang.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Mustang Gold</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 0">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs9chen')">
                                          <img src="images/pgm/vs9chen.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Master Chen's Fortune</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 0">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs25peking')">
                                          <img src="images/pgm/vs25peking.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Peking Luck</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 0">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs20vegasmagic')">
                                          <img src="images/pgm/vs20vegasmagic.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Vegas Magic</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 0">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs1024butterfly')">
                                          <img src="images/pgm/vs1024butterfly.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Jade Butterfly</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 0">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs10madame')">
                                          <img src="images/pgm/vs10madame.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Madame Destiny</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 0">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs20leprechaun')">
                                          <img src="images/pgm/vs20leprechaun.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Leprechaun Song</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 0">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs25asgard')">
                                          <img src="images/pgm/vs25asgard.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Asgard</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 0">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'scwolfgoldai')">
                                          <img src="images/pgm/scwolfgoldai.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Wolf Gold 1,000,000</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 0">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'scsafariai')">
                                          <img src="images/pgm/scsafariai.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Hot Safari 75,000</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 0">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'scqogai')">
                                          <img src="images/pgm/scqogai.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Queen of Gold 100,000</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 0">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'scpandai')">
                                          <img src="images/pgm/scpandai.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Panda Gold 50,000</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 0">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'scgoldrushai')">
                                          <img src="images/pgm/scgoldrushai.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Gold Rush 500,000</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 0">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'scdiamondai')">
                                          <img src="images/pgm/scdiamondai.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Diamond Strike 250,000</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 0">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'sc7piggiesai')">
                                          <img src="images/pgm/sc7piggiesai.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">7 Piggies 25,000</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 0">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs25champ')">
                                          <img src="images/pgm/vs25champ.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">The Champions</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 0">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs20rhino')">
                                          <img src="images/pgm/vs20rhino.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Great Rhino</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 0">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs243lions')">
                                          <img src="images/pgm/vs243lions.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">5 Lions</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 0">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs25davinci')">
                                          <img src="images/pgm/vs25davinci.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Da Vinci's Treasure</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 0">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs5joker')">
                                          <img src="images/pgm/vs5joker.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Joker's Jewels</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 0">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs7fire88')">
                                          <img src="images/pgm/vs7fire88.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Fire 88</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 0">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs5aztecgems')">
                                          <img src="images/pgm/vs5aztecgems.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Aztec Gems</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 0">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs15fairytale')">
                                          <img src="images/pgm/vs15fairytale.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Fairytale Fortune</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 0">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs25chilli')">
                                          <img src="images/pgm/vs25chilli.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Chilli Heat</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 0">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs1tigers')">
                                          <img src="images/pgm/vs1tigers.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Triple Tigers</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 0">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs10egypt')">
                                          <img src="images/pgm/vs10egypt.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Ancient Egypt</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 0">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs9madmonkey')">
                                          <img src="images/pgm/vs9madmonkey.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Monkey Madness</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 0">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs25newyear')">
                                          <img src="images/pgm/vs25newyear.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Lucky New Year</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 0">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'bjmb')">
                                          <img src="images/pgm/bjmb.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">American Blackjack</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 0">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs20santa')">
                                          <img src="images/pgm/vs20santa.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Santa</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 0">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs25goldrush')">
                                          <img src="images/pgm/vs25goldrush.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Gold Rush</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 0">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'cs5moneyroll')">
                                          <img src="images/pgm/cs5moneyroll.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Money Roll</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 0">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs25pandagold')">
                                          <img src="images/pgm/vs25pandagold.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Panda's Fortune</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 0">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs15diamond')">
                                          <img src="images/pgm/vs15diamond.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Diamond Strike</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 0">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs25gladiator')">
                                          <img src="images/pgm/vs25gladiator.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Wild Gladiator</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 0">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs25wildspells')">
                                          <img src="images/pgm/vs25wildspells.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Wild Spells</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 0">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs7pigs')">
                                          <img src="images/pgm/vs7pigs.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">7 Piggies</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 0">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs25vegas')">
                                          <img src="images/pgm/vs25vegas.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Vegas Nights</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 0">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs50pixie')">
                                          <img src="images/pgm/vs50pixie.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Pixie Wings</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 0">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs243fortune')">
                                          <img src="images/pgm/vs243fortune.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Caishen's Gold</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 0">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs4096jurassic')">
                                          <img src="images/pgm/vs4096jurassic.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Jurassic Giants</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 0">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs20eightdragons')">
                                          <img src="images/pgm/vs20eightdragons.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">8 Dragons</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 0">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs1dragon8')">
                                          <img src="images/pgm/vs1dragon8.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">888 Dragons</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 0">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs3train')">
                                          <img src="images/pgm/vs3train.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Gold Train</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 0">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs25kingdoms')">
                                          <img src="images/pgm/vs25kingdoms.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">3 Kingdoms - Battle of Red Cliffs</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 0">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs25wolfgold')">
                                          <img src="images/pgm/vs25wolfgold.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Wolf Gold</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 0">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'cs3irishcharms')">
                                          <img src="images/pgm/cs3irishcharms.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Irish Charms</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 0">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs25queenofgold')">
                                          <img src="images/pgm/vs25queenofgold.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Queen of Gold</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 0">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'cs5triple8gold')">
                                          <img src="images/pgm/cs5triple8gold.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">888 Gold</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 0">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs25pantherqueen')">
                                          <img src="images/pgm/vs25pantherqueen.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Panther Queen</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 0">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs1024atlantis')">
                                          <img src="images/pgm/vs1024atlantis.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Queen of Atlantis</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 0">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs25dragonkingdom')">
                                          <img src="images/pgm/vs25dragonkingdom.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Dragon Kingdom</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 0">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs50aladdin')">
                                          <img src="images/pgm/vs50aladdin.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">3 Genie Wishes</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 0">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs50hercules')">
                                          <img src="images/pgm/vs50hercules.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Hercules Son of Zeus</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 0">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs25journey')">
                                          <img src="images/pgm/vs25journey.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Journey to the West</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 0">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs50chinesecharms')">
                                          <img src="images/pgm/vs50chinesecharms.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Lucky Dragons</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 0">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs25dwarves_new')">
                                          <img src="images/pgm/vs25dwarves_new.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Dwarven Gold Deluxe</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 0">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs40beowulf')">
                                          <img src="images/pgm/vs40beowulf.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Beowulf</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 0">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs25safari')">
                                          <img src="images/pgm/vs25safari.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Hot Safari</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 0">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'rla')">
                                          <img src="images/pgm/rla.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Roulette</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 0">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vpa')">
                                          <img src="images/pgm/vpa.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Jacks or Better</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 0">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs13g')">
                                          <img src="images/pgm/vs13g.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Devil's 13</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 0">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs13ladyofmoon')">
                                          <img src="images/pgm/vs13ladyofmoon.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Lady of the Moon</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 0">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs20bl')">
                                          <img src="images/pgm/vs20bl.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Busy Bees</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 0">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs20cm')">
                                          <img src="images/pgm/vs20cm.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Sugar Rush</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 0">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs20egypt')">
                                          <img src="images/pgm/vs20egypt.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Tales of Egypt</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 0">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs20godiva')">
                                          <img src="images/pgm/vs20godiva.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Lady Godiva</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 0">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs20rome')">
                                          <img src="images/pgm/vs20rome.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Glorious Rome</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 0">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs243crystalcave')">
                                          <img src="images/pgm/vs243crystalcave.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Magic Crystals</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 0">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs25dwarves')">
                                          <img src="images/pgm/vs25dwarves.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Dwarven Gold</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 0">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs25sea')">
                                          <img src="images/pgm/vs25sea.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Great Reef</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 0">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs50amt')">
                                          <img src="images/pgm/vs50amt.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Aladdin's Treasure</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 0">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs50kingkong')">
                                          <img src="images/pgm/vs50kingkong.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Mighty Kong</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 0">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'vs7monkeys')">
                                          <img src="images/pgm/vs7monkeys.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">7 Monkeys</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 0">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'bca')">
                                          <img src="images/pgm/bca.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Baccarat</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 0">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'bjma')">
                                          <img src="images/pgm/bjma.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Multihand Blackjack</p>
                                          <div class="border_game-joker"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="filter_grid grid-item 0">
                                 <div class="bg-gradient-game_grid" style="padding-left: 3px;padding-right: 3px;">
                                    <div class="image">
                                       <a href="javascript:void(0)" onClick="popitup('pragmaticplay', 'cs3w')">
                                          <img src="images/pgm/cs3w.png" class="img-fluid rounded" style="margin-bottom: 5px;">
                                          <p class="listName_game">Diamonds are Forever 3 Lines</p>
                                          <div class="border_game-joker"></div>
                                       </a>
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