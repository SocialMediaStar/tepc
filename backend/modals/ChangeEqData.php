<?php   
	define("_VALID_PHP", true);
	require_once("../../init.php");
?>
	<form method="post" action="javascript:void(0);" id="ChangeEqDataForm">
		<input type="hidden" name="ChangeEqData" value="1">
			<div class="row">
			<div class="form-group col-xs-12 col-md-12">
				<h4><strong>Change Eq Data</strong></h4>
				<hr/>
			</div>
			<div class="form-group col-xs-12 col-md-4">
				<label>ID</label>
				<input type="text" name="def" class="form-control" value="<?php echo $eq->def;?>">
			</div>
			<div class="form-group col-xs-12 col-md-8">
				<label>Name</label>
				<input type="text" name="name" class="form-control" value="<?php echo $eq->name;?>">
			</div>
			<div class="form-group col-xs-12">
				<label>Serial</label>
				<input type="text" name="serial" class="form-control" value="<?php echo $eq->serial;?>">
			</div>
			<div class="form-group col-xs-12">
				<label>Company</label>
				<input type="text" name="company" class="form-control" value="<?php echo $eq->company;?>">
			</div>
			<div class="form-group col-xs-12">
				<label>Location</label>
				<input type="text" name="location" class="form-control" value="<?php echo $eq->location;?>">
			</div>
			<div class="form-group col-xs-12">
				<label>Who use</label>
				<input type="text" name="who_use" class="form-control" value="<?php echo $eq->who_use;?>">
			</div>
			<div class="form-group col-xs-12 col-md-12">
				<label>Category</label>
				<select name="category" class="form-control">
					<?php foreach ($eq->GetCategories() as $cat): ?>
						<option <?php if ($eq->category_id == $cat["id"]) { echo "selected"; } ?> value="<?php echo $cat["id"];?>"><?php echo $cat["name"];?></option>
					<?php endforeach; ?>
				</select>
			</div>
			<div class="form-group col-xs-12 col-md-12">
				<label>Status</label>
				<select class="form-control" name="status">
					<option disabled selected>--- Choose status ---</option>
					<?php foreach ($eq->GetStatuses() as $st): $i=0; ?>
					<option <?php if ($eq->status_id == $st["id"]) { echo "selected"; } ?> value="<?php echo $st["id"];?>"><?php echo $st["name"];?></option>
					<?php $i++; endforeach; ?>
				</select>
			</div>
			<div class="form-group col-xs-12 col-md-12">
				<label>Description</label>
				<textarea class="form-control" name="about"><?php echo $eq->about;?></textarea>
			</div>
			<div class="col-xs-12 col-md-12 text-right">
				<hr/>
				<button type="button" class="btn btn-default" data-dismiss="modal">Discard</button>
				<button type="submit" onclick="ChangeEqDataFunc()" class="btn btn-primary">Save</button>
			</div>
			</div>
		</form>
		