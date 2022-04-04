<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ $title }} | {{ config('sximo.cnf_appname') }}</title>
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">

    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
    <meta name="description" content="">
    <meta name="keywords" content="" />
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('img/fav.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('img/fav.png')}}" sizes="32x32">
    <link rel="shortcut icon" href="{{ asset('img/fav.png')}}">
    <script src="https://kit.fontawesome.com/d97b87339f.js" crossorigin="anonymous"></script>

    <style type="text/css">
        /* You just need to get this field */

        .copy-input:focus {
            outline: none;
        }

        .copy-btn {
            width: 40px;
            background-color: #eaeaeb;
            font-size: 18px;
            padding: 6px 9px;
            border-radius: 5px;
            border: none;
            color: #6c6c6c;
            margin-left: -50px;
            transition: all .4s;
        }

        .copy-btn:hover {
            color: #1a1a1a;
            cursor: pointer;
        }

        .copy-btn:focus {
            outline: none;
        }

        .copied {
            font-family:'Montserrat', sans-serif;
            width: 150px;
            display: none;
            position: fixed;
            bottom: 50px;
            left: 0;
            right: 0;
            margin: auto;
            color: #c0c0c0;
            padding: 15px 15px;
            background-color: #3c3c3c;
            border-radius: 5px;
        }

        .fullbg-white {
            background: #fdfdfe !important;
        }

        .bg-white {
            background: #fff !important;
        }

        .text-black {
            color: #000 !important;
        }

        .text-main {
            color: #e10e7f !important;
        }

        .border-none {
            border: none !important;
        }

        .box-shadow-none {
            box-shadow: none !important;
        }

        .padding-none {
            padding: 0 !important;
        }

        .padding-15 {
            padding: 15px !important;
        }

        .font-weight-700 {
            font-weight: 700;
        }

        .font-size-12 {
            font-size: 12px;
        }

        .app-bottom-menu-inherit {
            display: flex !important;
            overflow-x: auto !important;
            flex-wrap: nowrap !important;
            margin-bottom: 0 !important;
            padding-left: 36px !important;
        }

        .item-inherit {
            width: 20% !important;
            flex: 0 0 auto;
        }

        .sub-header {
            font-size: 16px !important;
            font-weight: lighter !important;
            color: #86909d !important;
        }

        .text-align-right {
            text-align: right;
        }

        .header-right-border {
            display: flex;
            border-style: solid;
            border-width: 1px 0 1px 1px;
            border-radius: 10px 0 0 10px;
            border-color: #e10e7f;
            box-shadow: 0 2px 5px 1px rgb(64 60 67/16%);
        }

        .header-left-border {
            padding: 2px;
            background: white;
            border-style: solid;
            border-width: 1px;
            border-radius: 16px;
            border-color: #e10e7f;
            box-shadow: 0 2px 5px 1px rgb(64 60 67/16%);
        }

        @media screen and (min-width: 768px) {
            .item-inherit {
                width: 10% !important;
            }
        }

        /* You just need to get this field */
    </style>
    <!-- CSS Files -->

    <!-- CSS Just for demo purpose, don't include it in your project
    <script src="{{ asset('')}}assets/plugins/moment/moment.js"></script>
    <script type="text/javascript" src="{{ asset('assets/js/sximo.min.js') }}"></script>-->

</head>

<body>
    <!-- Google Tag Manager (noscript) -->
    <!-- @include('layouts.default.snow') -->
    @if(strtok($_SERVER['REQUEST_URI'],'?')!='/games')
    <div id="fullbg"></div>
    @else
    <div id="fullbg" class="fullbg-white"></div>
    @endif
    <!-- loader -->
    <!-- <div id="loader">

        <div id="lottie"></div>
    </div> -->


    <!-- * loader -->

    <!-- App Header -->
    @if(strtok($_SERVER['REQUEST_URI'],'?')!='/games')
    @include('layouts.default.header')
    @else
    @include('layouts.default.headergamelist')
    @endif

    <!-- * App Header -->

    <!-- App Capsule -->




    <div id="notification-11" class="notification-box">
        <div class="notification-dialog ios-style">
            <div class="notification-header">
                <div class="in">
                    <strong>การแจ้งเตือนไม่สำเร็จ</strong>
                </div>
                <div class="right">
                    <span>เมื่อสักครู่นี้</span>
                    <a href="#" class="close-button">
                        <ion-icon name="close-circle"></ion-icon>
                    </a>
                </div>
            </div>
            <div class="notification-content">
                <div class="in">
                    <h3 class="subtitle">ขอโทษค่ะระบบไม่สามารถทำรายการได้</h3>
                    <div class="text" id="noti-error-msg"></div>
                </div>
                <div class="icon-box text-danger">
                    <ion-icon name="alert-circle-outline"></ion-icon>
                </div>
            </div>
            <div class="notification-footer">
                <a href="#" class="notification-button">
                    <ion-icon name="card-outline"></ion-icon>
                    ยกเลิก
                </a>
            </div>
        </div>
    </div>

    <div id="notification-12" class="notification-box">
        <div class="notification-dialog ios-style">
            <div class="notification-header">
                <div class="in">
                    <strong>การแจ้งเตือนสำเร็จ</strong>
                </div>
                <div class="right">
                    <span>เมื่อสักครู่นี้</span>
                    <a href="#" class="close-button">
                        <ion-icon name="close-circle"></ion-icon>
                    </a>
                </div>
            </div>
            <div class="notification-content">
                <div class="in">
                    <h3 class="subtitle" id="noti-success-msg">คุณทำรายการสำเร็จ
                    </h3>
                </div>
                <div class="icon-box text-success">
                    <ion-icon name="checkmark-circle-outline"></ion-icon>
                </div>
            </div>
        </div>
    </div>
    <div id="appCapsule" style="<?php echo strtok($_SERVER['REQUEST_URI'],'?') !='/games' ?'' :'padding: 28px 0; margin: initial'; ?>">
        @include($pages)
        <!-- Wallet Card -->

        <!-- Wallet Card -->
        <!-- Default Action Sheet -->
        @include('layouts.default.modal')
        <!-- * Default Action Sheet -->
        <!-- Default Action Sheet Inset -->

        <!-- Monthly Bills -->
        <!-- * Monthly Bills -->
        <!-- app footer -->
        <!-- * app footer -->
    </div>
    <!-- * App Capsule -->
    <!-- App Bottom Menu -->
    @if(strtok($_SERVER['REQUEST_URI'],'?')!='/games')
    @include('layouts.default.bottommenu')
    @else
    @include('layouts.default.bottommenugamelist')
    @endif
    <!-- * App Bottom Menu -->
    <!-- App Sidebar -->
    @include('layouts.default.sidebar')
    <!-- * App Sidebar -->
    <!-- ///////////// Js Files //////////////////// <footer class="row">
        
    </footer>  -->

    <!-- Jquery -->
    <script src="{{ asset('js/lib/jquery-3.4.1.min.js')}}"></script>
    <!-- Bootstrap-->
    <script src="{{ asset('js/lib/popper.min.js')}}"></script>
    <script src="{{ asset('js/lib/bootstrap.min.js')}}"></script>
    <!-- Ionicons -->
    <script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script>
    <!-- Owl Carousel -->
    <script src="{{ asset('js/plugins/owl-carousel/owl.carousel.min.js')}}"></script>
    <!-- Base Js File -->
    <script src="{{ asset('js/base.js')}}"></script>
    <!-- <script type="text/javascript" src="{{ asset('frontend/default/js/default.min.js') }}"></script>-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/forge/0.8.2/forge.all.min.js"></script>


    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-F03DH443QQ"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config','G-F03DH443QQ');
    </script>




    <script>
        function copy() {
            var copyText = document.getElementById("copyClipboard");
            copyText.select();
            copyText.setSelectionRange(0, 99999);
            document.execCommand("copy");

            $('#copied-success').fadeIn(800);
            $('#copied-success').fadeOut(800);
        }


        /*$("#genqr").click(function() {

            var amount =  $('#amount').val();

         if($.isNumeric(amount)&&amount > 199){
                $("#genqr").prop('disabled', true);

               var plainText = "username=MORADOK88&service_id=100&amount="+amount;

               var secretKey = "295d4b2c-a03f-4d1b-acc4-a3da8cd769a5";

                var hmac = forge.hmac.create();  
                    hmac.start('sha256', secretKey);
                    hmac.update(plainText);  
               var hashText = hmac.digest().toHex();  

           
                $.ajax({
                  url: "https://ambpayment.cola168.com/ambpayment/merchant/v2/init-payment",
                  method: "POST",
                  data: { "amount":amount,"service_id":100,"username":"MORADOK88","payer_account_no":"{{ $user->account_number }}","payer_account_name":"{{ $user->first_name.''.$user->last_name }}","signature":hashText},
                  success: function (res) { 
                            
                         //   console.log(res);
                            if(res.message=="success"){

                                $('#imgqr').attr("src", res.result.value);

                                $('#qr_amount').text(res.result.amount);
                                $('#qr_orderid').text(res.result.order);
                                $('#qr_tr').text(res.result.id);
                                $('#actionSheetAlertscanqrcode').modal('show');
                                $('#actionSheetAlertqrcode').modal('hide');
                                $.ajax({
                                        dataType : "json",
                                        type : "POST",
                                        data : { "date_time":"<?php echo date('d/m/Y H:i'); ?>","user_id":"{{ $user->id }}","amount":res.result.amount,"status":"wait","bankweb_id":"4","trans_id":res.result.id,"ac_number":"QR code","channel":"QR","details":res.result.order }, 
                                        url :'https://play.moradok88.com/sximoapi?module=deposit', 
                                        headers : {"Authorization": "Basic " + btoa("admin@moradok88.com:hWF6tn-sCMMp-b3zUDn-UZQ8w")}, 
                                        success : function(data){
                                       //     console.log(data);
                                    } 
                                });
                            }
                    }
                });
            }else{
                toastbox('toast-16', 3000);
                
            }
            return false; 
        });*/

        $("#gendot").click(function() {

            var amount = $('#amountdot').val();

            if (amount < 1) {

                notification('notification-16', 10000);
                $("#gendot").prop('disabled', false);

            } else {
                $("#gendot").prop('disabled', true);

                var dot = Math.floor(Math.random() * (98 - 10 + 1)) + 10;

                $('#dot_amount').text(amount);
                $('#dot_dot').text(dot);
                $('#actionSheetAlertdotdeposit').modal('show');
                $('#actionSheetAlertdot').modal('hide');
                $.ajax({
                    dataType: "json",
                    type: "POST",
                    data: {
                        "date_time": "<?php echo date('d/m/Y H:i'); ?>",
                        "user_id": "{{ $user->id }}",
                        "amount": amount +'.' + dot,
                        "status": "wait",
                        "bankweb_id": "3",
                        "trans_id": "0",
                        "ac_number": "แบบทศนิยม",
                        "channel": "dot",
                        "details": "แบบทศนิยม"
                    },
                    url:'{{ secure_url('') }}/sximoapi?module=deposit',
                    headers: {
                        "Authorization": "Basic " + btoa("admin@moradok88.com:hWF6tn-sCMMp-b3zUDn-UZQ8w")
                    },
                    success: function(data) {
                        //     console.log(data);
                        $("#gendot").prop('disabled', false);
                    }
                });
            }

            return false;
        });


        $("#dotamount label").click(function() {
            var sumamount;
            sumamount = parseInt($('#amountdot').val()) + parseInt($("button[name='addamount']:checked").val());

            $('#amountdot').val(sumamount);

        });

        function addwithdraw(userid) {

            $('#withdrawbutton').prop("disabled", true);
            $.ajax({
                dataType: "json",
                type: "POST",
                data: {
                    "userid": userid
                },
                url:'{{ secure_url('/withdraw/addwithdraw') }}',
                success: function(data) {
                    //     console.log(data);

                    if (data.status =='error') {
                        $('#noti-error-msg').html(data.message);
                        notification('notification-11', 3000);
                        $('#withdrawbutton').prop("disabled", false);
                    } else if (data.status =='success') {
                        $('#noti-success-msg').html(data.message);
                        notification('notification-12', 3000);
                        setTimeout(function() {
                            window.location ='{{ secure_url('') }}';
                        }, 3000);

                    }
                }

            });
        }


        function removepro(userid) {
            $('#removeprobutt').prop("disabled", true);
            $.ajax({
                dataType: "json",
                type: "POST",
                data: {
                    "userid": userid
                },
                url:'{{ secure_url('/userpromotion/removepro') }}',
                success: function(data) {
                    //     console.log(data);

                    if (data.status =='error') {
                        $('#noti-error-msg').html(data.message);
                        notification('notification-11', 3000);
                        $('#removeprobutt').prop("disabled", false);
                    } else if (data.status =='success') {
                        $('#noti-success-msg').html(data.message);
                        notification('notification-12', 3000);
                        setTimeout(function() {
                            window.location ='{{ secure_url('') }}';
                        }, 3000);
                    }
                }
            });
        }

        function addpromotionauto(agree) {
            if (agree === 0) {

                notification('notification-10', 3000);
                $('#proautoswitch').prop('checked', false);

            } else {

                $.ajax({
                    dataType: "json",
                    type: "POST",
                    url:'{{ secure_url('/userpromotion/addpromotionauto') }}',
                    success: function(data) {
                        //     console.log(data);

                        if (data.status =='error') {
                            $('#noti-error-msg').html(data.message);
                            notification('notification-11', 3000);
                            $('#proautoswitch').prop('checked', false);
                        } else if (data.status =='success') {
                            $('#noti-success-msg').html(data.message);
                            notification('notification-12', 3000);
                            $('#proautoswitch').prop('checked', true);
                        }
                    }
                });

            }

        }

        @if($pages =='layouts.default.template.shop')

        function buyproduct(prodid) {
            $.ajax({
                dataType: "json",
                type: "POST",
                data: {
                    "productid": prodid
                },
                url:'{{ secure_url('/diamondshop/buyproduct') }}',
                success: function(data) {
                    //     console.log(data);

                    if (data.status =='error') {
                        $('#noti-error-msg').html(data.message);
                        notification('notification-11', 3000);
                        $('#withdrawbutton').prop("disabled", false);
                    } else if (data.status =='success') {
                        $('#noti-success-msg').html(data.message);
                        notification('notification-12', 3000);

                    }
                }
            });

        }
        @endif


        @if($pages =='layouts.default.template.cashback')
        $("#claimwinloss").click(function() {


            $('#claimwinloss').prop("disabled", true);
            $.ajax({
                dataType: "json",
                type: "POST",
                url:'{{ secure_url('/userturnover/addclaimwinloss') }}',
                success: function(data) {
                    //     console.log(data);

                    if (data.status =='error') {
                        $('#noti-error-msg').html(data.message);
                        notification('notification-11', 3000);
                    } else if (data.status =='success') {
                        $('#claim-success-msg').html(data.message);
                        toastbox('toast-3');
                        $('#wlreturn').html('0.00');
                        setTimeout(function() {
                            window.location = "{{ secure_url('/cashback') }}";
                        }, 3000);
                    }
                }
            });
        });
        @endif

        @if($pages =='layouts.default.template.gamelist')

        $(document).ready(function() {

            $(".filter-btn").on("click", eventTriggercat);
            $(".filter-btntype").on("click", eventTriggertype);

            function eventTriggercat() {

                var getFilterName = $(this).data("filter");
                var isClassAll = $(this).hasClass("all");
                if (isClassAll != true) {
                    //   $(".gamerows .partners:not([data-gametype='"+getFilterName+"'])").hide(); 
                    // $(".gamerows .partners[data-gametype='"+getFilterName+"']").show();

                    $(".gamerows .games:not([data-category*='" + getFilterName + "'])").hide();
                    $(".gamerows .games[data-category*='" + getFilterName + "']").show();
                } else {
                    $(".gamerows div").show();
                }
            }

            function eventTriggertype() {

                var getFilterName = $(this).data("filter");
                var isClassAll = $(this).hasClass("all");
                if (isClassAll != true) {
                    //   $(".gamerows .partners:not([data-gametype='"+getFilterName+"'])").hide(); 
                    // $(".gamerows .partners[data-gametype='"+getFilterName+"']").show();

                    $(".gamerows .games:not([data-gametype*='" + getFilterName + "'])").hide();
                    $(".gamerows .games[data-gametype*='" + getFilterName + "']").show();
                } else {
                    $(".gamerows div").show();
                }
            }


            var elementPosition = $('.game-nav').offset();

            $(window).scroll(function() {
                if ($(window).scrollTop() > elementPosition.top) {
                    $('.game-nav').css('position','fixed').css('top','70px').css('width','16.66667%');
                } else {
                    $('.game-nav').css('position','').css('top','').css('width','');
                }
            });
        });

        @endif
    </script>
    <!-- <script>
        var animationData = {
            "v": "5.5.2",
            "fr": 120,
            "ip": 0,
            "op": 220,
            "w": 192,
            "h": 192,
            "nm": "Comp 1",
            "ddd": 0,
            "assets": [],
            "layers": [{
                "ddd": 0,
                "ind": 1,
                "ty": 4,
                "nm": "Loader 3 Outlines",
                "sr": 1,
                "ks": {
                    "o": {
                        "a": 0,
                        "k": 100,
                        "ix": 11
                    },
                    "r": {
                        "a": 0,
                        "k": 0,
                        "ix": 10
                    },
                    "p": {
                        "a": 1,
                        "k": [{
                            "i": {
                                "x": 0.667,
                                "y": 1
                            },
                            "o": {
                                "x": 0.333,
                                "y": 0
                            },
                            "t": 0,
                            "s": [96.001, 96.001, 0],
                            "to": [2.5, 0, 0],
                            "ti": [0.833, 0, 0]
                        }, {
                            "i": {
                                "x": 0.667,
                                "y": 1
                            },
                            "o": {
                                "x": 0.333,
                                "y": 0
                            },
                            "t": 40,
                            "s": [111.001, 96.001, 0],
                            "to": [-0.833, 0, 0],
                            "ti": [2.5, 0, 0]
                        }, {
                            "i": {
                                "x": 0.667,
                                "y": 1
                            },
                            "o": {
                                "x": 0.167,
                                "y": 0
                            },
                            "t": 70,
                            "s": [91.001, 96.001, 0],
                            "to": [-2.5, 0, 0],
                            "ti": [2.5, 0, 0]
                        }, {
                            "i": {
                                "x": 0.667,
                                "y": 1
                            },
                            "o": {
                                "x": 0.333,
                                "y": 0
                            },
                            "t": 100,
                            "s": [96.001, 96.001, 0],
                            "to": [-2.5, 0, 0],
                            "ti": [-1.667, 0, 0]
                        }, {
                            "i": {
                                "x": 0.667,
                                "y": 1
                            },
                            "o": {
                                "x": 0.333,
                                "y": 0
                            },
                            "t": 130,
                            "s": [76.001, 96.001, 0],
                            "to": [1.667, 0, 0],
                            "ti": [-2.5, 0, 0]
                        }, {
                            "i": {
                                "x": 0.667,
                                "y": 1
                            },
                            "o": {
                                "x": 0.333,
                                "y": 0
                            },
                            "t": 160,
                            "s": [106.001, 96.001, 0],
                            "to": [2.5, 0, 0],
                            "ti": [1.667, 0, 0]
                        }, {
                            "i": {
                                "x": 0.667,
                                "y": 1
                            },
                            "o": {
                                "x": 0.167,
                                "y": 0
                            },
                            "t": 190,
                            "s": [91.001, 96.001, 0],
                            "to": [-1.667, 0, 0],
                            "ti": [-0.833, 0, 0]
                        }, {
                            "t": 220,
                            "s": [96.001, 96.001, 0]
                        }],
                        "ix": 2
                    },
                    "a": {
                        "a": 0,
                        "k": [12, 12, 0],
                        "ix": 1
                    },
                    "s": {
                        "a": 0,
                        "k": [575, 575, 100],
                        "ix": 6
                    }
                },
                "ao": 0,
                "shapes": [{
                    "ty": "gr",
                    "it": [{
                        "ind": 0,
                        "ty": "sh",
                        "ix": 1,
                        "ks": {
                            "a": 0,
                            "k": {
                                "i": [
                                    [0, 0],
                                    [3.906, 3.905]
                                ],
                                "o": [
                                    [-3.905, 3.905],
                                    [0, 0]
                                ],
                                "v": [
                                    [7.072, -1.952],
                                    [-7.072, -1.952]
                                ],
                                "c": false
                            },
                            "ix": 2
                        },
                        "nm": "Path 1",
                        "mn": "ADBE Vector Shape - Group",
                        "hd": false
                    }, {
                        "ty": "tm",
                        "s": {
                            "a": 0,
                            "k": 0,
                            "ix": 1
                        },
                        "e": {
                            "a": 0,
                            "k": 100,
                            "ix": 2
                        },
                        "o": {
                            "a": 0,
                            "k": 0,
                            "ix": 3
                        },
                        "m": 1,
                        "ix": 2,
                        "nm": "Trim Paths 1",
                        "mn": "ADBE Vector Filter - Trim",
                        "hd": false
                    }, {
                        "ty": "st",
                        "c": {
                            "a": 0,
                            "k": [0, 0, 0, 1],
                            "ix": 3
                        },
                        "o": {
                            "a": 0,
                            "k": 100,
                            "ix": 4
                        },
                        "w": {
                            "a": 0,
                            "k": 2,
                            "ix": 5
                        },
                        "lc": 2,
                        "lj": 1,
                        "ml": 10,
                        "bm": 0,
                        "nm": "Stroke 1",
                        "mn": "ADBE Vector Graphic - Stroke",
                        "hd": false
                    }, {
                        "ty": "tr",
                        "p": {
                            "a": 0,
                            "k": [12, 12.024],
                            "ix": 2
                        },
                        "a": {
                            "a": 0,
                            "k": [0, -9],
                            "ix": 1
                        },
                        "s": {
                            "a": 0,
                            "k": [100, 100],
                            "ix": 3
                        },
                        "r": {
                            "a": 1,
                            "k": [{
                                "i": {
                                    "x": [0.3],
                                    "y": [1]
                                },
                                "o": {
                                    "x": [0.5],
                                    "y": [0]
                                },
                                "t": 0,
                                "s": [0]
                            }, {
                                "i": {
                                    "x": [0.3],
                                    "y": [1]
                                },
                                "o": {
                                    "x": [0.5],
                                    "y": [0]
                                },
                                "t": 40,
                                "s": [380]
                            }, {
                                "i": {
                                    "x": [0.3],
                                    "y": [1]
                                },
                                "o": {
                                    "x": [0.5],
                                    "y": [0]
                                },
                                "t": 70,
                                "s": [355]
                            }, {
                                "i": {
                                    "x": [0.3],
                                    "y": [1]
                                },
                                "o": {
                                    "x": [0.5],
                                    "y": [0]
                                },
                                "t": 100,
                                "s": [360]
                            }, {
                                "i": {
                                    "x": [0.3],
                                    "y": [1]
                                },
                                "o": {
                                    "x": [0.5],
                                    "y": [0]
                                },
                                "t": 130,
                                "s": [-10]
                            }, {
                                "i": {
                                    "x": [0.3],
                                    "y": [1]
                                },
                                "o": {
                                    "x": [0.5],
                                    "y": [0]
                                },
                                "t": 160,
                                "s": [370]
                            }, {
                                "i": {
                                    "x": [0.3],
                                    "y": [1]
                                },
                                "o": {
                                    "x": [0.5],
                                    "y": [0]
                                },
                                "t": 190,
                                "s": [355]
                            }, {
                                "t": 220,
                                "s": [360]
                            }],
                            "ix": 6
                        },
                        "o": {
                            "a": 0,
                            "k": 100,
                            "ix": 7
                        },
                        "sk": {
                            "a": 0,
                            "k": 0,
                            "ix": 4
                        },
                        "sa": {
                            "a": 0,
                            "k": 0,
                            "ix": 5
                        },
                        "nm": "Transform"
                    }],
                    "nm": "Group 2",
                    "np": 3,
                    "cix": 2,
                    "bm": 0,
                    "ix": 1,
                    "mn": "ADBE Vector Group",
                    "hd": false
                }, {
                    "ty": "gr",
                    "it": [{
                        "ind": 0,
                        "ty": "sh",
                        "ix": 1,
                        "ks": {
                            "a": 0,
                            "k": {
                                "i": [
                                    [3.905, -3.905],
                                    [3.906, 3.905],
                                    [-3.904, 3.906],
                                    [-3.905, -3.904]
                                ],
                                "o": [
                                    [-3.905, 3.905],
                                    [-3.904, -3.905],
                                    [3.906, -3.904],
                                    [3.905, 3.906]
                                ],
                                "v": [
                                    [7.071, 7.071],
                                    [-7.072, 7.071],
                                    [-7.072, -7.072],
                                    [7.071, -7.072]
                                ],
                                "c": true
                            },
                            "ix": 2
                        },
                        "nm": "Path 1",
                        "mn": "ADBE Vector Shape - Group",
                        "hd": false
                    }, {
                        "ty": "st",
                        "c": {
                            "a": 0,
                            "k": [0, 0, 0, 1],
                            "ix": 3
                        },
                        "o": {
                            "a": 0,
                            "k": 100,
                            "ix": 4
                        },
                        "w": {
                            "a": 0,
                            "k": 2,
                            "ix": 5
                        },
                        "lc": 1,
                        "lj": 1,
                        "ml": 10,
                        "bm": 0,
                        "nm": "Stroke 1",
                        "mn": "ADBE Vector Graphic - Stroke",
                        "hd": false
                    }, {
                        "ty": "tr",
                        "p": {
                            "a": 0,
                            "k": [11.979, 11.979],
                            "ix": 2
                        },
                        "a": {
                            "a": 0,
                            "k": [-0.022, -0.022],
                            "ix": 1
                        },
                        "s": {
                            "a": 0,
                            "k": [100, 100],
                            "ix": 3
                        },
                        "r": {
                            "a": 0,
                            "k": 0,
                            "ix": 6
                        },
                        "o": {
                            "a": 0,
                            "k": 20,
                            "ix": 7
                        },
                        "sk": {
                            "a": 0,
                            "k": 0,
                            "ix": 4
                        },
                        "sa": {
                            "a": 0,
                            "k": 0,
                            "ix": 5
                        },
                        "nm": "Transform"
                    }],
                    "nm": "Group 3",
                    "np": 2,
                    "cix": 2,
                    "bm": 0,
                    "ix": 2,
                    "mn": "ADBE Vector Group",
                    "hd": false
                }],
                "ip": 0,
                "op": 220,
                "st": 0,
                "bm": 0
            }],
            "markers": []
        };
        var params = {
            container: document.getElementById('lottie'),
            renderer:'svg',
            loop: true,
            autoplay: true,
            animationData: animationData
        };

        var anim;

        anim = lottie.loadAnimation(params);
    </script> -->
</body>

</html>