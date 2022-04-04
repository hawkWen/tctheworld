<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class affiliate extends Sximo  {
	
	protected $table = 'affiliate_settings';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		return "  SELECT affiliate_settings.* FROM affiliate_settings  ";
	}	

	public static function queryWhere(  ){
		
		return "  WHERE affiliate_settings.id IS NOT NULL ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
