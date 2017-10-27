<?php
class STUDENT {
	static function addStudent($subary)
	{		
		if($subary)
			$subjects = serialize($subary);
		else
			$subjects = serialize($_REQUEST['S_SUBJECTS']);
		
		$sql = "INSERT INTO student SET   S_AD_ID = '".$_REQUEST['S_AD_ID']."', S_PASSWORD = '".md5($_REQUEST['S_AD_ID'])."', S_NAME = '".$_REQUEST['S_NAME']."',S_PRO_PIC = '".$_SESSION['studentProImg']."', S_JOIN_DATE = '".$_REQUEST['S_JOIN_DATE']."', S_GRADE = '".$_REQUEST['S_GRADE']."', S_SPORTS = '".serialize($_REQUEST['S_SPORTS'])."', S_SUBJECTS = '".$subjects."', S_EXTRA_ACT = '".$_REQUEST['S_EXTRA_ACT']."', S_DESCRIPTION = '".$_REQUEST['S_DESCRIPTION2']."',S_P_CONTACT = '".$_REQUEST['S_P_CONTACT']."' , S_P_EMAIL = '".$_REQUEST['S_P_EMAIL']."' ,  S_ACTIVE=1 ";

		$res = MySQL :: query($sql);	
		return true;
			
	}
	static  function getAllStudents()
	{
		$sql = " SELECT * FROM student  WHERE  	S_GRADE != 'OG' ";	
		$res = MySQL :: query($sql);	
		return $res->rows;		
	}
	static  function getStudentDet($S_ID)
	{
		$sql = " SELECT * FROM student WHERE S_ID = $S_ID ";	
		$res = MySQL :: query($sql);	
		return $res->row;
	}
	function editStudent($subary)
	{
		if($subary)
			$subjects = serialize($subary);
		else
			$subjects = serialize($_REQUEST['S_SUBJECTS']);
			
		$sql = "UPDATE student SET   S_AD_ID = '".$_REQUEST['S_AD_ID']."',  S_NAME = '".$_REQUEST['S_NAME']."', S_JOIN_DATE = '".$_REQUEST['S_JOIN_DATE']."', S_GRADE = '".$_REQUEST['S_GRADE']."', S_SPORTS = '".serialize($_REQUEST['S_SPORTS'])."', S_SUBJECTS = '".$subjects."', S_EXTRA_ACT = '".$_REQUEST['S_EXTRA_ACT']."', S_DESCRIPTION = '".MySQL :: escape($_REQUEST['S_DESCRIPTION2'])."' ,S_P_CONTACT = '".$_REQUEST['S_P_CONTACT']."' , S_P_EMAIL = '".$_REQUEST['S_P_EMAIL']."' ";
		if($_SESSION['studentProImg'])
			$sql .= " , S_PRO_PIC = '".$_SESSION['studentProImg']."' ";
		
		if($_REQUEST['S_PASSWORD'])	
			$sql .= " , S_PASSWORD = '".md5($_REQUEST['S_PASSWORD'])."' ";
			
		$sql .=" WHERE S_ID = '".$_REQUEST['S_ID']."' ";

		$res = MySQL :: query($sql);	
		return true;
		
	}
	static function addStudentResult()
	{
		$sql = "DELETE FROM student_results WHERE SR_S_ID ='".$_REQUEST['S_ID']."' ";
		$res = MySQL :: query($sql);
		
		
		$sql = "SELECT * FROM subjects ";
		$res = MySQL :: query($sql);
		$subs = $res->rows;
		 foreach($subs as $rowSubs) { 
		 
		 	if($_REQUEST['T1S'.$rowSubs['SB_ID']])
			{
				$rest = $_REQUEST['T1S'.$rowSubs['SB_ID']];
		 		$sql2 = "INSERT INTO student_results SET  SR_S_ID = '".$_REQUEST['S_ID']."', SR_SUBJECT =  '".$rowSubs['SB_ID']."', SR_YEAR = '".$_REQUEST['SR_YEAR']."', SR_TERM ='1', SR_RESULT = '".$rest."' ";
				$res2 = MySQL :: query($sql2);
				
			}
		 }
		 foreach($subs as $rowSubs) { 
		 
		 	if($_REQUEST['T2S'.$rowSubs['SB_ID']])
			{
				$rest = $_REQUEST['T2S'.$rowSubs['SB_ID']];
		 		$sql2 = "INSERT INTO student_results SET  SR_S_ID = '".$_REQUEST['S_ID']."', SR_SUBJECT =  '".$rowSubs['SB_ID']."', SR_YEAR = '".$_REQUEST['SR_YEAR']."', SR_TERM ='2', SR_RESULT = '".$rest."' ";
				$res2 = MySQL :: query($sql2);
				
			}
		 }
		 foreach($subs as $rowSubs) { 
		 
		 	if($_REQUEST['T3S'.$rowSubs['SB_ID']])
			{
				$rest = $_REQUEST['T3S'.$rowSubs['SB_ID']];
		 		$sql2 = "INSERT INTO student_results SET  SR_S_ID = '".$_REQUEST['S_ID']."', SR_SUBJECT =  '".$rowSubs['SB_ID']."', SR_YEAR = '".$_REQUEST['SR_YEAR']."', SR_TERM ='3', SR_RESULT = '".$rest."' ";
				$res2 = MySQL :: query($sql2);
				
			}
		 }
		 return true;
         
         	
	}
	static function getStudentResults($S_ID,$SR_YEAR,$SR_TERM)
	{
		$sql = "SELECT *  FROM student_results WHERE SR_S_ID ='".$S_ID."' AND SR_YEAR = '".$SR_YEAR."' and  SR_TERM  ='".$SR_TERM."'";
		$res = MySQL :: query($sql);	
		$rows = $res->rows;
		foreach($rows as $row)
		{
			$ary[$row['SR_SUBJECT']] = $row['SR_RESULT'];
		}	
		return $ary;
	}
	static function addStudentFees($STU_FEES)
	{
                $S_ID = $_REQUEST['S_ID'];
		$sql_s = "SELECT *  FROM student_fees WHERE SF_S_ID ='".$_REQUEST['S_ID']."' ";
		$res_s = MySQL :: query($sql_s);
		
		$sql = "DELETE FROM student_fees WHERE SF_S_ID ='".$_REQUEST['S_ID']."' ";
		$res = MySQL :: query($sql);
		
		$timestamp = mktime (0,0,0,$_REQUEST['SF_MONTH'],0,$_REQUEST['SF_YEAR']);
		
		$sql2 = "INSERT INTO student_fees SET  SF_S_ID = '".$_REQUEST['S_ID']."', SF_YEAR = '".$_REQUEST['SF_YEAR']."', SF_MONTH = '".$_REQUEST['SF_MONTH']."' , SF_TIMESTAMP = '".$timestamp."'  ";
		$res2 = MySQL :: query($sql2);		
                
                $school_fees = $security_fees = $facility_fees = $maintaince_fees = $extra_fees = 0;
                
                $L_YEAR = $_POST['L_YEAR'];
                $L_MONTH = $_POST['L_MONTH'];
                $SF_YEAR = $_POST['SF_YEAR'];
                $SF_MONTH = $_POST['SF_MONTH'];

		$extra = $_POST['extra'];
		if(!isset($_POST['correct']))
		{
			$sql3 = "INSERT INTO student_fees_recipt SET student_id = '".$_REQUEST['S_ID']."'  ";
			$res3 = MySQL :: query($sql3);	
			$last_id = MySQL :: getLastId();
                    if($res_s->num_rows>0)
                    {	
			$row = $res_s->row;
			
			$sql_stu = "SELECT *  FROM student WHERE S_ID ='".$_REQUEST['S_ID']."' ";
			$res_stu = MySQL :: query($sql_stu);
			$student = $res_stu->row;
			
			$stu_grade = $student['S_GRADE'];
                        
                       
			if($L_YEAR==date("Y",$timestamp))
                        {
                            $date1 = $row['SF_TIMESTAMP']; 
                            $date2 = $timestamp; 

                            $months =  round(($date2-$date1) / 60 / 60 / 24 / 30);
                            for($i=1;$i<=count($STU_FEES);$i++)
                            {
                                    if (in_array($stu_grade, $STU_FEES[$i])) {
                                            $sql_fees = "SELECT *  FROM fees WHERE F_TYPE = '".$i."' AND F_YEAR = '".$L_YEAR."' ";
                                            $res_fees = MySQL :: query($sql_fees);
                                            $row_fees = $res_fees->row;
                                    }
                            }
                            echo $months;
                            die();
                            $school_fees = $row_fees['F_SCHOOL_FEES'] * $months;
                            $security_fees = $row_fees['F_SECURITY_FEES'] * $months;
                            $facility_fees = $row_fees['F_FACILITY_FEES'] * $months;
                            $maintaince_fees = $row_fees['F_MAINTENANCE'] * $months;
                            $extra_fees = $row_fees['F_EXTRA_EXPENSES'] * $months;
                        }
                        else
                        {
                            
                            $date1 = $row['SF_TIMESTAMP']; 
                            $date2 = mktime (0,0,0,12,0,date("Y",$timestamp));
                            
                            $months =  round(($date2-$date1) / 60 / 60 / 24 / 30);
                            for($i=1;$i<=count($STU_FEES);$i++)
                            {
                                    if (in_array($stu_grade, $STU_FEES[$i])) {
                                            $sql_fees = "SELECT *  FROM fees WHERE F_TYPE = '".$i."' AND F_YEAR = '".date("Y",$timestamp)."' ";
                                            $res_fees = MySQL :: query($sql_fees);
                                            $row_fees = $res_fees->row;
                                    }
                            }
                            $school_fees += $row_fees['F_SCHOOL_FEES'] * $months;
                            $security_fees += $row_fees['F_SECURITY_FEES'] * $months;
                            $facility_fees += $row_fees['F_FACILITY_FEES'] * $months;
                            $maintaince_fees += $row_fees['F_MAINTENANCE'] * $months;
                            $extra_fees += $row_fees['F_EXTRA_EXPENSES'] * $months;  
                            
                            $date3 = mktime (0,0,0,1,0,$_REQUEST['SF_YEAR']);
                            $date4 = $timestamp;
                            
                            $months2 =  round(($date4-$date3) / 60 / 60 / 24 / 30);
                            for($i=1;$i<=count($STU_FEES);$i++)
                            {
                                    if (in_array($stu_grade, $STU_FEES[$i])) {
                                            $sql_fees = "SELECT *  FROM fees WHERE F_TYPE = '".$i."' AND F_YEAR = '".$_REQUEST['SF_YEAR']."' ";
                                            $res_fees = MySQL :: query($sql_fees);
                                            $row_fees2 = $res_fees->row;
                                    }
                            }
                            
                            $school_fees += $row_fees2['F_SCHOOL_FEES'] * $months2;
                            $security_fees += $row_fees2['F_SECURITY_FEES'] * $months2;
                            $facility_fees += $row_fees2['F_FACILITY_FEES'] * $months2;
                            $maintaince_fees += $row_fees2['F_MAINTENANCE'] * $months2;
                            $extra_fees += $row_fees2['F_EXTRA_EXPENSES'] * $months2;
                              
                        }			
			
			//geting the prices and calculate them
			 	 	 	 	
			
			
			$total = $school_fees + $security_fees + $facility_fees + $maintaince_fees + $extra_fees;
			
			$objPHPExcel = new PHPExcel();
			
			// Set document properties
			$objPHPExcel->getProperties()->setCreator("Ishan Jayamanne")
										 ->setLastModifiedBy("Ishan Jayamanne")
										 ->setTitle("School Fees")
										 ->setSubject("School Fees")
										 ->setDescription("School Fees document in AVE Maria convent Bolawalana");
			
			$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(9);
			$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(4);
			$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(22);
			$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(10);
			$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
			$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(15);	
			$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(5);
                        $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(10);
			
			//setting borders
			$objPHPExcel->getActiveSheet()->getStyle('B5:G11')->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
			$objPHPExcel->getActiveSheet()->getStyle('F12:G12')->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
			
			$styleArray1 = array(
				'font' => array(
					'bold' => true,
					'size' => 12,
					'name' =>  'Calibri',
				),
				'alignment' => array(
					'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
					'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
				),
			);
			
			$styleArray2 = array(
				'font' => array(
					'size' => 10,
					'name' =>  'Calibri',
                                        'bold' => true,
				),
				'alignment' => array(
					'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
					'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
				),
			);
			$styleArray3 = array(
				'font' => array(
					'size' => 10,
					'name' =>  'Calibri',
				),
				'alignment' => array(
					'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
					'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
				),
			);
			$styleArray4 = array(
				'font' => array(
					'size' => 11,
					'name' =>  'Calibri',
                                        'bold' => true,
				),
				'alignment' => array(
					'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
					'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
				),
			);
			$styleArray5 = array(
				'font' => array(
					'size' => 11,
					'name' =>  'Calibri',
				),
				'alignment' => array(
					'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
					'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
				),
			);
                        $styleArray6 = array(
				'font' => array(
					'size' => 11,
					'name' =>  'Calibri',
				),
				'alignment' => array(
					'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
					'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
				),
			);
                        $styleArray7 = array(
				'font' => array(
					'size' => 11,
					'name' =>  'Calibri',
				),
				'alignment' => array(
					'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_RIGHT,
					'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
				),
			);
			
			//setHorizontalCentered
			
			
		
			
			$objPHPExcel->getActiveSheet()->mergeCells('A1:H1');
			$objPHPExcel->getActiveSheet()->getStyle('A1')->applyFromArray($styleArray1);
			//$objPHPExcel->getActiveSheet()->getRowDimension('1')->setRowHeight(25);
			$objPHPExcel->setActiveSheetIndex(0) ->setCellValue('A1', "BOLAWALANA AVE MARIA CONVENT");
	
	
			$objPHPExcel->getActiveSheet()->mergeCells('A2:H2');
			$objPHPExcel->getActiveSheet()->getStyle('A2')->applyFromArray($styleArray2);
			//$objPHPExcel->getActiveSheet()->getRowDimension('2')->setRowHeight(15);
			$objPHPExcel->setActiveSheetIndex(0) ->setCellValue('A2', "AKKARAPANAHA - NEGOMBO");
	
	
			$objPHPExcel->getActiveSheet()->mergeCells('B4:E4');
			$objPHPExcel->getActiveSheet()->getStyle('B4')->applyFromArray($styleArray3);
			//$objPHPExcel->getActiveSheet()->getRowDimension('4')->setRowHeight(15);
			$objPHPExcel->setActiveSheetIndex(0) ->setCellValue('B4', "Received with thanks the following sums in respect of");
			
			$objPHPExcel->getActiveSheet()->getStyle('F3')->applyFromArray($styleArray4);
			$objPHPExcel->setActiveSheetIndex(0) ->setCellValue('F3', $last_id);
			
//			$objPHPExcel->getActiveSheet()->mergeCells('A5:A6');
//			$objPHPExcel->getActiveSheet()->mergeCells('B5:B6');
			$objPHPExcel->getActiveSheet()->getStyle('C5')->applyFromArray($styleArray4);
			$objPHPExcel->getActiveSheet()->getRowDimension('5')->setRowHeight(25);
			$objPHPExcel->setActiveSheetIndex(0) ->setCellValue('C5', "Particulars");
//			
//			$objPHPExcel->getActiveSheet()->mergeCells('C5:C6');
			$objPHPExcel->getActiveSheet()->getStyle('D5')->applyFromArray($styleArray4);
			$objPHPExcel->setActiveSheetIndex(0) ->setCellValue('D5', "At");
//			
//			$objPHPExcel->getActiveSheet()->mergeCells('D5:D6');
			$objPHPExcel->getActiveSheet()->getStyle('E5')->applyFromArray($styleArray4);
			$objPHPExcel->setActiveSheetIndex(0) ->setCellValue('E5', "For the period");
//			
			$objPHPExcel->getActiveSheet()->mergeCells('F5:G5');
			$objPHPExcel->getActiveSheet()->getStyle('F5')->applyFromArray($styleArray4);
			$objPHPExcel->setActiveSheetIndex(0) ->setCellValue('F5', "Amount");
			
			
			$objPHPExcel->getActiveSheet()->getStyle('F6')->applyFromArray($styleArray4);
			$objPHPExcel->setActiveSheetIndex(0) ->setCellValue('F6', "Rs.");
			
			$objPHPExcel->getActiveSheet()->getStyle('G6')->applyFromArray($styleArray4);
			$objPHPExcel->setActiveSheetIndex(0) ->setCellValue('G6', "Cts.");
			
			
			$objPHPExcel->getActiveSheet()->getStyle('B7')->applyFromArray($styleArray6);
			$objPHPExcel->setActiveSheetIndex(0) ->setCellValue('B7', "1");
			
			$objPHPExcel->getActiveSheet()->getStyle('B8')->applyFromArray($styleArray6);
			$objPHPExcel->setActiveSheetIndex(0) ->setCellValue('B8', "2");
			
			$objPHPExcel->getActiveSheet()->getStyle('B9')->applyFromArray($styleArray6);
			$objPHPExcel->setActiveSheetIndex(0) ->setCellValue('B9', "3");
			
			$objPHPExcel->getActiveSheet()->getStyle('B10')->applyFromArray($styleArray6);
			$objPHPExcel->setActiveSheetIndex(0) ->setCellValue('B10', "4");
			
			$objPHPExcel->getActiveSheet()->getStyle('B11')->applyFromArray($styleArray6);
			$objPHPExcel->setActiveSheetIndex(0) ->setCellValue('B11', "5");
			
			
			$objPHPExcel->getActiveSheet()->getStyle('C7')->applyFromArray($styleArray5);
			$objPHPExcel->getActiveSheet()->getRowDimension('7')->setRowHeight(22);
			$objPHPExcel->setActiveSheetIndex(0) ->setCellValue('C7', "School Fees");
			
			$objPHPExcel->getActiveSheet()->getStyle('C8')->applyFromArray($styleArray5);
                        $objPHPExcel->getActiveSheet()->getRowDimension('8')->setRowHeight(22);
			$objPHPExcel->setActiveSheetIndex(0) ->setCellValue('C8', "Security Fees");
			
			$objPHPExcel->getActiveSheet()->getStyle('C9')->applyFromArray($styleArray5);
                        $objPHPExcel->getActiveSheet()->getRowDimension('9')->setRowHeight(22);
			$objPHPExcel->setActiveSheetIndex(0) ->setCellValue('C9', "Facility Fees");
			
			$objPHPExcel->getActiveSheet()->getStyle('C10')->applyFromArray($styleArray5);
                        $objPHPExcel->getActiveSheet()->getRowDimension('10')->setRowHeight(22);
			$objPHPExcel->setActiveSheetIndex(0) ->setCellValue('C10', "Maintenance");
			
			$objPHPExcel->getActiveSheet()->getStyle('C11')->applyFromArray($styleArray5);
                        $objPHPExcel->getActiveSheet()->getRowDimension('11')->setRowHeight(22);
			$objPHPExcel->setActiveSheetIndex(0) ->setCellValue('C11', "Extra Expenses");

			
			$objPHPExcel->getActiveSheet()->getStyle('E12')->applyFromArray($styleArray5);
                        $objPHPExcel->getActiveSheet()->getRowDimension('12')->setRowHeight(22);
			$objPHPExcel->setActiveSheetIndex(0) ->setCellValue('E12', "TOTAL  ");
			
			
			$objPHPExcel->getActiveSheet()->mergeCells('B14:G14');
			$objPHPExcel->getActiveSheet()->getStyle('B14')->applyFromArray($styleArray5);
			$objPHPExcel->setActiveSheetIndex(0) ->setCellValue('B14', "Student's Name : ".$student['S_NAME']);
			
			$objPHPExcel->getActiveSheet()->mergeCells('B16:D16');
			$objPHPExcel->getActiveSheet()->getStyle('B16')->applyFromArray($styleArray5);
			$objPHPExcel->setActiveSheetIndex(0) ->setCellValue('B16', "Student Admission No : ".$student['S_AD_ID']);
			
			$objPHPExcel->getActiveSheet()->mergeCells('E16:G16');
			$objPHPExcel->getActiveSheet()->getStyle('E16')->applyFromArray($styleArray5);
			$objPHPExcel->setActiveSheetIndex(0) ->setCellValue('E16', "Date : ".date("d-m-Y"));
			
			$objPHPExcel->getActiveSheet()->mergeCells('B18:D18');
			$objPHPExcel->getActiveSheet()->getStyle('B18')->applyFromArray($styleArray5);
			$objPHPExcel->setActiveSheetIndex(0) ->setCellValue('B18', "Grade : ".$stu_grade);
			
			$objPHPExcel->getActiveSheet()->mergeCells('E18:G18');
			$objPHPExcel->getActiveSheet()->getStyle('E18')->applyFromArray($styleArray5);
			$objPHPExcel->setActiveSheetIndex(0) ->setCellValue('E18', "Received by :  ………………………………………. ");
						


			//applying fees
			$objPHPExcel->getActiveSheet()->getStyle('E7:E11')->applyFromArray($styleArray6);
			$objPHPExcel->setActiveSheetIndex(0) ->setCellValue('E7', $L_YEAR."-".$L_MONTH. " To ".$SF_YEAR."-".$SF_MONTH );
			$objPHPExcel->setActiveSheetIndex(0) ->setCellValue('E8', $L_YEAR."-".$L_MONTH. " To ".$SF_YEAR."-".$SF_MONTH );
			$objPHPExcel->setActiveSheetIndex(0) ->setCellValue('E9', $L_YEAR."-".$L_MONTH. " To ".$SF_YEAR."-".$SF_MONTH );
			$objPHPExcel->setActiveSheetIndex(0) ->setCellValue('E10',$L_YEAR."-".$L_MONTH. " To ".$SF_YEAR."-".$SF_MONTH );
			$objPHPExcel->setActiveSheetIndex(0) ->setCellValue('E11',$L_YEAR."-".$L_MONTH. " To ".$SF_YEAR."-".$SF_MONTH );
			
			$objPHPExcel->getActiveSheet()->getStyle('F7:F13')->applyFromArray($styleArray7);
			$objPHPExcel->setActiveSheetIndex(0) ->setCellValue('F7', $school_fees);
			$objPHPExcel->setActiveSheetIndex(0) ->setCellValue('F8', $security_fees);
			$objPHPExcel->setActiveSheetIndex(0) ->setCellValue('F9', $facility_fees);
			$objPHPExcel->setActiveSheetIndex(0) ->setCellValue('F10', $maintaince_fees);
			$objPHPExcel->setActiveSheetIndex(0) ->setCellValue('F11', $extra_fees);
			
			$objPHPExcel->setActiveSheetIndex(0) ->setCellValue('F12', $total);
			
			$objPHPExcel->setActiveSheetIndex(0) ->setCellValue('F13', $extra);
			
			$objPHPExcel->getActiveSheet()->getStyle('G7:G12')->applyFromArray($styleArray7);
			$objPHPExcel->setActiveSheetIndex(0) ->setCellValue('G7', 00);
			$objPHPExcel->setActiveSheetIndex(0) ->setCellValue('G8', 00);
			$objPHPExcel->setActiveSheetIndex(0) ->setCellValue('G9', 00);
			$objPHPExcel->setActiveSheetIndex(0) ->setCellValue('G10', 00);
			$objPHPExcel->setActiveSheetIndex(0) ->setCellValue('G11', 00);
			
			$objPHPExcel->setActiveSheetIndex(0) ->setCellValue('G12', 00);
			
			
			

			// Set active sheet index to the first sheet, so Excel opens this as the first sheet
			$objPHPExcel->setActiveSheetIndex(0);
				
			$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
			$objWriter->save(str_replace('.php', '.xls', "school_fees_recipt.xls"));
			
										
			// END EXCEL WRITER

		}
		  $local_file = "school_fees_recipt.xls";
		  // set the download rate limit (=> 20,5 kb/s)
		  $download_rate = 20.5;
                  sleep(15);
		  if(file_exists($local_file))
		  {
			  header('Cache-control: private');
			  header('Content-Type: application/octet-stream');
			  header('Content-Length: '.filesize($local_file));
			  header('Content-Disposition: filename='.$local_file);
  
			  flush();
			  $file = fopen($local_file, "r");
			  while(!feof($file))
			  {
				  // send the current file part to the browser
				  print fread($file, round($download_rate * 1024));
				  // flush the content to the browser
				  flush();
				  // sleep one second
				  sleep(1);
			  }
			  fclose($file);
       
			  return true;
			  }
		  else {
			  die('Error: The file '.$local_file.' does not exist!');		
		  }
		}
		else
			return true;
                  
		
	}
	static function getStudentFeesDet($S_ID)
	{
		$sql = " SELECT * FROM student_fees WHERE SF_S_ID = $S_ID ";	
		$res = MySQL :: query($sql);	
		return $res->row;		
	}
	static function validateStudent()
	{
		$sql = " SELECT S_AD_ID FROM student WHERE S_AD_ID = '".$_REQUEST['S_AD_ID']."' " ;
		$res = MySQL :: query($sql);	
		if(MySQL :: countAffected()>0)
			return true;
		else
			return false;
	}
}
?>