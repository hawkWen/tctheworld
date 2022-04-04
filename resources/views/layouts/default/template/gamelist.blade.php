<style type="text/css">
    h3.gamename {
        text-align: center;
        padding-top: 0.4em;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        color: #000;
        font-size: 1em;
        margin-bottom: 0px;
    }

    .gamerows-img {
        width: 100%;
        max-width: 42px;
    }

    .gamerows-col {
        padding: 0px 10px 3px 10px
    }

    .games {
        padding: 10px;
    }

    li.nav-item {
        list-style: none;
    }

    .imgframe {
        border-radius: 20%;
        outline-offset: -3px;
        /* outline: 3px groove #ff1ac6; */
        -webkit-border-radius: 20%;
        -moz-border-radius: 20%;
    }

    .load-more-btn {
        width: 150px;
        line-height: 40px;
        border-radius: 2px;
        margin: 0 auto;
        display: block;
        background: #ff1ac6;
        color: #fff;
        cursor: pointer;
        text-align: center;
    }

    .se-pre-con {
        position: fixed;
        left: 0px;
        top: 0px;
        width: 100%;
        height: 100%;
        z-index: 9999;
        opacity: 0.5;
        background: url("/img/large-loader.gif") center no-repeat #fff;
    }

    .se-pre-con {
        position: fixed;
        left: 0px;
        top: 0px;
        width: 100%;
        height: 100%;
        z-index: 9999;
        opacity: 0.5;
        background: url("/img/large-loader.gif") center no-repeat #fff;
    }

    .cursor-pointer {
        cursor: pointer;
    }
</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- <div class="se-pre-con"></div> -->
<div class="game-control row" style="padding-top: 10px; justify-content: center;margin-bottom:15px;width:100vw;margin-right:0;margin-left:0; flex-direction: column; align-items: center;">
    <?php
    $partnername = '';
    $progame = array();
    $i = 0;
    $displaygamepartner = array();
    foreach ($partners_data as $key => $value) {
        $displaygamepartner[$key] = $value->short_name;
        if ($value->hidden_pro == 1) {
            $progame[$i] = $value->short_name;
            $i++;
        }
        if (!empty($_GET['partner']) && $_GET['partner'] == $value->short_name) {
            $partnername = $value->name;
        }
    }
    ?>
    <div class="col-12">
        <div id='main_game_header' class="col-12">
            @if(!empty($_GET['partner']))
            <h2 style="padding-left: 10px; font-size: 24px; font-weight: 500;" class="text-black">{{ $partnername }}</h2>
            <h3 style="padding-left: 10px;" class="text-black sub-header">จำนวน {{ $games_count }} เกมส์</h3>
            @elseif(!empty($_GET['game_type']))
            <h2 style="padding-left: 10px; font-size: 24px; font-weight: 500;" class="text-black">{{ $games_type_data[0] -> name }}</h2>
            <h3 style="padding-left: 10px;" class="text-black sub-header">จำนวน {{ $games_count }} เกมส์</h3>
            @else
            <h2 style="padding-left: 10px; font-size: 24px; font-weight: 500;" class="text-black"> Slot</h2>
            @endif
        </div>
    </div>
    @if(!empty($promotions_current_user))
    <div class="col-12 mb-2 gamerows row" style="align-content: flex-start;justify-content: flex-start;align-items: flex-start; max-width: 384px;">
        @if(!empty($_GET['partner']))
        @foreach($games_data as $key => $value)
        @if(!in_array($value->partner, $progame))
        @if(in_array($value->partner, $displaygamepartner))
        <div class="col-4 games padding-15" data-gametype="{{ $value->game_type }}" data-category="{{ $value->game_category_id }}">
            <a href="{{ secure_url('seamless/launch') }}?gameid={{ $value->id }}&hash={{ \Auth::user()->hash }}">
                @if($value->image_large=="")
                <img src="/uploads/images/gamelist/noimg.jpg" alt="image" class="imaged w-100 imgframe">
                @else
                <img src="{{ $value->image_large }}" alt="image" class="imaged w-100 imgframe">
                @endif
            </a>
            <h3 class="gamename" style="font-size: 1em; font-weight: 500;"> {{ $value->name }}</h3>
        </div>
        @endif
        @endif
        @endforeach
        @elseif(!empty($_GET['game_type']))
        @foreach($games_data as $key => $value)
        <div class="col-4 games padding-15" data-gametype="{{ $value->game_type }}" data-category="{{ $value->game_category_id }}">
            <a href="{{ secure_url('seamless/launch') }}?gameid={{ $value->id }}&hash={{ \Auth::user()->hash }}">
                @if($value->image_large=="")
                <img src="/uploads/images/gamelist/noimg.jpg" alt="image" class="imaged w-100 imgframe">
                @else
                <img src="{{ $value->image_large }}" alt="image" class="imaged w-100 imgframe">
                @endif
            </a>
            <h3 class="gamename" style="font-size: 1em; font-weight: 500;"> {{ $value->name }}</h3>
        </div>
        @endforeach
        @else
        @foreach($partners_with_games_data as $key => $value)
        <div style="padding: 5px;" class="col-6 games">
            <div style="padding: 7.5px;">
                <div class="max-width-128 max-height-128" onclick="linkToGamelistPartner('<?php echo $value->short_name ?>', '<?php echo $value->name ?>')">
                    <div class="col-12 row cursor-pointer" style="margin: 0; padding: 8px; background: white; border-radius: 15%; box-shadow: 0 2px 5px 1px rgb(64 60 67 / 16%);">
                        @foreach($value -> games as $game_key => $game_value)
                        @if($game_value->image_large=="")
                        <img style="outline: none; padding: 5px;" src="/uploads/images/gamelist/noimg.jpg" alt="image" class="imaged w-50 imgframe">
                        @else
                        <img style="outline: none; padding: 5px;" src="{{ $game_value->image_large }}" alt="image" class="imaged w-50 imgframe">
                        @endif
                        @endforeach
                    </div>
                    <h3 class="gamename" style="font-size: 1em; font-weight: 500;"> {{ $value->name }}</h3>
                </div>
            </div>
        </div>
        @endforeach
        @endif
    </div>
    @else
    <div class="col-12 mb-2 gamerows row" style="align-content: flex-start;justify-content: flex-start;align-items: flex-start; max-width: 384px;">
        @if(!empty($_GET['partner'])))
        @foreach($games_data as $key => $value)
        @if(in_array($value->partner, $displaygamepartner))
        <div class="col-4 games padding-15" data-gametype="{{ $value->game_type }}" data-category="{{ $value->game_category_id }}">
            <a href="{{ secure_url('seamless/launch') }}?gameid={{ $value->id }}&hash={{ \Auth::user()->hash }}">
                @if($value->image_large=="")
                <img src="/uploads/images/gamelist/noimg.jpg" alt="image" class="imaged w-100 imgframe">
                @else
                <img src="{{ $value->image_large }}" alt="image" class="imaged w-100 imgframe">
                @endif
            </a>
            <h3 class="gamename" style="font-size: 1em; font-weight: 500;"> {{ $value->name }}</h3>
        </div>
        @endif
        @endforeach
        @elseif(!empty($_GET['game_type']))
        @foreach($games_data as $key => $value)
        <div class="col-4 games padding-15" data-gametype="{{ $value->game_type }}" data-category="{{ $value->game_category_id }}">
            <a href="{{ secure_url('seamless/launch') }}?gameid={{ $value->id }}&hash={{ \Auth::user()->hash }}">
                @if($value->image_large=="")
                <img src="/uploads/images/gamelist/noimg.jpg" alt="image" class="imaged w-100 imgframe">
                @else
                <img src="{{ $value->image_large }}" alt="image" class="imaged w-100 imgframe">
                @endif
            </a>
            <h3 class="gamename" style="font-size: 1em; font-weight: 500;"> {{ $value->name }}</h3>
        </div>
        @endforeach
        @else
        @foreach($partners_with_games_data as $key => $value)
        <div style="padding: 5px;" class="col-6 games">
            <div style="padding: 7.5px;">
                <div class="max-width-128 max-height-128" onclick="linkToGamelistPartner('<?php echo $value->short_name ?>', '<?php echo $value->name ?>')">
                    <div class="col-12 row cursor-pointer" style="margin: 0; padding: 8px; background: white; border-radius: 15%; box-shadow: 0 2px 5px 1px rgb(64 60 67 / 16%);">
                        @foreach($value -> games as $game_key => $game_value)
                        @if($game_value->image_large=="")
                        <img style="outline: none; padding: 5px;" src="/uploads/images/gamelist/noimg.jpg" alt="image" class="imaged w-50 imgframe">
                        @else
                        <img style="outline: none; padding: 5px;" src="{{ $game_value->image_large }}" alt="image" class="imaged w-50 imgframe">
                        @endif
                        @endforeach
                    </div>
                    <h3 class="gamename" style="font-size: 1em; font-weight: 500;"> {{ $value->name }}</h3>
                </div>
            </div>
        </div>
        @endforeach
        @endif
    </div>
    @endif

    @if(!empty($_GET['partner']) && count($games_data) == 30)
    <div onclick="loadmorePartnerNew('<?php echo $_GET['partner'] ?>')" class="load-more-btn" for="load-more" style="margin-bottom: 50px; border-radius: 15px;">
        <span class="unloaded">More</span>
    </div>
    @endif

    @if(!empty($_GET['game_type']) && count($games_data) == 30)
    <div onclick="loadmoreGametypeNew('<?php echo $_GET['game_type'] ?>')" class="load-more-btn" for="load-more" style="margin-bottom: 50px; border-radius: 15px;">
        <span class="unloaded">More</span>
    </div>
    @endif

    <label class="load-more-space" style="margin-bottom: 36px; width: 100%;">
    </label>
</div>

<script type="text/javascript">
    var lseq = 0;
    var displaygamepartner_array = @json($displaygamepartner);
    var progame_array = @json($progame);

    @if(!empty($promotions_current_user))
    var promotions_current_user = 1;
    @else
    var promotions_current_user = "";
    @endif

    $(document).ready(function() {
        $(".se-pre-con").fadeOut("fast");

    });

    function hidebtnloadmore() {
        $(".load-more-btn").hide();
    }

    function linkToGamelistHome(args) {
        $.ajax({
            dataType: "json",
            type: "POST",
            data: {
                "home_initial": 'true'
            },
            url: '/gamelist/loadmore',
            success: function(data) {
                var lseq = 0;
                window.history.pushState('games', 'เกมส์ทั้งหมด | Octobet', `/games`)
                let main_game_header = `<h2 style="padding-left: 10px; font-size: 24px; font-weight: 500;" class="text-black">Slot</h2>`
                let main_game_header_left = `<a href="#" class="headerButton padding-none" data-toggle="modal" data-target="#sidebarPanel"><ion-icon class="text-black header-left-border" name="search-outline"></ion-icon></a>`
                $(".load-more-btn").remove();
                $(".load-more-space").remove();
                $(".gamerows").empty()
                $("#main_game_header").empty()
                $("#main_game_header_left").empty()
                $("#main_game_header").append(main_game_header);
                $("#main_game_header_left").append(main_game_header_left);
                $.each(data, function(idx, obj) {
                    if (promotions_current_user != "") {
                        var lgame = '<div style="padding: 5px;" class="col-6 games">'
                        lgame += '<div style="padding: 7.5px;">'
                        lgame += `<div class="max-width-128 max-height-128" onclick="linkToGamelistPartner('${obj.short_name}', '${obj.name}')">`
                        lgame += '<div class="cursor-pointer col-12 row" style="margin: 0; padding: 8px; background: white; border-radius: 15%; box-shadow: 0 2px 5px 1px rgb(64 60 67 / 16%);">'
                        obj.games.map(game => {
                            if (game.image_large === '') {
                                lgame += '<img style="outline: none; padding: 5px;" src="/uploads/images/gamelist/noimg.jpg" alt="image" class="imaged w-50 imgframe">'
                            } else {
                                lgame += `<img style="outline: none; padding: 5px;" src="${game.image_large}" alt="image" class="imaged w-50 imgframe">`
                            }
                        })
                        lgame += `</div><h3 class="gamename" style="font-size: 1em; font-weight: 500;"> ${obj.name}</h3></div></div></div>`
                        $(".gamerows").append(lgame);
                    } else {
                        var lgame = '<div style="padding: 5px;" class="col-6 games">'
                        lgame += '<div style="padding: 7.5px;">'
                        lgame += `<div class="max-width-128 max-height-128" onclick="linkToGamelistPartner('${obj.short_name}', '${obj.name}')">`
                        lgame += '<div class="cursor-pointer col-12 row" style="margin: 0; padding: 8px; background: white; border-radius: 15%; box-shadow: 0 2px 5px 1px rgb(64 60 67 / 16%);">'
                        obj.games.map(game => {
                            if (game.image_large === '') {
                                lgame += '<img style="outline: none; padding: 5px;" src="/uploads/images/gamelist/noimg.jpg" alt="image" class="imaged w-50 imgframe">'
                            } else {
                                lgame += `<img style="outline: none; padding: 5px;" src="${game.image_large}" alt="image" class="imaged w-50 imgframe">`
                            }
                        })
                        lgame += `</div><h3 class="gamename" style="font-size: 1em; font-weight: 500;"> ${obj.name}</h3></div></div></div>`
                        $(".gamerows").append(lgame);
                    }

                });

                var load_more_button = '<label class="load-more-space" style="margin-bottom: 36px; width: 100%;"></label>'
                $(".game-control").append(load_more_button);
            }
        });
    }

    function linkToGamelistPartner(short_name, name) {
        $(".se-pre-con").fadeIn("slow");
        $(".load-more-space").remove();
        $.ajax({
            dataType: "json",
            type: "POST",
            data: {
                "partner_initial": short_name
            },
            url: '/gamelist/loadmore',
            success: function(data) {
                var lseq = 0;
                window.history.pushState('games', 'เกมส์ทั้งหมด | Octobet', `/games?partner=${short_name}`)
                let main_game_header = `<h2 style="padding-left: 10px; font-size: 24px; font-weight: 500;" class="text-black">${name}</h2><h3 style="padding-left: 10px;" class="text-black sub-header">จำนวน ${data.count} เกมส์</h3>`
                let main_game_header_left = `<div onclick="linkToGamelistHome()" class="cursor-pointer headerButton padding-none"><ion-icon class="text-black header-left-border" name="arrow-back-outline"></ion-icon></div>`
                $(".gamerows").empty()
                $("#main_game_header").empty()
                $("#main_game_header_left").empty()
                $("#main_game_header").append(main_game_header);
                $("#main_game_header_left").append(main_game_header_left);
                var _idx = 0;
                $.each(data.list, function(idx, obj) {
                    _idx++;
                    if (promotions_current_user != "") {
                        var lgame = "<div class='col-4 games padding-15' data-gametype='" + obj.game_type + "' data-category='" + obj.game_category_id + "'>";
                        lgame += "<a href='{{ secure_url('seamless/launch') }}?gameid=" + obj.id + "&hash={{ \Auth::user()->hash }}'' >";
                        if (obj.image_large == "") {
                            lgame += "<img src='/uploads/images/gamelist/noimg.jpg' alt='image' class='imaged w-100 imgframe'>";
                        } else {
                            lgame += "<img src='" + obj.image_large + "' alt='image' class='imaged w-100 imgframe'>";
                        }
                        lgame += "<h3 class='gamename' style='font-size: 1em'> " + obj.name + "</h3>";
                        lgame += "</div>";
                        $(".gamerows").append(lgame);
                    } else {
                        var lgame = "<div class='col-4 games padding-15' data-gametype='" + obj.game_type + "' data-category='" + obj.game_category_id + "'>";
                        lgame += "<a href='{{ secure_url('seamless/launch') }}?gameid=" + obj.id + "&hash={{ \Auth::user()->hash }}'' >";
                        if (obj.image_large == "") {
                            lgame += "<img src='/uploads/images/gamelist/noimg.jpg' alt='image' class='imaged w-100 imgframe'>";
                        } else {
                            lgame += "<img src='" + obj.image_large + "' alt='image' class='imaged w-100 imgframe'>";
                        }
                        lgame += "<h3 class='gamename' style='font-size: 1em'> " + obj.name + "</h3>";
                        lgame += "</div>";
                        $(".gamerows").append(lgame);
                    }

                });
                if (_idx === 30) {
                    var load_more_button = `<div onclick="loadmorePartnerNew('${short_name}')" class="load-more-btn" for="load-more" style="margin-bottom: 50px; border-radius: 15px;"><span class="unloaded">More</span></div>`
                    load_more_button += '<label class="load-more-space" style="margin-bottom: 36px; width: 100%;"></label>'
                    $(".game-control").append(load_more_button);
                }
                $(".se-pre-con").fadeOut("slow");
                window.scrollTo(0, 0)
            }
        });
    }

    function loadmorePartnerNew(partner) {
        $(".se-pre-con").fadeIn("slow");
        $(".load-more-btn").remove();
        $(".load-more-space").remove();
        $.ajax({
            dataType: "json",
            type: "POST",
            data: {
                "seqno": lseq,
                "partner": partner
            },
            url: '/gamelist/loadmore',
            success: function(data) {
                lseq++;
                var _idx = 0;
                $.each(data, function(idx, obj) {
                    _idx++;
                    if (promotions_current_user != "") {
                        var lgame = "<div class='col-4 games padding-15' data-gametype='" + obj.game_type + "' data-category='" + obj.game_category_id + "'>";
                        lgame += "<a href='{{ secure_url('seamless/launch') }}?gameid=" + obj.id + "&hash={{ \Auth::user()->hash }}'' >";
                        if (obj.image_large == "") {
                            lgame += "<img src='/uploads/images/gamelist/noimg.jpg' alt='image' class='imaged w-100 imgframe'>";
                        } else {
                            lgame += "<img src='" + obj.image_large + "' alt='image' class='imaged w-100 imgframe'>";
                        }
                        lgame += "<h3 class='gamename' style='font-size: 1em'> " + obj.name + "</h3>";
                        lgame += "</div>";
                        $(".gamerows").append(lgame);
                    } else {
                        var lgame = "<div class='col-4 games padding-15' data-gametype='" + obj.game_type + "' data-category='" + obj.game_category_id + "'>";
                        lgame += "<a href='{{ secure_url('seamless/launch') }}?gameid=" + obj.id + "&hash={{ \Auth::user()->hash }}'' >";
                        if (obj.image_large == "") {
                            lgame += "<img src='/uploads/images/gamelist/noimg.jpg' alt='image' class='imaged w-100 imgframe'>";
                        } else {
                            lgame += "<img src='" + obj.image_large + "' alt='image' class='imaged w-100 imgframe'>";
                        }
                        lgame += "<h3 class='gamename' style='font-size: 1em'> " + obj.name + "</h3>";
                        lgame += "</div>";
                        $(".gamerows").append(lgame);
                    }
                });

                if (_idx < 9) {
                    var load_more_button = '<label class="load-more-space" style="margin-bottom: 36px; width: 100%;"></label>'
                    $(".game-control").append(load_more_button);
                } else {
                    var load_more_button = `<div onclick="loadmorePartnerNew('${partner}')" class="load-more-btn" for="load-more" style="margin-bottom: 50px; border-radius: 15px;"><span class="unloaded">More</span></div>`
                    load_more_button += '<label class="load-more-space" style="margin-bottom: 36px; width: 100%;"></label>'
                    $(".game-control").append(load_more_button);
                }
                $(".se-pre-con").fadeOut("slow");
            }
        });
    }

    function linkToGamelistGametype(id, name) {
        $(".se-pre-con").fadeIn("slow");
        $(".load-more-btn").remove();
        $(".load-more-space").remove();
        $.ajax({
            dataType: "json",
            type: "POST",
            data: {
                "game_type_initial": id
            },
            url: '/gamelist/loadmore',
            success: function(data) {
                var lseq = 0;
                window.history.pushState('games', 'เกมส์ทั้งหมด | Octobet', `/games?game_type=${id}`)
                let main_game_header = `<h2 style="padding-left: 10px; font-size: 24px; font-weight: 500;" class="text-black">${name}</h2><h3 style="padding-left: 10px;" class="text-black sub-header">จำนวน ${data.count} เกมส์</h3>`
                let main_game_header_left = `<div onclick="linkToGamelistHome()" class="cursor-pointer headerButton padding-none"><ion-icon class="text-black header-left-border" name="arrow-back-outline"></ion-icon></div>`
                $(".gamerows").empty()
                $("#main_game_header").empty()
                $("#main_game_header_left").empty()
                $("#main_game_header").append(main_game_header);
                $("#main_game_header_left").append(main_game_header_left);
                var _idx = 0;
                $.each(data.list, function(idx, obj) {
                    _idx++;
                    if (promotions_current_user != "") {
                        var lgame = "<div class='col-4 games padding-15' data-gametype='" + obj.game_type + "' data-category='" + obj.game_category_id + "'>";
                        lgame += "<a href='{{ secure_url('seamless/launch') }}?gameid=" + obj.id + "&hash={{ \Auth::user()->hash }}'' >";
                        if (obj.image_large == "") {
                            lgame += "<img src='/uploads/images/gamelist/noimg.jpg' alt='image' class='imaged w-100 imgframe'>";
                        } else {
                            lgame += "<img src='" + obj.image_large + "' alt='image' class='imaged w-100 imgframe'>";
                        }
                        lgame += "<h3 class='gamename' style='font-size: 1em'> " + obj.name + "</h3>";
                        lgame += "</div>";
                        $(".gamerows").append(lgame);
                    } else {
                        var lgame = "<div class='col-4 games padding-15' data-gametype='" + obj.game_type + "' data-category='" + obj.game_category_id + "'>";
                        lgame += "<a href='{{ secure_url('seamless/launch') }}?gameid=" + obj.id + "&hash={{ \Auth::user()->hash }}'' >";
                        if (obj.image_large == "") {
                            lgame += "<img src='/uploads/images/gamelist/noimg.jpg' alt='image' class='imaged w-100 imgframe'>";
                        } else {
                            lgame += "<img src='" + obj.image_large + "' alt='image' class='imaged w-100 imgframe'>";
                        }
                        lgame += "<h3 class='gamename' style='font-size: 1em'> " + obj.name + "</h3>";
                        lgame += "</div>";
                        $(".gamerows").append(lgame);
                    }

                });

                if (_idx === 30) {
                    var load_more_button = `<div onclick="loadmoreGametypeNew('${id}')" class="load-more-btn" for="load-more" style="margin-bottom: 50px; border-radius: 15px;"><span class="unloaded">More</span></div>`
                    load_more_button += '<label class="load-more-space" style="margin-bottom: 36px; width: 100%;"></label>'
                    $(".game-control").append(load_more_button);
                }
                $(".se-pre-con").fadeOut("slow");
                window.scrollTo(0, 0)
            }
        });
    }

    function loadmoreGametypeNew(game_type) {
        $(".se-pre-con").fadeIn("slow");
        $(".load-more-btn").remove();
        $(".load-more-space").remove();
        $.ajax({
            dataType: "json",
            type: "POST",
            data: {
                "seqno": lseq,
                "game_type": game_type
            },
            url: '/gamelist/loadmore',
            success: function(data) {
                lseq++;
                var _idx = 0;
                $.each(data, function(idx, obj) {
                    _idx++;
                    if (promotions_current_user != "") {
                        var lgame = "<div class='col-4 games padding-15' data-gametype='" + obj.game_type + "' data-category='" + obj.game_category_id + "'>";
                        lgame += "<a href='{{ secure_url('seamless/launch') }}?gameid=" + obj.id + "&hash={{ \Auth::user()->hash }}'' >";
                        if (obj.image_large == "") {
                            lgame += "<img src='/uploads/images/gamelist/noimg.jpg' alt='image' class='imaged w-100 imgframe'>";
                        } else {
                            lgame += "<img src='" + obj.image_large + "' alt='image' class='imaged w-100 imgframe'>";
                        }
                        lgame += "<h3 class='gamename' style='font-size: 1em'> " + obj.name + "</h3>";
                        lgame += "</div>";
                        $(".gamerows").append(lgame);
                    } else {
                        var lgame = "<div class='col-4 games padding-15' data-gametype='" + obj.game_type + "' data-category='" + obj.game_category_id + "'>";
                        lgame += "<a href='{{ secure_url('seamless/launch') }}?gameid=" + obj.id + "&hash={{ \Auth::user()->hash }}'' >";
                        if (obj.image_large == "") {
                            lgame += "<img src='/uploads/images/gamelist/noimg.jpg' alt='image' class='imaged w-100 imgframe'>";
                        } else {
                            lgame += "<img src='" + obj.image_large + "' alt='image' class='imaged w-100 imgframe'>";
                        }
                        lgame += "<h3 class='gamename' style='font-size: 1em'> " + obj.name + "</h3>";
                        lgame += "</div>";
                        $(".gamerows").append(lgame);
                    }
                });

                if (_idx < 9) {
                    var load_more_button = '<label class="load-more-space" style="margin-bottom: 36px; width: 100%;"></label>'
                    $(".game-control").append(load_more_button);
                } else {
                    var load_more_button = `<div onclick="loadmoreGametypeNew('${game_type}')" class="load-more-btn" for="load-more" style="margin-bottom: 50px; border-radius: 15px;"><span class="unloaded">More</span></div>`
                    load_more_button += '<label class="load-more-space" style="margin-bottom: 36px; width: 100%;"></label>'
                    $(".game-control").append(load_more_button);
                }
                $(".se-pre-con").fadeOut("slow");
            }
        });
    }

    function searchGamelist(args) {
        if (args.value) {
            $.ajax({
                dataType: "json",
                type: "POST",
                data: {
                    "seqno": 0,
                    "search": args.value
                },
                url: '/gamelist/loadmore',
                success: function(data) {
                    lseq++;
                    var _idx = 0;
                    $(".searchrows").empty()
                    $.each(data, function(idx, obj) {
                        _idx++;
                        if (promotions_current_user != "") {
                            var lgame = "<div class='col-4 games padding-15' data-gametype='" + obj.game_type + "' data-category='" + obj.game_category_id + "'>";
                            lgame += "<a href='{{ secure_url('seamless/launch') }}?gameid=" + obj.id + "&hash={{ \Auth::user()->hash }}'' >";
                            if (obj.image_large == "") {
                                lgame += "<img src='/uploads/images/gamelist/noimg.jpg' alt='image' class='imaged w-100 imgframe'>";
                            } else {
                                lgame += "<img src='" + obj.image_large + "' alt='image' class='imaged w-100 imgframe'>";
                            }
                            lgame += "<h3 class='gamename' style='font-size: 1em'> " + obj.name + "</h3>";
                            lgame += "</div>";
                            $(".searchrows").append(lgame);
                        } else {
                            var lgame = "<div class='col-4 games padding-15' data-gametype='" + obj.game_type + "' data-category='" + obj.game_category_id + "'>";
                            lgame += "<a href='{{ secure_url('seamless/launch') }}?gameid=" + obj.id + "&hash={{ \Auth::user()->hash }}'' >";
                            if (obj.image_large == "") {
                                lgame += "<img src='/uploads/images/gamelist/noimg.jpg' alt='image' class='imaged w-100 imgframe'>";
                            } else {
                                lgame += "<img src='" + obj.image_large + "' alt='image' class='imaged w-100 imgframe'>";
                            }
                            lgame += "<h3 class='gamename' style='font-size: 1em'> " + obj.name + "</h3>";
                            lgame += "</div>";
                            $(".searchrows").append(lgame);
                        }

                    });
                }
            });
        }
    }
</script>