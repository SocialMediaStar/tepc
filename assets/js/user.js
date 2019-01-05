/*      ______________________________________
________|                                     |_______
\       |   		 Viga.ee                  |      /
\       |         Copyright © 2015            |     /
/       |_____________________________________|     \
/__________)                               (_________\
*/


site_url = '';
/*
* Validator Setup
*/
$.validator.setDefaults({
        lang: 'en',
        highlight: function(element) {
                $(element).closest('.form-group').addClass('has-error');
        },
        unhighlight: function(element) {
                $(element).closest('.form-group').removeClass('has-error');
        },
        errorElement: 'div',
        errorClass: 'help-block',
        errorPlacement: function(error, element) {
                if(element.parent('.input-group').length) {
                        error.insertAfter(element.parent());
                } else {
                        error.insertAfter(element);
                }
        }
});

function DeleteUser(id) {
		$.ajax({
            type:'POST',
            url: "ajax/user.php",
			dataType: "json",
            data: {"DeleteUser":"1", "uid" : id},
			success:function(data){
				if (data.success === "1") {
					location.reload();
				}
			},
            error: function (xhr, ajaxOptions, thrownError) {
                console.log(xhr);
            }
        });				
}

function EditUser(id) {
		$.ajax({
            type:'POST',
            url: "ajax/user.php",
			dataType: "json",
            data: {"DeleteUser":"1", "uid" : id},
			success:function(data){
				if (data.success === "1") {
					location.reload();
				}
			},
            error: function (xhr, ajaxOptions, thrownError) {
                console.log(xhr);
            }
        });				
}






/*
* LoginForm
*/
$('#LoginForm').validate({
	ignore: "",
	rules: {
		username: {
			required:true,
		},
		password: {
			required:true,
		}		
	},
	messages: {
		username: {
			required: "Kasutajanimi puudu",
		},
		password: {
			required: "Parool puudu",			
		}
	},
	submitHandler: function(form) {
		
		var formData = $( "#LoginForm" ).serialize();
		
        $.ajax({
            type:'POST',
            url: site_url+"ajax/user.php",
			dataType: "json",
            data: formData,
			beforeSend: function() {
				$("button").button('<i class="fas fa-spinner fa-spin"></i> Palun oota...');
			},
            success:function(data){
			//	$("button").button('reset');
				if (data.success === "1") {
					location.reload();
				} else {
					   $("#errorArea").html(data.msg);
				}
            },
            error: function (xhr, ajaxOptions, thrownError) {
                console.log(ajaxOptions);
            }
        });

	}
});


/*
* NewUserForm
*/
function NewUserFunc() {
$('#NewUserForm').validate({
	ignore: "",
	rules: {
		fname: {
			required:true,
		},
		lname: {
			required:true,
		},	
		username: {
			required:true,
		},	
		password: {
			required:true,
		}
	},
	messages: {
		fname: {
			required: "Eesnimi puudu",
		},
		lname: {
			required: "Perenimi puudu",
		},
		username: {
			required: "Kasutajanimi puudu",
		},
		password: {
			required: "Parool puudu",			
		}
	},
	submitHandler: function(form) {
		var formData = $( "#NewUserForm" ).serialize();
		
        $.ajax({
            type:'POST',
            url: site_url+"ajax/user.php",
			dataType: "json",
            data: formData,
            success:function(data){
				if (data.success === "1") {
					location.reload();
				} else {
					$("#OpenModal").modal("hide");
					$(".errorArea").html('<div class="alert alert-danger fade in"><button class="close" data-dismiss="alert">×</button><i class="fa-fw fa fa-times"></i><strong>Error!</strong> '+data.msg+'</div>');
				}
            },
            error: function (xhr, ajaxOptions, thrownError) {
                console.log(xhr);
            }
        });

	}
});
}
/*
* EditUserFunc
*/
function EditUserFunc() {
$('#EditUserForm').validate({
	ignore: "",
	rules: {
		fname: {
			required:true,
		},
		lname: {
			required:true,
		},	
		username: {
			required:true,
		}
	},
	messages: {
		fname: {
			required: "Eesnimi puudu",
		},
		lname: {
			required: "Perenimi puudu",
		},
		username: {
			required: "Kasutajanimi puudu",
		}
	},
	submitHandler: function(form) {
		var formData = $( "#EditUserForm" ).serialize();
		
        $.ajax({
            type:'POST',
            url: site_url+"ajax/user.php",
			dataType: "json",
            data: formData,
            success:function(data){
				if (data.success === "1") {
					location.reload();
				} else {
					$("#OpenModal").modal("hide");
					$(".errorArea").html('<div class="alert alert-danger fade in"><button class="close" data-dismiss="alert">×</button><i class="fa-fw fa fa-times"></i><strong>Error!</strong> '+data.msg+'</div>');
				}
            },
            error: function (xhr, ajaxOptions, thrownError) {
                console.log(xhr);
            }
        });

	}
});
}
function UserData(id) {
	$.getJSON( "ajax/user.php", {'GetUserData':"1","uid":id}, function( data ) {
		$("#EditUserForm input[name=fname] ").attr("value",data.fname);
		$("#EditUserForm input[name=lname]").attr("value",data.lname);
		$("#EditUserForm input[name=username]").attr("value",data.username);
	});		
}

function ChangeData(id) {
	$.getJSON( "ajax/user.php", {'GetUserData':"1","uid":id}, function( data ) {
		$("#ChangeData input[name=fname] ").attr("value",data.fname);
		$("#ChangeData input[name=lname]").attr("value",data.lname);
		$("#ChangeData input[name=username]").attr("value",data.username);
		$("#ChangeData select[name=level] option[value="+data.level+"]").attr("selected","selected");
	});
		
	$("#cduid").attr("value",id);
	$("#ChangeDataModal").modal("show");
}


function DeleteUser(id) {
		
        $.ajax({
            type:'POST',
            url: site_url+"ajax/user.php",
			dataType: "json",
            data: {"DeleteUser":"1", "uid" : id},
            success:function(data){
				if (data.success === "1") {
					location.reload();
				} else {
					$(".errorArea").html('<div class="alert alert-danger fade in"><button class="close" data-dismiss="alert">×</button><i class="fa-fw fa fa-times"></i><strong>Error!</strong> '+data.msg+'</div>');
				}
            },
            error: function (xhr, ajaxOptions, thrownError) {
                console.log(xhr);
            }
        });
	
	
	
}

/*
* ChangeData
*/
$('#ChangeData').validate({
	ignore: "",
	rules: {
		fname: {
			required:true,
		},
		lname: {
			required:true,
		},	
		username: {
			required:true,
		},
		level: {
			required:true,
		},
	},
	messages: {
		fname: {
			required: "Eesnimi puudu",
		},
		lname: {
			required: "Perenimi puudu",
		},
		username: {
			required: "Kasutajanimi puudu",
		},
		level: {
			required: "Level puudu",			
		}
	},
	submitHandler: function(form) {
		var formData = $( "#ChangeData" ).serialize();
		
        $.ajax({
            type:'POST',
            url: site_url+"ajax/user.php",
			dataType: "json",
            data: formData,
			beforeSend: function() {
				$("#ChangeDataModal button").button('<i class="fas fa-spinner fa-spin"></i> Palun oota...');
			},
            success:function(data){
				$("#ChangeDataModal button").button('reset');
				if (data.success === "1") {
					$("#ChangeDataModal #ResultArea").html(data.msg);
					UserList();	
				} else {
					   $("#ChangeDataModal #ResultArea").html(data.msg);
				}
            },
            error: function (xhr, ajaxOptions, thrownError) {
                console.log(xhr);
            }
        });

	}
});

