<div class="section mt-2 mb-2">
    <div class="blog-card mb-2">
        <img data-cfsrc="/img/cashback.png" alt="image" class="imaged w-100" src="/img/cashback.png">
        <div class="text">
            <h4 class="text-light text-center">  ยอดเสียที่ไม่รับโปรโมชั่น <h4>
                <h3 class="text-light text-center">
                                    @if(!empty($cashback->winloss))
                                    <span class="text-success">{{ number_format($cashback->winloss,2) }}</span> = 
                                        @if($cashback->winloss>0&&$cashback->winloss>299)
                                        <span class="text-success" id="wlreturn">+{{ number_format($cashback->winloss*0.1,2) }}</span>
                                        @else
                                        <span class="text-danger">{{ number_format($cashback->winloss*0.1,2) }}</span>
                                        @endif
                                    @else
                                        <span class="text-danger">0</span>
                                    @endif บาท
                                </h3>
           
            <div class="row ">
                <div class="col">    @if(!empty($cashback->winloss)&&$cashback->get_wl_nopro==0&&$cashback->winloss>299)
                    <a href="#" class="btn btn-primary btn-block" id="claimwinloss" style="font-weight: bold;">รับเงินคืน</a>
                                     @else
                    <a href="#" class="btn btn-secondary btn-block" style="font-weight: bold;">คุณได้รับไปแล้ว หรือยังไม่มีสิทธิรับ</a>            
                                     @endif
                    <div id="timeUpdate" style="color: rgba(255, 255, 255, 0.35); text-align: center; margin-top: 10px; font-size: 14px;">
                        รีเซ็ตใหม่ทุกวัน เวลา <span class="text-success">00:00 น.</span> <br>ยอดเสียต้องมากกว่า <span class="text-success">300 บาท</span> ถึงจะมีสิทธิรับ
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="toast-3" class="toast-box toast-top bg-success">
            <div class="in">
                <ion-icon name="cash-outline" class="text-white"></ion-icon>
                <div class="text" id="claim-success-msg"> </div>
            </div>
            <button type="button" class="btn btn-sm btn-text-light close-button">ปิด</button>
</div>
<!--
    <div class="modal-dialog" role="document">
                <div class="modal-content">
                    
                    <div class="modal-body">
                        <div class="action-sheet-content">

                            <form>
                                <div class="form-group basic">
                                    <div class="input-wrapper">
                                        <label class="label" for="account1">เลือกประเภท สล็อต/คาสิโน</label>
                                        <select class="form-control custom-select" id="claimtype">
                                            <option value="0">สล็อต</option>
                                            <option value="1">คาสิโน</option>
                                        </select>
                                    </div>
                                    <div class="input-info">วิธีคำนวน ยอดเทิร์น - Casino: 0.7% - Slot: 0.2%</div>
                                </div>

                                <div class="form-group basic">
                                    <label class="label">จำนวนที่ได้คืน</label>
                                         <div class="text-success">
                  <spam id="claimtext"></spam> <br>

                </div>
                                    
                                    <div class="input-info text-danger">สามารถกดรับเครดิตได้สูงสุด 1,000,000.00 ต่อเดือน</div>
                                </div>



                                <div class="form-group basic">
                                    <button type="button" id="claimturn" class="btn btn-primary btn-sm btn-block">กดรับเครดิต</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
    </div>
    
-->