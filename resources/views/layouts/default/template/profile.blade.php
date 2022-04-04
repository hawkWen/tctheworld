<!-- App Capsule -->
        
        <div class="wallet-card-balance mt-3 text-center">
            <ion-icon name="wallet-outline" style="font-size: 30px;" role="img" class="md hydrated" aria-label="wallet outline"></ion-icon>
            <h4>กระเป๋าเงิน</h4>
            <h3>{{ $user->balance }} บาท</h3>
        </div>
        <div class="listview-title mt-1"></div>

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

      <ul class="listview image-listview text inset">
            <!--<li>
                <div class="item">
                    <div class="in">
                        <div class="text-light">
                            รับโบนัสอัตโนมัติ
                        </div>
                        <div class="form-check form-switch  ms-2">
                            <input class="form-check-input dark-mode-switch" type="checkbox" id="proautoswitch" data-toggle="modal" data-target="#addpromotion3per"  @if($user->bonus_mode==2) checked="checked" @endif>
                            <label class="form-check-label" for="proautoswitch"></label>
                        </div>
                    </div>
                </div>
            </li>-->

            <li>
                <div class="item">
                    <div class="in">
                        <div>
                            
                            <div class="text-light">
                           <img src="/images/svg/jewly.png" width="18">    
                            </div>
                        </div>
                        <strong  class="text-light"> {{ number_format($user->coins,2) }}</strong>
                    </div>
                </div>
            </li>

    
            <li>
                <a href="{{ secure_url('promotion') }}" class="item">
                    <div class="in">
                        <div>โปรโมชั่นของคุณ</div>
                        <span class="text-primary">ดูทั้งหมด</span>
                    </div>
                </a>
            </li>
        </ul>
        <div class="listview-title mt-1"></div>
        <ul class="listview image-listview text inset">
            <li>
                <a href="{{ secure_url('myinfo') }}" class="item">
                    <div class="in">
                        <div>ข้อมูลส่วนตัว</div>
                    </div>
                </a>
            </li>
            <li>
                <a href="{{ secure_url('mygameinfo') }}" class="item">
                    <div class="in">
                        <div>บัญชีผู้ใช้งาน</div>
                    </div>
                </a>
            </li>
            <li>
                <a href="{{ secure_url('mybankinfo') }}" class="item">
                    <div class="in">
                        <div>ข้อมูลธนาคาร</div>
                    </div>
                </a>
            </li>
              <li>
                <a href="{{ secure_url('mytransinfo') }}" class="item">
                    <div class="in">
                        <div>ประวัติธุรกรรม</div>
                        <span class="text-primary">ดูทั้งหมด</span>
                    </div>
                </a>
            </li>
        </ul>
        <div class="listview-title mt-1"></div>
        <ul class="listview image-listview text mb-2 inset">
            <li>
                <a href="{{ secure_url('changepassword') }}" class="item">
                    <div class="in">
                        <div>เปลี่ยนรหัสผ่าน</div>
                    </div>
                </a>
            </li>
            <li>
                <a href="{{ secure_url('user/logout') }}" class="item">
                    <div class="in">
                        <div>ออกจากระบบ</div>
                    </div>
                </a>
            </li>
        </ul>
    <!-- * App Capsule -->