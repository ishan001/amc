<?php
class DESTINATION {
	static function addDestination()
	{
		$sql = "INSERT INTO destination SET  D_NAME = '".$_REQUEST['D_NAME']."', D_TIME = '".$_REQUEST['D_TIME']."', D_CAPITAL = '".$_REQUEST['D_CAPITAL']."'  , D_LANGUAGE = '".$_REQUEST['D_LANGUAGE']."', D_POPULATION = '".$_REQUEST['D_POPULATION']."',D_INDUSTRIES = '".$_REQUEST['D_INDUSTRIES']."' , D_CURRENCY = '".$_REQUEST['D_CURRENCY']."' ,D_ELECTRICITY = '".$_REQUEST['D_ELECTRICITY']."' ,D_OVERVIEW = '".$_REQUEST['D_OVERVIEW']."',D_HISTORY = '".$_REQUEST['D_HISTORY']."',D_PLACES = '".$_REQUEST['D_PLACES']."', D_PLACETOEAT = '".$_REQUEST['D_PLACETOEAT']."' , D_SHOPPING = '".$_REQUEST['D_SHOPPING']."'     ";
		$res = MySQL :: query($sql);	
		if(MySQL :: countAffected()>0)
			return MySQL :: getLastId();
		else
			return false;			
		
	}
	static function getDestinations()
	{
		$sql = "SELECT * FROM destination";	
		$res = MySQL :: query($sql);	
		return $res->rows;
	}
	static function getDestiDet($D_ID)
	{
		$sql = "SELECT * FROM destination WHERE D_ID = '".$D_ID."' ";	
		$res = MySQL :: query($sql);	
		return $res->row;		
	}
	static function editDestination()
	{
		
		$sql = "UPDATE destination SET  D_NAME = '".$_REQUEST['D_NAME']."', D_TIME = '".$_REQUEST['D_TIME']."', D_CAPITAL = '".$_REQUEST['D_CAPITAL']."'  , D_LANGUAGE = '".$_REQUEST['D_LANGUAGE']."', D_POPULATION = '".$_REQUEST['D_POPULATION']."',D_INDUSTRIES = '".$_REQUEST['D_INDUSTRIES']."' , D_CURRENCY = '".$_REQUEST['D_CURRENCY']."' ,D_ELECTRICITY = '".$_REQUEST['D_ELECTRICITY']."' ,D_OVERVIEW = '".$_REQUEST['D_OVERVIEW']."',D_HISTORY = '".$_REQUEST['D_HISTORY']."',D_PLACES = '".$_REQUEST['D_PLACES']."', D_PLACETOEAT = '".$_REQUEST['D_PLACETOEAT']."' , D_SHOPPING = '".$_REQUEST['D_SHOPPING']."' WHERE D_ID = '".$_REQUEST['D_ID']."'     ";
		$res = MySQL :: query($sql);		
		return true;	
	}
	static function getDestiImages($D_ID)
	{
		$sql = "SELECT * FROM destination_images WHERE DI_D_ID = '".$D_ID."' ";	
		$res = MySQL :: query($sql);	
		return $res->rows;		
	}
	
	
}


?>