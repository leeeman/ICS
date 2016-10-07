@include('partials.stockMenue')
<div class="grid fluid form-style">
	<div class="row">
		<div class="span12">
			<legend>Stock Register</legend>
			<table class="table bordered" id="data_table">
				<thead>
					<tr><th>Code</th><th>Type</th><th>Product Name</th>
					<th>Lead Time</th><th>Alaraming Qty.</th>
					<th>Available Qty.</th><th>Unit Price</th>
					<th width="110px">Actions</th></tr>
				</thead>
				<tbody>
                       

                        @foreach($stock as $st)
                        <tr>
                        	<td>{{$st->code}}</td>
                        	<td>{{$st->generic}}</td>
                        	<td>{{$st->brand}}</td>
                        	<td>{{$st->lead_time}}</td>
                        	<td>{{$st->alarm_at}}</td>
                        	<td>{{$st->quantity}}</td>
                        	<td>{{$st->latest_unit_price}}</td>
                            <td>
                            	<button type='button' class='button default' onClick='Stock.showDetails({{$st->id}})'>Edit</button>&nbsp;
                            	<button type='button' class='button warning' onClick='Stock.confirmDelete({{$st->id}})' >Del</button>
  							</td>
                        </tr>
                       @endforeach
                    </tbody>
			</table>
		</div>
	</div> <!-- .row -->
</div>