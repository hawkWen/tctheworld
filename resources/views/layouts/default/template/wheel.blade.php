
<style type="text/css">
#appCapsule {
    padding: 60px 0px;
}
.swal2-popup .swal2-textarea {
display: none !important
}
.appHeader .pageTitle {
  color: #fff;
}


.profileBox .in strong {
    color: #ffffff;
}
span.badge.badge-warning {
    font-weight: bold;
    width: 26px;
    height: 26px;
    border-radius: 100px;
    position: absolute;
    left: 0px;
    font-size: 1.1em;
    top: 0px;
}

span.badge.badge-danger {
    font-weight: bold;
    width: 26px;
    height: 26px;
    border-radius: 100px;
    position: absolute;
    left: 0px;
    font-size: 1.1em;
    top: 0px;
}

span.badge.badge-thb {
    line-height: 1em;
    top: -8px;
    position: relative;
    border: 1px solid #ffffff;
    font-weight: bold;
    color: var(--white);
    background: rgb(248 249 250 / 15%) !important;
}
.sidebar-balance .listview-title {
    opacity: 1;
}

.superWheel .sWheel>.sWheel-txt-wrap>.sWheel-txt>div img {
    max-width: none !important;
    width: auto !important;
    height: 22px !important;
}

.superWheel .sWheel>.sWheel-txt-wrap>.sWheel-txt>div {
   
    width: 66% !important;
    text-align: center !important;
}
.superWheel {
    margin: 0.5em auto 0.5em !important;
}

.chip.chip-media img {
    width: auto;
    height: 25px;
    border-radius: 100px;
    position: absolute;
    left: 10px;
    top: 0;
}
.chip {
    border: solid #ff1ac6;
        height: 30px;
}
  </style>

  <link rel="stylesheet" href="/dairy-reward/css/sweetalert2.min.css"> <!-- sweetalert2 -->
  <link rel="stylesheet" href="/dairy-reward/css/superwheel.min.css"> <!-- superWheel -->
  <link rel="stylesheet" href="/dairy-reward/vendor/font-awesome/css/font-awesome.min.css"> <!-- superWheel -->
  <link rel="stylesheet" href="/dairy-reward/css/style.css"> <!-- Resource style -->

    
    
  <main class="cd-main-content text-center">

        <div class="chip chip-media mb-2" style="margin-right: 1em;">
       <span class="icon-menu" data-toggle="tooltip" data-placement="top" title="เพรช" style="margin-right: 1em;"><img src="/images/gem.png" width="18"></span><span class="chip-label text-light" id="coins_text">{{ number_format($user->coins) }}</span>
    </div>

        <div class="chip chip-media mb-2" style="margin-right: 1em;">
       <span class="icon-menu" data-toggle="tooltip" data-placement="top" title="เงินสด" style="margin-right: 1em;"><img src="/images/coin.png" width="18"></span><span class="chip-label text-light" id="balance_text">{{ number_format($user->balance) }}</span>
    </div>

    <h4>ฝาก 300 รับ 100 เพรช / ฝาก 600 รับ 200 เพรช / ฝาก 900 รับ 300 เพรช / พิเศษฝาก 1000+ รับ 500 เพรช! รับได้ทุกครั้งเมื่อฝาก</h4>
    <!--<img src="/images/กงล้อนำโชค.png" class="imaged w-100 mt-5 pt-3">-->
    <div class="wheel-with-image"></div>

<div class="row" style="align-content: center;
    justify-content: center;">
    @if($coins<100)
    <button type="button" class="button button-primary" disabled>ต้องใช้ 100 เพรชในการหมุน</button>
    @else
    <button type="button" class="button button-primary wheel-with-image-spin-button">หมุนเลย</button>
    @endif
</div>
  </main>
    
 


@if(!empty($wheel_logs))
  <div class="section mb-5">
 <div class="card mt-2 mb-5">

                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr> <th scope="col" class="text-white">#</th>
                                <th scope="col" class="text-white">วันที่</th>
                                <th scope="col" class="text-white text-end">จำนวน</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=1; ?>
                            @foreach($wheel_logs as $key => $value)
                            <tr>
                                <th scope="row">{{ $i++ }}</th>
                                <td><span class="text-end text-light">{{ $value->date_time }}</span></td>
                                <td class="text-end text-primary"><img src="/images/coin.png" width="18"> <?php echo number_format($value->coins); ?> </td>
                            </tr>
                            @endforeach
                     
                        </tbody>
                            
                    </table>
                </div>
</div></div>
@endif
               <div class="section pb-4">

<input type="hidden" id="curr_coins_text" value=""> 
<input type="hidden" id="curr_balance_text" value="">
<input type="hidden" id="curr_coins" value="">
<input type="hidden" id="curr_balance" value="">
        </div>        </div>
<script src="/dairy-reward/js/jquery-2.1.1.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
<script src="/dairy-reward/js/jquery.superwheel.min.js"></script> <!-- superWheel -->
<script src="/dairy-reward/js/sweetalert2.min.js"></script> <!-- sweetalert2 -->
<script type="text/javascript">

jQuery(document).ready(function($)
{
    
    $('.wheel-with-image').superWheel({
    slices: [
    <?php $count =0; $bg='#122752'; ?>
    @foreach ($wheelsetting as $key => $value)
    <?php $count++; 
          if($count%2==0){
            $bg='#122752';
          }else{
            $bg='#008def';
          }
    ?>
        {
            text: "{{ $value->text }}",
            value: {{ $value->value }},
            message: "{{ $value->message }}",
            background: "{{ $bg }}",
            color: "#fff"
        },
    @endforeach
    ],
    text : {
        type: 'text',
        color: '#00d254',
        size: 20,
        offset : 5
        
    },
    width: 400,
    frame: 1,
    type: "color",
        slice: {
        selected: {
            background: "#ff1ac6"
        }
    },

    line: {
        width: 0,
        color: "#78909C"
    },
    outer: {
        
        width: 10,
        color: "#ff1ac6",
        
    },
    inner: {
        width: 15,
        color: "#152235"
    },
    marker: {
        background: "#8950fc",
        animate: 1
    },
    center: {

    width: 20,
    background: '#FFFFFF00',
    rotate: true,
    class: "",
    image:{
      url: "/images/center.png",
      width: 20
    },
        width: 10,
        rotate: false,
        
    },
    
    selector: "value",
    
    
    
    });

   }); 
</script>
<script src="/dairy-reward/js/main.js"></script> <!-- Resource jQuery -->

