<!-- App Capsule -->
        
        <div class="wallet-card-balance mt-3 text-center">
            <ion-icon name="wallet-outline" style="font-size: 30px;" role="img" class="md hydrated" aria-label="wallet outline"></ion-icon>
            <h4>กระเป๋าเงิน</h4>
            <h3></h3>
        </div>
        <div class="listview-title mt-1"></div>
      <ul class="listview image-listview text inset">
            <!--<li>
                <div class="item">
                    <div class="in">
                        <div>
                            รับโบนัสอัตโนมัติ
                            <div class="text-muted">
                                โปร ฝาก 99 รับ 300 บาท !! สุดคุ้ม เล่นได้ทุกวัน
                            </div>
                        </div>
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" id="customSwitch4" checked />
                            <label class="custom-control-label" for="customSwitch4"></label>
                        </div>
                    </div>
                </div>
            </li>-->
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
                <a href="{{ secure_url('change-password') }}" class="item">
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