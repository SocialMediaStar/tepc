<?php   
	define("_VALID_PHP", true);
	require_once("../../init.php");
?>
	<form method="post" action="javascript:void(0);" id="NewEqForm">
		<input type="hidden" name="NewEq" value="1">
			<div class="row">
			<div class="form-group col-xs-12 col-md-12">
				<h4><strong>Add new equipment</strong></h4>
				<hr/>
			</div>
			<div class="form-group col-xs-12 col-md-4">
				<label>ID</label>
				<input type="text" name="def" class="form-control">
			</div>
			<div class="form-group col-xs-12 col-md-8">
				<label>Name</label>
				<input type="text" name="name" class="form-control">
			</div>
			<div class="form-group col-xs-12">
				<label>Company</label>
				<input type="text" name="company" class="form-control">
			</div>
			<div class="form-group col-xs-12 col-md-12">
				<label>Category</label>
				<select name="category" class="form-control">
					<option selected disabled>--- Choose category ---</option>
					<?php foreach ($eq->GetCategories() as $cat): ?>
						<option value="<?php echo $cat["id"];?>"><?php echo $cat["name"];?></option>
					<?php endforeach; ?>
				</select>
			</div>
			<div class="form-group col-xs-12 col-md-12">
				<label>Status</label>
				<select class="form-control" name="status">
					<option disabled selected>--- Choose status ---</option>
					<?php foreach ($eq->GetStatuses() as $st): $i=0; ?>
					<option value="<?php echo $st["id"];?>"><?php echo $st["name"];?></option>
					<?php $i++; endforeach; ?>
				</select>
			</div>
			<div class="col-xs-12 col-md-12 text-right">
				<hr/>
				<button type="button" class="btn btn-default" data-dismiss="modal">Discard</button>
				<button type="submit" onclick="AddNewEq();" class="btn btn-primary">Save</button>
			</div>
			</div>
		</form>
		