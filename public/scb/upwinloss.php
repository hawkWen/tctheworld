<?php
require 'config.php';



$yesterday = date("Y-m-d");

echo $yesterday;


$query = $mysqli->query("select DISTINCT `game_histories`.`user_id` AS `user_id`,(select `tb_users`.`username` from `tb_users` where (`tb_users`.`id` = `game_histories`.`user_id`)) AS `username`
from `game_histories` 
where ((`game_histories`.`user_id` is not null) and (`game_histories`.`bonus_mode` = 0) and (cast(`game_histories`.`systemdate` as date) = '".$yesterday."'))");
                      

          while($user_winloss = $query->fetch_object()){


            $betslot = 0;
            $betcasino = 0;
            $betsport = 0;

            $payoutslot = 0;
            $payoutcasino = 0;
            $payoutsport = 0;

            $winloss_slot = 0;
            $winloss_casino = 0;
            $winloss_sport = 0;


                    $query2 = $mysqli->query("select 
IFNULL(sum(`game_histories`.`bet_amount`),0) AS `bet`,
IFNULL(sum(`game_histories`.`payout_amount`),0) AS `payout`,
IFNULL(sum((`game_histories`.`bet_amount` - `game_histories`.`payout_amount`)),0) AS `winloss`
from `game_histories` 
where ((`game_histories`.`user_id` = ".$user_winloss->user_id.") and (`game_histories`.`bonus_mode` = 0) and 
(`game_histories`.`game_type` in (1,2)) and (cast(`game_histories`.`systemdate` as date) = '".$yesterday."')) ");

                    echo "<br>select 
IFNULL(sum(`game_histories`.`bet_amount`),0) AS `bet`,
IFNULL(sum(`game_histories`.`payout_amount`,0) AS `payout`,
IFNULL(sum((`game_histories`.`bet_amount` - `game_histories`.`payout_amount`)),0) AS `winloss`
from `game_histories` 
where ((`game_histories`.`user_id` = ".$user_winloss->user_id.") and (`game_histories`.`bonus_mode` = 0) and 
(`game_histories`.`game_type` in (1,2)) and (cast(`game_histories`.`systemdate` as date) = '".$yesterday."')) ";

               
                    $user_getslotwinloss = $query2->fetch_object();

                    $betslot = $user_getslotwinloss->bet;
                    $payoutslot = $user_getslotwinloss->payout;
                    $winloss_slot = $user_getslotwinloss->winloss;



                    $query3 = $mysqli->query("select 
IFNULL(sum(`game_histories`.`bet_amount`),0) AS `bet`,
IFNULL(sum(`game_histories`.`payout_amount`),0) AS `payout`,
IFNULL(sum((`game_histories`.`bet_amount` - `game_histories`.`payout_amount`)),0) AS `winloss`
from `game_histories` 
where ((`game_histories`.`user_id` = ".$user_winloss->user_id.") and (`game_histories`.`bonus_mode` = 0) and 
(`game_histories`.`game_type` = 3) and (cast(`game_histories`.`systemdate` as date) = '".$yesterday."')) ");

                    echo "<br>select 
IFNULL(sum(`game_histories`.`bet_amount`),0) AS `bet`,
IFNULL(sum(`game_histories`.`payout_amount`,0) AS `payout`,
IFNULL(sum((`game_histories`.`bet_amount` - `game_histories`.`payout_amount`)),0) AS `winloss`
from `game_histories` 
where ((`game_histories`.`user_id` = ".$user_winloss->user_id.") and (`game_histories`.`bonus_mode` = 0) and 
(`game_histories`.`game_type` = 3) and (cast(`game_histories`.`systemdate` as date) = '".$yesterday."')) ";

               
                    $user_getcasinowinloss = $query3->fetch_object();

                    $betcasino = $user_getcasinowinloss->bet;
                    $payoutcasino = $user_getcasinowinloss->payout;
                    $winloss_casino = $user_getcasinowinloss->winloss;

                    $query4 = $mysqli->query("select 
IFNULL(sum(`game_histories`.`bet_amount`),0) AS `bet`,
IFNULL(sum(`game_histories`.`payout_amount`),0) AS `payout`,
IFNULL(sum((`game_histories`.`bet_amount` - `game_histories`.`payout_amount`)),0) AS `winloss`
from `game_histories` 
where ((`game_histories`.`user_id` = ".$user_winloss->user_id.") and (`game_histories`.`bonus_mode` = 0) and 
(`game_histories`.`game_type` = 8) and (cast(`game_histories`.`systemdate` as date) = '".$yesterday."')) ");

                    echo "<br>select 
IFNULL(sum(`game_histories`.`bet_amount`),0) AS `bet`,
IFNULL(sum(`game_histories`.`payout_amount`,0) AS `payout`,
IFNULL(sum((`game_histories`.`bet_amount` - `game_histories`.`payout_amount`)),0) AS `winloss`
from `game_histories` 
where ((`game_histories`.`user_id` = ".$user_winloss->user_id.") and (`game_histories`.`bonus_mode` = 0) and 
(`game_histories`.`game_type` = 8) and (cast(`game_histories`.`systemdate` as date) = '".$yesterday."')) ";

               
                    $user_getsportwinloss = $query4->fetch_object();

                    $betsport = $user_getsportwinloss->bet;
                    $payoutsport = $user_getsportwinloss->payout;
                    $winloss_sport = $user_getsportwinloss->winloss;



                
$mysqli->query("INSERT INTO users_turnover
(`date`, user_id, username, bet_slot, payout_slot, winloss_slot, bet_casino, payout_casino, winloss_casino, bet_sport, payout_sport, winloss_sport)
VALUES('".$yesterday."', ".$user_winloss->user_id.", '".$user_winloss->username."', ".$betslot.", ".$payoutslot.", ".$winloss_slot.", ".$betcasino.", ".$payoutcasino.", ".$winloss_casino.", ".$betsport.", ".$payoutsport.", ".$winloss_sport.")");





          }






$mysqli->close();



