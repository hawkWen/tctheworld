<?php 

require 'config.php';
require 'jili-function.php';

$req_data_ori = $_REQUEST ?? $_POST ?? $_GET ?? NULL;
$req_data = $req_data_ori;




      $userhash = '';
      $wallet_type = 0;

if(!empty($req_data['username']))
{ 
            if(strpos($req_data['username'],"xmrdb"))
            {
              $userhash = "bonususername = '".$req_data['username']."'";
            //  $wallet_type = 1;
            }else{
              $userhash = "gameusername = '".$req_data['username']."'";
              //$wallet_type = 0;
            }
            
}

$query = $mysqli->query("select * from tb_users where ".$userhash);

          if($query){

                if ($query->num_rows > 0) {

                    $user_data = $query->fetch_object();

                    //$token = GenerateKeyForTestToken($req_data['username'],$req_data['currency'],$req_data['balance']);
                    $token = $user_data->hash;
                    echo json_encode([
                          "errorCode" => 0,
                          "message" => "success",
                          "token" => $token
                        ]);
                    



                } else {

                    echo json_encode([
                          "errorCode" => 101,
                          "message" => "Incorrect username",
                          "Description" => "Format error or empty"
                        ]);

                   
                }



          }


?>