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
		$sql = " SELECT * FROM student ";	
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
			
			$objPHPExcel = new PHPExcel();
			
			// Set document properties
			$objPHPExcel->getProperties()->setCreator("Ishan Jayamanne")
										 ->setLastModifiedBy("Ishan Jayamanne")
										 ->setTitle("School Fees")
										 ->setSubject("School Fees")
										 ->setDescription("School Fees document in AVE Maria convent Bolawalana");
			
			$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(4);
			$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(35);
			$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(12);
			$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(17);
			$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(27);
			$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(8);	
			
			
			//setting borders
			$objPHPExcel->getActiveSheet()->getStyle('A5:F11')->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
			$objPHPExcel->getActiveSheet()->getStyle('E12:F12')->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
			
			$styleArray1 = array(
				'font' => array(
					'bold' => true,
					'size' => 16,
					'name' =>  'Calibri Light',
				),
				'alignment' => array(
					'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
					'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
				),
			);
			
			$styleArray2 = array(
				'font' => array(
					'size' => 12,
					'name' =>  'Calibri',
				),
				'alignment' => array(
					'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
					'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
				),
			);
			$styleArray3 = array(
				'font' => array(
					'size' => 11,
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
					'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_RIGHT,
					'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
				),
			);
			
			//setHorizontalCentered
			
			
		
			
			$objPHPExcel->getActiveSheet()->mergeCells('A1:F1');
			$objPHPExcel->getActiveSheet()->getStyle('A1')->applyFromArray($styleArray1);
			$objPHPExcel->getActiveSheet()->getRowDimension('1')->setRowHeight(25);
			$objPHPExcel->setActiveSheetIndex(0) ->setCellValue('A1', "AVE MARIA CONVENT BRANCH SCHOOL");
	
	
			$objPHPExcel->getActiveSheet()->mergeCells('A2:F2');
			$objPHPExcel->getActiveSheet()->getStyle('A2')->applyFromArray($styleArray2);
			$objPHPExcel->getActiveSheet()->getRowDimension('2')->setRowHeight(15);
			$objPHPExcel->setActiveSheetIndex(0) ->setCellValue('A2', "AKKARAPANAHA - NEGOMBO");
	
	
			$objPHPExcel->getActiveSheet()->mergeCells('A4:F4');
			$objPHPExcel->getActiveSheet()->getStyle('A4')->applyFromArray($styleArray3);
			$objPHPExcel->getActiveSheet()->getRowDimension('4')->setRowHeight(15);
			$objPHPExcel->setActiveSheetIndex(0) ->setCellValue('A4', "Receiyed with thanks the following sums in respect of");
			
			$objPHPExcel->getActiveSheet()->mergeCells('A5:A6');
			$objPHPExcel->getActiveSheet()->mergeCells('B5:B6');
			$objPHPExcel->getActiveSheet()->getStyle('B5')->applyFromArray($styleArray4);
			$objPHPExcel->getActiveSheet()->getRowDimension('5')->setRowHeight(25);
			$objPHPExcel->setActiveSheetIndex(0) ->setCellValue('B5', "Particulars");
			
			$objPHPExcel->getActiveSheet()->mergeCells('C5:C6');
			$objPHPExcel->getActiveSheet()->getStyle('C5')->applyFromArray($styleArray4);
			$objPHPExcel->setActiveSheetIndex(0) ->setCellValue('C5', "At");
			
			$objPHPExcel->getActiveSheet()->mergeCells('D5:D6');
			$objPHPExcel->getActiveSheet()->getStyle('D5')->applyFromArray($styleArray4);
			$objPHPExcel->setActiveSheetIndex(0) ->setCellValue('D5', "For the period");
			
			$objPHPExcel->getActiveSheet()->mergeCells('E5:F5');
			$objPHPExcel->getActiveSheet()->getStyle('E5')->applyFromArray($styleArray4);
			$objPHPExcel->setActiveSheetIndex(0) ->setCellValue('E5', "Amount");
			
			
			$objPHPExcel->getActiveSheet()->getStyle('E6')->applyFromArray($styleArray4);
			$objPHPExcel->setActiveSheetIndex(0) ->setCellValue('E6', "Rs.");
			
			$objPHPExcel->getActiveSheet()->getStyle('F6')->applyFromArray($styleArray4);
			$objPHPExcel->setActiveSheetIndex(0) ->setCellValue('F6', "Cts.");
			
			
			$objPHPExcel->getActiveSheet()->getStyle('A7')->applyFromArray($styleArray4);
			$objPHPExcel->setActiveSheetIndex(0) ->setCellValue('A7', "1");
			
			$objPHPExcel->getActiveSheet()->getStyle('A8')->applyFromArray($styleArray4);
			$objPHPExcel->setActiveSheetIndex(0) ->setCellValue('A8', "2");
			
			$objPHPExcel->getActiveSheet()->getStyle('A9')->applyFromArray($styleArray4);
			$objPHPExcel->setActiveSheetIndex(0) ->setCellValue('A9', "3");
			
			$objPHPExcel->getActiveSheet()->getStyle('A10')->applyFromArray($styleArray4);
			$objPHPExcel->setActiveSheetIndex(0) ->setCellValue('A10', "4");
			
			$objPHPExcel->getActiveSheet()->getStyle('A11')->applyFromArray($styleArray4);
			$objPHPExcel->setActiveSheetIndex(0) ->setCellValue('A11', "5");
			
			
			$objPHPExcel->getActiveSheet()->getStyle('B7')->applyFromArray($styleArray3);
			$objPHPExcel->setActiveSheetIndex(0) ->setCellValue('B7', "School Fees");
			
			$objPHPExcel->getActiveSheet()->getStyle('B8')->applyFromArray($styleArray3);
			$objPHPExcel->setActiveSheetIndex(0) ->setCellValue('B8', "Security Fees");
			
			$objPHPExcel->getActiveSheet()->getStyle('B9')->applyFromArray($styleArray3);
			$objPHPExcel->setActiveSheetIndex(0) ->setCellValue('B9', "Facility Fees");
			
			$objPHPExcel->getActiveSheet()->getStyle('B10')->applyFromArray($styleArray3);
			$objPHPExcel->setActiveSheetIndex(0) ->setCellValue('B10', "Maintenance");
			
			$objPHPExcel->getActiveSheet()->getStyle('B11')->applyFromArray($styleArray3);
			$objPHPExcel->setActiveSheetIndex(0) ->setCellValue('B11', "Extra Expenses");
			
			$objPHPExcel->getActiveSheet()->getStyle('B11')->applyFromArray($styleArray3);
			$objPHPExcel->setActiveSheetIndex(0) ->setCellValue('B11', "Extra Expenses");
			
			$objPHPExcel->getActiveSheet()->getStyle('D12')->applyFromArray($styleArray5);
			$objPHPExcel->setActiveSheetIndex(0) ->setCellValue('D12', "TOTAL  ");
			
			$objPHPExcel->getActiveSheet()->mergeCells('A15:F15');
			$objPHPExcel->getActiveSheet()->getStyle('A15')->applyFromArray($styleArray3);
			$objPHPExcel->setActiveSheetIndex(0) ->setCellValue('A15', "Student's Name : ".$student['S_NAME']);
			
			$objPHPExcel->getActiveSheet()->mergeCells('A17:C17');
			$objPHPExcel->getActiveSheet()->getStyle('A17')->applyFromArray($styleArray3);
			$objPHPExcel->setActiveSheetIndex(0) ->setCellValue('A17', "Student Admission No : ".$student['S_AD_ID']);
			
			$objPHPExcel->getActiveSheet()->mergeCells('D17:D17');
			$objPHPExcel->getActiveSheet()->getStyle('D17')->applyFromArray($styleArray3);
			$objPHPExcel->setActiveSheetIndex(0) ->setCellValue('D17', "Date : ".date("d-m-Y"));
			
			$objPHPExcel->getActiveSheet()->mergeCells('A19:C19');
			$objPHPExcel->getActiveSheet()->getStyle('A19')->applyFromArray($styleArray3);
			$objPHPExcel->setActiveSheetIndex(0) ->setCellValue('A19', "Grade : ".$stu_grade);
			
			$objPHPExcel->getActiveSheet()->mergeCells('D19:D19');
			$objPHPExcel->getActiveSheet()->getStyle('D19')->applyFromArray($styleArray3);
			$objPHPExcel->setActiveSheetIndex(0) ->setCellValue('D19', "Received by : ");
						


			//applying fees
			$objPHPExcel->getActiveSheet()->getStyle('D7:D11')->applyFromArray($styleArray4);
			$objPHPExcel->setActiveSheetIndex(0) ->setCellValue('D7', $months." Months");
			$objPHPExcel->setActiveSheetIndex(0) ->setCellValue('D8', $months." Months");
			$objPHPExcel->setActiveSheetIndex(0) ->setCellValue('D9', $months." Months");
			$objPHPExcel->setActiveSheetIndex(0) ->setCellValue('D10', $months." Months");
			$objPHPExcel->setActiveSheetIndex(0) ->setCellValue('D11', $months." Months");
			
			$objPHPExcel->getActiveSheet()->getStyle('E7:E12')->applyFromArray($styleArray5);
			$objPHPExcel->setActiveSheetIndex(0) ->setCellValue('E7', $school_fees);
			$objPHPExcel->setActiveSheetIndex(0) ->setCellValue('E8', $security_fees);
			$objPHPExcel->setActiveSheetIndex(0) ->setCellValue('E9', $facility_fees);
			$objPHPExcel->setActiveSheetIndex(0) ->setCellValue('E10', $maintaince_fees);
			$objPHPExcel->setActiveSheetIndex(0) ->setCellValue('E11', $extra_fees);
			
			$objPHPExcel->setActiveSheetIndex(0) ->setCellValue('E12', $total);
			
			
			$objPHPExcel->getActiveSheet()->getStyle('F7:F12')->applyFromArray($styleArray5);
			$objPHPExcel->setActiveSheetIndex(0) ->setCellValue('F7', 00);
			$objPHPExcel->setActiveSheetIndex(0) ->setCellValue('F8', 00);
			$objPHPExcel->setActiveSheetIndex(0) ->setCellValue('F9', 00);
			$objPHPExcel->setActiveSheetIndex(0) ->setCellValue('F10', 00);
			$objPHPExcel->setActiveSheetIndex(0) ->setCellValue('F11', 00);
			
			$objPHPExcel->setActiveSheetIndex(0) ->setCellValue('F12', 00);
			
			
			

			// Set active sheet index to the first sheet, so Excel opens this as the first sheet
			$objPHPExcel->setActiveSheetIndex(0);
				
			$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
			$objWriter->save(str_replace('.php', '.xls', "school_fees_recipt.xls"));
			
										
			// END EXCEL WRITER

		}
		  $local_file = "school_fees_recipt.xls";
		  // set the download rate limit (=> 20,5 kb/s)
		  $download_rate = 20.5;
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