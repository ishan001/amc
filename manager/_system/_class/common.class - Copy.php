<?php
class COMMON { 

	/* subject */
	static function getSubjects()
	{
		$sql = "SELECT * FROM subjects ORDER BY SB_NAME ";
		$res = MySQL :: query($sql);
		return $res->rows;	
	}
	static function addSubject()
	{
		$sql = "INSERT INTO subjects SET  SB_NAME = '".$_REQUEST['SB_NAME']."' , SB_ACTIVE = '1' ";
		$res = MySQL :: query($sql);	
		return true;		
	}
	static function loadSubjects()
	{
		$sql = "SELECT * FROM subjects  ORDER BY SB_NAME ";
		$res = MySQL :: query($sql);
		$subs = $res->rows;
		 foreach($subs as $rowSubs) { ?>
                  <li style="border-bottom:none" class="tree-item-main parent" > <span class="item box-slide-head"><?=$rowSubs['SB_NAME']?> <span class="cat-links"><a href="javascript:editSubject('<?=$rowSubs['SB_NAME']?>','<?=$rowSubs['SB_ID']?>')" class="cat-edit clickable" title="edit" >edit</a></span></span>
                    
                  </li>
                  <? } 
	}
	static function editSubject()
	{
		$sql = "UPDATE subjects SET  SB_NAME = '".$_REQUEST['SB_NAME']."'  WHERE SB_ID = '".$_REQUEST['SB_ID']."' ";
		$res = MySQL :: query($sql);	
		return true;	
	}
	static function getSubjectName($SB_ID)
	{
		$sql = "SELECT * FROM subjects WHERE SB_ID = '".$SB_ID."' ";
		$res = MySQL :: query($sql);
		return $res->row['SB_NAME'];		
	}
	/* sports */
	static function getSports()
	{
		$sql = "SELECT * FROM sports ORDER BY SP_NAME ";
		$res = MySQL :: query($sql);
		return $res->rows;	
	}	
	static function addSport()
	{
		$sql = "INSERT INTO sports SET  SP_NAME = '".$_REQUEST['SP_NAME']."' ";
		$res = MySQL :: query($sql);	
		return true;		
	}
	static function loadSports()
	{
		$sql = "SELECT * FROM sports  ORDER BY SP_NAME ";
		$res = MySQL :: query($sql);
		$sports = $res->rows;
		 foreach($sports as $rowSport) { ?>
                  <li style="border-bottom:none" class="tree-item-main parent" > <span class="item box-slide-head"><?=$rowSport['SP_NAME']?> <span class="cat-links"><a href="javascript:editSport('<?=$rowSport['SP_NAME']?>','<?=$rowSport['SP_ID']?>')" class="cat-edit clickable" title="edit" >edit</a></span></span>
                    
                  </li>
                  <? } 
	}
	static function editSport()
	{
		$sql = "UPDATE sports SET  SP_NAME = '".$_REQUEST['SP_NAME']."'  WHERE SP_ID = '".$_REQUEST['SP_ID']."' ";
		$res = MySQL :: query($sql);	
		return true;	
	}
	// news carriculum Activites 
	static function getCarricu_act()
	{
		$sql = "SELECT * FROM carriculum_activities ORDER BY CA_NAME ";
		$res = MySQL :: query($sql);
		return $res->rows;	
	}	
	
	static function addActivity()
	{
		$sql = "INSERT INTO carriculum_activities SET  CA_NAME = '".$_REQUEST['CA_NAME']."' ";
		$res = MySQL :: query($sql);	
		return true;		
	}
	static function loadActivity()
	{
		$sql = "SELECT * FROM carriculum_activities  ORDER BY CA_NAME ";
		$res = MySQL :: query($sql);
		$carAct = $res->rows;
		 foreach($carAct as $rowAct) { ?>
                  <li style="border-bottom:none" class="tree-item-main parent" > <span class="item box-slide-head"><?=$rowAct['CA_NAME']?> <span class="cat-links"><a href="javascript:editActivity('<?=$rowAct['CA_NAME']?>','<?=$rowAct['CA_ID']?>')" class="cat-edit clickable" title="edit" >edit</a></span></span>
                    
                  </li>
                  <? } 
	}
	static function editActivity()
	{
		$sql = "UPDATE carriculum_activities SET  CA_NAME = '".$_REQUEST['CA_NAME']."'  WHERE CA_ID = '".$_REQUEST['CA_ID']."' ";
		$res = MySQL :: query($sql);	
		return true;	
	}
	
	
	
	// news section 
	static function addNews()
	{
		$sql = "INSERT INTO news SET  N_TITLE = '".$_REQUEST['N_TITLE']."' , N_DATE = '".$_REQUEST['N_DATE']."' , N_DESCRIPTION = '".$_REQUEST['N_DESCRIPTION2']."' , N_GAL_ID = '".$_REQUEST['N_GAL_ID']."', N_ACTIVE = '1' ";
		$res = MySQL :: query($sql);	
		$id = 	MySQL :: getLastId();
		return $id;	
	}
	static function getNewsDet($N_ID)
	{
		$sql = "SELECT * FROM news WHERE N_ID = '".$N_ID."' ";
		$res = MySQL :: query($sql);
		return $res->row;				
	}
	static function getNewsImages($N_ID)
	{
		$sql = "SELECT * FROM news_images WHERE NI_N_ID = '".$N_ID."' ";
		$res = MySQL :: query($sql);
		return $res->rows;				
	}
	static function deleteNewsImage()
	{
		$sql = "DELETE FROM news_images WHERE NI_ID = '".$_REQUEST['imgId']."' ";
		$res = MySQL :: query($sql);			
		return true;
	}
	static function getAllNews()
	{
		$sql = "SELECT * FROM news  ";
		$res = MySQL :: query($sql);
		return $res->rows;					
	}
	static function editNews()
	{
		$sql = "UPDATE  news SET  N_TITLE = '".$_REQUEST['N_TITLE']."' , N_DATE = '".$_REQUEST['N_DATE']."' , N_DESCRIPTION = '".$_REQUEST['N_DESCRIPTION2']."', N_GAL_ID = '".$_REQUEST['N_GAL_ID']."' WHERE  N_ID = '".$_REQUEST['N_ID']."' ";
		$res = MySQL :: query($sql);	
		return true;		
	}
	
	// event section 
	static function addEvent()
	{
		$sql = "INSERT INTO events  SET   E_TITLE = '".$_REQUEST['E_TITLE']."', E_DATE = '".$_REQUEST['E_DATE']."',E_LOCATION = '".$_REQUEST['E_LOCATION']."', E_DESCRIPTION = '".$_REQUEST['E_DESCRIPTION2']."', E_IMAGE = '".$_SESSION['EvntupImg']."', E_ACTIVE=1 ";
		$res = MySQL :: query($sql);	
		return true;
			
	}
	static function getAllEvents()
	{
		$sql = "SELECT * FROM events  ";
		$res = MySQL :: query($sql);
		return $res->rows;					
	}
	static function getEventDet($E_ID)
	{
		$sql = "SELECT * FROM  events WHERE E_ID = '".$E_ID."' ";
		$res = MySQL :: query($sql);
		return $res->row;				
	}	
	static function editEvent()
	{
		$sql = "UPDATE events SET    E_TITLE = '".$_REQUEST['E_TITLE']."', E_DATE = '".$_REQUEST['E_DATE']."',E_LOCATION = '".$_REQUEST['E_LOCATION']."', E_DESCRIPTION = '".$_REQUEST['E_DESCRIPTION2']."' ";
		if($_SESSION['EvntupImg'])
			$sql .= " , E_IMAGE = '".$_SESSION['EvntupImg']."' ";
		$sql .=" WHERE E_ID = '".$_REQUEST['E_ID']."' ";

		$res = MySQL :: query($sql);	
		return true;			
	}
	
	//Gallery
	static function addGallery()
	{
		$sql = "INSERT INTO gallery SET  G_NAME = '".$_REQUEST['G_NAME']."'  ";
		$res = MySQL :: query($sql);	
		$id = 	MySQL :: getLastId();
		return $id;	 	
	}
	static function getGalImages($G_ID)
	{
		$sql = "SELECT * FROM  gallery_images WHERE GI_G_ID = '".$G_ID."' ";
		$res = MySQL :: query($sql);
		return $res->rows;			
	}
	static function getGalleryDet($G_ID)
	{
		$sql = "SELECT * FROM  gallery WHERE G_ID = '".$G_ID."' ";
		$res = MySQL :: query($sql);
		return $res->row;			
	}
	static function getAllGallery()
	{
		$sql = "SELECT * FROM  gallery";
		$res = MySQL :: query($sql);
		return $res->rows;			
	}
	static function deleteGalleryImage()
	{
		$sql = " SELECT * FROM gallery_images WHERE GI_ID = '".$_REQUEST['imgId']."'   ";	
		$res = MySQL :: query($sql);
		$row = $res->row;
						
		$sql = " DELETE FROM gallery_images WHERE GI_ID = '".$_REQUEST['imgId']."'   ";	
		$res = MySQL :: query($sql);
		if(MySQL :: countAffected()>0)
		{
			if(file_exists("../../upload/gallery/".$row['GI_NAME']))	
				unlink("../../upload/gallery/".$row['GI_NAME']);
			if(file_exists("../../upload/gallery/thumb/".$row['GI_NAME']))	
				unlink("../../upload/gallery/thumb/".$row['GI_NAME']);	
		}
		return true;
	}
	static function editGallery()
	{
		$sql = "UPDATE gallery SET  G_NAME = '".$_REQUEST['G_NAME']."' WHERE G_ID = '".$_REQUEST['G_ID']."'  ";
		$res = MySQL :: query($sql);	
		return true;	 	
	}
	static function sortGallery()
	{
		$result = $_REQUEST["table-all"];
		$i=1;
		foreach($result as $G_ID) {
			if($G_ID)
			{
				$sql = "UPDATE gallery SET  G_DELTA = '".$i."' WHERE G_ID = '".$G_ID."'  ";
				$res = MySQL :: query($sql);
				$i++;
			}
		}

		return true;	 	
	}
	
	/* content */ 
	static function getContents()
	{
		$sql = "SELECT * FROM content ORDER BY C_NAME ";
		$res = MySQL :: query($sql);
		return $res->rows;	
	}
	static function addContent()
	{
		$C_SEO = str_replace(" ","-", strtolower($_REQUEST['C_NAME']));
		$sql = "INSERT INTO content SET  C_NAME = '".$_REQUEST['C_NAME']."' ,C_SEO = '".$C_SEO."' , C_DATA = '".$_REQUEST['C_DATA']."' , C_ACTIVE = '1' ";
		$res = MySQL :: query($sql);	
		return true;		
	}
	static function getContentDet($C_ID)
	{
		$sql = "SELECT * FROM content WHERE C_ID = '".$C_ID."'  ";
		$res = MySQL :: query($sql);
		return $res->row;			
	}
	static function editContent()
	{
		$C_SEO = str_replace(" ","-", strtolower($_REQUEST['C_NAME']));
		$sql = "UPDATE content SET  C_NAME = '".$_REQUEST['C_NAME']."' ,C_SEO = '".$C_SEO."' , C_DATA = '".$_REQUEST['C_DATA']."' WHERE C_ID = '".$_REQUEST['C_ID']."' ";
		$res = MySQL :: query($sql);	
		return true;		
	}
	static function exportFees()
	{
		$year = $_REQUEST['SF_YEAR'];
		$month = $_REQUEST['SF_MONTH'];
		$grade = $_REQUEST['SF_GRADE'];
		$timestamp = mktime (0,0,0,$_REQUEST['SF_MONTH'],0,$_REQUEST['SF_YEAR']);

		
/*		$excel = new Spreadsheet_Excel_Writer("School_Fees.xls");
		$format =& $excel->addFormat(array('Size' => 14,
                                      'Align' => 'center',
                                      'VAlign' => 'vcenter',
                                      'Bold' => 1,
									  'FontFamily' => 'Cambria',
									));
		$format2 =& $excel->addFormat(array('Size' => 11,
									  'FontFamily' => 'Calibri',
									  'Bold' => 1,
									  'Align' => 'center',
									));	
																
		$format3 =& $excel->addFormat(array('Size' => 11,
									  'FontFamily' => 'Calibri',
									  'Align' => 'center',
									));								
		$worksheet =& $excel->addWorksheet();
		
		$worksheet->setMerge (0,1,0,6);
		$worksheet->setRow(0,30);
		$worksheet->write(0,1,"School Fees Details till ".$year." - ".$month,$format);
		
		
		if($grade)
		{	
			$worksheet->setMerge (2,0,2,4);
			$worksheet->setRow(2,30);
			$worksheet->write(2,0," Grade - ".$grade,$format);
			
			$worksheet->setColumn(0,0,15);
			$worksheet->write(4,0,"Student ID",$format2);
			
			  
 		 	$worksheet->setColumn(1,1,30);
			$worksheet->write(4,1,"Student Name",$format2);
			
			$worksheet->setColumn(2,2,15);
			$worksheet->write(4,2,"Class",$format2);
			
			$worksheet->setColumn(3,3,20);
			$worksheet->write(4,3,"Last Payament",$format2);
			
			$worksheet->setColumn(4,4,20);
			$worksheet->write(4,4,"Due in Months",$format2);
			
			$i=5;
			$j=0;
			$currYear = date("Y");

			
			
			
			$sql = "SELECT * FROM student_fees LEFT JOIN student ON S_ID = SF_S_ID WHERE  SF_YEAR <= '".$year ."'  AND SF_MONTH <= '".$month."'   AND SF_S_ID in ( SELECT S_ID FROM `student` where S_GRADE like '".$grade."%' )  ";
			$res = MySQL :: query($sql);
		    $rows = $res->rows;
			foreach($rows as $row) { 			
						
				$date1 = mktime(0,0,0,date("m"),0,$currYear);
				$date2 = mktime(0,0,0,$row['SF_MONTH'],0,$row['SF_YEAR']);
				$defMonths = round(($date1-$date2) / 60 / 60 / 24 / 30);
			
			
				$worksheet->write($i,$j,$row['S_AD_ID'],$format3);
				$worksheet->write($i,$j+1,$row['S_NAME'],$format3);
				$worksheet->write($i,$j+2,$row['S_GRADE'],$format3);
				$worksheet->write($i,$j+3,$row['SF_YEAR']."-".$row['SF_MONTH'],$format3);
				$worksheet->write($i,$j+4,$defMonths,$format3);
				
				$i++;
				$j++;
			
			}
			
			
			
		
		}
		else
		{
			$r=2;
			$j=4;
			$k=5;
			
				
			for($i=2;$i<14;$i++)
			{
				
				$sql = "SELECT * FROM student_fees LEFT JOIN student ON S_ID = SF_S_ID WHERE  SF_YEAR <= '".$year ."'  AND SF_MONTH <= '".$month."'   AND SF_S_ID in ( SELECT S_ID FROM `student` where S_GRADE like '".$i."%' )  ";	
				$res = MySQL :: query($sql);
		    	$rows = $res->rows;
				

				if($rows)
				{
					$worksheet->setMerge ($r,0,$r,4);
					$worksheet->setRow($r,30);
					$worksheet->write($r,0," Grade - ".$i,$format);
					
					$worksheet->setColumn(0,0,15);
					$worksheet->write($j,0,"Student ID",$format2);
					
					  
					$worksheet->setColumn(1,1,30);
					$worksheet->write($j,1,"Student Name",$format2);
					
					$worksheet->setColumn(2,2,15);
					$worksheet->write($j,2,"Class",$format2);
					
					$worksheet->setColumn(3,3,20);
					$worksheet->write($j,3,"Last Payament",$format2);
					
					$worksheet->setColumn(4,4,20);
					$worksheet->write($j,4,"Due in Months",$format2);

					
					$currYear = date("Y");

					foreach($rows as $row) { 
						$date1 = mktime(0,0,0,date("m"),0,$currYear);
						$date2 = mktime(0,0,0,$row['SF_MONTH'],0,$row['SF_YEAR']);
						$defMonths = round(($date1-$date2) / 60 / 60 / 24 / 30);
					
					
						$worksheet->write($k,0,$row['S_AD_ID'],$format3);
						$worksheet->write($k,1,$row['S_NAME'],$format3);
						$worksheet->write($k,2,$row['S_GRADE'],$format3);
						$worksheet->write($k,3,$row['SF_YEAR']."-".$row['SF_MONTH'],$format3);
						$worksheet->write($k,4,$defMonths,$format3);				
						$k++;
			
					}

					$r = $k+3;
					$j = $k+5;
					$k = $k+6;
				}
				
			}
		}
				$excel->close();*/
	 //save file to disk
	//if ($excel->close() === true) 
	/*if($grade)
	{
		$download_file = "School_Fees1.xls";
		$local_file = "School_Fees1.xls";
		// set the download rate limit (=> 20,5 kb/s)
		$download_rate = 20.5;
		if(file_exists($local_file))
		{
    		header('Cache-control: private');
    		header('Content-Type: application/octet-stream');
    		header('Content-Length: '.filesize($local_file));
    		header('Content-Disposition: filename='.$download_file);

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
			}
		else {
    		die('Error: The file '.$local_file.' does not exist!');
		}
	}
	else
	{
		$download_file = "School_Fees.xls";
		$local_file = "School_Fees.xls";
		// set the download rate limit (=> 20,5 kb/s)
		$download_rate = 20.5;
		if(file_exists($local_file))
		{
    		header('Cache-control: private');
    		header('Content-Type: application/octet-stream');
    		header('Content-Length: '.filesize($local_file));
    		header('Content-Disposition: filename='.$download_file);

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
			}
		else {
    		die('Error: The file '.$local_file.' does not exist!');
		}		
	}*/

	$objPHPExcel = new PHPExcel();
	
	// Set document properties
	$objPHPExcel->getProperties()->setCreator("Maarten Balliauw")
								 ->setLastModifiedBy("Maarten Balliauw")
								 ->setTitle("PHPExcel Test Document")
								 ->setSubject("PHPExcel Test Document")
								 ->setDescription("Test document for PHPExcel, generated using PHP classes.")
								 ->setKeywords("office PHPExcel php")
								 ->setCategory("Test result file");
	
	$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(15);
	$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(30);
	$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(15);
	$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
	$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
	
	$styleArray1 = array(
		'font' => array(
			'bold' => true,
			'size' => 14,
			'name' =>  'Cambria',
		),
		'alignment' => array(
			'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
			'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
		),
	);
	
	$styleArray2 = array(
		'font' => array(
			'bold' => true,
			'size' => 11,
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
			'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
			'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
		),
	);
	
	//setHorizontalCentered
	
	

	
	$objPHPExcel->getActiveSheet()->mergeCells('B1:G1');
	$objPHPExcel->getActiveSheet()->getStyle('B1')->applyFromArray($styleArray1);
	$objPHPExcel->getActiveSheet()->getRowDimension('1')->setRowHeight(30);
	$objPHPExcel->setActiveSheetIndex(0) ->setCellValue('B1', "School Fees Details till ".$year." - ".$month);



	if($grade)
	{
		
		$objPHPExcel->getActiveSheet()->mergeCells('A3:E3');
		$objPHPExcel->getActiveSheet()->getStyle('A3')->applyFromArray($styleArray1);
		$objPHPExcel->getActiveSheet()->getRowDimension('3')->setRowHeight(30);
		$objPHPExcel->setActiveSheetIndex(0) ->setCellValue('A3', 'Grade -'.$grade);


		$objPHPExcel->getActiveSheet()->getStyle('A5')->applyFromArray($styleArray2);
		$objPHPExcel->setActiveSheetIndex(0) ->setCellValue('A5', 'Student ID');
		
		$objPHPExcel->getActiveSheet()->getStyle('B5')->applyFromArray($styleArray2);
		$objPHPExcel->setActiveSheetIndex(0) ->setCellValue('B5', 'Student Name');
		
		$objPHPExcel->getActiveSheet()->getStyle('C5')->applyFromArray($styleArray2);
		$objPHPExcel->setActiveSheetIndex(0) ->setCellValue('C5', 'Class');
		
		$objPHPExcel->getActiveSheet()->getStyle('D5')->applyFromArray($styleArray2);
		$objPHPExcel->setActiveSheetIndex(0) ->setCellValue('D5', 'Last Payament');
		
		$objPHPExcel->getActiveSheet()->getStyle('E5')->applyFromArray($styleArray2);
		$objPHPExcel->setActiveSheetIndex(0) ->setCellValue('E5', 'Due in Months');		
		
		$i=6;
		$currYear = date("Y");

		
		
		
		$sql = "SELECT * FROM student_fees LEFT JOIN student ON S_ID = SF_S_ID WHERE  SF_TIMESTAMP <= '".$timestamp ."'  AND SF_S_ID in ( SELECT S_ID FROM `student` where S_GRADE = '".$grade."' )  ";
		$res = MySQL :: query($sql);
		$rows = $res->rows;
		
		foreach($rows as $row) { 			
			$date1 = mktime(0,0,0,date("m"),0,$currYear);
			$date2 = mktime(0,0,0,$row['SF_MONTH'],0,$row['SF_YEAR']);
			$defMonths = round(($date1-$date2) / 60 / 60 / 24 / 30);
		

			$objPHPExcel->getActiveSheet()->getStyle('A'.$i)->applyFromArray($styleArray3);
			$objPHPExcel->setActiveSheetIndex(0) ->setCellValue('A'.$i, $row['S_AD_ID']);
			
			$objPHPExcel->getActiveSheet()->getStyle('B'.$i)->applyFromArray($styleArray3);
			$objPHPExcel->setActiveSheetIndex(0) ->setCellValue('B'.$i, $row['S_NAME']);
			
			$objPHPExcel->getActiveSheet()->getStyle('C'.$i)->applyFromArray($styleArray3);
			$objPHPExcel->setActiveSheetIndex(0) ->setCellValue('C'.$i, $row['S_GRADE']);
			
			$objPHPExcel->getActiveSheet()->getStyle('D'.$i)->applyFromArray($styleArray3);
			$objPHPExcel->setActiveSheetIndex(0) ->setCellValue('D'.$i, $row['SF_YEAR']."-".$row['SF_MONTH']);
			
			$objPHPExcel->getActiveSheet()->getStyle('E'.$i)->applyFromArray($styleArray3);
			$objPHPExcel->setActiveSheetIndex(0) ->setCellValue('E'.$i, $defMonths);					
			
			
			$i++;
		
		}
		
		
		
	
	}
	else
	{
		$r=3;
		$j=5;
		$k=6;
		
			
		for($i=2;$i<14;$i++)
		{

			if($i<=5 || $i>=12)
				$max_grade = 3;
			else 
				$max_grade = 4;
				
			for($l=1;$l<=$max_grade;$l++)
			{
				if($l==1)
					$class = "A";
				else if($l==2)
					$class = "B";	
				else if($l==3 && ($i<=5 || $i>=12))	
					$class = "C";
	
				else if($l=4)
					$class = "C-E";
				else
					$class = "C-S";	
			
				$sql = "SELECT * FROM student_fees LEFT JOIN student ON S_ID = SF_S_ID WHERE  SF_TIMESTAMP <= '".$timestamp ."' AND SF_S_ID in ( SELECT S_ID FROM `student` where S_GRADE like '".$i.$class."%' )  ";	
				$res = MySQL :: query($sql);
				$rows = $res->rows;
				
	
				if($rows)
				{
							
					$objPHPExcel->getActiveSheet()->mergeCells('A'.$r.':E'.$r);
					$objPHPExcel->getActiveSheet()->getStyle('A'.$r)->applyFromArray($styleArray1);
					$objPHPExcel->getActiveSheet()->getRowDimension($r)->setRowHeight(30);
					$objPHPExcel->setActiveSheetIndex(0) ->setCellValue('A'.$r, 'Grade -'.$i.$class);
							
					$objPHPExcel->getActiveSheet()->getStyle('A'.$j)->applyFromArray($styleArray2);
					$objPHPExcel->setActiveSheetIndex(0) ->setCellValue('A'.$j, 'Student ID');
					
					$objPHPExcel->getActiveSheet()->getStyle('B'.$j)->applyFromArray($styleArray2);
					$objPHPExcel->setActiveSheetIndex(0) ->setCellValue('B'.$j, 'Student Name');
					
					$objPHPExcel->getActiveSheet()->getStyle('C'.$j)->applyFromArray($styleArray2);
					$objPHPExcel->setActiveSheetIndex(0) ->setCellValue('C'.$j, 'Class');
					
					$objPHPExcel->getActiveSheet()->getStyle('D'.$j)->applyFromArray($styleArray2);
					$objPHPExcel->setActiveSheetIndex(0) ->setCellValue('D'.$j, 'Last Payament');
					
					$objPHPExcel->getActiveSheet()->getStyle('E'.$j)->applyFromArray($styleArray2);
					$objPHPExcel->setActiveSheetIndex(0) ->setCellValue('E'.$j, 'Due in Months');		
					
	  
	  
					
					$currYear = date("Y");
	  
					foreach($rows as $row) { 
						$date1 = mktime(0,0,0,date("m"),0,$currYear);
						$date2 = mktime(0,0,0,$row['SF_MONTH'],0,$row['SF_YEAR']);
						$defMonths = round(($date1-$date2) / 60 / 60 / 24 / 30);
					
						$objPHPExcel->getActiveSheet()->getStyle('A'.$k)->applyFromArray($styleArray3);
						$objPHPExcel->setActiveSheetIndex(0) ->setCellValue('A'.$k, $row['S_AD_ID']);
						
						$objPHPExcel->getActiveSheet()->getStyle('B'.$k)->applyFromArray($styleArray3);
						$objPHPExcel->setActiveSheetIndex(0) ->setCellValue('B'.$k, $row['S_NAME']);
						
						$objPHPExcel->getActiveSheet()->getStyle('C'.$k)->applyFromArray($styleArray3);
						$objPHPExcel->setActiveSheetIndex(0) ->setCellValue('C'.$k, $row['S_GRADE'].$class);
						
						$objPHPExcel->getActiveSheet()->getStyle('D'.$k)->applyFromArray($styleArray3);
						$objPHPExcel->setActiveSheetIndex(0) ->setCellValue('D'.$k, $row['SF_YEAR']."-".$row['SF_MONTH']);
						
						$objPHPExcel->getActiveSheet()->getStyle('E'.$k)->applyFromArray($styleArray3);
						$objPHPExcel->setActiveSheetIndex(0) ->setCellValue('E'.$k, $defMonths);	
										
						$k++;
			
					}
					
	
					$r = $k+3;
					$j = $k+5;
					$k = $k+6;
				}
			}
			
		}
	}







	

	

	
	// Set active sheet index to the first sheet, so Excel opens this as the first sheet
	$objPHPExcel->setActiveSheetIndex(0);
		
	$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
	$objWriter->save(str_replace('.php', '.xls', "School_Fees.xls"));		
		
	}
	
	
}
?>