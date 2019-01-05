<?php   
	define("_VALID_PHP", true);
	require_once("../../init.php");
?>
	<form method="post" action="javascript:void(0);" id="ChangeEqServiceStatusForm">
		<input type="hidden" name="ChangeEqServiceStatus" value="1">
		<input type="hidden" name="ServiceID" id="ServiceID" value="">
			<div class="row">
			<div class="form-group col-xs-12">
				<h4><strong>Change service status</strong></h4>
				<hr/>
			</div>
			<div class="form-group col-xs-12" id="statuses"> 
				<label class="block">Status</label> 
				<span class="btn btn-xs btn-success" onClick="SelectInput(1);"><input type="radio" name="status" value="1"> Success</span> 
				<span class="btn btn-xs btn-danger" onClick="SelectInput(2);"><input type="radio" name="status" value="2"> Failed</span> 
				<span class="btn btn-xs btn-warning" onClick="SelectInput(3);"><input type="radio" name="status" value="3"> Pending</span> 
			</div> 
			<div class="form-group col-xs-12">
				<label>Note</label>
				<textarea class="form-control" name="note"></textarea>
			</div>
			<div class="col-xs-12 col-md-12 text-right">
				<hr/>
				<button type="button" class="btn btn-default" data-dismiss="modal">Discard</button>
				<button type="submit" onclick="ChangeEqServiceStatusFunc()" class="btn btn-primary">Save</button>
			</div>
			</div>
		</form>
		