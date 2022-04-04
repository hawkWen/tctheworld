<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{config('sximo.cnf_appname') }}</title>
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
    <meta name="description" content="">
    <meta name="keywords" content="" />
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('img/fav.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('img/fav.png')}}" sizes="32x32">
    <link rel="shortcut icon" href="{{ asset('img/fav.png')}}">


    <script src="{{ asset('')}}assets/plugins/moment/moment.js"></script>
    <script type="text/javascript" src="{{ asset('assets/js/sximo.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/sximo5.js') }}"></script>

</head>

<body>
@include('layouts.default.snow')

    <div id="fullbg"></div>
    <!-- loader -->
    <div id="loader">
      
        <img src="{{ asset('img/fav.png') }}" alt="icon" class="loading-icon">
    </div>
    <!-- * loader -->

    <!-- App Header 
    <div class="appHeader no-border transparent position-absolute">
        <div class="left">
            <a href="javascript:;" class="headerButton goBack">
                <ion-icon name="chevron-back-outline"></ion-icon>
            </a>
        </div>
        <div class="pageTitle"></div>
        <div class="right">
        </div>
    </div>
    * App Header -->

    <!-- App Capsule -->
    <div id="appCapsule">

     
        <div class="section mb-2 p-2">
            @yield('content') 
            
        </div>

    </div>
    <!-- * App Capsule -->



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

 
</body>

</html>