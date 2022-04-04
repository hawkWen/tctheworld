<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class reportdailytrue extends Sximo  {
	
	protected $table = 'truewallet_trans';
	protected $primaryKey = '';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		return " SELECT format(sum(truewallet_trans.amount),2) as sumamount,STR_TO_DATE(truewallet_trans.date,'%d/%m/%Y') as datetrue  FROM `truewallet_trans` ";
	}	

	public static function queryWhere(  ){
		
		return " WHERE truewallet_trans.name = 'โอนเงิน' ";
	}
	
	public static function queryGroup(){
		return " GROUP by STR_TO_DATE(truewallet_trans.date,'%d/%m/%Y') ORDER BY STR_TO_DATE(truewallet_trans.date,'%d/%m/%Y') DESC ";
	}
	

}
