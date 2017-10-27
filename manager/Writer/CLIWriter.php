<?php
session_start();
require_once('../config.php');

$action = $_REQUEST['action'];

if($action == "com")
{
	
	$sql = "SELECT * FROM company";
	$rsSearchResults = mysql_query($sql) or die(mysql_error());
	
	$out = '';
	$fields = mysql_list_fields(DB_DB,'company');
	$columns = mysql_num_fields($fields);
	
	// Put the name of all fields
	for ($i = 0; $i < $columns; $i++) {
	$l=mysql_field_name($fields, $i);
	$out .= '"'.$l.'",';
	}
	$out .="\n";
	
	// Add all values in the table
	while ($l = mysql_fetch_array($rsSearchResults)) {
	for ($i = 0; $i < $columns; $i++) {
	$out .='"'.$l["$i"].'",';
	}
	$out .="\n";
	}
	// Output to browser with appropriate mime type, you choose ;)
	header("Content-type: text/x-csv");
	//header("Content-type: text/csv");
	//header("Content-type: application/csv");
	header("Content-Disposition: attachment; filename=spreadsheet_com.csv");
	echo $out;
	exit;	
}

if($action == "org")
{
	
	$sql = "SELECT * FROM organization";
	$rsSearchResults = mysql_query($sql) or die(mysql_error());
	
	$out = '';
	$fields = mysql_list_fields(DB_DB,'organization');
	$columns = mysql_num_fields($fields);
	
	// Put the name of all fields
	for ($i = 0; $i < $columns; $i++) {
	$l=mysql_field_name($fields, $i);
	$out .= '"'.$l.'",';
	}
	$out .="\n";
	
	// Add all values in the table
	while ($l = mysql_fetch_array($rsSearchResults)) {
	for ($i = 0; $i < $columns; $i++) {
	$out .='"'.$l["$i"].'",';
	}
	$out .="\n";
	}
	// Output to browser with appropriate mime type, you choose ;)
	header("Content-type: text/x-csv");
	//header("Content-type: text/csv");
	//header("Content-type: application/csv");
	header("Content-Disposition: attachment; filename=spreadsheet_org.csv");
	echo $out;
	exit;	
	
	

	
}

if($action == "reli")
{
	
	$sql = "SELECT * FROM religious";
	$rsSearchResults = mysql_query($sql) or die(mysql_error());
	
	$out = '';
	$fields = mysql_list_fields(DB_DB,'religious');
	$columns = mysql_num_fields($fields);
	
	// Put the name of all fields
	for ($i = 0; $i < $columns; $i++) {
	$l=mysql_field_name($fields, $i);
	$out .= '"'.$l.'",';
	}
	$out .="\n";
	
	// Add all values in the table
	while ($l = mysql_fetch_array($rsSearchResults)) {
	for ($i = 0; $i < $columns; $i++) {
	$out .='"'.$l["$i"].'",';
	}
	$out .="\n";
	}
	// Output to browser with appropriate mime type, you choose ;)
	header("Content-type: text/x-csv");
	//header("Content-type: text/csv");
	//header("Content-type: application/csv");
	header("Content-Disposition: attachment; filename=spreadsheet_reli.csv");
	echo $out;
	exit;	
	
	
	
}	


if($action == "per")
{

	$sql = "SELECT * FROM personal_names";
	$rsSearchResults = mysql_query($sql) or die(mysql_error());
	
	$out = '';
	$fields = mysql_list_fields(DB_DB,'personal_names');
	$columns = mysql_num_fields($fields);
	
	// Put the name of all fields
	for ($i = 0; $i < $columns; $i++) {
	$l=mysql_field_name($fields, $i);
	$out .= '"'.$l.'",';
	}
	$out .="\n";
	
	// Add all values in the table
	while ($l = mysql_fetch_array($rsSearchResults)) {
	for ($i = 0; $i < $columns; $i++) {
	$out .='"'.$l["$i"].'",';
	}
	$out .="\n";
	}
	// Output to browser with appropriate mime type, you choose ;)
	header("Content-type: text/x-csv");
	//header("Content-type: text/csv");
	//header("Content-type: application/csv");
	header("Content-Disposition: attachment; filename=spreadsheet_per.csv");
	echo $out;
	exit;	


	
}	
?>