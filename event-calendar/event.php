<?php
include_once("../_system/_config/config.php");
include_once(REAL_PATH."_system/_database/mysql.php");	
$id = $_REQUEST['id'];


  $sql = "SELECT * FROM events WHERE E_ID = '".$id."' ";
  $res = MySQL :: query($sql);
  $row = $res->row;	
  
?>
<div class="gallery" style="  width: 850px;">
          <div class="heading">
            <h2 class="colr"><?=$row['E_TITLE']?></h2>
            <div class="newsDate colr"><?=date("Y-m-d",strtotime($row['E_DATE']))?></div>
            <div class="clear"></div>
          </div>
          <div class="clear"></div>
           <div id="eventWrapper">
           		<div class="details">
                	<h3 class="colr pric"><b>Location:</b>  <?=$row['E_LOCATION'];?></h3>
                    <h3 class="colr pric" style="margin-top:10px;"><b>Date :</b>  <?=date("Y-m-d",strtotime($row['E_DATE']))?> <?=date("h:i A",strtotime($row['E_DATE']))?></h3>
                    <div class="bigtxt txt bold colr" style="margin-top:10px;"> <?=$eveDet['E_DESCRIPTION']?></div>
                </div>
                <div class="picture"><img src="<?=URL?>upload/events/<?=$row['E_IMAGE']?>" ></div>
           </div>
          
          <div class="clear"></div>
          
        </div>
<?php

?>
