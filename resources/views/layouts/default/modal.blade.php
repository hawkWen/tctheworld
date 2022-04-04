        <div class="modal fade action-sheet" id="actionSheetInset" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">กรุณาเลือกช่องทางฝากเงิน</h5>
                    </div>
                    <div class="modal-body">
                        <ul class="action-button-list">
                            <li>
                                <a href="#" class="btn btn-list" data-toggle="modal" data-target="#actionSheetAlertError" data-dismiss="modal">
                                    <span>โอนผ่านบัญชีธนาคาร</span>
                                </a>
                            </li>
                         
                            <li>
                                <a href="#" class="btn btn-list" data-toggle="modal" data-target="#actionSheetAlertImaged" data-dismiss="modal">
                                    <div class="in">
                                        <div>ทรูมันนี่วอลเล็ท</div>
                                    </div>
                                </a>
                            </li>
                            <li class="action-divider"></li>
                            <li>
                                <a href="#" class="btn btn-list text-danger" data-dismiss="modal">
                                    <span>ยกเลิก</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- * Default Action Sheet Inset    <li>
                                <a href="#" class="btn btn-list" data-toggle="modal" data-target="#actionSheetqr" data-dismiss="modal">
                                    <span>แสกน QR Code</span>
                                </a>
                            </li>-->
       
        
        <!-- Alert Error Action Sheet -->
        <div class="modal fade action-sheet" id="actionSheetAlertError" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">โอนผ่านบัญชีธนาคาร</h5>
                    </div>
                    <div class="modal-body">
                        <div class="action-sheet-content">

                
                           
					<div class="alert alert-imaged alert alert-custom alert-light-danger fade show mb-2 text-center" role="alert">
                            <div class="icon-wrap">
                                <ion-icon name="alert-circle-outline" role="img" class="md hydrated text-danger" aria-label="card outline"></ion-icon>
                            </div>
                            <P class="text-danger text-center" style="line-height: 24px;">
                               ต้องใช้บัญชีชื่อ {{ $user->first_name }} {{ $user->last_name }} <br>เลขที่บัญชี {{ $user->account_number }} เท่านั้น
                            </p>
                      
                        </div>
                         
                                  <div class="transactions mb-2"> 
                                     @foreach($bank_web as $webbank)
                                        @if($webbank->use=="depositbank")
                                    <a  href="#" class="item" style="box-shadow:none;"  onclick="copy()">

                                        <div class="detail">
                                             <img src="{{ asset('/uploads/images/bank/'.$webbank->bank_logo) }}" alt="img" class="image-block imaged w60">
                                            <div>
                                                      <h3 class="hello text-dark" id="to-copy">{{ $webbank->bank_account_no }}</h3>
                                                 
                                                     <h3 class="hello text-dark">{{ $webbank->bank_account_name }}</h3>   
                                       </div>

				                               <div class="right">
                                                    <div class="price text-success"> <button id="copy-button" type="button" data-toggle="tooltip" data-placement="top" title="" data-original-title="คัดลอกหมายเลขบัญชีแล้ว" class="btn btn-dark"><i class="ion ion-ios-copy"></i> คัดลอก</button></div>
                                                </div>
                                            </div>

                                    </a> 
                                        @endif
                                    @endforeach 
                            </div> 

                            <a href="#" class="btn btn-primary btn-lg btn-block" data-dismiss="modal">เรียบร้อย</a>
                            <!-- You just need to get this field. -->
                            <!-- You just need to get this field. -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- * Alert Error Action Sheet -->
              <!-- Alert Error Action Sheet -->
        <div class="modal fade action-sheet" id="actionSheetqr" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">            <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">เลือกจำนวนที่ต้องการโอน</h5>
                    </div>
                <div class="modal-body">
                     <div class="action-sheet-content text-center">
                            <form>
                                <div class="btn-group btn-group-toggle text-center" data-toggle="buttons">
                                     <label class="btn btn-outline-success active">
                                        <input type="radio" name="addamount[]" checked="" value="200">200฿
                                     </label>
                                     <label class="btn btn-outline-success">
                                        <input type="radio" name="addamount[]" value="300">300฿
                                    </label>
                                    <label class="btn btn-outline-success">
                                        <input type="radio" name="addamount[]" value="500"> 500฿
                                    </label>
                             

                                    <label class="btn btn-outline-success">
                            <input type="radio" name="addamount[]" value="1000"> 1000฿
                        </label>
                         <label class="btn btn-outline-success">
                            <input type="radio" name="addamount[]" ivalue="3000"> 3000฿
                        </label>
                         <label class="btn btn-outline-success">
                            <input type="radio" name="addamount[]" value="5000"> 5000฿
                        </label>
                           <label class="btn btn-outline-success">
                            <input type="radio" name="addamount[]" value="10000"> 10,000฿
                        </label>
                                </div>


                                <div class="form-group basic mt-2 mb-2">

                                             <label class="label" for="text1">หรือระบุยอดที่ต้องการโอน (ขั้นต่ำ100฿​)</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="input2">฿</span>
                                        </div>
                                        <input type="number" class="form-control form-control-lg text-dark" value="100" id="amount" >
                                              <span class="input-group-text">.00</span>
                                    </div>
                                </div>
                  <button id="genqr" class="btn btn-primary btn-block btn-lg" data-toggle="modal" data-target="#actionSheetAlertscanqrcode" data-dismiss="modal">
                                    <div class="in">
                                        <div>ยืนยัน</div>
                                    </div>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- * Alert Error Action Sheet -->

<!-- dot -->
        <div class="modal fade action-sheet" id="actionSheetAlertdot" tabindex="-1" role="dialog">


             <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">ยอดที่ต้องการโอน</h5>
                    </div>
                <div class="modal-body">
                     <div class="action-sheet-content">
                       
                              <form>
                             

                                <div class="form-group basic">
                                    <label class="label">ยอดโอน</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="input1">฿</span>
                                        </div>
                                        <input type="number" class="form-control form-control-lg text-dark" id="amountdot" value="0">
                                    </div>
                                </div>

 <button id="gendot" class="btn btn-primary btn-block btn-lg" data-toggle="modal" data-target="#actionSheetAlertdotdeposit" data-dismiss="modal">
                                    <div class="in">
                                        <div>ยืนยัน</div>
                                    </div>
                                </button>

                      
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>


<!-- end dot        <div class="modal fade action-sheet" id="actionSheetAlertdot" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">เลือกจำนวนที่ต้องการโอน</h5>
                    </div>
                <div class="modal-body">
                     <div class="action-sheet-content text-center">
                        <button type="button" class="btn btn-outline-primary mr-1 mb-1" name="addamount" value="1">+1฿</button>
                         <button type="button" class="btn btn-outline-primary mr-1 mb-1" name="addamount" value="10">+10฿</button>
                         <button type="button" class="btn btn-outline-primary mr-1 mb-1" name="addamount" value="15">+15฿</button>
                         <button type="button" class="btn btn-outline-primary mr-1 mb-1" name="addamount" value="100">+100฿</button>
                         <button type="button" class="btn btn-outline-primary mr-1 mb-1" name="addamount" value="500">+500฿</button>
                            <form>
                                <div class="btn-group btn-group-toggle btn-block text-center" data-toggle="buttons" id="dotamount">
                                     <label class="btn btn-outline-primary active">
                                        <input type="radio" name="addamount" checked="" value="0">C
                                     </label>
                                      <label class="btn btn-outline-primary">
                                        <input type="radio" name="addamount" value="1">+1฿
                                    </label>
                                     <label class="btn btn-outline-primary">
                                        <input type="radio" name="addamount" value="10">+10฿
                                     </label>
                                <label class="btn btn-outline-primary">
                                        <input type="radio" name="addamount" value="15">+15฿
                                     </label>
                                     <label class="btn btn-outline-primary">
                                        <input type="radio" name="addamount" value="100">+100฿
                                     </label>
                                     <label class="btn btn-outline-primary">
                                        <input type="radio" name="addamount" value="500">+500฿
                                    </label>
                            
                                    
                                </div>


                                <div class="form-group basic mb-2">

                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="input2"></span>
                                        </div>
                                        <input type="number" class="form-control form-control-lg" value="0" id="amountdot" >      <span class="input-group-text">.00</span> <span class="input-group-text" id="input2">฿</span>

                                    </div>
                                </div>
                  <button id="gendot" class="btn btn-primary btn-block btn-lg" data-toggle="modal" data-target="#actionSheetAlertdotdeposit" data-dismiss="modal">
                                    <div class="in">
                                        <div>ยืนยัน</div>
                                    </div>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        
        -->  
        <div class="modal fade action-sheet" id="actionSheetAlertdotdeposit" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">โอนแบบทศนิยม</h5>
                    </div>
                    <div class="modal-body">
                        <div class="action-sheet-content">
                             <div class="splash-page">
                              
                
                   <div class="transactions mb-2 mt-2 text-center"> 
                   <a href="#" class="item" style="box-shadow:none;" onclick="copy()">

                                        <div class="detail">
                                             <div class="left">
                                                     <img src="https://app.octobet.co/img/sample/avatar/avatar3.jpg" alt="img" class="image-block imaged w60">
                                                 
                                                </div>

                        <div>
                                                   <h3 class="hello text-dark" id="to-copy-dot">4390536595</h3>
                                                     <h3 class="hello text-dark">ศราวุธ พานประทีป</h3>   
                                       </div>
                                            

                                                <div class="right">
                                                    <div class="price text-success"> <button id="copy-button-dot" type="button" data-toggle="tooltip" data-placement="top" title="" data-original-title="คัดลอกหมายเลขบัญชีแล้ว" class="btn btn-dark"><i class="ion ion-ios-copy"></i> คัดลอก</button></div>
                                                </div>
                                            </div>
                                    </a>
                                      <h1 class="hello text-dark mt-2 mb-2"><span id="dot_amount">0</span>.<span id="dot_dot">26</span>฿</h1>

                                    <div class="alert alert-imaged alert alert-custom alert-light-danger fade show mb-2 text-center" role="alert">
                            <div class="icon-wrap">
                                <ion-icon name="alert-circle-outline" role="img" class="md hydrated text-danger" aria-label="card outline"></ion-icon>
                            </div>

                            <P class="text-danger" style="line-height: 24px;">
                            <?php echo date('d/m/Y H:i', strtotime("+5 min")); ?>
                            </p>
                      
                        </div>
                            </div>


         

                                   
            </div><a href="#" class="btn btn-primary btn-lg btn-block" data-dismiss="modal">เรียบร้อย</a>
                        </div>


                    </div>
                </div>

            </div> 
        </div>
<!-- end dot -->
<!--  true qr
<div class="modal fade action-sheet" id="actionSheetAlertImaged" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                     <div class="modal-header">
                        <h5 class="modal-title">กรุณาสแกน QR Code ด้วยแอพ <span style="color:#ed1c24;font-weight:600;">ทรูมันนี่</span><span style="color:#f58220;font-weight:600;">วอลเล็ท</span></h5>
                    </div>
                    <div class="modal-body">
                        <div class="action-sheet-content">
                            <div class="transactions mb-2" style="text-align:center;"> 
                                    <a href="/img/qrtrue.png" download>
                                        <img src="/img/qrtrue.png" alt="img" class="image-block imaged mb-1 mt-1" style="width:200px;">
                                  

                                                 <h3 class="hello text-dark text-center">ลักษณ์นารา อิศรานนท์   </h3>
                                                 <button id="copy-button-dot" type="button" data-toggle="tooltip" data-placement="top" title="" data-original-title="บันทึกภาพ" class="btn btn-dark"><i class="ion ion-ios-save"></i> กดเพื่อบันทึกรูปภาพ</button>
                                
                                    </a>

                                 


                                     
                                      <h5 class="hello text-danger text-center modal-title mt-1">ต้องใช้บัญชีชื่อ {{ $user->first_name }} {{ $user->last_name }} </h5>   
                            </div> 

                            <a href="#" class="btn btn-primary btn-lg btn-block" data-dismiss="modal">เรียบร้อย</a>
                        </div> 
                    </div>
                </div> 
            </div>  
        </div> 
-->
        <!-- Alert Imaged Action Sheet-->
        <div class="modal fade action-sheet" id="actionSheetAlertImaged" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                     <div class="modal-header">
                        <h5 class="modal-title">ทรูมันนี่วอลเล็ท</h5>
                    </div>
                    <div class="modal-body">
                     <div class="action-sheet-content">
                        <div class="alert alert-imaged alert alert-custom alert-light-danger fade show mb-2 text-center" role="alert">
                            <div class="icon-wrap mb-2">
                            <ion-icon name="alert-circle-sharp"></ion-icon>

                            </div>
                            <P class="text-danger" style="line-height: 24px;">
                            ต้องใช้บัญชีชื่อ {{ $user->first_name }} {{ $user->last_name }}  <br>เบอร์โทร {{ $user->phone }} เท่านั้น  
                            </p>
                            </div> 
                            <div class="transactions mb-2"> 
                                @foreach($bank_web as $webbank)
                                        @if($webbank->use=="truewallet")
                                    <a  href="#" class="item" style="box-shadow:none;" onclick="copy()">
                                       <div class="detail">
                                             <img src="{{ asset('/uploads/images/bank/'.$webbank->bank_logo) }}" alt="img" class="image-block imaged w60">

                                            <div>

                                                      <h3 class="hello text-dark" id="to-copy-true">{{ $webbank->bank_account_no }}</h3>
                                                 
                                                     <h3 class="hello text-dark">{{ $webbank->bank_account_name }}</h2>   
                                       </div>
                                <div class="right">
                                    <div class="price text-success">

                                        <button id="copy-button-true" type="button" data-toggle="tooltip" data-placement="top" title="" data-original-title="คัดลอกแล้ว" class="btn btn-dark"><i class="ion ion-ios-copy"></i> คัดลอก</button>
                                    </div>
                                </div>
                                        </a> 
                                    @endif
                                @endforeach
                                </div> 
                            </div> 
                            <a href="#" class="btn btn-primary btn-lg btn-block" data-dismiss="modal">เรียบร้อย</a>
                         

                  
                         
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        <!-- * Alert Imaged Action Sheet -->
        <!-- Deposit Action Sheet -->
        <div class="modal fade action-sheet" id="depositActionSheet" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">ถอนเงิน</h5>
                    </div>
                    <div class="modal-body">
                        <div class="action-sheet-content">
                           

                                  <div class="transactions mb-2"> 
                                    <a  href="#" class="item" style="box-shadow:none;" onclick="copy()">

                                        <div class="detail">
                                             <img src="{{ asset('img/sample/avatar/avatar3.jpg') }}" alt="img" class="image-block imaged w60">
                                            <div>
                                                   <button type="button" data-toggle="tooltip" data-placement="top" title="" data-original-title="คัดลอกหมายเลขบัญชีแล้ว" class="btn btn-outline-dark mr-1 mb-1">2982409704 &nbsp<i class="far fa-copy" style="padding-right: 0;"> </i></button>
                                                     <p>สุทธิพงศ์ สารชาติ</p>
                                            </div>
                                       </div>
                                    </a> 
                            </div> 

                  
                        
                        </div>
                    </div>
                </div>

            
            </div>
        </div>
        
        <!-- Withdraw Action Sheet -->
        <div class="modal fade action-sheet" id="withdrawActionSheet" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">ถอนเงิน</h5>
                    </div>
                    <div class="modal-body">
                        <div class="action-sheet-content">
                            <form>
                                <div class="transactions mb-2"> 
                                    <a  href="#" class="item" style="box-shadow:none;">

                                        <div class="detail">
                                             <img src="/uploads/images/banks/{{ $bankuser->bank_logo }}" alt="img" class="image-block imaged w60">
                                            <div>
                                               <strong>  {{ $user->account_number }} </strong>
                                                    <p>{{ $user->first_name }} {{ $user->last_name }}</p>
                                                    @if(!empty($promotions_current_user))
                                                    <h4 class="hello text-dark pt-2">ถอนทั้งหมด {{ $user->bonus }} เครดิต<br>
                                                        (ถอนได้ {{ $promotions_current_user->withdraw_amount }} บาท เครดิตที่เหลือตัดออก)</h>
                                                    @else
                                                    <h4 class="hello text-dark pt-2">ถอนทั้งหมด {{ $user->balance }}฿</h4>
                                                    @endif
                                            </div>
                                       </div>

                                    </a> 
                            </div> 
                             <button type="button" class="btn btn-primary btn-block btn-lg" data-dismiss="modal" id="withdrawbutton" onclick="addwithdraw({{ $user->id }})">ถอนเงิน</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- * Withdraw Action Sheet -->
       
<script>
        function copyById(containerId) {
  var range_ = document.createRange(); // create new Range object
  range_.selectNode(document.getElementById(containerId)); // set our Range to contain the Node we want to copy from
  window.getSelection().removeAllRanges(); // remove any previous selections
  window.getSelection().addRange(range_); // select
  document.execCommand("copy"); // copy to clipboard
  window.getSelection().removeAllRanges(); // remove selection
}

// add onClick event handler to your button with additional function() to not invoke copyById immediately:
document.getElementById('copy-button').onclick = function() {
  copyById('to-copy');
}

document.getElementById('copy-button-true').onclick = function() {
  copyById('to-copy-true');
}

document.getElementById('copy-button-dot').onclick = function() {
  copyById('to-copy-dot');
}




</script>