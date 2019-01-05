<?php   
	define("_VALID_PHP", true);
	require_once("../../init.php");
?>
	<form method="post" action="javascript:void(0);" id="NewUserForm">
		<input type="hidden" name="NewUser" value="1">
			<div class="row">
			<div class="form-group col-xs-12 col-md-12">
				<h4><strong>Add new user</strong></h4>
				<hr/>
			</div>
			<div class="form-group col-xs-12">
				<label>Username</label>
				<input type="text" name="username" class="form-control">
			</div>
			<div class="form-group col-xs-12">
				<label>First name</label>
				<input type="text" name="fname" class="form-control">
			</div>
			<div class="form-group col-xs-12">
				<label>Last name</label>
				<input type="text" name="lname" class="form-control">
			</div>
			<div class="form-group col-xs-12">
				<label>Password</label>
				<input type="password" name="pass" class="form-control">
			</div>
			<div class="col-xs-12 col-md-12 text-right">
				<hr/>
				<button type="button" class="btn btn-default" data-dismiss="modal">Discard</button>
				<button type="submit" onclick="NewUserFunc();" class="btn btn-primary">Save</button>
			</div>
			</div>
		</form>
		