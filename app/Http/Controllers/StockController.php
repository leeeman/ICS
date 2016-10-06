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
class StockController extends Controller {
	
	public function getManageStock(){
		return View::make('StockMain');
	}

	public function getAll(){
		$result = DB::table('stock')->get();
		return Response::json(array('success'=>true, 'error' => 'no error', 'msg' => $result));
	}

	public function getNewStock(){
		if(Input::has('id')){
			$id = Input::get('id');
		}
		else{
			$id = 0;
		}

		$data = DB::table('stock')
			->where('id', $id)
			->first();
		
		if(count($data) > 0){
			$df = $data->dosage_form;
			$su = $data->strength_unit;
		} else{
			$df = null;
			$su = null;
		}
		return View::make('add_stock')->with('data', $data)->with('df', $df)->with('su', $su);	
	}

	public function postSaveStock(Request $req){
		$data = $req->all();
		unset($data['_token']);

		$v = Validator::make( $data, [
			'generic' 	=> 'required|string',
			'code' 		=> 'required|string',
			'brand'		=> 'required|string',
			
			'alarm_at'	=> 'required|integer',
			'lead_time' => 'required|integer'
			
		]);

		if(!$v->passes()) {
			$msg = $v->messages()->toJson();
			return Response::json(array('success'=>false, 'error' => array($msg)));
		}

		if( Input::get('id') > 0){
			$update = DB::table('stock')
				->where('id', $req->input('id'))
				->update($data)
			;
		} else{
			$insert = DB::table('stock')
				->insertGetId($data)
			;
		}
		return Response::json(array('success'=>true, 'error' => 'no error', 'msg'=>'Changes saved'));
	}

	public function postDeleteStock(Request $req){
		$v = Validator::make( $req->all(), [
			'id' => 'required|integer'
		]);
		if(!$v->passes()) {
			$msg = $v->messages()->toJson();
			return Response::json(array('success'=>false, 'error' => array($msg)));
		}
		$delete = DB::table('stock')
			->where('id', Input::get('id'))
			// ->update(['status'=>'ACTIVE'])
			->delete()
			;
		if( $delete )
			return Response::json(array('success'=>true, 'error' => 'no error', 'msg'=>'Deleted successfully!'));
		else
			return Response::json(array('success'=>false, 'error' => "Cant't Delete"));		
	}

	/*public function getTest(){
		DB::statement('CREATE TEMPORARY TABLE event_ids(ticket_id VARCHAR(30), external_event_id INT(11) )');
		DB::table('event_ids')
			->insert(
				['ticket_id' => 12, 'external_event_id'=>124]
			);
		$r = DB::table('event_ids')->first();
		return json_encode($r);
	}*/

	
}
