<?php
session_start();
include_once("../_system/_config/config.php");
require_once(REAL_PATH.'_system/_class/student.class.php');
require_once(REAL_PATH.'_system/_database/mysql.php');

$stuRes1 = STUDENT :: getStudentResults($_SESSION['AMCB_USERID'],date("Y"),1);
$stuRes2 = STUDENT :: getStudentResults($_SESSION['AMCB_USERID'],date("Y"),2);
$stuRes3 = STUDENT :: getStudentResults($_SESSION['AMCB_USERID'],date("Y"),3);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Ave Maria Convent Branch School Bolawalana :: Student Results</title>
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
          <li><a href="#">Student</a></li>
          <li>My Results - <?=$_SESSION['AMCB_NAME']?></li>
        </ul>
        <ul class="share">
          <li>Share with us:</li>
          <li><a href="#"><img src="<?=URL?>images/share1.gif" alt="" /></a></li>
          <li><a href="#"><img src="<?=URL?>images/share2.gif" alt="" /></a></li>
          <li><a href="#"><img src="<?=URL?>images/share3.gif" alt="" /></a></li>
          <li><a href="#"><img src="<?=URL?>images/share4.gif" alt="" /></a></li>
          <li><a href="#"><img src="<?=URL?>images/share5.gif" alt="" /></a></li>
          <li><a href="#"><img src="<?=URL?>images/share6.gif" alt="" /></a></li>
        </ul>
      </div>
      <!-- Gallery -->
      <div class="col1">
        <div class="col1in"> 
          <!-- News -->
          <?php if($stuRes1) { ?>
          <div class="news" style="margin-bottom:20px;">
          
            <h2 class="colr heading"><?=date("Y")?> 1<sup  style="text-transform:none">st</sup> Term Results</h2>
            <div class="static" style="padding:0px; width:100%">
            <table cellpadding="0" cellspacing="0" border="0">

                          <tr class="tablehead bold">
                            <td>SubJect</td>
                            <td>Teacher</td>
                            <td>Results</td>
                          </tr>
                          <?php
						  $i=0;
						   foreach($stuRes1 as $res1) { 
						   	$teacher = STUDENT :: getSubjectTeacher($_SESSION['AMCB_GRADE'],$res1['SB_ID']);
						   ?>
                          <tr <?php if($i==0) { ?> class="tabledark" <? }  ?> >
                            <td><?=$res1['SB_NAME']?></td>
                            <td><?=$teacher['T_NAME']?></td>
                            <td><?=$res1['SR_RESULT']?></td>
                          </tr>
                          <?   if($i==0) $i=1; else $i=0; } ?>
                         
                        </table>
                        </div>
                        
            
          </div>
          <? } ?>
          <div class="clear"></div>
          
          <?php if($stuRes2) { ?>
          <div class="news" style="margin-bottom:20px;">
          
            <h2 class="colr heading"><?=date("Y")?> 2<sup  style="text-transform:none">nd</sup> Term Results</h2>
            <div class="static" style="padding:0px; width:100%">
            <table cellpadding="0" cellspacing="0" border="0">

                          <tr class="tablehead bold">
                            <td>SubJect</td>
                            <td>Teacher</td>
                            <td>Results</td>
                          </tr>
                          <?php
						  $i=0;
						   foreach($stuRes2 as $res2) { 
						   	$teacher = STUDENT :: getSubjectTeacher($_SESSION['AMCB_GRADE'],$res2['SB_ID'])
						   
						   ?>
                          <tr <?php if($i==0) { ?> class="tabledark" <? }  ?> >
                            <td><?=$res2['SB_NAME']?></td>
                            <td><?=$teacher['T_NAME']?></td>
                            <td><?=$res2['SR_RESULT']?></td>
                          </tr>
                          <?   if($i==0) $i=1; else $i=0; } ?>
                         
                        </table>
                        </div>
                        
            
          </div>
          <? } ?>
          
          <div class="clear"></div>
          <?php if($stuRes3) { ?>
          <div class="news" style="margin-bottom:20px;">
          
            <h2 class="colr heading"><?=date("Y")?> 3<sup  style="text-transform:none">rd</sup> Term Results</h2>
            <div class="static" style="padding:0px; width:100%">
            <table cellpadding="0" cellspacing="0" border="0">

                          <tr class="tablehead bold">
                            <td>SubJect</td>
                            <td>Teacher</td>
                            <td>Results</td>
                          </tr>
                          <?php
						  $i=0;
						   foreach($stuRes3 as $res3) { 
						   	$teacher = STUDENT :: getSubjectTeacher($_SESSION['AMCB_GRADE'],$res3['SB_ID'])
						   
						   ?>
                          <tr <?php if($i==0) { ?> class="tabledark" <? }  ?> >
                            <td><?=$res3['SB_NAME']?></td>
                            <td><?=$teacher['T_NAME']?></td>
                            <td><?=$res3['SR_RESULT']?></td>
                          </tr>
                          <?   if($i==0) $i=1; else $i=0; } ?>
                         
                        </table>
                        </div>
                        
            
          </div>
          <? } ?>
        </div>
      </div>
      <?php include_once(REAL_PATH."_system/_includes/student_right_slider.php"); ?>
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