<?php

/**
* 
*/
class Index extends Main_Controller
{
	
	function __construct()
	{
		parent::__construct();
		echo "<br>We are in index controller";
		$this->view->render('index');
	}
}