<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class accesstoken extends Sximo  {
	
	protected $table = 'access_token';
	protected $primaryKey = 'token_id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		return "  SELECT access_token.* FROM access_token  ";
	}	

	public static function queryWhere(  ){
		
		return "  WHERE access_token.token_id IS NOT NULL ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
