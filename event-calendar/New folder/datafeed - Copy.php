<?php
include_once("../_system/_config/config.php");
include_once(REAL_PATH."_system/_database/mysql.php");	
include_once("functions.php");

/*function addCalendar($st, $et, $sub, $ade){
  $ret = array();
      $ret['IsSuccess'] = true;
      $ret['Msg'] = 'add success';
      $ret['Data'] =rand();
  return $ret;
}


function addDetailedCalendar($st, $et, $sub, $ade, $dscr, $loc, $color, $tz){
  $ret = array();
      $ret['IsSuccess'] = true;
      $ret['Msg'] = 'add success';
      $ret['Data'] = rand();
  return $ret;
}*/

function listCalendarByRange($sd, $ed, $cnt){
  $ret = array();
  $ret['events'] = array();
  $ret["issort"] =true;
  $ret["start"] = php2JsTime($sd);
  $ret["end"] = php2JsTime($ed);
  $ret['error'] = null;
  
  
  $sql = "SELECT * FROM events  ";
  $res = MySQL :: query($sql);
  $rows = $res->rows;	
		
  foreach($rows as $row)
  {
	  $rsd = rand($sd, $ed);
	 
		
	  
	   $ret['events'][] = array(
        $row['E_ID'],
         $row['E_TITLE'], 
        php2JsTime(strtotime($row['E_DATE'])),
        php2JsTime(strtotime($row['E_DATE'])),
        0,
        0, //more than one day event
        0,//Recurring event
        0,
        0, //editable
        $row['E_LOCATION'], 
        0,//$attends
      );
	 //$ret['events'][] = array(rand(10000, 99999),$row['E_TITLE'], strtotime($row['E_TIME']), strtotime($row['E_TIME']),0,0,0,0,0,$row['E_LOCATION'],'' ); 
  }
/*  for($i=0; $i<$cnt; $i++) {
      $rsd = rand($sd, $ed);
	 
      $red = rand(3600, 10800);
      if(rand(0,10) > 8){
          $alld = 1;
      }else{
          $alld=0;
      }
      $ret['events'][] = array(
        rand(10000, 99999),
         $rsd."a", 
        php2JsTime($rsd),
        php2JsTime($red),
        rand(0,1),
        $alld, //more than one day event
        0,//Recurring event
        rand(-1,13),
        1, //editable
        $location[rand(0,4)], 
        ''//$attends
      );
  }*/
  return $ret;
}

function listCalendar($day, $type){
  $phpTime = js2PhpTime($day);
  //echo $phpTime . "+" . $type;
  switch($type){
    case "month":
      $st = mktime(0, 0, 0, date("m", $phpTime), 1, date("Y", $phpTime));
      $et = mktime(0, 0, -1, date("m", $phpTime)+1, 1, date("Y", $phpTime));
      $cnt = 50;
      break;
    case "week":
      //suppose first day of a week is monday 
      $monday  =  date("d", $phpTime) - date('N', $phpTime) + 1;
      //echo date('N', $phpTime);
      $st = mktime(0,0,0,date("m", $phpTime), $monday, date("Y", $phpTime));
      $et = mktime(0,0,-1,date("m", $phpTime), $monday+7, date("Y", $phpTime));
      $cnt = 20;
      break;
    case "day":
      $st = mktime(0, 0, 0, date("m", $phpTime), date("d", $phpTime), date("Y", $phpTime));
      $et = mktime(0, 0, -1, date("m", $phpTime), date("d", $phpTime)+1, date("Y", $phpTime));
      $cnt = 5;
      break;
  }
  //echo $st . "--" . $et;
  return listCalendarByRange($st, $et, $cnt);
}

/*function updateCalendar($id, $st, $et){
  $ret = array();
      $ret['IsSuccess'] = true;
      $ret['Msg'] = 'Succefully';
  return $ret;
}

function updateDetailedCalendar($id, $st, $et, $sub, $ade, $dscr, $loc, $color, $tz){
  $ret = array();
      $ret['IsSuccess'] = true;
      $ret['Msg'] = 'Succefully';
  return $ret;
}

function removeCalendar($id){
  $ret = array();
      $ret['IsSuccess'] = true;
      $ret['Msg'] = 'Succefully';
  return $ret;
}
*/
header('Content-type:text/javascript;charset=UTF-8');
$method = $_GET["method"];
switch ($method) {
    /*case "add":
        $ret = addCalendar($_POST["CalendarStartTime"], $_POST["CalendarEndTime"], $_POST["CalendarTitle"], $_POST["IsAllDayEvent"]);
        break;*/
    case "list":
        $ret = listCalendar($_POST["showdate"], $_POST["viewtype"]);
        break;
   /* case "update":
        $ret = updateCalendar($_POST["calendarId"], $_POST["CalendarStartTime"], $_POST["CalendarEndTime"]);
        break; 
    case "remove":
        $ret = removeCalendar( $_POST["calendarId"]);
        break;
    case "adddetails":
        $id = $_GET["id"];
        $st = $_POST["stpartdate"] . " " . $_POST["stparttime"];
        $et = $_POST["etpartdate"] . " " . $_POST["etparttime"];
        if($id){
            $ret = updateDetailedCalendar($id, $st, $et, 
                $_POST["Subject"], $_POST["IsAllDayEvent"]?1:0, $_POST["Description"], 
                $_POST["Location"], $_POST["colorvalue"], $_POST["timezone"]);
        }else{
            $ret = addDetailedCalendar($st, $et,                    
                $_POST["Subject"], $_POST["IsAllDayEvent"]?1:0, $_POST["Description"], 
                $_POST["Location"], $_POST["colorvalue"], $_POST["timezone"]);
        }        
        break; */


}
echo json_encode($ret); 

?>