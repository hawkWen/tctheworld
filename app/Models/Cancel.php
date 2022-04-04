<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class cancel extends Sximo  {
	
	protected $table = 'cancel';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		return "  SELECT cancel.* FROM cancel  ";
	}	

	public static function queryWhere(  ){
		
		return "  WHERE cancel.id IS NOT NULL ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
