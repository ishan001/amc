<?php 
session_start();
include_once("_system/_config/config.php");
if(!isset($_SESSION['AMCB_admin_id']))
	header('location:index.php');

?>
<!doctype html>
<!--[if lt IE 7]><html class="no-js ie6 oldie" lang=en><![endif]--><!--[if IE 7]><html class="no-js ie7 oldie" lang=en><![endif]--><!--[if IE 8]><html class="no-js ie8 oldie" lang=en><![endif]--><!--[if gt IE 8]><!--> <html class=no-js lang=en> <!--<![endif]-->
<head>
<meta charset=utf-8>
<link rel=dns-prefetch href="//fonts.googleapis.com">
<meta http-equiv=X-UA-Compatible content="IE=edge,chrome=1">
<title>Dashboard :: Ave Maria Branch School Admin Panel</title>
<link href="favicon.ico" rel="shortcut icon"/>
<meta name=description content="">
<meta name=author content="">
<meta name=viewport content="width=device-width,initial-scale=1">
<link rel=stylesheet href='css/main.css'>
<link href="//fonts.googleapis.com/css?family=PT+Sans" rel=stylesheet type="text/css">
<script src="js/libs/modernizr-2.0.6.min.js"></script>
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
        <li class=no-hover>Dashboard</li>
      </ul>
    </div>
    <div class="shadow-bottom shadow-titlebar"></div>
    <div id=main-content>
      <div class=container_12>
        <div class=grid_12>
          <h1>Dashboard</h1>
          
        </div>
        <div class=grid_12>
          <div class=block-border>
            <div class=block-content>
              <ul class=shortcut-list>
                <li> <a href="<?=URL?>teachers"> <img src="img/icons/packs/crystal/48x48/apps/teacher.png"> Teachers</a> </li>
                <li> <a href="<?=URL?>subjects.php"> <img src="img/icons/packs/crystal/48x48/apps/subject.png"> Subjects </a> </li>
                <li> <a href="<?=URL?>sports.php"> <img src="img/icons/packs/crystal/48x48/apps/sports.png"> Sports </a> </li>
                <li> <a href="<?=URL?>carriculum.php"> <img src="img/icons/packs/crystal/48x48/apps/activities.png">Carriculum Act</a> </li>
                <li> <a href="<?=URL?>students"> <img src="img/icons/packs/crystal/48x48/apps/student.png"> Student</a> </li>
               <li> <a href="<?=URL?>events"> <img src="img/icons/packs/crystal/48x48/apps/events.png"> Events </a> </li>
                <li> <a href="<?=URL?>content"> <img src="img/icons/packs/crystal/48x48/apps/content.png"> Content </a> </li>
                
                
              </ul>
              <div class=clear></div>
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
<script defer src='js/main.js'></script> 

<!--[if lt IE 7 ]><script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script> <script>window.attachEvent("onload",function(){CFInstall.check({mode:"overlay"})});</script><![endif]-->
</body>
</html>