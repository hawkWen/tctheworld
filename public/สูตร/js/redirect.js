  $(document).ready(function() {
      window.setInterval(function(){ 
        $.get("ajax/check_login_time.php")
        .done(function( data ) {
          console.log(data);
        if(data == "0"){
           window.setInterval(function(){  
             $.get("ajax/add_time.php")
             .done(function( data ) {
               //window.location.href = "./";
               //console.log(data);
             });
           }, 1000);
        }
       });
      }, 1000);
  });