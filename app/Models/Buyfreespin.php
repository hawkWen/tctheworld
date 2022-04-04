<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class buyfreespin extends Sximo  {
	
	protected $table = 'buyfreespin';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		return "  SELECT buyfreespin.* FROM buyfreespin  ";
	}	

	public static function queryWhere(  ){
		
		return "  WHERE buyfreespin.id IS NOT NULL ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
