<?php 
session_start();
include_once("../_system/_config/config.php");
if(!isset($_SESSION['travelnetwork_admin_id']))
	header('location:index.php');

require_once(REAL_PATH.'_system/_class/accommodation.class.php');
require_once(REAL_PATH.'_system/_database/mysql.php');

$hotls = ACCOMMODATION :: getHotels();
?>
<!doctype html>
<!--[if lt IE 7]><html class="no-js ie6 oldie" lang=en><![endif]--><!--[if IE 7]><html class="no-js ie7 oldie" lang=en><![endif]--><!--[if IE 8]><html class="no-js ie8 oldie" lang=en><![endif]--><!--[if gt IE 8]><!--> <html class=no-js lang=en> <!--<![endif]-->

<head>
<meta charset=utf-8>
<link rel=dns-prefetch href="//fonts.googleapis.com">
<meta http-equiv=X-UA-Compatible content="IE=edge,chrome=1">
<title>Hotels :: Travel Network</title>
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
        <li class=no-hover>Hotels</li>
      </ul>
    </div>
    <div class="shadow-bottom shadow-titlebar"></div>
    <div id=main-content>
      <div class=container_12>
        <div class=grid_12>
          <h1>Hotels</h1>
        </div>
        <div class=grid_12>
          <div class=block-border>
            <div class=block-header>
              <h1>Hotels</h1>
              <span></span> </div>
            <div class=block-content>
              <table id=table-all class=table>
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Contact</th>
                    <th>Country</th>
                    <th>City</th>
                    <th>Action</th>
                    

                  </tr>
                </thead>
                <tbody>
                <?php foreach($hotls as $rowHot){?>
                  <tr >
                    <td><?=$rowHot['H_NAME']?></td>
                    <td><?=$rowHot['H_EMAIL']?></td>
                    <td><?=$rowHot['H_PHONE']?></td>
                    <td><?=$rowHot['H_COUNTRY']?></td>
                    <td><?=$rowHot['H_CITY']?></td>
                    <td style="text-align:center"><a href="#"><img src="../images/ico_view_16.png" title="View Hotel Details" ></a> &nbsp; <a href="edit-hotel.php?H_ID=<?=$rowHot['H_ID']?>"><img src="../images/ico_edit_16.png" title="Edit Hotel" ></a> &nbsp; <a href="upload-gallery.php?H_ID=<?=$rowHot['H_ID']?>"><img src="../images/icon_upload_16.png" title="Upload Hotel Images" ></a> &nbsp; <a href="#"><img src="../images/ico_delete_16.png" title="Delete Hotel" ></a></td>

                  </tr>
                  <? } ?>

                </tbody>
              </table>
            </div>
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
	$("select, input:checkbox, input:text, input:password, input:radio, input:file, textarea").uniform();
});
clearNavMenu();
$('#nav_hotel').addClass('current');	
$('#nav_hotel_all').addClass('current');	
$('#nav_hotel').parent().addClass('expand');
</script> 

<!--[if lt IE 7 ]><script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script> <script>window.attachEvent("onload",function(){CFInstall.check({mode:"overlay"})});</script><![endif]-->
</body>
</html>