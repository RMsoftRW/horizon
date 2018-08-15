<?php

	// require_login();
	global $database;
	$msg = "";

	// $_SESSION['userAuth']=231;

	if (isset($_POST['newusr'])) {
		
		$data	= $database->escape_value($_POST['user_fname']);
		$data	.= '|' .$database->escape_value($_POST['user_lname']);
		$data	.= '|' .$database->escape_value($_POST['o_name']);
		$data	.= '|' .$database->escape_value($_POST['user_gn']);
		$data	.= '|' .$database->escape_value($_POST['user_post']);
		$data	.= '|' .$database->escape_value($_POST['id_num']);
		$data	.= '|' .$database->escape_value($_POST['user_phone']);
		$data	.= '|' .$database->escape_value($_POST['user_add']);
		$data	.= '|' .$database->escape_value($_POST['user_site']);
		$data	.= '|' .$database->escape_value($_POST['user_role']);
		$data	.= '|' .$database->escape_value($_POST['username']);
		$data	.= '|' .$database->escape_value($_POST['email']);
		$data	.= '|' .$database->escape_value($_POST['user_pass']);
		$data	.= '|' .$database->escape_value($_POST['user_pass_rep']);
		AddUser($data,$_SESSION['authId'],$_FILES);
	}