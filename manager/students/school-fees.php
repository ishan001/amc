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
$studentFees = STUDENT :: getStudentFeesDet($S_ID);
$currYear = date("Y");

if($studentFees)
{
	$date1 = mktime(0,0,0,date("m"),0,$currYear);
	$date2 = mktime(0,0,0,$studentFees['SF_MONTH'],0,$studentFees['SF_YEAR']);
	$defMonths = round(($date1-$date2) / 60 / 60 / 24 / 30);
}

?>
<!doctype html>
<!--[if lt IE 7]><html class="no-js ie6 oldie" lang=en><![endif]--><!--[if IE 7]><html class="no-js ie7 oldie" lang=en><![endif]--><!--[if IE 8]><html class="no-js ie8 oldie" lang=en><![endif]--><!--[if gt IE 8]><!--> <html class=no-js lang=en> <!--<![endif]-->

<head>
<meta charset=utf-8>
<link rel=dns-prefetch href="//fonts.googleapis.com">
<meta http-equiv=X-UA-Compatible content="IE=edge,chrome=1">
<title>Ave Maria Convent Branch  ::  Student School Fees</title>
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
        <li class=no-hover>Student School Fees</li>
      </ul>
    </div>
    <div class="shadow-bottom shadow-titlebar"></div>
    <div id=main-content>
      <div class=container_12>
        <div class=grid_12>
          <h1><?=$studentDet['S_NAME']?> School Fees</h1>
        </div>
        <div class=grid_12>
          <div class=block-border>
            <div class=block-header> <span></span> </div>
            <form id="formSchoolFees" class="block-content form" action="../_controller/student-controller.php?action=addStudentFees" method=post  >
<!--            <form id="formSchoolFees" class="block-content form" action="school_fees_r_print.php" method=post  >    -->
                
				<input type="hidden" name="S_ID" id="S_ID" value="<?=$S_ID?>" >
				<input type="hidden" name="L_YEAR" id="L_YEAR" value="<?=$studentFees['SF_YEAR']?>" >
				<input type="hidden" name="L_MONTH" id="L_MONTH" value="<?=$studentFees['SF_MONTH']?>" >
				

              <fieldset>
                <legend>School Fees</legend>
               <?php if(isset($studentFees['SF_YEAR'])) { ?>
               <div class=_100>
                  <p>
                   <b>last payment : <?=$MONTHS[$studentFees['SF_MONTH']-1]?> <?=$studentFees['SF_YEAR']?> </b> <?php if($defMonths>0) { ?> <span style="color:#F00; margin-left:50px;">Due payment <?=$defMonths?> Months</span> <? } else { ?> <span style="color:#0C0; margin-left:50px;">Paid for next <?=$defMonths*(-1)?> Months</span><? } ?>
                  </p>
               </div>   
               <? } ?>
                <div class=_50>
                  <p>
                   <label for=S_NAME>Year</label>
                    <select name="SF_YEAR" id="SF_YEAR" class=required >
                    	<option value="">Select Year</option>
                        <?php for($i=$currYear-2;$i<$currYear+10;$i++) { ?>
                        <option value="<?=$i?>" <?php if(isset($studentFees['SF_YEAR']) && $studentFees['SF_YEAR']==$i) echo "selected"; ?> ><?=$i?></option>
						<? } ?>
                    </select>
                  </p>
                </div>
                <div class=_50>
                  <p>
                   <label for=S_NAME>Month</label>
                    <select name="SF_MONTH" id="SF_MONTH" class=required >
                    	<option value="">Select Month</option>
                        <?php for($i=0;$i<count($MONTHS);$i++) { ?>
                        <option value="<?=$i+1?>"  <?php if(isset($studentFees['SF_MONTH']) && $studentFees['SF_MONTH']==$i+1) echo "selected"; ?> ><?=$MONTHS[$i]?></option>
                        <? } ?>
                    </select>
                  </p>
                </div>
                
              </fieldset>
               
                <div id="messageBox" style="margin-bottom:10px;"><?php if(isset($_REQUEST['msg'])) { ?> <div class="MessageBoxOkAll">Successfully Updated!</div> <? } ?></div>
   
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
				/*dataString = $("#formSchoolFees").serialize()+'&action=addStudentFees';
		$.post("../_controller/student-controller.php",dataString,
		function(data){
			//alert(data);
            $('#messageBox').removeClass().addClass('MessageBoxOkAll').html("Successfully saved.");
			$.jGrowl("Successfully saved.", { theme: 'success' });
		});*/
			
			form.formSchoolFees.submit();
		}
		
			
});
			
		var validateform = $("#formSchoolFees").validate();
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