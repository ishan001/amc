<div class="col2">
        <div class="rightsext"> 
          <!-- Quick Links -->
          <div class="quicklinks">
            <h4 class="colr heading"><?=$_SESSION['AMCB_NAME']?></h4>
            <div class="stuImg"><img src="<?=URL?>upload/students/thumb/<?=$_SESSION['AMCB_USERPIC']?>"  /></div>
            <div class="stuDet">
            <h5 class="margBt"> Grade <?=$_SESSION['AMCB_GRADE']?></h5>
            <h5 class="margBt"> Admission No: <?=$_SESSION['AMCB_ADMISSION']?></h5>
            <a href="<?=URL?>student">My Profile</a> | <a href="<?=URL?>student/my-results.php">My Results</a> <br class="margBt" /> <a href="<?=URL?>student/my-teachers.php">My Teachers</a><br class="margBt" /><a href="<?=URL?>_controller/student-controller.php?action=logout">Sign out</a>
            </div>
            
            
            
          </div>
        </div>
        <div class="clear"></div>
        <?php include_once(REAL_PATH."_system/_includes/quick_links.php"); ?>
        <div class="clear"></div>
        <!-- Advertisement -->
        <div class="adv"> </div>
      </div>