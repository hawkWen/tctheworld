<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class truewallettrans extends Sximo  {
	
	protected $table = 'truewallet_trans';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		return "  SELECT truewallet_trans.* FROM truewallet_trans  ";
	}	

	public static function queryWhere(  ){
		
		return "  WHERE truewallet_trans.id IS NOT NULL ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
