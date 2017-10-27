
<!--<div id="slider1" class="sliderwrapper">
  <div class="contentdiv"><a href="#"><img src="images/banners/1.jpg" alt="" /></a></div>
  <div class="contentdiv"><a href="#"><img src="images/banners/2.jpg" alt="" /></a></div>
  <div class="contentdiv"><a href="#"><img src="images/banners/3.jpg" alt="" /></a></div>
  <div class="contentdiv"><a href="#"><img src="images/banners/4.jpg" alt="" /></a></div>
  <div class="contentdiv"><a href="#"><img src="images/banners/5.jpg" alt="" /></a></div>
</div>-->
<script type="text/javascript" src="<?=URL;?>js/jquery.wt-rotator.js"></script>
<script type="text/javascript" src="<?=URL;?>js/jquery.lavalamp.min.js"></script>
<script type="text/javascript"> 
		$(document).ready(	
			function() {
				var $container = $(".sliderwrapper");
				$container.wtRotator({
					width:960,
					height:369,
					button_width:24,
					button_height:24,
					button_margin:4,
					auto_start:true,
					delay:6000,
					transition:"random",
					transition_speed:800,
					block_size:75,
					vert_size:55,
					horz_size:50,
					cpanel_align:"BR",
					display_thumbs:false,
					display_dbuttons:false,
					display_playbutton:false,
					display_tooltip:true,
					display_numbers:true,
					display_timer:false,
					mouseover_pause:false,
					cpanel_mouseover:false,
					text_mouseover:false,
					text_effect:"fade",
					shuffle:false,
					block_delay:25,
					vstripe_delay:75,
					hstripe_delay:150
				});
				
			
			}
		);
    </script>
    <div class="sliderwrapper" id="slider1">
        <div class="wt-rotator"> <a href="#"></a>
          <div class="descrip"></div>
          <div class="preloader"></div>
          <div class="c-panel">
            <div class="buttons">
              <div class="prev-btn"></div>
              <div class="play-btn"></div>
              <div class="next-btn"></div>
            </div>
            <div class="thumbnails">
              <ul>
                <li> <a href="<?=URL;?>images/banners/1.jpg"></a> </li>
                <li> <a href="<?=URL;?>images/banners/2.jpg" ></a> </li>
                <li> <a href="<?=URL;?>images/banners/3.jpg" ></a> </li>
                <li> <a href="<?=URL;?>images/banners/4.jpg" ></a> </li>
                <li> <a href="<?=URL;?>images/banners/5.jpg" ></a> </li>
              </ul>
            </div>
          </div>
        </div>
      </div>