<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class balancehistory extends Sximo  {
	
	protected $table = 'balance_history';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		return "  SELECT balance_history.* FROM balance_history  ";
	}	

	public static function queryWhere(  ){
		
		return "  WHERE balance_history.id IS NOT NULL ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
