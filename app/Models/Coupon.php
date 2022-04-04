<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class coupon extends Sximo  {
	
	protected $table = 'promotions';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		return " SELECT promotions.* FROM promotions ";
	}	

	public static function queryWhere(  ){
		
		return " WHERE promotions.promotion_category_id = 15 ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
