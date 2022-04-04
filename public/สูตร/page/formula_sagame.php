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
<?php 
if($_GET['room']==''){
echo "<script>window.location = './'</script>";
exit(); 
}
switch($_GET['room']){
  case 1: $r = 0; break;
  case 2: $r = 1; break;
  case 3: $r = 2; break;
  case 4: $r = 3; break;
  case 5: $r = 4; break;
  case 6: $r = 5; break;
  case 7: $r = 6; break;
  case 8: $r = 7; break;
  case 9: $r = 8; break;
  case 10: $r = 9; break;
  case 11: $r = 10; break;
  case 12: $r = 11; break;
  case 13: $r = 12; break;
  case 14: $r = 13; break;
  case 15: $r = 14; break;
  case 16: $r = 15; break;
  case 17: $r = 16; break;
  case 18: $r = 17; break;
  case 19: $r = 18; break;
  case 20: $r = 19; break;
  case 21: $r = 20; break;
  case 22: $r = 21; break;
  case 23: $r = 22; break;
  case 24: $r = 23; break;
  case 25: $r = 24; break;

  case 26: $r = 25; break;
  case 27: $r = 26; break;
  case 28: $r = 27; break;
  case 29: $r = 28; break;
  case 30: $r = 29; break;
  case 31: $r = 30; break;
  case 32: $r = 31; break;
  case 33: $r = 32; break;
  case 34: $r = 33; break;
  case 35: $r = 34; break;
  case 36: $r = 35; break;
  case 37: $r = 36; break;
  case 38: $r = 37; break;

  default: $r = 0; break;
}
?>
<div class="container mt-4">
  <div class="row">
    <div class="col-sm">
      <div class="card casino-card p-5">
        <div class="col-sm text-center text-white">
            <span class="mb-2" id="room_name">ห้องที่ ...</span>
        </div>
        <hr>
        <div class="row">
        <div class="col-sm text-center text-white">
            <span class="mb-2">อัตราการชนะ</span>
            <div class="card p-3 mt-3 mb-2" style="background:rgba(0, 0, 0, 0.3);">
              <h1 style="color:khaki;" id="per">0%</h1>
            </div>
          </div>
          <div class="col-sm text-center text-white">
            <span class="mb-4">ตาถัดไปแทง</span>
            <div class="card p-3 mt-3" style="background:rgba(0, 0, 0, 0.3);">
              <center>
                <img id="tang" class="animated pulse infinite" style="width:55px; height: 55px;display: none;"></img>
                <h1 id="w" style="display: none;" class="">รอสูตร</h1>
              </center>
            </div>
          </div>
        </div>
        <hr class="style mb-3 mt-4">
        <div style="overflow-x:auto;">
        <table class="table table-bordered" style="background: #f5f5f5;width: 410px; margin:0 auto;">
    <tbody>
        <?php
        
        $intRows = 0;
    $i = 0;
    $arr = [0,6,12,18,24,30,36,42,48,54,60,66
    ,1,7,13,19,25,31,37,43,49,55,61,67
    ,2,8,14,20,26,32,38,44,50,56,62,68
    ,3,9,15,21,27,33,39,45,51,57,63,69
    ,4,10,16,22,28,34,40,46,52,58,64,70
    ,5,11,17,23,29,35,41,47,53,59,65,71];
        while ($i < 72) {
      if($a == 0){
        $a = 1;
      }else{
        $a = 0;
      }

     echo '<td human-heart width="24px;" height="24px;" class="text-center" id="'.$arr[$i].'" style="background-size:contain;">';
      
            $intRows++;
            $befor = $i;
            if ($i <= 10) {
                $number = str_pad($befor, 2, '0', STR_PAD_LEFT);
            } else {
                $number = $befor;
            }
            ?>
            
            <?php
            echo "</td>";
            if (($intRows) % 12 == 0) {
                echo"</tr>";
            }
      $i++;
        }
        ?>

    </tbody>
</table>

<div class="card mt-4" style="background:rgba(0, 0, 0, 0.3); border-radius:10px;">
<div class="table-wrapper-scroll-y my-custom-scrollbar text-center" id="table_score" style="overflow-x: hidden;">
</div>
</div>
</div>
</div>
      

    </div>
    <div class="col-sm">
    <div class="card casino-card p-4 text-center">
    
    <h3 style="color: khaki"><i class="fa fa-line-chart" aria-hidden="true"></i>&nbsp;กราฟแสดงผลสถิติ</h3>
    <hr class="style mb-4 mt-2">
    

    <div id="piechart"></div>

    </div>
    </div>

  </div>
</div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script>
  
  ez();
  var bac = window.setInterval(ez, 1000);

function ez(){
  // $.get("<?php echo $url_base_casino; ?>encryption/api_casino_encode.php?g=sa&key=<?php echo $decode; ?>")
  //$.get( "<?php echo $url_base_casino; ?>/encryption/api_casino.php?g=SAGaming")
$.get( "<?php echo $url_sa.$decode; ?>")
  .done(function( data ) {
  

  // const obj = data
  // console.log(obj[<?= $r ?>]['room_id'])


  //console.log(data);
  //console.log("asd");


//room1_name = data[<?= $r ?>]['name'];
  room1_name = data['data'][<?= $r ?>]['room_name'];
  //console.log(room1_name);



// room1_status = data[<?= $r ?>]['Status'];
  room1_status = data['data'][<?= $r ?>]['status'];
  //console.log(room1_status);

// room1 = data[<?= $r ?>]['data'];
  room1 = data['data'][<?= $r ?>]['records'];
  //console.log(room1);


  //console.log(room1);



//
  status = data['data'][<?= $r ?>]['status'];
  //console.log(status);
  if(status == "shuffling")
  {
    setInterval(function()
    { 
      location.reload();
      //window.location.href = "index.php";
    }
    ,8000);
  }
  ///

  var oil = room1.split("").join(",")
  //console.log(oil);

  // loop = room1.length;
  // for (i = 0; i <= loop; ++i) {

  //     console.log(loop);
  // }

  
  $("#room_name").html(room1_name);
  //$("#per").html(<?= rand(70,100) ?>);
  
  
  
  items = oil.split(',');
    //console.log(items);
  
  
  
  $.get( "fml_sagame.php?fm="+oil+"&idea=1&room="+<?= $_GET['room'] ?>)
  .done(function( data ) {
    console.log(data.fm);
    $("#per").html(<?= rand(70,100) ?> + "%");
    
    if(data.fm === "W"){
      $("#per").html(<?= rand(70,100) ?> + "%");
      $("#w").show();
      $('#tang').hide();
    }else{
      $("#per").html(<?= rand(70,100) ?> + "%");
      $("#w").hide();
    $("#tang").attr("src","img/"+data.fm+".png?v=5");
    $('#tang').css("display","block");
    }
  
  $("#credit").html(data.credit+" &nbsp;");
  
  if(data.refill == 1){
    Swal.fire({
  type: "error",
  title: "เครดิตหมด",
  text: "กรุณาเติมเครดิตก่อนคับ",
  confirmButtonText: "ตกลง",
  cancelButtonText: "ยกเลิก",
}).then(function() {
    window.location.href = "./";
  
  });
  
  clearInterval(bac);
  
  
  }
  
  });
  
  
  loop = items.length;
  text = "";
  var i;
  
  
for (i = 0; i < loop; i++) {
  //text += items[i] + "<br>";


  if(items[i] == "B"){
   $("#"+i).css({"background":"url(img/b.png?v=5)","background-size":"contain"});
  }else if(items[i] == "P"){
   $("#"+i).css({"background":"url(img/p.png?v=5)","background-size":"contain"});
  }else if(items[i] == "T"){
   $("#"+i).css({"background":"url(img/t.png?v=5)","background-size":"contain"});
  }else{
   
  }
//console.log(arr[x][i] +"="+items[x][i]);

    
}
  
//alert(text);

  })
  .fail(function(){
    console.log("Error_API");
  });
  
  $.get( "ajax/getscore_sagame.php?room="+<?= $_GET['room'] ?>)
  .done(function( data ) {
  $("#table_score").html(data);
          });
  
  $.get( "ajax/chart_sagame.php?room="+<?= $_GET['room'] ?>)
  .done(function( data ) {



google.load("visualization", "1", {packages:["corechart"]});
google.setOnLoadCallback(load_chart_data);

function load_chart_data() {
    $.ajax({
        url: "ajax/chart_sagame.php?room="+<?= $_GET['room'] ?>, 
        type: 'GET',
        data: {get_chart: true},
        dataType: 'JSON', // 
        success: function(chart_values) {
            //console.log(chart_values);  
            draw_chart(chart_values);  
        }
    });
}

function draw_chart(chart_values) {
    var data = google.visualization.arrayToDataTable(chart_values);
    var options = {
      title: '',
      pieHole: 0.4,
          slices: {
            0: { color: 'red' },
            1: { color: 'black' }
          }
    };
    var chart = new google.visualization.PieChart(document.getElementById('piechart'));
    chart.draw(data, options);
}
    //////////////

});
  
  
}



  
  </script>
<script>

  

  


</script>

  <style>
    .my-custom-scrollbar {
position: relative;
height: 160px;
overflow: auto;
}
.table-wrapper-scroll-y {
display: block;
}
    </style>



