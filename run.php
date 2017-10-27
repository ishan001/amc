<?php

include_once("_system/_config/config.php");
$location = "H";

include_once(REAL_PATH."_system/_database/mysql.php");
require_once(REAL_PATH.'_system/_class/common.class.php');

 	$sql = " SELECT * FROM student  ";
		$res = MySQL :: query($sql);
		foreach($res->rows as $row)
		{
		  	$sql2 = " UPDATE student SET  S_PRO_PIC = '". $row['S_AD_ID'].".jpg' WHERE S_ID = '". $row['S_ID']."'  ";
            MySQL :: query($sql2);
		}
?>