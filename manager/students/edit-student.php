<?php 
session_start();
include_once("../_system/_config/config.php");
if(!isset($_SESSION['AMCB_admin_id']))
	header('location:index.php');

include_once(REAL_PATH."_system/_database/mysql.php");	
include_once(REAL_PATH."_system/_class/common.class.php");	
include_once(REAL_PATH."_system/_class/array.class.php");
include_once(REAL_PATH."_system/_class/student.class.php");

$subs = COMMON :: getSubjects();
$spts = COMMON :: getSports();
$c_act = COMMON :: getCarricu_act();

$S_ID = (int) $_REQUEST['S_ID'];

$studentDet = STUDENT :: getStudentDet($S_ID);

$subjects = unserialize($studentDet['S_SUBJECTS']);
$sports = unserialize($studentDet['S_SPORTS']);
$exCarri = unserialize($studentDet['S_EXTRA_ACT']);

function checkClass($ary, $val)
{
	
	for($i=0;$i<count($ary);$i++)
	{
		if($ary[$i]==$val)
			echo "checked";	
	}
}
unset($_SESSION['studentProImg']);
$array = array("1A", "1B", "1C", "2A","2B", "2C","3A","3B", "3C","4A","4B", "4C");

 ?>
<!doctype html>
<!--[if lt IE 7]><html class="no-js ie6 oldie" lang=en><![endif]--><!--[if IE 7]><html class="no-js ie7 oldie" lang=en><![endif]--><!--[if IE 8]><html class="no-js ie8 oldie" lang=en><![endif]--><!--[if gt IE 8]><!--> <html class=no-js lang=en> <!--<![endif]-->

<head>
<meta charset=utf-8>
<link rel=dns-prefetch href="//fonts.googleapis.com">
<meta http-equiv=X-UA-Compatible content="IE=edge,chrome=1">
<title>Ave Maria Convent Branch  :: Update Student</title>
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
        <li><a href="<?=URL?>students" title=Home>Students</a></li>
        <li class=no-hover>Update  Student</li>
      </ul>
    </div>
    <div class="shadow-bottom shadow-titlebar"></div>
    <div id=main-content>
      <div class=container_12>
        <div class=grid_12>
          <h1>Update Student</h1>
        </div>
        <div class=grid_12>
          <div class=block-border>
            <div class=block-header> <span></span> </div>
            <form id="formStudent" class="block-content form" action="" method=post enctype="multipart/form-data" >
 				<input type="hidden" name="S_ID" id="S_ID" value="<?=$S_ID?>"  />
              <fieldset>
                <legend>Student Details</legend>
                <div class=_50>
                  <p>
                   <label for=S_NAME>Student Name</label>
                    <input type="text" id="S_NAME" name="S_NAME" class=required value="<?=$studentDet['S_NAME']?>"  />
                  </p>
                </div>
                <div class=_50>
                  <p>
                   <label for=S_AD_ID>Student Admission No (Student Login ID)</label>
                    <input type="text" id="S_AD_ID" name="S_AD_ID" readonly class=required value="<?=$studentDet['S_AD_ID']?>"  />
                  </p>
                </div>
                <div class=_50>
                  <p>
                    <label for=S_GRADE>Current Grade</label>
                    <select name="S_GRADE" id="S_GRADE" class=required onChange="subjectsDisplay(this.value)" >
                        				<option value="">Select Grade</option>
                    <?php for($i=0;$i<count($GRADS);$i++) { ?>
                                        <option value="<?=$GRADS[$i]?>" <?php if($GRADS[$i]==$studentDet['S_GRADE']) echo "selected"; ?> ><?=$GRADS[$i]?></option>	
										<? } ?>	
                                        </select>
                  </p>
                </div>
                <div class=_50>
                  <p>
                    <label for=S_JOIN_DATE>Student Joined Date</label>
                    <input id=S_JOIN_DATE type=text  name="S_JOIN_DATE"  value="<?=$studentDet['S_JOIN_DATE']?>"  />
                  </p>
                </div>
                
                
                
                <div class=_50>
                  <p>
                   <label for=T_JOINED_DATE>Profile Picture</label>
 <input id="fileToUpload" type="file" size="45" name="fileToUpload" class="input"><button class="button" id="buttonUpload" onClick="return ajaxFileUpload();" style="height:26px;" >Upload</button>
 
 

                  </p>
                </div>
                <div class=_50>
                <div id='preview'>
 <img id="loading" src="../images/loader.gif" style="display:none;">
  <img id="proImg" src="../../upload/students/<?=$studentDet['S_PRO_PIC']?>" >
</div>
                </div>
                 <div class=_100>
                  <p>
                    <label for= T_DESCRIPTION>About Student</label>
                    <textarea id=S_DESCRIPTION name=S_DESCRIPTION  rows=5 cols=40><?=$studentDet['S_DESCRIPTION']?></textarea>
                    <script type="text/javascript">
					CKEDITOR.replace( 'S_DESCRIPTION',
						{
							extraPlugins : 'uicolor',
							uiColor: '#d2d2d2',			
						} );
				</script>
                  </p>
                </div>
              </fieldset>
              
               <div id="subjectsWrap" <?php if(in_array($studentDet['S_GRADE'], $array)) { ?> style="display:none" <? } ?> > 
              <fieldset>
                <legend>Subjects</legend>
                 <div class=_100>
                  <p>
                    <?php foreach($subs as $rowSubs) { ?>                       
                        <span style="width:150px; float:left" >
                        		<input type="checkbox" name="S_SUBJECTS[]" id="S_SUBJECTS[]" value="<?=$rowSubs['SB_ID']?>" <?php checkClass($subjects ,$rowSubs['SB_ID']); ?> /> <?=$rowSubs['SB_NAME']?></span>
                        <? } ?>
                  </p>
                </div>
                
               </fieldset>
               
               </div> 
               <fieldset>
                <legend>Sports</legend>
                 <div class=_100>
                  <p>
                    <?php foreach($spts as $rowSpt) { ?>                       
                        <span style="width:150px; float:left" >
                        		<input type="checkbox" name="S_SPORTS[]" id="S_SPORTS[]" value="<?=$rowSpt['SP_NAME']?>" <?php checkClass($sports ,$rowSpt['SP_NAME']); ?>  /> <?=$rowSpt['SP_NAME']?></span>
                        <? } ?>
                  </p>
                </div>
                
               </fieldset>
               <fieldset>
                <legend>Co-Curriculum Activities & Achievements</legend>
                 <div class=_100>
  					 <p>
                        <textarea  id="S_EXTRA_ACT" name="S_EXTRA_ACT" rows="5" ><?=$studentDet['S_EXTRA_ACT']?></textarea>
 					</p>
                </div>
                 
                
               </fieldset>
               <fieldset>
                <legend>Parent's Contact Details</legend>
                 <div class=_50>
                  <p>
                   <label for=S_P_EMAIL>Contact No</label>
                    <input type="text" id="S_P_CONTACT" name="S_P_CONTACT"  value="<?=$studentDet['S_P_CONTACT']?>" />
                  </p>
                </div>
                <div class=_50>
                  <p>
                   <label for=S_P_EMAIL>Email</label>
                    <input type="text" id="S_P_EMAIL" name="S_P_EMAIL"  value="<?=$studentDet['S_P_EMAIL']?>" />
                  </p>
                </div>
                
               </fieldset>
               
               <fieldset>
                <legend>Change Password</legend>
                <label for=S_P_EMAIL>If you dont want to change the password keep it blank</label>
                 <div class=_50>
                  <p>
                   <label for=S_P_EMAIL>Password</label>
                    <input type="password" id="S_PASSWORD" name="S_PASSWORD"  class=password  />
                  </p>
                </div>
                <div class=_50>
                  <p>
                   <label for=S_P_EMAIL>Confirm Password</label>
                    <input type="password" id="S_C_PASSWORD" name="S_C_PASSWORD" equalTo="#S_PASSWORD"  />
                  </p>
                </div>
                
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
							$('#preview').html(' <img  src="../../upload/students/'+data.msg+'" >');
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
				$('#messageBox').removeClass().addClass('MessageBoxWarningAll').html("Saving...");
				dataString = $("#formStudent").serialize()+'&action=editStudent&S_DESCRIPTION2='+escape(CKEDITOR.instances.S_DESCRIPTION.getData());
		$.post("../_controller/student-controller.php",dataString,
		function(data){
			//alert(data);
            $('#messageBox').removeClass().addClass('MessageBoxOkAll').html("Successfully saved.");
		});
			
		}
		
			
});
$( "#S_JOIN_DATE" ).datepicker();			
		var validateform = $("#formStudent").validate();
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