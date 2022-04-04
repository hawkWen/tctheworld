<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class gamehistories extends Sximo  {
	protected $connection= 'mysql2';
	protected $table = 'game_histories';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		return " select id,user_id, gameusername, (select g.name from gamelists g where g.gameid = game_histories.game_id and g.partner = game_histories.partner) as gamename,
partner, bet_id, bet_amount, payout_amount, credit_before, credit_after, systemdate, bet_type, spacialbet from game_histories ";
	}	

	public static function queryWhere(  ){
		
		return " WHERE game_histories.id IS NOT NULL ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
