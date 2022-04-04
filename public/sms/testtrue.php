<?php

#======================================= เติมเงินด้วย เบอร์ =======================================#
$secert_key = "arbes0TDccgzpvVfM1PCpa6cHY"; //รหัสลับที่ได้จาก Zpay
$api = "https://api.users.zpay.in.th/users_api_gateway/users/api/"; //API

$phone_number = "0623789382"; //เบอร์ที่ใช้โอนเงินเข้ามา

$ref1 = "Something 1";
$ref2 = "Something 2";
$ref3 = "Something 3";
$ref4 = "Something 4";
$ref5 = "Something 5";
$ref6 = "Something 6";

$ip = $_SERVER['REMOTE_ADDR'];

if(isset($phone_number)){
    $data_a = json_decode(file_get_contents($api, false, stream_context_create(array('http' => array('header'=>"Content-type: application/x-www-form-urlencoded\r\n", 'method'=>'POST', 'content'=>http_build_query(array('type'=>'check_transaction_by_phone_number', 'secert_key'=>$secert_key, 'pn'=>$phone_number, 'ref1'=>$ref1, 'ref2'=>$ref2, 'ref3'=>$ref3, 'ref4'=>$ref4, 'ref5'=>$ref5, 'ref6'=>$ref6, 'ip'=>$ip)))))));
    if($data_a->code === "NMGETD-200111"){
        // $data_a->amount; //จำนวนเงินที่หักค่าธรรมเนียมแล้ว
        // $data_a->servicefee; //จำนวนเงินค่าธรรมเนียม
        // $data_a->card_amount; //จำนวนเต็มของราคาบัตร
        // $points = $data_a->amount; //จำนวนเงิน
        // $conn = new mysqli("hostname", "username", "password", "database");
        // $sql_update_points = "UPDATE mytable SET points=points+$points WHERE username='$ref1'";
        // if($conn->query($sql_update_points) === TRUE){
        //     echo "เติมเงินสำเร็จ จำนวนเงิน : ".number_format($data_a->amount, 2, '.', ',');
        // }else{
        //     echo "ไม่สามารถอัพเดตข้อมูลได้ (".number_format($data_a->amount, 2, '.', ',').")";
        // }
        echo "เติมเงินสำเร็จ จำนวนเงิน : ".number_format($data_a->amount, 2, '.', ',');
    }else if($data_a->code === "NHJJAK-400121"){
        echo "ไม่พบรายการ";
    }else if($data_a->code === "NHJJAK-400127" || $data_a->code === "NHJJAK-400128"){
        echo "โปรดตรวจสอบเบอร์มือถือ และลองใหม่อีกครั้ง";
    }else if(empty($data_a->code)){
        echo "มีบางอย่างผิดพลาด #1";
    }else{
        echo "มีบางอย่างผิดพลาด #2 (".$data_a->code.":".$data_a->echo_data.")";
    }
}

?>