<?php
/**
* 
*/
class Bootstrap
{
	
	function __construct()
	{
		// $this->database = new MyDatabase();
		if (isset($_GET['url'])) {
			$url = $_GET['url'];
		}else{
			$url = 'index';
		}

		$url = rtrim($url,'/');
		$url = explode('/', $url);
		// echo($url);
		print_r($url);

		$file = 'proj/controller/'.ucfirst($url['0']).'.php';
		if (file_exists($file)) {
			require $file;
		}else{
			require_once('proj/controller/error.php');
			$controller = new Error();
			// Remove Comments After Development
			// exit();
		}
		

		echo "<br>";
		$controller = new $url['0'];

		if (isset($url['2'])) {
			$controller->{$url['1']}($url['2']);
		}else {
			if (isset($url['1'])) {
				$controller->{$url['1']}();
			}
		}
	}
}