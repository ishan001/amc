<?php 
session_start();
include_once("_system/_config/config.php");
if(isset($_SESSION['AMCB_admin_id']))
	header('location:home.php');

?>
<!doctype html>

<!--[if lt IE 7]><html class="no-js ie6 oldie" lang=en><![endif]--><!--[if IE 7]><html class="no-js ie7 oldie" lang=en><![endif]--><!--[if IE 8]><html class="no-js ie8 oldie" lang=en><![endif]--><!--[if gt IE 8]><!--> <html class=no-js lang=en> <!--<![endif]-->
<head>
<meta charset=utf-8>
<link rel=dns-prefetch href="//fonts.googleapis.com">
<meta http-equiv=X-UA-Compatible content="IE=edge,chrome=1">
<title>Login :: Ave Maria Branch School Admin Panel</title>
<link href="favicon.ico" rel="shortcut icon"/>
<meta name=description content="">
<meta name=author content="">
<meta name=viewport content="width=device-width,initial-scale=1">
<link rel=stylesheet href='css/main.css'>
<link href="//fonts.googleapis.com/css?family=PT+Sans" rel=stylesheet type="text/css">
<script src="js/libs/modernizr-2.0.6.min.js"></script>
</head>
<body class=special-page>
<div id=container>
  <section id=login-box>
    <div class=block-border>
      <div class=block-header>
        <h1>Login</h1>
      </div>
      <form id=login-form class="block-content form" action="#" method=post>
        <p class=inline-small-label>
          <label for=username>Username</label>
          <input type=text name=username id="username" value="" class=required>
        </p>
        <p class=inline-small-label>
          <label for=password>Password</label>
          <input type=password name=password id="password" value="" class=required>
        </p>
        <p>
          <label>
            <input type=checkbox name=keep_logged />
            Auto-login in future.</label>
        </p>
        <div class=clear></div>
        <div class=block-actions>
          <ul class=actions-left>
            <li><a class=button name=recover_password href="javascript:void(0);">Recover Password</a></li>
            <li class=divider-vertical></li>
            <li><a class="button red" id=reset-login href="javascript:void(0);">Cancel</a></li>
          </ul>
          <ul class=actions-right>
            <li>
              <input type=submit class=button value=Login>
            </li>
          </ul>
        </div>
      </form>
    </div>
  </section>
</div>
<script src="js/jquery.min.js"></script> 
<script defer src='js/main.js'></script> 
<script language="javascript" >
	$().ready(function() {
		$.validator.setDefaults({
			submitHandler: function(e) {
				$.post("_controller/common-controller.php",{action:'userLogin',user_name:$('#username').val(),password:$('#password').val()},function(data)
		{
			//alert(data);
				if(data=='ok'){
				
				var message ='Successfully Login to Cpanel ';
				$('#login-form').alertBox(message, {type: 'success'});
				window.location.href = 'home.php';
				}
				else {
					var message ='Password or Username is not Correct! ';
					$('#login-form').alertBox(message, {type: 'error'});
				}			
		});
				
			}
		});
		
		var validatelogin = $("#login-form").validate({
			invalidHandler: function(form, validator) {
      			var errors = validator.numberOfInvalids();
      			if (errors) {
        			var message = errors == 1
			          ? 'You missed 1 field. It has been highlighted.'
			          : 'You missed ' + errors + ' fields. They have been highlighted.';
        			$('#login-form').removeAlertBoxes();
        			$('#login-form').alertBox(message, {type: 'error'});
        			
      			} else {
       			 	$('#login-form').removeAlertBoxes();
      			}
    		}
		});
	});
	
</script>
<!--[if lt IE 7 ]><script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script> <script>window.attachEvent("onload",function(){CFInstall.check({mode:"overlay"})});</script><![endif]-->
</body>
</html>