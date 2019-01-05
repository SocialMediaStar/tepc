	

$('#OpenModal').on('show.bs.modal', function(e) {
	var eq_id = getUrlParameters("eq_id", "", true);
	if (!eq_id) { eq_id = "0"; }
	var id = $(e.relatedTarget).data('id');
	var filename = "backend/modals/"+id+".php"
	$.get(filename)
		.done(function() { 
			$("#OpenModal .modal-body").load("backend/modals/"+id+".php?eq_id="+eq_id, function() {
				$(this).show();
				if (id === "ViewEqFile") {
					var res = $(e.relatedTarget).data('res');
					ViewEqFile(res);
				}
				if (id === "EditEqParts") {
					var res = $(e.relatedTarget).data('res');
					EqPartsData(res);
				} 
				if (id === "ChangeEqServiceStatus") {
					var res = $(e.relatedTarget).data('res');
					$("#ChangeEqServiceStatusForm #ServiceID").attr("value",res);
				} 
				if (id === "EditUser") {
					var res = $(e.relatedTarget).data('res');
					$("#EditUserForm input[name=uid]").attr("value",res);
					UserData(res);
				}
			});
			}).fail(function() { 
			$("#OpenModal .modal-body").load("backend/modals/error.php?eq_id="+eq_id);
		})		
	});

