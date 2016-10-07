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
		$s_type=DB::table('supplier_type')->get();
		return view('suplierMain',compact(array('data','s_type')));		
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
		
		$st = DB::table('supplier_type')->get();		
		
		return View::make('add_supplier')->with('st', $st);
	}

	public function getEditSupplier(Request $req){
		
		$v = Validator::make( $req->all(), [
			'id' => 'required|integer'
		]);
		if(!$v->passes()) {
			$msg = $v->messages()->toJson();
			return Response::json(array('success'=>false, 'error' => array($msg)));
		}
		if(Input::has('id')){
			$id = Input::get('id');
		}
			$data = DB::table('suppliers')
			->where('id', $id)
			->first();

		$st = DB::table('supplier_type')->get();		
		
		return View::make('edit_supplier')->with('st', $st)->with('data',$data);
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
