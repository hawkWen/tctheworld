<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class balance extends Sximo  {
	
	protected $table = 'tb_users';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		return " SELECT tb_users.id,tb_users.username,tb_users.agent_id,tb_users.balance,tb_users.bank,tb_users.account_number,tb_users.gameusername,tb_users.gamepassword,'เข้าเกมส์' as linkgame FROM tb_users ";
	}	

	public static function queryWhere(  ){
		
		return " WHERE tb_users.id IS NOT NULL and tb_users.group_id > 2 ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
