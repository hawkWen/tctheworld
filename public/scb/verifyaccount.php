
<?php
require 'config.php';

require_once 'SCBEasyAPI2.php';



if(!empty($_POST['bank'])){

$bank = $_POST['bank'];
$accountnum = $_POST['accountnum'];

$queryb = $mysqli->query("select * from banks where `bank_id` = '".$bank."'");
$bankquery = $queryb->fetch_object();

$bank = $bankquery->bankcode;

$query = $mysqli->query("select * from bank_web where `use` = 'withdrawbank'");
$withdraw_bank = $query->fetch_object();

$withdraw_bank_id = $withdraw_bank->id;
$deviceId = $withdraw_bank->device_id;
$refreshToken = $withdraw_bank->api_refresh;
$accountNumber = $withdraw_bank->bank_account_no;

$scb = new SCBEasyAPI();
$scb->setAccount($deviceId, $refreshToken, $accountNumber);

if ($scb->login()) {


    $response=$scb->verifyAccount($bank, $accountnum);
    
    $return_data = array();
    $res = json_decode($response);

    if($res->code==0)
    {
        $query2 = $mysqli->query("select * from tb_users where `first_name` = '".$res->firstName."' and `last_name` = '".$res->lastName."'");
        $checkname = $query2->fetch_object();

        if(!empty($checkname)){

            $return_data = array(
                        'code' => 404,
                        'desc' => 'คุณเคยเป็นสมาชิกกับเราแล้ว'
                    );

            echo json_encode($return_data);
                    
        }else{

            echo $response;

        }


         
    }else{
        echo $response;
    }

}

}


