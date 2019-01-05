<?php   
	define("_VALID_PHP", true);
	require_once("../../init.php");
?>
	<form method="post" action="javascript:void(0)" id="ChangeEqData">
	<input type="hidden" name="ChangeEqData" value="1">
	<input type="hidden" name="new" value="0">
	<h4>Muuda seadme üldandmeid</h4>
	<hr/>
        <div class="form-group">
			<label>Seadme nimi</label>
			<input type="text" name="name" placeholder="Seadme nimi" class="form-control" value="<?php echo $eq->name;?>">
		</div>
		<div class="form-group">
			<label>Seadme ID:</label>
			<input type="text" name="def" class="form-control" placeholder="Seadme ID" value="<?php echo $eq->def;?>">
		</div>
		<div class="form-group">
			<label>Seadme firma</label>
			<input type="text" name="company" class="form-control" placeholder="Seadme firma" value="<?php echo $eq->company;?>">
		</div>
		<div class="form-group">
			<label>Seadme seerianumber</label>
			<input type="text" name="serial" class="form-control" placeholder="Seadme seerianumber" value="<?php echo $eq->serial;?>">
		</div>
        <div class="form-group">
			<label>Seadme kirjeldus</label>
			<textarea class="form-control" name="about"><?php echo br2nl($eq->about);?></textarea>
		</div>
		<div class="form-group">
			<label>Seadme kategooria</label>
			<select class="form-control" name="category">
			</select>
		</div>
		<div class="form-group">
			<label>Seadme asukoht</label>
			<input type="text" name="eqlocation" class="form-control" placeholder="Seadme location" value="<?php echo $eq->location;?>">			
		</div>
		<div class="form-group">
			<label>Seadme kasutaja</label>
			<input type="text" name="whouse" class="form-control" placeholder="Seadme kasutaja" value="<?php echo $eq->who_use;?>">			
		</div>
		<div class="form-group">
			<label>Seadme pilt</label>
			<input type="file" name="picture" class="form-control">
		</div>
		<hr/>
        <button type="button" class="btn btn-default" data-dismiss="modal">Loobu</button>
        <button type="submit" class="btn btn-primary">Salvesta</button>
		</form>