<?php namespace App\Http\Controllers;

use App\Models\Gamehistories;
use App\Library\DataHelpers;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;
use Validator, Input, Redirect ; 

class GamehistoriesController extends Controller {

	protected $layout = "layouts.main";
	protected $data = array();	
	public $module = 'gamehistories';
	static $per_page	= '10';
	
	public function __construct() 
	{
		parent::__construct();
		$this->model = new Gamehistories();

		$this->model->setConnection('mysql2');
		
		$this->info = $this->model->makeInfo( $this->module);
		$this->access = $this->model->validAccess($this->info['id']);
	
		$this->data = array(
			'pageTitle'			=> 	$this->info['title'],
			'pageNote'			=>  $this->info['note'],
			'pageModule'		=> 'gamehistories',
			'pageUrl'			=>  url('gamehistories'),
			'return' 			=> 	self::returnUrl()	
		);	
			
				
	} 
	public function index()
	{
		if(empty($request->input('date')))
		{
			$date = date('Y-m-d');
		}else{
			$date=$request->input('date');
		}
		

		$select=\DB::select("select `promotions`.`promotion_name` AS `โปรโมชั่น`,
	count(0) AS `รับโปร`,
	sum(`promotions_history_users`.`deposit_amount`) AS `เงินฝาก`,
	(select count(*) from `withdraw` where (`withdraw`.`promotion_id` = `promotions_history_users`.`promotion_id`) and date(`withdraw`.date_time)='".$date."') AS `จำนวนถอน`,
	(select sum(`withdraw`.`amount`) from `withdraw` where `withdraw`.status = 'confirmed' and (`withdraw`.`promotion_id` = `promotions_history_users`.`promotion_id`)  and date(`withdraw`.date_time)='".$date."') AS `เงินถอน`,
	(sum(`promotions_history_users`.`deposit_amount`) - (select sum(`withdraw`.`amount`) from `withdraw` where  `withdraw`.status = 'confirmed' and (`withdraw`.`promotion_id` = `promotions_history_users`.`promotion_id`) and date(`withdraw`.date_time)='".$date."')) AS `ส่วนต่าง`,
	`promotions_history_users`.value*count(0) AS `เครดิต`,
	(select sum(`withdraw`.`amount`) from `withdraw` where  `withdraw`.status = 'confirmed' and `withdraw`.`promotion_id` = `promotions_history_users`.`promotion_id`  and date(`withdraw`.date_time)='".$date."')/(`promotions_history_users`.value*count(0)) AS `ความง่าย`
	from (`promotions_history_users` join `promotions` on((`promotions`.`id` = `promotions_history_users`.`promotion_id`))) 
	where (`promotions_history_users`.`status` = 'confirmed') and date(`promotions_history_users`.date_time)='".$date."'
	group by `promotions_history_users`.`promotion_id`,`promotions_history_users`.value order by `promotions_history_users`.`promotion_id`");

		$this->data['report']=$select;
		$this->data['date']=$date;
		return view('prokpi.index',$this->data);
	}
	function show(Request $request, $id = null)
	{
		return view('gamehistories.view',$this->data);
	}	
	public function create( $id = null)
	{		
		return view('prokpi.form',$this->data);	
	}	
	public function edit( $id = null)
	{		
		return view('prokpi.form',$this->data);	
	}	
	function store( Request $request)
	{		
	
	}
	public function destroy( Request $request)
	{
		
		
	}		
}