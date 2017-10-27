<?php
	list($server) = explode("[:/]",$_SERVER['HTTP_HOST']);

	if($server == 'localhost' ) 
	{
		#database information of local machine
		$GLOBALS['db_host'] = 'localhost';	#local : mysql host name
		$GLOBALS['db_user'] = 'root';		#local : mysql host user
		$GLOBALS['db_pass'] = '';			#local : mysql host password
		$GLOBALS['db_name'] = 'avemaria';	#local : database prefix

		#path information
		define('REAL_PATH', $_SERVER['DOCUMENT_ROOT'].'/avemaria/');	#real path
		define('REAL_PATH_UPLIOAD', $_SERVER['DOCUMENT_ROOT'].'/avemaria/');	#real path upload
		define('URL', 'http://'.$server.'/avemaria/');			#access URL
		define('SEPARATOR', '\\');								#separator
		define('URL_REWRITING', false);							#url rewriting
		define('ROOT_EDITOR', '/avemaria/');	
	}
	else 
	{
		#database information of server
		$GLOBALS['db_host'] = 'localhost';		#server : mysql host name
		$GLOBALS['db_user'] = 'root';	#server : mysql host user
		$GLOBALS['db_pass'] = 'vGypklgEKj4t';		#server : mysql host password
		$GLOBALS['db_name'] = 'avemaria_avemaria';	#server : database prefix

		#path information
		define('REAL_PATH', '/var/www/avemariaconventbolawalana.com/');		#real path
		define('REAL_PATH_UPLIOAD', '/var/www/avemariaconventbolawalana.com/');	#real path upload
		define('URL', 'http://www.avemariaconventbolawalana.com/');				#access URL
		define('SEPARATOR', '/');										#separator
		define('URL_REWRITING', false);									#url rewriting	
		define('ROOT_EDITOR', 'http://www.avemariaconventbolawalana.com/');							
	}



mysql_pconnect($GLOBALS['db_host'], $GLOBALS['db_user'], $GLOBALS['db_pass']) or trigger_error(mysql_error(),E_USER_ERROR); 

mysql_select_db($GLOBALS['db_name']) or die(mysql_error());	



?>
