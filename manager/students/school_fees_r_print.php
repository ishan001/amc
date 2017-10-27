<?php 
session_start();
include_once("../_system/_config/config.php");
include_once(REAL_PATH."_system/_database/mysql.php");
include_once(REAL_PATH."_system/_class/array.class.php");
 ob_start();
 
$S_ID = $_REQUEST['S_ID'];
$sql_s = "SELECT *  FROM student_fees WHERE SF_S_ID ='".$_REQUEST['S_ID']."' ";
$res_s = MySQL :: query($sql_s);

$sql = "DELETE FROM student_fees WHERE SF_S_ID ='".$_REQUEST['S_ID']."' ";
$res = MySQL :: query($sql);

$timestamp = mktime (0,0,0,$_REQUEST['SF_MONTH'],0,$_REQUEST['SF_YEAR']);

$sql2 = "INSERT INTO student_fees SET  SF_S_ID = '".$_REQUEST['S_ID']."', SF_YEAR = '".$_REQUEST['SF_YEAR']."', SF_MONTH = '".$_REQUEST['SF_MONTH']."' , SF_TIMESTAMP = '".$timestamp."'  ";
$res2 = MySQL :: query($sql2);

if($res_s->num_rows>0)
{
    $row = $res_s->row;
			
    $sql_stu = "SELECT *  FROM student WHERE S_ID ='".$_REQUEST['S_ID']."' ";
    $res_stu = MySQL :: query($sql_stu);
    $student = $res_stu->row;

    $stu_grade = $student['S_GRADE'];	

    for($i=1;$i<=count($STU_FEES);$i++)
    {
            if (in_array($stu_grade, $STU_FEES[$i])) {
                    $sql_fees = "SELECT *  FROM fees WHERE F_TYPE = '".$i."' ";
                    $res_fees = MySQL :: query($sql_fees);
                    $row_fees = $res_fees->row;
            }
    }

    //geting the prices and calculate them

    $date1 = $row['SF_TIMESTAMP']; 
    $date2 = $timestamp; 

    $months =  round(($date2-$date1) / 60 / 60 / 24 / 30);



    $school_fees = $row_fees['F_SCHOOL_FEES'] * $months;
    $security_fees = $row_fees['F_SECURITY_FEES'] * $months;
    $facility_fees = $row_fees['F_FACILITY_FEES'] * $months;
    $maintaince_fees = $row_fees['F_MAINTENANCE'] * $months;
    $extra_fees = $row_fees['F_EXTRA_EXPENSES'] * $months;
    $total = $school_fees + $security_fees + $facility_fees + $maintaince_fees + $extra_fees;

?>

<page backtop="62mm" backbottom="10mm" backleft="12mm" backright="10mm">
<style type="text/css">
    
.left_b {
    border-left: 1px solid #000; 
    border-top:1px solid #000;
}

.right_b {
    border-left: 1px solid #000; 
    border-top:1px solid #000;
    border-right:1px solid #000;
}

   
</style>
<page_header>

</page_header>
<page_footer></page_footer>
<table height="394" style="width:721px;" width="721;"  cellspacing="0" cellpadding="0" >
		
    <tbody>
            <tr height="33">
                    <td colspan="6" height="33" style="height:33px;width:693px; font-size: 17px; font-weight: bold; text-align:center;" border="0">
                            AVE MARIA CONVENT BRANCH SCHOOL</td>
            </tr>
            <tr height="19">
                    <td colspan="6" height="19" style="height:19px;width:693px; text-align:center;font-size: 15px;">
                            AKKARAPANAHA&nbsp;-&nbsp;NEGOMBO</td>
            </tr>
            <tr height="20">
                    <td height="20">
                            &nbsp;</td>
                    <td height="20">
                            &nbsp;</td>
                    <td height="20">
                            &nbsp;</td>
                    <td height="20">
                            &nbsp;</td>
                    <td height="20">
                            &nbsp;</td>
                    <td height="20">
                            &nbsp;</td>
            </tr>
            <tr height="19">
                    <td colspan="6" height="19" style="height:19px;width:693px;">
                            Receiyed with thanks the following sums in respect of</td>
            </tr>
            <tr height="33" >
                    <td height="52" rowspan="2" style="height:52px;width:28px; " class='left_b'>
                            &nbsp;</td>
                    <td height="52" rowspan="2" style="height:52px;width:245px; text-align:center;" class='left_b'>
                            Particulars</td>
                    <td height="52" rowspan="2" style="height:52px;width:84px; text-align:center;" class='left_b'>
                            At</td>
                    <td height="52" rowspan="2" style="height:52px;width:119px; text-align:center;" class='left_b'>
                            For&nbsp;the&nbsp;period</td>
                    <td colspan="2" height="33" style="height:33px;width:130px; text-align:center;" class='right_b'>
                            Amount</td>
            </tr>
            <tr height="19">
                    <td height="19" style="height:19px;width:80px;  text-align:center;" class='left_b'>
                            Rs.</td>
                    <td height="19" style="height:19px;width:50px;  text-align:center;" class='right_b'>
                            Cts.</td>
            </tr>
            <tr height="19">
                    <td height="19" style="text-align:center;" class='left_b'>
                            1</td>
                    <td height="19" style=" margin-left: 5px;" class='left_b'>
                            School Fees</td>
                    <td height="19" style=" " class='left_b'>
                            &nbsp;</td>
                    <td height="19" style="text-align:center;" class='left_b'>
                            <?=$months?> Months</td>
                    <td height="19" style=" text-align:center;" class='left_b'>
                            <?=$school_fees?></td>
                    <td height="19" style=" text-align:center;" class='right_b'>
                            0</td>
            </tr>
            <tr height="19">
                    <td height="19" style="text-align:center;" class='left_b'>
                            2</td>
                    <td height="19" style="margin-left: 5px;" class='left_b'>
                            Security Fees</td>
                    <td height="19" style="text-align:center;" class='left_b'>
                            &nbsp;</td>
                    <td height="19" style="text-align:center;" class='left_b'>
                            <?=$months?> Months</td>
                    <td height="19" style="text-align:center;" class='left_b'>
                            <?=$security_fees?></td>
                    <td height="19" style="text-align:center;" class='right_b'>
                            0</td>
            </tr>
            <tr height="19">
                    <td height="19" style="text-align:center;" class='left_b'>
                            3</td>
                    <td height="19" style="margin-left: 5px;" class='left_b'>
                            Facility Fees</td>
                    <td height="19" style="text-align:center;" class='left_b'>
                            &nbsp;</td>
                    <td height="19" style="text-align:center;" class='left_b'>
                            <?=$months?> Months</td>
                    <td height="19" style="text-align:center;" class='left_b'>
                            <?=$facility_fees?></td>
                    <td height="19" style="text-align:center;" class='right_b'>
                            0</td>
            </tr>
            <tr height="19">
                    <td height="19" style="text-align:center; " class='left_b'>
                            4</td>
                    <td height="19" style="margin-left: 5px;" class='left_b'>
                            Maintenance</td>
                    <td height="19" style="text-align:center; " class='left_b'>
                            &nbsp;</td>
                    <td height="19" style="text-align:center; " class='left_b'>
                            <?=$months?> Months</td>
                    <td height="19" style="text-align:center; " class='left_b'>
                            <?=$maintaince_fees?></td>
                    <td height="19" style="text-align:center; " class='right_b'>
                            0</td>
            </tr>
            <tr height="19">
                    <td height="19" style="text-align:center; " class='left_b'>
                            5</td>
                    <td height="19" style="margin-left: 5px; " class='left_b'>
                            Extra  Expenses</td>
                    <td height="19" style=" " class='left_b'>
                            &nbsp;</td>
                    <td height="19" style="text-align:center;" class='left_b'>
                            <?=$months?> Months</td>
                    <td height="19" style="text-align:center;" class='left_b'>
                            <?=$extra_fees?></td>
                    <td height="19" style="text-align:center;" class='right_b'>
                            0</td>
            </tr>
            <tr height="19">
                    <td height="19" style="border-top: 1px solid #000;">
                            &nbsp;</td>
                    <td height="19" style="border-top: 1px solid #000;">
                            &nbsp;</td>
                    <td height="19" style="border-top: 1px solid #000;">
                            &nbsp;</td>
                    <td height="19" style="text-align:center; border-bottom: 1px solid #000;" class='left_b'>
                            TOTAL&nbsp;&nbsp;</td>
                    <td height="19" style="text-align:center; border-bottom: 1px solid #000; " class='left_b'>
                            <?=$total?></td>
                    <td height="19" style="text-align:center; border-bottom: 1px solid #000;" class='right_b'>
                            0</td>
            </tr>
            <tr height="20">
                    <td height="20">
                            &nbsp;</td>
                    <td height="20">
                            &nbsp;</td>
                    <td height="20">
                            &nbsp;</td>
                    <td height="20">
                            &nbsp;</td>
                    <td height="20">
                            &nbsp;</td>
                    <td height="20">
                            &nbsp;</td>
            </tr>
            <tr height="20">
                    <td height="20">
                            &nbsp;</td>
                    <td height="20">
                            &nbsp;</td>
                    <td height="20">
                            &nbsp;</td>
                    <td height="20">
                            &nbsp;</td>
                    <td height="20">
                            &nbsp;</td>
                    <td height="20">
                            &nbsp;</td>
            </tr>
            <tr height="19">
                    <td colspan="6" height="19" style="height:19px;width:693px;">
                            Student: <?=$student['S_NAME']?></td>
            </tr>
            <tr height="20">
                    <td height="20">
                            &nbsp;</td>
                    <td height="20">
                            &nbsp;</td>
                    <td height="20">
                            &nbsp;</td>
                    <td height="20">
                            &nbsp;</td>
                    <td height="20">
                            &nbsp;</td>
                    <td height="20">
                            &nbsp;</td>
            </tr>
            <tr height="19">
                    <td colspan="3" height="19" style="height:19px;width:301px;">
                            Student Admission No : <?=$student['S_AD_ID']?></td>
                    <td height="19" style="height:19px;width:119px;">
                            Date : <?=date("d-m-Y")?></td>
                    <td height="19">
                            &nbsp;</td>
                    <td height="19">
                            &nbsp;</td>
            </tr>
            <tr height="20">
                    <td height="20">
                            &nbsp;</td>
                    <td height="20">
                            &nbsp;</td>
                    <td height="20">
                            &nbsp;</td>
                    <td height="20">
                            &nbsp;</td>
                    <td height="20">
                            &nbsp;</td>
                    <td height="20">
                            &nbsp;</td>
            </tr>
            <tr height="19">
                    <td colspan="3" height="19" style="height:19px;width:301px;">
                            Grade&nbsp;: <?=$stu_grade?></td>
                    <td height="19" style="height:19px;width:119px;">
                            Received&nbsp;by&nbsp;:&nbsp;</td>
                    <td height="19">
                            &nbsp;</td>
                    <td height="19">
                            &nbsp;</td>
            </tr>
    </tbody>
</table>


</page>

<?php
    $content = ob_get_clean();

    // convert in PDF
    require_once('pdfgenarate/html2pdf.class.php'); 
    try
    {
        $html2pdf = new HTML2PDF('P', 'A4', 'fr');
//      $html2pdf->setModeDebug();
        $html2pdf->setDefaultFont('Arial');
        $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
        $html2pdf->Output('exemple00.pdf');
    }
    catch(HTML2PDF_exception $e) {
        echo $e;
        exit;
    }

}
else
{
    echo "<script>alert('Sucessfully Applied!')</script>";
    header("location:school-fees.php?msg=t&S_ID=".$S_ID);
}
    ?>