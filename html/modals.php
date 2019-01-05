<div class="modal fade" id="AddEqPartsModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Lisa seadme varuosa</h4>
      </div>
	  <form method="post" action="javascript:void(0)" id="AddEqParts">
	  <input type="hidden" name="AddEqParts" value="1">
	  <input type="hidden" name="eqid" value="<?php echo $_GET["id"];?>">
      <div class="modal-body col-xs-12">
		
		<div class="form-group col-xs-4">
			<label>Kood</label>
			<input type="text" name="code" class="form-control">
		</div>
		<div class="form-group col-xs-8">
			<label>Kirjeldus</label>
			<input type="text" name="desc" class="form-control">
		</div>
		<div class="form-group col-xs-12">
			<label>Firma andmed</label>
			<textarea class="form-control" name="company"></textarea>
		</div>
		<div class="ResultArea"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Loobu</button>
        <button type="submit" class="btn btn-primary">Salvesta</button>
      </div>
	  </form>
    </div>
  </div>
</div>
<div class="modal fade" id="AddEqFileModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Lisa fail</h4>
      </div>
	  <form method="post" action="javascript:void(0)" id="UploadEqFiles">
	  <input type="hidden" name="UploadEqFiles" value="1">
	  <input type="hidden" name="eqid" value="<?php echo $_GET["id"];?>">
      <div class="modal-body">
		
		<div class="form-group">
			<label>Faili nimi</label>
			<input type="text" name="name" class="form-control">
		</div>
		<div class="form-group">
			<label>Lae fail</label>
			<input type="file" name="files" class="form-control">
		</div>
		<div class="ResultArea"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Loobu</button>
        <button type="submit" class="btn btn-primary">Salvesta</button>
      </div>
	  </form>
    </div>
  </div>
</div>
<div class="modal fade" id="AddEqServiceModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
	  <form method="post" action="javascript:void(0)" id="AddEqService">
	  <input type="hidden" name="AddEqService" value="1">
	  <input type="hidden" name="eq_id" value="<?php echo $_GET["id"];?>">
      <div class="modal-body col-xs-12">
	  <h4> Lisa hooldus</h4>
	  <hr/>
		<div class="col-xs-6">
			<div class="form-group">
				<label>Hoolduse aeg</label>
				<span class="datepicker" data-dateformat="yy-mm-dd"></span>
			</div>
		</div>
		<div class="col-xs-6">
			<div class="form-group">
				<label>Hoolduse nimi</label>
				<input type="text" name="sname" class="form-control"> 
			</div>
			<div class="form-group">
				<label>Hoolduse tegija</label>
				<input type="text" name="suser" class="form-control"> 
			</div>
			<div class="form-group">
				<label>Kirjeldus</label>
				<textarea name="sdesc" rows="5" class="form-control"></textarea>
			</div>
		</div>
		<div class="col-xs-12">
								<div class="form-group">
													<label>Vali hoolduseks varuosad</label>
													<select multiple style="width:100%" class="select2">
														<optgroup label="Alaskan/Hawaiian Time Zone">
															<option value="AK">Alaska</option>
															<option value="HI">Hawaii</option>
														</optgroup>
														<optgroup label="Pacific Time Zone">
															<option value="CA">California</option>
															<option value="NV" selected="selected">Nevada</option>
															<option value="OR">Oregon</option>
															<option value="WA">Washington</option>
														</optgroup>
														<optgroup label="Mountain Time Zone">
															<option value="AZ">Arizona</option>
															<option value="CO">Colorado</option>
															<option value="ID">Idaho</option>
															<option value="MT" selected="selected">Montana</option><option value="NE">Nebraska</option>
															<option value="NM">New Mexico</option>
															<option value="ND">North Dakota</option>
															<option value="UT">Utah</option>
															<option value="WY">Wyoming</option>
														</optgroup>
														<optgroup label="Central Time Zone">
															<option value="AL">Alabama</option>
															<option value="AR">Arkansas</option>
															<option value="IL">Illinois</option>
															<option value="IA">Iowa</option>
															<option value="KS">Kansas</option>
															<option value="KY">Kentucky</option>
															<option value="LA">Louisiana</option>
															<option value="MN">Minnesota</option>
															<option value="MS">Mississippi</option>
															<option value="MO">Missouri</option>
															<option value="OK">Oklahoma</option>
															<option value="SD">South Dakota</option>
															<option value="TX">Texas</option>
															<option value="TN">Tennessee</option>
															<option value="WI">Wisconsin</option>
														</optgroup>
														<optgroup label="Eastern Time Zone">
															<option value="CT">Connecticut</option>
															<option value="DE">Delaware</option>
															<option value="FL">Florida</option>
															<option value="GA">Georgia</option>
															<option value="IN">Indiana</option>
															<option value="ME">Maine</option>
															<option value="MD">Maryland</option>
															<option value="MA">Massachusetts</option>
															<option value="MI" selected="selected">Michigan</option>
															<option value="NH">New Hampshire</option>
															<option value="NJ">New Jersey</option>
															<option value="NY">New York</option>
															<option value="NC">North Carolina</option>
															<option value="OH">Ohio</option>
															<option value="PA">Pennsylvania</option>
															<option value="RI">Rhode Island</option>
															<option value="SC">South Carolina</option>
															<option value="VT">Vermont</option>
															<option value="VA">Virginia</option>
															<option value="WV">West Virginia</option>
														</optgroup>
													</select>
												</div>

		</div>
		<div class="ResultArea"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Loobu</button>
        <button type="submit" class="btn btn-primary">Salvesta</button>
      </div>
	  </form>
    </div>
  </div>
</div>

<div class="modal fade" id="ViewEqFileModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body text-center">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Sulge aken</button>
		<hr/>
			<div class="ViewArea margin-top-10">
			
			</div>
		<div class="ResultArea"></div>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="EditEqFileModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
	  <form method="post" action="javascript:void(0)" id="EditEqFile">
	  <input type="hidden" name="EditEqFile" value="1">
	  <input type="hidden" name="fid" value="">
	  <input type="hidden" name="eqid" value="<?php echo $_GET["id"];?>">
      <div class="modal-body">
		<div class="form-group">
			<label>Muuda faili nime</label>
			<input type="text" name="name" class="form-control">
		</div>
		<div class="text-right">
			<button type="button" class="btn btn-default" data-dismiss="modal">Loobu</button>
			<button type="submit" class="btn btn-primary">Salvesta</button>
		</div>
		<div class="ResultArea"></div>
      </div>
	  </form>
    </div>
  </div>
</div>

<div class="modal fade" id="AddTechModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Muuda seadme tehnilisi andmeid</h4>
      </div>
	  <form method="post" action="javascript:void(0)" id="AddTech">
	  <input type="hidden" name="AddTech" value="1">
	  <input type="hidden" name="eqid" value="<?php echo $_GET["id"];?>">
      <div class="modal-body">
		<h4 class="margin-top-10"><strong>Tehniline informatsioon:</strong></h4>
		<table class="table table-bordered table-striped">
			<thead>
				<tr>
					<th width="50%">Label</th>
					<th>Value</th>
				</tr>
			</thead>
			<tbody id="TechRows">
				<?php $techs = $db->fetch_all("SELECT * FROM eq_tech WHERE eq_id = '".$eq["id"]."'"); ?>
				<?php foreach ($techs as $te): ?>
				<tr>
					<td><input type="text" name="label[]" class="form-control" value="<?php echo $te["label"];?>"></td>
					<td><input type="text" name="value[]" class="form-control" value="<?php echo $te["name"];?>"></td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
		<div class="form-group">
			<button class="btn btn-success" type="button" onClick="AddTechRow();">Add row</button>
		</div>
		<h4 class="margin-top-10"><strong>Lisa informatsioon:</strong></h4>
		<div class="form-group">
			<textarea name="techMore" class="form-control" rows="10"></textarea>
		</div>		
		<div class="ResultArea"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Loobu</button>
        <button type="submit" class="btn btn-primary">Salvesta</button>
      </div>
	  </form>
    </div>
  </div>
</div>

<div class="modal fade" id="ChangeEqDataModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Muuda seadme üldandmeid</h4>
      </div>
	  <form method="post" action="javascript:void(0)" id="ChangeEqData">
	  <input type="hidden" name="ChangeEqData" value="1">
	  <input type="hidden" name="new" value="0">
	  <input type="hidden" name="eqid" value="<?php echo $_GET["id"];?>">
      <div class="modal-body">
        <div class="form-group">
			<label>Seadme nimi</label>
			<input type="text" name="name" placeholder="Seadme nimi" class="form-control" value="<?php echo $eq["name"];?>">
		</div>
		<div class="form-group">
			<label>Seadme ID:</label>
			<input type="text" name="def" class="form-control" placeholder="Seadme ID" value="<?php echo $eq["def"];?>">
		</div>
		<div class="form-group">
			<label>Seadme firma</label>
			<input type="text" name="company" class="form-control" placeholder="Seadme firma" value="<?php echo $eq["company"];?>">
		</div>
		<div class="form-group">
			<label>Seadme seerianumber</label>
			<input type="text" name="serial" class="form-control" placeholder="Seadme seerianumber" value="<?php echo $eq["serial"];?>">
		</div>
        <div class="form-group">
			<label>Seadme kirjeldus</label>
			<textarea class="form-control" name="about"><?php echo br2nl($eq["about"]);?></textarea>
		</div>
		<div class="form-group">
			<label>Seadme kategooria</label>
			<select class="form-control" name="category">
				<?php $cats = $db->fetch_all("SELECT * FROM eq_category"); ?>
				<?php foreach ($cats as $cat): ?>
					<option <?php if ($cat["id"] == $eq["category_id"]) { echo "selected"; } ?> value="<?php echo $cat["id"];?>"><?php echo $cat["name"];?></option>
				<?php endforeach; ?>
			</select>
		</div>
		<div class="form-group">
			<label>Seadme asukoht</label>
			<input type="text" name="eqlocation" class="form-control" placeholder="Seadme location" value="<?php echo $eq["location"];?>">			
		</div>
		<div class="form-group">
			<label>Seadme kasutaja</label>
			<input type="text" name="whouse" class="form-control" placeholder="Seadme kasutaja" value="<?php echo $eq["who_use"];?>">			
		</div>
		<div class="form-group">
			<label>Seadme pilt</label>
			<input type="file" name="picture" class="form-control">
		</div>
		<div class="ResultArea"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Loobu</button>
        <button type="submit" class="btn btn-primary">Salvesta</button>
      </div>
	  </form>
    </div>
  </div>
</div>

<div class="modal fade" id="ChangeEqStatusModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Muuda seadme staatust</h4>
      </div>
	  <form method="post" action="javascript:void(0)" id="ChangeEqStatus">
	  <input type="hidden" name="ChangeEqStatus" value="1">
	  <input type="hidden" name="eqid" value="<?php echo $_GET["id"];?>">
      <div class="modal-body">
		<div class="form-group">
			<label class="block">Seadme staatus</label>
			<div class="btn-group" data-toggle="buttons">
				<?php $status = $db->fetch_all("SELECT * FROM eq_status"); ?>
				<?php $i=1; foreach ($status as $st): ?>
				<label class="btn btn-<?php echo $st["label"];?> <?php if ($st["id"] == $eq["status_id"]) { echo "active"; } ?> ">
					<input type="radio" value="<?php echo $st["id"];?>" name="eqstatus" id="option<?php echo $i;?>" autocomplete="off" <?php if ($st["id"] == $eq["status_id"]) { echo "checked"; } ?>> <?php echo $st["name"];?>
				</label>
				<?php $i++; endforeach; ?>
			</div>
			<div class="form-group">
				<label>Kommentaar</label>
				<textarea class="form-control" name="comment"><?php echo $eq["tech_info"];?></textarea>
			</div>
		</div>
		<div class="ResultArea"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Loobu</button>
        <button type="submit" class="btn btn-primary">Salvesta</button>
      </div>
	  </form>
    </div>
  </div>
</div>

