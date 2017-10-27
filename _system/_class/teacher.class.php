<?php
class TEACHER {
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
	static  function getTeacherClassDet($T_ID)
	{
		$sql = " SELECT * FROM teachers_classes WHERE TC_T_ID = $T_ID  ";	
		$res = MySQL :: query($sql);	
		return $res->rows;		
	}
	static function getEditClassTeacherSubs($T_ID)
	{
		$sql = " SELECT DISTINCT(TC_S_ID),SB_NAME FROM teachers_classes LEFT JOIN subjects ON SB_ID = TC_S_ID WHERE TC_T_ID = $T_ID ";	
		$res = MySQL :: query($sql);	
		return $res->rows;					
	}
	static function getTeacherClassDetBySub($S_ID,$T_ID)
	{
		$sql = " SELECT * FROM teachers_classes WHERE TC_T_ID = $T_ID AND  TC_S_ID = $S_ID";
		$res = MySQL :: query($sql);	
		return $res->rows;			
	}
	static function editTeacher()
	{
		$sql = "UPDATE teachers SET   T_NAME = '".$_REQUEST['T_NAME']."', T_JOINED_DATE = '".$_REQUEST['T_JOINED_DATE']."' ,T_CLASS_TECH = '".$_REQUEST['T_CLASS_TECH']."',T_DESCRIPTION = '".$_REQUEST['T_DESCRIPTION2']."',  T_QUALIFICATION = '".$_REQUEST['T_QUALIFICATION']."' ,  	T_PRO_PIC = '".$_SESSION['teacherProImg']."' WHERE T_ID = '".$_REQUEST['T_ID']."' ";
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
		return true;	
	}
}
?>