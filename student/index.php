<?php
session_start();
include_once("../_system/_config/config.php");
require_once(REAL_PATH.'_system/_class/student.class.php');
require_once(REAL_PATH.'_system/_database/mysql.php');

$stuDet = STUDENT :: getStudentDet();
$subs = unserialize($stuDet['S_SUBJECTS']);
$sports = unserialize($stuDet['S_SPORTS']);


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Ave Maria Convent Branch School Bolawalana :: <?=$stuDet['S_NAME']?></title>
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
          <li class="noback"><a href="<?=URL?>index.php">Home</a></li>
          <li><a href="<?=URL?>student">Student</a></li>
          <li><?=$stuDet['S_NAME']?></li>
        </ul>
        <ul class="share">
          <li>Share with us:</li>
          <li> <?php include_once(REAL_PATH."_system/_includes/share.php"); ?></li>
        </ul>
      </div>
      <!-- Gallery -->
      <div class="col3">
                <!-- Gallery -->
                <div class="static">
                    <h2 class="heading colr"> <?=$stuDet['S_NAME']?></h2>
					
                    <div id="pricipalWrapper">
                    	<div class="picture"><img src="<?=URL?>upload/students/<?=$stuDet['S_PRO_PIC']?> "  /></div>
                        <div class="details">
                        <?php if($stuDet['S_JOIN_DATE']!="0000-00-00") { ?>
                        	<h3 class="colr pric"><b>Joined Date:</b>  <?=date("d M Y", strtotime($stuDet['S_JOIN_DATE']));?></h3>
                           <? } ?>
                            <h3 class="colr pric"><b>Grade:</b>  <?=$stuDet['S_GRADE']?></h3>
                            <h3 class="colr pric"><b>Admission No:</b> <?=$stuDet['S_AD_ID']?></h3>
                            <h3 class="colr pric"><b>My Subjects:</b> 
							<?php foreach($subs as $sub) 
							{  
								$subName = STUDENT :: getSubjectNameByID($sub);
								echo $subName; if($sub  != end($subs)) echo " ,";
							} ?></h3>
                            <?php if(isset($sports) ) { ?>
                            <h3 class="colr pric"><b>Sports:</b> <?php  foreach($sports as $spts) echo $spts; if($spts  != end($sports)) echo " ,";  ?></h3> <? } ?>
                            <?php if($stuDet['S_EXTRA_ACT']!="") { ?>
                            <h3 class="colr pric"><b>Extra Curriculum Activities:</b> <?=nl2br($stuDet['S_EXTRA_ACT'])?></h3>
                            <? } ?>
                            <h3 class="colr pric"><b>About Me:</b></h3>
                             <p class="bigtxt txt bold colr " style="text-align:justify;">
                       <?=$stuDet['S_DESCRIPTION']?>                    </p>
                    <a href="my-results.php">My Results</a> | <a href="my-teachers.php">My Teachers</a>  | <a href="#">Sign out</a>
                     
                        </div>
                    </div>

                    
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