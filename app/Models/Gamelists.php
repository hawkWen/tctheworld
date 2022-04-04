<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class gamelists extends Sximo  {
	protected $connection = 'mysql2';
	protected $table = 'gamelists';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		return " SELECT gamelists.* FROM gamelists ";
	}	

	public static function queryWhere(  ){
		
		return " WHERE gamelists.id IS NOT NULL ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
