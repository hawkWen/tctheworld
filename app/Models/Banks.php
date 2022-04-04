<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class banks extends Sximo  {
	
	protected $table = 'banks';
	protected $primaryKey = 'bank_id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		return " SELECT banks.* FROM banks ";
	}	

	public static function queryWhere(  ){
		
		return " WHERE banks.bank_id IS NOT NULL ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
