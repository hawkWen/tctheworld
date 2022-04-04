<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class wheelround extends Sximo  {
	
	protected $table = 'wheels';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		return "  SELECT wheels.* FROM wheels  ";
	}	

	public static function queryWhere(  ){
		
		return "  WHERE wheels.id IS NOT NULL ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
