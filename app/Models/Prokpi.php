<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class prokpi extends Sximo  {
	
	protected $table = 'promotions_current_user';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		return "  SELECT promotions_current_user.* FROM promotions_current_user  ";
	}	

	public static function queryWhere(  ){
		
		return "  WHERE promotions_current_user.id IS NOT NULL ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
