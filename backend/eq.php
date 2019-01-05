<!DOCTYPE html>
<html lang="en-us">
<?php require "required/head.php"; ?>
<body class="">
<?php require "required/header.php"; ?>
<?php require "required/left.php"; ?>

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
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<div class="well">
						<h1 class="semi-bold">What are "Eq?"</h1>
						<p>Siin lehel näed infot masina kohta.</p>
					</div>				
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<div class="jarviswidget" id="wid-id-11" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-deletebutton="false" data-widget-fullscreenbutton="false" data-widget-custombutton="false">
						<header>									
							<ul id="widget-tab-1" class="nav nav-tabs">
								<li><a data-id="about" data-toggle="tab" href="#about"> <i class="fa fa-lg fa-info"></i> <span class="hidden-mobile">About</span></a></li>
								<li><a data-id="tech" data-toggle="tab" href="#tech"> <i class="fa fa-lg fa-align-left"></i> <span class="hidden-mobile">Tech</span></a></li>
								<li><a data-id="files" data-toggle="tab" href="#files"> <i class="fa fa-lg fa-file-o"></i> <span class="hidden-mobile">Files</span></a></li>
								<li><a data-id="parts" data-toggle="tab" href="#parts"> <i class="fa fa-lg fa-cubes"></i> <span class="hidden-mobile">Parts</span></a></li>
								<li><a data-id="service" data-toggle="tab" href="#service"> <i class="fa fa-lg fa-life-ring"></i> <span class="hidden-mobile">Service</span></a></li>
							</ul>	
						</header>
						<div>
							<div class="widget-body no-padding">
								<div class="tab-content padding-10">
									<div class="tab-pane fade" id="about"></div>
									<div class="tab-pane fade" id="tech"></div>
									<div class="tab-pane fade" id="files"></div>
									<div class="tab-pane fade" id="parts"></div>
									<div class="tab-pane fade" id="service"></div>
								</div>
							</div>
						</div>
					</div>
				</div>				
			</div>
			<!-- END MAIN CONTENT -->
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
		
<?php require "required/javascript.php";?>

	<script src="assets/js/plugin/datatables/jquery.dataTables.min.js"></script>
	<script src="assets/js/plugin/datatables/dataTables.colVis.min.js"></script>
	<script src="assets/js/plugin/datatables/dataTables.tableTools.min.js"></script>
	<script src="assets/js/plugin/datatables/dataTables.bootstrap.min.js"></script>
	<script src="assets/js/plugin/datatable-responsive/datatables.responsive.min.js"></script>

	<script src="assets/js/functions.js"></script>
	<script src="assets/js/user.js"></script>
	<script src="assets/js/eq.js"></script>
	<script src="assets/js/modals.js"></script>
	<script src="assets/js/tabs.js"></script>
<script>
		var tab = getUrlParameters("tab", "", true);
if (tab === "service") {
    $('a[href="#'+tab+'"').tab("show");
} else {
    $('a[href="#about"').tab("show");	
}


// $('#widget-tab-1 a:first').tab('show');

 </script>
 
 </body>
 </html>