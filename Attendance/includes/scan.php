<?php

	// echo($_SERVER['PHP_SELF']);
	// if (stristr($_SERVER['PHP_SELF'], 'includes/')) {
	// 	echo("Unothorized Access");
	// 	exit();
	// }
	global $database;
	// $site = $database->escape_value($_SESSION['site']);
	// $user = $database->escape_value($_SESSION['user']);
	$site = $_SESSION['user'];
	$user = $_SESSION['user'];
	$site = $_SESSION['site'];
	$resources = array(1);
	$fname = "";
	$lname = "";
	$addre = "";
	$idnum = "";
	$phone = "";
	$posit = "";
	$email = "";
	$role  = "";
	$mime  = "";
	$img   = "";
	// echo(encryptIt('felix kaman bibiko').'<br>');
	// echo(decryptIt('oQ'));
	// echo(decryptIt($_GET['id']));

	if (isset($_POST['scodes']) && !empty($_POST['scodes'])) {

		// $param = $_POST['c_in'];
		
		$resources = Attend($site,Getid($_POST['scodes']),$user);

		if (!empty($resources)) {
			
			$fname = $resources['fname'];
			$lname = $resources['lname'];
			$addre = WAddress('get',$resources['address']);
			$idnum = $resources['idnumber'];
			$phone = $resources['phone'];
			$posit = $resources['value'];
			$mime  = $resources['mime'];
			$img   = $resources['data'];
		}
		
	}elseif (isset($_SESSION['page']) && $_SESSION['page'] == 'prof') {
		
		$resources = GetUserInfo($_SESSION['page']);
		if (!empty($resources)) {

			$fname = $resources['fname'];
			$lname = $resources['lname'];
			$mname = $resources['mname'];
			$addre = WAddress('get',$resources['address']);
			$idnum = $resources['idnumber'];
			$phone = $resources['phone'];
			$posit = $resources['position'];
			$email  = $resources['email'];
			$role   = $resources['role'];
			$site   = $resources['site'];
			$mime  = $resources['mime'];
			$img   = $resources['data'];
		}
	}

	function GetImg()
	{	
		global $img;
		global $mime;

		if ($img == "") {
			echo '<img class="img img-responsive" src="assets/images/user_attendance.jpg" alt="picture" />';
		}else{
			// header("Content-type: image/jpg");
	        echo '<img class="img img-responsive" src="data:'.$mime.';base64,' . base64_encode( $img ) . '"  alt="picture" />';
		}
	}