
expressGo = {
	showSwal: function(type,r_url=null){

		if(type == 'void-invoice'){
			swal({
				title: lang.are_you_sure,
				text: lang.this_invoice_will_be_void,
				type: 'warning',
				showCancelButton: true,
				confirmButtonClass: 'btn btn-success btn-fill',
				cancelButtonClass: 'btn btn-danger btn-fill',
				confirmButtonText: 'Yes!',
				buttonsStyling: false
			}).then(function() {
				swal({
					title: lang.success,
					text: lang.your_invoice_has_been_voided,
					type: 'success',
					confirmButtonClass: "btn btn-success btn-fill",
					buttonsStyling: false
				});

				window.location.href = r_url;
			});
		}else if(type == 'check_in'){
			swal({
				title: lang.are_you_sure,
				text: "",
				type: 'warning',
				showCancelButton: true,
				confirmButtonClass: 'btn btn-success btn-fill',
				cancelButtonClass: 'btn btn-danger btn-fill',
				confirmButtonText: lang.yes,
				buttonsStyling: false
			}).then(function() {
				swal({
					title: lang.success,
					text: lang.vehicle_is_available,
					type: 'success',
					confirmButtonClass: "btn btn-success btn-fill",
					buttonsStyling: false
				});

				window.location.href = r_url;
			});
		}else if(type == 'agreement-delete'){
			swal({
				title: lang.are_you_sure,
				text: lang.agr_and_invoice_deleted,
				type: 'warning',
				showCancelButton: true,
				confirmButtonClass: 'btn btn-success btn-fill',
				cancelButtonClass: 'btn btn-danger btn-fill',
				confirmButtonText: 'Yes!',
				buttonsStyling: false
			}).then(function() {
				swal({
					title: lang.success,
					text: lang.your_agr_deleted,
					type: 'success',
					confirmButtonClass: "btn btn-success btn-fill",
					buttonsStyling: false
				});

				window.location.href = r_url;
			});
		}else if(type == 'delete-branch'){
			swal({
				title: lang.are_you_sure,
				text: lang.branch_deleted,
				type: 'warning',
				showCancelButton: true,
				confirmButtonClass: 'btn btn-success btn-fill',
				cancelButtonClass: 'btn btn-danger btn-fill',
				confirmButtonText: 'Yes!',
				buttonsStyling: false
			}).then(function() {
				swal({
					title: lang.success,
					text: lang.your_branch_deleted,
					type: 'success',
					confirmButtonClass: "btn btn-success btn-fill",
					buttonsStyling: false
				});

				window.location.href = r_url;
			});
		}else if(type == 'delete-class'){
			swal({
				title: lang.are_you_sure,
				text: lang.class_deleted,
				type: 'warning',
				showCancelButton: true,
				confirmButtonClass: 'btn btn-success btn-fill',
				cancelButtonClass: 'btn btn-danger btn-fill',
				confirmButtonText: 'Yes!',
				buttonsStyling: false
			}).then(function() {
				swal({
					title: lang.success,
					text: lang.your_class_deleted,
					type: 'success',
					confirmButtonClass: "btn btn-success btn-fill",
					buttonsStyling: false
				});

				window.location.href = r_url;
			});
		}else if(type == 'delete'){
			swal({
				title: lang.are_you_sure,
				text: lang.do_you_want_delete,
				type: 'warning',
				showCancelButton: true,
				confirmButtonClass: 'btn btn-success btn-fill',
				cancelButtonClass: 'btn btn-danger btn-fill',
				confirmButtonText: 'Yes!',
				buttonsStyling: false
			}).then(function() {
				swal({
					title: lang.success,
					text: lang.deleted,
					type: 'success',
					confirmButtonClass: "btn btn-success btn-fill",
					buttonsStyling: false
				});

				window.location.href = r_url;
			});
		}else if(type == 'delete-payment'){


    //check selected payments


    if($('#n_payment:checked').length > 0){
    	swal({
    		title: lang.are_you_sure,
    		text: lang.you_will_be_no_recover_this,
    		type: 'warning',
    		showCancelButton: true,
    		confirmButtonText: lang.yes_delete_id,
    		cancelButtonText: lang.no_keep_it,
    		confirmButtonClass: "btn btn-success btn-fill",
    		cancelButtonClass: "btn btn-danger btn-fill",
    		buttonsStyling: false
    	}).then(function() {
    		swal({
    			title: lang.deleted,
    			text: lang.payment_deleted,
    			type: 'success',
    			confirmButtonClass: "btn btn-success btn-fill",
    			buttonsStyling: false
    		})
      //from submit
      $("#delete-payment").submit();
  }, function(dismiss) {
  	if (dismiss === 'cancel') {
  		swal({
  			title: lang.cancelled,
  			text: lang.yout_payment_is_safe,
  			type: 'error',
  			confirmButtonClass: "btn btn-info btn-fill",
  			buttonsStyling: false
  		})
  	}
  })

    }else{

    	swal({
    		title: lang.warning,
    		text: lang.payment_not_select,
    		type: 'warning',
    		confirmButtonClass: "btn btn-success btn-fill",
    		buttonsStyling: false
    	});

    }


    
}
},

checkAgreement: function(){


	if($("#client_id").val().length === 0) {
		swal({
			title: lang.warning,
			text: lang.client_not_selected,
			type: 'warning',
			confirmButtonClass: "btn btn-success btn-fill",
			buttonsStyling: false
		});
		return false;
	}

	if($("#n_client_drivers").val().length === 0) {
		swal({
			title: lang.warning,
			text: lang.driver_not_selected,
			type: 'warning',
			confirmButtonClass: "btn btn-success btn-fill",
			buttonsStyling: false
		});
		return false;
	}

}
}



/* NEW AGREEMENTS */

$('#n_agreements_branch').change(function () {
	$('#n_agreements_vehicles tbody').empty().html();
	$.ajax({
		url: p_base_url + "/services/getbranchvehicle/"+ $(this).val(),
		dataType: 'json',
		async: true,
		success: function(json){
			$.each(json, function(key, value){
				$('#n_agreements_vehicles tbody').append('<tr id="vehicle_'+ value.id +'" onclick="n_selectVehicle('+ value.id +')">'
					+'<td>' + value.id + '</td>'
					+'<td>' + value.license_plate + '</td>'
					+'<td>' + value.make + ' ' + value.model + '</td>'
					+'<td>' + value.year + '</td>'
					+'<td>' + value.class + '</td>');
			});
		}
	});

});




$("#n_agreements_f_name").easyAutocomplete({
	url: function(phrase) {
		return p_base_url + "/services/getclientinfo/first_name/" + phrase;
	},

	getValue: function(element) {
		return element.first_name;
	},
	list: {
		onSelectItemEvent: function() {
			var c_id = $("#n_agreements_f_name").getSelectedItemData().id;
			var f_name = $("#n_agreements_f_name").getSelectedItemData().first_name;
			var l_name = $("#n_agreements_f_name").getSelectedItemData().last_name;
			var c_name = $("#n_agreements_f_name").getSelectedItemData().company_name;

			$("#client_id").val(c_id);
			$("#n_agreements_l_name").val(l_name).trigger("change");
			$("#n_agreements_c_name").val(c_name).trigger("change");
			$("#n_agreements_ok").fadeIn();
			$("#n_agreements_ok_n").empty().html(c_name + ' ' + l_name + ' ' + f_name);


			$('#n_client_drivers').empty().append("<option></option>");
        //get client drivers
        $.ajax({
        	url: p_base_url + "/services/getclientdrivers/"+ c_id,
        	dataType: 'json',
        	async: true,
        	success: function(json){
        		$.each(json, function(key, value){
        			$('#n_client_drivers').append('<option value="'+ value.id +'">'+ value.driving_license +' EXP: '+ value.license_exp +' - '+ value.last_name +' '+ value.first_name +'</option>');
        		});
        	}
        });
        //get client drivers end
    }
},

ajaxSettings: {
	dataType: "json",
	method: "POST",
	data: {
		dataType: "json"
	}
},
requestDelay: 400
});



$("#n_agreements_l_name").easyAutocomplete({
	url: function(phrase) {
		return p_base_url + "/services/getclientinfo/last_name/" + phrase;
	},

	getValue: function(element) {
		return element.last_name;
	},
	list: {
		onSelectItemEvent: function() {
			var c_id = $("#n_agreements_l_name").getSelectedItemData().id;
			var f_name = $("#n_agreements_l_name").getSelectedItemData().first_name;
			var l_name = $("#n_agreements_l_name").getSelectedItemData().last_name;
			var c_name = $("#n_agreements_l_name").getSelectedItemData().company_name;

			$("#client_id").val(c_id);
			$("#n_agreements_f_name").val(f_name).trigger("change");
			$("#n_agreements_c_name").val(c_name).trigger("change");
			$("#n_agreements_ok").fadeIn();
			$("#n_agreements_ok_n").empty().html(c_name + ' ' + l_name + ' ' + f_name);

			$('#n_client_drivers').empty().append("<option></option>");
        //get client drivers
        $.ajax({
        	url: p_base_url + "/services/getclientdrivers/"+ c_id,
        	dataType: 'json',
        	async: true,
        	success: function(json){
        		$.each(json, function(key, value){
        			$('#n_client_drivers').append('<option value="'+ value.id +'">'+ value.driving_license +' EXP: '+ value.license_exp +' - '+ value.last_name +' '+ value.first_name +'</option>');
        		});
        	}
        });
        //get client drivers end
    }
},

ajaxSettings: {
	dataType: "json",
	method: "POST",
	data: {
		dataType: "json"
	}
},
requestDelay: 400
});

$("#n_agreements_c_name").easyAutocomplete({
	url: function(phrase) {
		return p_base_url + "/services/getclientinfo/company_name/" + phrase;
	},

	getValue: function(element) {
		return element.company_name;
	},
	list: {
		onSelectItemEvent: function() {
			var c_id = $("#n_agreements_c_name").getSelectedItemData().id;
			var f_name = $("#n_agreements_c_name").getSelectedItemData().first_name;
			var l_name = $("#n_agreements_c_name").getSelectedItemData().last_name;
			var c_name = $("#n_agreements_c_name").getSelectedItemData().company_name;

			$("#client_id").val(c_id);
			$("#n_agreements_f_name").val(f_name).trigger("change");
			$("#n_agreements_l_name").val(l_name).trigger("change");
			$("#n_agreements_ok").fadeIn();
			$("#n_agreements_ok_n").empty().html(c_name + ' ' + l_name + ' ' + f_name);

			$('#n_client_drivers').empty().append("<option></option>");
        //get client drivers
        $.ajax({
        	url: p_base_url + "/services/getclientdrivers/"+ c_id,
        	dataType: 'json',
        	async: true,
        	success: function(json){
        		$.each(json, function(key, value){
        			$('#n_client_drivers').append('<option value="'+ value.id +'">'+ value.driving_license +' EXP: '+ value.license_exp +' - '+ value.last_name +' '+ value.first_name +'</option>');
        		});
        	}
        });
        //get client drivers end
    }
},

ajaxSettings: {
	dataType: "json",
	method: "POST",
	data: {
		dataType: "json"
	}
},
requestDelay: 400
});

function n_selectVehicle(id){
	$("#vehicle_id").val(id);
	$("#n_agreements_vehicles tbody tr").css('background-color', '#fff');
	$("#vehicle_" + id).css('background-color', 'rgba(41, 103, 182, 0.89)');
}

//agreement date correction
$("#n_from").on("change",function(){
	$("#n_to").attr("min",$(this).val()); 
});

$("#n_deposit").on("change",function(){
	var deposit = $(this).val();
	$("#n_deposit_amount").html(deposit + " USD");


	var n_total_amount = $("#n_total_amount").html();

	$("#n_amount_due").html(parseInt(n_total_amount)+parseInt(deposit));

});


var $table = $('#bootstrap-table');

$table.bootstrapTable({
	toolbar: ".toolbar",
	clickToSelect: true,
	showRefresh: true,
	search: true,
	showToggle: true,
	pagination: true,
	searchAlign: 'left',
	pageSize: 8,
	pageList: [8,10,25,50,100],

	formatShowingRows: function(pageFrom, pageTo, totalRows){
                      //do nothing here, we don't want to show the text "showing x of y from..."
                  },
                  formatRecordsPerPage: function(pageNumber){
                  	return pageNumber + " rows visible";
                  },
                  icons: {
                  	refresh: 'fa fa-refresh',
                  	toggle: 'fa fa-th-list',
                  	columns: 'fa fa-columns',
                  	detailOpen: 'fa fa-plus-circle',
                  	detailClose: 'ti-close'
                  }
              });

$(window).resize(function () {
	$table.bootstrapTable('resetView');
});



$(".btnPrint").printPage();
