<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class withdraw extends Sximo  {
	
	protected $table = 'withdraw';
	protected $primaryKey = 'withdraw_id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		return " SELECT withdraw.*,tb_users.username as join_username FROM withdraw inner join tb_users on tb_users.id = withdraw.user_id ";
	}	

	public static function queryWhere(  ){
		
		return " WHERE withdraw.withdraw_id IS NOT NULL ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
