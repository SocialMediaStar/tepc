<?php   
	define("_VALID_PHP", true);
	require_once("../../init.php");
?>
	<div class="col-xs-12">
		<div class="col-xs-4 col-md-2">
			<img src="<?php echo $eq->picture;?>" class="img-thumbnail">
			<form method="POST" action="ajax/eq.php?eq_id=<?php echo $eq->eid;?>" id="UploadEqPictureForm" enctype="multipart/form-data"> 
				<input type="hidden" name="UploadEqPicture" value="1">
				<label class="btn btn-default btn-block margin-top-10 btn-xs btn-default btn-file">
					Change Picture <input type="file" id="picture" class="hidden" name="picture">
				</label>
			</form>
		</div>
		<div class="col-xs-8 col-md-6">
			<h1><span><?php echo $eq->name;?></span> (ID <span><?php echo $eq->def;?><span>)<small class="block"><span><?php echo $eq->company;?></span> - <span><?php echo $eq->serial;?></span></small></h1>
			<p><?php echo $eq->about;?></p>
		</div>
		<div class="col-xs-12 col-md-4">
			<ul class="unordered list-big well">
				<li>Status: <label class="label label-<?php echo $eq->status_label;?>"><?php echo $eq->status_name;?></label></li>
				<li>Location: <span><?php echo $eq->location;?></span></li>
				<li>Category: <span><?php echo $eq->category_name;?></span></li>
				<li>User: <span><?php echo $eq->who_use;?></span></li>
			</ul>
		</div>
	</div>
	<div class="col-xs-12">
		<hr/>
		<div class="form-group text-right">
			<button data-id="ChangeEqData" type="button" data-toggle="modal" data-target="#OpenModal" class="btn btn-primary">Change</button>
		</div>
	</div>
