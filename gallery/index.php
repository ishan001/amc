<?php
include_once("../_system/_config/config.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="Ave Maria Convent Branch School Bolawalana Negombo ,Principal - Sr. Thelma Shanthi Sirima Opanayaka " />
<meta name="keywords" content="Ave Maria Convent Branch School Bolawalana Negombo, negombo Schools, negombo girls school ,Principal,Sr. Thelma Shanthi Sirima Opanayaka " />
<title>Ave Maria Convent Branch School Bolawalana :: Photo & Video Gallery</title>
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
<script type="text/javascript">
$(document).ready(function(){
   
	loadData(1);  // For first time page load default results
	$('#container .pagination li.active').live('click',function(){
		var page = $(this).attr('p');
		loadData(page);
		
	});           

});
function loading_show(){
	$('#loading').html("<img src='../images/loading.gif'/>").fadeIn('fast');
}
function loading_hide(){
	$('#loading').fadeOut('fast');
}                
function loadData(page){
	loading_show(); 

		   
	$.ajax
	({
		type: "POST",
		url: "load_gallery_data.php",
		data: "page="+page,
		success: function(msg)
		{
			//alert(msg);
			$("#container").ajaxComplete(function(event, request, settings)
			{
				loading_hide();
				$("#container").html(msg);
			});
		}
	});
}			
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
          <li>Gallery</li>
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

                        <h2 class="colr">Photo Gallery</h2>
                        <!--<ul class="links">
                            <li><a href="#" class="active">Campus</a></li>
                            <li><a href="#">Students</a></li>
                            <li><a href="#">Alumni</a></li>
                            <li><a href="#">Convocation</a></li>

                        </ul>-->
                        <div class="clear"></div>
                    </div>
                    <div class="clear"></div>
                    
                    <div id="container">
            	<div class="data"></div>
            	<div class="pagination"></div>
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
$('#gallery').addClass('selected');
</script>