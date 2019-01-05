<?php   
	define("_VALID_PHP", true);
	require_once("../../init.php");
?>
<div class="row">
	<div class="col-xs-12 col-sm-12">
		<div class="col-xs-12 col-sm-6">			
			<div class="well eqStatusesArea">
			</div>
		</div>
		<div class="col-xs-12 col-sm-6">
			<div class="well">
			<form method="POST" action="javascript:void(0)" id="AddEqServiceStatus">
			<input type="hidden" name="AddEqServiceStatus" value="1">
			<h4><strong>Add status</strong></h4>
			<hr/>
			<div class="form-group">
				<label>Name</label>
				<input type="text" class="form-control" name="name">
			</div>
			<div class="form-group">
				<label>Color</label>
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
			<div class="form-group">
				<button type="submit" onClick="AddEqServiceStatusFunc();" class="btn btn-block btn-primary">Add status</button>
			</div>
			</form>
			</div>
			<div class="form-group text-right">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>	
		</div>
	</div>
</div>

<script>
	LoadEqServiceStatuses();
</script>