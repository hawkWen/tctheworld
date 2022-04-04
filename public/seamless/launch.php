<?php


require 'config.php';
require $_SERVER['DOCUMENT_ROOT'].'/seamless/jili/jili-function.php';

if($_GET['hash']!=''){
    $sport = $_GET['sport'];
    $casino = $_GET['casino'];
    $gameid = $_GET['gameid'];
    $hash = $_GET['hash'];
    $url = '';
    $bonusmode = 0;
    $env = 'production';
    $appendbonus = 'N';

    $query = $mysqli->query("select * from tb_users where hash = '".$hash."' and active=1");

    if($query){


        if($query->num_rows > 0) {
            $user_data = $query->fetch_object();
            if($user_data->active!=1){
                     echo '<a href="javascript:history.back(1)">กลับไปก่อนหน้า</a> ไม่พบผู้ใช้งานของคุณ';
                    exit();
            }
        }
    }
    $query = $mysqli2->query("select * from tb_users where hash = '".$hash."'");



    if($query){


        if($query->num_rows > 0) {


            $user_data = $query->fetch_object();
            $bonusmode = $user_data->bonus_mode;
            $bonususername = $user_data->bonususername;

            if($casino!=""){



                if($casino=='PGC'){

                     $url = 'https://production.otb-api.com/Pragmatic/launch/'.$hash.'/104';

                }elseif($casino=='SE'){
                    
                        $url = 'https://production.otb-api.com/sexygaming/login/'.$user_data->gameusername.'/sexy';
     
                }elseif($casinor=='km'){

                    $url = 'https://production.otb-api.com/sexygaming/login/'.$user_data->gameusername.'/km';

                }elseif($casino=='DG'){

                   

                    $url = 'https://production.otb-api.com/dreamgaming/launch/'.$hash;


                }


            }elseif($sport!=""){


                if($sport=='SBO'){

                     $url = 'https://production.otb-api.com/SBO/launch/'.$hash.'/mobile';

                }

            }else{




                    $query = $mysqli2->query("select * from gamelists where active = 1 and id = ".$gameid);



                    if ($query->num_rows > 0) {

                        $game = $query->fetch_object();

                        if($bonusmode==1){

                            $queryp = $mysqli2->query("select * from game_partners where short_name = '".$game->partner."'");
                            $game_partners = $queryp->fetch_object();

                            $env = 'production';
                            $appendbonus = 'N';
                            $queryb = $mysqli->query("select * from promotions_current_user where bonususername = '".$bonususername."'");
                            $prouser = $queryb->fetch_object();
                            if($prouser->game_type=='SLOT'&&$game->game_type==2)
                            {
                                echo '<a href="javascript:history.back(1)">กลับไปก่อนหน้า</a> โปรโมชั่นนี้ไม่สามารถยิงปลาได้';
                                exit();
                            }


                        }else{
                            $env = 'production';
                            $appendbonus = 'N';
                        }

                        $query = $mysqli2->query("select * from casino_config where active = 1 and short_name = '".$game->partner."'");
                        $casinoconfig = $query->fetch_assoc();


                        //redirect for pg
                        if($game->partner=='pg'){
                                
                                $url = $casinoconfig['game_production_url'].'/'.$game->code.'/index.html?language=th&bet_type=1&operator_token='.$casinoconfig['production_token'].'&operator_player_session='.$hash.'-'.$appendbonus;

                        }elseif($game->partner=='jl'){
                            //$env = 'production';
                     
                            $urldata = GenerateKeyForJiliLoginWithoutRedirect($casinoconfig['game_production_url'],$hash,$game->gameid,$casinoconfig['production_key'],$casinoconfig['production_token']);

                            if($urldata->ErrorCode==0){
                                $url = $urldata->Data;
                            }else{
                                echo $urldata->Message;
                                exit();
                            }
                            
                             
                        }elseif($game->partner=='ambp'){
                            //$env = 'production';

                            if($bonusmode==1){

                               $url = 'https://production.otb-api.com/AMBPoker/launch/'.$game->code.'/'.$hash;

                            }else{
                            
                                $url = 'https://production.otb-api.com/AMBPoker/launch/'.$game->code.'/'.$hash;
                            }
                             
                        }elseif($game->partner=='jk'){
                            //$env = 'production';

                            if($bonusmode==1){

                               $url = 'https://production.otb-api.com/Joker/launch/'.$hash.'/'.$game->code;

                            }else{
                            
                                $url = 'https://production.otb-api.com/Joker/launch/'.$hash.'/'.$game->code;
                            }
                             
                        }elseif($game->partner=='PGP'){
                            //$env = 'production';

                            if($bonusmode==1){

                               $url = 'https://production.otb-api.com/Pragmatic/launch/'.$hash.'/'.$game->code;

                            }else{
                            
                                $url = 'https://production.otb-api.com/Pragmatic/launch/'.$hash.'/'.$game->code;
                            }
                             
                        }else{


                            if($bonusmode==1){

                                $curl = curl_init();

                                curl_setopt_array($curl, array(
                                  CURLOPT_URL => 'https://production.otb-api.com/qtech/gameurl?gameId='.$game->code.'&walletSessionId='.$hash.'&playerid='.$user_data->id,
                                  CURLOPT_RETURNTRANSFER => true,
                                  CURLOPT_ENCODING => '',
                                  CURLOPT_MAXREDIRS => 10,
                                  CURLOPT_TIMEOUT => 0,
                                  CURLOPT_FOLLOWLOCATION => true,
                                  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                  CURLOPT_CUSTOMREQUEST => 'GET',
                                ));

                                $response = curl_exec($curl);
                                $res = json_decode($response,true);

                                if(!empty($res['status'])&&$res['status']=='success'){
                                    $url =  $res['url'].'&hideSplash=true';
                                }else{
                                    print_r($res);
                                }

                            }else{
                                $curl = curl_init();

                                curl_setopt_array($curl, array(
                                  CURLOPT_URL => 'https://production.otb-api.com/qtech/gameurl?gameId='.$game->code.'&walletSessionId='.$hash.'&playerid='.$user_data->id,
                                  CURLOPT_RETURNTRANSFER => true,
                                  CURLOPT_ENCODING => '',
                                  CURLOPT_MAXREDIRS => 10,
                                  CURLOPT_TIMEOUT => 0,
                                  CURLOPT_FOLLOWLOCATION => true,
                                  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                  CURLOPT_CUSTOMREQUEST => 'GET',
                                ));

                                $response = curl_exec($curl);
                                $res = json_decode($response,true);

                                if(!empty($res['status'])&&$res['status']=='success'){
                                    $url =  $res['url'].'&hideSplash=true';
                                }else{
                                    print_r($res);
                                }
                            }

                        }

                        


                    }else{
                        echo '<a href="javascript:history.back(1)">กลับไปก่อนหน้า</a> ไม่มีเกมส์นี้หรือยังไม่เปิดให้บริการ';
                        exit();
                    }

            }
                 

        }else{

                     echo '<a href="javascript:history.back(1)">กลับไปก่อนหน้า</a> เกิดข้อผิดพลาดหรือระบบปิดปรับปรุงชั่วคราวค่ะ';
                     exit();
        }
        
    }else{
         echo '<a href="javascript:history.back(1)">กลับไปก่อนหน้า</a> ไม่พบผู้ใช้งานของคุณ';
         exit();
    }



}else{
    echo 'เกิดข้อผิดพลาด';
    exit();
}

$mysqli->close();

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>onlyfun88</title>


<!-- End Google Tag Manager -->
    <style type="text/css">
        body {
  margin: 0;
}
iframe {
  height:calc(100vh - 4px);
  width:calc(100vw - 4px);
  box-sizing: border-box;
}
.returnHome {
position: absolute;
    left: 10px;
    top: 10px;
    cursor: pointer;
    width: 80px;
    height: 80px;
    background-image: url(/img/back-arrow.svg);
    background-size: 100%;
    background-repeat: no-repeat;
    z-index: 12;
}
    </style>
</head>
<body>

<a href="https://play.onlyfun88.com/games"><div class="returnHome"></div></a>
<iframe src="<?php echo $url; ?>" style="position:fixed; top:0px; left:0px; bottom:0px; right:0px; width:100%; height:100%; border:none; margin:0; padding:0; overflow:hidden; "></iframe>
</body>

</html>
