<?php 
$db_host        = '192.168.168.40';
$db_user        = 'dba';
$db_pass        = '4Ko6my9013!';
$db_database    = 'onlyfun88'; 
$db_port        = '3306';


$mysqli = new mysqli($db_host,$db_user,$db_pass,$db_database,$db_port);


$db_host2        = '192.168.168.40';
$db_user2        = 'dba';
$db_pass2        = '4Ko6my9013!';
$db_database2    = 'otb_production'; 
$db_port2        = '3306';


$mysqli2 = new mysqli($db_host2,$db_user2,$db_pass2,$db_database2,$db_port2);

$config['operator_token'] = '';
$config['secret_key'] = '';


function userTO($userid,$type,$provider,$bet,$payout,$mysqli){


				$querytu = $mysqli->query("select * from users_turnover where date = '".date("Y-m-d")."' and user_id = ".$userid);
				
				if($provider=='pg')
				{
					if($type=='bet'){
						if($querytu)
	                    {
	                        if($querytu->num_rows > 0) {

	                            $mysqli->query("UPDATE users_turnover SET bet = bet+'".$bet."' WHERE `date` = '".date("Y-m-d")."' and user_id = '".$userid."'");
	                        }else{
	                            $mysqli->query("INSERT INTO users_turnover (`date`,user_id,bet,payout) VALUES ('".date("Y-m-d")."', '".$userid."', '".$bet."', '0')");
	                        }

	                    }

					}else{
						if($querytu)
	                    {
	                        if($querytu->num_rows > 0) {

	                            $mysqli->query("UPDATE users_turnover SET payout = payout+'".$payout."' WHERE `date` = '".date("Y-m-d")."' and user_id = '".$userid."'");
	                        }else{
	                            $mysqli->query("INSERT INTO users_turnover (`date`,user_id,bet,payout) VALUES ('".date("Y-m-d")."', '".$userid."', '0', '".$payout."')");
	                        }

	                    }

					}
				}else{
					if($querytu)
	                    {
	                        if($querytu->num_rows > 0) {

	                            $mysqli->query("UPDATE users_turnover SET bet = bet+'".$bet."',payout+'".$payout."' WHERE `date` = '".date("Y-m-d")."' and user_id = '".$userid."'");
	                        }else{
	                            $mysqli->query("INSERT INTO users_turnover (`date`,user_id,bet,payout) VALUES ('".date("Y-m-d")."', '".$userid."', '".$bet."', '".$payout."')");
	                        }

	                    }
				}
                    
}

function game_histories($userid,$gameusername,$game_id,$partner,$bet_id,$bet_amount,$payout_amount,$credit_before,$credit_after,$bet_type,$spacialbet,$mysqli){


	$querybet = $mysqli->query("select * from game_histories where bet_id = '".$bet_id."' and user_id = ".$userid);
	
	if($querybet)
	    {
	    	if($querybet->num_rows > 0) {
				$mysqli->query("UPDATE game_histories SET bet_type='".$bet_type."', payout_amount = ".$payout_amount.", credit_after=".$credit_after." where bet_id = '".$bet_id."' and user_id = ".$userid);
			}else{
				

				$mysqli->query("INSERT INTO game_histories (user_id, gameusername, game_id, partner, bet_id, bet_amount, payout_amount, credit_before, credit_after, systemdate, bet_type, spacialbet) VALUES (".$userid.", '".$gameusername."', '".$game_id."', '".$partner."', '".$bet_id."', ".$bet_amount.", ".$payout_amount.", ".$credit_before.", ".$credit_after.", CURRENT_TIMESTAMP, '".$bet_type."', ".$spacialbet.")");

			}
		}
}
?>