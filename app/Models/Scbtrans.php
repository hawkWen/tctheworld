<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class scbtrans extends Sximo  {
	
	protected $table = 'scb_trans';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		return " SELECT scb_trans.* FROM scb_trans ";
	}	

	public static function queryWhere(  ){
		
		return " WHERE scb_trans.id IS NOT NULL ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
