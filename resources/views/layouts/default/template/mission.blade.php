<div class="section mt-2">
            <div class="blog-card">
               
                 <div class="card-body pt-0">              
                    <form>
                        <div class="form-group boxed p-0">
                            <input type="text bg-secondary" class="form-control mt-2 text-center" id="redeem" value="" placeholder="กรอกโค้ด6หลัก" >

                               </div>
                        

                            <button type="button" id="redeem-button" onclick="addredeem()" class="btn btn-primary btn-block mt-2">
                       
                       กรอกโค้ดรับเครดิตฟรี
                    </button>
             
                    </form>
                </div>
             
            </div>
        </div>
      

            <div class="section tab-content mt-2 mb-1 pl-4 pr-4">

               
               <div class="row">
                  @foreach($promotions as $bankuser)
                  
                        <div class="col-12 mb-2">
                             
                           

                                <div class="blog-card mb-2" >
                                  
                                    <img src="/uploads/images/promotions/{{ $bankuser->image }}" alt="image" class="imaged w-100">
                                    <div class="text">
                                        <h4 class="text-light text-center">{{ $bankuser->promotion_name }}</h4>
                                      <div class="row ">
                                    
                                    <div class="col">
                                       <a href="" class="btn btn-primary btn-block" data-toggle="modal" data-target="#addmission{{ $bankuser->id }}">ร่วมกิจกรรม</a>
                                    </div>
                                </div>
                                    </div>
                                   
                                </div>
                           
                               
                       
                       
            
                     <div class="modal fade dialogbox" id="addmission{{ $bankuser->id }}" data-backdrop="static" tabindex="-1" role="dialog">
                                                <div class="modal-dialog" role="document">
                                                    
                                                    <div class="modal-content pr-2 pl-2">
                                                      <div class="modal-header">
                                                               <h5 class="modal-title">อ่านรายละเอียดก่อน</h5>
                                                     
                                                        </div>
                                                       
                                                        <div class="modal-body m-0 p-0 text-dark"><?php echo \PostHelpers::formatContent($bankuser->promotion_detail); ?></div>
                                                        <div class="modal-footer">
                                                            <div class="btn-inline">
                                                                <a href="#" class="btn btn-text-danger" data-dismiss="modal" onclick="notification('notification-10', 3000)">
                                                                    <ion-icon name="close-outline"></ion-icon>
                                                                    ยกเลิก
                                                                </a>
                                                                <a href="#" class="btn btn-text-success" data-dismiss="modal" onclick="addmission({{ $bankuser->id }})">
                                                                    <ion-icon name="checkmark-outline"></ion-icon>
                                                                   ยอมรับ
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- * Dialog Image -->
                                         </div>

                                          </div>   
                 @endforeach
                </div>

            </div>
                
            
        <div id="toast-4" class="toast-box toast-top">
            <div class="in">
                <div class="text">
                    รายการสำเร็จ
                </div>
            </div>
        </div>
      
                    <div id="notification-10" class="notification-box">
                        <div class="notification-dialog ios-style">
                            <div class="notification-header">
                                <div class="in">
                                    <strong>การแจ้งเตือนการยกเลิก</strong>
                                </div>
                                <div class="right">
                                    <span>เมื่อสักครู่นี้</span>
                                    <a href="#" class="close-button">
                                        <ion-icon name="close-circle"></ion-icon>
                                    </a>
                                </div>
                            </div>
                            <div class="notification-content">
                                <div class="in">
                                    <h3 class="subtitle">คุณได้ยกเลิกการทำรายการแล้ว</h3>
                                </div>
                                <div class="icon-box text-danger">
                                    <ion-icon name="close-circle-outline"></ion-icon>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="notification-11" class="notification-box">
                        <div class="notification-dialog ios-style">
                            <div class="notification-header">
                                <div class="in">
                                    <strong>การแจ้งเตือนไม่สำเร็จ</strong>
                                </div>
                                <div class="right">
                                    <span>เมื่อสักครู่นี้</span>
                                    <a href="#" class="close-button">
                                        <ion-icon name="close-circle"></ion-icon>
                                    </a>
                                </div>
                            </div>
                            <div class="notification-content">
                                <div class="in">
                                    <h3 class="subtitle">ขอโทษค่ะระบบไม่สามารถทำรายการได้</h3>
                                    <div class="text"  id="noti-error-msg"></div>
                                </div>
                                <div class="icon-box text-danger">
                                    <ion-icon name="alert-circle-outline"></ion-icon>
                                </div>
                            </div>
                            <div class="notification-footer">
                                <a href="#" class="notification-button">
                                    <ion-icon name="card-outline"></ion-icon>
                                    ยกเลิก
                                </a>
                            </div>
                        </div>
                    </div>

                    <div id="notification-12" class="notification-box">
                        <div class="notification-dialog ios-style">
                            <div class="notification-header">
                                <div class="in">
                                    <strong>การแจ้งเตือนสำเร็จ</strong>
                                </div>
                                <div class="right">
                                    <span>เมื่อสักครู่นี้</span>
                                    <a href="#" class="close-button">
                                        <ion-icon name="close-circle"></ion-icon>
                                    </a>
                                </div>
                            </div>
                            <div class="notification-content">
                                <div class="in">
                                    <h3 class="subtitle" id="noti-success-msg">คุณทำรายการสำเร็จ
                                    </h3>
                                </div>
                                <div class="icon-box text-success">
                                    <ion-icon name="checkmark-circle-outline"></ion-icon>
                                </div>
                            </div>
                        </div>
                    </div>

                    
                    <!-- Dialog Iconed Inline -->
                    <div class="modal fade dialogbox" id="DialogIconedButtonInline2" data-backdrop="static" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-icon text-warnning">
                                    <ion-icon name="add-circle-sharp"></ion-icon>
                                </div>
                                <div class="modal-header">
                                    <h5 class="modal-title">ต้องการร่วมกิจกรรม?</h5>
                                </div>
                                <div class="modal-footer">
                                    <div class="btn-inline">
                                        <a href="#" class="btn btn-text-primary" data-dismiss="modal" onclick="notification('notification-10', 3000)">
                                            <ion-icon name="close-outline"></ion-icon>
                                            ยกเลิก
                                        </a>
                                        <a href="#" class="btn btn-text-primary" data-dismiss="modal" onclick="notification('notification-11', 3000)">
                                            <ion-icon name="checkmark-outline"></ion-icon>
                                            ตกลง
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- * Dialog Image -->
                    </div>
                    <div class="modal fade dialogbox" id="DialogIconedButtonInline" data-backdrop="static" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-icon text-warnning">
                                    <ion-icon name="add-circle-sharp"></ion-icon>
                                </div>
                                <div class="modal-header">
                                    <h5 class="modal-title">ต้องการร่วมกิจกรรม?</h5>
                                </div>
                                <div class="modal-footer">
                                    <div class="btn-inline">
                                        <a href="#" class="btn btn-text-primary" data-dismiss="modal" onclick="notification('notification-10', 3000)">
                                            <ion-icon name="close-outline"></ion-icon>
                                            ยกเลิก
                                        </a>
                                        <a href="#" class="btn btn-text-primary" data-dismiss="modal" onclick="notification('notification-12', 3000)">
                                            <ion-icon name="checkmark-outline"></ion-icon>
                                            ตกลง
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- * Dialog Image -->
                    </div>


       
<script type="text/javascript">
    function addmission(proid){
         $.ajax({
                                dataType : "json",
                                type : "POST",
                                data : { "proid":proid }, 
                                url :'{{ secure_url('/userpromotion/addmission') }}', 
                                success : function(data){
                               //     console.log(data);
                                         
                                       if(data.status=='error'){
                                           $('#noti-error-msg').html(data.message);
                                           notification('notification-11', 3000);
                                        }else if(data.status=='success'){
                                            $('#noti-success-msg').html(data.message);
                                           notification('notification-12', 3000);
                                           setTimeout(function() {
                                                window.location='{{ secure_url('') }}';
                                            }, 2000);
                                        }
                            } 
                        });
    }

function addredeem(){
  var code = jQuery( "#redeem" ).val();

                        $.ajax({
                                dataType : "json",
                                type : "POST",
                                data : { "code":code }, 
                                url :'{{ secure_url('/userpromotion/addcoupon') }}', 
                                success : function(data){
                               //     console.log(data);
                                         
                                       if(data.status=='error'){
                                           $('#noti-error-msg').html(data.message);
                                           notification('notification-11', 3000);
                                        }else if(data.status=='success'){
                                            $('#noti-success-msg').html(data.message);
                                           notification('notification-12', 3000);
                                           setTimeout(function() {
                                                window.location='{{ secure_url('') }}';
                                            }, 2000);
                                        }
                            } 
                        });

}


</script>
    <!-- * App Capsule -->