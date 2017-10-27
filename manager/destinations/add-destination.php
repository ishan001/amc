<?php 
session_start();
include_once("../_system/_config/config.php");
if(!isset($_SESSION['travelnetwork_admin_id']))
	header('location:index.php');

require_once(REAL_PATH.'_system/_class/destination.class.php');
require_once(REAL_PATH.'_system/_database/mysql.php');

//$cnts = ACCOMMODATION :: getCountries();
?>
<!doctype html>
<!--[if lt IE 7]><html class="no-js ie6 oldie" lang=en><![endif]--><!--[if IE 7]><html class="no-js ie7 oldie" lang=en><![endif]--><!--[if IE 8]><html class="no-js ie8 oldie" lang=en><![endif]--><!--[if gt IE 8]><!--> <html class=no-js lang=en> <!--<![endif]-->

<head>
<meta charset=utf-8>
<link rel=dns-prefetch href="//fonts.googleapis.com">
<meta http-equiv=X-UA-Compatible content="IE=edge,chrome=1">
<title>Add New Destination :: Travel Network</title>
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
        <li><a href="home.php" title=Home><span id=bc-home></span></a></li>
        <li class=no-hover>Add Destination</li>
      </ul>
    </div>
    <div class="shadow-bottom shadow-titlebar"></div>
    <div id=main-content>
      <div class=container_12>
        <div class=grid_12>
          <h1>Add New Destination</h1>
        </div>
        <div class=grid_12>
          <div class=block-border>
            <div class=block-header> <span></span> </div>
            <form id="formAddDesti" class="block-content form" action="" method=post>
              <fieldset>
                <legend>Destination Details</legend>
                <div class=_50>
                  <p>
                   <label for=D_NAME>Destination Name</label>
                    <input id=D_NAME type=text  name="D_NAME" class=required />
                  </p>
                </div>
                <div class=_50>
                  <p>
                    <label for=D_TIME>Destination Time</label>
                    <input id=D_TIME type=text  name="D_TIME" class=required />
                  </p>
                </div>
                <div class=_50>
                  <p>
                    <label for=D_CAPITAL>Capital</label>
                    <input id=D_CAPITAL type=text value="" name=D_CAPITAL class=required   />
                  </p>
                </div>
                <div class=_50>
                  <p>
                  <label for=D_LANGUAGE>Official Language</label>
                    <input id=D_LANGUAGE name=D_LANGUAGE type=text value="" class=required />
                    
                  </p>
                </div>
               
                
                <div class=_50>
                  <p>
                    <label for=D_POPULATION>Population</label>
                    <input id=D_POPULATION name=D_POPULATION  type=text value=""/>
                  </p>
                </div>
                
                <div class=_50>
                  <p>
                    <label for=D_CURRENCY>Currency</label>
                    <input id=D_CURRENCY name=D_CURRENCY  type=text value=""/>
                  </p>
                </div>
                 <div class=_50>
                  <p>
                    <label for=D_INDUSTRIES>Major industries</label>
                     <textarea id=D_INDUSTRIES name=D_INDUSTRIES  rows=5 cols=40></textarea>
                  </p>
                </div>
                 <div class=_50>
                  <p>
                    <label for=D_ELECTRICITY>Electricity</label>
                    <input id=D_ELECTRICITY name=D_ELECTRICITY  type=text value=""/>
                  </p>
                </div>
              </fieldset>
              
              <fieldset>
                <legend>Other Details</legend>
                <div class=_100>
                  <p>
                    <label for=D_OVERVIEW>Overview</label>
                    <textarea id=D_OVERVIEW name=D_OVERVIEW  rows=5 cols=40></textarea>
                    <script type="text/javascript">
					CKEDITOR.replace( 'D_OVERVIEW',
						{
							extraPlugins : 'uicolor',
							uiColor: '#d2d2d2',
							toolbar : 'Basic',			
						} );
				</script>
                  </p>
                </div>
                <div class=_100>
                  <p>
                    <label for=D_HISTORY>History & Culture</label>
                    <textarea id=D_HISTORY name=D_HISTORY rows=5 cols=40></textarea>
                    <script type="text/javascript">
					CKEDITOR.replace( 'D_HISTORY',
						{
							extraPlugins : 'uicolor',
							uiColor: '#d2d2d2',
							toolbar : 'Basic',			
						} );
				</script>
                  </p>
                </div>
                <div class=_100>
                  <p>
                    <label for=D_PLACES>Places to See</label>
                    <textarea id=D_PLACES name=D_PLACES rows=5 cols=40></textarea>
                    <script type="text/javascript">
					CKEDITOR.replace( 'D_PLACES',
						{
							extraPlugins : 'uicolor',
							uiColor: '#d2d2d2',
							toolbar : 'Basic',			
						} );
				</script>
                  </p>
                </div>
                <div class=_100>
                  <p>
                    <label for=D_PLACETOEAT>Where to Eat</label>
                    <textarea id=D_PLACETOEAT name=D_PLACETOEAT rows=5 cols=40></textarea>
                    <script type="text/javascript">
					CKEDITOR.replace( 'D_PLACETOEAT',
						{
							extraPlugins : 'uicolor',
							uiColor: '#d2d2d2',
							toolbar : 'Basic',			
						} );
				</script>
                  </p>
                </div>
                <div class=_100>
                  <p>
                    <label for=D_SHOPPING>Where to Shop</label>
                    <textarea id=D_SHOPPING name=D_SHOPPING  rows=5 cols=40></textarea>
                    <script type="text/javascript">
					CKEDITOR.replace( 'D_SHOPPING',
						{
							extraPlugins : 'uicolor',
							uiColor: '#d2d2d2',
							toolbar : 'Basic',			
						} );
				</script>
                  </p>
                </div>
                <div class=_100>
                  <div id="messageBox"></div>
                </div>
              </fieldset>
              <div class=clear></div>
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
<script src="<?=URL?>js/jquery.min.js"></script> 
<script src='<?=URL?>js/common.js'></script> 
<script defer src='<?=URL?>js/main.js'></script> 


<script language="javascript">
	$().ready(function() {
		$.validator.setDefaults({
			submitHandler: function(e) {
				$('#messageBox').removeClass().addClass('MessageBoxWarningAll').html("Adding...");
				$.post("../_controller/destination-controller.php",{action:'addDestination',D_OVERVIEW:CKEDITOR.instances.D_OVERVIEW.getData(),D_HISTORY:CKEDITOR.instances.D_HISTORY.getData(),D_PLACES:CKEDITOR.instances.D_PLACES.getData(),D_PLACETOEAT:CKEDITOR.instances.D_PLACETOEAT.getData(),D_SHOPPING:CKEDITOR.instances.D_SHOPPING.getData(), D_NAME:$('#D_NAME').val(), D_TIME:$('#D_TIME').val(), D_CAPITAL:$('#D_CAPITAL').val(), D_LANGUAGE:$('#D_LANGUAGE').val(), D_POPULATION:$('#D_POPULATION').val(), D_INDUSTRIES:$('#D_INDUSTRIES').val(), D_CURRENCY:$('#D_CURRENCY').val(), D_ELECTRICITY:$('#D_ELECTRICITY').val()},function(data)

			{
//alert(data);
				if(data!="no")
						$('#messageBox').removeClass().addClass('MessageBoxOkAll').html("Successfully added.");
						window.location = "upload-images.php?D_ID="+data;

			});
				
			}
			
		});
		
		var validateform = $("#formAddDesti").validate();
			$("select, input:checkbox, input:text, input:password, input:radio, input:file, textarea").uniform();
	});
clearNavMenu();
$('#nav_desti').addClass('current');	
$('#nav_desti_addnew').addClass('current');	
$('#nav_desti').parent().addClass('expand');
</script> 

<!--[if lt IE 7 ]><script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script> <script>window.attachEvent("onload",function(){CFInstall.check({mode:"overlay"})});</script><![endif]-->
</body>
</html>