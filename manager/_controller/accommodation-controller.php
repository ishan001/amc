<?php
session_start();
require_once('../_system/_config/config.php');
require_once(REAL_PATH.'_system/_class/accommodation.class.php');
require_once(REAL_PATH.'_system/_database/mysql.php');

$action = $_REQUEST['action'];

if($action=="addHotel")
{
	$ret = ACCOMMODATION :: addHotel();
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
if($action== "deleteHotelImage")
{
	$ret = ACCOMMODATION :: deleteHotelImage();
	
	if($ret)
	{
		echo "ok";
		exit();
	}	
	else
		echo "no";		
}
if($action== "editHotel")
{
	$ret = ACCOMMODATION :: editHotel();
	
	if($ret)
	{
		echo "ok";
		exit();
	}	
	else
		echo "no";		
}
