<?php



   function GenerateKeyForJiliLogin($url,$token,$gameID,$agentKey,$agentID)
   {
     
     $randTxt1 = RandomString(6);
     $randTxt2 = RandomString(6);

     $keyG = GenerateKey($agentKey,$agentID);

   //  $arrConfig = getProviderConfig();
     $arrReturn['keyG'] = $keyG;
     $arrReturn['agent_key'] = $agentKey;
     $arrReturn['agent_id'] = $agentID;
     $arrReturn['language'] = 'th-TH';
     $arrReturn['token'] = $token;
     $arrReturn['game_id'] = $gameID;
     $arrReturn['random_text1'] = $randTxt1;
     $arrReturn['random_text2'] = $randTxt2;
  //$arrReturn['query_string'] = 'Account=' . $account . '&GameId=' . $gameID . '&Lang=' . $arrReturn['language'] . '&AgentId=' . $arrReturn['agent_id'];
     $arrReturn['query_string'] = 'Token=' . $token . '&GameId=' . $gameID . '&Lang=' . $arrReturn['language'] . '&AgentId=' . $agentID;
     $arrReturn['md5_string'] = md5($arrReturn['query_string'] . $keyG);
     $arrReturn['key_login'] = $randTxt1 . $arrReturn['md5_string'] . $randTxt2;
     $arrReturn['login_url'] = $url.'Login?'.$arrReturn['query_string'] . '&Key=' . $arrReturn['key_login'];
     return $arrReturn['login_url'];
   }

   function GenerateKeyForJiliLoginWithoutRedirect($url,$token,$gameID,$agentKey,$agentID)
   {
     
     $randTxt1 = RandomString(6);
     $randTxt2 = RandomString(6);

     $keyG = GenerateKey($agentKey,$agentID);

   //  $arrConfig = getProviderConfig();
     $arrReturn['keyG'] = $keyG;
     $arrReturn['agent_key'] = $agentKey;
     $arrReturn['agent_id'] = $agentID;
     $arrReturn['language'] = 'th-TH';
     $arrReturn['token'] = $token;
     $arrReturn['game_id'] = $gameID;
     $arrReturn['random_text1'] = $randTxt1;
     $arrReturn['random_text2'] = $randTxt2;
  //$arrReturn['query_string'] = 'Account=' . $account . '&GameId=' . $gameID . '&Lang=' . $arrReturn['language'] . '&AgentId=' . $arrReturn['agent_id'];
     $arrReturn['query_string'] = 'Token=' . $token . '&GameId=' . $gameID . '&Lang=' . $arrReturn['language'] . '&AgentId=' . $agentID;
     $arrReturn['md5_string'] = md5($arrReturn['query_string'] . $keyG);
     $arrReturn['key_login'] = $randTxt1 . $arrReturn['md5_string'] . $randTxt2;
     $arrReturn['login_url'] = $url.'LoginWithoutRedirect?'.$arrReturn['query_string'] . '&Key=' . $arrReturn['key_login'];

   $headers = array('Method: GET', 'Content-type: application/json');

   $ch = curl_init();
   curl_setopt($ch, CURLOPT_URL, $arrReturn['login_url']);
   curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
   curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
   curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

   $result = curl_exec($ch);

   if(curl_error($ch))
   {
      $return_array = array( 'status' => '000: send fail', 'message' => curl_error($ch) );
   }
   else
   {
      $return_array = $result;
   }
     curl_close($ch);
    
     return json_decode($return_array);
   }

  function RandomString($strLength)
  {
    $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

    $input_length = strlen($permitted_chars);
    $random_string = '';
    for ($i = 0; $i < $strLength; $i++) {
      $random_character = $permitted_chars[mt_rand(0, $input_length - 1)];
      $random_string .= $random_character;
    }

    return $random_string;
  } 

  function GenerateKey($agentKey,$agentID)
  {

   //  $arrConfig = getProviderConfig();

     date_default_timezone_set("America/New_York");
     $dateUTCMinus4 = date('ymj');
     date_default_timezone_set("Asia/Bangkok");
     return md5($dateUTCMinus4 . $agentID . $agentKey);
  }


 function GenerateKeyForGetGame($url,$token,$gameID,$agentKey,$agentID)
 {


   $randTxt1 = RandomString(6);
   $randTxt2 = RandomString(6);

   $keyG = GenerateKey($agentKey,$agentID);

 //  $arrConfig = getProviderConfig();
   $arrReturn['keyG'] = $keyG;
   $arrReturn['agent_key'] = $agentKey;
   $arrReturn['agent_id'] = $agentID;
   $arrReturn['language'] = 'th-TH';
   $arrReturn['token'] = $token;
   $arrReturn['game_id'] = $gameID;
   $arrReturn['random_text1'] = $randTxt1;
   $arrReturn['random_text2'] = $randTxt2;
//$arrReturn['query_string'] = 'Account=' . $account . '&GameId=' . $gameID . '&Lang=' . $arrReturn['language'] . '&AgentId=' . $arrReturn['agent_id'];
   $arrReturn['query_string'] = 'AgentId=' . $arrReturn['agent_id'];
   $arrReturn['md5_string'] = md5($arrReturn['query_string'] . $keyG);
   $arrReturn['key_login'] = $randTxt1 . $arrReturn['md5_string'] . $randTxt2;
   $arrReturn['login_url'] = 'https://wb-api.jlfafafa2.com/singleWallet/GetGameList?'.$arrReturn['query_string'] . '&Key=' . $arrReturn['key_login'];
   return $arrReturn;
 }
/*
 function GenerateKeyForTestToken($account,$currency,$balance)
 {
   global $mysqli;

   $randTxt1 = RandomString(6);
   $randTxt2 = RandomString(6);

   $keyG = GenerateKey();

 //  $arrConfig = getProviderConfig();
   $arrReturn['keyG'] = $keyG;
   $arrReturn['agent_key'] = '7ca68dc80c8c83261e8528b2f9f66c94eba1ff7e';
   $arrReturn['agent_id'] = 'ZF084_Moradok88';
   $arrReturn['language'] = 'th-TH';
   $arrReturn['account'] = $account;
   $arrReturn['random_text1'] = $randTxt1;
   $arrReturn['random_text2'] = $randTxt2;
   $arrReturn['query_string'] = 'username=' . $account . '&currency=' . $currency . '&balance='.$balance;
   $arrReturn['md5_string'] = md5($arrReturn['query_string'] . $keyG);
   $arrReturn['token'] = $randTxt1 . $arrReturn['md5_string'] . $randTxt2;
 //  $arrReturn['login_url'] = 'https://uat-wb-api.jlfafafa2.com/api1/Login?'.$arrReturn['query_string'] . '&Key=' . $arrReturn['key_login'];
   return $arrReturn;
 }


 function GenerateKeyForAuth($reqId,$token)
 {
   global $mysqli;

   $randTxt1 = RandomString(6);
   $randTxt2 = RandomString(6);

   $keyG = GenerateKey();

 //  $arrConfig = getProviderConfig();
   $arrReturn['keyG'] = $keyG;
   $arrReturn['agent_key'] = '7ca68dc80c8c83261e8528b2f9f66c94eba1ff7e';
   $arrReturn['agent_id'] = 'ZF084_Moradok88';
   $arrReturn['language'] = 'th-TH';
   $arrReturn['account'] = $account;
   $arrReturn['random_text1'] = $randTxt1;
   $arrReturn['random_text2'] = $randTxt2;
   $arrReturn['query_string'] = 'reqId=' . $reqId . '&token='.$token;
   $arrReturn['md5_string'] = md5($arrReturn['query_string'] . $keyG);
   $arrReturn['token'] = 'zRFWx3' . $arrReturn['md5_string'] . 'ArfKoB';
 //  $arrReturn['login_url'] = 'https://uat-wb-api.jlfafafa2.com/api1/Login?'.$arrReturn['query_string'] . '&Key=' . $arrReturn['key_login'];
   return $arrReturn;
 }

 function GenerateKeyForGetGame()
 {
   global $mysqli;

   $randTxt1 = RandomString(6);
   $randTxt2 = RandomString(6);

   $keyG = GenerateKey();

 //  $arrConfig = getProviderConfig();
   $arrReturn['keyG'] = $keyG;
   $arrReturn['agent_key'] = '76b775ed18f7a95171053fc72f8f67e13068c612';
   $arrReturn['agent_id'] = 'ZF084_Moradok88';
   $arrReturn['language'] = 'th-TH';
   $arrReturn['token'] = $token;
   $arrReturn['account'] = $account;
   $arrReturn['game_id'] = $gameID;
   $arrReturn['random_text1'] = $randTxt1;
   $arrReturn['random_text2'] = $randTxt2;
//$arrReturn['query_string'] = 'Account=' . $account . '&GameId=' . $gameID . '&Lang=' . $arrReturn['language'] . '&AgentId=' . $arrReturn['agent_id'];
   $arrReturn['query_string'] = 'AgentId=' . $arrReturn['agent_id'];
   $arrReturn['md5_string'] = md5($arrReturn['query_string'] . $keyG);
   $arrReturn['key_login'] = $randTxt1 . $arrReturn['md5_string'] . $randTxt2;
   $arrReturn['login_url'] = 'https://wb-api.jlfafafa2.com/singleWallet/GetGameList?'.$arrReturn['query_string'] . '&Key=' . $arrReturn['key_login'];
   return $arrReturn;
 }

function RandomString($strLength)
{
  $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

  $input_length = strlen($permitted_chars);
  $random_string = '';
  for ($i = 0; $i < $strLength; $i++) {
    $random_character = $permitted_chars[mt_rand(0, $input_length - 1)];
    $random_string .= $random_character;
  }

  return $random_string;
}


$xx = GenerateKeyForLogin('24381f33487740c26bcb5e15beac7f65','mrd0623789382',46,'th-TH');
echo '<pre>';
print_r($xx);
echo '</pre>';*/
