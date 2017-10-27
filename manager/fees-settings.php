<?php 
session_start();
include_once("_system/_config/config.php");
if(!isset($_SESSION['AMCB_admin_id']))
	header('location:index.php');

include_once(REAL_PATH."_system/_database/mysql.php");	
include_once(REAL_PATH."_system/_class/common.class.php");	

$fees = COMMON :: getFeesDetails();

 ?>
<!doctype html>
<!--[if lt IE 7]><html class="no-js ie6 oldie" lang=en><![endif]--><!--[if IE 7]><html class="no-js ie7 oldie" lang=en><![endif]--><!--[if IE 8]><html class="no-js ie8 oldie" lang=en><![endif]--><!--[if gt IE 8]><!--> <html class=no-js lang=en> <!--<![endif]-->

<head>
<meta charset=utf-8>
<link rel=dns-prefetch href="//fonts.googleapis.com">
<meta http-equiv=X-UA-Compatible content="IE=edge,chrome=1">
<title>Ave Maria Convent Branch  :: Fees Settings</title>
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
        <li class=no-hover>Fees Settings</li>
      </ul>
    </div>
    <div class="shadow-bottom shadow-titlebar"></div>
    <div id=main-content>
      <div class=container_12>
        <div class=grid_12>
          <h1>Fees Settings</h1>
        </div>
        <div class=grid_12>
          <div class=block-border>
            <div class=block-header> <span></span> </div>
            <form id="formFees" class="block-content form" action="" method=post  >

              <fieldset>
                <legend>Year</legend>
		<div class=_100>
                  <p>
                   <label for=CUR_PASSWORD>Year</label>
                    <select name="F_YEAR" id="F_YEAR" >
                        <?php for($i=(date("Y")-2);$i<=(date("Y")+2);$i++ ) { ?>
                        <option value="<?=$i?>" <?php if($i==date("Y")) echo "selected";  ?> ><?=$i?></option>                        
                        <? } ?>                
                    </select>
                  </p>
                </div>		
                <div class=_100>
                  <p>
                   <label for=CUR_PASSWORD>Fees Types</label>
                    <select name="F_TYPE" id="F_TYPE" >
                    <option value="1">Grade 1-5</option>
                    <option value="2">Grade 6-9</option>
                    <option value="3">Grade 10-11</option>
                    <option value="4">A/L Art & Com.</option>
                    <option value="5">A/L Scie. & Maths</option>                  
                    </select>
                  </p>
                </div>
                
                <div class=_100>
                  <p>
                   <label for=F_SCHOOL_FEES>School Fees</label>
                    <input type="text" id="F_SCHOOL_FEES" name="F_SCHOOL_FEES"  value="<?=$fees['F_SCHOOL_FEES']?>"  class=required  />
                  </p>
                </div>
                <div class=_100>
                  <p>
                   <label for=F_SECURITY_FEES>Security Fees</label>
                    <input type="text" id="F_SECURITY_FEES" name="F_SECURITY_FEES"  value="<?=$fees['F_SECURITY_FEES']?>"  class=required  />
                  </p>
                </div>
                <div class=_100>
                  <p>
                   <label for=F_FACILITY_FEES>Facility Fees</label>
                    <input type="text" id="F_FACILITY_FEES" name="F_FACILITY_FEES"   value="<?=$fees['F_FACILITY_FEES']?>" class=required  />
                  </p>
                </div>
                <div class=_100>
                  <p>
                   <label for=F_MAINTENANCE>Maintenance</label>
                    <input type="text" id="F_MAINTENANCE" name="F_MAINTENANCE"   value="<?=$fees['F_MAINTENANCE']?>" class=required  />
                  </p>
                </div>
                <div class=_100>
                  <p>
                   <label for=F_EXTRA_EXPENSES>Extra Expenses</label>
                    <input type="text" id="F_EXTRA_EXPENSES" name="F_EXTRA_EXPENSES"   value="<?=$fees['F_EXTRA_EXPENSES']?>" class=required   />
                  </p>
                </div>
              
              </fieldset>
                <div id="messageBox" style="margin-bottom:10px;"></div>

              <div class=clear></div>
              <div class=block-actions>
                <ul class=actions-left>
                  <li></li>
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
				dataString = $("#formFees").serialize()+'&action=saveFees';
		$.post("_controller/common-controller.php",dataString,
		function(data){
			//alert(data);
            $('#messageBox').removeClass().addClass('MessageBoxOkAll').html("Successfully saved.");
			$.jGrowl("Successfully saved.", { theme: 'success' });

		});
			
		}
		
			
});
$( "#N_DATE" ).datepicker();			
		var validateform = $("#formFees").validate();
			$(" input:checkbox, input:text, input:password, input:radio, input:file, textarea").uniform();
	});
clearNavMenu();

</script> 
<script language="javascript" >
$().ready(function() {
    $("#F_YEAR").change( function() {
      $.post("_controller/common-controller.php",{ action: "getFeesValues", F_YEAR: $(this).val(), F_TYPE: $('#F_TYPE').val() } ,
                    function(data){
                            var values = data.split(",");
                            $('#F_SCHOOL_FEES').val(values[0]);
                            $('#F_SECURITY_FEES').val(values[1]);
                            $('#F_FACILITY_FEES').val(values[2]);
                            $('#F_MAINTENANCE').val(values[3]);
                            $('#F_EXTRA_EXPENSES').val(values[4]); 	 	 	

                    });
    });
    $("#F_TYPE").change( function() {
      $.post("_controller/common-controller.php",{ action: "getFeesValues", F_TYPE: $(this).val(), F_YEAR: $('#F_YEAR').val() } ,
                    function(data){
                            var values = data.split(",");
                            $('#F_SCHOOL_FEES').val(values[0]);
                            $('#F_SECURITY_FEES').val(values[1]);
                            $('#F_FACILITY_FEES').val(values[2]);
                            $('#F_MAINTENANCE').val(values[3]);
                            $('#F_EXTRA_EXPENSES').val(values[4]); 	 	 	

                    });
    });
});
</script>
<!--[if lt IE 7 ]><script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script> <script>window.attachEvent("onload",function(){CFInstall.check({mode:"overlay"})});</script><![endif]-->
</body>
</html>