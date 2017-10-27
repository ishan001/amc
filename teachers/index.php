<?php
session_start();
include_once("../_system/_config/config.php");
include_once(REAL_PATH."_system/_database/mysql.php");	
require_once(REAL_PATH.'_system/_class/teacher.class.php');
require_once(REAL_PATH.'_system/_class/array.class.php');
$teachers = TEACHER :: getAllTeachers();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="Ave Maria Convent Branch School Bolawalana Negombo ,Teachers details" />
<meta name="keywords" content="Ave Maria Convent Branch School Bolawalana Negombo, negombo Schools, negombo girls school ,teachers details " />
<title>Ave Maria Convent Branch School Bolawalana :: Teachers</title>
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
	$('#go_btn').live('click',function(){
		var page = parseInt($('.goto').val());
		var no_of_pages = parseInt($('.total').attr('a'));
		if(page != 0 && page <= no_of_pages){
			loadData(page);
		}else{
			alert('Enter a PAGE between 1 and '+no_of_pages);
			$('.goto').val("").focus();
			return false;
		}
		
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

	var accom = $('input:checkbox[name="accomadation[]"]:checked')
                       .map(function() { return $(this).val() })
                       .get()
                       .join(",");
	var stars = $('input:checkbox[name="star[]"]:checked')
                       .map(function() { return $(this).val() })
                       .get()
                       .join(",");			   
	$.ajax
	({
		type: "POST",
		url: "load_data.php",
		data: "page="+page+'&T_NAME='+$('#T_NAME').val()+'&T_GRADE='+$('#T_GRADE').val(),
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
          <li class="noback"><a href="<?=URL?>">Home</a></li>
          <li><a href="#">About Us</a></li>
          <li>Teachers</li>
        </ul>
        <ul class="share">
          <li>Share with us:</li>
          <li> <?php include_once(REAL_PATH."_system/_includes/share.php"); ?></li>
        </ul>
      </div>
      <!-- Gallery -->
      <div class="col1">
        <div class="col1in"> 
          <!-- News -->
          <div class="news">
            <h2 class="colr heading">Teachers</h2>
            
            <div id="container">
            	<div class="data"></div>
            	<div class="pagination"></div>
        	</div>
        

              
           
            <div class="clear"></div>
          </div>
          
          <div class="clear"></div>
        </div>
      </div>
      <div class="col2">
        <div class="rightsext"> 
          <!-- Quick Links -->
          <div class="quicklinks">
            <h4 class="colr heading">Search Teacher</h4>
            <div id="teacherSearchWrapper">
            	<div class="txt">Teacher Name(any part of the name)</div>
                <div class="inputfield"><input name="T_NAME" id="T_NAME" type="text" placeholder="Teacher Name"  /></div>
            </div>
            <div id="teacherSearchWrapper">
            	<div class="txt">Grade</div>
                <div class="inputfield"><select name="T_GRADE" id="T_GRADE" >
                	<option value="">Any Grade</option>
                    <?php for($i=0;$i<count($GRADS);$i++) { ?>
                    <option value="<?=$GRADS[$i]?>" ><?=$GRADS[$i]?></option>	
					<? } ?>	
                </select></div>
            </div>
            <div id="teacherSearchWrapper" style="margin-top:10px;">
            <a href="javascript:void(0)" class="buttonone" onclick="loadData(1)" >Search</a></div>
            
          </div>
        </div>
        <div class="clear"></div>
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
<script language="javascript" >
ClearMenu();
$('#about').addClass('selected');
</script>