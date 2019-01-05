<?php   
	define("_VALID_PHP", true);
	require_once("../../init.php");
?>
	<form method="post" action="javascript:void(0);" id="AddEqServiceForm">
		<input type="hidden" name="AddEqService" value="1">
			<div class="row">
			<div class="form-group col-xs-12 col-md-12">
				<h4><strong>Add service</strong></h4>
				<hr/>
			</div>
			<div class="col-xs-12 col-sm-6">
				<div class="form-group">
					<label>Choose date</label>
						<div id="ServiceDateChoose" class="datepicker" data-dateformat="yy-mm-dd"></div>				
				</div>
			</div>
			<div class="col-xs-12 col-sm-6">
				<div class="form-group">
					<label>Service name</label>
					<input type="text" name="name" class="form-control">
				</div>
				<div class="form-group">
					<label>Service date</label>
					<input disabled type="text" name="date" class="form-control">
				</div>
				<div class="form-group">
					<label>Service maker</label>
					<input type="text" name="user" class="form-control">
				</div>
				<div class="form-group">
					<label>Service description</label>
					<textarea class="form-control" name="description"></textarea>
				</div>
			</div>
			<div class="col-xs-12 col-sm-12">
				<div class="form-group">
					<label>Parts</label>
						<select multiple style="width:100%" class="select2">
							<option value="AK">Alaska</option>
							<option value="HI">Hawaii</option>
						</select>
				</div>
			</div>
			<div class="col-xs-12 col-md-12 text-right">
				<hr/>
				<button type="button" class="btn btn-default" data-dismiss="modal">Discard</button>
				<button type="submit" onclick="AddEqPartsFunc()" class="btn btn-primary">Save</button>
			</div>
			</div>
		</form>
	<script src="assets/js/plugin/calendar/zabuto_calendar.js"></script>

<script>
var eq_id = getUrlParameters("eq_id", "", true);



$("#ServiceDateChoose").zabuto_calendar({
	today: true,
	cell_border: true,
	action: function () {
                return AddDateInput(this.id, false);
    }
  });

function AddDateInput(id, fromModal) {
		var date = $("#" + id).data("date");	
		$("#AddEqServiceForm input[name=date]").attr("value",date);
		var x = document.getElementsByClassName("this");
		$(x).removeClass("this");
		$("#"+id).addClass("this");
} 		
		var $this = $('select.select2'),
			width = $this.attr('data-select-width') || '100%';
				//, _showSearchInput = $this.attr('data-select-search') === 'true';
				$this.select2({
					//showSearchInput : _showSearchInput,
					allowClear : true,
					width : width,
					ajax: {
							url: 'ajax/eq.php?eq_id='+eq_id+'&EqPartsData=1',
							dataType: 'json'
					}
					});

				//clear memory reference
				$this = null;

</script>