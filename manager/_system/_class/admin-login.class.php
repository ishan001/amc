<?php
class ADMIN_LOGIN{
	
	static function checkLoginSuccess($ADMIN_USERNAME,$ADMIN_PASSWORD)
	{
		$sql = "SELECT * FROM administrator WHERE 	ADMIN_USERNAME ='".$ADMIN_USERNAME."' AND ADMIN_PASSWORD = '".$ADMIN_PASSWORD."' ";
		$res = MySQL :: query($sql);
		if(MySQL :: countAffected()>0)
		{
			$row = $res->row;
			//assigned variable to session for user Details
			$_SESSION['AMCB_admin_id']=$row['ADMIN_ID'];
			$_SESSION['AMCB_admin_username']=$row['ADMIN_USERNAME'];
			$_SESSION['AMCB_admin_email']=$row['ADMIN_EMAIL'];
				
				
			$_SESSION['sessid'] = session_id();
			$_SESSION['ip_ADMIN'] = $_SERVER['REMOTE_ADDR'];  // assigned Session for Server IP
			$_SESSION['isLoggedADMIN'] = true;	
			return true;			
		}
		else
			return false;
		
			
	}
	
	static function checkAttempt($user,$IPaddress)
	{
		$ret_val ="";
        $sql_name = "select LO_FAIL_USER_NAME from adminlogin_fail where LO_FAIL_USER_NAME='".$user."'";
	 	$results_name = mysql_query($sql_name);
		$count_name = mysql_num_rows($results_name);
				   
		$sql_ip = "select LO_FAIL_ID from adminlogin_fail where LO_FAIL_ID ='".$IPaddress."' ";
        $results_ip = mysql_query($sql_ip);
		$count_ip = mysql_num_rows($results_ip);
					//echo $count_name;
		if($count_name >=3 || $count_ip >=3 )
		{
			$sql_next = "select * from adminlogin_fail where LO_FAIL_USER_NAME='".$user."' OR LO_FAIL_ID ='".$IPaddress."' order by LO_FAIL_ATTEMP desc limit 1 ";
			$results_next = mysql_query($sql_next);
			$row = mysql_fetch_array($results_next);
            $diff = time() - $row['LO_FAIL_LOGIN_TIME'];
			$diff_ori = $diff / 60;
            if($diff_ori <= 5 )
			 	$ret_val = 1;
			else
				 $ret_val = 0;

		}
			  
		return $ret_val;

    }
	static function insert_loging_fail_Attempt_bolck_ip_and_name($user,$pass,$ip)
	{
		$sql_backup = "INSERT INTO  adminlogin_fail_backup_details values('','".$ip."','".$user."','".$pass."','".date("F j, Y, g:i a")."','')";
		$res = MySQL :: query($sql_backup);
	}

	static function Insert_AdminLogin_details($login_admin_id,$ip_ADMIN,$currentDate,$pw)
	{
		$insert_query ="INSERT  INTO logindetails
						VALUES('','".$login_admin_id."','".$ip_ADMIN."','".$currentDate."','".$pw."')";
        $insertResult = MySQL :: query($insert_query);
		return true ;	
	}  
	static function clearLoginFail($user)
	{
		$sql = "DELETE FROM adminlogin_fail WHERE LO_FAIL_USER_NAME='".$user."'";
		MySQL :: query($sql);
		
	}
	static function insert_loging_fail_Attempt($user,$pass,$ip)
	{
		$sql = "select * from adminlogin_fail where LO_FAIL_ID='".$ip."' OR LO_FAIL_USER_NAME ='".$user."'  order by LO_FAIL_ATTEMP        desc limit 1";
		$results = mysql_query($sql);
		if($results){
            $row = mysql_fetch_array($results);
            $curr_log_att =  $row['LO_FAIL_ATTEMP']+1;
		}
		else 
			$curr_log_att=1;
	         
		$today = time();
				
		$sql = "insert into adminlogin_fail values('".$ip."','".$user."','".$pass."','".$today ."','".$curr_log_att."')";
		mysql_query($sql);
			
		$sql_backup = "insert into adminlogin_fail_backup_details values('','".$ip."','".$user."','".$pass."','".date("F j, Y, g:i a")."','".$curr_log_att."')";
		mysql_query($sql_backup);
		return $curr_log_att;
			
	}	
	
	static function  Get_All_Administrator_Email()
	{
		$query ="SELECT ADMIN_EMAIL FROM administrator "; 
	    $result = mysql_query($query) or die("failed") ;
		$row = mysql_fetch_array($result); 
	    return $row['ADMIN_EMAIL'] ;
	}	
} // end of class

?>
