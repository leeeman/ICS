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
class CustomerController extends Controller {
	
	public function getCustomersMain(){	
		$data = DB::table('customers')
		->get();
		return view('customerMain')->with('data', $data);		
	}

	public function getAccountDetail(){
		$data = DB::table('customer_account')
		->where('customer_id', Input::get('id'))
		->get();

		$customer = DB::table('customers')
		->where('id', Input::get('id'))
		->first();

		return view('customerAccount')->with('data', $data)->with('customer', $customer);
	}

	public function getNewCustomer(){
		if(Input::has('id')){
			$id = Input::get('id');
		}
		else{
			$id = 0;
		}

		/*$data = DB::table('customers')
			->where('id', $id)
			->first();*/
		
		/*if(count($data) > 0){
			$ct = $data->customer_type;
		} else{
			$ct = null;
		}*/

		$ct = DB::table('customer_type')
		->get();
		return View::make('add_customer')->with('ct', $ct);
	}


	public function getEditCustomer(Request $req){

		if(Input::has('id')){
			$id = Input::get('id');
		}
		else{
			$id = 0;
		}

		$data = DB::table('customers')
			->where('id', $id)
			->first();

		$ct = DB::table('customer_type')
		->get();
		return View::make('edit_customer')->with('data',$data)->with('ct', $ct);
	}

	public function postSaveCustomer(Request $req){
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
			$update = DB::table('customers')
				->where('id', $req->input('id'))
				->update($data)
			;
		} else{
			$insert = DB::table('customers')
				->insertGetId($data)
			;
		}
		return Response::json(array('success'=>true, 'error' => 'no error', 'msg'=>'Changes saved'));
	}
}
