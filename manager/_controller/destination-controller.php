<?php
session_start();
require_once('../_system/_config/config.php');
require_once(REAL_PATH.'_system/_class/destination.class.php');
require_once(REAL_PATH.'_system/_database/mysql.php');

$action = $_REQUEST['action'];

if($action=="addDestination")
{
	$ret = DESTINATION :: addDestination();
	if($ret)
	{
		echo $ret;
		exit();
	}	
	else
	{
		echo "no";
		exit();
	}	
}
if($action=="editDestination")
{
	$ret = DESTINATION :: editDestination();
	if($ret)
	{
		echo "ok";
		exit();
	}	
	else
	{
		echo "no";
		exit();
	}	
}


?>