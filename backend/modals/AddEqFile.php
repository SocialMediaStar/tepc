<?php   
	define("_VALID_PHP", true);
	require_once("../../init.php");
?>
	<form method="post" action="javascript:void(0);" id="AddEqFileForm">
		<input type="hidden" name="AddEqFile" value="1">
			<div class="row">
			<div class="form-group col-xs-12 col-md-12">
				<h4><strong>Add eq file</strong></h4>
				<hr/>
			</div>
		<div class="form-group col-xs-12 col-md-12">
			<label>File name</label>
			<input type="text" name="name" class="form-control">
		</div>
		<div class="form-group col-xs-12 col-md-12">
			<label class="block">Upload file</label>
			<input type="file" name="files" class="form-control">
		</div>		

			<div class="col-xs-12 col-md-12 text-right">
				<hr/>
				<button type="button" class="btn btn-default" data-dismiss="modal">Discard</button>
				<button type="submit" onclick="UploadEqFileFunc()" class="btn btn-primary">Save</button>
			</div>
			</div>
		</form>
		