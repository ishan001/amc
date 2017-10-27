<?php
session_start();
include_once("../_system/_config/config.php");
require_once(REAL_PATH.'_system/_class/student.class.php');
require_once(REAL_PATH.'_system/_database/mysql.php');

//$teachers = STUDENT :: getTeachersForClass($_SESSION['AMCB_GRADE']);
$teachers = STUDENT :: getTeacherForStudent();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Ave Maria Convent Branch School Bolawalana :: My Teachers</title>
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
          <li>My Teachers</li>
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
          <div class="news">
            <h2 class="colr heading">My Teachers</h2>
            <ul>
            <?php foreach($teachers as $teacher) { 
			
				if($teacher['T_CLASS_TECH']==$_SESSION['AMCB_GRADE']) { 
			?>  
            <h4 class="colr">Class Teacher / <?=$teacher['SB_NAME']?> Teacher</h4>
              <li>
                <div class="thumb"> <a href="<?=URL?>/teachers/teacher.php?T_ID=<?=$teacher['T_ID']?>"><img src="<?=URL?>upload/teachers/thumb/<?=$teacher['T_PRO_PIC']?>" alt="" /></a> </div>
                <div class="desc">
                  <h4 class="colr"><?=$teacher['T_NAME']?></h4>
                  <p class="dat">Joined <?=date("d M Y", strtotime($teacher['T_JOINED_DATE']));?> </p>
                  <p class="txt"> <?php
				  				$des =  strip_tags($teacher['T_DESCRIPTION']);
				  			 if (strlen($des) > 200)
      								$des = substr($des, 0, strrpos(substr($des, 0, 200), ' ')) . '...';
      						echo $des;
	  ?></p>
                </div>
                
              </li>
              <? break; } } ?>
         <?php foreach($teachers as $teacher) { 
				if($teacher['T_CLASS_TECH']!=$_SESSION['AMCB_GRADE']) { 
			?>  
              <h4 class="colr"> <?=$teacher['SB_NAME']?> Teacher</h4>
              <li>
                <div class="thumb"> <a href="<?=URL?>/teachers/teacher.php?T_ID=<?=$teacher['T_ID']?>"><img src="<?=URL?>upload/teachers/thumb/<?=$teacher['T_PRO_PIC']?>" alt="" /></a> </div>
                <div class="desc">
                  <h4 class="colr"><?=$teacher['T_NAME']?></h4>
                  <p class="dat">Joined in <?=date("d M Y", strtotime($teacher['T_JOINED_DATE']));?>  </p>
                  <p class="txt">  <?php
				  				$des =  strip_tags($teacher['T_DESCRIPTION']);
				  			 if (strlen($des) > 200)
      								$des = substr($des, 0, strrpos(substr($des, 0, 200), ' ')) . '...';
      						echo $des;
	  ?> </p>
                </div>
                
              </li>
              <?  } } ?>
              
            </ul>
            <div class="clear"></div>
          </div>
          
          <div class="clear"></div>
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