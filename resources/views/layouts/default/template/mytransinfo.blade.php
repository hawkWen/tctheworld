<div class="extraHeader pr-0 pl-0">
        <ul class="nav nav-tabs lined" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#deposit" role="tab">
                    ฝาก
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#withdraw" role="tab">
                    ถอน
                </a>
            </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#bonus" role="tab">
                    กิจกรรม
                </a>
            </li>
        </ul>
    </div>

    <div id="appCapsule" class="extra-header-active" style="padding-top: 50px;">

        <div class="section tab-content mt-2 mb-1">

            <!-- deposit tab -->
            <div class="tab-pane fade active show" id="deposit" role="tabpanel">
              
                @if(!empty($deposit_data))
                    <ul class="listview image-listview">
                        @foreach($deposit_data as $value)
                           <li>
                                 <a href="{{ secure_url('/transaction') }}?txid={{ $value->deposit_id }}" class="item">
                                   
                                       <div class="in">
                                        <div>     
                                            <header>ฝากเงิน  
                                                @if($value->status=='confirmed') 
                                                    <span class="text-success">สำเร็จ</span> 
                                                @elseif($value->status=='wait')
                                                    <span class="text-warning">กำลังตรวจสอบ</span>
                                                @elseif($value->status=='cancel')
                                                    <span class="text-danger">ไม่สำเร็จ</span>
                                                @elseif($value->status=='error')
                                                    <span class="text-danger">เกิดข้อผิดพลาด</span>
                                                @endif
                                            </header>
                                            <footer>{{ $value->system_date }}</footer></div>
                                        <span class="text-light">{{ number_format($value->amount,2) }} ฿</span>
                                    </div>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                @endif

          
            </div>
            <!-- * deposit tab -->



            <!-- withdraw tab -->
            <div class="tab-pane fade" id="withdraw" role="tabpanel">
                     @if(!empty($withdraw_data))
                        <ul class="listview image-listview">
                            @foreach($withdraw_data as $value)
                               <li>
                                     <a href="#" class="item">
                                       
                                           <div class="in">
                                            <div>     
                                                <header>ถอนเงิน  
                                                    @if($value->status=='confirmed') 
                                                        <span class="text-success">สำเร็จ</span> 
                                                    @elseif($value->status=='wait')
                                                        <span class="text-primary">กำลังตรวจสอบ</span>
                                                    @elseif($value->status=='cancel')
                                                        <span class="text-danger">ไม่สำเร็จ</span>
                                                    @elseif($value->status=='error')
                                                        <span class="text-danger">เกิดข้อผิดพลาด</span>
                                                    @endif
                                                </header>
                                                <footer>{{ $value->date_time }}</footer></div>
                                        <span class="text-light">{{ number_format($value->amount,2) }} ฿</span>
                                        </div>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    @endif
            </div>
            <!-- * withdraw tab -->
              <!-- bonus tab -->
            <div class="tab-pane fade" id="bonus" role="tabpanel">
             
               <!-- <div class="section mt-2">
           
                        <div class="card bg-white mb-2">
                               <div class="transactions">
                                        item 
                                        <a href="app-transaction-detail.html" class="item">
                                            <div class="detail">
                                                <img src="assets/img/sample/avatar/bonus.jpg" alt="img" class="image-block imaged w48">
                                                <div>
                                                     <strong>รับเครดิตฟรี</strong>
                                                    <p>02/02/2021 07:32:55 AM</p>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="price text-success">+30฿</div>
                                            </div>
                                        </a>
                                        <!-- * item -->
                                        <!-- item 
                                        <a href="app-transaction-detail.html" class="item">
                                            <div class="detail">
                                                <img src="assets/img/sample/avatar/bonus.jpg" alt="img" class="image-block imaged w48">
                                                <div>
                                                    <strong>รับเครดิตฟรี</strong>
                                                    <p>02/02/2021 06:57:39 AM</p>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="price text-success">+50฿</div>
                                            </div>
                                        </a>
                                        <!-- * item -->
                                        <!-- item -->
                                 
                                        <!-- * item -->
                                        <!-- item 
                                        <a href="app-transaction-detail.html" class="item">
                                            <div class="detail">
                                                <img src="assets/img/sample/avatar/bonus.jpg" alt="img" class="image-block imaged w48">
                                                <div>
                                                    <strong>รับเครดิตฟรี</strong>
                                                    <p>02/02/2021 03:54:32 AM</p>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="price text-success">+30฿</div>
                                            </div>
                                        </a>
                                        <!-- * item 
                                    </div>
                        
                       
                        </div>
       
        </div>-->
            </div>
            <!-- * bonus tab -->

        </div>

    </div>


