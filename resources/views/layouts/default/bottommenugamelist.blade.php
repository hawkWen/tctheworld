<div class="appBottomMenu border-none fullbg-white app-bottom-menu-inherit" style="justify-content: flex-start; padding-left: 0px !important;">
    @foreach($game_type as $key => $value)
    <div onclick="linkToGamelistGametype('<?php echo $value->id ?>', '<?php echo $value->name ?>')" class="link-game-type-btn item item-inherit @if($pageactive=='') active @endif" style="height: auto !important; font-size: 0.8em;">
        <div style="max-width: 96px">
            <img style="outline: none; margin: 5px; width: 65% !important; max-width: 96px !important; box-shadow: 0px 3px 6px #00000029;" src="/images/{{$value -> name}}.png" alt="image" class="cursor-pointer imaged imgframe">
            <span class="unloaded text-black"><?php echo $value->name ?></span>
        </div>
    </div>
    @endforeach
</div>