<?php   
	define("_VALID_PHP", true);
	require_once("../../init.php");
?>
	<table id="EqPartsTable" class="table table-striped table-bordered" width="100%">					
		<thead>
			<tr>
				<th class="hasinput" style="width:20%">
					<input type="text" class="form-control" placeholder="" />
				</th>
				<th class="hasinput" style="width:10%">
					<input type="text" class="form-control" placeholder="" />
				</th>
				<th class="hasinput text-center" style="width:50%">
					<input type="text" class="form-control" placeholder="" />
				</th>
				<th class="hasinput text-center" style="width:50%">
				</th>
			</tr>
			<tr>
			    <th>Code</th>
			    <th>Description</th>
			    <th>Seller</th>
			    <th>Actions</th>
			</tr>
		</thead>
		<tbody>
		</tbody>
	</table>
	<div class="col-xs-12">
		<hr/>
		<div class="form-group text-right">
			<button type="button" data-toggle="modal" data-id="AddEqParts" data-target="#OpenModal" class="btn btn-primary">Add parts</button>
		</div>
	</div>
<script>
EqPartsTable();
</script>