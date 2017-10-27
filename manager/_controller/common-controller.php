<?php
session_start();
require_once('../_system/_config/config.php');
require_once(REAL_PATH.'_system/_class/common.class.php');
require_once(REAL_PATH.'_system/_database/mysql.php');
//require_once(REAL_PATH.'_system/excel/Writer.php');
//require_once(REAL_PATH.'_system/_class/excelwriter.inc.php');
require_once(REAL_PATH.'_system/excel_classes/PHPExcel.php');



$action = $_REQUEST['action'];

/* admin login */

if($action== "userLogin")
{
	$ret = COMMON :: userLogin();
	
	if($ret)
	{
		echo "ok";
		exit();
	}	
	else
		echo "no";		
}

/* subject */ 
if($action== "addSubject")
{
	$ret = COMMON :: addSubject();
	
	if($ret)
	{
		echo "ok";
		exit();
	}	
	else
		echo "no";		
}
if($action== "loadSubjects")
{
	$ret = COMMON :: loadSubjects();
	
}
if($action== "editSubject")
{
	$ret = COMMON :: editSubject();
	
	if($ret)
	{
		echo "ok";
		exit();
	}	
	else
		echo "no";		
}

/* sprots */ 
if($action== "addSport")
{
	$ret = COMMON :: addSport();
	
	if($ret)
	{
		echo "ok";
		exit();
	}	
	else
		echo "no";		
}
if($action== "loadSports")
{
	$ret = COMMON :: loadSports();
	
}
if($action== "editSport")
{
	$ret = COMMON :: editSport();
	
	if($ret)
	{
		echo "ok";
		exit();
	}	
	else
		echo "no";		
}


/* Curriculum Activities */ 
if($action== "addActivity")
{
	$ret = COMMON :: addActivity();
	
	if($ret)
	{
		echo "ok";
		exit();
	}	
	else
		echo "no";		
}
if($action== "loadActivity")
{
	$ret = COMMON :: loadActivity();
	
}
if($action== "editActivity")
{
	$ret = COMMON :: editActivity();
	
	if($ret)
	{
		echo "ok";
		exit();
	}	
	else
		echo "no";		
}

//news controller
if($action== "addNews")
{
	$ret = COMMON :: addNews();
	
	if($ret)
	{
		echo $ret;
		exit();
	}	
	else
		echo "no";		
}
if($action== "deleteNewsImage")
{
	$ret = COMMON :: deleteNewsImage();
	
	if($ret)
	{
		echo "ok";
		exit();
	}	
	else
		echo "no";		
}
if($action== "editNews")
{
	$ret = COMMON :: editNews();
	
	if($ret)
	{
		echo "ok";
		exit();
	}	
	else
		echo "no";		
}
//events controller
if($action == "addEvent")
{
	$ret = COMMON :: addEvent();
	
	if($ret)
	{
		echo "ok";
		exit();
	}	
	else
		echo "no";		
}
if($action== "editEvent")
{
	$ret = COMMON :: editEvent();
	
	if($ret)
	{
		echo "ok";
		exit();
	}	
	else
		echo "no";		
}

// gallery
if($action== "addGallery")
{
	$ret = COMMON :: addGallery();
	
	if($ret)
	{
		echo $ret;
		exit();
	}	
	else
		echo "no";		
}
if($action== "deleteGalleryImage")
{
	$ret = COMMON :: deleteGalleryImage();
	
	if($ret)
	{
		echo "ok";
		exit();
	}	
	else
		echo "no";		
}
if($action== "editGallery")
{
	$ret = COMMON :: editGallery();
	
	if($ret)
	{
		echo "ok";
		exit();
	}	
	else
		echo "no";		
}
if($action== "deleteGallery")
{
	$ret = COMMON :: deleteGallery();

	if($ret)
	{
		echo "ok";
		exit();
	}
	else
		echo "no";
}
if($action== "sortGallery")
{
	$ret = COMMON :: sortGallery();
	
	if($ret)
	{
		echo "ok";
		exit();
	}	
	else
		echo "no";		
}
/* Content */ 
if($action== "addContent")
{
	$ret = COMMON :: addContent();
	
	if($ret)
	{
		echo "ok";
		exit();
	}	
	else
		echo "no";		
}
if($action== "editContent")
{
	$ret = COMMON :: editContent();
	
	if($ret)
	{
		echo "ok";
		exit();
	}	
	else
		echo "no";		
}
if($action== "exportFees")
{
	$ret = COMMON :: exportFees();
	
	if($ret)
	{
		echo "ok";
		exit();
	}	
	else
		echo "no";		
}
if($action=="validatePassword")
{

	if($_REQUEST['CUR_PASSWORD']=="" && $_REQUEST['ADMIN_PASSWORD'] == "")
	{
		 echo "true";
		 exit();
	}

	$ret = COMMON :: validatePassword();
	if($ret)
	{
		echo "true";
		exit();
	}	
	else
	{
		echo "false";
		exit();
	}	
}
if($action== "saveSettings")
{
	$ret = COMMON :: saveSettings();
	
	if($ret)
	{
		echo "ok";
		exit();
	}	
	else
		echo "no";		
}

if($action == "getFeesValues")
{
	$ret = COMMON :: getFeesValues();
	echo $ret;
	exit();
}
if($action== "saveFees")
{
	$ret = COMMON :: saveFees();
	
	if($ret)
	{
		echo "ok";
		exit();
	}	
	else
		echo "no";		
}

if($action== "deleteNews")
{
	$ret = COMMON :: deleteNews();
	
	if($ret)
	{
		echo "ok";
		exit();
	}	
	else
		echo "no";		
}
if($action== "deleteEvent")
{
	$ret = COMMON :: deleteEvent();
	
	if($ret)
	{
		echo "ok";
		exit();
	}	
	else
		echo "no";		
}

?>