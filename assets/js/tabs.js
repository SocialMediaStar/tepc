
$('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
	var eq_id = getUrlParameters("eq_id", "", true);
	if (!eq_id) { eq_id = "0"; }
	var id = $(this).data('id');
	var filename = "backend/tabs/"+id+".php"

	$.get(filename)
		.done(function() { 
		$("#"+id).load("backend/tabs/"+id+".php?eq_id="+eq_id);		
			if(id === "tech") {
				GetEqTech();
			} else
			if(id === "files") {
				GetEqFiles();
			} else
			if(id === "parts") {
			}
			
		}).fail(function() { 
			$("#"+id).load("backend/tabs/error.php?eq_id="+eq_id);
		})		
	});

