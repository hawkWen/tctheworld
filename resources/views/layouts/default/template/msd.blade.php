    <script src="js/libs/jquery.min.js"></script>
        <script src="js/libs/jquery.ui.highlight.min.js"></script>
    
        <script src="js/pandalocker.2.3.1.js?6"></script>
        <link type="text/css" rel="stylesheet" href="css/pandalocker.2.3.1.min.css" />


 <div class="section tab-content mt-2 mb-2">

            <div class="row">
                <div class="col-12 mb-2">
                    <img src="/uploads/images/promotions/{{ $mission_data->image }}" alt="image" class="imaged img-fluid mb-2">

                        <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-608277f9718f18d1"></script>
                            <div class="addthis_inline_share_toolbox"></div>
                                <div class="blog-card bg-white mb-2 mt-2">
                            
                                    <div class="text">
                                        <h4 class="title text-light"> <?php echo \PostHelpers::formatContent($mission_data->promotion_detail); ?></h4>
                                    </div>
                                </div>
                 

               
                </div>
               
            </div>

        
            <div class="row to-lock" style="display: none;">
          
                            <div class="col-12 mb-2">
                             
                                   <a href="#" onclick="addmission({{ $mission_data->id }})" class="btn btn-block btn-white">
                                        รับเครดิตฟรีเลย
                                        </a>
                            </div>
            </div>
</div>

{!! $mission_data->note  !!}

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
                                            }, 3000);
                                        }
                            } 
                        });
    }
</script>