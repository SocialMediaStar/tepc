<?php   
	define("_VALID_PHP", true);
	require_once("../../init.php");
?>
		<div class="col-xs-12">
			<div class="col-xs-12 col-sm-4">
				<div class="margin-top-10">
					<div id="datepicker" class="datepicker" data-dateformat="yy-mm-dd"></div>
				</div>
			</div>
			<div class="col-xs-12 col-sm-8 margin-top-10 ShowService"></div>
		</div>
	<script src="assets/js/plugin/calendar/zabuto_calendar.js"></script>

<script>

var eq_id = getUrlParameters("eq_id", "", true);
DatePickers();

function DatePickers() {
$("#datepicker").zabuto_calendar({
	today: true,
	cell_border: true,
	action: function () {
                return myDateFunction(this.id, false);
    },
    ajax: {
      url: "ajax/eq.php?eq_id="+eq_id+"&GetServiceDates=1",
      modal: true
    }
  });

}
</script>