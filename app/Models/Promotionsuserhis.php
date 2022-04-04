<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class promotionsuserhis extends Sximo  {
	
	protected $table = 'promotions_history_users';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		return " SELECT promotions_history_users.*  FROM promotions_history_users ";
	}	

	public static function queryWhere(  ){
		
		return " WHERE promotions_history_users.id IS NOT NULL ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
