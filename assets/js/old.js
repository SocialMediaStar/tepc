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
	$.getJSON( "ajax/eq.php", {'EqList':"1"}, function( data ) {
		
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
			check = '<a href="eq.php?eq_id='+res.id+'" class="btn btn-xs btn-primary">Vaata</a>';
			tdEnd = '</td>';
			trEnd = '</tr>';
			f = f + trStart + name + about + tdStart + del + check + tdEnd + trEnd;
			
		});
		
		$("#result").html(f);
	});
}

function AddTechRow() {
	
		trS = '<tr>';
		label = '<td><input type="text" name="label[]" class="form-control"></td>';
		value = '<td><input type="text" name="value[]" class="form-control"></td>';
		trE = '</tr>';
		f = trS+label+value+trE;
		$("#TechRows").append(f);
}

/*
* AddTech
*/
$('#AddTech').validate({
	ignore: "",
	rules: {
	},
	messages: {
	},
	submitHandler: function(form) {

		var formData = new FormData($('#AddTech')[0]);
		
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
					EQ_TechData(data.eqid);
					$("#AddTechModal").modal("hide");
				} else {
					   $("#AddTechModal .ResultArea").html(data.msg);
				}
            },
            error: function (xhr, ajaxOptions, thrownError) {
                console.log(xhr);
            }
        });

	}
});
function EQ_TechData(eid) {
	$.getJSON( "ajax/user.php", {'GetEqTechData':"1","eqid":eid}, function( data ) {
		f = '';
		$.each(data.data,function(index,res){
			
			f = f+'<tr><td width="50%">'+res.label+'</td><td>'+res.value+'</td></tr>';
			
		});
		$(".EQ_techLabels").html(f);
		$(".techMore").html(data.more);
	});		
	
}
/*
* AddEqParts
*/
$('#AddEqParts').validate({
	ignore: "",
	rules: {
		code: {
			required:true,
		}
	},
	messages: {
		code: {
			required: "Varuosa kood puudu",
		}
	},
	submitHandler: function(form) {
		var formData = new FormData($('#AddEqParts')[0]);
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
						$("#AddEqPartsModal").modal("hide");
				} else {
					   $("#AddEqParts .ResultArea").html(data.msg);
				}
            },
            error: function (xhr, ajaxOptions, thrownError) {
                console.log(xhr);
            }
        });

	}
});
/*
* EditEqFile
*/
$('#EditEqFile').validate({
	ignore: "",
	rules: {
		name: {
			required:true,
		}
	},
	messages: {
		name: {
			required: "Faili nimi on puudu!",
		}
	},
	submitHandler: function(form) {

		var formData = new FormData($('#EditEqFile')[0]);
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
						EQ_GetFiles(data.eid);
					$("#EditEqFileModal").modal("hide");
				} else {
					   $("#EditEqFileModal .ResultArea").html(data.msg);
				}
            },
            error: function (xhr, ajaxOptions, thrownError) {
                console.log(xhr);
            }
        });

	}
});
function EQ_GetFiles(eid) {
	$.getJSON( "ajax/user.php", {'GetEqFiles':"1","eq_id":eid}, function( data ) {
		f = '';
		$.each(data.files,function(index,res){
			name = "'"+res.name+"'"
			colS = '<div class="thumbnail col-xs-4 col-md-2 text-center"><div class="thumb-header">'+res.name+'</div>'; 
			img = '<img src="'+res.img+'"class="img-thumbnail">';
			btnAS = '<div class="btnArea thumb-footer">';
			danger = '<button class="btn btn-xs btn-danger" onClick="DeleteEqFile('+res.id+')"><i class="fa fa-times"></i></button>';
			success = ' <button class="btn btn-xs btn-success" onClick="ViewEqFile('+res.id+')"><i class="fa fa-search-plus"></i></button>';
			info = ' <button class="btn btn-xs btn-info" onClick="EditEqFile('+res.id+','+name+')"><i class="fa fa-edit"></i></button>';
			btnAE = '</div>';
			colE = '</div>';
	
			f = f+colS+img+btnAS+danger+success+info+btnAE+colE;		
		});
		$(".filesArea").html(f);
	});		
	
}
/*
* EditEqFile
*/
function EditEqFile(fid,name) {
	$("#EditEqFile input[name=fid]").attr("value",fid);
	$("#EditEqFile input[name=name]").attr("value",name);
	
	$("#EditEqFileModal").modal("show");
}
/*
* ViewEqFile
*/
function ViewEqFile(fid) {
	$.getJSON( "ajax/user.php", {'ViewEqFile':"1","fid":fid}, function( data ) {
	if (data.type === "jpg" || data.type === "gif" || data.type === "jpeg" || data.type === "png") {
		name = '<h4>'+data.name+'</h4>';
		img = '<img src="'+data.url+'"class="img-thumbnail">';
		$(".ViewArea").html(name+img);
	} else 
	if (data.type === "pdf" || data.type === "doc" || data.type === "docx" || data.type === "xls" || data.type === "ppt" || data.type === "rtf" || data.type === "odt" || data.type === "ods" || data.type === "odp" || data.type === "csv") {
		name = '<h4>'+data.name+'</h4>';
		pdf = '<iframe src="http://docs.google.com/gview?url='+data.url+'&embedded=true" style="width:100%; height:500px;" frameborder="0"></iframe>';
		$(".ViewArea").html(name+pdf);
	} else {
		name = '<h4>'+data.name+'</h4>';
		download = '<a class="btn btn-success" href="'+data.url+'"><strong>Lae fail alla!</strong><small class="block"> Selle faili eelvaadet ei saa kuvada</small></a>';
		$(".ViewArea").html(name+download);
	}
	


	$("#ViewEqFileModal").modal("show");

	});		
	
}
/*
* DeleteEqFile
*/
function DeleteEqFile(fid) {
	
        $.ajax({
            type:'POST',
            url: site_url+"ajax/user.php",
			dataType: "json",
            data: {"DeleteEqFile":"1", "fid" : fid},
            success:function(data){
				if (data.success === "1") {
					EQ_GetFiles(data.eid);
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
* UploadEqFiles
*/
$('#UploadEqFiles').validate({
	ignore: "",
	rules: {
		files: {
			required:true,
		}
	},
	messages: {
		files: {
			required: "Lisa pilt ka ikka ;)",
		}
	},
	submitHandler: function(form) {

		var formData = new FormData($('#UploadEqFiles')[0]);
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
						EQ_GetFiles(data.eid);
					$("#AddEqFileModal").modal("hide");
				} else {
					   $("#AddEqFileModal .ResultArea").html(data.msg);
				}
            },
            error: function (xhr, ajaxOptions, thrownError) {
                console.log(xhr);
            }
        });

	}
});
/*
* GetServiceDates
*/
function GetServiceDates(eq_id,month) {
	$.getJSON( "ajax/user.php", {'GetServiceDates':"1","eq_id":eq_id,"month":month}, function( data ) {
		
	});
	}
	