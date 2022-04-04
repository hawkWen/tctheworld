<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class reportdailysum extends Sximo  {
	
	protected $table = 'sumallamount';
	protected $primaryKey = '';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		return " SELECT date(date_time),sum(deposit_amount) as sumdeposit,sum(withdraw_amount) as sumwithdraw,sum(deposit_amount-withdraw_amount) as diff  FROM sumallamount ";
	}	

	public static function queryWhere(  ){
		
		return "  ";
	}
	
	public static function queryGroup(){
		return " group by date(date_time) ";
	}
	

}
