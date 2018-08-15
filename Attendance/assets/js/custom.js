
loadScript(plugin_path + "datatables/js/jquery.dataTables.min.js", function(){
	loadScript(plugin_path + "datatables/dataTables.bootstrap.js", function(){

		if (jQuery().dataTable) {

			var table = jQuery('#datatable_sample');
			table.dataTable({
				
				"columns": [
				{
					"orderable": false
				}, {
					"orderable": true
				}, {
					"orderable": false
				}, {
					"orderable": false
				}, {
					"orderable": true
				}, {
					"orderable": false
				}],
				"lengthMenu": [
					[5, 15, 20, -1],
					[5, 15, 20, "All"] //  Page values 
				],
				// set the initial value
				"pageLength": 5,            
				"pagingType": "bootstrap_full_number",
				"language": {
					"lengthMenu": "  _MENU_ records",
					"paginate": {
						"previous":"Prev",
						"next": "Next",
						"last": "Last",
						"first": "First"
					}
				},
				"columnDefs": [{  // set default column settings
					'orderable': false,
					'targets': [0]
				}, {
					"searchable": false,
					"targets": [0]
				}],
				"order": [
					[1, "asc"]
				] // set first column as a default sort by asc
			});

			var tableWrapper = jQuery('#datatable_sample_wrapper');

			table.find('.group-checkable').change(function () {
				var set = jQuery(this).attr("data-set");
				var checked = jQuery(this).is(":checked");
				jQuery(set).each(function () {
					if (checked) {
						jQuery(this).attr("checked", true);
						jQuery(this).parents('tr').addClass("active");
					} else {
						jQuery(this).attr("checked", false);
						jQuery(this).parents('tr').removeClass("active");
					}
				});
				jQuery.uniform.update(set);
			});

			table.on('change', 'tbody tr .checkboxes', function () {
				jQuery(this).parents('tr').toggleClass("active");
			});

			tableWrapper.find('.dataTables_length select').addClass("form-control input-xsmall input-inline"); // modify table per page dropdown

		}

	});
});

/** Remove Panel
	Function called by app.js on panel Close (remove)
 ************************************************** **/
	function _closePanel(panel_id) {
		/** 
			EXAMPLE - LOCAL STORAGE PANEL REMOVE|UNREMOVE

			// SET PANEL HIDDEN
			localStorage.setItem(panel_id, 'closed');
			
			// SET PANEL VISIBLE
			localStorage.removeItem(panel_id);
		**/	
	}

	function GetCheck(value='') {

		var dt = new Date();
		var time = dt.getHours() + ":" + dt.getMinutes() + ":" + dt.getSeconds();
		if (value == '' && time >= '07:10:00') {
			var time = date
		}
		$("#c_in").prop( "checked", true );
	}
	// function setsession(argument='') {
	// 	alert('ok');
	// 	sessionStorage.setItem('editable_u',argument);
	// 	$.session.set('editable_u',argument);
	// 	alert($.session.get("editable_u"));
	// 	alert(sessionStorage.getItem('editable_u'));

	// 	if (typeof(Storage) !== "undefined") {
	// 	    // Store
	// 	    sessionStorage.setItem("lastname", "22222");
	// 	    // Retrieve
	// 	    document.getElementById("result").innerHTML = sessionStorage.getItem("lastname");
	// 	} else {
	// 	    document.getElementById("result").innerHTML = "Sorry, your browser does not support Web Storage...";
	// 	}
	// }
	function GetCheck(value='') {

		var dt = new Date();
		var time = dt.getHours() + ":" + dt.getMinutes() + ":" + dt.getSeconds();
		if (value == '' && time >= '07:10:00') {
			var time = date
		}
		$("#c_in").prop( "checked", true );
	}

	$(document).ready(function{
		if ($('#c_in').val() !='') {
			$('#status').val() = $('#c_in').val();
		}else if($('#c_out').val() !=''){
			$('#status').val() = $('#c_out').val();
		}
		
	});