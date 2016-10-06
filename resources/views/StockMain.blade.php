@include('partials.stockMenue')
<div class="grid fluid">
	<div class="row">
		<div class="span12">
			<legend>Stock Register</legend>
			<table class="table table-hover table-bordered" id="data_table">
				<thead>
					<tr><th>Code</th><th>Type</th><th>Product Name</th><th>Lead Time</th><th>Alaraming Qty.</th><th>Available Qty.</th><th>Unit Price</th><th width="110px">Actions</th></tr>
				</thead>
				<tbody>
                        <?php
                        $stock = DB::table('stock')
                            ->where('status', 'ACTIVE')
                            ->get();

                        foreach($stock as $st) {
                        echo "<tr><td>".$st->code."</td><td>".$st->generic."</td><td>".$st->brand."</td><td>"
                        .$st->lead_time."</td><td>".$st->alarm_at."</td><td>".$st->quantity."</td><td>".$st->latest_unit_price."</td>"
                        ."<td><input type='button' class='btn btn-sm btn-success' value='Edit' onClick='Stock.showDetails(".$st->id.")' />&nbsp;<input type='button' class='btn btn-sm btn-danger' value='Delete' onClick='Stock.confirmDelete(".$st->id.")' /></tr>";
                        }
                        ?>
                    </tbody>
			</table>
		</div>
	</div> <!-- .row -->
</div>