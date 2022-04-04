<?php
	/* Facebook : อดิเทพ เทศเทียน /*
	/* Tel : 063-163-1368 /*
	/* Line : Aditep2541 /*
	/* Date : 25/01/63 */
session_start();
include "../function/database.php";

if(empty($_SESSION['user'])){
echo request("error","ผิดพลาด","ไม่สามารถเข้าสู่ระบบได้","");
exit();
}else{
$Query = query("SELECT * FROM user WHERE user = ?",array($_SESSION['user']));	
$Data = $Query->fetch();
}
$Lap = 0;

$GWin = 0;
$GLose = 0;

$Win = 0;
$Lose = 0;

$Global = 0;

$Arr = [];

$Query = query("SELECT * FROM statisctic_dg WHERE room = ? AND date = ? AND user = ?",array($_GET['room'],date("d-m-Y"),$_SESSION['user']));
while($Data = $Query->fetch())
{
		//var_dump($Data['result']);
	
		if($Data['result'] == "win")
		{
			
				if($Global == 0){
				array_push($Arr,["status"=>"win","lap"=>1]);	
				}else{
				array_push($Arr,["status"=>"win","lap"=>$Global]);	
				}
				$Win = 0;
				$GWin++;
				$Lap++;
		   $Global = 0;
			
			$Win++;	
		}
		if($Data['result'] == "lose")
		{
				if($Global == 0){
				array_push($Arr,["status"=>"lose","lap"=>1]);	
				}else{
				array_push($Arr,["status"=>"lose","lap"=>$Global]);	
				}
				$Lose = 0;
				$GLose++;
				$Lap++;
		   $Global = 0;
			
			$Lose++;	
		}
		// elseif($Data['result'] == "lose"){
		// if($Lose == 2){
		// 		array_push($Arr,["status"=>"lose","lap"=>3]);
		// 		$Lose = 0;
		// 	$GLose++;
		// 	$Lap++;
		// 	}else{
		// 	$Lose++;
		// 	$Global++;
		// 	}
			
		// }
	
	
	
}

?>
<div class="row pt-2 pb-2" style="background-color:#ae8f37; color:#FFF;">
              <div class="col-6 ">สูตรชนะ
                  <span class="badge badge-success win ml-2"><?= $GWin ?></span>
              </div>
              <div class="col-6">สูตรแพ้
                <span class="badge badge-danger  loss ml-2"><?= $GLose ?></span>
              </div>
          </div>
<table class="table table-striped text-white  table-striped mb-0" style="overflow-x: hidden;">
  <thead>
    <tr>
      <th scope="col">รอบที่</th>
      <th scope="col">จำนวนไม้</th>
      <th scope="col">ผลที่ได้</th>
    </tr>
  </thead>
  <tbody>
   <?php 
	  for($i = 0; $i < $Lap; $i++){
		  ?>
	  <tr>
      <th scope="row"><?= ($i+1) ?></th>
      <td><?= $Arr[$i]['lap'] ?></td>
		  <?php 
		  if($Arr[$i]['status']=="win"){
			  echo '<td class="bg-success">ชนะ</td>';
		  }else{
			echo '<td class="bg-danger">แพ้</td>';  
		  }
		  ?>

      
    </tr>
	  <?php
	  }
	  ?> 
   
  </tbody>
  </table>

<?php

$Return = ["win"=>$GWin,"lose"=>$GLose,"data"=>$Arr];
//echo json_encode($Return);