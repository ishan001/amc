<?php
session_start();
require_once('../_system/_config/config.php');
require_once(REAL_PATH.'_system/_class/student.class.php');
require_once(REAL_PATH.'_system/_database/mysql.php');

$action = $_REQUEST['action'];
	

if($action== "studentLogin")
{
	$ret = STUDENT :: studentLogin();
	
	if($ret)
	{
		echo $ret;
		exit();
	}	
	else
		echo "no";		
}
if($action== "logout")
{
	unset($_SESSION['AMCB_USERID']);
	unset($_SESSION['AMCB_ADMISSION']);
	unset($_SESSION['AMCB_NAME']);
	unset($_SESSION['AMCB_GRADE']);
	header('location:'.URL.'index.php');
}


?>