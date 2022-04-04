<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class members extends Sximo  {
	
	protected $table = 'tb_users';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		return " SELECT tb_users.*,banks.bank_logo FROM tb_users  inner join banks on banks.bank_id=tb_users.bank ";
	}	

	public static function queryWhere(  ){
		
		return " WHERE tb_users.id IS NOT NULL ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
