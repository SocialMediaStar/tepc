<?php   
	define("_VALID_PHP", true);
	require_once("../../init.php");
?>
<div class="row">
<div class="col-xs-12 col-sm-12">
			<div class="form-group col-xs-12 col-md-12">
				<h4><strong>Statuses</strong></h4>
				<hr/>
			</div>
	<div class="col-xs-6 col-sm-8">
		<h4>Statuses</h4>
		<table class="table table-bordered statusList">
			<tbody>
			</tbody>
		</table>
	</div>
	<div class="col-xs-6 col-sm-4">
		<form method="post" action="javascript:void(0);" id="NewStatusForm">
		<input type="hidden" name="NewStatus" value="1">
			<h4>Add new status</h4>
			<div class="form-group">
				<label>Name</label>
				<input type="text" name="name" class="form-control">
			</div>
			<div class="form-group">
				<label class="block">Color</label>
					<div class="btn btn-xs btn-primary">
						<input type="radio" name="label" value="primary">
					</div>
					<div class="btn btn-xs btn-info">
						<input type="radio" name="label" value="info">
					</div>
					<div class="btn btn-xs btn-success">
						<input type="radio" name="label" value="success">
					</div>
					<div class="btn btn-xs btn-warning">
						<input type="radio" name="label" value="warning">
					</div>
					<div class="btn btn-xs btn-danger">
						<input type="radio" name="label" value="danger">
					</div>
			</div>
			<div class="text-right">
				<button type="button" class="btn btn-default" data-dismiss="modal">Discard</button>
				<button type="submit" onclick="AddNewStatusFunc();" class="btn btn-primary">Save</button>
			</div>
			</div>
		</form>
	</div>
</div>
</div>
<script>
	GetStatusList();
</script>