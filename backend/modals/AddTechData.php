<?php   
	define("_VALID_PHP", true);
	require_once("../../init.php");
?>
	<form method="post" action="javascript:void(0);" id="ChangeEqTechForm">
		<input type="hidden" name="ChangeEqTech" value="1">
			<div class="row">
			<div class="form-group col-xs-12 col-md-12">
				<h4><strong>Change Eq tech</strong></h4>
				<hr/>
			</div>
					<table class="table table-bordered table-striped">
			<thead>
				<tr>
					<th width="50%">Label</th>
					<th>Value</th>
				</tr>
			</thead>
			<tbody id="TechRows">
				<?php $techs = $db->fetch_all("SELECT * FROM eq_tech WHERE eq_id = '".$eq->eid."'"); ?>
				<?php foreach($techs as $tech):?>
				<tr>
					<td><input class="form-control" type="text" name="label[]" value="<?php echo $tech["label"];?>"></td>
					<td><input class="form-control" type="text" name="name[]" value="<?php echo $tech["name"];?>"></td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
		<div class="form-group">
			<button class="btn btn-success" type="button" onClick="AddTechRow();">Add row</button>
		</div>
		<h4 class="margin-top-10"><strong>Info:</strong></h4>
		<div class="form-group">
			<textarea name="techMore" class="form-control" rows="10"><?php echo $eq->tech_info;?></textarea>
		</div>		

			<div class="col-xs-12 col-md-12 text-right">
				<hr/>
				<button type="button" class="btn btn-default" data-dismiss="modal">Discard</button>
				<button type="submit" onclick="ChangeEqTechFunc()" class="btn btn-primary">Save</button>
			</div>
			</div>
		</form>
		