<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class appstatus extends Sximo  {
	
	protected $table = 'app_status';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		return "  SELECT app_status.* FROM app_status  ";
	}	

	public static function queryWhere(  ){
		
		return "  WHERE app_status.id IS NOT NULL ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
