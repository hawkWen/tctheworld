<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class wheellogs extends Sximo  {
	
	protected $table = 'wheel_logs';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		return "  SELECT wheel_logs.* FROM wheel_logs  ";
	}	

	public static function queryWhere(  ){
		
		return "  WHERE wheel_logs.id IS NOT NULL ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
