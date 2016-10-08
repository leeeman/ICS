<?php 
#namespace & use
	namespace App\Http\Controllers;
	use Illuminate\Support\Facades\Input;
	use Illuminate\Support\Facades\Validator;
	use Illuminate\Support\Facades\Session;
	use Illuminate\Support\Facades\Response;
	use Illuminate\Http\Request;
	use View;
	use DB;
	use TCPDF;
class EmployeController extends Controller {
	
	public function getEmployeesMain(){	
		$data = DB::table('employees')
		->get();
		return view('employeMain')->with('data', $data);		
	}

	

	public function getNewEmploye(){
		if(Input::has('id')){
			$id = Input::get('id');
		}
		else{
			$id = 0;
		}

		
		$et = DB::table('employe_type')
		->get();
		return View::make('add_employe')->with('et', $et);
	}


	public function getEditEmploye(Request $req){

		if(Input::has('id')){
			$id = Input::get('id');
		}
		else{
			$id = 0;
		}

		$data = DB::table('employees')
			->where('id', $id)
			->first();

		$et = DB::table('employe_type')
		->get();
		return View::make('edit_employe')->with('data',$data)->with('et', $et);
	}

	public function postSaveEmploye(Request $req){
		$data = $req->all();
		unset($data['_token']);

		$v = Validator::make( $data, [
			'name' 			=> 'required|string',
			'contact_1' 	=> 'required|string'
		]);

		if(!$v->passes()) {
			$msg = $v->messages()->toJson();
			return Response::json(array('success'=>false, 'error' => array($msg)));
		}

		if( Input::get('id') > 0){
			$update = DB::table('employees')
				->where('id', $req->input('id'))
				->update($data)
			;
		} else{
			$insert = DB::table('employees')
				->insertGetId($data)
			;
		}
		return Response::json(array('success'=>true, 'error' => 'no error', 'msg'=>'Changes saved'));
	}
}
