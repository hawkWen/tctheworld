<?php
  /* ฟังชั่นเข้ารหัส API_KEY */
  $bypass = new oilhackzone();
  $post = "";
  $response = $bypass->curl_post($GLOBALS['sa_genkey'],$post);
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
for ($x = 0; $x <= 17;) {
  echo '  <div class="col-6 mb-2 z-depth-3">
  <div class="m-1">
    <a style="text-decoration:none;" href="?page=formula_sagame&room='.($x+1).'">
      <div class="row resroom frame-casino" style="background-image: url(img/frame.png);">
      <div class="col sagame">
          
        </div>
        <div class="col-6 col-md-5 text-center tab">
          <div class="chancetxt">ห้องที่</div>
          <span class="showtext" style="color: khaki;" id="per'.$x.'">
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
    check();
window.setInterval(function(){
ez();
}, 1500);
  function ez(){
  // $.get("<?php echo $url_base_casino; ?>encryption/api_casino_encode.php?g=sa&key=<?php echo $decode; ?>")
  //$.get( "<?php echo $url_base_casino; ?>/encryption/api_casino.php?g=SAGaming")

$.get( "<?php echo $url_sa.$decode; ?>")
  .done(function( data ) {
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

   loop = data['data'].length;

  //loop = data.length;
  console.log(loop);  
  // console.log("--0-0-0-0-0-00--0-00-0-0-");
for (i = 0; i < loop; i++) {
  //text += items[i] + "<br>";

   $("#per"+i).html(data['data'][i]['room_name']);

  data['data'][i]['room_name']


// $("#per"+i).html(data[i]['']+"%");



}
 


  });
}

function check()
{
  $.get("ajax/heartbeat.php")
  .done(function( data ) {
  });
}
 </script>
