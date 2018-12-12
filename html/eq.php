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
					<h1 class="semi-bold">Mis asi see "Eq" on?</h1>
					<p> 
						Siin lehel on masina kohta kõik info ja seda saab muuta.
					</p>
					<p>
						<a class="btn btn-primary" href="equipments.php">Tagasi masinate nimekirja</a>
					</p>
				</div>
							<!-- Widget ID (each widget will need unique ID)-->
							<div class="jarviswidget" id="wid-id-11" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-deletebutton="false" data-widget-fullscreenbutton="false" data-widget-custombutton="false">
								<header>
									
									<ul id="widget-tab-1" class="nav nav-tabs">

										<li class="active">
											<a data-toggle="tab" href="#hr1"> <i class="fa fa-lg fa-arrow-circle-o-down"></i> <span class=""> Kirjeldus </span> </a>
										</li>
										<li>
											<a data-toggle="tab" href="#hr2"> <i class="fa fa-lg fa-arrow-circle-o-up"></i> <span class=""> Tehnilised andmed </span></a>
										</li>
										<li>
											<a data-toggle="tab" href="#hr3"> <i class="fa fa-lg fa-arrow-circle-o-up"></i> <span class=""> Kasutusjuhend </span></a>
										</li>
										<li>
											<a data-toggle="tab" href="#hr4"> <i class="fa fa-lg fa-arrow-circle-o-up"></i> <span class=""> Viimati kasutanud </span></a>
										</li>

									</ul>	
									
								</header>

								<!-- widget div-->
								<div>
									
									<!-- widget edit box -->
									<div class="jarviswidget-editbox">
										<!-- This area used as dropdown edit box -->
									</div>
									<!-- end widget edit box -->
									<!-- widget content -->
									<div class="widget-body no-padding">

										<!-- widget body text-->
										
										<div class="tab-content">
											<div class="tab-pane fade in active padding-10" id="hr1">
												<div class="col-xs-12">
													<div class="col-xs-4 col-md-2"><img src="" class="EQ_picture img-thumbnail"></div>
														
													<div class="col-xs-8 col-md-7">
														<h1><span class="EQ_name"></span> (ID <span class="EQ_id"></span>)<small class="block"><span class="EQ_company">Makaroon Oü</span> - <span class="EQ_serial">593929182394</span></small></h1>
														<p class="EQ_about"></p>
													</div>
													<div class="col-xs-12 col-md-3">
														<ul class="unordered list-big well">
															<li>Staatus: <label class="EQ_status label">Laos</label></li>
															<li>Asukoht: <span class="EQ_location"></span></li>
															<li>Kategooria: <span class="EQ_category">Käsitööriistad</span></li>
															<li>Kasutaja: <span>Peeter Pakiraam</span></li>
															
														</ul>
													</div>
												</div>
												<div class="col-xs-12">
													<hr/>
													<div class="form-group text-right">
														<button type="button" data-toggle="modal" data-target="#ChangeEqDataModal" class="btn btn-primary">Muuda</button>
														<a href="eq_history.php?id=<?php echo $_GET["id"];?>" class="btn btn-primary">Vaata ajalugu</a>
														<button type="button" data-toggle="modal" data-target="#ChangeEqStatusModal" class="btn btn-success">Muuda staatust</button>
													</div>
												</div>
											</div>
											<div class="tab-pane fade" id="hr2"></div>
											<div class="tab-pane fade" id="hr3"></div>
											<div class="tab-pane fade" id="hr4">
												<table class="table table-striped">
													<thead>
														<tr>
															<th>Kasutaja</th>
															<th width="20%">Kuupäev</th>
															<th width="20%">Tegevused</th>
														</tr>
													</thead>
													<tbody>
													</tbody>
												</table>
											</div>
										</div>
										<!-- end widget body text-->
									</div>
									<!-- end widget content -->
								</div>
								<!-- end widget div -->
								
							</div>
							<!-- end widget -->
				
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
				<textarea class="form-control" name="comment"></textarea>
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

<?php require "scripts.php"; ?>		
		<script>

			$(document).ready(function() {
				 pageSetUp();
				 EQ_data(<?php echo $_GET["id"];?>);
			})
		
		</script>
	</body>
</html>