<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class scbapp extends Sximo  {
	
	protected $table = 'scbappwithdraw';
	protected $primaryKey = '';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		return " SELECT scbappwithdraw.* FROM scbappwithdraw ";
	}	

	public static function queryWhere(  ){
		
		return "  ";
	}
	
	public static function queryGroup(){
		return " order by system_date DESC ";
	}
	

}
