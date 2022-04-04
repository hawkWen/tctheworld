<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class deposit extends Sximo  {
	
	protected $table = 'deposit';
	protected $primaryKey = 'deposit_id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		return " SELECT deposit.* FROM deposit ";
	}	

	public static function queryWhere(  ){
		
		return " WHERE deposit.deposit_id IS NOT NULL ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
