<?php
session_start();
include_once("../_system/_config/config.php");
include_once(REAL_PATH."_system/_database/mysql.php");	
require_once(REAL_PATH.'_system/_class/common.class.php');

$N_ID = (int) $_REQUEST['N_ID'];

$newsDet = COMMON :: getNewsDet($N_ID);
$newsImgs = COMMON :: getNewsImages($N_ID);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>News :: <?=$newsDet['N_TITLE']?></title>
<!-- // Stylesheet // -->
<style type="text/css" media="screen">
@import url("<?=URL?>css/style.css");
</style>

<!-- // Javascript // -->
<script type="text/javascript" src="<?=URL?>js/jquery.min.js"></script>
<script type="text/javascript" src="<?=URL?>js/animatedcollapse.js"></script>
<script type="text/javascript" src="<?=URL?>js/jquery.infinite-carousel.js"></script>
<script type="text/javascript" src="<?=URL?>js/ddsmoothmenu.js"></script>
<script type="text/javascript" src="<?=URL?>js/contentslider.js"></script>
<script type="text/javascript" src="<?=URL?>js/jquery.fancybox-1.3.1.js"></script>
<script type="text/javascript" src="<?=URL?>js/scrolltopcontrol.js"></script>
<script type="text/javascript" src="<?=URL?>js/cufon-yui.js"></script>
<script type="text/javascript" src="<?=URL?>js/titillium.js"></script>
<script type="text/javascript">
	Cufon.replace('h1, h2, h3, h4, h5, h6');
	Cufon.replace('.cufontxt', {hover: true});
</script>
<style type="text/css">
.wraptocenter {
    display: table-cell;
    text-align: center;
    vertical-align: middle;
    width: 207px;
    height: 139px;
}
.wraptocenter * {
    vertical-align: middle;
}
/*\*//*/
.wraptocenter {
    display: block;
}
.wraptocenter span {
    display: inline-block;
    height: 100%;
    width: 1px;
}
/**/
</style>
<!--[if lt IE 8]><style>
.wraptocenter span {
    display: inline-block;
    height: 100%;
}
</style><![endif]-->
</head>
<body>
<!-- Wrapper -->
<div id="wrapper_sec"> 
  <!-- Header -->
  
  <div class="header"> 
    <!-- Logo -->
    <div class="logo"><a href="<?=URL?>"><img src="<?=URL?>images/logo.png" alt="" /></a></div>
    <!-- Right Header -->
    <div class="righthead">
      <?php include_once(REAL_PATH."_system/_includes/header_upper.php"); ?>
    </div>
    <!-- Navigation -->
    <div class="navigation">
      <?php include_once(REAL_PATH."_system/_includes/navigation.php"); ?>
    </div>
    <div class="clear"></div>
    
    <!-- Banner -->
    <div class="bannersmall"> <a href="#"><img src="<?=URL?>images/bannersmall.jpg" alt="" /></a> </div>
  </div>
  <div class="clear"></div>
  <!-- Content Section -->
  <div id="content_sec">
    <div class="leftcrv noback">&nbsp;</div>
    <div class="cont_cent"> 
      <!-- Bread Crumb -->
      <div id="crumb">
        <ul class="links">
          <li class="colr noback">You are here:</li>
          <li class="noback"><a href="<?=URL?>">Home</a></li>
          <li><a href="<?=URL?>news">News</a></li>
          <li><?=$newsDet['N_TITLE']?></li>
        </ul>
        <ul class="share">
          <li>Share with us:</li>
          <li> <?php include_once(REAL_PATH."_system/_includes/share.php"); ?></li>
        </ul>
      </div>
      <!-- Gallery -->
      <div class="col3"> 
        <!-- Gallery -->
        <div class="gallery">
          <div class="heading">
            <h2 class="colr"><?=$newsDet['N_TITLE']?></h2>
            <div class="newsDate colr"><?=$newsDet['N_DATE']?></div>
            <div class="clear"></div>
          </div>
          <div class="clear"></div>
          <div class="bigtxt txt bold colr"> <?=$newsDet['N_DESCRIPTION']?></div>
          <div class="clear"></div>
          <ul class="lst">
          <?php $i=1; foreach($newsImgs as $img) { ?>
            <li <?php if($i==4){ ?> class="last" <? } ?> style="text-align:center"> <a rel="example_group" href="<?=URL?>/upload/news/<?=$img['NI_NAME']?>" class="thumb" ><span class="preview">&nbsp;</span><img src="<?=URL?>/upload/news/thumb/<?=$img['NI_NAME']?>" alt="" style="max-width:207px; max-height:137px;" /></a> </li>
            <? if($i==4)
					$i=1;
				else				  
					$i++; 
				} ?>
           
          </ul>
          <div class="clear"></div>
          <div class="newsMorePhotos" ><a href="<?=URL?>gallery/gallery.php?G_ID=<?=$newsDet['N_GAL_ID']?>" class="link-header-blue">View more photos</a></div>
        </div>
        
        <div class="clear"></div>
      </div>
    </div>
    <div class="rightcrv noback">&nbsp;</div>
  </div>
  <div class="clear"></div>
  <!-- Footer -->
  <?php include_once(REAL_PATH."_system/_includes/footer.php"); ?>
</div>
<div class="clear"></div>
</body>
</html>
<script language="javascript">
ClearMenu();
$('#news').addClass('selected');
</script>