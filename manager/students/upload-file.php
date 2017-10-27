<?php
session_start();
include ("../_system/_config/config.php");
require_once(REAL_PATH.'_system/_database/mysql.php');
require_once(REAL_PATH.'_system/_class/image_thumb.php');
require_once(REAL_PATH.'_system/_class/thumbnail.php');

$fileElementName = 'fileToUpload';
if(!empty($_FILES[$fileElementName]['error']))
	{
		switch($_FILES[$fileElementName]['error'])
		{

			case '1':
				$error = 'The uploaded file exceeds the upload_max_filesize directive in php.ini';
				break;
			case '2':
				$error = 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form';
				break;
			case '3':
				$error = 'The uploaded file was only partially uploaded';
				break;
			case '4':
				$error = 'No file was uploaded.';
				break;

			case '6':
				$error = 'Missing a temporary folder';
				break;
			case '7':
				$error = 'Failed to write file to disk';
				break;
			case '8':
				$error = 'File upload stopped by extension';
				break;
			case '999':
			default:
				$error = 'No error code avaiable';
		}
	}elseif(empty($_FILES['fileToUpload']['tmp_name']) || $_FILES['fileToUpload']['tmp_name'] == 'none')
	{
		$error = 'No file was uploaded..';
	}else 
	{
			
			$front_name = $_FILES['fileToUpload']['name'];
			
			$key=strtolower(substr(strrchr($_FILES['fileToUpload']['name'], "."), 1));
			$key=str_replace("jpeg","jpg",$key);
			$strName = substr($_FILES['fileToUpload']['name'], 0, -strlen(".".$key)); 			
			$newname=str_replace(" ","-",$front_name);
			$filename = $strName.time().".".$key;
			
			$uploadfile ="../../upload/students/thumb/".$filename;
			createExactThumb($_FILES['fileToUpload']['tmp_name'],$uploadfile,125,125,$key);
			//createThumb($_FILES['fileToUpload']['tmp_name'],$uploadfile,75,75,$key);
			
			
			$uploadfile ="../../upload/students/".$filename;
			createThumb($_FILES['fileToUpload']['tmp_name'],$uploadfile,150,200,$key);
			$msg .= $filename;
			$_SESSION['studentProImg'] = $filename;

	}		
	echo "{";
	echo				"error: '" . $error . "',\n";
	echo				"msg: '" . $msg . "'\n";
	echo "}";
	


?>