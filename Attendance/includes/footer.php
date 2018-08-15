<!-- JAVASCRIPT FILES -->
		<script type="text/javascript">var plugin_path = 'assets/plugins/';</script>
		<script type="text/javascript" src="assets/plugins/jquery/jquery-2.2.3.min.js"></script>
		<script type="text/javascript" src="assets/plugins/jquery/jquery.session.js"></script>
		<script type="text/javascript" src="assets/js/app.js"></script>
		<script src="assets/js/jquery.validate.js"></script>
		<script type="text/javascript" src="assets/js/custom.js"></script>

		<!-- ID codes foeld -->
		<script type="text/javascript">
			$(document).ready(function(){
				$('#scodes').focus();
			});
		</script>


		<!-- Forms Validation -->
		<script type="text/javascript">
			$('#add_user').validate();
			$('#codeform').validate();
			$('#ed_user').validate();
			$('#event_cr').validate();
			$('#event_ed').validate();
			$('#site_cr').validate();
			$('#site_ed').validate();
			$('#pos_cr').validate();
			$('#pos_ed').validate();
			$('#f_attend').validate();
		</script>
		<!-- End of forms Validation -->
		<!-- Admin registration form -->
		<script type="text/javascript">

			function show_form(){	            
	            var a = $('#user_role').val();
	            if (a == '2' || a == '3') {
	            	$('#username').addClass('required');
					$('#user_pass').addClass('required');
					$('#user_pass_rep').addClass('required');
	            	$("#pass_field").show(1000);
				}	
				if (a == '1'){
					$('#username').removeClass('required');
					$('#user_pass').removeClass('required');
					$('#user_pass_rep').removeClass('required');
					$("#pass_field").hide(1000);
				}            
	        }
		</script>
		<!-- End of Admin registration form -->
		<!-- Password match Validation -->
		<script type="text/javascript">

			function check(){
				var p = $('#user_pass').val();
		  		var rp = $('#user_pass_rep').val();

		  		if (p !== rp) {
					$("#message_pass").html("<p class='alert alert-mini alert-danger text-center'><strong> Sorry!</strong> your passwords dont match, try again</p>");
						exit();

				}else{
					$("#message_pass").html("<p class='alert alert-mini alert-success text-center'><strong> Well done!</strong> your passwords match</p>");
				}
			}
		</script>
		<!-- End of Admin password match Validation -->
		<!-- ID and Phone validaltion -->
		<script type="text/javascript">
			$( ".nbrs" )
			  .keyup(function() {
			  	var b = $('#user_phone').val();
			  	var a = $('#id_num').val();
			  	if (isNaN(a)) {
					$( "#id_message" ).html("<p style='margin-bottom: 0px;' class='alert alert-mini alert-danger text-center'><strong> Sorry! </strong> ID must be numbers only, try again</p>");
					
				} 
				else if (isNaN(b)) {
					$( "#p_message" ).html("<p style='margin-bottom: 0px;' class='alert alert-mini alert-danger text-center'><strong> Sorry! </strong>Enter Numbers only</p>");
				}else{
					$( "#p_message" ).html("<p style='display:none'></p>");
					$( "#id_message" ).html("<p style='display:none'></p>");
					exit();
				}
		  })
		</script>
		<!-- End of ID and Phone validaltion -->

		<!--  -->
		<script type="text/javascript">
			function setsession(argument='') {
				alert(argument);
				// $.post("getD.php", {editable_u: argument});
				$.post("getD.php",{editable_u: argument},
				        function(data,status){
				            // alert("Data: " + data + "\nStatus: " + status);
				        });
				// sessionStorage.setItem('editable_u',argument);
				// $.session.set('editable_u',argument);
				// alert($.session.get("editable_u"));
				// alert(sessionStorage.getItem('editable_u'));

				// if (typeof(Storage) !== "undefined") {
				//     // Store
				//     sessionStorage.setItem("lastname", "22222");
				//     // Retrieve
				//     document.getElementById("result").innerHTML = sessionStorage.getItem("lastname");
				// } else {
				//     document.getElementById("result").innerHTML = "Sorry, your browser does not support Web Storage...";
				// }
			}
		</script>
		<!--  -->

		<script type="text/javascript">

		 	$(document).ready(function(){
		 	$('.ok').on("click", function(){
		 		// alert();
		 		var me = $('#ok1').val();
		 		var from = $('#ok2').val();
		 		var to = $('#ok3').val();
		 		window.open('http://localhost/attendance/user_logs.php?me='+me+'&from='+from+'&to='+to,'GoogleWindow', 'width=800, height=600');
		 	});
		 });	
		</script>


	</body>
</html>