<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class bet extends Sximo  {
	
	protected $table = 'bet';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		return "  SELECT bet.* FROM bet  ";
	}	

	public static function queryWhere(  ){
		
		return "  WHERE bet.id IS NOT NULL ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
