<?php

/**
* View Class to render the pages
*/
class View
{
	
	function __construct()
	{
		echo "<br>This is a View controller";
	}

	public function render($view='index')
	{
		require 'proj/Views/'.$view.'.php';
	}
}