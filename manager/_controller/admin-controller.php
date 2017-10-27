<?php
session_start();
require_once('../_system/_config/config.php');
//require_once(REAL_PATH.'_system/_class/accommodation.class.php');
require_once(REAL_PATH.'_system/_database/mysql.php');

$action = $_REQUEST['action'];

if($action=="logout")
{
	unset($_SESSION['AMCB_admin_id']);
	unset($_SESSION['AMCB_admin_username']);
	unset($_SESSION['AMCB_admin_email']);
	
	header('location:'.URL.'index.php');
}