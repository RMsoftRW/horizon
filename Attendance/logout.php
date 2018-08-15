<?php
	
	require_once 'includes/init.php';
	require_once 'includes/functions.php';
	  // Performs all actions necessary to log out an admin
	    unset($_SESSION['authId']);
	    session_destroy(); // optional: destroys the whole session
	    redirect_to(ROOT);
