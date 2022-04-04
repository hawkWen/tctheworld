@extends('layouts.regis')

@section('content')
<script src='https://www.google.com/recaptcha/api.js'></script>

<div id="recaptcha-container" style="display: none;"></div>

    <!-- App Header -->


{!! Form::open(array('class'=>'form-signup form-material','id'=>'register-form' )) !!}
    <!-- App Capsule -->
    <div id="appCapsule">

        <div class="section mt-2 text-center text-primary">
            <h1 class="hello text-primary">ยืนยันรหัส OTP</h1>
            <h4 class="hello text-primary">กรุณากรอกเลข OTP ที่ส่งไปยังหมายเลข</h4>
            <h2 class="hello text-primary">{{ $username }}</h1>
        </div>
        <div class="section mb-5 p-2">

                <div class="form-group basic">
                    <input type="number" class="form-control verification-input" id="smscode"  placeholder="••••••" maxlength="6" >
                </div>


                  <div class="form-button-group transparent">
                      
                      <input type="hidden" name="username" value="{{ $username }}">
                      <input type="hidden" name="line_userId" value="">
                     <button type="button" class="btn btn-primary btn-block btn-lg" onclick="confirmotp();">ยืนยัน OTP</button>
                </div>

           
        </div>

    </div>

    <div id="appCapsule2" style="display: none;" >
      <div class="section mt-2 mb-2" style="padding-top: 60px;">
            <div class="card">
               <div class="card-body pt-2 pb-2" >
                    
                 
                        <div class="form-group basic">

                            <div class="input-wrapper">

                                <label class="label text-primary" for="password2">รหัสผ่านใหม่</label>
                                {!! Form::password('password', array('id'=>'password2','class'=>'form-control' ,'placeholder'=> __('อย่างน้อย 6 ตัว'))) !!}
                                
                                 <div class="checkbox mb-3">       
                                 <input style="display: inline-block;" class="text-primary" type="checkbox" onclick="myFunction()">  
                      <label for="remember" class="text-muted"> แสดงรหัสผ่าน  </label>
                      </div>


                                <i class="clear-input">
                                    <ion-icon name="close-circle"></ion-icon>
                                </i>
                            </div>
                        </div>
                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label text-primary" for="password4">ยืนยันรหัสผ่านใหม่</label>
                                {!! Form::password('password_confirmation', array('id'=>'password4','class'=>'form-control' ,'placeholder'=> __('ยืนยันรหัสผ่านอีกครั้ง'))) !!}
                                <i class="clear-input">
                                    <ion-icon name="close-circle"></ion-icon>
                                </i>
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
  <script src="https://www.gstatic.com/firebasejs/8.3.1/firebase-app.js"></script>

  <!-- If you enabled Analytics in your project, add the Firebase SDK for Analytics -->
  <script src="https://www.gstatic.com/firebasejs/8.3.1/firebase-analytics.js"></script>

  <!-- Add Firebase products that you want to use -->
  <script src="https://www.gstatic.com/firebasejs/8.3.1/firebase-auth.js"></script>
  <script src="https://www.gstatic.com/firebasejs/8.3.1/firebase-firestore.js"></script>
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

const phoneNumber = '+66{{ $username }}';
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






$( "#register-form" ).submit(function( event ) {
    $(':input[type="submit"]').prop('disabled', true);
        $.ajax({
          url: "{{ secure_url('') }}/user/savepassword",
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
                       $('#toast-success-msg').text("เปลี่ยนรหัสผ่านสำเร็จ");
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

$(document).ready(function() {
  $(window).keydown(function(event){
    if(event.keyCode == 13) {
      event.preventDefault();
      return false;
    }
  });
});
</script>

    <!-- toast center iconed -->
        <div id="toast-error" class="toast-box toast-center">
            <div class="in">
                <ion-icon name="close-circle" class="text-danger"></ion-icon>
                <div class="text" id="toast-error-msg"></div>
            </div>
            <button type="button" class="btn btn-sm btn- close-button">CLOSE</button>
        </div>
    <!-- toast center iconed -->

        <!-- toast center iconed -->
        <div id="toast-success" class="toast-box toast-center">
            <div class="in">
                <ion-icon name="checkmark-circle" class="text-primary"></ion-icon>
                <div class="text" id="toast-success-msg"></div>
            </div>
            <button type="button" class="btn btn-sm btn- close-button">CLOSE</button>
        </div>
        <!-- toast center iconed -->






@stop
