<?php
class FAIL_LOGIN_MAIL{
	
		
	static function wrongLogin($user,$pass,$curr_log_att){

		$ip = $_SERVER['REMOTE_ADDR'];
		
		 $get_rusalt = new ADMIN_LOGIN;
               $ADMIN_EMAIL= ADMIN_LOGIN :: Get_All_Administrator_Email();

		// check weather currunt user exsists , if so ,get the last login attempt
			$to = $ADMIN_EMAIL;
			$subject = 'Alert from Alfclub – panel log in attempt failure';
			$message = '
			
			<p><strong>A recent login attempt has failed. The Details of the Failed Login are as follows</strong>
			<br /><br />
	
			<p># Admin Login IP Address   : <strong>'.$ip.'</strong><p>
			<p># Entered User Name        : <strong>  '.$user.' </strong></p>
			<p># Entered Password         :  <strong> '.$pass.' </strong></p>
			<p># Entered Time             : <strong>  '.date("F j, Y, g:i a").'</strong> </p>
			<p># Number of Failed Attempts: <strong>'.$curr_log_att.'</strong></p><br><br>
			This is a '.$curr_log_att.' log –in attempt and it has failed due to the use of incorrect username/password.  Please contact admin if you believe this to be crucial 
			
			
			
			<p>Abuse Reporter</p>
			</p>Alfclub-Administrator</p>		
			
 			<p><strong> ALfclub development team - on  '.date("F j, Y, g:i a").'</strong>.</p>
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
			
			$mail->From       = "info@alfclub.co";
			$mail->FromName   = "ishan jayamanne";
			$mail->Subject    = $subject;
			$mail->WordWrap   = 50; // set word wrap
			
			$mail->MsgHTML($message);
			
			
			//$mail->AddAttachment("/path/to/file.zip");             // attachment
			//$mail->AddAttachment("/path/to/image.jpg", "new.jpg"); // attachment
			
			$mail->AddAddress($ADMIN_EMAIL,"ishan");
			
			$mail->IsHTML(true); // send as HTML
			
			$mail->Send();
			
	
			
    // if user not already exsists
		
	}// end of function
} // end of class


?>