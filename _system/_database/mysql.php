<?php
class MySQL {
	
	  public function query($sql) {
	  $resource = mysql_query($sql);
	  if ($resource) {
			if (is_resource($resource)) {
			$i = 0;
	  $data = array();
	  while ($result = mysql_fetch_array($resource)) {
			$data[$i] = $result;
	  $i++;
	  }
	  mysql_free_result($resource);
	  $query = new stdClass();
					  $query->result = $resource;
					  $query->row = isset($data[0]) ? $data[0] : array();
					  $query->rows = $data;
					  $query->num_rows = $i;
					  unset($data);
	  return $query;	
				  } else {
					  return TRUE;
				  }
			  } else {
				  exit('Error: ' . mysql_error() . '<br />Error No: ' . mysql_errno() . '<br />' . $sql);
			  }
		  }
		  
		  public function escape($value) {
			  return mysql_real_escape_string($value);
		  }
		  
		  public function countAffected() {
			  return mysql_affected_rows();
		  }
	  
		  public function getLastId() {
			  return mysql_insert_id();
		  }	
		  
	  
	  }
?>