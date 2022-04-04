<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class missions extends Sximo  {
	
	protected $table = 'promotions';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		return " SELECT promotions.* FROM promotions ";
	}	

	public static function queryWhere(  ){
		
		return " WHERE promotions.id IS NOT NULL and promotions.promotion_category_id = 9 ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
