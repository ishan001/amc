<?php 
session_start();
include_once("../_system/_config/config.php");
if(!isset($_SESSION['travelnetwork_admin_id']))
	header('location:index.php');

require_once(REAL_PATH.'_system/_class/accommodation.class.php');
require_once(REAL_PATH.'_system/_database/mysql.php');

$H_ID = (int) $_REQUEST['H_ID'];
$cnts = ACCOMMODATION :: getCountries();
$HDet = ACCOMMODATION :: getHoteldet($H_ID);
?>
<!doctype html>
<!--[if lt IE 7]><html class="no-js ie6 oldie" lang=en><![endif]--><!--[if IE 7]><html class="no-js ie7 oldie" lang=en><![endif]--><!--[if IE 8]><html class="no-js ie8 oldie" lang=en><![endif]--><!--[if gt IE 8]><!--> <html class=no-js lang=en> <!--<![endif]-->

<head>
<meta charset=utf-8>
<link rel=dns-prefetch href="//fonts.googleapis.com">
<meta http-equiv=X-UA-Compatible content="IE=edge,chrome=1">
<title>Update Hotel :: Travel Network</title>
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
        <li class=no-hover>Update Hotel</li>
      </ul>
    </div>
    <div class="shadow-bottom shadow-titlebar"></div>
    <div id=main-content>
      <div class=container_12>
        <div class=grid_12>
          <h1>Update Hotel</h1>
        </div>
        <div class=grid_12>
          <div class=block-border>
            <div class=block-header> <span></span> </div>
            <form id="formAddHotel" class="block-content form" action="" method=post>
              <fieldset>
                <legend>Hotel Details</legend>
                <div class=_50>
                  <p>
                    <label for=H_TYPE>Select Account Type</label>
                    <select id="H_TYPE" name="H_TYPE" style="width:300px;">
                      <option value="1" <?php if($HDet['H_TYPE']==1) echo "selected"; ?> >Free Account</option>
                      <option value="2" <?php if($HDet['H_TYPE']==2) echo "selected"; ?> >Premium Account</option>
                    </select>
                  </p>
                </div>
                <div class=_50>
                  <p>
                    <label for=H_NAME>Hotel Name</label>
                    <input id=H_NAME type=text  name="H_NAME" class=required value="<?=$HDet['H_NAME']?>" />
                  </p>
                </div>
                <div class=_50>
                  <p>
                    <label for=H_EMAIL>Email</label>
                    <input id=H_EMAIL type=text  name=H_EMAIL class="required email " value="<?=$HDet['H_EMAIL']?>" />
                  </p>
                </div>
                <div class=_50>
                  <p>
                  <label for=H_WEB>Web Address</label>
                    <input id=H_WEB name=H_WEB class=required type=text value="<?=$HDet['H_WEB']?>" />
                    
                  </p>
                </div>
               
                
                <div class=_50>
                  <p>
                    <label for=textfield>Phone No(s)</label>
                    <input id=H_PHONE name=H_PHONE class=required type=text value="<?=$HDet['H_PHONE']?>"/>
                  </p>
                </div>
                 <div class=_50>
                  <p>
                    <label for=H_ROOM_PRICE>ROOM Price</label>
                    <input id=H_ROOM_PRICE name=H_ROOM_PRICE class=required type=text value="<?=$HDet['H_ROOM_PRICE']?>"/>
                  </p>
                </div>
                <div class=_50>
                  <p>
                    <label for=textfield>Address</label>
                    <textarea id=H_ADDRESS name=H_ADDRESS class=required rows=5 cols=40><?=$HDet['H_ADDRESS']?></textarea>
                  </p>
                </div>
              </fieldset>
              <fieldset>
              	<legend>Location</legend>
                <div class=_50>
                  <p>
                  <label for=H_COUNTRY>Country</label>
                    <select name="H_COUNTRY" id="H_COUNTRY" class="required "> 
						<option value="" >Select Country</option> 
						<?php foreach($cnts as $rowCnt) { ?>
                        <option value="<?=$rowCnt['cntname']?>" <?php if($HDet['H_COUNTRY']==$rowCnt['cntname']) echo "selected"; ?>  ><?=$rowCnt['cntname']?></option> 
                        <? } ?>
					</select>
                    
                  </p>
                </div>
                 <div class=_50>
                  <p>
                    <label for=H_CITY>City</label>
                    <input id=H_CITY name=H_CITY class=required type=text value="<?=$HDet['H_CITY']?>"/>
                  </p>
                </div>
                <div class=_50>
                  <p>
                    <label for=H_LONGI>Longitude</label>
                    <input id=H_LONGI name=H_LONGI  type=text value="<?=$HDet['H_LONGI']?>"/>
                  </p>
                </div>
                <div class=_50>
                  <p>
                    <label for=H_LATITUDE>Latitude</label>
                    <input id=H_LATITUDE name=H_LATITUDE  type=text value="<?=$HDet['H_LATITUDE']?>"/>
                  </p>
                </div>
                
                
                
                
              </fieldset>
              <fieldset>
                <legend>About Details</legend>
                <div class=_100>
                  <p>
                    <label for=textfield>Overview</label>
                    <textarea id=H_OVERVIEW name=H_OVERVIEW class=required rows=5 cols=40><?=$HDet['H_OVERVIEW']?></textarea>
                    <script type="text/javascript">
					CKEDITOR.replace( 'H_OVERVIEW',
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
                    <label for=textfield>Accommodation</label>
                    <textarea id=H_ACCOMMODATION name=H_ACCOMMODATION class=required rows=5 cols=40><?=$HDet['H_ACCOMMODATION']?></textarea>
                    <script type="text/javascript">
					CKEDITOR.replace( 'H_ACCOMMODATION',
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
                    <label for=textfield>Dining</label>
                    <textarea id=H_DINING name=H_DINING class=required rows=5 cols=40><?=$HDet['H_DINING']?></textarea>
                    <script type="text/javascript">
					CKEDITOR.replace( 'H_DINING',
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
                    <label for=textfield>Entertainment</label>
                    <textarea id=H_ENTERTAINMENT name=H_ENTERTAINMENT class=required rows=5 cols=40><?=$HDet['H_ENTERTAINMENT']?></textarea>
                    <script type="text/javascript">
					CKEDITOR.replace( 'H_ENTERTAINMENT',
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
                    <label for=textfield>Facilities</label>
                    <textarea id=H_FACILITIES name=H_FACILITIES class=required rows=5 cols=40><?=$HDet['H_FACILITIES']?></textarea>
                    <script type="text/javascript">
					CKEDITOR.replace( 'H_FACILITIES',
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
                  	<input type="hidden" value="<?=$H_ID?>" id="H_ID" name="H_ID" >
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
				$('#messageBox').removeClass().addClass('MessageBoxWarningAll').html("Updating...");
				//alert(CKEDITOR.instances.H_OVERVIEW.getData());
		//dataString = '&action=editHotel&H_OVERVIEW='+CKEDITOR.instances.H_OVERVIEW.getData()+'&H_ACCOMMODATION='+CKEDITOR.instances.H_ACCOMMODATION.getData()+'&H_DINING='+CKEDITOR.instances.H_DINING.getData()+'&H_ENTERTAINMENT='+CKEDITOR.instances.H_ENTERTAINMENT.getData()+'&H_FACILITIES='+CKEDITOR.instances.H_FACILITIES.getData()+'';
/*		dataString = $("#formAddHotel").serialize()+'&action=editHotel&H_OVERVIEW2='+CKEDITOR.instances.H_OVERVIEW.getData()+'&H_ACCOMMODATION='+CKEDITOR.instances.H_ACCOMMODATION.getData()+'&H_DINING='+CKEDITOR.instances.H_DINING.getData()+'&H_ENTERTAINMENT='+CKEDITOR.instances.H_ENTERTAINMENT.getData()+'&H_FACILITIES='+CKEDITOR.instances.H_FACILITIES.getData()+'';
		alert(dataString);
				$.post("../_controller/accommodation-controller.php",dataString,function(data)
				{
					alert(data);
					if(data=="ok")
						$('#messageBox').removeClass().addClass('MessageBoxOkAll').html("Successfully Updated.");
						
			
				});*/
				$.post("../_controller/accommodation-controller.php",{action:'editHotel',H_OVERVIEW:CKEDITOR.instances.H_OVERVIEW.getData(),H_ACCOMMODATION:CKEDITOR.instances.H_ACCOMMODATION.getData(),H_DINING:CKEDITOR.instances.H_DINING.getData(),H_ENTERTAINMENT:CKEDITOR.instances.H_ENTERTAINMENT.getData(),H_FACILITIES:CKEDITOR.instances.H_FACILITIES.getData(), H_TYPE:$('#H_TYPE').val(), H_NAME:$('#H_NAME').val(), H_EMAIL:$('#H_EMAIL').val(), H_WEB:$('#H_WEB').val(), H_PHONE:$('#H_PHONE').val(), H_ROOM_PRICE:$('#H_ROOM_PRICE').val(), H_ADDRESS:$('#H_ADDRESS').val(), H_COUNTRY:$('#H_COUNTRY').val(), H_CITY:$('#H_CITY').val(), H_LONGI:$('#H_LONGI').val(), H_LATITUDE:$('#H_LATITUDE').val(),H_ID:$('#H_ID').val()},function(data)

			{
				$('#messageBox').removeClass().addClass('MessageBoxOkAll').html("Successfully Updated.");

			});
				
			}
		});
		
		var validateform = $("#formAddHotel").validate();
			$("select, input:checkbox, input:text, input:password, input:radio, input:file, textarea").uniform();
	});
clearNavMenu();
$('#nav_hotel').addClass('current');	
$('#nav_hotel_addnew').addClass('current');	
$('#nav_hotel').parent().addClass('expand');
</script> 

<!--[if lt IE 7 ]><script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script> <script>window.attachEvent("onload",function(){CFInstall.check({mode:"overlay"})});</script><![endif]-->
</body>
</html>