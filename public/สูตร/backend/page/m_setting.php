  <style>
  /* Facebook : อดิเทพ เทศเทียน /*
  /* Tel : 063-163-1368 /*
  /* Line : Aditep2541 /*
  /* Date : 25/01/63 */    
  </style>
<div class="container mt-4">
 <?php
	$Query1 = query("SELECT * FROM setting WHERE id = ?",array('1'));
	$Acc1 = $Query1->fetch();
 ?>
 <style>
#oil {
  border: 1px solid #ddd;
  border-radius: 4px;
  padding: 5px;
  width: 300px;
}
</style>
    <div class="card casino-card">
        <div class="card-body text-center">

            <div class="modal-body">
              <form id="setting_form" method="post">
              <input type="hidden" name="txt_id" value="<?php echo $Acc1["id"];?>" style="text-align: center;">
              <span class="text-white mt-2">Line</span>
              	<input class="form-control mt-2 mb-2" placeholder="Line@" name="idline" value="<?php echo $Acc1["idline"];?>">
              <span class="text-white mt-2">TitleWeb</span>
              	<input class="form-control mt-2 mb-2" placeholder="Oilhackzone บาคาร่า" name="titleweb" value="<?php echo $Acc1["titleweb"];?>">
              <span class="text-white">Logo</span>
              	<input type="text" class="form-control mt-2 mb-2" placeholder="https://xxx/xxx.jpg" name="logo" value="<?php echo $Acc1["logo"];?>">
              	<img id="oil" src="<?php echo $Acc1["logo"];?>">

              <br>
              <span class="text-white">background-headers</span>
              	<input type="text" class="form-control mt-2 mb-2" placeholder="https://xxx/xxx.jpg" name="background_headers" value="<?php echo $Acc1["background_headers"];?>">
              	<img id="oil" src="<?php echo $Acc1["background_headers"];?>">

              <br>
              <span class="text-white">text-headers1</span>
              	<input type="text" class="form-control mt-2 mb-2" placeholder="Oilhackzone" name="text_headers1" value="<?php echo $Acc1["text_headers1"];?>">
              <span class="text-white">text-headers2</span>
              	<input type="text" class="form-control mt-2 mb-2" placeholder="บาคาร่า" name="text_headers2" value="<?php echo $Acc1["text_headers2"];?>">
              <span class="text-white">background-login</span>
              	<input type="text" class="form-control mt-2 mb-2" placeholder="https://xxx/xxx.jpg" name="background_login" value="<?php echo $Acc1["background_login"];?>">
              	<img id="oil" src="<?php echo $Acc1["background_login"];?>">
             
               <br>
      			   <span class="text-white">เปิด-ปิด หน้าสมัคร</span>
          				<select name="txtstatus_register" class="form-control mt-2 mb-2" >
          				  <option value="<?php echo $Acc1["txtstatus_register"]; ?>"><?php if($Acc1["txtstatus_register"] == "1") echo "เปิด"; else echo "ปิด";?></option>
          				  <option value="0">ปิด</option>
          				  <option value="1">เปิด</option>
          				</select>
                  
              <span class="text-white">สมัครสมาชิกครั้งแรกได้รับจำนวนเงิน?</span>
                <input type="number" class="form-control mt-2 mb-2" placeholder="0-1000" name="credit_register" value="<?php echo $Acc1["credit_register"];?>">


              <button id="btn_setting" type="button" class="btn btn-side btn-block mt-4">Setting</button>
              </form>
            </div>
    </div>
</div>