<!DOCTYPE html>
<html lang="en-us">
<?php require "head.php"; ?>
	<body class="">

<?php require "header.php"; ?>

<?php require "left.php"; ?>

		<!-- MAIN PANEL -->
		<div id="main" role="main">

			<!-- RIBBON -->
			<div id="ribbon">

				<span class="ribbon-button-alignment"> 
					<span id="refresh" class="btn btn-ribbon" data-action="resetWidgets" data-title="refresh"  rel="tooltip" data-placement="bottom" data-original-title="<i class='text-warning fa fa-warning'></i> Warning! This will reset all your widget settings." data-html="true">
						<i class="fa fa-refresh"></i>
					</span> 
				</span>

				<!-- breadcrumb -->
				<ol class="breadcrumb">
					<li>Home</li><li>Miscellaneous</li><li>Blank Page</li>
				</ol>
				<!-- end breadcrumb -->

				<!-- You can also add more buttons to the
				ribbon for further usability

				Example below:

				<span class="ribbon-button-alignment pull-right">
				<span id="search" class="btn btn-ribbon hidden-xs" data-title="search"><i class="fa-grid"></i> Change Grid</span>
				<span id="add" class="btn btn-ribbon hidden-xs" data-title="add"><i class="fa-plus"></i> Add</span>
				<span id="search" class="btn btn-ribbon" data-title="search"><i class="fa-search"></i> <span class="hidden-mobile">Search</span></span>
				</span> -->

			</div>
			<!-- END RIBBON -->
			
			

			<!-- MAIN CONTENT -->
			<div id="content">
				<div class="well">
					<button class="close" data-dismiss="alert">
						×
					</button>
					<h1 class="semi-bold">Mis asi see "Equipments" on?</h1>
					<p> 
						Siin lehel saab lisada uusi seadmeid ja vaadata seadmete andmeid...
					</p>
					<p>
						<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#AddEQModal">Lisa seade</button>
						<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#AddNewStatusModal">Lisa uus staatus</button>
						<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#AddNewCategoryModal">Lisa uus kategooria</button>
						</p>
				</div>
				<table class="table well">
					<thead>
						<tr>
							<th width="30%">Nimi</th>
							<th width="30%">Kirjeldus</th>
							<th width="30%">Tegevused</th>
						</tr>
					</thead>
					<tbody id="result">
					</tbody>
				</table>

			</div>
			<!-- END MAIN CONTENT -->

		</div>
		<!-- END MAIN PANEL -->

		<!-- PAGE FOOTER -->
		<div class="page-footer">
			<div class="row">
				<div class="col-xs-12 col-sm-6">
					<span class="txt-color-white">SmartAdmin 1.9.0 <span class="hidden-xs"> - Web Application Framework</span> © 2017-2019</span>
				</div>

				<div class="col-xs-6 col-sm-6 text-right hidden-xs">
					<div class="txt-color-white inline-block">
						<i class="txt-color-blueLight hidden-mobile">Last account activity <i class="fa fa-clock-o"></i> <strong>52 mins ago &nbsp;</strong> </i>
						<div class="btn-group dropup">
							<button class="btn btn-xs dropdown-toggle bg-color-blue txt-color-white" data-toggle="dropdown">
								<i class="fa fa-link"></i> <span class="caret"></span>
							</button>
							<ul class="dropdown-menu pull-right text-left">
								<li>
									<div class="padding-5">
										<p class="txt-color-darken font-sm no-margin">Download Progress</p>
										<div class="progress progress-micro no-margin">
											<div class="progress-bar progress-bar-success" style="width: 50%;"></div>
										</div>
									</div>
								</li>
								<li class="divider"></li>
								<li>
									<div class="padding-5">
										<p class="txt-color-darken font-sm no-margin">Server Load</p>
										<div class="progress progress-micro no-margin">
											<div class="progress-bar progress-bar-success" style="width: 20%;"></div>
										</div>
									</div>
								</li>
								<li class="divider"></li>
								<li>
									<div class="padding-5">
										<p class="txt-color-darken font-sm no-margin">Memory Load <span class="text-danger">*critical*</span></p>
										<div class="progress progress-micro no-margin">
											<div class="progress-bar progress-bar-danger" style="width: 70%;"></div>
										</div>
									</div>
								</li>
								<li class="divider"></li>
								<li>
									<div class="padding-5">
										<button class="btn btn-block btn-default">refresh</button>
									</div>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- END PAGE FOOTER -->

		<!-- SHORTCUT AREA : With large tiles (activated via clicking user name tag)
		Note: These tiles are completely responsive,
		you can add as many as you like
		-->
		<div id="shortcut">
			<ul>
				<li>
					<a href="inbox.html" class="jarvismetro-tile big-cubes bg-color-blue"> <span class="iconbox"> <i class="fa fa-envelope fa-4x"></i> <span>Mail <span class="label pull-right bg-color-darken">14</span></span> </span> </a>
				</li>
				<li>
					<a href="calendar.html" class="jarvismetro-tile big-cubes bg-color-orangeDark"> <span class="iconbox"> <i class="fa fa-calendar fa-4x"></i> <span>Calendar</span> </span> </a>
				</li>
				<li>
					<a href="gmap-xml.html" class="jarvismetro-tile big-cubes bg-color-purple"> <span class="iconbox"> <i class="fa fa-map-marker fa-4x"></i> <span>Maps</span> </span> </a>
				</li>
				<li>
					<a href="invoice.html" class="jarvismetro-tile big-cubes bg-color-blueDark"> <span class="iconbox"> <i class="fa fa-book fa-4x"></i> <span>Invoice <span class="label pull-right bg-color-darken">99</span></span> </span> </a>
				</li>
				<li>
					<a href="gallery.html" class="jarvismetro-tile big-cubes bg-color-greenLight"> <span class="iconbox"> <i class="fa fa-picture-o fa-4x"></i> <span>Gallery </span> </span> </a>
				</li>
				<li>
					<a href="profile.html" class="jarvismetro-tile big-cubes selected bg-color-pinkDark"> <span class="iconbox"> <i class="fa fa-user fa-4x"></i> <span>My Profile </span> </span> </a>
				</li>
			</ul>
		</div>
		<!-- END SHORTCUT AREA -->

		<!--================================================== -->
		<div class="modal fade" id="AddNewStatusModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Lisa uus staatus</h4>
      </div>
	  <form method="post" action="javascript:void(0)" id="AddNewStatus">
	  <input type="hidden" name="AddNewStatus" value="1">
      <div class="modal-body">
		<div class="form-group">
			<label>Staatuse nimi</label>
			<input type="text" name="eqstatus" class="form-control" placeholder="Staatuse nimi">
		</div>
		<div class="form-group">
			<label>Staatuse värv</label>
			<select name="label" class="form-control">
				<option disabled selected>--- Vali staatuse värv ---</option>
				<option value="primary">Sinine</option>
				<option value="info">Helesinine</option>
				<option value="success">Roheline</option>
				<option value="warning">Kollane</option>
				<option value="danger">Punane</option>
			</select>
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
		<div class="modal fade" id="AddNewCategoryModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Lisa uus categoory</h4>
      </div>
	  <form method="post" action="javascript:void(0)" id="AddNewCategory">
	  <input type="hidden" name="AddNewCategory" value="1">
      <div class="modal-body">
		<div class="form-group">
			<label>Kategooria nimi</label>
			<input type="text" name="category" class="form-control" placeholder="Kategooria nimi">
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
<div class="modal fade" id="AddEQModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Lisa uus seade</h4>
      </div>
	  <form method="post" action="javascript:void(0)" id="ChangeEqData">
	  <input type="hidden" name="ChangeEqData" value="1">
	  <input type="hidden" name="new" value="1">
      <div class="modal-body">
        <div class="form-group">
			<label>Seadme nimi</label>
			<input type="text" name="name" placeholder="Seadme nimi" class="form-control" value="">
		</div>
		<div class="form-group">
			<label>Seadme ID:</label>
			<input type="text" name="def" class="form-control" placeholder="Seadme ID" value="">
		</div>
		<div class="form-group">
			<label>Seadme firma</label>
			<input type="text" name="company" class="form-control" placeholder="Seadme firma" value="">
		</div>
		<div class="form-group">
			<label>Seadme seerianumber</label>
			<input type="text" name="serial" class="form-control" placeholder="Seadme seerianumber" value="">
		</div>
        <div class="form-group">
			<label>Seadme kirjeldus</label>
			<textarea class="form-control" name="about"></textarea>
		</div>
		<div class="form-group">
			<label>Seadme kategooria</label>
			<select class="form-control" name="category">
				<?php $cats = $db->fetch_all("SELECT * FROM eq_category"); ?>
				<?php foreach ($cats as $cat): ?>
					<option value="<?php echo $cat["id"];?>"><?php echo $cat["name"];?></option>
				<?php endforeach; ?>
			</select>
		</div>
		<div class="form-group">
			<label>Seadme asukoht</label>
			<input type="text" name="eqlocation" class="form-control" placeholder="Seadme location" value="">			
		</div>
		<div class="form-group">
			<label>Seadme kasutaja</label>
			<input type="text" name="whouse" class="form-control" placeholder="Seadme kasutaja" value="">			
		</div>
		<div class="form-group">
			<label class="block">Seadme staatus</label>
			<div class="btn-group" data-toggle="buttons">
				<?php $status = $db->fetch_all("SELECT * FROM eq_status"); ?>
				<?php $i=1; foreach ($status as $st): ?>
				<label class="btn btn-<?php echo $st["label"];?>">
					<input type="radio" value="<?php echo $st["id"];?>" name="eqstatus" id="option<?php echo $i;?>" autocomplete="off"> <?php echo $st["name"];?>
				</label>
				<?php $i++; endforeach; ?>
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
<?php require "scripts.php"; ?>		
		<script>

			$(document).ready(function() {
				 pageSetUp();
				 EqList();
			})
		
		</script>
	</body>
</html>