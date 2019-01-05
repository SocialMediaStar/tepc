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
						<h1 class="semi-bold">What are "Equipments?"</h1>
						<p>Siin lehel näed nimekirja oma masinapargist.</p>
					</div>				
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
						<div class="well">
							<button type="button" data-toggle="modal" data-target="#OpenModal" data-id="NewEq" class="btn btn-block btn-success">New equipment</button>
							<button type="button" data-toggle="modal" data-target="#OpenModal" data-id="NewCategory" class="btn btn-block btn-primary">Categories</button>
							<button type="button" data-toggle="modal" data-target="#OpenModal" data-id="NewStatuses" class="btn btn-block btn-primary">Statuses</button>
						</div>
					</div>
					<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
						<table class="table table-striped table-bordered" id="EqListTable" width="100%">
							<thead>
								<tr>
									<th>ID</th>
									<th>Name</th>
									<th>Company</th>
									<th>Category</th>
									<th>Status</th>
									<th>Action</th>
								</tr>
							</thead>
						</table>
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
</body>
</html>