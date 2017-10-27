<?php
session_start();
require_once('../_system/_config/config.php');
require_once(REAL_PATH.'_system/_class/student.class.php');
include_once(REAL_PATH."_system/_class/array.class.php");
require_once(REAL_PATH.'_system/_database/mysql.php');
require_once(REAL_PATH.'_system/excel_classes/PHPExcel.php');


$action = $_REQUEST['action'];
	

if($action== "addStudent")
{
	$array = array("1A", "1B", "1C", "2A","2B", "2C","3A","3B", "3C","4A","4B", "4C");
	if(in_array($_REQUEST['S_GRADE'], $array)) {
		$class = substr($_REQUEST['S_GRADE'],0,-1);
		$str = "GRADE".$class."SUB";
		$subary = $$str;
	}
	
	$ret = STUDENT :: addStudent($subary);
	
	if($ret)
	{
		echo "ok";
		exit();
	}	
	else
		echo "no";		
}
if($action== "addStudentResult")
{
	$ret = STUDENT :: addStudentResult();
	
	if($ret)
	{
		echo "ok";
		exit();
	}	
	else
		echo "no";		
}
if($action== "editStudent")
{
	$array = array("1A", "1B", "1C", "2A","2B", "2C","3A","3B", "3C","4A","4B", "4C");
	if(in_array($_REQUEST['S_GRADE'], $array)) {
		$class = substr($_REQUEST['S_GRADE'],0,-1);
		$str = "GRADE".$class."SUB";
		$subary = $$str;
	}
	$ret = STUDENT :: editStudent($subary);
	
	if($ret)
	{
		echo "ok";
		exit();
	}	
	else
		echo "no";		
}
if($action== "addStudentFees")
{
	$ret = STUDENT :: addStudentFees($STU_FEES);
	
	if($ret)
	{
		echo "ok";
		exit();
	}	
	else
		echo "no";		
}
if($action=="validateStudent")
{
	$ret = STUDENT :: validateStudent();
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