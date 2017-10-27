<?php
session_start();
include_once("../_system/_config/config.php");
include_once(REAL_PATH."_system/_database/mysql.php");	
require_once(REAL_PATH.'_system/_class/teacher.class.php');
$T_ID = (int) $_REQUEST['T_ID'];
$t_det = TEACHER :: getTeacherDet($T_ID);


$t_sub = TEACHER :: getEditClassTeacherSubs($T_ID);


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="Ave Maria Convent Branch School Bolawalana Negombo ,Teacher <?=$t_det['T_NAME']?>" />
<meta name="keywords" content="Ave Maria Convent Branch School Bolawalana Negombo, negombo Schools, negombo girls school ,teachers details , <?=$t_det['T_NAME']?>" />
<title>Ave Maria Convent Branch School Bolawalana :: Teachers - <?=$t_det['T_NAME']?></title>
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
          <li class="noback"><a href="<?=URL?>">Home</a></li>
          <li><a href="javascript:void()">Teacher</a></li>
          <li><?=$t_det['T_NAME']?></li>
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
                    <h2 class="heading colr"> <?=$t_det['T_NAME']?></h2>
					
                    <div id="pricipalWrapper">
                    	<div class="picture"><img src="<?=URL?>upload/teachers/<?=$t_det['T_PRO_PIC']?>"  /></div>
                        <div class="details">
                        	<h3 class="colr pric"><b>Joined Date:</b>  <?=date("d M Y", strtotime($t_det['T_JOINED_DATE']));?></h3>
                            <?php if($t_det['T_CLASS_TECH']) { ?>
                            <h3 class="colr pric"><b>Class Teacher:</b>  <?php
                $cls = explode("-",$t_det['T_CLASS_TECH']); echo $cls[0];?></h3>
                            <? } ?>
                            <div class="courses">
                            <h4 class="colr subhead">Teaching Class</h4>
                            <div class="tablsec">
                            <ul class="head">
                                <li class="duration"><b>Subject</b></li>
                                <li class="name"><b>Class</b></li>

       
                            </ul>
                            <?php foreach($t_sub as $sub) {  
							$t_cls = TEACHER :: getTeacherClassDetBySub($sub['TC_S_ID'],$T_ID);
							?>
                            <ul class="cont">
                                <li class="subject"><?=$sub['SB_NAME']?></li>
                                <li class="class"><?php foreach($t_cls as $cls) {  echo $cls['TC_GRADE']; if($cls  != end($t_cls)) echo " ,"; } ?></li>

                            </ul>
							<? } ?>

                            
                        </div>
                        </div>
                             <h3 class="colr pric"><b>About Me:</b></h3>
                             <p class="bigtxt txt bold colr " style="text-align:justify;">
                      <?=$t_det['T_DESCRIPTION']?>
                    </p>
                     <h3 class="colr pric"><b>Qulifications:</b> <br /><?=str_replace(array("\n","\r","\r\n"), '<br />',$t_det['T_QUALIFICATION'])?></h3>
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
<script language="javascript" >
ClearMenu();
$('#about').addClass('selected');
</script>