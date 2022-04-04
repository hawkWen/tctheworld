<style>
  /* Facebook : อดิเทพ เทศเทียน /*
  /* Tel : 063-163-1368 /*
  /* Line : Aditep2541 /*
  /* Date : 25/01/63 */ 
/* Extra large screen / wide desktop */
@media (max-width: 1200px) {
  .showtext_gclub {
      font-size: 22px !important;
      color: blue !important;
  }
}
/* Large screen / desktop */
@media (max-width: 992px) {
  .showtext_gclub {
      font-size: 18px !important;
      color: yellow !important;
  }
}
/* Medium screen / tablet */
/* ค่าเดิมมันคือ 768 แต่ลองลดแล้วมันพอดี*/
@media (max-width: 767px) {
  .showtext_gclub {
      font-size: 13px !important;
      color: red !important;
  }
}
/* Small screen / phone */
@media (max-width: 576px) {
  .showtext_gclub {
      font-size: 11px !important;
      color: pink !important;
  }
}
/* Extra small screen / phone*/
  .showtext_gclub {
      font-size: 27px;
  }
  .chancetxt_gclub {
      font-size: 0px;
  }
body
{
     font-family: 'Helvet' !important;
}
</style>
<section id="headers">
        <div class="headers-container">
            <h1 class="animated fadeIn"><?php echo $Acc1["text_headers1"] ?></h1>
            <h2 class="animated fadeIn"><?php echo $Acc1["text_headers2"] ?>
        </div>
    </section>

    <div class="container mt-4">
      <div class="row justify-content-md-center mb-4">
      </div>
      <hr class="style mb-3 mt-0">
    <div class="row">
<?php
for ($x = 1; $x <= 23;) {
  echo '<div class="col-6 mb-2 z-depth-3">
  <div class="m-1">
    <a style="text-decoration:none;" href="?page=formula_gclub&room='.($x+1).'">
      <div class="row resroom frame-casino" style="background-image: url(img/frame.png);">
      <div class="col gclub">
          
        </div>
        <div class="col-6 col-md-5 text-center tab">
          <div class="chancetxt_gclub">ชื่อเจ้ามือ</div>
          <span class="showtext_gclub" style="color: khaki;" id="per'.$x.'">
            '.($x+1).'
          </span>
        </div>
      </div>
    </a>
  </div>
</div>';
$x++;
}
?>
  </div>
  </div>
  </div>
  <script>
    ez();
window.setInterval(function(){
ez();
}, 1500);
  function ez(){
  // $.get( "<?php echo $url_base_casino; ?>/encryption/api_casino.php?g=Gclub")
$.get( "<?php echo $url_gclub; ?>")
  .done(function(data){
  if(data['status'] == 503){
    Swal.fire({
      type: "error",
      title: data['status'],
      text: data['status'],
      confirmButtonText: "ตกลง",
    }).then(function(){
      window.location.href = "./";  
    });
  }
  console.log(data);  
  loop = data['data'].length;
  //loop = data.length;
  console.log(loop);  
    for (i = 0; i < loop; i++)
    {
    //text += items[i] + "<br>";
    //$("#per"+i).html(data[i]['dealer_name']);
     $("#per"+i).html(data['data'][i]['table_name']);
     data['data'][i]['table_name'];
    }
  });

  $.get("ajax/heartbeat.php")
  .done(function( data ){
  });
}
  </script>