<?php

/**
* 
*/
class Error extends Main_Controller
{
	
	function __construct()
	{
		parent::__construct();
		echo "<br>This is an Error Page, Index not found!!!☻";
		$this->view->render('error');
	}
}