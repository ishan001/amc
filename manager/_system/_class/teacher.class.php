<?php
class TEACHER {
	static function addTeacher($subary)
	{
		$sql = "INSERT INTO teachers SET   T_NAME = '".$_REQUEST['T_NAME']."', T_JOINED_DATE = '".$_REQUEST['T_JOINED_DATE']."' ,T_CLASS_TECH = '".$_REQUEST['T_CLASS_TECH']."',T_DESCRIPTION = '".MySQL :: escape($_REQUEST['T_DESCRIPTION'])."',  T_QUALIFICATION = '".$_REQUEST['T_QUALIFICATION']."',  	T_PRO_PIC = '".$_SESSION['teacherProImg']."' , T_CONTACT = '".$_REQUEST['T_CONTACT']."', T_EMAIL = '".$_REQUEST['T_EMAIL']."',  T_ACTIVE=1 ";
		$res = MySQL :: query($sql);	
		$T_ID = MySQL :: getLastId();	
		
		for($k=1;$k<5;$k++)
		{
			$ary = $_REQUEST['grades'.$k];
			for($i=0;$i<count($ary);$i++)
			{
				$sql = " INSERT INTO teachers_classes SET  TC_T_ID = '".$T_ID."', TC_S_ID = '".$_REQUEST['subject'.$k]."', TC_GRADE = '".$ary[$i]."'";	
				$res = MySQL :: query($sql);
			}
		}
		unset($_SESSION['teacherProImg']);
		if(is_array($subary)) { 
			for($i=0;$i<count($subary);$i++)
			{
				$sql = " INSERT INTO teachers_classes SET  TC_T_ID = '".$T_ID."', TC_S_ID = '".$subary[$i]."', TC_GRADE = '".$_REQUEST['T_CLASS_TECH']."'";	
				$res = MySQL :: query($sql);
				
			}
		}
		return true;
			
	}
	static  function getAllTeachers()
	{
		$sql = " SELECT * FROM teachers ";	
		$res = MySQL :: query($sql);	
		return $res->rows;		
	}
	static  function getTeacherDet($T_ID)
	{
		$sql = " SELECT * FROM teachers WHERE T_ID = $T_ID ";	
		$res = MySQL :: query($sql);	
		return $res->row;
	}
	static  function getTeacherClassDet($T_ID,$TC_S_ID)
	{
		$sql = " SELECT * FROM teachers_classes WHERE TC_T_ID = $T_ID AND TC_S_ID = $TC_S_ID ";	
		$res = MySQL :: query($sql);	
		return $res->rows;		
	}
	static function getEditClassTeacherSubs($T_ID)
	{
		$sql = " SELECT DISTINCT(TC_S_ID) FROM teachers_classes WHERE TC_T_ID = $T_ID ";	
		$res = MySQL :: query($sql);	
		return $res->rows;					
	}
	static function editTeacher($subary)
	{
		$sql = "UPDATE teachers SET   T_NAME = '".MySQL :: escape($_REQUEST['T_NAME'])."', T_JOINED_DATE = '".$_REQUEST['T_JOINED_DATE']."' ,T_CLASS_TECH = '".$_REQUEST['T_CLASS_TECH']."',T_DESCRIPTION = '".MySQL :: escape($_REQUEST['T_DESCRIPTION'])."',  T_QUALIFICATION = '".MySQL :: escape($_REQUEST['T_QUALIFICATION'])."' , T_CONTACT = '".$_REQUEST['T_CONTACT']."', T_EMAIL = '".$_REQUEST['T_EMAIL']."' ";
		
		if($_SESSION['teacherProImg'])
			$sql .= " , T_PRO_PIC = '".$_SESSION['teacherProImg']."' ";
		$sql .=" WHERE T_ID = '".$_REQUEST['T_ID']."' ";
		$res = MySQL :: query($sql);	
		$T_ID = $_REQUEST['T_ID'];	
		
		$sql = "DELETE FROM teachers_classes WHERE TC_T_ID = '".$T_ID."'";
		$res = MySQL :: query($sql);
		
		for($k=1;$k<5;$k++)
		{
			$ary = $_REQUEST['grades'.$k];
			for($i=0;$i<count($ary);$i++)
			{
				$sql = " INSERT INTO teachers_classes SET  TC_T_ID = '".$T_ID."', TC_S_ID = '".$_REQUEST['subject'.$k]."', TC_GRADE = '".$ary[$i]."'";	
				$res = MySQL :: query($sql);
			}
		}	
		unset($_SESSION['teacherProImg']);
		if(is_array($subary)) { 
			for($i=0;$i<count($subary);$i++)
			{
				$sql = " INSERT INTO teachers_classes SET  TC_T_ID = '".$T_ID."', TC_S_ID = '".$subary[$i]."', TC_GRADE = '".$_REQUEST['T_CLASS_TECH']."'";	
				$res = MySQL :: query($sql);
				
			}
		}

		return true;	
	}
	static function validateTeacher()
	{
		$sql = " SELECT T_NAME FROM teachers WHERE T_NAME = '".$_REQUEST['T_NAME']."' " ;
		$res = MySQL :: query($sql);	
		if(MySQL :: countAffected()>0)
			return true;
		else
			return false;
	}
}
?>