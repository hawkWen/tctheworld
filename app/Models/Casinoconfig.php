<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class casinoconfig extends Sximo  {
	
	protected $table = 'casino_config';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		return "  SELECT casino_config.* FROM casino_config  ";
	}	

	public static function queryWhere(  ){
		
		return "  WHERE casino_config.id IS NOT NULL ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
