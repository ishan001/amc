<?php
class ACCOMMODATION {
	
	static function addHotel()
	{
		$sql = "INSERT INTO hotel SET  H_TYPE = '".$_REQUEST['H_TYPE']."', H_NAME = '".$_REQUEST['H_NAME']."', H_EMAIL = '".$_REQUEST['H_EMAIL']."'  , H_WEB = '".$_REQUEST['H_WEB']."', H_PHONE = '".$_REQUEST['H_PHONE']."',H_ROOM_PRICE = '".$_REQUEST['H_ROOM_PRICE']."' , H_ADDRESS = '".$_REQUEST['H_ADDRESS']."' ,H_COUNTRY = '".$_REQUEST['H_COUNTRY']."' ,H_CITY = '".$_REQUEST['H_CITY']."',H_LONGI = '".$_REQUEST['H_LONGI']."',H_LATITUDE = '".$_REQUEST['H_LATITUDE']."', H_OVERVIEW = '".$_REQUEST['H_OVERVIEW']."' , H_ACCOMMODATION = '".$_REQUEST['H_ACCOMMODATION']."' , H_DINING = '".$_REQUEST['H_DINING']."' , H_ENTERTAINMENT = '".$_REQUEST['H_ENTERTAINMENT']."' , H_FACILITIES = '".$_REQUEST['H_FACILITIES']."'    ";
		$res = MySQL :: query($sql);	
		if(MySQL :: countAffected()>0)
			return MySQL :: getLastId();
		else
			return false;	
	}
	static function getCountries()
	{
		$sql = " SELECT * FROM countries " ;
		$res = MySQL :: query($sql);	
		return $res->rows;
	
	}
	static function getHotelImages($H_ID)
	{
		$sql = " SELECT * FROM hotel_images WHERE HI_H_ID = '".$H_ID."' " ;
		$res = MySQL :: query($sql);	
		return $res->rows;			
	}
	static function getHoteldet($H_ID)
	{
		$sql = " SELECT * FROM hotel WHERE H_ID = '".$H_ID."' " ;
		$res = MySQL :: query($sql);	
		return $res->row;		
	}
	static function deleteHotelImage()
	{
		$sql = " SELECT * FROM hotel_images WHERE HI_ID = '".$_REQUEST['imgId']."'   ";	
		$res = MySQL :: query($sql);
		$row = $res->row;
						
		$sql = " DELETE FROM hotel_images WHERE HI_ID = '".$_REQUEST['imgId']."'   ";	
		$res = MySQL :: query($sql);
		if(MySQL :: countAffected()>0)
		{
			if(file_exists("../../upload/hotel/".$row['GI_NAME']))	
				unlink("../../upload/hotel/".$row['GI_NAME']);
			if(file_exists("../../upload/hotel/thumb/".$row['GI_NAME']))	
				unlink("../../upload/hotel/thumb/".$row['GI_NAME']);	
		}
		return true;
	}
	static function getHotels()
	{
		$sql = " SELECT * FROM hotel " ;
		$res = MySQL :: query($sql);	
		return $res->rows;			
	}
	static function editHotel()
	{
		$sql = "UPDATE hotel SET  H_TYPE = '".$_REQUEST['H_TYPE']."', H_NAME = '".$_REQUEST['H_NAME']."', H_EMAIL = '".$_REQUEST['H_EMAIL']."'  , H_WEB = '".$_REQUEST['H_WEB']."', H_PHONE = '".$_REQUEST['H_PHONE']."',H_ROOM_PRICE = '".$_REQUEST['H_ROOM_PRICE']."' , H_ADDRESS = '".$_REQUEST['H_ADDRESS']."' ,H_COUNTRY = '".$_REQUEST['H_COUNTRY']."' ,H_CITY = '".$_REQUEST['H_CITY']."',H_LONGI = '".$_REQUEST['H_LONGI']."',H_LATITUDE = '".$_REQUEST['H_LATITUDE']."', H_OVERVIEW = '".$_REQUEST['H_OVERVIEW']."' , H_ACCOMMODATION = '".$_REQUEST['H_ACCOMMODATION']."' , H_DINING = '".$_REQUEST['H_DINING']."' , H_ENTERTAINMENT = '".$_REQUEST['H_ENTERTAINMENT']."' , H_FACILITIES = '".$_REQUEST['H_FACILITIES']."' WHERE H_ID = '".$_REQUEST['H_ID']."'    ";

echo $sql;die();
		$res = MySQL :: query($sql);	
		return true;		
	}
}
?>