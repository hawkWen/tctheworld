<style type="text/css">
h3.gamename {
    text-align: center;
    padding-top: 0.4em;
    white-space:nowrap;
    overflow:hidden;
    text-overflow:ellipsis;
    color:#fff;
    font-size:1em;
    margin-bottom: 0px;
}

.gamerows-img{
        width: 100%;
        max-width: 42px;
}
.gamerows-col{
        padding: 0px 10px 3px 10px
}
.games {
    padding: 10px;
}

li.nav-item {
    list-style: none;
}

.imgframe{
    border-radius: 20%;
    outline-offset: -3px;
    outline: 3px groove #ff1ac6;
    -webkit-border-radius:20%;
-moz-border-radius:20%;
}

.load-more-btn {
    width: 150px;
    line-height: 40px;
    border-radius: 2px;
    margin: 0 auto;
    display: block;
    background: #ff1ac6 ;
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
</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<div class="se-pre-con"></div>
<div class="game-control row" style="padding-top: 10px; justify-content: center;margin-bottom: 15px;">
        
            <?php 
            $partnername = '';
                         $progame = array();
                        $i=0;
                $displaygamepartner = array();
                foreach($partners_data as $key => $value){
                    $displaygamepartner[$key] = $value->short_name;
                    if($value->hidden_pro==1){
                                $progame[$i]=$value->short_name;
                                $i++;
                            }
                    if(!empty($_GET['partner'])&&$_GET['partner']==$value->short_name)
                            {
                                $partnername = $value->name;
                            }
                }



            ?>
            <div class="col-12"><div class="col-12">
     @if(!empty($_GET['partner']))
                        <h4 style="padding-left: 0px; width: 100%;color: #fff;"><span class="text-primary">{{ $partnername }}</span> : {{ $games_count }} เกมส์</h4>
      @endif</div>
  </div>
            @if(!empty($promotions_current_user))
            <div class="col-12 mb-2 gamerows row" style="align-content: flex-start;justify-content: flex-start;align-items: flex-start;">
                            @foreach($games_data as $key => $value)
                                @if(!in_array($value->partner, $progame))
                                @if(in_array($value->partner, $displaygamepartner))
                                <div class="col-4 games" data-gametype="{{ $value->game_type }}" data-category="{{ $value->game_category_id }}">
                                    <a href="{{ secure_url('seamless/launch') }}?gameid={{ $value->id }}&hash={{ \Auth::user()->hash }}" >
                                        @if($value->image_large=="")
                                            <img src="/uploads/images/gamelist/noimg.jpg" alt="image" class="imaged w-100 imgframe">
                                        @else
                                            <img src="{{ $value->image_large }}" alt="image" class="imaged w-100 imgframe">
                                        @endif
                                           <h3 class="gamename" style="font-size: 1em"> {{ $value->name }}</h3>

                                    </a>
                                </div>
                                @endif
                                @endif
                            @endforeach
                        
            </div>
            @else
            <div class="col-12 mb-2 gamerows row" style="align-content: flex-start;justify-content: flex-start;align-items: flex-start;">
                            @foreach($games_data as $key => $value)
                                @if(in_array($value->partner, $displaygamepartner))
                                <div class="col-4 games" data-gametype="{{ $value->game_type }}" data-category="{{ $value->game_category_id }}">
                                    <a href="{{ secure_url('seamless/launch') }}?gameid={{ $value->id }}&hash={{ \Auth::user()->hash }}" >
                                        @if($value->image_large=="")
                                            <img src="/uploads/images/gamelist/noimg.jpg" alt="image" class="imaged w-100 imgframe">
                                        @else
                                            <img src="{{ $value->image_large }}" alt="image" class="imaged w-100 imgframe">
                                        @endif
                                           <h3 class="gamename" style="font-size: 1em"> {{ $value->name }}</h3>

                                    </a>
                                </div>
                                @endif
                            @endforeach
                        
            </div>
            @endif
            <label class="load-more-btn" for="load-more">
                <span class="unloaded">More</span>
            </label>  
</div>
<script  type="text/javascript">
    var lseq = 0;
    var displaygamepartner_array = @json($displaygamepartner);
    var progame_array = @json($progame);
     @if(!empty($promotions_current_user))
    var promotions_current_user = 1;
    @else
var promotions_current_user = "";
    @endif
  $(document).ready(function(){
        $(".se-pre-con").fadeOut("fast");
        $(".load-more-btn").click(function(){
            $(".load-more-btn").hide();
            loadmore();
        });
        
	});

    function loadmore(){
        $(".se-pre-con").fadeIn("slow");
        $.ajax({
                dataType : "json",
                type : "POST",
                data : { "seqno": lseq, "partner": "{{$req_partner}}" }, 
                url :'/gamelist/loadmore', 
                success : function(data){
                    lseq++;
                    var _idx = 0;
                    $.each(data, function(idx, obj) {
                        _idx++;
                        if(promotions_current_user != ""){
                            if(!progame_array.includes(obj.partner) ){
                                if(displaygamepartner_array.includes(obj.partner)){
                                    var lgame = "<div class='col-4 games' data-gametype='" + obj.game_type + "' data-category='" + obj.game_category_id + "'>";
                                        lgame += "<a href='{{ secure_url('seamless/launch') }}?gameid=" + obj.id + "&hash={{ \Auth::user()->hash }}'' >";
                                            if(obj.image_large == ""){
                                                lgame += "<img src='/uploads/images/gamelist/noimg.jpg' alt='image' class='imaged w-100 imgframe'>";
                                            }else{
                                                lgame += "<img src='" + obj.image_large + "' alt='image' class='imaged w-100 imgframe'>";
                                            }
                                        lgame += "<h3 class='gamename' style='font-size: 1em'> " + obj.name + "</h3>";
                                        lgame += "</div>";
                                    $( ".gamerows" ).append(lgame);
                                }
                            }
                        }else{
                            if(displaygamepartner_array.includes(obj.partner)){
                                var lgame = "<div class='col-4 games' data-gametype='" + obj.game_type + "' data-category='" + obj.game_category_id + "'>";
                                    lgame += "<a href='{{ secure_url('seamless/launch') }}?gameid=" + obj.id + "&hash={{ \Auth::user()->hash }}'' >";
                                        if(obj.image_large == ""){
                                            lgame += "<img src='/uploads/images/gamelist/noimg.jpg' alt='image' class='imaged w-100 imgframe'>";
                                        }else{
                                            lgame += "<img src='" + obj.image_large + "' alt='image' class='imaged w-100 imgframe'>";
                                        }
                                    lgame += "<h3 class='gamename' style='font-size: 1em'> " + obj.name + "</h3>";
                                    lgame += "</div>";
                                $( ".gamerows" ).append(lgame);
                            }
                        }
                        
                    });
                    if(_idx < 9){
                        $(".load-more-btn").hide();
                    }else{
                        $(".load-more-btn").show();
                    }
                    $(".se-pre-con").fadeOut("slow");
                } 
        });
    }
    function hidebtnloadmore(){
        $(".load-more-btn").hide();
    }
</script>
