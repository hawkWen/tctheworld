<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class statdaily extends Sximo  {
	
	protected $table = 'stat_daily';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		return "  SELECT stat_daily.* FROM stat_daily  ";
	}	

	public static function queryWhere(  ){
		
		return "  WHERE stat_daily.id IS NOT NULL ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
