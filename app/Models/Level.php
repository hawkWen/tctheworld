<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class level extends Sximo  {
	
	protected $table = 'affiliate_level';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		return "  SELECT affiliate_level.* FROM affiliate_level  ";
	}	

	public static function queryWhere(  ){
		
		return "  WHERE affiliate_level.id IS NOT NULL ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
