<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class reportdaily extends Sximo  {
	
	protected $table = 'kbank_trans';
	protected $primaryKey = '';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		return " SELECT FORMAT(sum(kbank_trans.deposit),2) as sumdeposit,STR_TO_DATE(kbank_trans.date,'%d/%m/%Y') as depositedate FROM `kbank_trans` ";
	}	

	public static function queryWhere(  ){
		
		return " where kbank_trans.deposit != 0 ";
	}
	
	public static function queryGroup(){
		return " group by STR_TO_DATE(kbank_trans.date,'%d/%m/%Y') order by STR_TO_DATE(kbank_trans.date,'%d/%m/%Y') DESC ";
	}
	

}
