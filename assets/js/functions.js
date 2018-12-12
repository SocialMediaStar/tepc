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
* AddUser
*/
$('#AddUser').validate({
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
		password: {
			required: "Parool puudu",			
		}
	},
	submitHandler: function(form) {
		var formData = $( "#AddUser" ).serialize();
		
        $.ajax({
            type:'POST',
            url: site_url+"ajax/user.php",
			dataType: "json",
            data: formData,
			beforeSend: function() {
				$("#AddUser button").button('<i class="fas fa-spinner fa-spin"></i> Palun oota...');
			},
            success:function(data){
				$("#AddUser button").button('reset');
				if (data.success === "1") {
					location.reload();
				} else {
					   $("#AddUser #errorArea").html(data.msg);
				}
            },
            error: function (xhr, ajaxOptions, thrownError) {
                console.log(xhr);
            }
        });

	}
});


function UserList() {
	$.getJSON( "ajax/user.php", {'UserList':"1"}, function( data ) {
		
		f = '';
		$.each(data.list,function(index,res){
			trStart = '<tr>';
			name = '<td>'+res.name+'</td>';
			uname = '<td>'+res.username+'</td>';
			level = '<td>'+res.level+'</td>';
			tdStart = '<td>';
			del = '<button onClick="DeleteUser('+res.id+')" class="btn btn-xs btn-danger">Kustuta</button>';
			change = '<button onClick="ChangePWD('+res.id+','+res.name+')" class="btn btn-xs btn-info">Vaheta parool</button>';
			cdata = '<button onClick="ChangeData('+res.id+')" class="btn btn-xs btn-primary">Muuda andmeid</button>';
			hist = '<button onClick="History('+res.id+')" class="btn btn-xs btn-success">Ajalugu</button>';
			tdEnd = '</td>';
			trEnd = '</tr>';
			f = f + trStart + name + uname + level + tdStart + del + change + cdata + hist + tdEnd + trEnd;
			
		});
		
		$("#result").html(f);
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

function ChangePWD(id,name) {
	$("#WhosPassword").html(name);
	$("#cuid").attr("value",id);
	$("#ChangePWDModal").modal("show");
}
function DeleteUser(id) {
		
        $.ajax({
            type:'POST',
            url: site_url+"ajax/user.php",
			dataType: "json",
            data: {"DeleteUser":"1", "uid" : id},
            success:function(data){
				if (data.success === "1") {
					UserList();	
				} else {
					$("#ErrorModal .modal-body h1").html(data.msg);
					$("#ErrorModal").modal("show");					
				}
            },
            error: function (xhr, ajaxOptions, thrownError) {
                console.log(xhr);
            }
        });
	
	
	
}

/*
* ChangePWD
*/
$('#ChangePWD').validate({
	ignore: "",
	rules: {
		password: {
			required:true,
		},
		againPassword: {
			required:true,
			equalTo: "#checkPWD"
		}
	},
	messages: {
		password: {
			required: "Salasõna puudu",
		},
		againPassword: {
			required: "Salasõna uuesti palun",
			equalTo: "Salasõnad ei kattu"
		}
	},
	submitHandler: function(form) {
		var formData = $( "#ChangePWD" ).serialize();
		
        $.ajax({
            type:'POST',
            url: site_url+"ajax/user.php",
			dataType: "json",
            data: formData,
			beforeSend: function() {
				$("#ChangePWD button").button('<i class="fas fa-spinner fa-spin"></i> Palun oota...');
			},
            success:function(data){
				$("#ChangePWD button").button('reset');
				if (data.success === "1") {
					$("#ChangePWD #ResultArea").html(data.msg);
				} 
				console.log(data);
            },
            error: function (xhr, ajaxOptions, thrownError) {
                console.log(xhr);
            }
        });

	}
});
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

/*
* ChangeEqData
*/
$('#ChangeEqData').validate({
	ignore: "",
	rules: {
		name: {
			required:true,
		},
		def: {
			required:true,
		},
		eqlocation: {
			required:true,
		},
		category: {
			required:true,
		},
		about: {
			required:true,
		}
	},
	messages: {
		name: {
			required: "Seadme nimi puudu",
		},
		about: {
			required: "Seadme kirjeldus puudu",
		}
	},
	submitHandler: function(form) {

		var formData = new FormData($('#ChangeEqData')[0]);
		
        $.ajax({
            type:'POST',
            url: site_url+"ajax/user.php",
			dataType: "json",
            data: formData,
			cache: false,
			contentType: false,
			processData: false,
            success:function(data){
				if (data.success === "1") {
						if (data.eqnew === "1") {
							$("#AddEQModal").modal("hide");
							EqList();
							
						} else {
						EQ_data(data.eid);
						$("#ChangeEqDataModal").modal("hide");
							
						}
				} else {
					   $("#ChangeEqData .ResultArea").html(data.msg);
				}
            },
            error: function (xhr, ajaxOptions, thrownError) {
                console.log(xhr);
            }
        });

	}
});
/*
* ChangeEqStatus
*/
$('#ChangeEqStatus').validate({
	ignore: "",
	rules: {
		eqstatus: {
			required:true,
		}
	},
	messages: {
		eqstatus: {
			required: "Vali staatus ka ikka.",
		}
	},
	submitHandler: function(form) {

		var formData = new FormData($('#ChangeEqStatus')[0]);
		
        $.ajax({
            type:'POST',
            url: site_url+"ajax/user.php",
			dataType: "json",
            data: formData,
			cache: false,
			contentType: false,
			processData: false,
            success:function(data){
				if (data.success === "1") {
						EQ_data(data.eid);
					$("#ChangeEqStatusModal").modal("hide");
				} else {
					   $("#ChangeEqStatus .ResultArea").html(data.msg);
				}
            },
            error: function (xhr, ajaxOptions, thrownError) {
                console.log(xhr);
            }
        });

	}
});
/*
* AddNewStatus
*/
$('#AddNewStatus').validate({
	ignore: "",
	rules: {
		eqstatus: {
			required:true,
		}
	},
	messages: {
		eqstatus: {
			required: "Lisa staatuse nimi",
		}
	},
	submitHandler: function(form) {

		var formData = new FormData($('#AddNewStatus')[0]);
		
        $.ajax({
            type:'POST',
            url: site_url+"ajax/user.php",
			dataType: "json",
            data: formData,
			cache: false,
			contentType: false,
			processData: false,
            success:function(data){
				if (data.success === "1") {
						EQ_data(data.eid);
					$("#AddNewStatusModal").modal("hide");
				} else {
					   $("#AddNewStatusModal .ResultArea").html(data.msg);
				}
            },
            error: function (xhr, ajaxOptions, thrownError) {
                console.log(xhr);
            }
        });

	}
});
/*
* AddNewCategory
*/
$('#AddNewCategory').validate({
	ignore: "",
	rules: {
		category: {
			required:true,
		}
	},
	messages: {
		category: {
			required: "Lisa kategooria nimi",
		}
	},
	submitHandler: function(form) {

		var formData = new FormData($('#AddNewCategory')[0]);
		
        $.ajax({
            type:'POST',
            url: site_url+"ajax/user.php",
			dataType: "json",
            data: formData,
			cache: false,
			contentType: false,
			processData: false,
            success:function(data){
				if (data.success === "1") {
						EQ_data(data.eid);
					$("#AddNewCategoryModal").modal("hide");
				} else {
					   $("#AddNewCategoryModal .ResultArea").html(data.msg);
				}
            },
            error: function (xhr, ajaxOptions, thrownError) {
                console.log(xhr);
            }
        });

	}
});
function EqList() {
	$.getJSON( "ajax/user.php", {'EqList':"1"}, function( data ) {
		
		f = '';
		$.each(data.list,function(index,res){
			var about = res.about; 
			if(about.length > 50) { 
			var about = about.substring(0,50)+'...';
			}
			
			trStart = '<tr>';
			name = '<td>'+res.name+'</td>';
			about = '<td>'+about+'</td>';
			tdStart = '<td>';
			del = '<button onClick="DeleteEq('+res.id+')" class="btn btn-xs btn-danger">Kustuta</button>';
			check = '<a href="eq.php?id='+res.id+'" class="btn btn-xs btn-primary">Vaata</a>';
			tdEnd = '</td>';
			trEnd = '</tr>';
			f = f + trStart + name + about + tdStart + del + check + tdEnd + trEnd;
			
		});
		
		$("#result").html(f);
	});
}
function EQ_data(eid) {
	$.getJSON( "ajax/user.php", {'GetEqData':"1","eid":eid}, function( data ) {
		console.log(data);
		$(".EQ_name").html("<strong>"+data.name+"</strong>");
		$(".EQ_id").html("<strong>"+data.def+"</strong>");
		$(".EQ_company").html(data.company);
		$(".EQ_serial").html(data.serial);
		$(".EQ_location").html(data.location);
		$(".EQ_about").html(data.about);
		$(".EQ_category").html(data.category);
		$(".EQ_status").html(data.status);
		$(".EQ_status").addClass("label-"+data.status_label);
		$(".EQ_picture").attr("src",data.picture);
	});
}