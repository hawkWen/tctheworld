<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class gamehistory extends Sximo  {
	
	protected $table = 'game_histories';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		return "  SELECT game_histories.* FROM game_histories  ";
	}	

	public static function queryWhere(  ){
		
		return "  WHERE game_histories.id IS NOT NULL ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
