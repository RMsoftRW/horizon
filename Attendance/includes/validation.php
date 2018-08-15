<?php
$msg = '';
global $database;

if (isset($_POST['newusr'])) {

	$user_fname   =  $_POST['user_fname'];
	$user_lname   =  $_POST['user_lname'];
	$o_name   =  $_POST['o_name'];
	$user_gn   =  $_POST['user_gn'];
	$user_post   =  $_POST['user_post'];
	$id_num   =  $_POST['id_num'];
	$user_phone  =  $_POST['user_phone'];
	$user_add  =  $_POST['user_add'];
	$user_pic  =  $_POST['user_pic'];
	$user_site  =  $_POST['user_site'];
	$user_role  =  $_POST['user_role'];
	$username  =  $_POST['username'];
	$email  =  $_POST['email'];
	$user_pass  =  $_POST['user_pass'];
	$user_pass_rep  =  $_POST['user_pass_rep'];

	$msg = '<div class="alert alert-success alert-dismissible">
			    <button type="button" class="close" data-dismiss="alert">&times;</button>
			    <strong>Registered!</strong> New User\'s been Registered Successfully!.
			  </div>';
}