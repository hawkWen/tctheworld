<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class smsjo extends Sximo  {
	
	protected $table = 'sms';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		return "  SELECT sms.* FROM sms  ";
	}	

	public static function queryWhere(  ){
		
		return "  WHERE sms.id IS NOT NULL ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
