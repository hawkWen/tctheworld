@extends('layouts.regis')

@section('content')
<script src='https://www.google.com/recaptcha/api.js'></script>

<div id="recaptcha-container" style="display: none;"></div>

    <!-- App Header -->


{!! Form::open(array('class'=>'form-signup form-material','id'=>'register-form' )) !!}
    <!-- App Capsule -->
    <div id="appCapsule">

        <div class="section mt-2 text-center">
            <h1 class="hello text-light">ยืนยันรหัส OTP</h1>
            <h4 class="hello text-light">กรุณากรอกเลข OTP ที่ส่งไปยังหมายเลข</h4>
            <h2 class="hello text-light">{{ $username }}</h1>
        </div>
        <div class="section mb-5 p-2">

                <div class="form-group basic">
                    <input type="number" class="form-control verification-input" id="smscode"  placeholder="••••••" maxlength="6" >
                </div>


                  <div class="form-button-group transparent">
                      @if(!empty($ref))
                      <input type="hidden" name="ref" value="{{ $ref }}">
                      @endif
                      <input type="hidden" name="username" value="{{ $username }}">
                      <input type="hidden" name="line_userId" value="">
                     <button type="button" class="btn btn-primary btn-block btn-lg" onclick="confirmotp();">ยืนยัน OTP</button>
                </div>

           
        </div>

    </div>

    <div id="appCapsule2" style="display: none;">
      <div class="section mt-2 mb-2">
            <div class="card">
               <div class="card-body pt-2 pb-2">
                    
                 
                        <div class="form-group basic">

                            <div class="input-wrapper">

                                <label class="label text-success" for="password2">รหัสผ่าน</label>
                                {!! Form::password('password', array('id'=>'password2','class'=>'form-control' ,'placeholder'=> __('อย่างน้อย 8 ตัว'))) !!}
                                
                                 <div class="checkbox mb-3">       
                                 <input style="display: inline-block;" type="checkbox" onclick="myFunction()">  
                      <label for="remember" class="text-muted"> แสดงรหัสผ่าน  </label>
                      </div>


                                <i class="clear-input">
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
                        <h4 class="hello text-light">ข้อมูลบัญชี</h4>
                              <div class="form-group basic">
                                  <div class="input-wrapper">
                                      <label class="label text-success" for="select4">ธนาคาร</label>
                                      <select class="form-control custom-select" id="selectbank" name="bank" >
                                          <option value="">==โปรดเลือกธนาคาร==</option>
                                      </select>
                                  </div>
                              </div>
                              <div class="form-group basic">
                                  <div class="input-wrapper">
                                      <label class="label text-success" for="userid1">เลขที่บัญชี</label>
                                      <input type="text" class="form-control" id="userid1" placeholder="ต้องตรงกับชื่อที่ใช้สมัคร" name="account_number" >
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
                                      {!! Form::text('firstname', null, array('class'=>'form-control','placeholder'=> __('ภาษาไทย') )) !!}
                                      <i class="clear-input">
                                          <ion-icon name="close-circle"></ion-icon>
                                      </i>
                                  </div>
                                  
                                
                              </div>
                              <div class="form-group basic">
                                  <div class="input-wrapper">
                                      <label class="label text-success" for="amount1">นามสกุล</label>
                                       {!! Form::text('lastname', null, array('class'=>'form-control', 'placeholder'=> __('ภาษาไทย') )) !!}
                                      <i class="clear-input">
                                          <ion-icon name="close-circle"></ion-icon>
                                      </i>
                                  </div>
                              </div>
                              <div class="form-group basic">
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
                              <div class="form-group basic">
                                  <div class="input-wrapper">
                                      <label class="label text-success" for="select4">รู้จักเราจากช่องทาง</label>
                                      <select class="form-control custom-select" id="selectchannel" name="channel" >
                                          <option value="">==โปรดเลือกคำตอบ==</option>
                                      </select>
                                  </div>
                              </div>
                          
                      </div>
                  </div>
             </div>
         <div class="section mt-2 text-center">
                  <input type="submit" class="btn btn-primary btn-block btn-lg" id="save" value="บันทีก">
        </div>
      

   </div>

    </div>

 {!! Form::close() !!}
   <!-- Insert these scripts at the bottom of the HTML, but before you use any Firebase services -->

  <!-- Firebase App (the core Firebase SDK) is always required and must be listed first -->
  <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-app.js"></script>

  <!-- If you enabled Analytics in your project, add the Firebase SDK for Analytics -->
  <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-analytics.js"></script>

  <!-- Add Firebase products that you want to use -->
  <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-auth.js"></script>
  <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-firestore.js"></script>
    <!-- * App Capsule -->
<script type="text/javascript">

  // Your web app's Firebase configuration
 var firebaseConfig = {
  apiKey: "AIzaSyDqsT5h2G99czY55tymw70v16I3p7gUSwM",
  authDomain: "octobet-9k.firebaseapp.com",
  projectId: "octobet-9k",
  storageBucket: "octobet-9k.appspot.com",
  messagingSenderId: "366370270854",
  appId: "1:366370270854:web:715821cba165758aa12b07",
  measurementId: "G-JJ859NNMMB"
  };


  // Initialize Firebase
  firebase.initializeApp(firebaseConfig);
   firebase.analytics();
  firebase.auth().languageCode = 'th';
  window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier('recaptcha-container', {
  'size': 'invisible',
  'callback': (response) => {
    // reCAPTCHA solved, allow signInWithPhoneNumber.
    //onSignInSubmit();
    
  }
});
  function getotp(){
var tel1 = '{{ $username }}';
var tel2 = tel1.substring(1);
const phoneNumber = '+66'+tel2;
const appVerifier = window.recaptchaVerifier;
firebase.auth().signInWithPhoneNumber(phoneNumber, appVerifier) .then((confirmationResult) => {
      console.log(confirmationResult);
      // SMS sent. Prompt user to type the code from the message, then sign the
      // user in with confirmationResult.confirm(code).
      window.confirmationResult = confirmationResult;
   //   $('#phone-error').hide();
      $('#toast-success-msg').text("OTP ได้ถูกส่งหาคุณแล้ว");
      toastbox('toast-success', 5000);
      $('#appCapsule').show();
      $('#appCapsule2').hide();

     // $('#confirmotpbutton').removeClass("disabled");
      // ...
    }).catch((error) => {
      $('#toast-error-msg').text("เกิดข้อผิดพลาด กรุณาติดต่อแอดมิน");
      toastbox('toast-error', 5000);
      // Error; SMS not sent
      $('#appCapsule2').hide();
    $('#appCapsule').show();
  //    $('#appCapsule2').hide();
    //  $('#appCapsule').show();
      // ...
    });

    
}

function confirmotp(){

  const code = $('#smscode').val();
  confirmationResult.confirm(code).then((result) => {
    // User signed in successfully.
    $('#toast-success-msg').text("ยืนยัน OTP สำเร็จ");
    toastbox('toast-success', 5000);
    const user = result.user;
    $('#appCapsule2').show();
    $('#appCapsule').hide();

  }).catch((error) => {
    $('#toast-error-msg').text("รหัสยืนยัน OTP ไม่ถูกต้อง");
    toastbox('toast-error', 5000);
 
  });
  
}

getotp();


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

                       window.location='{{ secure_url('') }}';
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
