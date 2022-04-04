<style>
#appCapsule {
    padding: 30px 0!important;
}

</style>

<div class="modal fade dialogbox" id="addpromotion3per" data-backdrop="static" tabindex="-1" role="dialog">
                                                <div class="modal-dialog" role="document">
                                                    
                                                    <div class="modal-content pr-2 pl-2">
                                                      <div class="modal-header">
                                                               <h5 class="modal-title">อ่านรายละเอียดก่อน</h5>
                                                     
                                                        </div>
                                                        @if($user->bonus_mode==2)
                                                        <div class="modal-body m-0 p-0 text-light mb-2">ต้องการออกจากโบนัสอัตโนมัติ</div>
                                                        @else
                                                        <div class="modal-body m-0 p-0 text-dark mb-2">ทุกยอดฝาก 10% ฝากทุก 300 บาท รับสิทธิหมุนกงล้อ รับได้ไม่จำกัด ทำยอด 2 เท่าถอนได้ไม่อั้น </div>
                                                        @endif
                                                        <div class="modal-footer">
                                                            <div class="btn-inline">
                                                                <a href="#" class="btn btn-text-danger" data-dismiss="modal" onclick="addpromotionauto(0)">
                                                                    <ion-icon name="close-outline"></ion-icon>
                                                                    ยกเลิก
                                                                </a>
                                                                <a href="#" class="btn btn-text-success" data-dismiss="modal" onclick="addpromotionauto(1)">
                                                                    <ion-icon name="checkmark-outline"></ion-icon>
                                                                    @if($user->bonus_mode==2)
                                                                   ออกจากโบนัสอัตโนมัติ
                                                                   @else
                                                                   ยอมรับ
                                                                   @endif
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- * Dialog Image -->
                                         </div>

     

<div class="section wallet-card-section mt-1">
    <div class="wallet-header appHeader" style="position: inherit; z-index: 100;">
         <div class="left mt-1" style="display: block;">
            <h4 class="hello strong" style="width: 100%;">{{ $user->first_name }} {{ $user->last_name }}</h4>
             <h5 class="hello strong" style="width: 100%;"> <i class="ion ion-md-contact"></i> {{ $user->username }}</h5>
      
          

        </div>
        <div class="right">

            <a href="{{ secure_url('/user/logout') }}" class="btn btn-transparent-white">
                <span class="icon-results__cell active mouseOff"><i class="ion ion-ios-log-out"></i></span> ล็อกเอาท์
            </a>
        </div>
    </div>
                   <div class="card-block mb-1 mt-1">
                <div class="card-main">
                    <div class="card-button dropdown">
                        <button type="button" class="btn btn-link btn-icon" data-toggle="dropdown">
                            <ion-icon name="ellipsis-horizontal" role="img" class="md hydrated" aria-label="ellipsis horizontal"></ion-icon>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="javacript:;">
                                <ion-icon name="refresh" role="img" class="md hydrated" aria-label="close outline"></ion-icon>อัพเดท
                            </a>
                            <a class="dropdown-item" href="{{ secure_url('/mytransinfo') }}">
                                <ion-icon name="repeat" role="img" class="md hydrated" aria-label="arrow up circle outline"></ion-icon>ประวัติธุรกรรม
                            </a>
                        </div>
                    </div>
                    @if(!empty($promotions_current_user))

                        @if($user->bonus_mode==1)
                    <div class="balance">
                        <span class="label"><img src="/images/coin.png" width="18">  ยอดเงินเครดิต</span>
                        <h1 class="title">{{ number_format($credit_user->balance,2) }}</h1>
                    </div>
                    
                    <div class="in">

                        
                   
                   
                           @if($credit_user->balance<5)
                            <button class="btn btn-danger btn-sm" id="removeprobutt" onclick="removepro({{$user->id}})">
                                                           ออกจากโปร</button>
                            @endif
                         
                         <span class="label">เงื่อนไขโปร {{ $promotions_current_user->promotion_name }}</span>
                               @if($promotions_current_user->turn_type=='turn')
                                ต้องทำยอดเล่น: {{ number_format($userturn,2) }}/{{ number_format($promotions_current_user->turnover,2) }}
                                @else
                                ต้องทำยอดเงิน: {{ number_format($promotions_current_user->turnover,2) }}
                                @endif
                        <div class="bottom">
                            <div class="card-expiry">
                                 <span class="label">ยอดเงินคงเหลือ {{ number_format($credit_user->bonus,2) }} ฿</span>
                            </div>
                            
                            
                        </div>
                    </div>
                        @elseif($user->bonus_mode==2)

                     <div class="balance">
                        <span class="label">ยอดเงินทั้งหมด</span>
                        <h1 class="title">{{ number_format($credit_user->balance,2) }}</h1>
                    </div>
                    
                    <div class="in">

                        
                   
                   
                           @if($credit_user->balance<5)
                            <button class="btn btn-danger btn-sm" id="removeprobutt" onclick="removepro({{$user->id}})">
                                                           ออกจากโปร</button>
                            @endif
                         
                         <span class="label">เงื่อนไขโปร {{ $promotions_current_user->promotion_name }}</span>
                               @if($promotions_current_user->turn_type=='turn')
                                ต้องทำยอดเล่น : {{ number_format($userturn,2) }} / {{ number_format($promotions_current_user->turnover,2) }}
                                @else
                                ต้องทำยอดเงิน : {{ number_format($credit_user->balance,2) }} / {{ number_format($promotions_current_user->turnover,2) }}
                                @endif
                        @endif
                    </div>
                    @else
                    <div class="balance">
                        <span class="label">ยอดเงินทั้งหมด</span>
                        <h1 class="title">{{ number_format($credit_user->balance,2) }}฿</h1>
                    </div>
                    <div class="in">
                        <div class="card-number">
                            
                        </div>
                        <div class="bottom">
                             คุณยังไม่ได้รับโบนัส 
                            
                        </div>
                    </div>
                    @endif
                </div>
               
            </div> 

 <marquee><i class="ion ion-md-volume-high"></i> Onlyfun88.com ฝากไม่มีขั้นต่ำ ถอนขั้นต่ำ 100 บาท | ติดต่อแอดมินไลน์ @Onlyfun88</marquee>
  

   
        <div class="row">
            <div class="col-4">
                <div class="card"> <a href="{{ secure_url('/promotion') }}">
                    <img src="/img/icon menu/โปรโมชั่น.png" class="iconmenu" alt="image">
                 </a>
                </div>
                <div class="icontext">
                            โปรโมชั่น
                        </div>  

            </div>
      
           <!-- <div class="col-3">
                <div class="card"><a href="{{ secure_url('/cashback') }}">
                    <img src="/img/icon menu/คืนยอด.png" class="iconmenu" alt="image"></a>
                </div>
                <div class="icontext">
                           คืนยอด
                        </div>

            </div>-->
            <div class="col-4">
                <div class="card"><a href="{{ secure_url('/referral') }}">
                    <img src="/img/icon menu/ชวนเพื่อน.png" class="iconmenu" alt="image"></a>
                 </div>
                 <div class="icontext">
                            ชวนเพื่อน
                        </div>
            </div>
            <div class="col-4">
                <div class="card "><a href="{{ secure_url('/wheel') }}">
                    <img src="/img/icon menu/กงล้อ.png" class="iconmenu" alt="image"></a>
                </div>
                <div class="icontext">
                            กงล้อ
                        </div>
            </div>
         
        
           

        </div>
   


                
      
      
  
        


        

    </div>
                <!--  <div class="row">
                        <div class="col-6">
                            <a href="{{ secure_url('/promotion') }}">
                            <img src="/assets/images/โปรโมชั่นกดรับ.png" alt="image" class="imaged img-fluid mr-2">
                            </a>
                        </div>
                        <div class="col-6">
                           <img src="/assets/images/ชวนเพื่อน.png" alt="image" class="imaged img-fluid">
                        </div>
                          <div class="col-6 mt-2">
                            <img src="/assets/images/VIP.png" alt="image" class="imaged img-fluid mr-2">
                        </div>
                        <div class="col-6 mt-2">

                            <a href="{{ secure_url('/mission') }}">
                           <img src="/assets/images/เครดิตฟรีกิจกรรม.png" alt="image" class="imaged img-fluid">
                        </div>
                    </div> 
                        <h4 class="hello" style="width: 100%;">{{ $user->first_name }} {{ $user->last_name }}</h4>item <div class="section-title">คำตอบที่ตอบบ่อย</div>

            
                <div class="card overflow-hidden">
                  <div class="card-body p-0">
                    <div class="accordion border-0" id="accordionExample1">

                        <div class="item">
                            <div class="accordion-header">
                                <button class="btn collapsed" type="button" data-toggle="collapse" data-target="#accordion1">
                                    วิธีการสมัครเป็นเศรษฐี?
                                </button>

                            </div>
                            <div id="accordion1" class="accordion-body collapse" data-parent="#accordionExample1">
                                <div class="accordion-content">
                                    คนรวยไม่รอ..คนรอไม่ค่อยจะรวย

<br>1. รับลิ้งค์สมัครผ่าน LINE @moradok88 จากนั้นกรอกข้อมูลในหน้าสมัครให้ครบ<br>
2. ตรวจสอบบัญชีฝากผ่าน Rich Menu เลือกช่องทาง ธนาคาร หรือ ทรูมันนี่<br>
3. โอนเงินเพื่อเติมเครดิตเข้าบัญชีทำการอัพโหลดสลิปผ่าน Rich Menu<br>
4. รับรหัสเข้าเกมจากแอดมิน<br>
                                </div>
                            </div>
                        </div>
        
                        <div class="item">
                            <div class="accordion-header">
                                <button class="btn collapsed" type="button" data-toggle="collapse" data-target="#accordion3">
                                     ช่องทางติดต่อสอบถาม?
                                </button>
                            </div>
                            <div id="accordion3" class="accordion-body collapse" data-parent="#accordionExample1">
                                <div class="accordion-content">

LINE ► @Moradok88<br>
Website ► https://bit.ly/2JTfirs <br>
Facebook ► moradok88/<br>
                                </div>
                            </div>
                        </div>
                        
                        <div class="item">
                            <div class="accordion-header">
                                <button class="btn collapsed" type="button" data-toggle="collapse" data-target="#accordion2">
                                    มีค่ายเกมส์อะไรบ้าง?
                                </button>
                            </div>
                            <div id="accordion2" class="accordion-body collapse" data-parent="#accordionExample1">
                                <div class="accordion-content">
                                  ค่ายเกมส์นี้มี  PG slot, Manna play, Ambpoker, Askmebet, Gamatron, Ameba
                                </div>
                            </div>
                        </div>

                        <div class="item">
                            <div class="accordion-header">
                                <button class="btn collapsed" type="button" data-toggle="collapse" data-target="#accordion4">
                                ฝาก-ถอน ขั้นต่ำเท่าไหร่?
                                </button>
                            </div>
                            <div id="accordion4" class="accordion-body collapse" data-parent="#accordionExample1">
                                <div class="accordion-content">
                               ฝาก-ถอนไม่มีขั้นต่ำ ยกเว้นบางโปรโมชั่น
                                </div>
                            </div>
                        </div>
        
                    </div>
      -->
                
                <!-- * item -->

                <!-- item -->
                
                <!-- * item -->

                <!-- item -->
                
                <!-- * item -->

                <!-- item -->
                
                <!-- * item <div class="row">
                <div class="col-6">
                     <div class="card">
                <img src="/assets/images/โปรฝากประจำเสริมบุญ0.jpg" class="card-img-top" alt="image">
                <div class="card-body text-dark">
                    <h5 class="card-title">ฝากประจำเสริมบุญ</h5>
                    <p class="card-text">ฝากทุกวัน ได้เล่นทุกวัน
เป็นเศรษฐีได้เร็ววันเร็วคืน</p>
                </div>
            </div>
                </div>
                <div class="col-6">
                   
             <div class="card">
                <img src="/assets/images/กงล้อทิบเบตพลิกชะตา0.jpg" class="card-img-top" alt="image">
                <div class="card-body text-dark">
                    <h5 class="card-title">กงล้อทิบเบต</h5>
                    <p class="card-text">ชาวทิเบตเชื่อว่าหมุนกงล้อ
1 รอบ = สวดมนต์ 1 จบ</p>
                </div>
            </div>
                </div>
            </div> <div class="section mt-2">

            <div class="row mb-2">
                <div class="col-6">
                    <div class="card"> <img src="/assets/images/ลิงก์มหาลาภ0.jpg" class="card-img-top" alt="image">
                        <div class="card-body text-dark">
                            <h5 class="card-title">ลิงก์มหาลาภ</h5>
                            <p class="card-text">แปะที่ไหนก็รุ่งโรจน์ รุ่งเรือง
                            มีรายได้ฟรีๆดั่งลาภลอย</p>   
                        </div>
                    </div>
                </div>
                 <div class="col-6">
                   <div class="card">
                        <img src="/assets/images/แจกเครดิตฟรี 5 555.-0.jpg" class="card-img-top" alt="image">
                        <div class="card-body text-dark">
                            <h5 class="card-title">แจกเครดิตฟรี-</h5>
                            <p class="card-text">แค่เล่นโซเชียล ก็เข้าร่วมได้
                            เตรียมรับเครดิตฟรีได้เลย</p>
                          </div>
                    </div>
                 </div>
            </div>
           

        </div> -->

                

                

                

            
        <!-- 
        <div class="carousel-single owl-carousel owl-theme">

                <div class="item">
                      <div class="card">
                        <img src="{{ asset('img/promotion/facebook.jpg')}}" class="card-img-top" alt="image">
                        <div class="card-body">
                            <h5 class="card-title">99รับ300ทำ499ถอนได้300</h5>
                        </div>
                      </div>
                </div>
                <div class="item">
                    <div class="card">
                        <img src="{{ asset('img/promotion/instagram.jpg')}}" class="card-img-top" alt="image">
                        <div class="card-body">
                            <h5 class="card-title">99รับ300ทำ499ถอนได้300</h5>
                    
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="card">
                        <img src="{{ asset('img/promotion/pinterest.jpg')}}" class="card-img-top" alt="image">
                        <div class="card-body">
                            <h5 class="card-title">99รับ300ทำ499ถอนได้300</h5>
                    
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="card">
                        <img src="{{ asset('img/promotion/tiktok.jpg')}}" class="card-img-top" alt="image">
                        <div class="card-body">
                            <h5 class="card-title">99รับ300ทำ499ถอนได้300</h5>
                    
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="card">
                        <img src="{{ asset('img/promotion/twitter.jpg')}}" class="card-img-top" alt="image">
                        <div class="card-body">
                            <h5 class="card-title">99รับ300ทำ499ถอนได้300</h5>
                    
                        </div>
                    </div>
                </div>
            
                <div class="item">
                    <div class="card">
                        <img src="{{ asset('img/promotion/Youtube5K.jpg')}}" class="card-img-top" alt="image">
                        <div class="card-body">
                            <h5 class="card-title">99รับ300ทำ499ถอนได้300</h5>
                    
                        </div>
                    </div>
                </div>

        </div>-->
    </div>