<?php

session_start();
include ("../_system/_config/config.php");
require_once(REAL_PATH.'_system/_class/common.class.php');
require_once(REAL_PATH.'_system/_database/mysql.php');
require_once(REAL_PATH.'_system/_class/image_thumb.php');

$front_name = $_FILES['uploadfile']['name'];


$key=strtolower(substr(strrchr($_FILES['uploadfile']['name'], "."), 1));
$key=str_replace("jpeg","jpg",$key);
$strName = substr($_FILES['uploadfile']['name'], 0, -strlen(".".$key)); 			
$newname=str_replace(" ","-",$front_name);
$filename = $strName.time().".".$key;

$uploadfile ="../../upload/gallery/thumb/".$filename;
createThumb($_FILES['uploadfile']['tmp_name'],$uploadfile,207,138,$key);

$uploadfile ="../../upload/gallery/".$filename;
createThumb($_FILES['uploadfile']['tmp_name'],$uploadfile,800,600,$key);

$sql = " INSERT INTO gallery_images SET  GI_G_ID = '".$_REQUEST['G_ID']."', GI_NAME  = '".$filename."' ";
$res = MySQL :: query($sql);

$id = MySQL :: getLastId();
echo $filename.",".$id;
?>