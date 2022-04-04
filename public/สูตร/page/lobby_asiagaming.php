<?php
  /* ฟังชั่นเข้ารหัส API_KEY */
  $bypass = new oilhackzone();
  $post = "";
  $response = $bypass->curl_post($GLOBALS['asia_genkey'],$post);
  $response = json_decode($response, true);
  //print_r($response); /* show */
  if($response['status'] == true){
    $decode = $bypass->use_decode($response['data']['en_code']);
  }else if($response['status'] == false){
    echo("<meta http-equiv='refresh' content='3'>");
  }else{
    echo "error";
    exit();
  }
?>
<style>
  /* Facebook : อดิเทพ เทศเทียน /*
  /* Tel : 063-163-1368 /*
  /* Line : Aditep2541 /*
  /* Date : 25/01/63 */ 
/* Extra large screen / wide desktop */
@media (max-width: 1200px) {
  .showtext_asia {
      font-size: 22px !important;
      color: blue !important;
  }
}
/* Large screen / desktop */
@media (max-width: 992px) {
  .showtext_asia {
      font-size: 18px !important;
      color: yellow !important;
  }
}
/* Medium screen / tablet */
/* ค่าเดิมมันคือ 768 แต่ลองลดแล้วมันพอดี*/
@media (max-width: 767px) {
  .showtext_asia {
      font-size: 13px !important;
      color: red !important;
  }
}
/* Small screen / phone */
@media (max-width: 576px) {
  .showtext_asia {
      font-size: 11px !important;
      color: pink !important;
  }
}
/* Extra small screen / phone*/
  .showtext_asia {
      font-size: 27px;
  }
  .chancetxt_asia {
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
for ($x = 0; $x <= 26;) {
  echo '  <div class="col-6 mb-2 z-depth-3">
  <div class="m-1">
    <a style="text-decoration:none;" href="?page=formula_asiagaming&room='.($x+1).'">
      <div class="row resroom frame-casino" style="background-image: url(img/frame.png);">
      <div class="col asiagaming">
          
        </div>
        <div class="col-6 col-md-5 text-center tab">
          <div class="chancetxt_asia">ห้องที่</div>
          <span class="showtext_asia" style="color: khaki;" id="per'.$x.'">
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
  // $.get("<?php echo $url_base_casino; ?>encryption/api_casino_encode.php?g=asia&key=<?php echo $decode; ?>")
$.get( "<?php echo $url_ag.$decode; ?>")   
  .done(function(data) {
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
      $("#per"+i).html(data['data'][i]['room_name']);
      data['data'][i]['room_name']
    }
  });

  $.get("ajax/heartbeat.php")
  .done(function( data ){
  });
}
  </script>