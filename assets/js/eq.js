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

function AddNewEq() {	
	$("#NewEqForm").validate({
	rules: {
		def: {
			required:true,
		},
		name: {
			required:true,
		},
		company: {
			required:true,
		},
		category: {
			required:true,
		},
		status: {
			required:true,
		}
	},
	messages: {
		def: {
			required: "ID missing",
		},
		name: {
			required: "Name missing",
		},
		company: {
			required: "Company missing",
		},
		category: {
			required: "Category missing",
		},
		status: {
			required: "Status missing",
		}
	},
	submitHandler: function(form) {
		var formData = $("#NewEqForm").serialize();		
        $.ajax({
            type:'POST',
            url: "ajax/eq.php",
			dataType: "json",
            data: formData,
            success:function(data){
				if (data.success === "1") {
					location.href = "eq.php?eq_id="+data.eid;
				} 
            },
            error: function (xhr, ajaxOptions, thrownError) {
                console.log(xhr);
            }
        });

	}
});
}


function AddNewCategory() {	
	$("#NewCategoryForm").validate({
	rules: {
		name: {
			required:true,
		}
	},
	messages: {
		name: {
			required: "Name missing",
		}
	},
	submitHandler: function(form) {
		var formData = $("#NewCategoryForm").serialize();		
        $.ajax({
            type:'POST',
            url: "ajax/eq.php",
			dataType: "json",
            data: formData,
            success:function(data){
				if (data.success === "1") {
					$("#OpenModal").modal("hide");
				} 
            },
            error: function (xhr, ajaxOptions, thrownError) {
                console.log(xhr);
            }
        });

	}
});
}
function AddNewStatusFunc() {	
	$("#NewStatusForm").validate({
	rules: {
		name: {
			required:true,
		},
		label: {
			required:true,
		}
	},
	messages: {
		name: {
			required: "Name missing",
		},
		label: {
			required: "Name missing",
		},		
	},
	submitHandler: function(form) {
		var formData = $("#NewStatusForm").serialize();		
        $.ajax({
            type:'POST',
            url: "ajax/eq.php",
			dataType: "json",
            data: formData,
            success:function(data){
				if (data.success === "1") {
					$("#OpenModal").modal("hide");
				} 
            },
            error: function (xhr, ajaxOptions, thrownError) {
                console.log(xhr);
            }
        });

	}
});
}
function ChangeEqDataFunc() {	
	$("#ChangeEqDataForm").validate({
	rules: {
		def: {
			required:true,
		},
		name: {
			required:true,
		},
		serial: {
			required:true,
		},
		company: {
			required:true,
		},
		location: {
			required:true,
		},
		who_use: {
			required:true,
		},
		category: {
			required:true,
		},
		status: {
			required:true,
		},
		about: {
			required:true,
		}
	},
	messages: {
		def: {
			required: "ID missing",
		},
		name: {
			required: "Name missing",
		},
		serial: {
			required: "Serial missing",
		},
		company: {
			required: "Company missing",
		},
		location: {
			required: "Location missing",
		},
		who_use: {
			required: "Who use missing",
		},
		category: {
			required: "Category missing",
		},
		status: {
			required: "Status missing",
		},
		about: {
			required: "About missing",
		}
	},
	submitHandler: function(form) {
		var formData = $("#ChangeEqDataForm").serialize();		
		var eq_id = getUrlParameters("eq_id", "", true);
        $.ajax({
            type:'POST',
            url: "ajax/eq.php?eq_id="+eq_id,
			dataType: "json",
            data: formData,
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
});
}

$(document).on('change','input[name=picture]',function() {
			$("#UploadEqPictureForm").submit();
});
function AddTechRow() {
	
		trS = '<tr>';
		label = '<td><input type="text" name="label[]" class="form-control"></td>';
		value = '<td><input type="text" name="name[]" class="form-control"></td>';
		trE = '</tr>';
		f = trS+label+value+trE;
		$("#TechRows").append(f);
}


function ChangeEqTechFunc() {	
	$("#ChangeEqTechForm").validate({
	rules: {
		techMore: {
			required:true,
		}
	},
	messages: {
		techMore: {
			required: "Info missing",
		}
	},
	submitHandler: function(form) {
		var formData = $("#ChangeEqTechForm").serialize();		
		var eq_id = getUrlParameters("eq_id", "", true);
        $.ajax({
            type:'POST',
            url: "ajax/eq.php?eq_id="+eq_id,
			dataType: "json",
            data: formData,
			success:function(data){
				if (data.success === "1") {
					GetEqTech();
					$("#OpenModal").modal("hide");
				}
			},
            error: function (xhr, ajaxOptions, thrownError) {
                console.log(xhr);
            }
        });

	}
});
}
function GetEqTech() {
		var eq_id = getUrlParameters("eq_id", "", true);
		$.getJSON( "ajax/eq.php", {'GetEqTechData':"1","eq_id":eq_id}, function( data ) {
		f = '';
		$.each(data.data,function(index,res){
			
			f = f+'<tr><td width="50%">'+res.label+'</td><td>'+res.value+'</td></tr>';
			
		});
		$(".EQ_techLabels").html(f);
		$(".techMore").html(data.more);
	});		
	
}
function GetEqFiles() {
		var eq_id = getUrlParameters("eq_id", "", true);
	$.getJSON( "ajax/eq.php", {'GetEqFiles':"1","eq_id":eq_id}, function( data ) {
		if (data.success === "1") {
		f = '';
		$.each(data.files,function(index,res){
			colS = '<div class="thumbnail col-xs-4 col-md-2 text-center"><div class="thumb-header">'+res.name+'</div>'; 
			img = '<img src="'+res.img+'"class="img-thumbnail">';
			btnAS = '<div class="btnArea thumb-footer">';
			danger = '<button class="btn btn-xs btn-danger" onClick="DeleteEqFile('+res.id+')"><i class="fa fa-times"></i></button>';
			success = ' <button class="btn btn-xs btn-success" data-id="ViewEqFile" type="button" data-toggle="modal" data-target="#OpenModal" data-res="'+res.id+'"><i class="fa fa-search-plus"></i></button>';
			btnAE = '</div>';
			colE = '</div>';
	
			f = f+colS+img+btnAS+danger+success+btnAE+colE;		
		});
		$(".filesArea").html(f);
		}
	});		
}
/*
* DeleteEqFile
*/
function DeleteEqFile(fid) {
		var eq_id = getUrlParameters("eq_id", "", true);
	
        $.ajax({
            type:'POST',
            url: "ajax/eq.php?eq_id="+eq_id,
			dataType: "json",
            data: {"DeleteEqFile":"1", "fid" : fid},
            success:function(data){
				if (data.success === "1") {
					GetEqFiles();
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
* ViewEqFile
*/
function ViewEqFile(fid) {
	var eq_id = getUrlParameters("eq_id", "", true);
	$.getJSON( "ajax/eq.php", {'ViewEqFile':"1","fid":fid,'eq_id':eq_id}, function( data ) {
	if (data.type === "jpg" || data.type === "gif" || data.type === "jpeg" || data.type === "png") {
		name = '<h4>'+data.name+'</h4>';
		img = '<img src="'+data.url+'"class="img-thumbnail">';
		$(".modal-body .EqFileArea").html(name+img);
	} else 
	if (data.type === "pdf" || data.type === "doc" || data.type === "docx" || data.type === "xls" || data.type === "ppt" || data.type === "rtf" || data.type === "odt" || data.type === "ods" || data.type === "odp" || data.type === "csv") {
		name = '<h4>'+data.name+'</h4>';
		pdf = '<iframe src="http://docs.google.com/gview?url='+data.url+'&embedded=true" style="width:100%; height:500px;" frameborder="0"></iframe>';
		$(".modal-body .EqFileArea").html(name+pdf);
	} else {
		name = '<h4>'+data.name+'</h4>';
		download = '<a class="btn btn-success" href="'+data.url+'"><strong>Lae fail alla!</strong><small class="block"> Selle faili eelvaadet ei saa kuvada</small></a>';
		$(".modal-body .EqFileArea").html(name+download);
	}
	});		
	
}
function UploadEqFileFunc() {	
	$("#AddEqFileForm").validate({
	rules: {
		picture: {
			required:true,
		},
		name: {
			required: true,
		}
	},
	messages: {
		techMore: {
			required: "Info missing",
		},
		name: {
			required: "File name missing",
		}
	},
	submitHandler: function(form) {
		var formData = new FormData($('#AddEqFileForm')[0]);
		var eq_id = getUrlParameters("eq_id", "", true);
        
		$.ajax({
            type:'POST',
            url: "ajax/eq.php?eq_id="+eq_id,
			dataType: "json",
            data: formData,
			contentType: false,
			cache: false, 
			processData:false,
			success:function(data){
				if (data.success === "1") {
					GetEqFiles();
					$("#OpenModal").modal("hide");
				}
			},
            error: function (xhr, ajaxOptions, thrownError) {
                console.log(xhr);
            }
        });

	}
});
}
function EditEqPartsFunc() {	
	$("#EditEqPartsForm").validate({
	rules: {
		code: {
			required:true,
		},
		description: {
			required: true,
		},
		seller: {
			required:true,
		}
	},
	messages: {
		code: {
			required: "Code missing",
		},
		description: {
			required: "Description missing",
		},
		seller: {
			required: "Seller missing",
		}
	},
	submitHandler: function(form) {
		var formData = $("#EditEqPartsForm").serialize();		
		var eq_id = getUrlParameters("eq_id", "", true);
        
		$.ajax({
            type:'POST',
            url: "ajax/eq.php?eq_id="+eq_id,
			dataType: "json",
            data: formData,
			success:function(data){
				if (data.success === "1") {
					$("#EqPartsTable").dataTable().fnDestroy();
					EqPartsTable();
					$("#OpenModal").modal("hide");
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
* DeleteEqParts
*/
function DeleteEqParts(pid) {
		var eq_id = getUrlParameters("eq_id", "", true);
	
        $.ajax({
            type:'POST',
            url: "ajax/eq.php?eq_id="+eq_id,
			dataType: "json",
            data: {"DeleteEqParts":"1", "pid" : pid},
            success:function(data){
				if (data.success === "1") {
					$("#EqPartsTable").dataTable().fnDestroy();
					EqPartsTable();
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
* EqPartsData
*/
function EqPartsData(pid) {
	var eq_id = getUrlParameters("eq_id", "", true);
	$.getJSON( "ajax/eq.php", {'EqPartsData':"1","pid":pid,'eq_id':eq_id}, function( data ) {
		trS = '<tr><input type="hidden" name="pid" value="'+pid+'">';
			code = '<td><input type="name" name="code" value="'+data.Code+'" class="form-control"></td>';
			desc = '<td><input type="name" name="description" value="'+data.Description+'" class="form-control"></td>';
			seller = '<td><input type="name" name="seller" value="'+data.Seller+'" class="form-control"></td>';
		trE = '</tr>';
		
		$("#EditEqPartsForm tbody").html(trS+code+desc+seller+trE);
	});		
}
function AddPartsRow(nr) {
		nr++; 

		trS = '<tr>';
		code = '<td><input type="text" name="code['+nr+']" class="form-control req"></td>';
		description = '<td><textarea class="form-control req" name="description['+nr+']"></textarea></td>';
		seller = '<td><textarea class="form-control req" name="seller['+nr+']"></textarea></td>';
		trE = '</tr>';
		f = trS+code+description+seller+trE;
		$("#AddEqPartsForm tbody").append(f);
		
		b = '<button onClick="AddPartsRow('+nr+')" class="btn btn-primary"><i class="fa fa-plus"></i> <span class="hidden-mobile">Add Row</span></button>';
		$(".AddPartsRow").html(b);
}


function AddEqPartsFunc() {	

$.validator.addClassRules("req", {
     required: true
});

	$("#AddEqPartsForm").validate({
	rules: {
	},
	messages: {
	},
	submitHandler: function(form) {
		var formData = $("#AddEqPartsForm").serialize();		
		var eq_id = getUrlParameters("eq_id", "", true);
        
		$.ajax({
            type:'POST',
            url: "ajax/eq.php?eq_id="+eq_id,
			dataType: "json",
            data: formData,
			success:function(data){
				if (data.success === "1") {
					$("#EqPartsTable").dataTable().fnDestroy();
					EqPartsTable();
					$("#OpenModal").modal("hide");
				}
			},
            error: function (xhr, ajaxOptions, thrownError) {
                console.log(xhr);
            }
        });

	}
});
}

function myDateFunction(id) {
	var eq_id = getUrlParameters("eq_id", "", true);
	var date = $("#" + id).data("date");	
	var hasEvent = $("#" + id).data("hasEvent");
	rid = "'"+id+"'";
	if (hasEvent) {
		
		f = '';
		$.getJSON( "ajax/eq.php", {'GetServiceDateData':"1","date":date,'eq_id':eq_id}, function( data ) {
				col12S = '<div class="col-xs-12 well padding-10">';
				h4 = '<div class="col-xs-12"><strong><h4>'+data.name+' <span class="pull-right"><span class="btn btn-xs btn-'+data.status_label+'">'+data.status+'</span></span </h4></strong><hr/></div>';
				p1 = '<p class="margin-top-10"><i class="fa fa-user"></i> <strong>'+data.user+'</strong> <span class="pull-right"><i class="fa fa-clock-o"></i> <strong>'+data.service_date+'</strong></span> </p>';
				p2 = '<p class="margin-top-10"><i class="fa fa-cubes"></i> Parts: <br/>';

				parts = "";	
				$.each(data.parts,function(index,part){
					parts = parts + '<label class="label label-primary">'+part.name+'</label></p>';
				});
				
				p3 = '<p><i class="fa fa-comment-o"></i> Description: <br/> <strong>'+data.description+'</strong></p>';
				p4 = '<p><i>'+ data.status_note+'</i></p>';
				btn = '<div class="text-right"><hr/><button type="button" data-res="'+data.id+'" data-toggle="modal" data-id="ChangeEqServiceStatus" data-target="#OpenModal" class="btn btn-primary">Change</button></div>';
				col12E = '</div>';
				f = f + col12S + h4 + p1 + p2 + parts + p3 + p4 + btn + col12E;
				$(".ShowService").html(f);
		});
	} else {
				
			f = '<form method="POST" action="javascript:void(0)" id="AddNewEqServiceForm"> \
				<input type="hidden" name="AddNewEqService" value="1"> \
			    <div class="col-xs-12 col-sm-12 well"> \
				<div class="col-xs-12 col-sm-12"> \
					<h4>Add new service</h4> \
					<hr/> \
				</div> \
				<div class="col-xs-12 col-sm-4"> \
					<div class="form-group col-xs-12"> \
						<label>Date</label> \
						<input type="text" name="date" class="form-control" readonly="readonly"/> \
					</div> \
				</div> \
				<div class="col-xs-12 col-sm-8"> \
					<div class="form-group col-xs-12"> \
						<label>Name</label> \
						<input type="text" name="name" class="form-control"/> \
					</div> \
				</div> \
				<div class="col-xs-12 col-sm-6"> \
					<div class="form-group col-xs-12"> \
						<label>Service maker</label> \
						<input type="text" name="user" class="form-control"/> \
					</div> \
				</div> \
				<div class="col-xs-12 col-sm-6"> \
					<div class="form-group col-xs-12" id="statuses"> \
						<label class="block">Status</label> \
						<span class="btn btn-xs btn-success" onClick="SelectInput(1);"><input type="radio" name="status" value="1"> Success</span> \
						<span class="btn btn-xs btn-danger" onClick="SelectInput(2);"><input type="radio" name="status" value="2"> Failed</span> \
						<span class="btn btn-xs btn-warning" onClick="SelectInput(3);"><input type="radio" name="status" value="3"> Pending</span> \
					</div> \
				</div> \
				<div class="col-xs-12 col-sm-12"> \
					<div class="form-group col-xs-12"> \
						<label>Parts</label> \
						<select  multiple="multiple" name="parts[]" class="form-control select2" width="100%"> \
						</select> \
					</div> \
				</div> \
				<div class="col-xs-12 col-sm-12"> \
					<div class="form-group col-xs-12"> \
						<label>Description</label> \
						<textarea class="form-control" name="description"></textarea> \
					</div> \
				</div> \
				<div class="col-xs-12 col-sm-12"> \
					<div class="form-group col-xs-12 text-right"> \
						<button onClick="AddNewEqServiceFunc('+rid+')" type="submit" class="btn btn-primary">Save</button> \
					</div> \
				</div> \
				</div> \
				</form> ';
				$(".ShowService").html(f);

						$.getJSON( "ajax/eq.php", {'LoadEqServiceStatuses':"1",'eq_id':eq_id}, function( data ) {
							st = "";
							$.each(data,function(index,res){
								st = '<option value="'+res.id+'">'+res.name+'</option>';
							});
							$("#AddNewEqServiceForm .statuses").html(st);
						});
						$.getJSON( "ajax/eq.php", {'EqPartsDataSelect2':"1",'eq_id':eq_id}, function( data ) {
							$('.select2').select2({data:data});
						});
						
  
			$("#AddNewEqServiceForm input[name=date]").attr("value",date);
	}
	
}
/*
* SelectInput
*/
function SelectInput(val) {
	if (val === 1) { var k = $("#statuses input[value=1]").attr("checked","checked"); }
	if (val === 2) { var k = $("#statuses input[value=2]").attr("checked","checked"); }
	if (val === 3) { var k = $("#statuses input[value=3]").attr("checked","checked"); }
}
/*
* ChangeEqServiceFunc
*/
function ChangeEqServiceStatusFunc() {	
	$("#ChangeEqServiceStatusForm").validate({
	rules: {
		status: {
			required:true,
		},
		note: {
			required: true,
		}
		},
	messages: {
		status: {
			required: "Status missing",
		},
		note: {
			required: "Note missing",
		}
	},
	submitHandler: function(form) {
		var formData = $("#ChangeEqServiceStatusForm").serialize();		
		var eq_id = getUrlParameters("eq_id", "", true);
        
		$.ajax({
            type:'POST',
            url: "ajax/eq.php?eq_id="+eq_id,
			dataType: "json",
            data: formData,
			success:function(data){
				if (data.success === "1") {
					window.location = 'eq.php?eq_id='+eq_id+'&tab=service';
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
* AddNewEqServiceFunc
*/
function AddNewEqServiceFunc(id) {	
	$("#AddNewEqServiceForm").validate({
	rules: {
		date: {
			required:true,
		},
		name: {
			required: true,
		},
		user: {
			required: true,
		},
		status: {
			required: true,
		},
		parts: {
			required: true,
		},
		description: {
			required: true,
		}
	},
	messages: {
		date: {
			required: "Name missing",
		},
		name: {
			required: "Name missing",
		},
		user: {
			required: "Name missing",
		},
		status: {
			required: "Name missing",
		},
		parts: {
			required: "Name missing",
		},
		description: {
			required: "Color missing",
		}
	},
	submitHandler: function(form) {
		var formData = $("#AddNewEqServiceForm").serialize();		
		var eq_id = getUrlParameters("eq_id", "", true);
        
		$.ajax({
            type:'POST',
            url: "ajax/eq.php?eq_id="+eq_id,
			dataType: "json",
            data: formData,
			success:function(data){
				if (data.success === "1") {
					window.location = 'eq.php?eq_id='+eq_id+'&tab=service';
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
* AddEqServiceStatus
*/
function AddEqServiceStatusFunc() {	
	$("#AddEqServiceStatus").validate({
	rules: {
		name: {
			required:true,
		},
		label: {
			required: true,
		}
	},
	messages: {
		name: {
			required: "Name missing",
		},
		label: {
			required: "Color missing",
		}
	},
	submitHandler: function(form) {
		var formData = $("#AddEqServiceStatus").serialize();		
		var eq_id = getUrlParameters("eq_id", "", true);
        
		$.ajax({
            type:'POST',
            url: "ajax/eq.php?eq_id="+eq_id,
			dataType: "json",
            data: formData,
			success:function(data){
				if (data.success === "1") {
					LoadEqServiceStatuses();
				}
			},
            error: function (xhr, ajaxOptions, thrownError) {
                console.log(xhr);
            }
        });

	}
});
}
function RemoveEqServiceStatus(id) {
		var eq_id = getUrlParameters("eq_id", "", true);
        
		$.ajax({
            type:'POST',
            url: "ajax/eq.php?eq_id="+eq_id,
			dataType: "json",
            data: {"RemoveEqServiceStatus":"1", "status_id" : id},
			success:function(data){
				if (data.success === "1") {
					LoadEqServiceStatuses();
				}
			},
            error: function (xhr, ajaxOptions, thrownError) {
                console.log(xhr);
            }
        });		
}
function LoadEqServiceStatuses() {
	var eq_id = getUrlParameters("eq_id", "", true);
		$.getJSON( "ajax/eq.php", {'LoadEqServiceStatuses':"1",'eq_id':eq_id}, function( data ) {
			f="";
			$.each(data,function(index,res){
				
				f = f + '<label class="label label-'+res.label+'">'+res.name+' </label><span onclick="RemoveEqServiceStatus('+res.id+');" class="pointer label label-danger"><i class="fa fa-times"></i></span> ';
			});
			h4 = '<h4><strong>Statuses</strong></h4><hr/>';
			$(".eqStatusesArea").html(h4+f);
		});
	
}	
function isset ( strVariableName ) { 

    try { 
        eval( strVariableName );
    } catch( err ) { 
        if ( err instanceof ReferenceError ) 
           return false;
    }

    return true;

 } 
function GetCategoriesList() { 
	$.getJSON( "ajax/eq.php", {'GetCategoriesList':"1"}, function( data ) {
		f = "";
		$.each(data,function(index,res){
			f = f+'<tr><td>'+res.name+'</td><td width="10%"><button onClick="DeleteCategory('+res.id+')" class="btn btn-xs btn-danger"><i class="fa fa-times"></i></button></td></tr>';

		});
		$(".catsList tbody").html(f);
	});
}
function DeleteCategory(id) {
		$.ajax({
            type:'POST',
            url: "ajax/eq.php",
			dataType: "json",
            data: {"DeleteCategory":"1", "cat_id" : id},
			success:function(data){
				if (data.success === "1") {
					GetCategoriesList();
				}
			},
            error: function (xhr, ajaxOptions, thrownError) {
                console.log(xhr);
            }
        });				
}
function GetStatusList() { 
	$.getJSON( "ajax/eq.php", {'GetStatusList':"1"}, function( data ) {
		f = "";
		$.each(data,function(index,res){
			f = f+'<tr><td>'+res.name+'</td><td width="10%"><button onClick="DeleteStatus('+res.id+')" class="btn btn-xs btn-danger"><i class="fa fa-times"></i></button></td></tr>';

		});
		$(".statusList tbody").html(f);
	});
}
function DeleteStatus(id) {
		$.ajax({
            type:'POST',
            url: "ajax/eq.php",
			dataType: "json",
            data: {"DeleteStatus":"1", "status_id" : id},
			success:function(data){
				if (data.success === "1") {
					GetStatusList();
				}
			},
            error: function (xhr, ajaxOptions, thrownError) {
                console.log(xhr);
            }
        });				
}
function DeleteEq(id) {
		$.ajax({
            type:'POST',
            url: "ajax/eq.php",
			dataType: "json",
            data: {"DeleteEq":"1", "eq_id" : id},
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
