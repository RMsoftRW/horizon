<?php

/**
* 
*/
class Main_Controller 
{

	function __construct()
	{
		echo "<br>Main_Controller";
		start_session();
		$this->view = new View();
		// $this->database = new MyDatabase();

	}

}