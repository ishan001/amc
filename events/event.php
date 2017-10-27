<?php
include_once("../_system/_config/config.php");
include_once(REAL_PATH."_system/_database/mysql.php");	
require_once(REAL_PATH.'_system/_class/common.class.php');

$E_ID = (int)$_REQUEST['E_ID'];

$eveDet = COMMON :: getEventDetails($E_ID)
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="Ave Maria Convent Branch School Bolawalana Negombo ,Principal - Sr. Thelma Shanthi Sirima Opanayaka " />
<meta name="keywords" content="Ave Maria Convent Branch School Bolawalana Negombo, negombo Schools, negombo girls school ,Principal,Sr. Thelma Shanthi Sirima Opanayaka " />
<title>Ave Maria Convent Branch School Bolawalana :: <?=$eveDet['E_NAME']?> Event</title>
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
          <li class="noback"><a href="index.php">Home</a></li>
          <li><a href="<?=URL?>events">Events</a></li>
          <li><?=$eveDet['E_TITLE']?></li>
        </ul>
        <ul class="share">
          <li>Share with us:</li>
          <li> <?php include_once(REAL_PATH."_system/_includes/share.php"); ?></li>
        </ul>
      </div>
      <!-- Gallery -->
      <div class="col3">
                <!-- Gallery -->
                <div class="gallery" style="  width: 850px;">
          <div class="heading">
            <h2 class="colr"><?=$eveDet['E_TITLE']?></h2>
            <div class="newsDate colr"><?=date("Y-m-d",strtotime($eveDet['E_DATE']))?></div>
            <div class="clear"></div>
          </div>
          <div class="clear"></div>
           <div id="eventWrapper">
           		<div class="details">
                	<h3 class="colr pric"><b>Location:</b>  <?=$eveDet['E_LOCATION'];?></h3>
                    <h3 class="colr pric" style="margin-top:10px;"><b>Date :</b>  <?=date("Y-m-d",strtotime($eveDet['E_DATE']))?> <?=date("h:i A",strtotime($eveDet['E_DATE']))?></h3>
                     <?php if($eveDet['E_IMAGE']!="") { ?>
                    <div class="bigtxt txt bold colr" style="margin-top:10px;"> <?=$eveDet['E_DESCRIPTION']?></div>
                    <? } ?>
                </div>
                
                <?php if($eveDet['E_IMAGE']!="") { ?>
                <div class="picture"><img src="<?=URL?>upload/events/<?=$eveDet['E_IMAGE']?>" ></div>
                <? } else { ?>
                <div class="picture bigtxt txt bold colr" ><?=$eveDet['E_DESCRIPTION']?></div>
                <? } ?>
           </div>
          
          <div class="clear"></div>
          
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