<?php   
	define("_VALID_PHP", true);
	require_once("../../init.php");
?>
	<form method="post" action="javascript:void(0);" id="EditUserForm">
		<input type="hidden" name="EditUser" value="1">
		<input type="hidden" name="uid" value="">
			<div class="row">
			<div class="form-group col-xs-12 col-md-12">
				<h4><strong>Edit user</strong></h4>
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
				<span class="note">* Fill only if you want change password!</span>
			</div>
			<div class="col-xs-12 col-md-12 text-right">
				<hr/>
				<button type="button" class="btn btn-default" data-dismiss="modal">Discard</button>
				<button type="submit" onclick="EditUserFunc();" class="btn btn-primary">Save</button>
			</div>
			</div>
		</form>
		