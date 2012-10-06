<?php
define('DB_SERVER', "localhost");
define('DB_USER', "root");	//database login name
define('DB_PASS', "");	//database login password
define('DB_DATABASE', "dreamsite_wordpress");	//database name
define('DB_PREFIX', "wp_dw_");	//database prefix


function autoload($class) {
	if (file_exists("classes/$class.class.php")) {
		include_once("classes/$class.class.php");
	} 
}

spl_autoload_register("autoload");
