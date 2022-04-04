<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class channel extends Sximo  {
	
	protected $table = 'channel';
	protected $primaryKey = 'channel_id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		return "  SELECT channel.* FROM channel  ";
	}	

	public static function queryWhere(  ){
		
		return "  WHERE channel.channel_id IS NOT NULL ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
