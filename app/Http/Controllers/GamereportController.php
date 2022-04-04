<?php namespace App\Http\Controllers;

use App\Models\Gamereport;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;
use Validator, Input, Redirect ; 


class GamereportController extends Controller {

	protected $layout = "layouts.main";
	protected $data = array();	
	public $module = 'gamereport';
	static $per_page	= '10';

	public function __construct()
	{
		parent::__construct();
		$this->model = new Gamereport();
		$this->info = $this->model->makeInfo( $this->module);
		$this->access = array();
	
		$this->data = array_merge(array(
			'pageTitle'	=> 	$this->info['title'],
			'pageNote'	=>  $this->info['note'],
			'pageModule'=> 'gamereport',
			'return'	=> self::returnURL()
			
		),$this->data);

		
	}

	public function index( Request $request )
	{	

		$date = '';
		if(empty($request->input('date')))
		{
			$date = date('Y-m-d');
			$date = 'date(systemdate) = CURRENT_DATE()';
		}else{
			$date=$request->input('date');
			$date = 'date(systemdate) = "'.$date.'"';
		}

		$gameusername = '';

		if(!empty($request->input('gameusername'))){

			$gameusername = ' and gameusername = "'.$request->input('gameusername').'"';
		}

		$pagest = 0;
		$pageend = 50;

		if(!empty($request->input('page'))){
			$pagest = 50*$request->input('page');
			$pageend = $pagest+50;
		}
		

		$select=\DB::connection('mysql2')->select("SELECT * from game_histories gh where agent = '".config('sximo.cnf_appdesc')."' and ".$date." ".$gameusername." order by id desc limit ".$pagest.",".$pageend);

		$count=\DB::connection('mysql2')->select("SELECT count(*) as count from game_histories gh where agent = '".config('sximo.cnf_appdesc')."' and ".$date." ".$gameusername." order by id desc");

		$this->data['count']=$count[0]->count;
		$this->data['report']=$select;
		$this->data['date']=$date;
		$this->data['gameusername']=$gameusername;
		
		return view('gamereport.index',$this->data);
	}
	function show(Request $request, $id = null)
	{
		return view('gamereport.view',$this->data);
	}	
	public function create( $id = null)
	{		
		return view('gamereport.form',$this->data);	
	}	
	public function edit( $id = null)
	{		
		return view('gamereport.form',$this->data);	
	}	
	function store( Request $request)
	{		
	
	}
	public function destroy( Request $request)
	{
		
		
	}			


}