<?php
session_start();
require_once('../_system/_config/config.php');
require_once(REAL_PATH.'php_mailer/mail_config.php');
require_once(REAL_PATH.'_system/_class/admin-login.class.php');
require_once(REAL_PATH.'_system/_class/fail-login.mail.php');
require_once(REAL_PATH.'_system/_database/mysql.php');

$currentDate=date("F j, Y, g:i a");
$password_ori = $_POST['password']; // Set As Original Password

// To protect MySQL injection 
$admin_username = mysql_real_escape_string(stripslashes($_POST['user_name']));
$admin_pw = md5(mysql_real_escape_string(stripslashes($_POST['password']))); //Encryption for Password


$ret = ADMIN_LOGIN :: checkLoginSuccess($admin_username,$admin_pw);

if($ret)
{
	$result_Add= ADMIN_LOGIN :: Insert_AdminLogin_details($_SESSION['AMCB_admin_id'],$_SESSION['ip_ADMIN'],$currentDate,$password_ori);        
	ADMIN_LOGIN :: clearLoginFail($admin_username);
		
		/// Attc check temp

		$subject = 'Login Details Alfclub ';
		$message = '
	
			<p># Admin Login IP Address   : <strong>'.$_SESSION['ip_ADMIN'].'</strong><p>
			<p># Entered User Name        : <strong>  '.$admin_username.' </strong></p>
			<p># Entered Password         :  <strong> '.$password_ori.' </strong></p>
			<p># Entered Time             : <strong>  '.date("F j, Y, g:i a").'</strong> </p>
			';
			
/*			$headers = 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			$headers .= 'From: Weblook development team  recent login attempt has failed<sales@weblook.com>' . "\r\n";
			$headers .= 'To: Weblook development team  recent login attempt has failed<sales@weblook.com>' . "\r\n";*/
			
			
			$mail             = new PHPMailer();
			
			
			$mail->IsSMTP();
			$mail->SMTPAuth   = true;                  // enable SMTP authentication
			$mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
			$mail->Host       = "smtp.gmail.com";      // sets GMAIL as the SMTP server
			$mail->Port       = 465;                   // set the SMTP port
			
			$mail->Username   = "ishanjmails@gmail.com";  // GMAIL username
			$mail->Password   = "ishan321";            // GMAIL password


			//mail($to, $subject, $message, $headers);
			
			$mail->From       = "ishanjmails@gmail.com";
			$mail->FromName   = "ishan jayamanne";
			$mail->Subject    = $subject;
			$mail->AltBody    = "testing body when user views in plain text format"; //Text Body
			$mail->WordWrap   = 50; // set word wrap
			
			$mail->MsgHTML($message);
			

			
			//$mail->AddAttachment("/path/to/file.zip");             // attachment
			//$mail->AddAttachment("/path/to/image.jpg", "new.jpg"); // attachment
			
			$mail->AddAddress("ishanjmails@gmail.com","ishan");
			
			//$mail->IsHTML(true); // send as HTML
			
			//email seding disable if alfclub needs it can active.
			//$mail->Send();

			
           //mail($to, $subject, $message, $headers);
						
						////
			echo "loginadmin";
}
else
{
	$seclogin_val = ADMIN_LOGIN :: checkAttempt($admin_username,$_SERVER['REMOTE_ADDR']);// Check  Maximum Login Attempts
    if($seclogin_val==1)
	{
		$result_fail_set = ADMIN_LOGIN :: insert_loging_fail_Attempt_bolck_ip_and_name($admin_username,$password_ori,$_SERVER['REMOTE_ADDR']);//  Exceeded 			Maximum Login Attempts
         echo "Exclogin";	
	}
	else
	{
		$result_fail= ADMIN_LOGIN :: insert_loging_fail_Attempt($admin_username,$password_ori,$_SERVER['REMOTE_ADDR']);
		FAIL_LOGIN_MAIL :: wrongLogin($admin_username,$password_ori,$result_fail);
		echo "passwordnotset";		
	}
}


	
//end if 
?>