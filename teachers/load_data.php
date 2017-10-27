<?php
if($_POST['page'])
{
$page = $_POST['page'];
$T_NAME = $_POST['T_NAME'];
$T_GRADE = $_POST['T_GRADE'];


$cur_page = $page;
$page -= 1;
$per_page = 5;
$previous_btn = true;
$next_btn = true;
$first_btn = true;
$last_btn = true;
$start = $page * $per_page;
include_once("../_system/_config/config.php");

$query_pag_data = "SELECT * from teachers LEFT JOIN teachers_classes ON T_ID = TC_T_ID WHERE 1=1 ";
if($T_NAME)
	$query_pag_data .= " AND  T_NAME LIKE  '%".$T_NAME."%' " ;
	
if($T_GRADE)
	$query_pag_data .= " AND  TC_GRADE =  '".$T_GRADE."' " ;	

$query_pag_data .= " group by T_ID  ORDER BY T_NAME  LIMIT $start, $per_page ";


//echo $query_pag_data;die();
$result_pag_data = mysql_query($query_pag_data) or die('MySql Error' . mysql_error());
$msg = "<ul>";

while ($techer = mysql_fetch_array($result_pag_data)) {
	
	
	$descrip =  strip_tags($techer['T_DESCRIPTION']);
	if (strlen($descrip) > 200)
      $descrip = substr($descrip, 0, strrpos(substr($descrip, 0, 100), ' ')) . '...';
	$url = str_replace(" ","-", $row['AC_NAME']);
	$cls = explode("-",$techer['T_CLASS_TECH']);
    $msg .= ' <li>
                <div class="thumb"> <a href="teacher.php?T_ID='.$techer['T_ID'].'"><img src="'.URL.'upload/teachers/thumb/'.$techer['T_PRO_PIC'].'" alt="'.$techer['T_NAME'].'" title="'.$techer['T_NAME'].'" /></a> </div>
                <div class="desc">
                  <h4 class="colr">'.$techer['T_NAME'].'</h4>
                  <p class="dat">Joined in '.date("d M Y", strtotime($techer['T_JOINED_DATE'])).' </p>
                  <p class="txt"> '.$descrip.' </p>
                </div>
                <div class="techerclass"> <span class="class cufontxt">'.$cls[0].'</span> </div>
              </li>';
				  
	
//$msg = "<div class='data'><ul>" . $msg . "</ul></div>"; // Content for Data
}
$msg .= "</ul>";
/* --------------------------------------------- */
$query_pag_num = "SELECT COUNT(*) AS count FROM teachers LEFT JOIN teachers_classes ON T_ID = TC_T_ID  WHERE 1=1 ";
if($T_NAME)
	$query_pag_num .= " AND  T_NAME LIKE  '%".$T_NAME."%' " ;
	
if($T_GRADE)
	$query_pag_num .= " AND  TC_GRADE =  '".$T_GRADE."' " ;


	
$result_pag_num = mysql_query($query_pag_num);
$row = mysql_fetch_array($result_pag_num);
$count = $row['count'];

if($count==0)
{
		$msg .= '<div id="recoHotWrap"> No Result Found </div>';
}
$no_of_paginations = ceil($count / $per_page);

/* ---------------Calculating the starting and endign values for the loop----------------------------------- */
if ($cur_page >= 7) {
    $start_loop = $cur_page - 3;
    if ($no_of_paginations > $cur_page + 3)
        $end_loop = $cur_page + 3;
    else if ($cur_page <= $no_of_paginations && $cur_page > $no_of_paginations - 6) {
        $start_loop = $no_of_paginations - 6;
        $end_loop = $no_of_paginations;
    } else {
        $end_loop = $no_of_paginations;
    }
} else {
    $start_loop = 1;
    if ($no_of_paginations > 7)
        $end_loop = 7;
    else
        $end_loop = $no_of_paginations;
}
/* ----------------------------------------------------------------------------------------------------------- */
$msg .= "<div class='pagination'><ul>";

// FOR ENABLING THE FIRST BUTTON
if ($first_btn && $cur_page > 1) {
    $msg .= "<li p='1' class='active'>First</li>";
} else if ($first_btn) {
    $msg .= "<li p='1' class='inactive'>First</li>";
}

// FOR ENABLING THE PREVIOUS BUTTON
if ($previous_btn && $cur_page > 1) {
    $pre = $cur_page - 1;
    $msg .= "<li p='$pre' class='active'>Previous</li>";
} else if ($previous_btn) {
    $msg .= "<li class='inactive'>Previous</li>";
}
for ($i = $start_loop; $i <= $end_loop; $i++) {

    if ($cur_page == $i)
        $msg .= "<li p='$i' style='color:#fff;background-color:#487EC0 ;' class='active'>{$i}</li>";
    else
        $msg .= "<li p='$i' class='active'>{$i}</li>";
}

// TO ENABLE THE NEXT BUTTON
if ($next_btn && $cur_page < $no_of_paginations) {
    $nex = $cur_page + 1;
    $msg .= "<li p='$nex' class='active'>Next</li>";
} else if ($next_btn) {
    $msg .= "<li class='inactive'>Next</li>";
}

// TO ENABLE THE END BUTTON
if ($last_btn && $cur_page < $no_of_paginations) {
    $msg .= "<li p='$no_of_paginations' class='active'>Last</li>";
} else if ($last_btn) {
    $msg .= "<li p='$no_of_paginations' class='inactive'>Last</li>";
}
//$goto = "<input type='text' class='goto' size='1' style='margin-top:-1px;margin-left:60px;'/><input type='button' id='go_btn' class='go_button' value='Go'/>";
$total_string = "<span class='total' a='$no_of_paginations'>Page <b>" . $cur_page . "</b> of <b>$no_of_paginations</b></span>";
$msg = $msg . "</ul>" . $goto . $total_string . "</div>";  // Content for pagination
echo $msg;
}

