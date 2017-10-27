<?php
include_once("../_system/_config/config.php");
require_once(REAL_PATH.'_system/_database/mysql.php');
require_once(REAL_PATH.'_system/_class/common.class.php');

function selfURL() {
  $s = empty($_SERVER["HTTPS"]) ? '' : ($_SERVER["HTTPS"] == "on") ? "s" : "";
  $protocol = strleft(strtolower($_SERVER["SERVER_PROTOCOL"]), "/").$s;
  $port = ($_SERVER["SERVER_PORT"] == "80") ? "" : (":".$_SERVER["SERVER_PORT"]);
  return $protocol."://".$_SERVER['SERVER_NAME'].$port.$_SERVER['REQUEST_URI'];
}
  $url = selfURL();
function strleft($s1, $s2) {
  return substr($s1, 0, strpos($s1, $s2));
}
$mainURL = explode('/', $url);
//print_r($mainURL);

$cont = count($mainURL);
//echo $cont;
if($_SERVER["SERVER_NAME"]=="localhost")
{
	if($cont==6)
	{
		$cat = $mainURL[5];
		$content = COMMON :: getContent($cat);
	}
	
}
else
{
	if($cont==5)
	{
		$cat = $mainURL[4];
		$content = COMMON :: getContent($cat);		
	}
	
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="Ave Maria Convent Branch School Bolawalana Negombo ,Principal - Sr. Thelma Shanthi Sirima Opanayaka " />
<meta name="keywords" content="Ave Maria Convent Branch School Bolawalana Negombo, negombo Schools, negombo girls school ,Principal,Sr. Thelma Shanthi Sirima Opanayaka " />
<title>Ave Maria Convent Branch School Bolawalana :: Abous us -
<?=$content['C_NAME']?>
</title>
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
          <li><a href="#">About us</a></li>
          <li>
            <?=$content['C_NAME']?>
          </li>
        </ul>
        <ul class="share">
          <li>Share with us:</li>
          <li>
            <?php include_once(REAL_PATH."_system/_includes/share.php"); ?>
          </li>
        </ul>
      </div>
      <!-- Gallery -->
      <div class="col3"> 
        <!-- Gallery -->
        <div class="static">
          <h2 class="heading colr">
            <?=$content['C_NAME']?>
          </h2>
          <div id="pricipalWrapper" class="about_us">
            <?=$content['C_DATA']?>
            
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
<script language="javascript">
ClearMenu();
$('#about').addClass('selected');
</script>