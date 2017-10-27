<aside id=sidebar>
    <div id=search-bar>
      <form id=search-form name=search-form action="javascript:void(0);" method=post>
        <input type=text id=query name=query value="" autocomplete=off placeholder=Search>
      </form>
    </div>
    <section id=login-details> <img class="img-left framed" src="<?=URL?>img/misc/avatar_small.png" alt="Hello Admin">
      <h3>Logged in as</h3>
      <h2><a class=user-button href="javascript:void(0);"><?php echo ucfirst($_SESSION['AMCB_admin_name'])?>&nbsp;<span class=arrow-link-down></span></a></h2>
      <ul class=dropdown-username-menu>
        <li><a href="<?=URL?>admin-settings.php">Settings</a></li>
        <li><a href="<?=URL?>_controller/admin-controller.php?action=logout">Logout</a></li>
      </ul>
      <div class=clearfix></div>
    </section>
    <nav id=nav>
    
      <ul class="menu collapsible shadow-bottom">
      <?php if($_SESSION['AMCB_admin_type']==1) { ?>
        <li><a href="<?=URL?>home.php" class=current id="nav_home"><img src="<?=URL?>img/icons/packs/fugue/16x16/dashboard.png">Dashboard</a></li>
        <li><a href="#" id="nav_teacher"><img src="<?=URL?>img/icons/packs/fugue/16x16/teacher.png">Teachers</a>
        <ul class=sub>
            <li><a href="<?=URL?>teachers/add-teacher.php"  id="nav_teacher_addnew">Add New Teacher</a></li>
            <li><a href="<?=URL?>teachers"  id="nav_teachers_all">Teachers</a></li>
          </ul>
        </li>		 
        <li><a href="<?=URL?>subjects.php" id="nav_subject"><img src="<?=URL?>img/icons/packs/fugue/16x16/subject.png">Subjects</a></li>
        <li><a href="<?=URL?>sports.php" id="nav_sports"><img src="<?=URL?>img/icons/packs/fugue/16x16/sports.png">Sports</a></li>
        <li><a href="<?=URL?>curriculum.php" id="nav_carriculum"><img src="<?=URL?>img/icons/packs/fugue/16x16/activities.png">Curriculum Activities</a></li>
        <?php } ?>
        <li><a href="#" id="nav_student"><img src="<?=URL?>img/icons/packs/fugue/16x16/student.png">Students</a>
        <ul class=sub>
         <?php if($_SESSION['AMCB_admin_type']==1) { ?>
            <li><a href="<?=URL?>students/add-student.php"  id="nav_student_addnew">Add New Student</a></li>
          <?php } ?>  
            <li><a href="<?=URL?>students"  id="nav_student_all">Students</a></li>
          </ul>
        </li>
        <?php if($_SESSION['AMCB_admin_type']==1) { ?>
        <li><a href="#" id="nav_news"><img src="<?=URL?>img/icons/packs/fugue/16x16/news.png">News</a>
        <ul class=sub>
            <li><a href="<?=URL?>news/add-news.php"  id="nav_news_addnew">Add News</a></li>
            <li><a href="<?=URL?>news"  id="nav_news_all">News</a></li>
          </ul>
        </li>
        <li><a href="#" id="nav_events"><img src="<?=URL?>img/icons/packs/fugue/16x16/events.png">Upcoming Events</a>
        <ul class=sub>
            <li><a href="<?=URL?>events/add-event.php"  id="nav_event_addnew">Add Event</a></li>
            <li><a href="<?=URL?>events"  id="nav_events_all">Events</a></li>
          </ul>
        </li>
        <li><a href="#" id="nav_gallery"><img src="<?=URL?>img/icons/packs/fugue/16x16/news.png">Gallery</a>
        <ul class=sub>
            <li><a href="<?=URL?>gallery/add-gallery.php"  id="nav_gallery_addnew">Add Gallery</a></li>
            <li><a href="<?=URL?>gallery"  id="nav_gallery_all">Galleries</a></li>
          </ul>
        </li>
        <li><a href="#" id="nav_content"><img src="<?=URL?>img/icons/packs/fugue/16x16/content.png">Contents</a>
        <ul class=sub>
        	<li><a href="<?=URL?>content/add-content.php"  id="nav_content_addnew">Add Content</a></li>
            <li><a href="<?=URL?>content"  id="nav_content_all">Contents</a></li>
          </ul>
        </li>
        <?php }
		if($_SESSION['AMCB_admin_type']==2) { ?>
		
        <li><a href="#" id="nav_reports"><img src="<?=URL?>img/icons/packs/fugue/16x16/report.png">Reports</a>
        <ul class=sub>
        	<li><a href="<?=URL?>reports/school-fees.php"  id="nav_school_fees">School-fees</a></li>
          </ul>
        </li>
        <li><a href="#" id="nav_reports"><img src="<?=URL?>img/icons/packs/fugue/16x16/fees.png">Fees Settings</a>
        <ul class=sub>
        	<li><a href="<?=URL?>fees-settings.php"  id="nav_school_fees">Fees Settings</a></li>
          </ul>
        </li>
        
        <? } ?>
        

      </ul>
    </nav>
  </aside>