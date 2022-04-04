<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class gamepartners extends Sximo  {
	
	protected $table = 'game_partners';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		return " SELECT game_partners.* FROM game_partners ";
	}	

	public static function queryWhere(  ){
		
		return " WHERE game_partners.id IS NOT NULL ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
