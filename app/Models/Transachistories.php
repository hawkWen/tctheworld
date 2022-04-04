<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class transachistories extends Sximo  {
	
	protected $table = 'transac_histories';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		return " SELECT transac_histories.* FROM transac_histories ";
	}	

	public static function queryWhere(  ){
		
		return " WHERE transac_histories.id IS NOT NULL ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
