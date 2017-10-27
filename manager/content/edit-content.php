<?php 
session_start();
include_once("../_system/_config/config.php");

if(!isset($_SESSION['AMCB_admin_id']))
	header('location:index.php');
include_once(REAL_PATH."_system/_database/mysql.php");	
include_once(REAL_PATH."_system/_class/common.class.php");	
include_once(REAL_PATH."_system/_class/array.class.php");
$C_ID = $_REQUEST['C_ID'];
$CDet = COMMON :: getContentDet($C_ID);
 ?>
<!doctype html>
<!--[if lt IE 7]><html class="no-js ie6 oldie" lang=en><![endif]--><!--[if IE 7]><html class="no-js ie7 oldie" lang=en><![endif]--><!--[if IE 8]><html class="no-js ie8 oldie" lang=en><![endif]--><!--[if gt IE 8]><!--> <html class=no-js lang=en> <!--<![endif]-->

<head>
<meta charset=utf-8>
<link rel=dns-prefetch href="//fonts.googleapis.com">
<meta http-equiv=X-UA-Compatible content="IE=edge,chrome=1">
<title>Ave Maria Convent Branch  :: Update Content</title>
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
        <li><a href="<?=URL?>student" title=Home>Content</a></li>
        <li class=no-hover>Update  Content</li>
      </ul>
    </div>
    <div class="shadow-bottom shadow-titlebar"></div>
    <div id=main-content>
      <div class=container_12>
        <div class=grid_12>
          <h1>Update Content</h1>
        </div>
        <div class=grid_12>
          <div class=block-border>
            <div class=block-header> <span></span> </div>
            <form id="formStudent" class="block-content form" action="" method=post  >
			<input type="hidden" name="C_ID" value="<?=$C_ID?>" id="C_ID" >
                <fieldset>
                <legend>Content Details</legend>
                <div class=_100>
                  <p>
                   <label for=C_NAME>Title</label>
                    <input type="text" id="C_NAME" name="C_NAME" class=required value="<?=$CDet['C_NAME']?>"  />
                  </p>
                </div>
                
                               
                 <div class=_100>
                  <p>
                    <label for= C_DATA>Data</label>
                    <textarea id=C_DATA name=C_DATA  rows=5 cols=40><?=$CDet['C_DATA']?></textarea>
                    <script type="text/javascript">
					CKEDITOR.replace( 'C_DATA',
						{
							extraPlugins : 'uicolor',
							uiColor: '#d2d2d2',			
						} );
				</script>
                  </p>
                </div>
              </fieldset>
              
                            
                                           

               
                <div id="messageBox" style="margin-bottom:10px;"></div>
               
               
              
              <div class=clear ></div>
              <div class=block-actions>
                <ul class=actions-left>
                  <li><a class="button red" id=reset-validate-form href="javascript:void(0);">Reset</a></li>
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
				dataString = $("#formStudent").serialize()+'&action=editContent&C_DATA='+escape(CKEDITOR.instances.C_DATA.getData());
		$.post("../_controller/common-controller.php",dataString,
		function(data){
			//alert(data);
            $('#messageBox').removeClass().addClass('MessageBoxOkAll').html("Successfully saved.");
			$.jGrowl("Successfully saved.", { theme: 'success' });
		});
			
		}

});
		
		var validateform = $("#formStudent").validate();
			$(" input:checkbox, input:text, input:password, input:radio, input:file, textarea").uniform();
	});
clearNavMenu();
$('#nav_content').addClass('current');	
$('#nav_content_addnew').addClass('current');	
$('#nav_content').parent().addClass('expand');
</script> 

<!--[if lt IE 7 ]><script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script> <script>window.attachEvent("onload",function(){CFInstall.check({mode:"overlay"})});</script><![endif]-->
</body>
</html>