<?php 
session_start();
include_once("../_system/_config/config.php");
if(!isset($_SESSION['AMCB_admin_id']))
	header('location:../index.php');

require_once(REAL_PATH.'_system/_class/common.class.php');
require_once(REAL_PATH.'_system/_database/mysql.php');	

$news = COMMON :: getAllNews();
?>
<!doctype html>
<!--[if lt IE 7]><html class="no-js ie6 oldie" lang=en><![endif]--><!--[if IE 7]><html class="no-js ie7 oldie" lang=en><![endif]--><!--[if IE 8]><html class="no-js ie8 oldie" lang=en><![endif]--><!--[if gt IE 8]><!--> <html class=no-js lang=en> <!--<![endif]-->

<head>
<meta charset=utf-8>
<link rel=dns-prefetch href="//fonts.googleapis.com">
<meta http-equiv=X-UA-Compatible content="IE=edge,chrome=1">
<title>Ave Maria Convent Branch  :: News</title>
<link href="favicon.ico" rel="shortcut icon"/>
<meta name=description content="">
<meta name=author content="">
<meta name=viewport content="width=device-width,initial-scale=1">
<style type="text/css" media="screen">
@import url("<?=URL?>css/main.css");
@import url("<?=URL?>css/message_styles.css");
@import url("<?=URL?>css/jquery.alerts.css");
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
        <li><a href="<?=url?>" title=Home><span id=bc-home></span></a></li>
        <li class=no-hover>News</li>
      </ul>
    </div>
    <div class="shadow-bottom shadow-titlebar"></div>
    <div id=main-content>
      <div class=container_12>
      <div class=grid_12>
          <h1>News</h1>
        </div>
        <div class=grid_12>
          <div class=block-border>
            <div class=block-content>
              <table id=table-all class=table>
                <thead>
                  <tr>
                    <th>Title</th>
                    <th>Date</th>
                    <th>Action</th>
                    

                  </tr>
                </thead>
                <tbody>
                <?php foreach($news as $rowNews) { 	?>
                  <tr >
                    <td><?=$rowNews['N_TITLE']?></td>
                    <td><?=$rowNews['N_DATE']?></td>
                    <td style="text-align:center"> <a href="edit-news.php?N_ID=<?=$rowNews['N_ID']?>"><img src="../images/ico_edit_16.png" title="Edit News" ></a> &nbsp; <a href="upload-images.php?N_ID=<?=$rowNews['N_ID']?>"><img src="../images/icon_upload_16.png" title="Upload News Images" ></a> &nbsp; <a href="javascript:delete_news('<?=$rowNews['N_ID']?>')"><img src="../images/ico_delete_16.png" title="Delete News" ></a></td>

                  </tr>
                  <? } ?>

                </tbody>
              </table>
            </div>
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
<script src="<?=URL?>js/jquery.alerts.js"></script>

<script language="javascript">
$().ready(function() {
	$("select, input:checkbox, input:text, input:password, input:radio, input:file, textarea").uniform();
});
clearNavMenu();
$('#nav_news').addClass('current');	
$('#nav_news_all').addClass('current');	
$('#nav_news').parent().addClass('expand');

function delete_news(n_id)
{
	var messageBox='#messageBox';
	jConfirm("Are you sure you want to delete this News", "Delete News ", function(r) {
	
		if(r)
		{
			$.post("../_controller/common-controller.php",{action:'deleteNews',id:n_id},function(data)
				{
					if(data=='ok'){
							window.location.href = '';
						}
				});
		}

	});
}
</script> 

<!--[if lt IE 7 ]><script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script> <script>window.attachEvent("onload",function(){CFInstall.check({mode:"overlay"})});</script><![endif]-->
</body>
</html>