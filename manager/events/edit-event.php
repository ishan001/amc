<?php 
session_start();
include_once("../_system/_config/config.php");
if(!isset($_SESSION['AMCB_admin_id']))
	header('location:index.php');

include_once(REAL_PATH."_system/_database/mysql.php");	
include_once(REAL_PATH."_system/_class/common.class.php");	
include_once(REAL_PATH."_system/_class/array.class.php");

$E_ID = (int) $_REQUEST['E_ID'];
$eventDet = COMMON :: getEventDet($E_ID); 

unset($_SESSION['EvntupImg']);

?>
<!doctype html>
<!--[if lt IE 7]><html class="no-js ie6 oldie" lang=en><![endif]--><!--[if IE 7]><html class="no-js ie7 oldie" lang=en><![endif]--><!--[if IE 8]><html class="no-js ie8 oldie" lang=en><![endif]--><!--[if gt IE 8]><!--> <html class=no-js lang=en> <!--<![endif]-->

<head>
<meta charset=utf-8>
<link rel=dns-prefetch href="//fonts.googleapis.com">
<meta http-equiv=X-UA-Compatible content="IE=edge,chrome=1">
<title>Ave Maria Convent Branch  :: Update  Event</title>
<link href="favicon.ico" rel="shortcut icon"/>
<meta name=description content="">
<meta name=author content="">
<meta name=viewport content="width=device-width,initial-scale=1">
<style type="text/css" media="screen">
@import url("<?=URL?>css/main.css");
@import url("<?=URL?>css/message_styles.css");
.ui-timepicker-div .ui-widget-header { margin-bottom: 8px; }
.ui-timepicker-div dl { text-align: left; }
.ui-timepicker-div dl dt { height: 25px; margin-bottom: -25px; }
.ui-timepicker-div dl dd { margin: 0 10px 10px 65px; }
.ui-timepicker-div td { font-size: 90%; }
.ui-tpicker-grid-label { background: none; border: none; margin: 0; padding: 0; }
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
        <li><a href="<?=URL?>events" title=Home>Events</a></li>
        <li class=no-hover>Update  Event</li>
      </ul>
    </div>
    <div class="shadow-bottom shadow-titlebar"></div>
    <div id=main-content>
      <div class=container_12>
        <div class=grid_12>
          <h1>Update Upcoming Event</h1>
        </div>
        <div class=grid_12>
          <div class=block-border>
            <div class=block-header> <span></span> </div>
            <form id="formEvent" class="block-content form" action="" method=post  >
		  <input type="hidden" name="E_ID" id="E_ID" value="<?=$E_ID?>" >
              <fieldset>
                <legend>Event Details</legend>
                <div class=_50>
                  <p>
                   <label for=N_TITLE>Title</label>
                    <input type="text" id="E_TITLE" name="E_TITLE" class=required  value="<?=$eventDet['E_TITLE']?>" />
                  </p>
                </div>
                <div class=_50>
                  <p>
                   <label for=N_DATE>Date</label>
                    <input type="text" id="E_DATE" name="E_DATE" class=required  value="<?=$eventDet['E_DATE']?>" />
                  </p>
                </div>
                <div class=_50>
                  <p>
                   <label for=T_JOINED_DATE>Event Image</label>
 <input id="fileToUpload" type="file" size="45" name="fileToUpload" class="input"><button class="button" id="buttonUpload" onClick="return ajaxFileUpload();" style="height:26px;" >Upload</button>
 
 

                  </p>
                </div>
                <div class=_50>
                  <p>
                   <label for=N_TITLE>Location</label>
                    <input type="text" id="E_LOCATION" name="E_LOCATION" class=required  value="<?=$eventDet['E_LOCATION']?>" />
                  </p>
                </div>
                
                <div class=_100>
                <div id='preview'>
                <img id="evntImg" src="../../upload/events/<?=$eventDet['E_IMAGE']?>" style="max-width:300px;" >	
 				<img id="loading" src="../images/loader.gif" style="display:none;">
</div>
                </div>

                 <div class=_100>
                  <p>
                    <label for= E_DESCRIPTION>Description</label>
                    <textarea id=E_DESCRIPTION name=E_DESCRIPTION  rows=5 cols=40><?=$eventDet['E_DESCRIPTION']?></textarea>
                    <script type="text/javascript">
					CKEDITOR.replace( 'E_DESCRIPTION',
						{
							extraPlugins : 'uicolor',
							uiColor: '#d2d2d2',			
						} );
				</script>
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
<script defer src='<?=URL?>js/jquery-ui-timepicker-addon.js'></script> 
<script type="text/javascript" src="<?=URL?>js/ajaxfileupload.js"></script>
<script type="text/javascript" >
function ajaxFileUpload()
	{
		$("#loading")
		.ajaxStart(function(){
			$(this).show();
		})
		.ajaxComplete(function(){
			$(this).hide();
		});

		$.ajaxFileUpload
		(
			{
				url:'upload-file.php',
				secureuri:false,
				fileElementId:'fileToUpload',
				dataType: 'json',
				data:{name:'logan', id:'id'},
				success: function (data, status)
				{
					alert(data.msg);
					if(typeof(data.error) != 'undefined')
					{
						if(data.error != '')
						{
							alert(data.error);
						}else
						{
							$('#preview').html(' <img  src="../../upload/events/'+data.msg+'"  style="max-width:300px;" >');
							//alert(data.msg);
						}
					}
				},
				error: function (data, status, e)
				{
					alert(e);
				}
			}
		)
		
		return false;

	}
</script>


<script language="javascript">
$().ready(function() {
		$.validator.setDefaults({
			submitHandler: function(e) {
				$('#messageBox').removeClass().addClass('MessageBoxWarningAll').html("Saving...");
				dataString = $("#formEvent").serialize()+'&E_DESCRIPTION2='+CKEDITOR.instances.E_DESCRIPTION.getData()+'&action=editEvent';
		$.post("../_controller/common-controller.php",dataString,
		function(data){
			//alert(data);
            $('#messageBox').removeClass().addClass('MessageBoxOkAll').html("Successfully saved.");
			$.jGrowl("Successfully saved.", { theme: 'success' });
		});
			
		}
		
			
});
$( "#E_DATE" ).datetimepicker({
	
    minDate: new Date(<?=date("Y")?>, <?=date("m")-1?>, <?=date("d")?>),
  });;			
		var validateform = $("#formEvent").validate();
			$(" input:checkbox, input:text, input:password, input:radio, input:file, textarea").uniform();
	});
clearNavMenu();
$('#nav_events').addClass('current');	
$('#nav_event_addnew').addClass('current');	
$('#nav_events').parent().addClass('expand');
</script> 

<!--[if lt IE 7 ]><script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script> <script>window.attachEvent("onload",function(){CFInstall.check({mode:"overlay"})});</script><![endif]-->
</body>
</html>