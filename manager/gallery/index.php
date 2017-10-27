<?php 
session_start();
include_once("../_system/_config/config.php");
if(!isset($_SESSION['AMCB_admin_id']))
	header('location:../index.php');

require_once(REAL_PATH.'_system/_class/common.class.php');
require_once(REAL_PATH.'_system/_database/mysql.php');	

$gal = COMMON :: getAllGallery();
?>
<!doctype html>
<!--[if lt IE 7]><html class="no-js ie6 oldie" lang=en><![endif]--><!--[if IE 7]><html class="no-js ie7 oldie" lang=en><![endif]--><!--[if IE 8]><html class="no-js ie8 oldie" lang=en><![endif]--><!--[if gt IE 8]><!--> <html class=no-js lang=en> <!--<![endif]-->

<head>
<meta charset=utf-8>
<link rel=dns-prefetch href="//fonts.googleapis.com">
<meta http-equiv=X-UA-Compatible content="IE=edge,chrome=1">
<title>Ave Maria Convent Branch  :: Gallery</title>
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
        <li><a href="<?=url?>" title=Home><span id=bc-home></span></a></li>
        <li class=no-hover>Gallery</li>
      </ul>
    </div>
    <div class="shadow-bottom shadow-titlebar"></div>
    <div id=main-content>
      <div class=container_12>
      <div class=grid_12>
          <h1>Gallery</h1>
        </div>
        <div class=grid_12>
          <div class=block-border>
            <div class=block-content>
              <table id=table-all class=table>
                <thead>
                  <tr>
                    <th>Title</th>
                    <th>Action</th>
                    

                  </tr>
                </thead>
                <tbody>
                <?php foreach($gal as $rowGal) { 	?>
                  <tr >
                    <td><?=$rowGal['G_NAME']?></td>
                    <td style="text-align:center"> <a href="edit-gallery.php?G_ID=<?=$rowGal['G_ID']?>"><img src="../images/ico_edit_16.png" title="Edit Gallery" ></a> &nbsp; <a href="upload-images.php?G_ID=<?=$rowGal['G_ID']?>"><img src="../images/icon_upload_16.png" title="Upload Gallery Images" ></a> &nbsp; <a href="javascript:void(0)" class="galleryDelete" G_ID=<?=$rowGal['G_ID']?>><img src="../images/ico_delete_16.png" title="Delete Gallery" ></a></td>

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
  $( ".galleryDelete" ).click(function() {
    var G_ID = $(this).attr('G_ID');
    var r = confirm("Do you want to delete this Gallery?");
    if (r == true) {
      var dataString = '&G_ID='+G_ID+'&action=deleteGallery';
      $.post("../_controller/common-controller.php",dataString,
          function(data){
            $.jGrowl("Successfully Deleted.", { theme: 'success' });
            $(this).closest('tr').remove();
            location.reload();
            return false;
          });
    } else {
    }
  });


});
clearNavMenu();
$('#nav_gallery').addClass('current');	
$('#nav_gallery_all').addClass('current');	
$('#nav_gallery').parent().addClass('expand');
</script> 

<!--[if lt IE 7 ]><script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script> <script>window.attachEvent("onload",function(){CFInstall.check({mode:"overlay"})});</script><![endif]-->
</body>
</html>