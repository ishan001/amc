<?php 
session_start();
include_once("../_system/_config/config.php");
if(!isset($_SESSION['AMCB_admin_id']))
	header('location:index.php');

require_once(REAL_PATH.'_system/_class/common.class.php');
require_once(REAL_PATH.'_system/_database/mysql.php');

$G_ID = (int) $_REQUEST['G_ID'];
$GImgs = COMMON :: getGalImages($G_ID);

$galDet = COMMON :: getGalleryDet($G_ID);

?>
<!doctype html>
<!--[if lt IE 7]><html class="no-js ie6 oldie" lang=en><![endif]--><!--[if IE 7]><html class="no-js ie7 oldie" lang=en><![endif]--><!--[if IE 8]><html class="no-js ie8 oldie" lang=en><![endif]--><!--[if gt IE 8]><!--> <html class=no-js lang=en> <!--<![endif]-->

<head>
<meta charset=utf-8>
<link rel=dns-prefetch href="//fonts.googleapis.com">
<meta http-equiv=X-UA-Compatible content="IE=edge,chrome=1">
<title>Ave Maria Convent Branch  :: Upload  Gallery Images</title>
<link href="favicon.ico" rel="shortcut icon"/>
<meta name=description content="">
<meta name=author content="">
<meta name=viewport content="width=device-width,initial-scale=1">

<link href="//fonts.googleapis.com/css?family=PT+Sans" rel=stylesheet type="text/css">

<style type="text/css" media="screen">
@import url("<?=URL?>css/main.css");
@import url("<?=URL?>css/message_styles.css");
@import url("<?=URL?>css/image-uploading.css");
@import url("<?=URL?>css/jquery.alerts.css");
</style>
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
        <li class=hover><a href="<?=URL?>hotel">Gallery</a></li><li class=no-hover>Upload  Gallery Images</li>
      </ul>
    </div>
    <div class="shadow-bottom shadow-titlebar"></div>
    <div id=main-content>
      <div class=container_12>
        <div class=grid_12>
          <h1>Upload  Gallery Images - <?=$galDet['G_NAME']?></h1>
        </div>
        <div class=grid_12>
          <div class=block-border>
            <div class=block-header> <span></span> </div>
            <div class="block-content">
             	<div id="mainDivImage">
            	 	<div id="disimages">
                    	<div class="block">
                        	<div class="block_content">
                            	<ul class="imglist" id="files">
                  <?php 
				  		foreach($GImgs as $rowImg) { ?>
                    <li id="<?=$rowImg['GI_ID']?>"> <img src="<?=URL_ORI?>upload/gallery/thumb/<?=$rowImg['GI_NAME']?>"  />
                      <ul>
                        <li class="delete"><a href="javascript:ConfirmDelete('<?=$rowImg['GI_ID']?>')" >Delete</a></li>
                      </ul>
                    </li>
                    <? } ?>
                    
                    
                    
                  </ul>
                            </div>
                        </div>
                        <div id="imageUploadDiv" class="imageUploadClass" >
                        	<div class="TextBoldTahoma145" id="showLimitaion">Allowed file formats: *.JPG, *.JPEG,*.BMP</div>
                            <div class="TextBoldTahoma145" id="progressDiv2"></div>
                            <div id="upload_area"><div id="upload" >Upload File</div><span id="status" ></span></div>
                        </div>
                        <div  id="buttonNextDiv"><input type="hidden"  name="G_ID" id="G_ID" value="<?=$G_ID;?>"  /></div>
                        
                    </div>
             	</div>
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
<script type="text/javascript" src="<?=URL?>js/ajaxupload.3.5.js"></script>
<script src="<?=URL?>js/jquery.alerts.js" language="javascript"></script>
<script language="javascript" >
$(function () {
	
		var btnUpload=$('#upload');
		var status=$('#status');
		new AjaxUpload(btnUpload, {
			action: 'upload-file.php',
			name: 'uploadfile',
			G_ID: '<?=$G_ID?>',
			onSubmit: function(file, ext){
				 if (! (ext && /^(jpg|png|jpeg|gif)$/.test(ext))){ 
                    // extension is not allowed 
					status.text('Only JPG, PNG or GIF files are allowed');
					return false;
				}
				status.html('<img src="../images/image_uploader/loader_light_blue.gif" />');
			},
			onComplete: function(file, response){
				//On completion clear the status
				//alert(response);
				status.text('');
				var str = response.split(",");
				$('#files').append('<li id='+str[1]+'><img src="../../upload/gallery/thumb/'+str[0]+'"   /><ul><li class="delete"><a href="javascript:ConfirmDelete(\''+str[1]+'\')">Delete</a></li></ul></li>');
			}
		});

		
});

function ConfirmDelete(img_id_val)
{
	var messageBox='#messageBox';
	jConfirm("Are you sure you want to delete this Image", "Delete Image ", function(r) {
	
		if(r)
		{
			$.post("../_controller/common-controller.php",{action:'deleteGalleryImage',imgId:img_id_val},function(data)
				{
					if(data=='ok'){
							$('#'+img_id_val).remove();
						}
				});
		}

	});
}
clearNavMenu();
$('#nav_desti').addClass('current');	
$('#nav_desti_addnew').addClass('current');	
$('#nav_desti').parent().addClass('expand');
</script>

<!--[if lt IE 7 ]><script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script> <script>window.attachEvent("onload",function(){CFInstall.check({mode:"overlay"})});</script><![endif]-->
</body>
</html>