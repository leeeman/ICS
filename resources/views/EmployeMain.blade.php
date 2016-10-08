@include('partials.employeMenue')
<div class="grid fluid form-style">
	<div class="row">
		<div class="span12">
			<legend>Employe List</legend>
			<table class="table bordered" id="data_table">
				<thead>
						<tr>
							<th>Employe #</th><th>Employe Name</th><th>Iqama #</th><th>E-mail</th><th>Address</th><th>Contact 1</th>
							<th>Contact 2</th><th>Employe Type</th><th width="145px">Action</th>
						</tr>
				<tbody>
                      
							@foreach($data as $s)
								<tr>
									<td>{{$s->id}}</td>
									<td>{{$s->name}}</td>
									<td>{{$s->id_number}}</td>
									<td>{{$s->email}}</td>
								    <td>{{$s->address}}</td>
								    <td>{{$s->contact_1}}</td>
								    <td>{{$s->contact_2}}</td>
									<td>{{$s->employe_type_id}}</td>
									
									<td><button class='button default' onClick='Employe.showDetails({{$s->id}})'>Edit</button>&nbsp;
									
									</td>
								</tr>
							@endforeach
				</tbody>
			</table>
		</div>
	</div> <!-- .row -->
</div>