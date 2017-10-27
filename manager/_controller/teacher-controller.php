<?php
session_start();
require_once('../_system/_config/config.php');
require_once(REAL_PATH.'_system/_class/teacher.class.php');
include_once(REAL_PATH."_system/_class/array.class.php");
require_once(REAL_PATH.'_system/_database/mysql.php');

$action = $_REQUEST['action'];
	

if($action== "addTeacher")
{
	$array = array("1A", "1B", "1C", "2A","2B", "2C","3A","3B", "3C","4A","4B", "4C");
	if(in_array($_REQUEST['T_CLASS_TECH'], $array)) {
		$class = substr($_REQUEST['T_CLASS_TECH'],0,-1);
		$str = "GRADE".$class."SUB";
		$subary = $$str;
	}			
	$ret = TEACHER :: addTeacher($subary);
	
	if($ret)
	{
		echo "ok";
		exit();
	}	
	else
		echo "no";		
}
if($action== "editTeacher")
{
	$array = array("1A", "1B", "1C", "2A","2B", "2C","3A","3B", "3C","4A","4B", "4C");
	if(in_array($_REQUEST['T_CLASS_TECH'], $array)) {
		$class = substr($_REQUEST['T_CLASS_TECH'],0,-1);
		$str = "GRADE".$class."SUB";
		$subary = $$str;
	}	
	$ret = TEACHER :: editTeacher($subary);
	
	if($ret)
	{
		echo "ok";
		exit();
	}	
	else
		echo "no";		
}
if($action=="validateTeacher")
{
	$ret = TEACHER :: validateTeacher();
	if($ret)
	{
		 echo "false";
		exit();
	}	
	else
	{
		echo "true";
		exit();
	}	
}

?>