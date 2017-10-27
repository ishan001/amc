<?php 
session_start();
include_once("_system/_config/config.php");
if(!isset($_SESSION['AMCB_admin_id']))
	header('location:index.php');

include_once(REAL_PATH."_system/_database/mysql.php");	
include_once(REAL_PATH."_system/_class/common.class.php");	

$user = COMMON :: getUserDetails();

 ?>
<!doctype html>
<!--[if lt IE 7]><html class="no-js ie6 oldie" lang=en><![endif]--><!--[if IE 7]><html class="no-js ie7 oldie" lang=en><![endif]--><!--[if IE 8]><html class="no-js ie8 oldie" lang=en><![endif]--><!--[if gt IE 8]><!--> <html class=no-js lang=en> <!--<![endif]-->

<head>
<meta charset=utf-8>
<link rel=dns-prefetch href="//fonts.googleapis.com">
<meta http-equiv=X-UA-Compatible content="IE=edge,chrome=1">
<title>Ave Maria Convent Branch  :: My Settings</title>
<link href="favicon.ico" rel="shortcut icon"/>
<meta name=description content="">
<meta name=author content="">
<meta name=viewport content="width=device-width,initial-scale=1">
<style type="text/css" media="screen">
@import url("<?=URL?>css/main.css");
@import url("<?=URL?>css/message_styles.css");
</style>
<link href="//fonts.googleapis.com/css?family=PT+Sans" rel=stylesheet type="text/css">
<script src="<?=URL?>js/libs/modernizr-2.0.6.min.js"></script>
<script type="text/javascript" src="<?=URL?>ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="<?=URL?>ckfinder/ckfinder.js"></script>

</head>
<body id=top>
<div id=container>
  <?php include_once(REAL_PATH."_system/_includes/header-surround.php");?>
  <div class=fix-shadow-bottom-height></div>
  <?php include_once(REAL_PATH."_system/_includes/slidebar.php");?>
  <div id=main role=main>
    <div id=title-bar>
      <ul id=breadcrumbs>
        <li><a href="<?=URL?>home.php" title=Home><span id=bc-home></span></a></li>
        <li class=no-hover>Settings</li>
      </ul>
    </div>
    <div class="shadow-bottom shadow-titlebar"></div>
    <div id=main-content>
      <div class=container_12>
        <div class=grid_12>
          <h1>Settings</h1>
        </div>
        <div class=grid_12>
          <div class=block-border>
            <div class=block-header> <span></span> </div>
            <form id="formSettings" class="block-content form" action="" method=post  >

              <fieldset>
                <legend>Settings</legend>
                <div class=_50>
                  <p>
                   <label for=ADMIN_NAME>Name</label>
                    <input type="text" id="ADMIN_NAME" name="ADMIN_NAME" class=required value="<?=$user['ADMIN_NAME']?>"  />
                  </p>
                </div>
                <div class=_50>
                  <p>
                   <label for=ADMIN_EMAIL>Email</label>
                    <input type="text" id="ADMIN_EMAIL" name="ADMIN_EMAIL" class=required value="<?=$user['ADMIN_EMAIL']?>"  />
                  </p>
                </div>

              </fieldset>
			  <fieldset>
                <legend>Change Password (Keep it blank if you don't want to change it)</legend>
                <div class=_100>
                  <p>
                   <label for=CUR_PASSWORD>Current Password</label>
                    <input type="password" id="CUR_PASSWORD" name="CUR_PASSWORD"   />
                  </p>
                </div>
                <div class=_100>
                  <p>
                   <label for=ADMIN_PASSWORD>New Password</label>
                    <input type="password" id="ADMIN_PASSWORD" name="ADMIN_PASSWORD"   />
                  </p>
                </div>
                <div class=_100>
                  <p>
                   <label for=CON_ADMIN_PASSWORD>Confirm Password</label>
                    <input type="password" id="CON_ADMIN_PASSWORD" name="CON_ADMIN_PASSWORD"   />
                  </p>
                </div>
                

                
                
                  
              </fieldset>
                <div id="messageBox" style="margin-bottom:10px;"></div>

              <div class=clear></div>
              <div class=block-actions>
                <ul class=actions-left>
                  <li></li>
                </ul>
                <ul class=actions-right>
                  <li>
                    <input type=submit class=button value=" Save ">
                  </li>
                </ul>
              </div>
            </form>
          </div>
        </div>
        <div class="clear height-fix"></div>
      </div>
    </div>
  </div>
  <?php include_once(REAL_PATH."_system/_includes/footer.php");?>
</div>
<script src="<?=URL?>js/jquery.js"></script> 
<script src='<?=URL?>js/common.js'></script> 
<script defer src='<?=URL?>js/main.js'></script> 


<script language="javascript">
$().ready(function() {
		$.validator.setDefaults({
			submitHandler: function(e) {
				$('#messageBox').removeClass().addClass('MessageBoxWarningAll').html("Saving...");
				dataString = $("#formSettings").serialize()+'&action=saveSettings';
		$.post("_controller/common-controller.php",dataString,
		function(data){
			//alert(data);
            $('#messageBox').removeClass().addClass('MessageBoxOkAll').html("Successfully saved.");
			$.jGrowl("Successfully saved.", { theme: 'success' });

		});
			
		}
		
			
});
$( "#N_DATE" ).datepicker();			
		var validateform = $("#formSettings").validate({
        	rules: {
				 CON_ADMIN_PASSWORD :{
     				 equalTo: "#ADMIN_PASSWORD"
    			},
				CUR_PASSWORD: { remote: "_controller/common-controller.php?action=validatePassword" } ,
        	},
			
			messages: {
				 CON_ADMIN_PASSWORD : { equalTo: "Password should be same"},
				 CUR_PASSWORD: { remote: "Invalid Current Password"},


    		}
			
    	});
			$(" input:checkbox, input:text, input:password, input:radio, input:file, textarea").uniform();
	});
clearNavMenu();

</script> 

<!--[if lt IE 7 ]><script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script> <script>window.attachEvent("onload",function(){CFInstall.check({mode:"overlay"})});</script><![endif]-->
</body>
</html>