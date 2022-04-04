<?php
//require 'config.php';
function validateRequest($req_data, $config_data)
{
  if (empty($req_data['operator_token'])) {
    return array(
      'data' => null,
      'error' => array(
        'code' => 1034,
        'message' => 'operator_token cannot be null'
      )
    );
  }

  if ($req_data['operator_token'] != $config_data['operator_token']) {
    return array(
      'data' => null,
      'error' => array(
        'code' => 1034,
        'message' => 'invalid operator_token'
      )
    );
  }

  if (empty($req_data['secret_key'])) {
    return array(
      'data' => null,
      'error' => array(
        'code' => 1034,
        'message' => 'secret_key cannot be null'
      )
    );
  }

  if ($req_data['secret_key'] != $config_data['secret_key']) {
    return array(
      'data' => null,
      'error' => array(
        'code' => 1034,
        'message' => 'invalid secret_key'
      )
    );
  }

  return array('error' => null);
}

function validateOperatorPlayerSession($req_data,$mysqli,$skipOPS)
{

      $userhash = '';
      $wallet_type = 0;
      $has_playername = 0;
      
  if (empty($req_data['operator_player_session'])&&$skipOPS == 0) {
        return array(
          'data' => null,
          'error' => array(
            'code' => 1034,
            'message' => 'operator_player_session cannot be null'
          )
        );
    }else{
 
/*  global $mysqli;
  $sql = "SELECT * FROM members WHERE member_login='" . $req_data['operator_player_session'] . "'";
  $res = $mysqli->query($sql);*/
    
        if(!empty($req_data['player_name'])&&$skipOPS == 1)
        { 
            if(strpos($req_data['player_name'],"xmrdb"))
            {
              $userhash = "bonususername = '".$req_data['player_name']."'";
              $wallet_type = 1;
            }else{
              $userhash = "gameusername = '".$req_data['player_name']."'";
              $wallet_type = 0;
            }
            $has_playername = 1;
        }else{




              $hash = urldecode($req_data['operator_player_session']);


              if(strpos($hash,"-"))
              {

                  $hashed = explode("-",$hash);

                  $userhash = "hash = '".$hashed[0]."'";
                  if($hashed[1]=='B'){
                    $wallet_type = 1;
                  }elseif($hashed[1]=='N'){
                    $wallet_type = 0;
                  }else{
                        return array(
                        'data' => null,
                        'error' => array(
                          'code' => 1034,
                          'message' => 'Invalid request'
                        )
                      );
                  }
                  $has_playername = 0;

              }else{

                  return array(
                    'data' => null,
                    'error' => array(
                      'code' => 1034,
                      'message' => 'Invalid request'
                    )
                  );
                
              }

              
        }
          
          $query = $mysqli->query("select * from tb_users where ".$userhash);

          if($query){

                if ($query->num_rows > 0) {

                    $user_data = $query->fetch_object();

                    if($wallet_type==0){

                        return array(
                          'player_name' => $user_data->gameusername,
                          'nickname' => $user_data->gameusername,
                          'balance' => $user_data->balance,
                          'wallet' => $wallet_type,
                          'user_id' => $user_data->id,
                          'error' => null
                        );

                    }else{

                        return array(
                          'player_name' => $user_data->bonususername,
                          'nickname' => $user_data->bonususername,
                          'balance' => $user_data->bonus,
                          'wallet' => $wallet_type,
                          'user_id' => $user_data->id,
                          'error' => null
                        );

                    }
                    



                } else {


                  if($has_playername==1){
                    return array(
                      'data' => null,
                      'error' => array(
                        'code' => 3005,
                        'message' => 'Player wallet does not exist'
                      )
                    );
                  }else{
                    return array(
                      'data' => null,
                      'error' => array(
                        'code' => 1034,
                        'message' => 'Invalid request'
                      )
                    );
                  }
                }



          }else {
            return array(
              'data' => null,
              'error' => array(
                'code' => 1200,
                'message' => 'Internal server error'
              )
            );
          }

      
  }
}



/*function validatePlayerName($req_data,$mysqli)
{
  if (empty($req_data['player_name'])) {
    return array(
      'data' => null,
      'error' => array(
        'code' => 3001,
        'message' => 'player_name cannot be null'
      )
    );
  }


  $query = $mysqli->query("select * from tb_users where id = '".md5($req_data['operator_player_session'])."'");
  if($query){

    if ($query->num_rows > 0) {
      $user_data = $query->fetch_object();
      return array(
        'player_name' => $user_data->username,
        'error' => null
      );
    } else {
      return array(
        'data' => null,
        'error' => array(
          'code' => 1305,
          'message' => 'Invalid player_name'
        )
      );
    }
  }
}*/

  
