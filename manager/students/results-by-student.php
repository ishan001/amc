<?php 
session_start();
include_once("../_system/_config/config.php");
if(!isset($_SESSION['AMCB_admin_id']))
	header('location:index.php');

include_once(REAL_PATH."_system/_database/mysql.php");	
include_once(REAL_PATH."_system/_class/common.class.php");	
include_once(REAL_PATH."_system/_class/array.class.php");
include_once(REAL_PATH."_system/_class/student.class.php");


$S_ID = (int) $_REQUEST['S_ID'];

$studentDet = STUDENT :: getStudentDet($S_ID);
$subjects = unserialize($studentDet['S_SUBJECTS']);

$Term1 = STUDENT :: getStudentResults($S_ID,date("Y"),'1');
$Term2 = STUDENT :: getStudentResults($S_ID,date("Y"),'2');
$Term3 = STUDENT :: getStudentResults($S_ID,date("Y"),'3');
?>
<!doctype html>
<!--[if lt IE 7]><html class="no-js ie6 oldie" lang=en><![endif]--><!--[if IE 7]><html class="no-js ie7 oldie" lang=en><![endif]--><!--[if IE 8]><html class="no-js ie8 oldie" lang=en><![endif]--><!--[if gt IE 8]><!--> <html class=no-js lang=en> <!--<![endif]-->

<head>
<meta charset=utf-8>
<link rel=dns-prefetch href="//fonts.googleapis.com">
<meta http-equiv=X-UA-Compatible content="IE=edge,chrome=1">
<title>Ave Maria Convent Branch  :: Add Student Result</title>
<link href="favicon.ico" rel="shortcut icon"/>
<meta name=description content="">
<meta name=author content="">
<meta name=viewport content="width=device-width,initial-scale=1">
<style type="text/css" media="screen">
@import url("<?=URL?>css/main.css");
@import url("<?=URL?>css/message_styles.css");
</style>
<link href="//fonts.googleapis.com/css?family=PT+Sans" rel=stylesheet type="text/css">
<script src="<?=URL?>js/libs/modernizr-2.0.6.min.js"></script>
<script type="text/javascript" src="<?=URL?>ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="<?=URL?>ckfinder/ckfinder.js"></script>

</head>
<body id=top>
<div id=container>
  <?php include_once(REAL_PATH."_system/_includes/header-surround.php");?>
  <div class=fix-shadow-bottom-height></div>
  <?php include_once(REAL_PATH."_system/_includes/slidebar.php");?>
  <div id=main role=main>
    <div id=title-bar>
      <ul id=breadcrumbs>
        <li><a href="<?=URL?>home.php" title=Home><span id=bc-home></span></a></li>
        <li><a href="<?=URL?>students" title=Home>Students</a></li>
        <li class=no-hover>Add Student Result</li>
      </ul>
    </div>
    <div class="shadow-bottom shadow-titlebar"></div>
    <div id=main-content>
      <div class=container_12>
        <div class=grid_12>
          <h1><?=$studentDet['S_NAME']?> Results for Year <?php echo date("Y") ?></h1>
        </div>
        <div class=grid_12>
          <div class=block-border>
            <div class=block-header> <span></span> </div>
            <form id="formStudentResults" class="block-content form" action="" method=post  >
            <input type="hidden" name="SR_YEAR" id="SR_YEAR" value="<?=date("Y")?>" >
            <input type="hidden" name="S_ID" id="S_ID" value="<?=$S_ID?>" >

              <fieldset>
                <legend>Term 1</legend>
                <?php for($i=0;$i<count($subjects);$i++) { 
					$subName = COMMON :: getSubjectName($subjects[$i]);
				?>
                <div class=_50>
                  <p>
                   <label for=S_NAME><?=$subName?></label>
                    <input type="text" id="T1S<?=$subjects[$i]?>" name="T1S<?=$subjects[$i]?>" value="<?=$Term1[$subjects[$i]]?>"   />
                  </p>
                </div>
                <? } ?>
                
                
              </fieldset>
              <fieldset>
                <legend>Term 2</legend>
                <?php for($i=0;$i<count($subjects);$i++) { 
					$subName = COMMON :: getSubjectName($subjects[$i]);
				?>
                <div class=_50>
                  <p>
                   <label for=S_NAME><?=$subName?></label>
                    <input type="text" id="T2S<?=$subjects[$i]?>" name="T2S<?=$subjects[$i]?>" value="<?=$Term2[$subjects[$i]]?>"   />
                  </p>
                </div>
                <? } ?>
                
                
              </fieldset>
              <fieldset>
                <legend>Term 3</legend>
                <?php for($i=0;$i<count($subjects);$i++) { 
					$subName = COMMON :: getSubjectName($subjects[$i]);
				?>
                <div class=_50>
                  <p>
                   <label for=S_NAME><?=$subName?></label>
                    <input type="text" id="T3S<?=$subjects[$i]?>" name="T3S<?=$subjects[$i]?>" value="<?=$Term3[$subjects[$i]]?>"   />
                  </p>
                </div>
                <? } ?>
                
                
              </fieldset>
               
                <div id="messageBox" style="margin-bottom:10px;"></div>
    
              <div class=clear></div>
              <div class=block-actions>
                <ul class=actions-left>
                  <li><a class="button red" id=reset-validate-form href="javascript:void(0);">Reset</a></li>
                </ul>
                <ul class=actions-right>
                  <li>
                    <input type=submit class=button value=" Save ">
                  </li>
                </ul>
              </div>
            </form>
          </div>
        </div>
        <div class="clear height-fix"></div>
      </div>
    </div>
  </div>
  <?php include_once(REAL_PATH."_system/_includes/footer.php");?>
</div>
<script src="<?=URL?>js/jquery.js"></script> 
<script src='<?=URL?>js/common.js'></script> 
<script defer src='<?=URL?>js/main.js'></script> 

<script language="javascript">
$().ready(function() {
		$.validator.setDefaults({
			submitHandler: function(e) {
				$('#messageBox').removeClass().addClass('MessageBoxWarningAll').html("Saving...");
				dataString = $("#formStudentResults").serialize()+'&action=addStudentResult';
		$.post("../_controller/student-controller.php",dataString,
		function(data){
			//alert(data);
            $('#messageBox').removeClass().addClass('MessageBoxOkAll').html("Successfully saved.");
			$.jGrowl("Successfully saved.", { theme: 'success' });
		});
			
		}
		
			
});
$( "#S_JOIN_DATE" ).datepicker();			
		var validateform = $("#formStudentResults").validate();
			$(" input:checkbox, input:text, input:password, input:radio, input:file, textarea").uniform();
	});
clearNavMenu();
$('#nav_student').addClass('current');	
$('#nav_student_addnew').addClass('current');	
$('#nav_student').parent().addClass('expand');
</script> 

<!--[if lt IE 7 ]><script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script> <script>window.attachEvent("onload",function(){CFInstall.check({mode:"overlay"})});</script><![endif]-->
</body>
</html>