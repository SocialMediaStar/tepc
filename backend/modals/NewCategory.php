<?php   
	define("_VALID_PHP", true);
	require_once("../../init.php");
?>
<div class="row">
<div class="col-xs-12 col-sm-12">
			<div class="form-group col-xs-12 col-md-12">
				<h4><strong>Categories</strong></h4>
				<hr/>
			</div>
	<div class="col-xs-6 col-sm-8">
		<h4>Categories</h4>
		<table class="table table-bordered catsList">
			<tbody>
			</tbody>
		</table>
	</div>
	<div class="col-xs-6 col-sm-4">
		<form method="post" action="javascript:void(0);" id="NewCategoryForm">
		<input type="hidden" name="NewCategory" value="1">
			<h4>Add new category</h4>
			<div class="form-group">
				<label>Name</label>
				<input type="text" name="name" class="form-control">
			</div>
			<div class="text-right">
				<button type="button" class="btn btn-default" data-dismiss="modal">Discard</button>
				<button type="submit" onclick="AddNewCategory();" class="btn btn-primary">Save</button>
			</div>
			</div>
		</form>
	</div>
</div>
</div>
<script>
	GetCategoriesList();
</script>