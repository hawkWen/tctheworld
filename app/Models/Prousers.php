<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class prousers extends Sximo  {
	
	protected $table = 'promotion_users';
	protected $primaryKey = '';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		return " SELECT count(*) as จำนวนที่รับ,sum(phu.deposit_amount) as เงินที่ได้, IFNULL(promotion_name,'ลบไปแล้ว') as ชื่อโปรโมชั่น FROM promotions_history_users phu left join promotions on promotions.id = phu.promotion_id ";
	}	

	public static function queryWhere(  ){
		
		return "  ";
	}
	
	public static function queryGroup(){
		return " GROUP by promotion_id ";
	}
	

}
