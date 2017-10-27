<?php 
session_start();
include_once("_system/_config/config.php");
if(!isset($_SESSION['AMCB_admin_id']))
	header('location:../index.php');

include_once(REAL_PATH."_system/_database/mysql.php");	
include_once(REAL_PATH."_system/_class/common.class.php");	


$sports = COMMON :: getSports();
?>
<!doctype html>
<!--[if lt IE 7]><html class="no-js ie6 oldie" lang=en><![endif]--><!--[if IE 7]><html class="no-js ie7 oldie" lang=en><![endif]--><!--[if IE 8]><html class="no-js ie8 oldie" lang=en><![endif]--><!--[if gt IE 8]><!--> <html class=no-js lang=en> <!--<![endif]-->

<head>
<meta charset=utf-8>
<link rel=dns-prefetch href="//fonts.googleapis.com">
<meta http-equiv=X-UA-Compatible content="IE=edge,chrome=1">
<title>Ave Maria Convent Branch  :: Sports</title>
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
        <li class=no-hover>Sports</li>
      </ul>
    </div>
    <div class="shadow-bottom shadow-titlebar"></div>
    <div id=main-content>
      <div class=container_12>
      <div class=grid_12>
          <h1>Sports</h1>
        </div>
        <div class=grid_6 id="addSport">
          <div class=block-border>
            <div class=block-header>
              <h1>Add Sport</h1>
              <span></span> </div>
            <form id=formAddSport name="formAddSport" class="block-content form" action="" method=post>
              <div class=_100>
                <p>
                  <label for=SP_NAME>Sport</label>
                  <input id=SP_NAME name=SP_NAME class=required type=text value=""/>
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
        <div class=grid_6 id="editSport" style="display:none">
          <div class=block-border>
            <div class=block-header>
              <h1>Update Sport</h1>
              <span></span> </div>
            <form id=formEditSport name="formEditSport" class="block-content form" action="" method=post>
            <input type="hidden" id="SP_ID" name="SP_ID"   />
              <div class=_100>
                <p>
                  <label for=E_SP_NAME>Sport</label>
                  <input id=E_SP_NAME name=E_SP_NAME class=required type=text value=""/>
                </p>
              </div>
              
				<div id="messageBoxedit"></div>
              <div class=clear></div>
              <div class=block-actions>
                <ul class=actions-left>
                  <li><a class="button red"  href="javascript:addSport();">Add New Sport</a></li>
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
              <h1>Sports</h1>
              <span></span> </div>
            
              <div class=" block-content ">
                <ul class="tree categories" id="ajaxSport"  >
                <?php foreach($sports as $rowspt) { ?>
                  <li style="border-bottom:none" class="tree-item-main parent" > <span class="item box-slide-head"><?=$rowspt['SP_NAME']?> <span class="cat-links"><a href="javascript:editSport('<?=$rowspt['SP_NAME']?>','<?=$rowspt['SP_ID']?>')" class="cat-edit clickable" title="edit" >edit</a></span></span>
                    
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
$('#nav_sports').addClass('current');	

$().ready(function() {
		$.validator.setDefaults({
			submitHandler: function(e) {
				if($('#SP_ID').val()!="")
				{
					$('#messageBoxedit').removeClass().addClass('MessageBoxWarningAll').html("Submitting...");
					$.post("_controller/common-controller.php",{action:'editSport',SP_NAME:$('#E_SP_NAME').val(),SP_ID:$('#SP_ID').val()},function(data)
					{
						loadSports();
						$('#messageBoxedit').removeClass().addClass('MessageBoxOkAll').html("Successfully Updated.");
					});
				}
				else
				{
					$('#messageBoxAdd').removeClass().addClass('MessageBoxWarningAll').html("Submitting...");
					$.post("_controller/common-controller.php",{action:'addSport',SP_NAME:$('#SP_NAME').val()},function(data)
					{
						loadSports();
						$('#messageBoxAdd').removeClass().addClass('MessageBoxOkAll').html("Successfully added.");
					});
				}
			
			}
			
		});
		
var validateform = $("#formAddSport").validate();		
var validateform = $("#formEditSport").validate();
});		

function loadSports()
{
	$.post("_controller/common-controller.php",{action:'loadSports'},function(data)
		{
			$('#ajaxSport').html(data);
		});	
}
function editSport(subval,id)
{
	$('#addSport').hide(1000);
	$('#E_SP_NAME').val(subval);
	$('#SP_ID').val(id);
	$('#editSport').show(1000);
}
function addSport()
{
	$('#editSport').hide(1000);
	$('#addSport').show(1000);	
}
</script> 

<!--[if lt IE 7 ]><script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script> <script>window.attachEvent("onload",function(){CFInstall.check({mode:"overlay"})});</script><![endif]-->
</body>
</html>