<?php namespace App\Http\Controllers;

use App\Models\Clearpg;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;
use Validator, Input, Redirect ; 


class ClearpgController extends Controller {

	protected $layout = "layouts.main";
	protected $data = array();	
	public $module = 'clearpg';
	static $per_page	= '50';

	public function __construct()
	{
		
		parent::__construct();
		$this->model = new Clearpg();
		$this->info = $this->model->makeInfo( $this->module);
		$this->access = array();
	
		$this->data = array_merge(array(
			'pageTitle'	=> 	$this->info['title'],
			'pageNote'	=>  $this->info['note'],
			'pageModule'=> 'clearpg',
			'return'	=> self::returnUrl()
			
		),$this->data);


		
	}

	public function index( Request $request )
	{
		// Make Sure users Logged 
		if(!\Auth::check()) 
			return redirect('user/login')->with('status', 'error')->with('message','You are not login');
		$this->grab( $request) ;
		if($this->access['is_view'] ==0){
			return redirect('dashboard')->with('message', __('core.note_restric'))->with('status','error');		
					
		}else{
			\DB::table('pgbetpayout')->truncate();
			\DB::table('game_histories')->truncate();
			\DB::table('jilibetpayout')->truncate();
			return redirect('dashboard')->with('message', __('ล้างค่า pg แล้ว'))->with('status','success');	
		}
		// Render into template


			
	}	
	function show( Request $request , $id ) 
	{
		/* Handle import , export and view */
		$task =$id ;
		switch( $task)
		{

			case 'export':
				return $this->getExport( $request );
				break;
	
		}
	}
}