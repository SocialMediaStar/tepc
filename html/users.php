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
					<h1 class="semi-bold">Mis asi see "Users" on?</h1>
					<p> 
						Siin lehel saab lisada uusi kasutajaid ja näeb mis seadmeid on keegi kasutanud.
					</p>
					<p>
						<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#AddUserModal">Lisa kasutaja</button>
					</p>
				</div>
				<table class="table well">
					<thead>
						<tr>
							<th width="30%">Nimi</th>
							<th width="30%">Kasutajanimi</th>
							<th width="10%">Level</th>
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

		<div class="modal fade" id="AddUserModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Lisa kasutaja</h4>
			  </div>
			  <div class="modal-body">
			  <form method="POST" action="javascript:void(0)" id="AddUser">
			  <input type="hidden" name="AddUser" value="1">
				<div class="row">
				<div class="form-group col-xs-12 col-md-6">
					<label>Eesnimi</label>
					<input type="text" class="form-control" name="fname" placeholder="Eesnimi">
				</div>
				<div class="form-group col-xs-12 col-md-6">
					<label>Perenimi</label>
					<input type="text" class="form-control" name="lname" placeholder="Perenimi">
				</div>
				<div class="form-group col-xs-12 col-md-6">
					<label>Kasutajanimi</label>
					<input type="text" class="form-control" name="username" placeholder="Kasutajanimi">
				</div>
				<div class="form-group col-xs-12 col-md-6">
					<label>Parool</label>
					<input type="password" class="form-control" name="password" placeholder="Salasõna">
				</div>
				<div class="form-group col-xs-12 col-md-12">
					<label>Kasutaja level</label>
					<select name="level" class="form-control">
						<option disabled selected> --- Vali level --- </option>
						<option value="1">Admin</option>
						<option value="2">Tava kasutaja</option>
					</select>
				</div>
				<div class="form-group col-xs-12 col-md-12 text-right">
					<button type="button" class="btn btn-default" data-dismiss="modal">Loobu</button>
					<button type="submit" class="btn btn-primary">Salvesta</button>
				</div>
				<div id="errorArea">
				</div>
				</div>
			  </form>
			  </div>
			</div>
		  </div>
		</div>
		<div class="modal fade" id="ErrorModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			  <div class="modal-body text-center">
				<h1 class="text-danger"></h1>
			  </div>
			  <div class="model-footer text-center" style="padding:10px;">
					<button type="button" class="btn btn-primary" data-dismiss="modal">Sulge</button>			  
			  </div>
			</div>
		  </div>
		</div>
		<div class="modal fade" id="ChangePWDModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
				<form method="post" action="javascript:void(0)" id="ChangePWD">
					<input type="hidden" name="ChangePWD" value="1">
					<input type="hidden" id="cuid" name="uid" value="">
					
					<div class="modal-body text-center">
						<h1>Vaheta <span id="WhosPassword"></span> salasõna</h1>
						<hr/>
						<div class="form-group col-xs-12 col-md-6">
							<label>Salasõna</label>
							<input type="password" id="checkPWD" name="password" placeholder="Salasõna" class="form-control">
						</div>
						<div class="form-group col-xs-12 col-md-6">
							<label>Korda salasõna</label>
							<input type="password" name="againPassword" placeholder="Korda salasõna" class="form-control">
						</div>
						<div id="ResultArea"></div>
					</div>
					
					<div class="model-footer text-center" style="padding:10px;">
						<button type="button" class="btn btn-default" data-dismiss="modal">Sulge</button>			  
						<button type="submit" class="btn btn-primary">Salvesta</button>			  
					</div>
				</form>
			</div>
		  </div>
		</div>
		<div class="modal fade" id="ChangeDataModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
				<form method="post" action="javascript:void(0)" id="ChangeData">
					<input type="hidden" name="ChangeData" value="1">
					<input type="hidden" id="cduid" name="uid" value="">
					
					<div class="modal-body">
						<h1>Muuda kasutaja andmeid</h1>
						<hr/>
						<div class="form-group col-xs-12 col-md-6">
							<label>Eesnimi</label>
							<input type="text" name="fname" placeholder="Eesnimi" class="form-control">
						</div>
						<div class="form-group col-xs-12 col-md-6">
							<label>Perenimi</label>
							<input type="text" name="lname" placeholder="Perenimi" class="form-control">
						</div>
						<div class="form-group col-xs-12 col-md-6">
							<label>Kasutajanimi</label>
							<input type="text" name="username" placeholder="Kasutajanimi" class="form-control">
						</div>
						<div class="form-group col-xs-12 col-md-6">
							<label>Level</label>
							<select class="form-control" name="level">
								<option value="1">Admin</option>
								<option value="2">Tavakasutaja</option>
							</select>
						</div>
						<div id="ResultArea"></div>
					</div>
					
					<div class="model-footer text-center" style="padding:10px;">
						<button type="button" class="btn btn-default" data-dismiss="modal">Sulge</button>			  
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
				 
				 UserList();	
			})
		
		</script>
	</body>
</html>