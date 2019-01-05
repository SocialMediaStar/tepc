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
											<a data-toggle="tab" href="#hr3"> <i class="fa fa-lg fa-arrow-circle-o-up"></i> <span class=""> Failid </span></a>
										</li>
										<li>
											<a data-toggle="tab" href="#hr4"> <i class="fa fa-lg fa-arrow-circle-o-up"></i> <span class=""> Varuosad </span></a>
										</li>
										<li>
											<a data-toggle="tab" href="#hr5"> <i class="fa fa-lg fa-arrow-circle-o-up"></i> <span class=""> Hoolduspäevik </span></a>
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
													<div class="col-xs-4 col-md-2"><img src="<?php echo $eq->picture;?>" class="img-thumbnail"></div>
														
													<div class="col-xs-8 col-md-7">
														<h1><?php echo $eq->name;?> (ID <?php echo $eq->def;?>)<small class="block"><?php echo $eq->company;?> - <?php echo $eq->serial;?></small></h1>
														<p><?php echo $eq->about;?></p>
													</div>
													<div class="col-xs-12 col-md-3">
														<ul class="unordered list-big well">
															<li>Staatus: <label class="label label-<?php echo $eq->status_label;?>"><?php echo $eq->status_name;?></label></li>
															<li>Asukoht: <span><?php echo $eq->location;?></span></li>
															<li>Kategooria: <span><?php echo $eq->category_name;?></span></li>
															<li>Kasutaja: <span><?php echo $eq->who_use;?></span></li>
														</ul>
													</div>
												</div>
												<div class="col-xs-12">
													<hr/>
													<div class="form-group text-right">

														<button type="button" data-toggle="modal" data-id="ChangeEqData" data-target="#OpenModal" class="btn btn-primary">Muuda</button>
														<a href="eq_history.php?id=<?php echo $eq->eid;?>" class="btn btn-primary">Vaata ajalugu</a>
														<button type="button" data-toggle="modal" data-target="#ChangeEqStatusModal" class="btn btn-success">Muuda staatust</button>
													</div>
												</div>
											</div>
											<div class="tab-pane fade" id="hr2">
												<div class="col-xs-12">
													<div class="col-xs-12 col-sm-6">
														<h4 class="margin-top-10"><strong>Seadme tehnilised andmed:</strong></h4>
														<table class="table table-bordered table-striped margin-top-10">
															<tbody class="EQ_techLabels">
															</tbody>
														</table>
													</div>
													<div class="col-xs-12 col-sm-6">
														<h4 class="margin-top-10"><strong>Lisa informatsioon</strong></h4>
														<p class="techMore"></p>
													</div>
													<div class="col-xs-12">
														<hr/>
														<div class="form-group text-right">
															<button type="button" data-toggle="modal" data-target="#AddTechModal" class="btn btn-primary">Muuda / Lisa andmeid</button>
														</div>
													</div>
												</div>
											</div>
											<div class="tab-pane fade" id="hr3">
												<div class="padding-10">
												<h4><strong>Failid:</strong>
													<button type="button" data-toggle="modal" data-id="AddEqFile1" data-target="#AddEqFileModal" class="pull-right btn btn-primary">Lae fail ülesse</button>
												</h4>
												<hr/>
													<div class="col-xs-12 filesArea">
													</div>
													
												</div>
											</div>
											<div class="tab-pane fade" id="hr4">
										<table id="datatable_fixed_column" class="table table-striped table-bordered" width="100%">
					
									        <thead>
												<tr>
													<th class="hasinput" style="width:20%">
														<input type="text" class="form-control" placeholder="" />
													</th>
													<th class="hasinput" style="width:10%">
														<input type="text" class="form-control" placeholder="" />
													</th>
													<th class="hasinput text-center" style="width:50%">
														<input type="text" class="form-control" placeholder="" />
													</th>
												</tr>
									            <tr>
								                    <th>Kood</th>
								                    <th>Kirjeldus</th>
								                    <th>Müüa andmed</th>
								                    <th>Tegevused</th>
												</tr>
									        </thead>
				
									        <tbody>
									        </tbody>
									
										</table>
												
													<div class="col-xs-12">
														<hr/>
														<div class="form-group text-right">
															<button type="button" data-toggle="modal" data-target="#AddEqPartsModal" class="btn btn-primary">Lisa varuosa</button>
														</div>
													</div>
											</div>
											<div class="tab-pane fade" id="hr5">
												<form class="form-horizontal">
												<div class="col-xs-12">
													<div class="col-xs-4">
														<div class="margin-top-10">
															<span id="datepicker" class="datepicker" data-dateformat="yy-mm-dd"></span>
															<div class="form-group margin-top-10">
																<button class="btn btn-primary">Vaata ajalugu</button>
																<button  type="button" data-toggle="modal" data-target="#AddEqServiceModal" class="btn btn-primary">Lisa hooldus</button>
															</div>
														</div>
													</div>
													<div class="col-xs-8 margin-top-10">
														<div class="col-xs-12 well padding-10">
																<div class="col-xs-9">
																	<h4><strong>Täiesti normaalne hooldus <label class="label label-success">Teostatud</label></strong> </h4>
																</div>
																<div class="col-xs-3">
																	<div class="dropdown pull-right">
																	  <button class="btn btn-xs btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
																		<span class="caret"></span>
																	  </button>
																	  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
																		<li><a href="#">Action</a></li>
																		<li><a href="#">Another action</a></li>
																		<li><a href="#">Something else here</a></li>
																		<li role="separator" class="divider"></li>
																		<li><a href="#">Separated link</a></li>
																	  </ul>
																	</div>
																</div>
																<div class="col-xs-12">
																	<p class="margin-top-10">
																		<strong>Teostuse tegija:</strong> Peeter Pakiraam <br/>
																		<strong>Teostuse aeg:</strong> 18.12.2018 
																	</p>
																	<p class="margin-top-10">
																		<strong>Kasutatud varuosad:</strong> <br/>
																		<label class="label label-primary">129482</label>
																		<label class="label label-primary">129482</label>
																		<label class="label label-primary">129482</label>
																		<label class="label label-primary">129482</label>
																	</p>
																	<p>
																		<strong>Hoolduse kirjeldus:</strong> <br/>
																		Teostatud ja kõik oli korras ja hästi nagu ikka!
																		Teostatud ja kõik oli korras ja hästi nagu ikka!
																		Teostatud ja kõik oli korras ja hästi nagu ikka!
																		Teostatud ja kõik oli korras ja hästi nagu ikka!
																		Teostatud ja kõik oli korras ja hästi nagu ikka!
																	</p>																
																</div>
														</div>
													</div>
												</div>
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
<div class="modal fade" id="AddEqPartsModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Lisa seadme varuosa</h4>
      </div>
      <div class="modal-body col-xs-12">
	  <form method="post" action="javascript:void(0)" id="AddEqParts">
	  <input type="hidden" name="AddEqParts" value="1">
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
      <div class="modal-body">
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
      <div class="modal-body">
		<div class="form-group">
			<label class="block">Seadme staatus</label>
			<div class="btn-group" data-toggle="buttons">
			</div>
			<div class="form-group">
				<label>Kommentaar</label>
				<textarea class="form-control" name="comment"><?php echo $eq->tech_info;?></textarea>
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

<!--- Open Modal --->
<div class="modal fade" id="OpenModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
		<div class="modal-body">
		</div>
    </div>
  </div>
</div>

<?php require "modals.php";?>
<?php require "scripts.php"; ?>		
		<!-- PAGE RELATED PLUGIN(S) -->
		<script src="assets/js/plugin/datatables/jquery.dataTables.min.js"></script>
		<script src="assets/js/plugin/datatables/dataTables.colVis.min.js"></script>
		<script src="assets/js/plugin/datatables/dataTables.tableTools.min.js"></script>
		<script src="assets/js/plugin/datatables/dataTables.bootstrap.min.js"></script>
		<script src="assets/js/plugin/datatable-responsive/datatables.responsive.min.js"></script>

		<script>
			$(document).ready(function() {
				 })
		</script>
	</body>
</html>