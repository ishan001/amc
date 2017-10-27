<?php
class STUDENT {
	static function studentLogin()
	{
		$sql = " SELECT * FROM student WHERE S_AD_ID = '".$_REQUEST['username']."' and S_PASSWORD = '".md5($_REQUEST['password'])."' ";	
		$res = MySQL :: query($sql);	
		if(MySQL :: countAffected()>0)
		{
			$row =  $res->row;
			$_SESSION['AMCB_USERID'] = $row['S_ID'];
			$_SESSION['AMCB_ADMISSION'] = $row['S_AD_ID'];
			$_SESSION['AMCB_NAME'] = $row['S_NAME'];
			$_SESSION['AMCB_GRADE'] = $row['S_GRADE'];
			$_SESSION['AMCB_USERPIC'] = $row['S_PRO_PIC'];
			
			$data = '<div class="loginDetwrapper"><div class="stuProPic"><img src="upload/students/thumb/'.$row["S_PRO_PIC"].'"  /></div><div class="stuDet"><div class="stuName">'.$row['S_NAME'].'</div><div class="stuGrade">'.$row['S_GRADE'].'</div><div class="stuAdmissionNo">Admission No : '.$row['S_AD_ID'].'</div><div class="stuLinks"><a href="student/">My Profile</a> | <a href="student/my-results.php">My Results</a> | <a href="student/my-teachers.php">My Teachers</a><br /><a href="_controller/student-controller.php?action=logout">Sign out</a></div></div></div>' ;
			return $data;
		
		}
		else
			return false;
	}
	static  function getStudentDet()
	{
		$sql = " SELECT * FROM student WHERE S_ID = ".$_SESSION['AMCB_USERID']." ";	
		$res = MySQL :: query($sql);	
		return $res->row;
	}
	static function getSubjectNameByID($SB_ID)
	{
		$sql = " SELECT SB_NAME FROM subjects WHERE SB_ID = ".$SB_ID." ";	
		$res = MySQL :: query($sql);	
		return $res->row['SB_NAME'];		
	}
	static function getStudentResults($S_ID,$SR_YEAR,$SR_TERM)
	{
		$sql = "SELECT *  FROM student_results LEFT JOIN subjects ON SB_ID = SR_SUBJECT WHERE SR_S_ID ='".$S_ID."' AND SR_YEAR = '".$SR_YEAR."' and  SR_TERM  ='".$SR_TERM."'";
		$res = MySQL :: query($sql);	
		return $res->rows;
	}	
	static function getSubjectTeacher($CLSID,$SB_ID)
	{
		$sql = "SELECT *  FROM teachers_classes LEFT JOIN teachers ON T_ID = TC_T_ID  WHERE TC_S_ID ='".$SB_ID."' AND TC_GRADE = '".$CLSID."' ";
		$res = MySQL :: query($sql);	
		return $res->row;		
	}
	static function getTeachersForClass($CLSID)
	{
		$sql = "SELECT *  FROM teachers_classes LEFT JOIN teachers ON T_ID = TC_T_ID LEFT JOIN subjects ON SB_ID = TC_S_ID  WHERE  TC_GRADE = '".$CLSID."' ";
		$res = MySQL :: query($sql);	
		return $res->rows;			
	}
	
	static function getTeacherForStudent()
	{
		$sql = " SELECT S_SUBJECTS FROM student WHERE S_ID = ".$_SESSION['AMCB_USERID']." ";	
		$res = MySQL :: query($sql);
		$subs = unserialize($res->row['S_SUBJECTS']);
		$subjecs ='';
		$last_key = end(array_keys($subs));
		foreach($subs as $key=>$sub) 
		{
			$subjecs .= $sub;
			if ($key != $last_key)
				$subjecs .= ",";
		}
		$sql = " SELECT * FROM teachers_classes LEFT JOIN teachers ON T_ID = TC_T_ID LEFT JOIN subjects ON SB_ID = TC_S_ID  WHERE TC_S_ID  in (".$subjecs.") and TC_GRADE =  '".$_SESSION['AMCB_GRADE']."' ";	
		$res = MySQL :: query($sql);
		return $res->rows;
	}
	
}
?>