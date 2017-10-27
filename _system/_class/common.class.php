<?php
class COMMON {
	static  function getAllTeachers()
	{
		$sql = " SELECT * FROM teachers ";	
		$res = MySQL :: query($sql);	
		return $res->rows;		
	}
	static  function getGalleryDetails($G_ID)
	{
		$sql = " SELECT * FROM gallery WHERE G_ID = '".$G_ID."'  ";	
		$res = MySQL :: query($sql);	
		return $res->row;		
	}	
	static function getRandomGalleryImages()
	{
		$sql = " SELECT * FROM gallery ORDER BY RAND() LIMIT 0,4 ";	
		$res = MySQL :: query($sql);
		$retArry = array();
		$i=0;
		foreach($res->rows as $row)
		{
			$retArry[$i]['G_NAME']=$row['G_NAME'];
			$sql2 = " SELECT * FROM gallery_images WHERE GI_G_ID = '".$row['G_ID']."' ORDER BY RAND() LIMIT 0,1 ";	
			$res2 = MySQL :: query($sql2);
			$row2 = $res2->row;
			$retArry[$i]['G_ID']=$row['G_ID'];
			$retArry[$i]['GI_NAME']=$row2['GI_NAME'];
			$i++;
				
		}
		return $retArry;
	}
	static function getRecentNewsHome()
	{
		$sql = " SELECT * FROM news LEFT JOIN news_images ON N_ID = NI_N_ID   group by N_ID order by N_DATE DESC, N_ID DESC  LIMIT 0,3 ";
		$res = MySQL :: query($sql);
		return $res->rows;		
	}
	static function getNewsDet($N_ID)
	{
		$sql = " SELECT * FROM news WHERE N_ID = $N_ID ";	
		$res = MySQL :: query($sql);
		return $res->row;		
	}
	static function getNewsImages($N_ID)
	{
		$sql = " SELECT * FROM news_images WHERE NI_N_ID = $N_ID ";	
		$res = MySQL :: query($sql);
		return $res->rows;		
	}
	
	static function getAllEvents()
	{
		$sql = " SELECT * FROM events ORDER BY E_DATE DESC, E_ID DESC ";
		$res = MySQL :: query($sql);
		return $res->rows;				
	}
	static function getEventDetails($E_ID) 
	{
		$sql = " SELECT * FROM events WHERE E_ID = '".$E_ID."'   ";	
		$res = MySQL :: query($sql);
		return $res->row;		
	}
	static function getRecentEventHome()
	{
		$sql = " SELECT * FROM events ORDER BY E_DATE DESC, E_ID DESC  LIMIT 0,3 ";
		$res = MySQL :: query($sql);
		return $res->rows;		
	}
	static function getContent($C_SEO)
	{
		$sql = " SELECT * FROM content  WHERE C_SEO = '".$C_SEO."'";	
		$res = MySQL :: query($sql);
		return $res->row;		
	}	
	
}

?>