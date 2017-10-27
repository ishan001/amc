<?php
include_once("../_system/_config/config.php");
include_once(REAL_PATH."_system/_database/mysql.php");	
include_once("functions.php");

function addCalendar($st, $et, $sub, $ade){
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
}

function listCalendarByRange($sd, $ed, $cnt){
  $ret = array();
  $ret['events'] = array();
  $ret["issort"] =true;
  $ret["start"] = php2JsTime($sd);
  $ret["end"] = php2JsTime($ed);
  $ret['error'] = null;
  $title = array('team meeting', 'remote meeting', 'project plan review', 'annual report', 'go to dinner');
  $location = array('Lodan', 'Newswer', 'Belion', 'Moore', 'Bytelin');

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
        rand(0,1),
       $alld, //more than one day event
        0,//Recurring event
        rand(-1,13),
        0, //editable
        $row['E_LOCATION'], 
        '',//$attends
      );
  } 
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

function updateCalendar($id, $st, $et){
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

header('Content-type:text/javascript;charset=UTF-8');
$method = $_GET["method"];
switch ($method) {
    case "add":
        $ret = addCalendar($_POST["CalendarStartTime"], $_POST["CalendarEndTime"], $_POST["CalendarTitle"], $_POST["IsAllDayEvent"]);
        break;
    case "list":
        $ret = listCalendar($_POST["showdate"], $_POST["viewtype"]);
        break;
    case "update":
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
        break; 


}
echo json_encode($ret); 

?>