<?php
session_start();
include_once("../_system/_config/config.php");
include_once(REAL_PATH."_system/_database/mysql.php");	
require_once(REAL_PATH.'_system/_class/common.class.php');

$events = COMMON :: getAllEvents();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="Ave Maria Convent Branch School Bolawalana Negombo ,News" />
<meta name="keywords" content="Ave Maria Convent Branch School Bolawalana Negombo, negombo Schools, negombo girls school ,News" />
<title>Ave Maria Convent Branch School Bolawalana :: Events</title>
<!-- // Stylesheet // -->
<style type="text/css" media="screen">
@import url("<?=URL?>css/style.css");
@import url("<?=URL?>css/pagination.css");
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
          <li class="noback"><a href="<?=URL?>">Home</a></li>
          <li>Events</li>
        </ul>
        <ul class="share">
          <li>Share with us:</li>
          <li>
            <?php include_once(REAL_PATH."_system/_includes/share.php"); ?>
          </li>
        </ul>
      </div>
      <!-- Gallery -->
      <div class="col1">
        <div class="col1in"> 
          <!-- News -->
          <div class="news">
            <h2 class="colr heading">Events</h2>
            <ul>
            <?php foreach($events as $event) { ?>
              <li>
                <div class="thumb"><?php if($event['E_IMAGE']!=""){?> <a href="<?=URL?>events/event.php?E_ID=<?=$event['E_ID']?>"><img src="<?=URL?>upload/events/<?=$event['E_IMAGE']?>" alt="" width="75" height="75"/></a><?}?> </div>
                <div class="desc">
                  <h4 class="colr"><a href="<?=URL?>events/event.php?E_ID=<?=$event['E_ID']?>" class="link-header-blue"><?=$event['E_TITLE']?></a></h4>
                  <p class="dat"><?=date("d M Y", strtotime($event['E_DATE']))?> </p>
                  <p class="txt"><?php
                $descrip =  strip_tags($event['E_DESCRIPTION']);
				if (strlen($descrip) > 100)
				  $descrip = substr($descrip, 0, strrpos(substr($descrip, 0, 100), ' ')) . '...';
	  			echo $descrip;
				  
				  ?></p>
                </div>
                <div class="date"> <span class="dates cufontxt"><?=date("d", strtotime($event['E_DATE']))?></span> <span class="months cufontxt"><?=strtoupper(date("M", strtotime($event['E_DATE'])))?></span> </div>
              </li>
              <? } ?>
              
            </ul>
            <div class="clear"></div>
          </div>
          <div class="clear"></div>
        </div>
      </div>
      <div class="col2">
        <?php include_once(REAL_PATH."_system/_includes/quick_links.php"); ?>
        <div class="clear"></div>
        <!-- Advertisement -->
        <div class="adv"> </div>
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