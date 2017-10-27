<?php 
session_start();
include_once("../_system/_config/config.php");
if(!isset($_SESSION['AMCB_admin_id']))
	header('location:index.php');

include_once(REAL_PATH."_system/_database/mysql.php");	
include_once(REAL_PATH."_system/_class/common.class.php");	
include_once(REAL_PATH."_system/_class/array.class.php");
require_once(REAL_PATH.'_system/_class/teacher.class.php');

$subs = COMMON :: getSubjects();

$T_ID = (int) $_REQUEST['T_ID'];

$teacherDet = TEACHER :: getTeacherDet($T_ID);
$disSubs = TEACHER :: getEditClassTeacherSubs($T_ID);

function checkClass($ary, $val)
{
	foreach($ary as $rowAry)
	{
		if($rowAry['TC_GRADE']==$val)
			echo "checked";	
	}
}
unset($_SESSION['teacherProImg']);
$array = array("1A", "1B", "1C", "2A","2B", "2C","3A","3B", "3C","4A","4B", "4C");
?>

<!doctype html>
<!--[if lt IE 7]><html class="no-js ie6 oldie" lang=en><![endif]--><!--[if IE 7]><html class="no-js ie7 oldie" lang=en><![endif]--><!--[if IE 8]><html class="no-js ie8 oldie" lang=en><![endif]--><!--[if gt IE 8]><!--> <html class=no-js lang=en> <!--<![endif]-->

<head>
<meta charset=utf-8>
<link rel=dns-prefetch href="//fonts.googleapis.com">
<meta http-equiv=X-UA-Compatible content="IE=edge,chrome=1">
<title>Ave Maria Convent Branch  :: Update Teacher</title>
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
<script language="javascript">

function subjectsDisplay(val)
{
	var arr = ["1A", "1B", "1C", "2A","2B", "2C","3A","3B", "3C","4A","4B", "4C"];
	if(jQuery.inArray(val,arr) > -1)
	{
		$('#subjectsWrap').hide();
		$('#subject1').removeClass();
	}
	else
	{
		$('#subjectsWrap').show();
		$('#subject1').addClass('required');
	}
	
}

</script>
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
        <li><a href="<?=URL?>teachers" title=Home>Teachers</a></li>
        <li class=no-hover>Update Teacher</li>
      </ul>
    </div>
    <div class="shadow-bottom shadow-titlebar"></div>
    <div id=main-content>
      <div class=container_12>
        <div class=grid_12>
          <h1>Update Teacher</h1>
        </div>
        <div class=grid_12>
          <div class=block-border>
            <div class=block-header> <span></span> </div>
            <form id="formTeacher" class="block-content form" action="" method=post enctype="multipart/form-data" >
            <input type="hidden" name="T_ID" id="T_ID" value="<?=$T_ID?>"  />
              <fieldset>
                <legend>Teacher Details</legend>
                <div class=_50>
                  <p>
                   <label for=T_NAME>Teacher Name</label>
                    <input type="text" id="T_NAME" name="T_NAME" class=required value="<?=$teacherDet['T_NAME']?>" />
                  </p>
                </div>
                <div class=_50>
                  <p>
                    <label for=T_JOINED_DATE>Teacher Joined Date</label>
                    <input id=T_JOINED_DATE type=text  name="T_JOINED_DATE" class=required value="<?=$teacherDet['T_JOINED_DATE']?>" />
                  </p>
                </div>
                 <div class=_50>
                  <p>
                   <label for=T_CONTACT>Contact No</label>
                    <input type="text" id="T_CONTACT" name="T_CONTACT"  value="<?=$teacherDet['T_CONTACT']?>"/>
                  </p>
                </div>
                <div class=_50>
                  <p>
                   <label for=T_EMAIL>Email</label>
                    <input type="text" id="T_EMAIL" name="T_EMAIL" value="<?=$teacherDet['T_EMAIL']?>" />
                  </p>
                </div>
                <div class=_50>
                  <p>
                    <label for=T_QUALIFICATION>Qualification</label>
                    <textarea id=T_QUALIFICATION name=T_QUALIFICATION  rows=5 cols=40><?=$teacherDet['T_QUALIFICATION']?></textarea>
                  </p>
                </div>
                <div class=_50>
                  <p>
                    <label for=T_JOINED_DATE>Class Teacher</label>
                    <select name="T_CLASS_TECH" id="T_CLASS_TECH" onChange="subjectsDisplay(this.value)" >
                        				<option value="">Select Class</option>
                                        <?php for($i=0;$i<count($GRADS);$i++) { ?>
                                        <option value="<?=$GRADS[$i]?>" <?php if($GRADS[$i]==$teacherDet['T_CLASS_TECH']) echo "selected" ; ?> ><?=$GRADS[$i]?></option>	
										<? } ?>	
                        </select>
                  </p>
                </div>
                <div class=_50>
                  <p>
                   <label for=T_JOINED_DATE>Profile Picture</label>
 <input id="fileToUpload" type="file" size="45" name="fileToUpload" class="input"><button class="button" id="buttonUpload" onClick="return ajaxFileUpload();" style="height:26px;" >Upload</button>
 
 <div id='preview'>
 <img id="loading" src="../images/loader.gif" style="display:none;">
 <img id="proImg" src="../../upload/teachers/<?=$teacherDet['T_PRO_PIC']?>" >
</div>

                  </p>
                </div>
                 <div class=_100>
                  <p>
                    <label for= T_DESCRIPTION>About Teacher</label>
                    <textarea id=T_DESCRIPTION name=T_DESCRIPTION  rows=5 cols=40><?=$teacherDet['T_DESCRIPTION']?></textarea>
                    <script type="text/javascript">
					CKEDITOR.replace( 'T_DESCRIPTION',
						{
							extraPlugins : 'uicolor',
							uiColor: '#d2d2d2',			
						} );
				</script>
                  </p>
                </div>
              </fieldset>
              
              <div id="subjectsWrap" <?php if(in_array($teacherDet['T_CLASS_TECH'], $array)) { ?> style="display:none" <? } ?> >
              <?php $k=1; foreach($disSubs as $rowSub) { 
					  $teacherClass = TEACHER :: getTeacherClassDet($T_ID,$rowSub['TC_S_ID']);
					  ?>
               <fieldset>
                <legend>Subject <?=$k?></legend>
                 <div class=_50>
                  <p>
                    <label for=subject<?=$k?>>Subject</label>
                    <select name="subject<?=$k?>" id="subject<?=$k?>"  >
                                	<option value="">Select Subject <?=$k?></option>
                                    
                               
                            <?php foreach($subs as $rowSubs) { ?>
                                <option value="<?=$rowSubs['SB_ID']?>" <?php if($rowSub['TC_S_ID']==$rowSubs['SB_ID']) echo "selected"; ?> ><?=$rowSubs['SB_NAME']?></option>
                        	<? } ?>
                         </select>
                  </p>
                </div>
                
                <div class=_50>
                  <p>
                    <label for=subject<?=$k?>>Grades</label>
                    <?php for($i=0;$i<count($GRADS);$i++) { ?>
                        
                        <span style="width:60px; float:left" >
                        		<input type="checkbox" name="grades<?=$k?>[]" id="grades<?=$k?>[]" value="<?=$GRADS[$i]?>"  <?php checkClass($teacherClass ,$GRADS[$i]); ?>  /> <?=$GRADS[$i]?></span>
                        <? } ?>
                  </p>
                </div>
               </fieldset> 
               
              <? $k++; } 
					 if($k!=4) {
						 for($j=$k;$j<5;$j++){
					 ?>  
             
              <fieldset>
                <legend>Subject <?=$j?></legend>
                 <div class=_50>
                  <p>
                    <label for=subject<?=$j?>>Subject</label>
                    <select name="subject<?=$j?>" id="subject<?=$j?>" >
                                	<option value="">Select Subject <?=$j?></option>
                                    
                               
                            <?php foreach($subs as $rowSubs) { ?>
                                <option value="<?=$rowSubs['SB_ID']?>"><?=$rowSubs['SB_NAME']?></option>
                        	<? } ?>
                         </select>
                  </p>
                </div>
                <div class=_50>
                  <p>
                    <label for=grades<?=$j?>>Grades</label>
                    <?php for($i=0;$i<count($GRADS);$i++) { ?>
                        
                        <span style="width:60px; float:left" >
                        		<input type="checkbox" name="grades<?=$j?>[]" id="grades<?=$j?>[]" value="<?=$GRADS[$i]?>"  /> <?=$GRADS[$i]?></span>
                        <? } ?>
                  </p>
                </div>
               </fieldset> 
               
                 <? } } ?>   
                  </div> 
               
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
<script type="text/javascript" src="<?=URL?>js/ajaxfileupload.js"></script>
<script type="text/javascript" >
function ajaxFileUpload()
	{
		$("#loading")
		.ajaxStart(function(){
			$(this).show();
			$('#proImg').hide();
		})
		.ajaxComplete(function(){
			$(this).hide();
		});

		$.ajaxFileUpload
		(
			{
				url:'upload-file.php',
				secureuri:false,
				fileElementId:'fileToUpload',
				dataType: 'json',
				data:{name:'logan', id:'id'},
				success: function (data, status)
				{
					if(typeof(data.error) != 'undefined')
					{
						if(data.error != '')
						{
							alert(data.error);
						}else
						{
							$('#preview').html(' <img  src="../../upload/teachers/'+data.msg+'" >');
							//alert(data.msg);
						}
					}
				},
				error: function (data, status, e)
				{
					alert(e);
				}
			}
		)
		
		return false;

	}
</script>

<script language="javascript">
$().ready(function() {
		$.validator.setDefaults({
			submitHandler: function(e) {
				$('#messageBox').removeClass().addClass('MessageBoxWarningAll').html("Updating...");
				var des = escape(CKEDITOR.instances.T_DESCRIPTION.getData());
				dataString = $("#formTeacher").serialize()+'&action=editTeacher&T_DESCRIPTION='+des;
			
		$.post("../_controller/teacher-controller.php",dataString,
		function(data){
            $('#messageBox').removeClass().addClass('MessageBoxOkAll').html("Successfully Updated.");
		});
			
		}
		 
			
});
$( "#T_JOINED_DATE" ).datepicker();			
		var validateform = $("#formTeacher").validate();
			$(" input:checkbox, input:text, input:password, input:radio, input:file, textarea").uniform();
	});
clearNavMenu();
$('#nav_teacher').addClass('current');	
$('#nav_teacher_addnew').addClass('current');	
$('#nav_teacher').parent().addClass('expand');
</script> 

<!--[if lt IE 7 ]><script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script> <script>window.attachEvent("onload",function(){CFInstall.check({mode:"overlay"})});</script><![endif]-->
</body>
</html>