<?php 
session_start();
include_once("_system/_config/config.php");
if(!isset($_SESSION['AMCB_admin_id']))
	header('location:../index.php');

include_once(REAL_PATH."_system/_database/mysql.php");	
include_once(REAL_PATH."_system/_class/common.class.php");	


$subs = COMMON :: getSubjects();
?>
<!doctype html>
<!--[if lt IE 7]><html class="no-js ie6 oldie" lang=en><![endif]--><!--[if IE 7]><html class="no-js ie7 oldie" lang=en><![endif]--><!--[if IE 8]><html class="no-js ie8 oldie" lang=en><![endif]--><!--[if gt IE 8]><!--> <html class=no-js lang=en> <!--<![endif]-->

<head>
<meta charset=utf-8>
<link rel=dns-prefetch href="//fonts.googleapis.com">
<meta http-equiv=X-UA-Compatible content="IE=edge,chrome=1">
<title>Ave Maria Convent Branch  :: Subjects</title>
<link href="favicon.ico" rel="shortcut icon"/>
<meta name=description content="">
<meta name=author content="">
<meta name=viewport content="width=device-width,initial-scale=1">
<style type="text/css" media="screen">
@import url("<?=URL?>css/main.css");
@import url("<?=URL?>css/message_styles.css");
@import url("<?=URL?>css/new_style.css");
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
        <li><a href="home.php" title=Home><span id=bc-home></span></a></li>
        <li class=no-hover>Subjects</li>
      </ul>
    </div>
    <div class="shadow-bottom shadow-titlebar"></div>
    <div id=main-content>
      <div class=container_12>
      <div class=grid_12>
          <h1>Subjects</h1>
        </div>
        <div class=grid_6 id="addSubject">
          <div class=block-border>
            <div class=block-header>
              <h1>Add Subject</h1>
              <span></span> </div>
            <form id=formAddSub name="formAddSub" class="block-content form" action="" method=post>
              <div class=_100>
                <p>
                  <label for=SB_NAME>Subject</label>
                  <input id=SB_NAME name=SB_NAME class=required type=text value=""/>
                </p>
              </div>
              <div id="messageBoxAdd"></div>

              <div class=clear></div>
              <div class=block-actions>
                <ul class=actions-left>
                  
                </ul>
                <ul class=actions-right>
                  <li>
                    <input type=submit class=button value="Save">
                  </li>
                </ul>
              </div>
            </form>
          </div>
        </div>
        <div class=grid_6 id="editSubject" style="display:none">
          <div class=block-border>
            <div class=block-header>
              <h1>Update Subject</h1>
              <span></span> </div>
            <form id=formEdidSub name="formEdidSub" class="block-content form" action="" method=post>
            <input type="hidden" id="S_ID" name="S_ID"   />
              <div class=_100>
                <p>
                  <label for=E_S_NAME>Subject</label>
                  <input id=E_S_NAME name=E_S_NAME class=required type=text value=""/>
                </p>
              </div>
              
				<div id="messageBoxedit"></div>
              <div class=clear></div>
              <div class=block-actions>
                <ul class=actions-left>
                  <li><a class="button red"  href="javascript:addSubject();">Add New Subject</a></li>
                </ul>
                <ul class=actions-right>
                  <li>
                    <input type=submit class=button value="Save">
                  </li>
                </ul>
              </div>
            </form>
          </div>
        </div>
        <div class=grid_6>
          <div class=block-border>
            <div class=block-header>
              <h1>Subjects</h1>
              <span></span> </div>
            
              <div class=" block-content ">
                <ul class="tree categories" id="ajaxSubject"  >
                <?php foreach($subs as $rowSubs) { ?>
                  <li style="border-bottom:none" class="tree-item-main parent" > <span class="item box-slide-head"><?=$rowSubs['SB_NAME']?> <span class="cat-links"><a href="javascript:editSubject('<?=$rowSubs['SB_NAME']?>','<?=$rowSubs['SB_ID']?>')" class="cat-edit clickable" title="edit" >edit</a></span></span>
                    
                  </li>
                  <? } ?>
                  
                  
                </ul>
              </div>
              

              <div class=clear></div>
              

          </div>
        </div>
        <div class="clear height-fix"></div>
      </div>
    </div>
  </div>
  <?php include_once(REAL_PATH."_system/_includes/footer.php");?>
</div>
<script src="<?=URL?>js/jquery.min.js"></script> 
<script src='<?=URL?>js/common.js'></script>  
<script defer src='<?=URL?>js/main.js'></script>

<script language="javascript">
$().ready(function() {
	$("select, input:checkbox, input:text, input:password, input:radio, input:file, textarea").uniform();
});
clearNavMenu();
$('#nav_subject').addClass('current');	

$().ready(function() {
		$.validator.setDefaults({
			submitHandler: function(e) {
				if($('#S_ID').val()!="")
				{
					$('#messageBoxedit').removeClass().addClass('MessageBoxWarningAll').html("Submitting...");
					$.post("_controller/common-controller.php",{action:'editSubject',SB_NAME:$('#E_S_NAME').val(),SB_ID:$('#S_ID').val()},function(data)
					{
						loadSubjects();
						$('#messageBoxedit').removeClass().addClass('MessageBoxOkAll').html("Successfully Updated.");
					});
				}
				else
				{
					$('#messageBoxAdd').removeClass().addClass('MessageBoxWarningAll').html("Submitting...");
					$.post("_controller/common-controller.php",{action:'addSubject',SB_NAME:$('#SB_NAME').val()},function(data)
					{
						loadSubjects();
						$('#messageBoxAdd').removeClass().addClass('MessageBoxOkAll').html("Successfully added.");
					});
				}
			
			}
			
		});
		
var validateform = $("#formAddSub").validate();		
var validateform = $("#formEdidSub").validate();
});		

function loadSubjects()
{
	$.post("_controller/common-controller.php",{action:'loadSubjects'},function(data)
		{
			$('#ajaxSubject').html(data);
		});	
}
function editSubject(subval,id)
{
	$('#addSubject').hide(1000);
	$('#E_S_NAME').val(subval);
	$('#S_ID').val(id);
	$('#editSubject').show(1000);
}
function addSubject()
{
	$('#editSubject').hide(1000);
	$('#addSubject').show(1000);	
}
</script> 

<!--[if lt IE 7 ]><script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script> <script>window.attachEvent("onload",function(){CFInstall.check({mode:"overlay"})});</script><![endif]-->
</body>
</html>