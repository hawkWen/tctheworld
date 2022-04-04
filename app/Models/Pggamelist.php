<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class pggamelist extends Sximo  {
	
	protected $table = 'gamelists';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		return " SELECT gamelists.* FROM gamelists ";
	}	

	public static function queryWhere(  ){
		
		return " WHERE gamelists.id IS NOT NULL and partner = 'pg' ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
