<?php 

/**
 * 
 */
/**class Config 
{
	
	function __construct()
	{*/
		DEFINED("DB_SERVE")? NULL : DEFINE("DB_SERVE","localhost");
		DEFINED("DB_USER")? NULL : DEFINE("DB_USER","root");
		DEFINED("DB_PASS")? NULL : DEFINE("DB_PASS","AdminDB");
		DEFINED("DB_NAME")? NULL : DEFINE("DB_NAME","attendance");

		date_default_timezone_set("Africa/Kigali");

		DEFINED('ROOT')? NULL : DEFINE('ROOT', dirname("").'/attendance');
		DEFINED('PRIVATE_FOLDER')? NULL : DEFINE('PRIVATE_FOLDER', ROOT.'/include');
		// echo ROOT;
		// echo ROOT_DIR;
		// echo ROOT_URL;
		// echo _FILE_;
		// echo _DIR_;
		// echo ROOT;
	/**}
}*/