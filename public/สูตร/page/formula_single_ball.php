<?php 
  $load = new RUN();
  $response = $load->Hook('https://thank.cloud/api/FootballAnalysis/cache/FootballAnalysis.php',$post);
  $response = json_decode($response,1);
  //var_dump($response);
  //exit();
?>
  <style>
  /* Facebook : อดิเทพ เทศเทียน /*
  /* Tel : 063-163-1368 /*
  /* Line : Aditep2541 /*
  /* Date : 25/01/63 */    
  </style>
<style type="text/css">
        @font-face {
  font-family: "sukhumvit";
  src: url("assets/fonts/SukhumvitReg.html") format("woff2"), url("assets/fonts/SukhumvitReg.woff") format("woff");
  font-weight: 400;
  font-style: normal; }
@font-face {
  font-family: "sukhumvit";
  src: url("assets/fonts/SukhumvitBold.html") format("woff2"), url("assets/fonts/SukhumvitBold.woff") format("woff");
  font-weight: 700;
  font-style: normal; }

body {
    margin: 0;
    font-family: "sukhumvit";
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: #fff;
    text-align: left;
    background: url('./assets/images/ball.jpg') center top no-repeat;
    background-repeat: no-repeat;
background-position: center center;
background-attachment: fixed;
-o-background-size: 100% 100%, auto;
-moz-background-size: 100% 100%, auto;
-webkit-background-size: 100% 100%, auto;
background-size: 100% 100%, auto;
}

.oilrun {
 color: black !important;
}
a, a:hover {
    text-decoration: none;
}

.h1, h1 {
    font-size: 1.75rem;
}

.h2, h2 {
    font-size: 1.5rem;
}

.h3, h3 {
    font-size: 1.25rem;
}

.bg-black {
    background-color: #000000 !important;
}

.card {
    background-color: rgb(255 255 255) !important;
}

.head-table-color-1 {
    background-color: #1583e9;
}

.border-radius {
    border-radius: 8px;
}


.border-gold {
    background-size: 100% 1px;
    background-position: 0 0,0 100%;
    background-repeat: no-repeat;
    background-color: #000;
    border-left: 3px solid #3e251d;
    border-right: 3px solid #b89247;
    background-image: -webkit-gradient(linear,left top,right top,from(#3e251d),color-stop(25%,#8e7757),color-stop(50%,#fae0a3),color-stop(75%,#eaca85),to(#b89247));
    background-image: linear-gradient(90deg,#3e251d 0,#8e7757 25%,#fae0a3 50%,#eaca85 75%,#b89247);
}

a:hover {
    color: #deedfd !important;
    transition: .3s ease-out; 
}

.bg-gradient {
    background-image: -webkit-gradient(linear,left top,right top,from(#3e251d),color-stop(25%,#8e7757),color-stop(50%,#fae0a3),color-stop(75%,#eaca85),to(#b89247));
    background-image: linear-gradient(90deg,#000000 0,#40C6DE 25%,#40C6DE 50%,#40C6DE 75%,#000000);
}

.social-icon a {
    color: #000;
    text-decoration: none;
    font-size: 0.85rem;
    transition: .3s ease-out; 
}

.social-icon a:hover {
    opacity: .5;
}

.logo img {
    width: 100%;
    max-width: 250px;
}

.btn-gradient {
    background-image: -webkit-gradient(linear,left top,right top,from(#3e251d),color-stop(25%,#8e7757),color-stop(50%,#fae0a3),color-stop(75%,#eaca85),to(#b89247));
    background-image: linear-gradient(90deg,#000000 0,#000000  25%,#40C6DE  50%,#000000 75%,#000000);
}

.btn-gradient, .btn-gradient:focus, .btn-gradient:hover, .btn-gradient:not(:disabled):not(.disabled).active, .btn-gradient:not(:disabled):not(.disabled):active, .btn-gradient:not(:disabled):not(.disabled):active:focus {
    color: #000;
    border: 0;
}

.btn-outline-gradient {
    color: #40C6DE;
    border-color: #40C6DE;
}

.btn-outline-gradient:not(:disabled):not(.disabled).active, .btn-outline-gradient:not(:disabled):not(.disabled):active, .show>.btn-outline-gradient.dropdown-toggle {
    color: #2BB9D9 ;
    background-color: transparent;
    border-color: #40C6DE;
}

#app-header .nav-item {
    margin: 0 .5rem;
    font-size: 1rem;
}

.all-programs figure, .news figure, .advertise figure {
    border-radius: 8px;
    position: relative;
    overflow: hidden;
    padding: 5px;
    box-shadow: 0 0px 8px #dc3545;
}

.advertise figure {
    background-color: #eaca85;
}

.all-programs figure:before, .news figure:before {
    content: "";
    position: absolute;
    top: -5%;
    left: 0;
    right: 0;
    height: 105%;
    background: #a1902e;
    background: linear-gradient(135deg,#3e251d 0,#40C6DE 50%,#000000  55%,#000000  60%,#000000);
    -webkit-animation: borderAnimate 5s linear infinite;
    animation: borderAnimate 5s linear infinite;
}

.all-programs figure img, .news figure img, .advertise figure img {
    border-radius: .3rem;
    position: relative;
    z-index: 10;
}

@keyframes borderAnimate{
  0% {
    transform: scale3d(3,2,1) rotate(0deg)
  }
  to {
    transform: scale3d(3,2,1) rotate(1turn)
  }
}

.advertise img {
    border-radius: 8px;
}

/*.hrline {
    background-image: -webkit-gradient(linear,left top,right top,from(rgba(62, 37, 29, 0)),color-stop(25%,rgba(142, 119, 87, 0.5)),color-stop(50%,#fae0a3),color-stop(75%,rgba(234, 202, 133, 0.5)),to(rgba(184, 146, 71, 0)));
    background-image: linear-gradient(90deg,rgba(62, 37, 29, 0) 0,#000000 25%,#40C6DE 50%,#000000 75%,rgba(184, 146, 71, 0));
    height: 15px;
    border-radius: 35px;
}*/

iframe {
    border-radius: 8px;
}

.nav-item .nav-link {
    font-size: 15px;
    padding: .5rem;
    color: #fff;
}

.news img {
    height: 165px;
    width: 100%;
    /* border-radius: 4px; */
    /* border: 2px solid #8e7757; */
}

.news a {
    font-size: 13px;
    color: #fff;
    text-decoration: none;
}

.win-loss {
    position: absolute;
    z-index: 9999;
    top: 60%;
    text-align: center;
    width: 100%;
    color: #fff;
    text-shadow: 0 5px 10px #000;
    font-size: 18px;
}

.win-loss p {
    padding: 10px 25px;
    background-color: rgba(0, 0, 0, 0.8);
    border-radius: 35px;
    margin: 0;
    display: unset;
}

.user-online {
    position: absolute;
    z-index: 999;
    top: 5px;
    right: 5px;
    color: black;
    padding: 5px 15px;
    border-radius: .3rem;
    background-image: -webkit-gradient(linear,left top,right top,from(rgba(62, 37, 29, 1)),color-stop(25%,rgba(142, 119, 87, 1)),color-stop(50%,#fae0a3),color-stop(75%,rgba(234, 202, 133, 1)),to(rgba(184, 146, 71, 1)));
    background-image: linear-gradient(90deg,rgba(62, 37, 29, 1) 0,rgba(142, 119, 87, 0.49) 25%,#fae0a3 50%,rgba(234, 202, 133, 1) 75%,rgba(184, 146, 71,  1));
}

.user-online span {
    color: green;
}

footer {
    background-color: rgba(0, 0, 0, 0.8);
}

footer li {
    font-size: 14px;
}

footer li a {
    color: #fff;
}

.card {
    background-color: rgba(0, 0, 0, 0.5);
    border-radius: 8px;
}

.box {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    align-items: center;
}

.myCol {
    float: left;
}

.ball-grid2 {
    margin: 0 0 5px 5px;
    width: 27px;
    height: 27px;
    border-radius: 50%;
    background-color: #ffffff /*background-color: rgba(0,0,0,.2);*/;
}

@media only screen and (max-width:767px) {
    .nav-menu {margin-top:40px;}
    .nav-menu .nav-item {width: 100%; margin: 0;}
}

@media only screen and (max-width: 420px) {
    .ball-grid2 {
        margin: 0 0 5px 5px;
        width: 18px;
        height: 18px;
        border-radius: 50%;
        background-color: #ffffff;
    }
}
    .cicle-red{
        background-color : #FF0000;
        border-radius: 50%;
        width: 100%;
        height : 100%;
        color : #FF0000;
        box-shadow: 0 2px 0 0 #650013,0 5px 10px 0 rgba(0,0,0,.7);
    }
    .cicle-blue{
        background-color : #00a4ff;
        border-radius: 50%;
        width: 100%;
        height : 100%;
        color : #0000FF;
        box-shadow: 0 2px 0 0 #005789,0 5px 10px 0 rgba(0,0,0,.7);

    }
    .cicle-green{
        background-color : #00FF00;
        border-radius: 50%;
        width: 100%;
        height : 100%;
        color : #00FF00;
        box-shadow: 0 2px 0 0 #004210,0 5px 10px 0 rgba(0,0,0,.7);
    }
    .cicle-red1{
        background-color : #FF0000;
        /*    border-radius: 50%;
            width: 100%;
            height : 100%;
            color : #FF0000;*/
        box-shadow: 0 2px 0 0 #650013,0 5px 10px 0 rgba(0,0,0,.7);
    }
    .cicle-blue1{
        background-color : #00a4ff;
        /*    border-radius: 50%;
            width: 100%;
            height : 100%;
            color : #0000FF;*/
        box-shadow: 0 2px 0 0 #005789,0 5px 10px 0 rgba(0,0,0,.7);

    }
    .cicle-green1{
        background-color : #00FF00;
        /*    border-radius: 50%;
            width: 100%;
            height : 100%;
            color : #00FF00;*/
        box-shadow: 0 2px 0 0 #004210,0 5px 10px 0 rgba(0,0,0,.7);
    }
    .cicle-gray{
        background-color : #a0a0a0;
        /*border-radius: 50%;*/
        width: 100%;
        height : 100%;
        color : #00FF00;
    }
.cicle-blue {
    background-image: url(img/c-blue.html);
    background-size: cover;
}
.cicle-green {
    background-image: url(img/c-green.html);
    background-size: cover;
}
.cicle-red {
    background-image: url(img/c-red.html);
    background-size: cover;
}
.animated {
  animation-duration: 2.5s;
  animation-fill-mode: both;
  animation-iteration-count: infinite;
}

@keyframes bounce {
  0%, 20%, 50%, 80%, 100% {transform: translateY(0);}
  40% {transform: translateY(-30px);}
  60% {transform: translateY(-15px);}
}
.bounce {
  animation-name: bounce;
}

@keyframes flash {
  0%, 50%, 100% {opacity: 1;}
  25%, 75% {opacity: 0;}
}
.flash {
  animation-name: flash;
}

@keyframes pulse {
  0% {transform: scale(1);}
  50% {transform: scale(1.1);}
  100% {transform: scale(1);}
}
.pulse {
  animation-name: pulse;
  animation-duration: 1s;
}

@keyframes rubberBand {
  0% {transform: scale(1);}
  30% {transform: scaleX(1.25) scaleY(0.75);}
  40% {transform: scaleX(0.75) scaleY(1.25);}
  60% {transform: scaleX(1.15) scaleY(0.85);}
  100% {transform: scale(1);}
}
.rubberBand {
  animation-name: rubberBand;
}

@keyframes shake {
  0%, 100% {transform: translateX(0);}
  10%, 30%, 50%, 70%, 90% {transform: translateX(-10px);}
  20%, 40%, 60%, 80% {transform: translateX(10px);}
}
.shake {
  animation-name: shake;
}

@keyframes swing {
  20% {transform: rotate(15deg);}
  40% {transform: rotate(-10deg);}
  60% {transform: rotate(5deg);}
  80% {transform: rotate(-5deg);}
  100% {transform: rotate(0deg);}
}
.swing {
  transform-origin: top center;
  animation-name: swing;
}

@keyframes wobble {
  0% {transform: translateX(0%);}
  15% {transform: translateX(-25%) rotate(-5deg);}
  30% {transform: translateX(20%) rotate(3deg);}
  45% {transform: translateX(-15%) rotate(-3deg);}
  60% {transform: translateX(10%) rotate(2deg);}
  75% {transform: translateX(-5%) rotate(-1deg);}
  100% {transform: translateX(0%);}
}
.wobble {
  animation-name: wobble;
}

@keyframes flip {
  0% {transform: perspective(400px) translateZ(0) rotateY(0) scale(1);animation-timing-function: ease-out;}
  40% {transform: perspective(400px) translateZ(150px) rotateY(170deg) scale(1);animation-timing-function: ease-out;}
  50% {transform: perspective(400px) translateZ(150px) rotateY(190deg) scale(1);animation-timing-function: ease-in;}
  80% {transform: perspective(400px) translateZ(0) rotateY(360deg) scale(.95);animation-timing-function: ease-in;}
  100% {transform: perspective(400px) translateZ(0) rotateY(360deg) scale(1);animation-timing-function: ease-in;}
}
.animated.flip {
  backface-visibility: visible;
  animation-name: flip;
}

@keyframes lightSpeedIn {
  0% {transform: translateX(100%) skewX(-30deg);opacity: 0;}
  60% {transform: translateX(-20%) skewX(30deg);opacity: 1;}
  80% {transform: translateX(0%) skewX(-15deg);opacity: 1;}
  100% {transform: translateX(0%) skewX(0deg);opacity: 1;}
}
.lightSpeedIn {
  animation-name: lightSpeedIn;
  animation-timing-function: ease-out;
}

@keyframes rollIn {
  0% {opacity: 0;transform: translateX(-100%) rotate(-120deg);}
  100% {opacity: 1;transform: translateX(0px) rotate(0deg);}
}
.rollIn {
  animation-name: rollIn;
}

@keyframes rotateIn {
  0% {transform-origin: center center;transform: rotate(-200deg);opacity: 0;}
  100% {transform-origin: center center;transform: rotate(0);opacity: 1;}
}
.rotateIn {
  animation-name: rotateIn;
}

@keyframes hinge {
  0% {transform: rotate(0);transform-origin: top left;animation-timing-function: ease-in-out;}
  20%, 60% {transform: rotate(80deg);transform-origin: top left;animation-timing-function: ease-in-out;}
  40% {transform: rotate(60deg);transform-origin: top left;animation-timing-function: ease-in-out;}
  80% {transform: rotate(60deg) translateY(0);transform-origin: top left;animation-timing-function: ease-in-out;}
  100% {transform: translateY(700px);}
}
.hinge {
  margin: 20px;
  animation-name: hinge;
}
.cicle-count {
    margin-top: 50px;
    float: right;
    color: #ffffff;
    border-radius: 50%;
}
.btn-count {
    margin: 5px;
    font-size: 20px;
    font-weight: bold;
    /* text-shadow: -1px 0 black, 0 1px black, 1px 0 black, 0 -1px black; */
    cursor: pointer;
}
.list-baccaret {
  padding: 20px 0; }
  .list-baccaret .have-right-border::after {
    content: '';
    width: 1px;
    height: 100%;
    background-image: linear-gradient(to bottom, transparent 0%, #1c1c1c 48%, transparent);
    border-radius: 10px; }
  .list-baccaret .result-list {
    padding: 5px;
    border: 2px solid #c09a5e;
    border-radius: 50px;
    margin: 10px 0;
    background-image: linear-gradient(#000000 0%, #000000 48%, #1c1c1c 48%, #000000 100%); }
    @media only screen and (max-width: 767px) {
      .list-baccaret .result-list {
        padding: 10px 0px; } }
    .list-baccaret .result-list .img-content {
      padding: 0 30px;
      position: relative; }
      @media only screen and (max-width: 767px) {
        .list-baccaret .result-list .img-content {
          padding: 0 15px; } }
      .list-baccaret .result-list .img-content span {
        font-size: 22px;
        position: absolute;
        bottom: -8px;
        left: 63%;
        color: #c09a5e;
        transform: translate(-50%, 0); }
        @media only screen and (max-width: 767px) {
          .list-baccaret .result-list .img-content span {
            bottom: -15px;
            left: 70%; } }
    .list-baccaret .result-list .content {
      text-align: center; }
      .list-baccaret .result-list .content h1 {
        line-height: 0;
        color: #c09a5e;
        font-size: 2.5rem; }
        @media only screen and (max-width: 767px) {
          .list-baccaret .result-list .content h1 {
            font-size: 3.5rem;
            line-height: 0.2; } }
.room-section .room-content {
  margin: 30px 0;
  border-radius: 50px;
  background-image: linear-gradient(0deg, #000000 0%, #000000 10%, #1c1c1c 48%, #000000 100%);
  border: 2px solid #c09a5e;
  padding: 10px 30px; }
  .room-section .room-content .header .logo {
    width: 150px; }
    @media only screen and (max-width: 767px) {
      .room-section .room-content .header .logo {
        width: 145px; } }
  .room-section .room-content .header span {
    font-size: 30px;
    color: #c09a5e;
    margin-left: 15px; }
    @media only screen and (max-width: 767px) {
      .room-section .room-content .header span {
        width: 28px; } }
  .room-section .room-content .content {
    text-align: center; }
    .room-section .room-content .content .result-content {
      justify-content: center; }
      @media only screen and (max-width: 767px) {
        .room-section .room-content .content .result-content {
          justify-content: flex-start; } }
      .room-section .room-content .content .result-content .win-rate {
        display: flex; }
        .room-section .room-content .content .result-content .win-rate p {
          padding: 17px 0;
          font-size: 24px; }
          @media only screen and (max-width: 767px) {
            .room-section .room-content .content .result-content .win-rate p {
              padding: 17px 0 0; } }
        .room-section .room-content .content .result-content .win-rate .result {
         margin-left: 20px;
    font-size: 35px;
    border: 2px solid #c09a5e;
    border-radius: 50px;
    width: 110px;
    height: 75px;
    padding: 10px;
    color: #c09a5e;
}
        @media only screen and (max-width: 767px) {
          .room-section .room-content .content .result-content .win-rate {
            display: table; } }
      .room-section .room-content .content .result-content .next-round {
        display: flex;
        margin-left: 30px; }
        .room-section .room-content .content .result-content .next-round p {
          padding: 17px 0;
          font-size: 24px; }
          @media only screen and (max-width: 767px) {
            .room-section .room-content .content .result-content .next-round p {
              padding: 17px 0 0; } }
        .room-section .room-content .content .result-content .next-round .result {
          margin-left: 20px;
          font-size: 40px;
          border: 2px solid #c09a5e;
          border-radius: 50px;
          width: 110px;
          height: 75px;
          padding: 13px;
          color: #ffffff; }
          .room-section .room-content .content .result-content .next-round .result .result-text {
            width: 50px;
            height: 50px;
            background-image: linear-gradient(#980000 0%, #ff0000 48%, #9c0000 99%);
            border-radius: 50%;
            font-size: 36px; }
        @media only screen and (max-width: 767px) {
          .room-section .room-content .content .result-content .next-round {
            display: table; } }
    .room-section .room-content .content .result-table {
      padding: 0 30px; }
      @media only screen and (max-width: 767px) {
        .room-section .room-content .content .result-table {
          padding: 30px 0; } }
      .room-section .room-content .content .result-table p {
        font-size: 22px; }
      .room-section .room-content .content .result-table .result-td {
        width: 100%;
        height: 40px;
        background: #c09a5e;
        padding: 2px 4px;
        border: 1px solid #000000; }
        @media only screen and (max-width: 767px) {
          .room-section .room-content .content .result-table .result-td {
            height: 25px;
            padding: 2px 2px; } }
        .room-section .room-content .content .result-table .result-td .result-table-text {
          width: 32px;
          height: 32px;
          background-image: linear-gradient(#980000 0%, #ff0000 48%, #9c0000 99%);
          border-radius: 50%;
          font-size: 24px;
          color: #ffffff; }
          @media only screen and (max-width: 767px) {
            .room-section .room-content .content .result-table .result-td .result-table-text {
              width: 20px;
              height: 20px;
              font-size: 16px; } }
  .room-section .room-content .round-table {
    margin: 50px 0;
    height: 200px;
    overflow-y: auto; }
    .room-section .room-content .round-table table tr, .room-section .room-content .round-table table th, .room-section .room-content .round-table table td {
      color: #ffffff; }
    .room-section .room-content .round-table table td, .room-section .room-content .round-table table th {
      border-bottom: 1px solid #b6b6b6; }
    .room-section .room-content .round-table table td.bg-green {
      background-image: linear-gradient(to right, transparent 0%, #12ff00 48%, #12ff00 48%, transparent 100%); }
    .room-section .room-content .round-table table td.bg-red {
      background-image: linear-gradient(to right, transparent 0%, red 48%, red 48%, transparent 100%); }
      .right-content {
  float: right; }
  @media only screen and (max-width: 767px) {
    .right-content {
      float: none;
      text-align: right; } }
      .progress-pie-chart {
  width: 100px;
  height: 100px;
  border-radius: 50%;
  background-color: #E5E5E5;
  position: relative; }
  .progress-pie-chart#chart_1.gt-50 {
    background: red; }
  .progress-pie-chart#chart_2.gt-50 {
    background: #12ff00; }
  .progress-pie-chart#chart_3.gt-50 {
    background: #003cff; }

.ppc-progress {
  content: "";
  position: absolute;
  border-radius: 50%;
  left: calc(50% - 50px);
  top: calc(50% - 50px);
  width: 100px;
  height: 100px;
  clip: rect(0, 100px, 100px, 50px); }
  .ppc-progress .ppc-progress-fill {
    content: "";
    position: absolute;
    border-radius: 50%;
    left: calc(50% - 50px);
    top: calc(50% - 50px);
    width: 100px;
    height: 100px;
    clip: rect(0, 50px, 100px, 0);
    background: #81CE97;
    transform: rotate(60deg); }
  .gt-50 .ppc-progress {
    clip: rect(0, 50px, 100px, 0); }
    .gt-50 .ppc-progress .ppc-progress-fill {
      clip: rect(0, 100px, 100px, 50px);
      background: #E5E5E5; }

#chart_1.blue .ppc-progress-fill {
  background: red; }

#chart_2.blue .ppc-progress-fill {
  background: #12ff00; }

#chart_3.blue .ppc-progress-fill {
  background: #003cff; }

.ppc-percents {
  content: "";
  position: absolute;
  border-radius: 50%;
  left: calc(50% - 86.95652px/2);
  top: calc(50% - 86.95652px/2);
  width: 86.95652px;
  height: 86.95652px;
  background: #000000;
  text-align: center;
  display: table; }
  .ppc-percents span {
    display: block;
    font-size: 35px;
    font-weight: bold;
    color: #ffffff; }
    @media only screen and (max-width: 767px) {
      .ppc-percents span {
        font-size: 35px; } }

.pcc-percents-wrapper {
  display: table-cell;
  vertical-align: middle; }


.progress-pie-chart {
  margin: 50px auto 0; }

.btn-1 {
  border-radius: 37px;
  background-image: linear-gradient(#980000 0%, #ff0000 48%, #9c0000 99%);
  border: 2px solid #c09a5e;
  color: #ffffff;
  font-weight: bold;
  min-width: 150px;
  margin: 0 10px; }
    </style>
<style type="text/css">
    html,body {   
        padding: 0;   
        margin: 0;   
        width: 100%;   
        height: 100%;             
    } 
    .picker__list-item:hover {
    background-color: #000!important;
    border: 1px dashed #f70000
} 
    #overlay {   
        position: absolute;  
        top: 0px;   
        left: 0px;  
        background: #ccc;   
        width: 100%;   
        height: 100%;   
        opacity: .75;   
        filter: alpha(opacity=75);   
        -moz-opacity: .75;  
        z-index: 999;  
        background: #fff url(http://i.imgur.com/KUJoe.gif) 50% 50% no-repeat;
    }   
    .main-contain{
        position: absolute;  
        top: 0px;   
        left: 0px;  
        width: 100%;   
        height: 100%;   
        overflow: hidden;
    }
    </style>

<!--  -->
<style>
tr:hover {
    background-color: pink;
    cursor: pointer;
}
th:nth-child(5) {
    background: #8d7a7a; !important;
    color: white !important;
}
.card-body {
    background-color: #fff;
    } 
.table thead th {
    vertical-align: bottom;
    border-bottom: 2px solid #dee2e6;
}

.txt-red{
    color: red !important;
}
.txt-blue{
    color: blue !important;
}
/*tr:hover {
    background-color: pink;
    cursor: pointer;
}*/
th:nth-child(3) {
    background: red !important;
    color: white !important;
    text-align: center !important;
}
.table td, .table th {
    padding: .75rem;
    vertical-align: top;
    border-top: 1px solid #dee2e6;
}
.ts-1 {
    font-size: 20px !important;
    color: white;
}
.head-table-color-1 {
    background-color: #1583e9;
}
/**, ::after, ::before {
    box-sizing: content-box !important;
}*/
.row {
    margin-right: 0px !important;
    margin-left: 0px !important;
}
.img-team-analysis {
    height: 100px !important;
}
</style>
<!--  -->
<div class="container">
   <!-- <h4 style="margin-top: 10;">ทีเด็ดบอลเดี่ยว ประจำวันที่ <?php echo date("d-m-Y") ?></h4> -->
   <br>
   <div align="center">
<!--  -->
            <!-- content -->
            <div class="card border-info d-none d-md-block">
              <div class="card-body">
                <table class="table table-responsive-md">
                  <?php
                  foreach($response as $key => $data){
                    echo<<<ANYTHING
                    <thead class="thead-cs">
                      <tr>
                        <th class="head-table-color-1 ts-1" colspan="6">{$key}</th>
                      </tr>
                    </thead>
ANYTHING;
                    foreach($data as $data2){
                      echo<<<ANYTHING
                      <tbody>
                        <tr>
                          <th>{$data2["time"]}</th>
                          <th><img src="{$data2["home_img"]}" alt="Smiley face" height="42" width="42">{$data2["home"]}</th>
                          <th>{$data2["score"]}</th>
                          <th><img src="{$data2["away_img"]}" alt="Smiley face" height="42" width="42">&nbsp;{$data2["away"]} </th>
                          <th class="txt-red">{$data2["opinion_handicap"]}</th>
                          <th class="txt-blue">{$data2["opinion"]}</th>
                        </tr>
                      </tbody>
ANYTHING;
                    }
                  }
                  ?>
                </table>
                <center>
                  <a href="<?php echo $result_show['LinkBannerAllFooter'] ?>"><img src="<?php echo $result_show['BannerAllFooter'] ?>" border="1"></a>
                </center>
              </div>
            </div>
<!--  -->

   <br/>

<!--  -->
            <div class="d-md-none oilrun">
              <?php
              foreach($response as $key => $data){
                echo<<<ANYTHING
                <p class="head-color-1 text-center font-kanit">
                  <span class="ts-1">{$key}</span>
                </p>
ANYTHING;
                foreach($data as $data2){
                  echo<<<ANYTHING
                  <div class="card border-info mb-3 d-md-none">
                    <div class="card-body">
                      <div class="row text-center">
                        <div class="col-12">
                          <h4 class="font-kanit">เวลาแข่งขัน : {$data2["time"]}</h4>
                          <hr>
                        </div>
                        <div class="col-6">
                          <img src="{$data2["home_img"]}" class="img-team-analysis"  alt="">  
                        </div>
                        <div class="col-6">
                          <img src="{$data2["away_img"]}" class="img-team-analysis" height="120" alt="">  
                        </div>
                        <div class="col-sm-12">
                          <table class="table table-borderless mb-d-20">
                            <tr>
                              <th class="text-center" width="50%">{$data2["home"]}</th>

                              <th class="text-center" width="50%">{$data2["away"]}</th>
                            </tr>
                          </table>
                        </div>
                        <div class="col-12">
                          <hr>
                          <b class="text-center">{$data2["opinion_handicap"]}</b>
                          <hr>
                          <b class="">{$data2["opinion"]}</b>
                        </div>
                      </div>
                    </div>
                  </div>
ANYTHING;
                }
              }
              ?>
            </div>
<!--  -->

  </div>
</div>


