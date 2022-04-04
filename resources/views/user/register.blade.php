@extends('layouts.regis')

@section('content')
<script src='https://www.google.com/recaptcha/api.js'></script>

<div id="recaptcha-container" style="display: none;"></div>

    <!-- App Header -->


{!! Form::open(array('class'=>'form-signup form-material','id'=>'register-form' )) !!}
    <!-- App Capsule -->
    <div id="appCapsule">

        <div class="mb-3 mt-5" style="text-align: center;">
        @if(file_exists(public_path().'/uploads/images/'.config('sximo')['cnf_logo']) && config('sximo')['cnf_logo'] !='')
        <img src="{{ asset('uploads/images/'.config('sximo')['cnf_logo'])}}" alt="{{ config('sximo')['cnf_appname'] }}" class="imaged w-50 square"> 
        @else
        <img src="{{ asset('img/logo-icon.png') }}" alt="icon" class="imaged w-50 square"> 
        @endif
 </div>
        <div class="section mt-2 text-center">
             <h2 class="mb-2 text-primary">สมัครสมาชิก</h2>
            <h4 class="hello text-light">ยืนยันบัญชีธนาคาร</h4>
        </div>
        <div class="section mb-5 p-2">

<div class="mt-2 mb-2">
                            <h4 class="hello text-light">ข้อมูลบัญชี</h4>

                     <div class="card">
                         <div class="card-body pb-1">
                              <div class="form-group basic">
                                  <div class="input-wrapper">
                                      <label class="label text-light pb-1" for="select4">ธนาคาร</label>
                                      <select class="form-control custom-select" id="selectbank" name="bank" >
                                          <option value="">==โปรดเลือกธนาคาร==</option>
                                      </select>
                                  </div>
                              </div>
                              <div class="form-group basic">
                                  <div class="input-wrapper">
                                      <label class="label text-light pb-1" for="userid1">เลขที่บัญชี</label>
                                      <input type="text" class="form-control" id="accountnum" placeholder="ป้อนเลขบัญชีที่ใช้ฝากและรับเงิน" name="account_number" >
                                      <i class="clear-input">
                                          <ion-icon name="close-circle"></ion-icon>
                                      </i>
                                  </div>
                              </div>
                            </div>
                    </div>
            </div>
                  <div class="form-button-group transparent">
                      @if(!empty($ref))
                      <input type="hidden" name="ref" value="{{ $ref }}">
                      <input type="hidden" name="channel" value="7">
                      @endif
                      <input type="hidden" name="line_userId" value="">
                     <button type="button" class="btn btn-primary btn-block btn-lg" onclick="confirmbank();">ยืนยัน</button>
                </div>

           
        </div>

    </div>

    <div id="appCapsule2" style="display: none;">
      <div class="section mt-2 mb-2">
            <div class="card">
               <div class="card-body pt-2 pb-2">
                    
                 	<h4 class="hello text-light">ข้อมูลเข้าสู่ระบบ</h4>
                 	<div class="form-group basic">
                            <div class="input-wrapper">
                                      <label class="label text-success" for="amount1">เบอร์โทรศัพท์ (ใช้เข้าสู่ระบบและสำหรับฝากเงินด้วย Truewallet)</label>
                                      {!! Form::text('username', null, array('class'=>'form-control','placeholder'=> __('ตัวเลข10หลักเท่านั้น'),'id'=>'username' )) !!}
                                      <i class="clear-input">
                                          <ion-icon name="close-circle"></ion-icon>
                                      </i>
                                  </div>
                          </div>
                        <div class="form-group basic">

                            <div class="input-wrapper">

                                <label class="label text-success" for="password2">รหัสผ่าน</label>
                                {!! Form::password('password', array('id'=>'password2','class'=>'form-control' ,'placeholder'=> __('อย่างน้อย 8 ตัว'))) !!}
                                
                                 <div class="checkbox">       
                                 <input style="display: inline-block;" type="checkbox" onclick="myFunction()">  
                      							<label for="remember" class="text-muted"> แสดงรหัสผ่าน  </label>
                      						</div>


                                <i class="clear-input" style="    top: 15px;">
                                    <ion-icon name="close-circle"></ion-icon>
                                </i>
                            </div>
                        </div>
                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label text-success" for="password4">ยืนยันรหัสผ่าน</label>
                                {!! Form::password('password_confirmation', array('id'=>'password4','class'=>'form-control' ,'placeholder'=> __('ยืนยันรหัสผ่านอีกครั้ง'))) !!}
                                <i class="clear-input">
                                    <ion-icon name="close-circle"></ion-icon>
                                </i>
                            </div>
                        </div>
                    
                </div>
            </div>
        </div> 
          
          <div class="section mt-2 mb-2">
                  <div class="card">
                      <div class="card-body pt-2 pb-2">
                        <h4 class="hello text-light">ข้อมูลส่วนตัว</h4>
                          
                          <div class="form-group basic">
                                  

                                  <div class="input-wrapper">
                                      <label class="label text-success" for="amount1">ชื่อจริง</label>
                                      {!! Form::text('firstname', null, array('class'=>'form-control','placeholder'=> __('ภาษาไทย'),'id'=>'firstname','readonly' )) !!}
                                      <i class="clear-input">
                                          <ion-icon name="close-circle"></ion-icon>
                                      </i>
                                  </div>
                                  
                                
                              </div>
                              <div class="form-group basic">
                                  <div class="input-wrapper">
                                      <label class="label text-success" for="amount1">นามสกุล</label>
                                       {!! Form::text('lastname', null, array('class'=>'form-control', 'placeholder'=> __('ภาษาไทย'),'id'=>'lastname','readonly' )) !!}
                                      <i class="clear-input">
                                          <ion-icon name="close-circle"></ion-icon>
                                      </i>
                                  </div>
                              </div>
                              <!--<div class="form-group basic">
                                  <div class="input-wrapper">
                                      <label class="label text-success" for="email4">อีเมล</label>
                                      {!! Form::text('email', null, array('class'=>'form-control', 'placeholder'=> __('ตย. hello@mail.com'))) !!}
                                      <i class="clear-input">
                                          <ion-icon name="close-circle"></ion-icon>
                                      </i>
                                  </div>
                              </div>
                              <div class="form-group basic">
                                  <div class="input-wrapper">
                                      <label class="label text-success" for="lineid">LINE ID</label>
                                      <input type="text" class="form-control" id="lineid" placeholder="ใช้เพิ่มเพื่อนในไลน์" name="lineid" >
                                      <i class="clear-input">
                                          <ion-icon name="close-circle"></ion-icon>
                                      </i>
                                  </div>
                              </div>
                              @if(empty($ref))
                              <div class="form-group basic">
                                  <div class="input-wrapper">
                                      <label class="label text-success" for="select4">รู้จักเราจากช่องทาง</label>
                                      <select class="form-control custom-select" id="selectchannel" name="channel" >
                                          <option value="">==โปรดเลือกคำตอบ==</option>
                                      </select>
                                  </div>
                              </div>
                          		@endif-->
                      </div>
                  </div>
             </div>
         <div class="section mt-2 text-center">
                  <input type="submit" class="btn btn-primary btn-block btn-lg" id="save" value="บันทีก">
        </div>
      

   </div>

    </div>

 {!! Form::close() !!}

<script type="text/javascript">


 

function confirmbank(){


 
 const  bank = $('#selectbank').val();
 const  accountnum = $('#accountnum').val();



   $.ajax({
                                dataType : "json",   
                                type : "POST",
                                data : { "bank":bank,"accountnum":accountnum }, 
                                url :'{{ secure_url('') }}/scb/verifyaccount.php', 
                                success : function(data){
                                   console.log(data);
                                         
                                       if(data.code==404){
                                           $('#toast-error-msg').html(data.desc);
                                           toastbox('toast-error', 5000);
                                        }else if(data.code==0){
                                            $('#toast-success-msg').html('ดึงข้อมูลสำเร็จ');
                                            toastbox('toast-success', 5000);
                                            $('#firstname').val(data.firstName);
                                            $('#lastname').val(data.lastName);
                                            $('#appCapsule2').show();
                                            $('#appCapsule').hide();
                                        }
                            }

                });
  
}


$.ajax({
            dataType    : "json",
             url : '{{ secure_url('') }}/sximoapi?module=banks',
headers : {"Authorization": "Basic " + btoa("admin@octobet.co:hWF6tn-sCMMp-b3zUDn-UZQ8w")},
            success     : function(data){
             // console.log(data.rows);

              data.rows.forEach(function(entry) {
                   
                    $('#selectbank').append($('<option>',
                     {
                        value: entry.bank_id,
                        text : entry.bank_name
                    }));
                });
                  
} });

$.ajax({
            dataType    : "json",
             url : '{{ secure_url('') }}/sximoapi?module=channel',
headers : {"Authorization": "Basic " + btoa("admin@octobet.co:hWF6tn-sCMMp-b3zUDn-UZQ8w")},
            success     : function(data){
             // console.log(data.rows);

              data.rows.forEach(function(entry) {
                
                    $('#selectchannel').append($('<option>',
                     {
                        value: entry.channel_id,
                        text : entry.channel_name
                    }));
                });
                  
} });




$( "#register-form" ).submit(function( event ) {
    $(':input[type="submit"]').prop('disabled', true);
        $.ajax({
          url: "{{ secure_url('') }}/user/create",
          method: "POST",
          data: $("#register-form").serialize(),
          success: function (res, status) { 
                    var text = res.message;
                    var html = '';
                      for(var k in text) {
                         html += text[k][0] + '<br>';
                      }
                    
                    if(res.status=='error'){
                       $('#toast-error-msg').html("'"+html+"'");
                       toastbox('toast-error', 5000);
                       $(':input[type="submit"]').prop('disabled', false);
                    }else if(res.status=='success'){
                       $('#toast-success-msg').text("สมัครสมาชิกสำเร็จ");
                       toastbox('toast-success', 5000);

                       window.location='{{ secure_url('user/login') }}';
                    }else{
                        $('#toast-error-msg').html("เกิดข้อผิดพลาดกรุณารอสักครู่");
                        toastbox('toast-error', 5000);
                    }
            }
        });
        return false; 
});

   function myFunction() {
  var x = document.getElementById("password2");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>

    <!-- toast center iconed -->
        <div id="toast-error" class="toast-box toast-center">
            <div class="in">
                <ion-icon name="close-circle" class="text-danger"></ion-icon>
                <div class="text" id="toast-error-msg"></div>
            </div>
            <button type="button" class="btn btn-sm btn-text-light close-button">CLOSE</button>
        </div>
    <!-- toast center iconed -->

        <!-- toast center iconed -->
        <div id="toast-success" class="toast-box toast-center">
            <div class="in">
                <ion-icon name="checkmark-circle" class="text-success"></ion-icon>
                <div class="text" id="toast-success-msg"></div>
            </div>
            <button type="button" class="btn btn-sm btn-text-light close-button">CLOSE</button>
        </div>
        <!-- toast center iconed -->






@stop
