<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class bettransections extends Sximo  {
	
	protected $table = 'bettransections';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		return "  SELECT bettransections.* FROM bettransections  ";
	}	

	public static function queryWhere(  ){
		
		return "  WHERE bettransections.id IS NOT NULL ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
