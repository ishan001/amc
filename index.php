<?php
session_start();
include_once("_system/_config/config.php");
$location = "H";

include_once(REAL_PATH."_system/_database/mysql.php");	
require_once(REAL_PATH.'_system/_class/common.class.php');

$homeGalImg = COMMON :: getRandomGalleryImages();

$news = COMMON :: getRecentNewsHome();
$events = COMMON :: getRecentEventHome();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="Bolawalana Ave Maria Convent Negombo.  " />
<meta name="keywords" content="Bolawalana Ave Maria Convent Negombo, negombo Schools, negombo girls school " />
<meta name="google-site-verification" content="dufVFgLun1y0AQBZAHPCdNj38KqsyLlfDOA-crxq6C4" />
<title>Bolawalana Ave Maria Convent Negombo.</title>
<!-- // Stylesheet // -->
<style type="text/css" media="screen">
@import url("css/style.css");
@import url("css/wt-rotator.css");
</style>
<!-- // Javascript // -->
<script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="js/animatedcollapse.js"></script>
<script type="text/javascript" src="js/jquery.infinite-carousel.js"></script>
<script type="text/javascript" src="js/ddsmoothmenu.js"></script>
<script type="text/javascript" src="js/contentslider.js"></script>
<script type="text/javascript" src="js/jquery.fancybox-1.3.1.js"></script>
<script type="text/javascript" src="js/scrolltopcontrol.js"></script>
<script type="text/javascript" src="js/cufon-yui.js"></script>
<script type="text/javascript" src="js/titillium.js"></script>
<script type="text/javascript" src="js/jquery.validate.js"></script>
<script type="text/javascript" src="js/login.js"></script>
<script type="text/javascript">
	Cufon.replace('h1, h2, h3, h4, h5, h6');
	Cufon.replace('.cufontxt', {hover: true});
	

	
</script>
<style type="text/css" media="screen">
@import url("css/style.css");
@import url("css/cmxform.css");
@import url("css/message_styles.css");
</style>
</head>
<body>
<!-- Wrapper -->
<div id="wrapper_sec"> 
  <!-- Header -->
  
  <div class="header"> 
    <!-- Logo -->
    <div class="logo" ><a href="<?=URL?>"><img src="images/logo.png" alt="" /></a></div>
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
    <div class="banner">
      <?php include_once(REAL_PATH."_system/_includes/main_banner.php"); ?>
    </div>
  </div>
  <div class="clear"></div>
  <!-- Big Strip -->
  <div class="bigstrip">
  	<div class="photogallery">
      <h3 class="white left">Photo Gallery</h3>
      <a href="gallery" class="white under right">View All</a>
      <ul>
      <?php for($i=0;$i<count($homeGalImg);$i++) { ?>
        <li><a href="gallery/gallery.php?G_ID=<?=$homeGalImg[$i]['G_ID']?>"><img src="upload/gallery/thumb/<?=$homeGalImg[$i]['GI_NAME']?>" alt="<?=$homeGalImg[$i]['G_NAME']?>" title="<?=$homeGalImg[$i]['G_NAME']?>" width="75" height="75" /></a></li>
        <? } ?>

      </ul>
    </div>
    <div class="links">
      <h3 class="white">About School</h3>
      <ul>
        <li><a href="<?=URL?>about-us/school-profile">School Profile</a></li>
        <li><a href="<?=URL?>event-calendar">Events Calendar</a></li>
        <li><a href="#">Development Planning</a></li>
        <li><a href="#">Old Girls Union</a></li>
        <li><a href="#">Welfare Society</a></li>
      </ul>
    </div>
    <div id="LoginWrap">
    
		<?php     	
			if($_SESSION['AMCB_USERID']) { ?>
             <div class="loginDetwrapper">
            <div class="stuProPic"><img src="upload/students/thumb/<?=$_SESSION['AMCB_USERPIC']?>"  /></div>
        <div class="stuDet">
        	<div class="stuName"><?=$_SESSION['AMCB_NAME']?></div>
            <div class="stuGrade"><?=$_SESSION['AMCB_GRADE']?></div>
            <div class="stuAdmissionNo">Admission No : <?=$_SESSION['AMCB_ADMISSION']?></div>
            <div class="stuLinks"><a href="student">My Profile</a> | <a href="student/my-results.php">My Results</a> | <a href="student/my-teachers.php">My Teachers</a><br /><a href="_controller/student-controller.php?action=logout">Sign out</a></div>
        </div>
        </div>
            <? } else { ?>
            <div class="loginwrapper">
    	<h3 class="white" style="text-align:right; margin-right:10px;">Student Login</h3>
        <form method="post" name="formLogin" id="formLogin" >
    	<div class="loginBlock">
        	<div class="title">Username</div>
            <div class="input"><input type="text"  name="username" id="username" class="loginInput" /></div>
            <div class="title">Password</div>
            <div class="input"><input type="password"  name="password" id="password" class="loginInput2" /></div>
            <div id="messageBox" style="text-align:center"></div>
            <div class="loginBut"><input type="submit"  value="Login" class="loginButton" /></div>
        </div>
        </form>
        </div>
        <? } ?>
        
    
    
    </div>
    
    
  </div>
  <div class="clear"></div>
  <!-- Content Section -->
  
  <div id="content_sec">
    <div class="leftcrv">&nbsp;</div>
    <div class="cont_cent"> 
      <!-- Column 1 -->
      <div class="col1">
        <div class="col1in"> 
          <!-- Welcome -->
          <div class="welcome">
            <h2 class="colr heading">Welcome to Bolawalana Ave Maria Convent</h2>
            <div class="thumb"><img src="images/welcome.jpg" alt="" class="border1" /></div>
            <div class="desc">
              <p>The first foundation stone for the Ave Maria branch school was laid on 14th June 1998 by Grace most Rev. Dr. Nicholas Marcus Fernando. The ceremonial opening was held on the 10th Jan 1999. Ave Maria Convent branch school is a catholic school with particular emphasis on Christian values and attitudes. The foundation stone was laid to the second school building by Rev. Sister Anita Fernando, the provincial superior of the congregation of Good Shepherd sisters on 19th April 2002 and Rev. Fr. Dr. Lesley Fernando. In year 2005 next foundation stone for the building of comfort station was laid. Today there are nearly 1100 students studying in Ave Maria Branch School. </p>
            </div>
          </div>
          <!-- News section -->
          
          <div class="newsec">
            <div class="heading">
              <h4 class="colr upper">In the News</h4>
              <a href="news" class="viewmore under">View more</a> </div>
            <ul>
            <?php foreach($news as $rowNews) { ?>
              <li>
                <div class="thumb"> <a href="news/news.php?N_ID=<?=$rowNews['N_ID']?>"><img src="upload/news/thumb/<?=$rowNews['NI_NAME']?>" alt="" width="75" height="75" /></a> </div>
                <div class="desc"> <a href="news/news.php?N_ID=<?=$rowNews['N_ID']?>" class="title bold colr"><?=$rowNews['N_TITLE']?></a>
                  <p class="date"><?=$rowNews['N_DATE']?> </p>
                  <p class="txt"> 
				  <?php  
				  $des = strip_tags ($rowNews['N_DESCRIPTION'],"");
				  if (strlen($des) > 80)
					  $des = substr($des, 0, strrpos(substr($des, 0, 80), ' ')) . '...';
      				  echo $des;
	  			   ?>	
				</p>
                </div>
              </li>
              <? } ?>
              
              
            </ul>
          </div>
          <!-- Events section -->
          <div class="eventsec">
            <div class="heading">
              <h4 class="colr upper">Upcoming Events</h4>
              <a href="events" class="viewmore under">View more</a> </div>
            <ul>
            <?php foreach($events as $event) { ?>
              <li style="padding-bottom:20px;">
                <div class="thumb"> <span class="date cufontxt"><?=date("d", strtotime($event['E_DATE']))?></span> <span class="month cufontxt"><?=strtoupper(date("M", strtotime($event['E_DATE'])))?></span> </div>
                <div class="desc"> <a href="<?=URL?>events/event.php?E_ID=<?=$event['E_ID']?>" class="title bold colr"><?=$event['E_TITLE']?></a>
                  <p class="txt"> <?php
                $descrip =  strip_tags($event['E_DESCRIPTION']);
				if (strlen($descrip) > 150)
				  $descrip = substr($descrip, 0, strrpos(substr($descrip, 0, 150), ' ')) . '...';
	  			echo $descrip;
				  
				  ?></p>
                </div>
              </li>
              <? } ?>
              
            </ul>
          </div>
          <div class="clear"></div>
        </div>
      </div>
      <!-- Column 2 -->
      <?php include_once(REAL_PATH."_system/_includes/right_home_slider.php"); ?>
    </div>
    <div class="rightcrv">&nbsp;</div>
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
$('#home').addClass('selected');
</script>
