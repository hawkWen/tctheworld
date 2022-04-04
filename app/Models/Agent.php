<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class agent extends Sximo  {
	
	protected $table = 'agents_turnover';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		return "  SELECT agents_turnover.* FROM agents_turnover  ";
	}	

	public static function queryWhere(  ){
		
		return "  WHERE agents_turnover.id IS NOT NULL ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
