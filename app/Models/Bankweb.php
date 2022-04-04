<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class bankweb extends Sximo  {
	
	protected $table = 'bank_web';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		return " SELECT bank_web.* FROM bank_web ";
	}	

	public static function queryWhere(  ){
		
		return " WHERE bank_web.id IS NOT NULL ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
