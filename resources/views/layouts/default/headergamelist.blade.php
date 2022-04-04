    <!-- App Sidebar -->
    <div class="modal fade panelbox panelbox-left" id="sidebarPanel" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document" style="right: 0;">
            <div class="modal-content gradient-black w-100 fullbg-white">
                <div class="modal-body p-0 w-100 fullbg-white" style="margin: 0;">
                    <!-- profile box -->
                    <div class="profileBox pt-1 pb-1 fullbg-white" style="padding: 0 13px;">
                        <div class="in w-100">
                            <div class="headerButton padding-none" style="display: flex;">
                                <ion-icon data-dismiss="modal" class="cursor-pointer text-black header-left-border" name="arrow-back-outline" style="width: 26px; height: 26px; margin-right: 13px;">
                                </ion-icon>
                                <div class="form-group basic" style="padding: 0;">
                                    <div class="input-wrapper">
                                        <input type="text" class="form-control" id="text search" placeholder="search" onkeyup="searchGamelist(this)">
                                        <i class="clear-input">
                                            <ion-icon name="close-circle" role="img" class="md hydrated" aria-label="close circle"></ion-icon>
                                        </i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- * profile box -->

                    <div class="game-control row" style="padding-top: 10px; justify-content: center;margin-bottom: 15px;">
                        <div class="col-12">
                            <div class="col-12">
                                <h2 style="padding-left: 10px; font-size: 24px; font-weight: 500;" class="text-black"> Search</h2>
                            </div>
                        </div>
                        <div class="col-12 mb-2 row searchrows" style="align-content: flex-start;justify-content: flex-start;align-items: flex-start;">
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="appHeader fullbg-white text-black box-shadow-none" style="background: none !important;">
        <div id="main_game_header_left" class="left">
            @if(!empty($_GET['partner']) or !empty($_GET['game_type']))
            <div onclick="linkToGamelistHome()" class="cursor-pointer headerButton padding-none">
                <ion-icon class="text-black header-left-border" name="arrow-back-outline"></ion-icon>
            </div>
            @else
            <a href="#" class="headerButton padding-none" data-toggle="modal" data-target="#sidebarPanel">
                <ion-icon class="text-black header-left-border" name="search-outline"></ion-icon>
            </a>
            @endif
        </div>
        <!-- <div class="pageTitle text-white">{{ $title }}</div> -->
        <a href="/" class="right" style="right: 0; top: 6px;">
            <div class="bg-white header-right-border">
                <div style="padding: 2px 12px; line-height: 20px;">
                    <div class="amount text-black text-align-right font-size-12">
                        {{$user->gameusername}}
                    </div>
                    @if($user->bonus_mode==1)
                    <div class="amount text-main text-align-right font-size-12">
                        <img src="/images/coin.png" style="width: 15px;"> {{ number_format($credit_user->bonus,2) }}
                    </div>
                    @else
                    <div class="amount text-main text-align-right font-size-12">
                       <img src="/images/coin.png" style="width: 15px;">  {{ number_format($credit_user->balance,2) }}
                    </div>
                   @endif
                </div>
                <span data-toggle="tooltip" data-placement="top" title="เหรียญ" style="margin-right: 0.5em; align-self: center;">
                    <img src="/images/wallet.png" width="36">
                </span>
            </div>
        </a>
    </div>