<button onclick="topFunction()" style="z-index: 55; width: 35px !important; height: 35px !important;" id="myBtn" class="back-to-top " title="Go to top">
   <span class="fa-stack" style="font-size: 6px; position: relative; top: -14px; right: 5px;">
      <svg class="svg-inline--fa fa-arrow-up fa-w-14 fa-stack-1x fa-inverse" style="color: #ffffff;" aria-hidden="true" data-prefix="fas" data-icon="arrow-up" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
         <path fill="currentColor" d="M34.9 289.5l-22.2-22.2c-9.4-9.4-9.4-24.6 0-33.9L207 39c9.4-9.4 24.6-9.4 33.9 0l194.3 194.3c9.4 9.4 9.4 24.6 0 33.9L413 289.4c-9.5 9.5-25 9.3-34.3-.4L264 168.6V456c0 13.3-10.7 24-24 24h-32c-13.3 0-24-10.7-24-24V168.6L69.2 289.1c-9.3 9.8-24.8 10-34.3.4z"></path>
      </svg>
   </span>
</button>

      <script src="assets/js/jquery-3.1.0.min.js" type="text/javascript"></script>
      <script src="assets/js/popper.min.js"></script>
      <script src="assets/js/bootstrap.min.js"></script>
      <script src="assets/js/sweetalert.min.js"></script>
      <script>
         var endpoint = 'https://api.psg777.com/v1/';
         var gameurl = 'https://777.betflix777.com/play/';
         var user_token = null;
         var login_token = null;
         
         
         function goBack() {
             window.location=document.referrer;
         }
         
         function goMain() {
             window.location.href = "/"
         }
         
         function popitup(game, gamecode='none', w=1024, h=600) {
         
             if(user_token == null || login_token == null)
             {
                 return;
             }
         
             // var left = (screen.width / 2) - (w / 2);
             // var top = (screen.height / 2) - (h / 2);
             // targetWin = window.open(gameurl + game + "/" + user_token + "/" + login_token + "/" + gamecode + "/" + 'thai', 'BETFLIK : ' + game, 'fullscreen=yes, toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width=' + w + ', height=' + h + ', top=' + top + ', left=' + left, true);
         
             window.open(gameurl + game + "/" + user_token + "/" + login_token + "/" + gamecode + "/" + 'thai', '_blank').focus();
         }
         
         document.addEventListener('touchmove', function (event) {
             event = event.originalEvent || event;
             if (event.scale !== 1) {
                 event.preventDefault();
             }
         }, false);
         
         if (/iPad|iPhone|iPod/.test(navigator.userAgent)) {
             window.document.addEventListener('touchmove', e => {
                 if (e.scale !== 1) {
                     e.preventDefault();
                 }
             }, {
                 passive: false
             });
         }
         
         
                 function pullGeneral()
             {
                 let endpoint = 'https://api.psg777.com/v1/general';
                 $.ajax({
                     type: "post",
                     url: endpoint,
                     data: {},
                     dataType: "json",
                     headers: {
                         auth: '539664nexk39rot7',
                     },
                     success: function (response) {
                         if (response.status != 'success') {
                             window.location.href = "/logout"
                         }
         
                         $("#credit").html(response.credit)
                         $("#username").html(response.username)
                         $("#caption").html(response.headNews.msg)
                         user_token = response.user_token;
                         login_token = response.login_token;
                     }
                 });
             }
         
             setInterval("pullGeneral()", 30000);
         
             $(document).ready(function () {
                 pullGeneral();
         
                 $("#refresh").on('click', function() {
                     $('.refresh').addClass('rotateRefresh').delay(1000).queue(function(next){
                         $(this).removeClass('rotateRefresh');
                         next();
                     });
                 });
             });
         
      </script>
      <script src="assets/js/preloader.js?v=0003"></script>
      <script>
         var mybutton = document.getElementById("myBtn");
         
         window.onscroll = function () {
             scrollFunction()
         };
         
         function scrollFunction() {
             if (document.body.scrollTop > 200 || document.documentElement.scrollTop > 200) {
                 mybutton.style.display = "block";
             } else {
                 mybutton.style.display = "none";
             }
         }
         
         function topFunction() {
             document.body.scrollTop = 0;
             document.documentElement.scrollTop = 0;
         }
      </script>
      <script src="assets/js/filter_gridSelection.js"></script>
   </body>
</html>