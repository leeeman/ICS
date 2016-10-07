@include('partials.suplierMenue')
<div class="grid fluid form-style">
	<div class="row">
		<div class="span12">
			<legend>Supplier Register</legend>
			<table class="table bordered" id="data_table">
				<thead>
						<tr>
							<th>Supplier #</th><th>Supplier Name</th><th>E-mail</th><th>Address</th><th>Contact 1</th>
							<th>Contact 2</th><th>Supplier Type</th><th width="145px">Action</th>
						</tr>
				<tbody>
                      
							@foreach($data as $s)
								<tr>
									<td>{{$s->id}}</td>
									<td>{{$s->name}}</td>
									<td>{{$s->email}}</td>
								    <td>{{$s->address}}</td>
								    <td>{{$s->contact_1}}</td>
								    <td>{{$s->contact_2}}</td>
									<td>{{$s->supplier_type}}</td>
									
									<td><button class='button default' onClick='Supplier.showDetails({{$s->id}})'>Edit</button>&nbsp;
									
									</td>
								</tr>
							@endforeach
				</tbody>
			</table>
		</div>
	</div> <!-- .row -->
</div>