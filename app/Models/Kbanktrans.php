<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class kbanktrans extends Sximo  {
	
	protected $table = 'kbank_trans';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		return " SELECT kbank_trans.* FROM kbank_trans ";
	}	

	public static function queryWhere(  ){
		
		return " WHERE kbank_trans.id IS NOT NULL ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
