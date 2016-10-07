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
class SupplierController extends Controller {
	
	public function getSuppliersMain(){	
		$data = DB::table('suppliers')
		->get();
		return view('suppliersMain')->with('data', $data);		
	}

	public function getAccountDetail(){
		$data = DB::table('supplier_account')
		->where('supplier_id', Input::get('id'))
		->get();

		$supplier = DB::table('suppliers')
		->where('id', Input::get('id'))
		->first();

		return view('supplierAccount')->with('data', $data)->with('supplier', $supplier);
	}

	public function getNewSupplier(){
		if(Input::has('id')){
			$id = Input::get('id');
		}
		else{
			$id = 0;
		}

		$data = DB::table('suppliers')
			->where('id', $id)
			->first();
		
		if(count($data) > 0){
			$st = $data->supplier_type;
		} else{
			$st = null;
		}
		return View::make('add_supplier')->with('data', $data)->with('st', $st);
	}

	public function postSaveSupplier(Request $req){
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
			$update = DB::table('suppliers')
				->where('id', $req->input('id'))
				->update($data)
			;
		} else{
			$insert = DB::table('suppliers')
				->insertGetId($data)
			;
		}
		return Response::json(array('success'=>true, 'error' => 'no error', 'msg'=>'Changes saved'));
	}
}
