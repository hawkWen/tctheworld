$(document).ready(function() {

 var is_session_expired = 'no';
    function check_session()
    {
        $.ajax({
            url:"ajax/online.php",
            method:"POST",
            success:function(data)
            {         
			    //console.log(data);              
			    if(data == '1')
			    {
			     is_session_expired = 'yes'; //ถ้าsesionหมดอายุ
			    }
   			}
        })
    }
 var count_interval = setInterval(function()
 {
        check_session();
        if(is_session_expired == 'yes')
        {
          checkkey_logout();
        }
  }, 6000); //10000


	
			$("#login").click(function() {
					var user = $("#user").val();
					var pass = $("#pass").val();
					
					var send = {"user":user, "pass":pass}

					$.ajax({
					   type: "POST",
					   url: "ajax/login.php",
					   data: send,
					   success: function(data) {
						alert(data.status,data.title,data.info,data.href);
					   }
					 });

			});
    
            $("#register").click(function() {

					$.ajax({
					   type: "POST",
					   url: "ajax/register.php",
					   data: $('#register_form').serialize(),
					   success: function(data) {
						alert(data.status,data.title,data.info,data.href);
					   }
					 });


			});


			$("#betluckmak").click(function() {
					$.ajax({
					   type: "POST",
					   url: "ajax/slotpoint.php",
					   data: '',
					   success: function(data) {
						 console.log(data);
						 if(data == "ok"){
						 	window.location.href = '?page=lobby_betluckmak';
						 }
					   }
					 });
			});

			///////////////////////////////////////////////////////
			$("#aug_slot").click(function() {
					$.ajax({
					   type: "POST",
					   url: "ajax/slotpoint.php",
					   data: '',
					   success: function(data) {
						 console.log(data);
						 if(data == "ok"){
						 	window.location.href = '?page=formula_slot_augslot';
						 }
					   }
					 });
			});

			$("#kingmaker").click(function() {
					$.ajax({
					   type: "POST",
					   url: "ajax/slotpoint.php",
					   data: '',
					   success: function(data) {
						 console.log(data);
						 if(data == "ok"){
						 	window.location.href = '?page=formula_slot_kingmaker';
						 }
					   }
					 });
			});

			$("#xe88").click(function() {
					$.ajax({
					   type: "POST",
					   url: "ajax/slotpoint.php",
					   data: '',
					   success: function(data) {
						 console.log(data);
						 if(data == "ok"){
						 	window.location.href = '?page=formula_slot_xe88';
						 }
					   }
					 });
			});	
			///////////////////////////////////////////////////////
			$("#slotjoker").click(function() {
					$.ajax({
					   type: "POST",
					   url: "ajax/slotpoint.php",
					   data: '',
					   success: function(data) {
						 console.log(data);
						 if(data == "ok"){
						 	window.location.href = '?page=formula_slot_joker';
						 }
					   }
					 });
			});

			$("#slotufa").click(function() {
					$.ajax({
					   type: "POST",
					   url: "ajax/slotpoint.php",
					   data: '',
					   success: function(data) {
						 console.log(data);
						 if(data == "ok"){
						 	window.location.href = '?page=formula_slot_ufa';
						 }
					   }
					 });
			});


			$("#pgslot").click(function() {
					$.ajax({
					   type: "POST",
					   url: "ajax/slotpoint.php",
					   data: '',
					   success: function(data) {
						 console.log(data);
						 if(data == "ok"){
						 	window.location.href = '?page=formula_slot_pg';
						 }
					   }
					 });
			});


			$("#slotspadegaming").click(function() {
					$.ajax({
					   type: "POST",
					   url: "ajax/slotpoint.php",
					   data: '',
					   success: function(data) {
						 console.log(data);
						 if(data == "ok"){
						 	window.location.href = '?page=formula_slot_spadegaming';
						 }
					   }
					 });
			});

			$("#slotsagame").click(function() {
					$.ajax({
					   type: "POST",
					   url: "ajax/slotpoint.php",
					   data: '',
					   success: function(data) {
						 console.log(data);
						 if(data == "ok"){
						 	window.location.href = '?page=formula_slot_sagame';
						 }
					   }
					 });
			});

			$("#slotxo").click(function() {
					$.ajax({
					   type: "POST",
					   url: "ajax/slotpoint.php",
					   data: '',
					   success: function(data) {
						 console.log(data);
						 if(data == "ok"){
						 	window.location.href = '?page=formula_slotxo';
						 }
					   }
					 });
			});

			$("#slotpragmatic").click(function() {
					$.ajax({
					   type: "POST",
					   url: "ajax/slotpoint.php",
					   data: '',
					   success: function(data) {
						 console.log(data);
						 if(data == "ok"){
						 	window.location.href = '?page=formula_slotpragmatic';
						 }
					   }
					 });
			});


			$("#sloticonicgaming").click(function() {
					$.ajax({
					   type: "POST",
					   url: "ajax/slotpoint.php",
					   data: '',
					   success: function(data) {
						 console.log(data);
						 if(data == "ok"){
						 	window.location.href = '?page=formula_sloticonicgaming';
						 }
					   }
					 });
			});

			$("#slotmafia88").click(function() {
					$.ajax({
					   type: "POST",
					   url: "ajax/slotpoint.php",
					   data: '',
					   success: function(data) {
						 console.log(data);
						 if(data == "ok"){
						 	window.location.href = '?page=formula_slotmafia88';
						 }
					   }
					 });
			});


			$("#slotaskmebet").click(function() {
					$.ajax({
					   type: "POST",
					   url: "ajax/slotpoint.php",
					   data: '',
					   success: function(data) {
						 console.log(data);
						 if(data == "ok"){
						 	window.location.href = '?page=formula_slotaskmebet';
						 }
					   }
					 });
			});

			$("#slotlive22").click(function() {
					$.ajax({
					   type: "POST",
					   url: "ajax/slotpoint.php",
					   data: '',
					   success: function(data) {
						 console.log(data);
						 if(data == "ok"){
						 	window.location.href = '?page=formula_slotlive22';
						 }
					   }
					 });
			});

			$("#redtiger_slot").click(function() {
					$.ajax({
					   type: "POST",
					   url: "ajax/slotpoint.php",
					   data: '',
					   success: function(data) {
						 console.log(data);
						 if(data == "ok"){
						 	window.location.href = '?page=formula_slotredtiger';
						 }
					   }
					 });
			});

			$("#itp_slot").click(function() { /* close */
					$.ajax({
					   type: "POST",
					   url: "ajax/slotpoint.php",
					   data: '',
					   success: function(data) {
						 console.log(data);
						 if(data == "ok"){
						 	window.location.href = '?page=formula_slotitp';
						 }
					   }
					 });
			});

			$("#ae_gaming_slot").click(function() {
					$.ajax({
					   type: "POST",
					   url: "ajax/slotpoint.php",
					   data: '',
					   success: function(data) {
						 console.log(data);
						 if(data == "ok"){
						 	window.location.href = '?page=formula_slotaegaming';
						 }
					   }
					 });
			});

			$("#bng_slot").click(function() {
					$.ajax({
					   type: "POST",
					   url: "ajax/slotpoint.php",
					   data: '',
					   success: function(data) {
						 console.log(data);
						 if(data == "ok"){
						 	window.location.href = '?page=formula_slotbng';
						 }
					   }
					 });
			});

			$("#playn_go_slot").click(function() {
					$.ajax({
					   type: "POST",
					   url: "ajax/slotpoint.php",
					   data: '',
					   success: function(data) {
						 console.log(data);
						 if(data == "ok"){
						 	window.location.href = '?page=formula_slotplayngo';
						 }
					   }
					 });
			});

			$("#gioco_plus_slot").click(function() {
					$.ajax({
					   type: "POST",
					   url: "ajax/slotpoint.php",
					   data: '',
					   success: function(data) {
						 console.log(data);
						 if(data == "ok"){
						 	window.location.href = '?page=formula_slotgiocoplus';
						 }
					   }
					 });
			});

			$("#habanero_slot").click(function() {
					$.ajax({
					   type: "POST",
					   url: "ajax/slotpoint.php",
					   data: '',
					   success: function(data) {
						 console.log(data);
						 if(data == "ok"){
						 	window.location.href = '?page=formula_slothabanero';
						 }
					   }
					 });
			});															

			$("#cq9_slot").click(function() {
					$.ajax({
					   type: "POST",
					   url: "ajax/slotpoint.php",
					   data: '',
					   success: function(data) {
						 console.log(data);
						 if(data == "ok"){
						 	window.location.href = '?page=formula_betluckmak_cq9';
						 }
					   }
					 });
			});	
			$("#fc_slot").click(function() {
					$.ajax({
					   type: "POST",
					   url: "ajax/slotpoint.php",
					   data: '',
					   success: function(data) {
						 console.log(data);
						 if(data == "ok"){
						 	window.location.href = '?page=formula_betluckmak_fc';
						 }
					   }
					 });
			});	

			$("#jili_slot").click(function() {
					$.ajax({
					   type: "POST",
					   url: "ajax/slotpoint.php",
					   data: '',
					   success: function(data) {
						 console.log(data);
						 if(data == "ok"){
						 	window.location.href = '?page=formula_betluckmak_jili';
						 }
					   }
					 });
			});



/////////////
			$("#single_ball").click(function() {
					$.ajax({
					   type: "POST",
					   url: "ajax/ballpoint.php",
					   data: '',
					   success: function(data) {
						 console.log(data);
						 if(data == "ok"){
						 	window.location.href = '?page=formula_single_ball';
						 }
					   }
					 });
			});
			
	
			$("#tded_ball").click(function() {
					$.ajax({
					   type: "POST",
					   url: "ajax/ballpoint.php",
					   data: '',
					   success: function(data) {
						 console.log(data);
						 if(data == "ok"){
						 	window.location.href = '?page=formula_tded_ball';
						 }
					   }
					 });
			});


			$("#ball_step").click(function() {
					$.ajax({
					   type: "POST",
					   url: "ajax/ballpoint.php",
					   data: '',
					   success: function(data) {
						 console.log(data);
						 if(data == "ok"){
						 	window.location.href = '?page=formula_step_ball';
						 }
					   }
					 });
			});


			$("#ball_online").click(function() {
					$.ajax({
					   type: "POST",
					   url: "ajax/forfree.php",
					   data: '',
					   success: function(data) {
						 console.log(data);
						 if(data == "ok"){
						 	window.location.href = '?page=formula_online_ball';
						 }
					   }
					 });
			});


		});
		
	
		function alert(status,title,text,href){
			Swal.fire({
  type: status,
  title: title,
  text: text,
  confirmButtonText: "ตกลง",
  cancelButtonText: "ยกเลิก",
}).then(function() {
    // Redirect the user
	if(href === ""){

	}else{
		window.location.href = href;
	}

		});
		}


function refill(){

 $.get("ajax/refill.php?code="+$("#refill_code").val())
  .done(function( data ) {
alert(data.status,data.title,data.info,data.href);
  });

}

function user_editpass(){
$.ajax({
   type: "POST",
   url: "ajax/user_editpass.php",
   data: $('#user_editpass').serialize(),
   success: function(data) {
   	console.log(data);
   	if(data == "success"){
   		alert("success","สำเร็จ","Password Changed Sucessfully","./");
   	}else if (data == "nosuccess"){
   		alert("error","ผิดพลาด","Password Not Change","");
   	}else{
   		alert("error","ผิดพลาด","ผิดพลาด","");
   	}

   }
 });
}
		
function logout(){
	Swal.fire({
  title: 'คุณแน่ใจมั้ย?',
  text: "ที่จะออกจากระบบ!",
  type: 'warning',
  showCancelButton: true,
  confirmButtonText: "ตกลง",
  cancelButtonText: "ยกเลิก",
}).then((result) => {
  if (result.value) {
   $.get("ajax/logout.php")
	  .done(function( data ) {
	Swal.fire(
	      'สำเร็จ!',
	      'ออกจากระบบแล้ว',
	      'success'
	    ).then(function() {
	    window.location.href = "./";

			});
	  });
  }
})
}



function checkkey_logout(){
   $.get("ajax/logout.php")
  .done(function( data ) {
Swal.fire(
      'สำเร็จ!',
      'ออกจากระบบล็อคอินซ้อน',
      'success'
    ).then(function() {
    window.location.href = "./";

		});
  });
}