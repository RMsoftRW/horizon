<?php 
include 'includes/init.php';
include 'includes/login.php';
?>
<!doctype html>
<html lang="en-US">
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
		<title>Attendance System</title>
		<meta name="description" content="" />
		<meta name="Author" content="" />

		<!-- mobile settings -->
		<meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0" />

		<!-- WEB FONTS -->
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800&amp;subset=latin,latin-ext,cyrillic,cyrillic-ext" rel="stylesheet" type="text/css" />

		<!-- CORE CSS -->
		<link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
		
		<!-- PAGE CSS -->
		<link href="assets/css/essentials.css" rel="stylesheet" type="text/css" />
		<link href="assets/css/layout.css" rel="stylesheet" type="text/css" />
		<link href="assets/css/color_scheme/green.css" rel="stylesheet" type="text/css" id="color_scheme" />

	</head>
	<body>


		<div class="padding-15">

			<div class="login-box">

				<!-- login form -->
				<form id="log_fm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" class="sky-form boxed">
					<header><i class="fa fa-users"></i> Sign In</header>
					<?php $msg1 = isset($_SESSION['msg1']) ? $_SESSION['msg1'] : ''; echo($msg1); ?>

					<!--
					<div class="alert alert-danger noborder text-center weight-400 nomargin noradius">
						Invalid Email or Password!
					</div>

					<div class="alert alert-warning noborder text-center weight-400 nomargin noradius">
						Account Inactive!
					</div>

					<div class="alert alert-default noborder text-center weight-400 nomargin noradius">
						<strong>Too many failures!</strong> <br />
						Please wait: <span class="inlineCountdown" dta-seconds="180"></span>
					</div>
					-->

					<fieldset>	
					
						<section>
							<label class="label">Username</label>
							<label class="input">
								<i class="icon-append fa fa-user"></i>
								<input id="req" class="required" type="text" name="usname" required autocomplete="off" autofocus="on">
								<span class="tooltip tooltip-top-right">Type username</span>
							</label>
						</section>
						
						<section>
							<label class="label">Password</label>
							<label class="input">
								<i class="icon-append fa fa-lock"></i>
								<input id="req1" class="required" type="password" name="psswd" required autocomplete="off">
								<b class="tooltip tooltip-top-right">Type your Password</b>
							</label>
							<!-- <label class="checkbox"><input type="checkbox" name="checkbox-inline" checked><i></i>Keep me logged in</label> -->
						</section>

					</fieldset>

					<footer>
						<button type="submit" class="btn btn-primary pull-right" name="submt">Sign In</button>
						<div class="forgot-password pull-left">
							<a href="reset-password.php">Forgot password?</a> <br />
						</div>
					</footer>
				</form>
				<!-- /login form -->

				<hr />

			</div>

		</div>

		<!-- JAVASCRIPT FILES -->
		<script type="text/javascript">var plugin_path = 'assets/plugins/';</script>
		<script type="text/javascript" src="assets/plugins/jquery/jquery-2.2.3.min.js"></script>
		<script type="text/javascript" src="assets/js/app.js"></script>
		<script type="text/javascript" src="assets/js/jquery.validate.js"></script>
		<script type="text/javascript">
			$('#log_fm').validate();
		</script>
	</body>
</html>