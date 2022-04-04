<?php 
/* ใช้สำหรับคอสแพทฟอมเรียกคุกกี้มาเก็บไว้สำหรับใช้ iframe ไม่สามารถใช้กับหน้าไม่ระบุตัวตนได้ */
/*
header("Access-Control-Allow-Origin: *");
session_set_cookie_params([
            'lifetime' => time() + 86400,
            'path' => '/',
            'domain' => '.xn--12cm4bi0dd1c2a0c2ch1q.com',
            'secure' => true,
            'httponly' => false,
            'samesite' => 'NONE'
        ]);
*/
session_start();
include "checkr/index.php";
include "function/database.php";
if(empty($_SESSION['user'])){
  include 'login.php';
  exit();
}else if(isset($_SESSION["genkey_login"]) and $_SESSION["user"]){
  $Query = query("SELECT * FROM user WHERE user = ?",array($_SESSION['user']));
  $Acc = $Query->fetch();
  $Query1 = query("SELECT * FROM setting WHERE id = ?",array('1'));
  $Acc1 = $Query1->fetch();
}
?>
<?php
    include 'encryption/api_casino_encode_2.php';
?>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="icon" type="image/png" href="<?php echo $Acc1["logo"] ?>" />
  <link rel="stylesheet" href="css/mdb.css">
  <link rel="stylesheet" href="css/style.css">
  <!-- <link rel="stylesheet" href="css/sidebar.css"> -->
  <link href="https://fonts.googleapis.com/css?family=Kanit&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
  <script src="js/mdb.js"></script>
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>    -->
  <title><?php echo $Acc1["titleweb"] ?></title>
  <script>
  $(document).ready(function(){
            $.ajax({
               type: "POST",
               url: "ajax/show_setting.php",
               data: '',
               success: function(data) {
                   var img_login = '';
                  $.each(data, function(i, item){
                    img_login = img_login + item.background_headers;
                  });
                  $('#headers').css('background-image', 'url("' + img_login +'")');
               }
             });
  });
  </script>
  <style>
  /* Facebook : อดิเทพ เทศเทียน /*
  /* Tel : 063-163-1368 /*
  /* Line : Aditep2541 /*
  /* Date : 25/01/63 */    
  </style>
  <style>
    h2,
    h1,
    h3,
    body,
    span,
    div {
      font-family: 'Kanit', sans-serif !important;
    }

    body {
      background-size:cover!important;
      background: linear-gradient(rgba(57, 6, 9, 0.96), rgba(57, 6, 9, 0.99)),url(https://previews.123rf.com/images/hobbitfoot/hobbitfoot1709/hobbitfoot170900696/85929960-big-win-slots-777-banner-casino-on-the-red-background-vector-illustration.jpg);
}

    .baccarat-color {
      background: linear-gradient(to bottom, #5d5b5b 0%, #181818 100%);
    }

    .baccarat-color-light {
      background-color: #ff98007a !important;
    }

    .font14 {
      font-size: 14px !important;
    }

    .navbar {
      padding: 0 0 10px 20px;
      min-height: 40px;
      background-color: rgba(0, 0, 0, 0);
      background-image: url(img/frame_logo.png), url(img/frame2.png);
      background-repeat: no-repeat, no-repeat;
      background-size: 170px 47px, 100% 100%;
    }

    a {
      color: #FFF !important;
    }

    .a2 {
      color: #FFF !important;
    }

    .a2:hover {
      color: #FFF !important;
    }

    .aug_slot {
      height: 100%;
      background-image: url('img/augslot.png');
      background-repeat: no-repeat;
      background-size: 100% 100%;
      background-position: center center;
      padding-right: 4%
    }

    .kingmaker {
      height: 100%;
      background-image: url('img/kingmaker.png');
      background-repeat: no-repeat;
      background-size: 100% 100%;
      background-position: center center;
      padding-right: 4%
    }

    .xe88 {
      height: 100%;
      background-image: url('img/xe88.png');
      background-repeat: no-repeat;
      background-size: 100% 100%;
      background-position: center center;
      padding-right: 4%
    }

    .cq9_slot {
      height: 100%;
      background-image: url('img/cq9.png');
      background-repeat: no-repeat;
      background-size: 75% 75%;
      background-position: center center;
      padding-right: 4%
    }
    .fc_slot {
      height: 100%;
      background-image: url('img/fc.png');
      background-repeat: no-repeat;
      background-size: 100% 100%;
      background-position: center center;
      padding-right: 4%
    }
    .jili_slot {
      height: 100%;
      background-image: url('img/jili.png');
      background-repeat: no-repeat;
      background-size: 75% 75%;
      background-position: center center;
      padding-right: 4%
    }

    .redtiger_slot {
      height: 100%;
      background-image: url('img/RED_TIGER_SLOT.png');
      background-repeat: no-repeat;
      background-size: 75% 75%;
      background-position: center center;
      padding-right: 4%
    }


    .itp_slot { /*close*/
      height: 100%;
      background-image: url('img/ITP_SLOT.png');
      background-repeat: no-repeat;
      background-size: 100% 100%;
      background-position: center center;
      padding-right: 4%
    }

    .ae_gaming_slot {
      height: 100%;
      background-image: url('img/AE_GAMING_SLOT.png');
      background-repeat: no-repeat;
      background-size: 100% 100%;
      background-position: center center;
      padding-right: 4%
    }     

    .bng_slot {
      height: 100%;
      background-image: url('img/BNG_SLOT.png');
      background-repeat: no-repeat;
      background-size: 75% 75%;
      background-position: center center;
      padding-right: 4%
    } 

    .playn_go_slot {
      height: 100%;
      background-image: url('img/PLAYn_GO_SLOT.png');
      background-repeat: no-repeat;
      background-size: 100% 100%;
      background-position: center center;
      padding-right: 4%
    }       

    .gioco_plus_slot {
      height: 100%;
      background-image: url('img/GiocoPlus_SLOT.png');
      background-repeat: no-repeat;
      background-size: 100% 100%;
      background-position: center center;
      padding-right: 4%
    }  

    .habanero_slot {
      height: 100%;
      background-image: url('img/HABANERO_SLOT.png');
      background-repeat: no-repeat;
      background-size: 100% 100%;
      background-position: center center;
      padding-right: 4%
    }     

    .tdedballone {
      height: 100%;
      background-image: url('img/tdedballone.png');
      background-repeat: no-repeat;
      background-size: 100% 100%;
      background-position: center center;
      padding-right: 4%
    }

    .sagame {
      height: 100%;
      background-image: url('img/sagame.png');
      background-repeat: no-repeat;
      background-size: 85% 75%;
      background-position: center center;
      padding-right: 4%
    }

    .venus {
      height: 100%;
      background-image: url('img/venus.png');
      background-repeat: no-repeat;
      background-size: 85% 75%;
      background-position: center center;
      padding-right: 4%
    }
    
    .slotpragmatic {
      height: 100%;
      background-image: url('img/slotpragmatic.png');
      background-repeat: no-repeat;
      background-size: 100% 100%;
      background-position: center center;
      padding-right: 4%
    }

    .slotmafia88 {
      height: 100%;
      background-image: url('img/slotmafia88.png');
      background-repeat: no-repeat;
      background-size: 100% 100%;
      background-position: center center;
      padding-right: 4%
    }

    .sloticonicgaming {
      height: 100%;
      background-image: url('img/sloticonicgaming.png');
      background-repeat: no-repeat;
      background-size: 85% 75%;
      background-position: center center;
      padding-right: 4%
    }

    .slotsagame {
      height: 100%;
      background-image: url('img/slotsagame.png');
      background-repeat: no-repeat;
      background-size: 85% 75%;
      background-position: center center;
      padding-right: 4%
    }

    .sexy {
      height: 100%;
      background-image: url('img/sexy.png');
      background-repeat: no-repeat;
      background-size: 85% 75%;
      background-position: center center;
      padding-right: 4%
    }

    .wm {
      height: 100%;
      background-image: url('img/wm.png');
      background-repeat: no-repeat;
      background-size: 85% 75%;
      background-position: center center;
      padding-right: 4%
    }

    .allbet {
      height: 100%;
      background-image: url('img/allbet.png');
      background-repeat: no-repeat;
      background-size: 100% 90%;
      background-position: center center;
      padding-right: 4%
    }

    .dreamgaming {
      height: 100%;
      background-image: url('img/dreamgaming.png');
      background-repeat: no-repeat;
      background-size: 100% 100%;
      background-position: center center;
      padding-right: 4%
    }

    .asiagaming {
      height: 100%;
      background-image: url('img/asiagaming.png');
      background-repeat: no-repeat;
      background-size: 100% 100%;
      background-position: center center;
      padding-right: 4%
    }
    
    .bggaming {
      height: 100%;
      background-image: url('img/biggaming.png');
      background-repeat: no-repeat;
      background-size: 100% 100%;
      background-position: center center;
      padding-right: 4%
    }

    .ebetgaming {
      height: 100%;
      background-image: url('img/ebetgaming.png');
      background-repeat: no-repeat;
      background-size: 100% 100%;
      background-position: center center;
      padding-right: 4%
    }

    .vivo {
      height: 100%;
      background-image: url('img/vivo.png');
      background-repeat: no-repeat;
      background-size: 80% 60%;
      background-position: center center;
      padding-right: 4%
    }

    .slotbetluckmak {
      height: 100%;
      background-image: url('img/betluckmak.png');
      background-repeat: no-repeat;
      background-size: 85% 75%;
      background-position: center center;
      padding-right: 4%
    }

    .slotjoker {
      height: 100%;
      background-image: url('img/slotjoker.png');
      background-repeat: no-repeat;
      background-size: 85% 75%;
      background-position: center center;
      padding-right: 4%
    }

    .slotufa {
      height: 100%;
      background-image: url('img/ufaslot.png');
      background-repeat: no-repeat;
      background-size: 100% 100%;
      background-position: center center;
      padding-right: 4%
    }

    .slotxo {
      height: 100%;
      background-image: url('img/slotxo.png');
      background-repeat: no-repeat;
      background-size: 85% 75%;
      background-position: center center;
      padding-right: 4%
    }

    .pgslot {
      height: 100%;
      background-image: url('img/pgslot.png');
      background-repeat: no-repeat;
      background-size: 100% 100%;
      background-position: center center;
      padding-right: 4%
    }

    .slotspadegaming {
      height: 100%;
      background-image: url('img/slotspadegaming.png');
      background-repeat: no-repeat;
      background-size: 100% 100%;
      background-position: center center;
      padding-right: 4%
    }

    .slotlive22 {
      height: 100%;
      background-image: url('img/live22.png');
      background-repeat: no-repeat;
      background-size: 100% 100%;
      background-position: center center;
      padding-right: 4%
    }

    .slotaskmebet {
      height: 100%;
      background-image: url('img/askmebet.png');
      background-repeat: no-repeat;
      background-size: 100% 100%;
      background-position: center center;
      padding-right: 4%
    }

    .gclub {
      height: 100%;
      background-image: url('img/gclub.png');
      background-repeat: no-repeat;
      background-size: 100% 100%;
      background-position: center center;
      padding-right: 4%
    }


    .ballteng_icon {
      height: 100%;
      background-image: url('img/ballteng.png');
      background-repeat: no-repeat;
      background-size: 100% 100%;
      background-position: center center;
      padding-right: 4%
    }

    .ballonline {
      height: 100%;
      background-image: url('img/ballonline.png');
      background-repeat: no-repeat;
      background-size: 100% 100%;
      background-position: center center;
      padding-right: 4%
    }

    .ballstep {
      height: 100%;
      background-image: url('img/ballstep.png');
      background-repeat: no-repeat;
      background-size: 100% 100%;
      background-position: center center;
      padding-right: 4%
    }
    
    .tab {
      background-image: url('img/line_.png');
      background-repeat: no-repeat;
      background-size: 2px 100%;
      background-position: center left;
      height: 100%;
      position: relative;
    }

    .frame-casino {
      padding: 2%;
      background-size: 100% 100%;
      border-radius: 10px;
      background-color: rgba(0, 0, 0, 0.3);
    }

    .nav-casino {
      display: table;
      vertical-align: middle;
      font-size: 12px;
      /*letter-spacing: 2px;*/
      margin-right: 1em;
      height: 32px;
      background-color: black;
      border-radius: 5px;
      padding: 1px;
      margin-top: 5px
    }



@media (max-width: 320px) {
    .nav-casino {
      display: table !important;
      vertical-align: middle;
      font-size: 5px !important;
      /*letter-spacing: 2px;*/
      margin-right: 1em;
      height: 32px;
      background-color: black;
      border-radius: 5px;
      padding: 1px;
      margin-top: 5px
      color: red;
    }
}
    .casino-side {
      position: fixed;
      bottom: 20px;
      left: 20px;
    }

    .btn-side {
      color: #fff;
      background: linear-gradient(to bottom, #57090e 0%, #181818 100%);
      border: 1.5px solid #b68933;
      border-radius: 50px 50px;
    }

    .btn-side:hover {
      color: #ffffffc4;
      background: linear-gradient(to bottom, #57090e 0%, #181818 100%);
      border: 1.5px solid #b68933;
      border-radius: 50px 50px;
    }

    hr.style {
      border: 0;
      height: 1px;
      background-image: -webkit-linear-gradient(left, rgba(0, 0, 0, 0), #fff, rgba(0, 0, 0, 0));
      background-image: -moz-linear-gradient(left, #fff, rgba(0, 0, 0, .75), rgba(0, 0, 0, 0));
      background-image: -ms-linear-gradient(left, #fff, #fff, rgba(0, 0, 0, 0));
      background-image: -o-linear-gradient(left, rgba(0, 0, 0, 0), rgba(0, 0, 0, .75), rgba(0, 0, 0, 0));
    }

    .casino-card {
      background: linear-gradient(to right, #38060a 0%, #5c0a10 100%);
    }

    .casino-card::after {
    position: absolute;
    top: -3.5px; bottom: -3.5px;
    left: -3.5px; right: -3.5px;
    background: linear-gradient( #b68933 , #d1c051);
    content: '';
    z-index: -1;
    border-radius: 10px;
}

    .table thead th {
    vertical-align: bottom;
    border-bottom: 1px solid rgba(255, 255, 255, 0.3);
}

.table td, .table th {
    padding: .75rem;
    vertical-align: top;
    border-top: 1px solid rgba(255, 255, 255, 0.3);
}
.swal2-popup {
background: rgba(10, 10, 10,0.8) !important;
border: solid 1px #a67a2e;
}
.swal2-title {
color: #fffb80 !important;
}
.swal2-content {
color: #fffb80 !important;
}
.swal2-confirm {
background: #E4BA42 !important;
color: black !important;
background-image: linear-gradient(to bottom, #ae8e3f, #fdf0bc, #ae8e3f) !important;
}
.swal2-icon.swal2-error [class^=swal2-x-mark-line] {
    display: block;
    position: absolute;
    top: 2.3125em;
    width: 2.9375em;
    height: .3125em;
    border-radius: .125em;
    background-color: #fffb80  !important;
}
.swal2-icon.swal2-error {
    border-color: #fffb80  !important;
}
      
      ::-webkit-scrollbar {
  width: 5px;
}

/* Track */
::-webkit-scrollbar-track {
  background: #350609;
}

/* Handle */
::-webkit-scrollbar-thumb {
  background: linear-gradient(40deg, #bd7f21 , #e6d177) !important;
}
  </style>
<!--  -->
<style>
#myBtn123 {
    display: none;
    position: fixed;
    bottom: 20px;
    right: 30px;
    z-index: 99;
    font-size: 18px;
    border: none;
    outline: none;
    background-color: red;
    color: white;
    cursor: pointer;
    padding: 15px;
    border-radius: 4px;
}
#myBtn123:hover {
  background-color: #555;
}
</style>
<style>
#myBtn {
    position: fixed;
    bottom: 400px;
    /*right: 30px;*/
    border: none;
    background-color: white;
    color: white;
    cursor: pointer;
    padding: 0px;
    border-radius: 35px;
}
#myBtn:hover {
  background-color: #555;
}
</style>
<!--  -->
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark p-2 font14 sticky-top">
  <a class="navbar-brand" href="javascript: window.history.back();"><img src="<?php echo $Acc1["logo"] ?>" height="80"></a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-333" aria-controls="navbarSupportedContent-333" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent-333">
      <ul class="navbar-nav ml-auto nav-flex-icons">
        <li class="nav-item">
          <a data-toggle="modal" data-target="#editpassword">
            <span class="nav-casino"><img src="img/user.png" style="height:25px;">&nbsp; <?= $Acc['user'] ?> &nbsp; </span>
          </a>
        </li>
        <a data-toggle="modal" data-target="#redeemcode"><span class="nav-casino"><img src="img/bitcoin.png" style="height:25px;">&nbsp; <span class="text-white" id="credit"><?= $Acc['credit'] ?> &nbsp; </span></span></a>
        <li class="nav-item">
          <a data-toggle="modal" data-target="#redeemcode" style="margin-right: 1em;">
            <img src="img/refill.png" style="height:32px;margin-top: 5px">
          </a>
        </li>
        <li class="nav-item">
          <a href="javascript: logout();" style="margin-right: 1em;">
            <img src="img/logout.png" style="height:32px;margin-top: 5px">
          </a>
        </li>
      </ul>
    </div>
  </nav>

  <?php
  error_reporting(0);
  // => /all/?page=lobby
  switch ($_GET["page"]) {
    //ball
    case 'formula_single_ball':
      require("page/formula_single_ball.php");
      break;
    case 'formula_tded_ball':
      require("page/formula_tded_ball.php");
      break;
    case 'formula_step_ball':
      require("page/formula_step_ball.php");
      break;
    case 'formula_online_ball':
      require("page/formula_online_ball.php");
      break;
    //bacara
    case 'lobby_sagame':
      require("page/lobby_sagame.php");
      break;
    case 'lobby_sexy':
      require("page/lobby_sexy.php");
      break;
    case 'lobby_wm':
      require("page/lobby_wm.php");
      break;
    case 'lobby_dg':
      require("page/lobby_dg.php");
      break;
    case 'lobby_venus':
      require("page/lobby_venus.php");
      break;
    case 'lobby_allbet':
      require("page/lobby_allbet.php");
      break;
    case 'lobby_gclub':
      require("page/lobby_gclub.php");
      break;
    case 'lobby_ebetgaming':
      require("page/lobby_ebetgaming.php");
      break;
    case 'lobby_asiagaming':
      require("page/lobby_asiagaming.php");
      break;
    case 'lobby_bggaming':
      require("page/lobby_bggaming.php");
      break;
    case 'formula_sagame':
      require("page/formula_sagame.php");
      break;
    case 'formula_sexy':
      require("page/formula_sexy.php");
      break;
    case 'formula_wm':
      require("page/formula_wm.php");
      break;
    case 'formula_dg':
      require("page/formula_dg.php");
      break;
    case 'formula_venus':
      require("page/formula_venus.php");
      break;
    case 'formula_allbet':
      require("page/formula_allbet.php");
      break;
    case 'formula_gclub':
      require("page/formula_gclub.php");
      break;
    case 'formula_ebetgaming':
      require("page/formula_ebetgaming.php");
      break;
    case 'formula_asiagaming':
      require("page/formula_asiagaming.php");
      break;
    case 'formula_bggaming':
      require("page/formula_bggaming.php");
      break;
    //slot 
    case 'lobby_betluckmak':
      require("page/lobby_betluckmak.php");
      break;
    case 'formula_betluckmak_cq9':
      require("page/formula_betluckmak_cq9.php");
      break;
    case 'formula_betluckmak_jdb':
      require("page/formula_betluckmak_jdb.php");
      break;
    case 'formula_betluckmak_jili':
      require("page/formula_betluckmak_jili.php");
      break;
    case 'formula_betluckmak_fc':
      require("page/formula_betluckmak_fc.php");
      break;
    case 'formula_slotxo':
      require("page/formula_slotxo.php");
      break;
    case 'formula_slot_ufa':
      require("page/formula_slot_ufa.php");
      break;
    case 'formula_slot_joker':
      require("page/formula_slot_joker.php");
      break;
    case 'formula_slot_pg':
      require("page/formula_slot_pg.php");
      break;
    case 'formula_slot_spadegaming':
      require("page/formula_slot_spadegaming.php");
      break;
    case 'formula_slot_sagame':
      require("page/formula_slot_sagame.php");
      break;
    case 'formula_slotpragmatic':
      require("page/formula_slotpragmatic.php");
      break;
    case 'formula_sloticonicgaming':
      require("page/formula_sloticonicgaming.php");
      break;
    case 'formula_slotmafia88':
      require("page/formula_slotmafia88.php");
      break;
    case 'formula_slotaskmebet':
      require("page/formula_slotaskmebet.php");
      break;
    case 'formula_slotlive22':
      require("page/formula_slotlive22.php");
      break;
    case 'formula_slot_augslot':
      require("page/formula_slot_augslot.php");
      break;
    case 'formula_slot_kingmaker':
      require("page/formula_slot_kingmaker.php");
      break;
    case 'formula_slot_xe88':
      require("page/formula_slot_xe88.php");
      break;
      // 
    case 'formula_slotredtiger':
      require("page/formula_slotredtiger.php");
      break;
    case 'formula_slotitp':
      require("page/formula_slotitp.php");
      break;
    case 'formula_slotaegaming':
      require("page/formula_slotaegaming.php");
      break;
    case 'formula_slotbng':
      require("page/formula_slotbng.php");
      break;
    case 'formula_slotplayngo':
      require("page/formula_slotplayngo.php");
      break;
    case 'formula_slotgiocoplus':
      require("page/formula_slotgiocoplus.php");
      break;
    case 'formula_slothabanero':
      require("page/formula_slothabanero.php");
      break;
      // 
    default:
      require("page/show.php");
      break;
  }
  ?>

<div class="modal fade" id="redeemcode" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true" >

  <div class="modal-dialog modal-md" role="document">


    <div class="modal-content" style="background-color:#5c0a10ed; border:1px solid #b68933; border-radius:10px;">
      <div class="modal-body">
        <h4 class="text-center text-white">Reedeem Code</h4>
        <span class="text-white">Code</span>
        <input class="form-control mt-2 mb-2" placeholder="RedeemCode" id="refill_code">
        <span class="text-white" style="font-size:16px;">*นำโค๊ตจาก @Line เพื่อนำมาเติมเครดิต</span>
        <center>
        <a href="javascript: refill();">
        <img src="img/refill.png" class="mt-3" height="50">
</a>
</center>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="editpassword" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true" >

  <div class="modal-dialog modal-md" role="document">

    <form id="user_editpass" method="post">
    <div class="modal-content" style="background-color:#300e05; border:1px solid #C0C0C0; border-radius:10px;">
      <div class="modal-body">
        <input type="hidden" name="username" id="username" value="<?php echo $_SESSION['user'] ?>">
        <h4 class="text-center text-white">เปลี่ยนพาส</h4>
        <span class="text-white">รหัสผ่านเดิม</span>
        <input class="form-control mt-2 mb-2" placeholder="รหัสผ่านเดิม" name="password_old" id="password_old">
        <span class="text-white">รหัสผ่านใหม่</span>
        <input class="form-control mt-2 mb-2" placeholder="รหัสผ่านใหม่" name="password_new" id="password_new">
        <span class="text-white">ยืนยันรหัสผ่านใหม่</span>
        <input class="form-control mt-2 mb-2" placeholder="ยืนยันรหัสผ่านใหม่" name="password_new_confirm" id="password_new_confirm">
        <center>
        <a href="javascript: user_editpass();" class="btn btn-primary btn-lg btn-block container waves-effect waves-light">
          ยืนยัน
        </a>
        </center>
      </div>
    </div>
  </form>
  </div>
</div>
<!-- Back to top button -->
<button id="myBtn" title="Go to top"><a href="https://line.me/R/ti/p/<?php echo $Acc1["idline"] ?>"><img src="img/line.png" width="45px" height="45px"></a></button>
<button id="myBtn123" title="Go to top"><i class="fa fa-arrow-up" aria-hidden="true"></i></button>


  <script src="js/cs.js?v=0.7"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  
</body>

</html>

<script>
$(document).ready(function() {

var btn = $('#myBtn123');


$(window).scroll(function() {
  if ($(window).scrollTop() > 20) {
    btn.style.display = "block";
    // btn.addClass('show');
  } else {
    btn.style.display = "none";
    // btn.removeClass('show');
  }
});

btn.on('click', function(e) {
  e.preventDefault();
  $('html, body').animate({scrollTop:10}, '300');
});


  });
var mybutton = document.getElementById("myBtn123");
window.onscroll = function() 
{
  scrollFunction()
};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}


</script>