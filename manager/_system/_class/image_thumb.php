<?php
function createThumb($source,$dest,$thumb_width,$thumb_height,$extension) {
		 
	//check whether this is a valid image

	$uploadedfile = $source;
	if($extension=="jpg" || $extension=="jpeg" )
	{
		$uploadedfile = $source;
		$src = imagecreatefromjpeg($uploadedfile);
	}
	else if($extension=="png")
	{
		$uploadedfile = $source;
		$src = imagecreatefrompng($uploadedfile);
	}
	else 
	{
		$uploadedfile = $source;
		$src = imagecreatefromgif($uploadedfile);
	}
		
	list($width,$height) = getimagesize($source);

	if($width > $thumb_width)	
	{
/*		if($width>=$height) {
			$new_width = $thumb_width;
			$diff=$new_width/$width;
			$new_height=$height*$diff;
		}
				  
		if($height>=$width) {
			$new_height = $thumb_height;
			$diff=$new_height/$height;
			$new_width=$width*$diff;
		}
		$new_im = imagecreatetruecolor($new_width,$new_height);
		$im = imagecreatefromjpeg($source);
		imagecopyresampled($new_im,$im,0,0,0,0,$new_width,$new_height,$width,$height);
				  
					
		if(imagejpeg($new_im,$dest,100))
			return true;
		else 
			return false;*/
			
		$newwidth=$thumb_width;
		$newheight=($height/$width)*$newwidth;
		$tmp=imagecreatetruecolor($newwidth,$newheight);

		imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height);
		$filename = $dest;

		imagejpeg($tmp,$filename,100);
		imagedestroy($src);
		imagedestroy($tmp);	
			
	}
	
	else
	{
		move_uploaded_file($source,$dest);	
		return true;
	}

}


?>