        <div class="section mt-2">
<h3>ถอนเงินเข้าบัญชีธนาคาร</h3>

            <div class="card bg-white mb-2">
                <div class="card-body">
                      <div class="transactions"> 
                                    <a  href="#" class="item" style="box-shadow:none;">

                                        <div class="detail">
                                             <img src="/uploads/images/banks/{{ $bankuser->bank_logo }}" alt="img" class="image-block imaged w60">
                                            <div>
                                              <p class="card-title">เลขที่บัญชี {{ $user->account_number }}</p>
              
                                                    <p class="card-title">ชื่อบัญชี {{ $user->first_name }} {{ $user->last_name }}</p>
                   <p class="card-title">ธนาคาร{{ $bankuser->bank_name }}</p>
                                            </div>
                                       </div>

                                    </a> 
                            </div> 

                </div>           
            </div>

<h3>รายละเอียดการถอน</h3>
  <div class="card-block mb-2">
                <div class="card-main">
                    <div class="card-button dropdown">
                        <button type="button" class="btn btn-link btn-icon" data-toggle="dropdown">
                            <ion-icon name="ellipsis-horizontal" role="img" class="md hydrated" aria-label="ellipsis horizontal"></ion-icon>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="javacript:;">
                                <ion-icon name="refresh" role="img" class="md hydrated" aria-label="close outline"></ion-icon>อัพเดท
                            </a>
                            <a class="dropdown-item" href="javacript:;">
                                <ion-icon name="repeat" role="img" class="md hydrated" aria-label="arrow up circle outline"></ion-icon>ประวัติธุรกรรม
                            </a>
                        </div>
                    </div>
                    <div class="balance">
                        <span class="label">จำนวนเงินที่ถอนได้</span>
                        <h1 class="title">{{ number_format($user->balance,2) }}฿</h1>
                    </div>
                    <div class="in">
                        <div class="card-number">
                            <span class="label">{{ $promotions_current_user->promotion_name }}</span>
                          543.00
                        </div>
                        <div class="bottom">
                            <div class="card-expiry">
                                <span class="label">ยอดเทิร์นที่ต้องทำ</span>
                             {{ $user->balance }} / {{ $promotions_current_user->turnover }}
                            </div>
                            <div class="card-ccv">
                                <span class="label">สถานะ
</span>
                               ยังไม่สามารถถอนได้ <div class="btn btn-light-danger btn-sm mr-1" data-toggle="tooltip" title="" data-placement="left" data-original-title="{{ $promotions_current_user->promotion_name }}">
                                                           ออกจากโปร</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="btn-submit">  <a href="#" class="btn btn-success btn-block font-weight-bold mr-2">ถอนทั้งหมด {{ $user->balance }}฿</a>

            


         



                                                                
