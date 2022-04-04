<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class promotioncate extends Sximo  {
	
	protected $table = 'promotion_category';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		return "  SELECT promotion_category.* FROM promotion_category  ";
	}	

	public static function queryWhere(  ){
		
		return "  WHERE promotion_category.id IS NOT NULL ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
