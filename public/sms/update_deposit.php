<?php

require 'config.php';


    $query = $mysqli->query("select * from site_settings where `key` = 'dp_deposit_below'");
    $dp_deposit_below = $query->fetch_object();

    $query = $mysqli->query("select * from site_settings where `key` = 'dp_multiple_withdraw'");
    $dp_multiple_withdraw = $query->fetch_object();

$query = $mysqli->query("select * from deposit where status = 'wait' and deposit_hold = 1");
          



while ($deposit = $query->fetch_object()) {


				$query2 = $mysqli->query("select * from tb_users where id = '".$deposit->user_id."'");
          	    $current_user = $query2->fetch_object();



          	    	if($current_user->balance < 5){

	 					            if($deposit->amount>$dp_deposit_below->value){
                          $mysqli->query("UPDATE tb_users SET balance=balance+'".$deposit->amount."',max_withdraw='9999999' WHERE id=".$deposit->user_id);
                        }else{
                          $mysqli->query("UPDATE tb_users SET balance=balance+'".$deposit->amount."',max_withdraw='".($deposit->amount*$dp_multiple_withdraw->value)."' WHERE id=".$deposit->user_id);
                        }

                        $mysqli->query("UPDATE deposit SET deposit_hold=0,deposit_mode='auto',status='confirmed' WHERE deposit_id=".$deposit->deposit_id);

                         $mysqli->query("INSERT INTO transac_histories (user_id, username, updateTime, balance_before, balance_change, balance_after, transaction_detail, module, status, entry_by, ipaddress) VALUES ('".$current_user->id."','".$current_user->username."', CURRENT_TIMESTAMP, ".$current_user->balance.", ".$deposit->amount.", ".($current_user->balance+$deposit->amount).", 'รายการฝาก SCB AUTO', 'deposit', 'success', 0, '')");
                    }
}


$mysqli->close();

?>