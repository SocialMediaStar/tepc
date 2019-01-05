<?php   
	define("_VALID_PHP", true);
	require_once("../../init.php");
?>
	<form method="post" action="javascript:void(0);" id="EditEqPartsForm">
		<input type="hidden" name="EditEqParts" value="1">
			<div class="row">
			<div class="form-group col-xs-12 col-md-12">
				<h4><strong>Edit eq parts</strong></h4>
				<hr/>
			</div>
		<table class="table table-striped table-bordered col-xs-12 col-md-12">
			<thead>
				<tr>
					<th>Code</th>
					<th>Description</th>
					<th>Seller</th>
				</tr>
			</thead>
			<tbody>
			</tbody>
		</table>

			<div class="col-xs-12 col-md-12 text-right">
				<hr/>
				<button type="button" class="btn btn-default" data-dismiss="modal">Discard</button>
				<button type="submit" onclick="EditEqPartsFunc()" class="btn btn-primary">Save</button>
			</div>
			</div>
		</form>
		