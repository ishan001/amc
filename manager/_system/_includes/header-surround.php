<div id=header-surround>
    <header id=header> <img src="<?=URL?>img/logo.png" alt=Grape class=logo>
      <div class="divider-header divider-vertical"></div>
      <span class=btn-info></span>
      

      <div id=user-info>
        <p> <span class=messages>Hello <a href="javascript:void(0);"><?php echo ucfirst($_SESSION['AMCB_admin_name'])?></a>  </span> <a href="<?=URL?>admin-settings.php" class="button">Settings</a> <a href="<?=URL?>_controller/admin-controller.php?action=logout" class="button red">Logout</a> </p>
      </div>
    </header>
  </div>