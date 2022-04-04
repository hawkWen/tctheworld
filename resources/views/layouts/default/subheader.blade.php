<head><link href="/dist/assets/fonts/feather/feather.css" rel="stylesheet" />
<link href="/dist/assets/libs/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet" />
<link href="/dist/assets/libs/dragula/dist/dragula.min.css" rel="stylesheet" />
<link href="/dist/assets/libs/@mdi/font/css/materialdesignicons.min.css" rel="stylesheet" />
<link href="/dist/assets/libs/prismjs/themes/prism.css" rel="stylesheet" />
<link href="/dist/assets/libs/dropzone/dist/dropzone.css" rel="stylesheet" />
<link href="/dist/assets/libs/magnific-popup/dist/magnific-popup.css" rel="stylesheet" />
<link href="/dist/assets/libs/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
<link href="/dist/assets/libs/@yaireo/tagify/dist/tagify.css" rel="stylesheet">
<link href="/dist/assets/libs/tiny-slider/dist/tiny-slider.css" rel="stylesheet">
<link href="/dist/assets/libs/tippy.js/dist/tippy.css" rel="stylesheet">
</head>



<!-- Theme CSS -->
<style>#appCapsule {
        padding: 10px 0;
        padding-bottom: 60px;
    }
    html,
body {
  overflow-x: hidden; /* Prevent scroll on narrow devices */
}

body {
  padding-top: 56px;
}

@media (max-width: 991.98px) {
  .offcanvas-collapse {
    position: fixed;
    top: 56px; /* Height of navbar */
    bottom: 0;
    left: 100%;
    width: 100%;
    padding-right: 1rem;
    padding-left: 1rem;
    overflow-y: auto;
    visibility: hidden;
    background-color: #343a40;
    transition: visibility .3s ease-in-out, -webkit-transform .3s ease-in-out;
    transition: transform .3s ease-in-out, visibility .3s ease-in-out;
    transition: transform .3s ease-in-out, visibility .3s ease-in-out, -webkit-transform .3s ease-in-out;
  }
  .offcanvas-collapse.open {
    visibility: visible;
    -webkit-transform: translateX(-100%);
    transform: translateX(-100%);
  }
}

.nav-scroller {
  position: relative;
  z-index: 2;
  height: 2.75rem;
  overflow-y: hidden;
}

.nav-scroller .nav {
  display: -ms-flexbox;
  display: flex;
  -ms-flex-wrap: nowrap;
  flex-wrap: nowrap;
  padding-bottom: 1rem;
  margin-top: -1px;
  overflow-x: auto;
  color: rgba(255, 255, 255, .75);
  text-align: center;
  white-space: nowrap;
  -webkit-overflow-scrolling: touch;
}

.nav-underline .nav-link {
  padding-top: .75rem;
  padding-bottom: .75rem;
  font-size: .875rem;
  color: #6c757d;
}

.nav-underline .nav-link:hover {
  color: #007bff;
}

.nav-underline .active {
  font-weight: 500;
  color: #343a40;
}

.text-white-50 { color: rgba(255, 255, 255, .5); }

.bg-purple { background-color: #6f42c1; }

.lh-100 { line-height: 1; }
.lh-125 { line-height: 1.25; }
.lh-150 { line-height: 1.5; }

</style>

<div id="carouselExampleIndicators" class="carousel slide mt-1 mb-1 
" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="/assets/images/game-slide01.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="/assets/images/game-slide01.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="/assets/images/game-slide01.jpg" class="d-block w-100" alt="...">
    </div>
  </div>
  
</div>

<div class="nav-scroller shadow-sm" style="background: #141e30;">
  <nav class="nav nav-underline">
    <a class="nav-link text-light filter-btn" href="?partner=all" data-game_partner="0" onclick="hidebtnloadmore();">All</a>
    @foreach($partners_data as $key => $value)
    <a class="nav-link text-light filter-btn" href="?partner={{ $value->short_name }}" data-game_partner="{{ $value->id }}" onclick="hidebtnloadmore();">{{ $value->name }}</a>
    @endforeach
  </nav>
</div>   

