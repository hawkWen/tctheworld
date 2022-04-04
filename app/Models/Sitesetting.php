<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class sitesetting extends Sximo  {
	
	protected $table = 'site_settings';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		return " SELECT site_settings.* FROM site_settings ";
	}	

	public static function queryWhere(  ){
		
		return " WHERE site_settings.id IS NOT NULL ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
