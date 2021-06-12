<?php

require_once('eng.php');
require_once('tcpdf.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Jekil Hansora');
$pdf->SetTitle('Ashapura Volclay Ltd.');
$pdf->SetSubject('Pay Slip');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
//$m=date('M-Y');
$pdf->setHeaderData('','',"Ashapura Volclay Pvt. Ltd.");
//$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' payslip', PDF_HEADER_STRING);
	//$month=$row['month'];
	//$pdf->setHeaderData('','',"Ashapura Volclay Pvt. Ltd.","Pay Slip for : $month");
// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

//set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

//set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

//set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

//set some language-dependent strings
$pdf->setLanguageArray($l);

// ---------------------------------------------------------

// set font
$pdf->SetFont('times', 'B', 12);

// add a page

$pdf->SetFont('times', '', 12);

// -----------------------------------------------------------------------------
/*for($i=0;$i<2;$i++)
{
$str="Jekil";
	$pdf->Cell(0,0,$str,1,$i,'C',0,'',0,FALSE,'T','M',0,0,'C',0,'');*/
	require("connect.php");
	if(isset($_GET['deptcode']))
	{
	$deptcode=$_REQUEST['deptcode'];
	$sql="select * from salary,emp_personal_detail,department_detail,desg_detail where emp_personal_detail.dept_code=department_detail.dept_code AND emp_personal_detail.desg_code=desg_detail.desg_code and emp_personal_detail.emp_code=salary.emp_code and emp_personal_detail.dept_code='$deptcode' ORDER BY  salary.emp_code ASC ;";
	}
	else if(isset($_GET['desgcode']))
	{
	$desgcode=$_REQUEST['desgcode'];
	$sql="select * from salary,emp_personal_detail,department_detail,desg_detail where emp_personal_detail.dept_code=department_detail.dept_code AND emp_personal_detail.desg_code=desg_detail.desg_code and emp_personal_detail.emp_code=salary.emp_code and emp_personal_detail.desg_code='$desgcode' ORDER BY  salary.emp_code ASC ;";
	}
	else if(isset($_GET['month']))
	{
	$month=$_REQUEST['month'];
	$sql="select * from salary,emp_personal_detail,department_detail,desg_detail where emp_personal_detail.dept_code=department_detail.dept_code AND emp_personal_detail.desg_code=desg_detail.desg_code and emp_personal_detail.emp_code=salary.emp_code and salary.month='$month' ORDER BY  salary.emp_code ASC ;";
	}
	else
	{
	$sql="select * from salary,emp_personal_detail,department_detail,desg_detail where emp_personal_detail.dept_code=department_detail.dept_code AND emp_personal_detail.desg_code=desg_detail.desg_code and emp_personal_detail.emp_code=salary.emp_code ORDER BY  salary.emp_code ASC ;";
	}
	$query=mysql_query($sql,$link);
	$no_row=mysql_num_rows($query);
	
	if($no_row>0)
	{
	while($row=mysql_fetch_array($query))
	{
	
	$pdf->SetFont('times', '', 12);
	$pdf->AddPage();
	$pdf->SetXY(146, 5);
	$month=date("M", strtotime($row['month']));
	$year=date("Y", strtotime($row['salary_date']));
	$pdf->MultiCell(30, 4, "Pay Slip for : ", 0, 'R',0,0);
	$pdf->SetFont('times', 'B', 13);
	$pdf->SetXY(174, 5);
	$pdf->MultiCell(22, 4, "$month-$year", 0, 'R',0,0);
	$pdf->SetFont('times', '', 12);
	$pdf->SetXY(14, 17);
	$pdf->MultiCell(20, 4, "Code    :", 0, 'L',0,0);
	$pdf->SetXY(35, 17);
	$empcode= $row['emp_code'];
	$pdf->MultiCell(15, 4,$empcode, 0, 'L',0,0);
	$pdf->SetXY(65, 17);
	$pdf->MultiCell(30, 4, "Name           :", 0, 'L',0,0);
	$name=$row['first_name']." ".$row['middle_name']." ".$row['last_name'];
	$pdf->SetXY(90, 17);
	$pdf->MultiCell(70, 4, $name, 0, 'L',0,0);
	$pdf->SetXY(140, 17);
	$deptname=$row['dept_name'];
	$desgname=$row['desg_name'];
	$pos="[ $desgname - $deptname ]";
	$pdf->MultiCell(56, 4, $pos, 0, 'R',0,0);
	
	$pdf->SetXY(14, 22);
	$pdf->MultiCell(20, 4, "Mobile :", 0, 'L',0,0);
	$pdf->SetXY(35, 22);
	$empcode= $row['emp_code'];
	$pdf->MultiCell(25, 4,$row['mobile'], 0, 'L',0,0);
	$pdf->SetXY(65, 22);
	$pdf->MultiCell(30, 4, "Department  :", 0, 'L',0,0);
	$pdf->SetXY(90, 22);
	$pdf->MultiCell(30, 4, $deptname, 0, 'L',0,0);
	$pdf->SetXY(120, 22);
	$pdf->MultiCell(25, 4, "Pr. Days   : ", 0, 'L',0,0);
	$day=date("t", strtotime($month));
	$pdf->SetXY(145, 22);
	$pdf->MultiCell(10, 4, $day, 0, 'L',0,0);
	$pdf->SetXY(170, 22);
	$pdf->MultiCell(13, 4, "Abs. :", 0, 'L',0,0);
		$month=date('m');
		$select="select * from leave_master where emp_code='$empcode' and DATE_FORMAT(date_leave,'%m')='$month' And type_leave='half_day'";
			$res=mysql_query($select);
			$num=mysql_num_rows($res);
			$r=mysql_fetch_array($res);
			if($num==0)
			{
				$abs=0;
			}
			else
			{
				$abs=$num/2;
			}
	$pdf->SetXY(183, 22);
	$pdf->MultiCell(15, 4, $abs, 0, 'L',0,0);
	
	
	$pdf->SetXY(14, 27);
	$pdf->MultiCell(182.5, 4, "---------------------------------------------------------------------------------------------------------------------------------", 0, 'L',0,0);
	
	$pdf->SetFont('times', 'B', 13);
	$pdf->SetXY(14, 32);
	$pdf->MultiCell(40, 4, "Earnings", 0, 'L',0,0);
	$pdf->SetXY(98, 32);
	$pdf->MultiCell(40, 4, "|     Deductions", 0, 'L',0,0);
	$pdf->SetXY(14, 37);
	$pdf->MultiCell(182.5, 4, "----------------------------------------------------------------------------------------------------------------------", 0, 'L',0,0);
	
	$pdf->SetFont('times', '', 12);
	
	$pdf->SetXY(14, 42);
	$pdf->MultiCell(30, 4, "Basic", 0, 'L',0,0);
	$pdf->SetXY(65, 42);
	$pdf->MultiCell(30, 4, $row['basic'], 0, 'R',0,0);
	$pdf->SetXY(98, 42);
	$pdf->MultiCell(40, 4, "|     Prov. Fund", 0, 'L',0,0);
	$pdf->SetXY(166, 42);
	$pdf->MultiCell(30, 4, $row['pf'], 0, 'R',0,0);
	
	$pdf->SetXY(14, 47);
	$pdf->MultiCell(30, 4, "HRA", 0, 'L',0,0);
	$pdf->SetXY(65, 47);
	$pdf->MultiCell(30, 4, $row['hra'], 0, 'R',0,0);
	$pdf->SetXY(98, 47);
	$pdf->MultiCell(40, 4, "|     Abs. Ded.", 0, 'L',0,0);
	$pdf->SetXY(166, 47);
	$pdf->MultiCell(30, 4, $abs, 0, 'R',0,0);
	
	$pdf->SetXY(14, 52);
	$pdf->MultiCell(30, 4, "DA", 0, 'L',0,0);
	$pdf->SetXY(65, 52);
	$pdf->MultiCell(30, 4, $row['da'], 0, 'R',0,0);
	$pdf->SetXY(98, 52);
	$pdf->MultiCell(40, 4, "|     ", 0, 'L',0,0);
	
	$pdf->SetXY(14, 57);
	$pdf->MultiCell(30, 4, "Medical", 0, 'L',0,0);
	$pdf->SetXY(65, 57);
	$pdf->MultiCell(30, 4, $row['medical'], 0, 'R',0,0);
	$pdf->SetXY(98, 57);
	$pdf->MultiCell(40, 4, "|     ", 0, 'L',0,0);
	
	$pdf->SetXY(14, 62);
	$pdf->MultiCell(30, 4, "Conv.", 0, 'L',0,0);
	$pdf->SetXY(65, 62);
	$pdf->MultiCell(30, 4, $row['conveyance'], 0, 'R',0,0);
	$pdf->SetXY(98, 62);
	$pdf->MultiCell(40, 4, "|     ", 0, 'L',0,0);
	
	$pdf->SetXY(98, 67);
	$pdf->MultiCell(40, 4, "|     ", 0, 'L',0,0);
	
	$pdf->SetXY(98, 72);
	$pdf->MultiCell(40, 4, "|     ", 0, 'L',0,0);
	
	$pdf->SetXY(98, 77);
	$pdf->MultiCell(40, 4, "|     ", 0, 'L',0,0);
	
	$pdf->SetXY(98, 82);
	$pdf->MultiCell(40, 4, "|     ", 0, 'L',0,0);
	
	$pdf->SetXY(14, 87);
	$pdf->MultiCell(182.5, 4, "--------------------------------------------------------------------------------------------------------------------------------", 0, 'L',0,0);
	
	$pdf->SetFont('times', 'B', 13);
	$pdf->SetXY(14, 92);
	$pdf->MultiCell(40, 4, "Total Earnings", 0, 'L',0,0);
	$pdf->SetXY(65, 92);
	$pdf->MultiCell(30, 4, $row['gross'], 0, 'R',0,0);
	$pdf->SetFont('times', '', 12);
	
	$pdf->SetXY(98, 92);
	$pdf->MultiCell(40, 4, "|     ", 0, 'L',0,0);
	
	$pdf->SetXY(98, 97);
	$pdf->MultiCell(40, 4, "|     ", 0, 'L',0,0);
	
	$pdf->SetFont('times', 'B', 13);
	$pdf->SetXY(98, 92);
	$pdf->MultiCell(50, 4, "|     Total Deduction", 0, 'L',0,0);
	$pdf->SetXY(166, 92);
	$ded=$row['pf']+$row['abs_ded'];
	$pdf->MultiCell(30, 4, $ded.".00", 0, 'R',0,0);
	
	$pdf->SetXY(98, 97);
	$pdf->MultiCell(50, 4, "|     Net Pay", 0, 'L',0,0);
	$pdf->SetXY(166, 97);
	$net=$row['net_salary'];
	$pdf->MultiCell(30, 4, $net, 0, 'R',0,0);
	
	$pdf->SetXY(14, 102);
	$pdf->MultiCell(182.5, 4, "----------------------------------------------------------------------------------------------------------------------", 0, 'L',0,0);
	
	/*while($row=mysql_fetch_array($query))
	{
		$i++;
		
		
		$pdf->SetXY(2, $y);
		$pdf->MultiCell(8, 5, $i, 1, 'C',0,0);
		$pdf->MultiCell(12, 5, $row['emp_code'], 1, 'C',0,0);	
		$pdf->MultiCell(40, 5, $row['first_name']." ".$row['last_name'], 1, 'C',0,0);	
		$pdf->MultiCell(25, 5, $row['dept_name'], 1, 'C',0,0);	
		$pdf->MultiCell(30, 5, $row['desg_name'], 1, 'C',0,0);	
		$pdf->MultiCell(22, 5, $row['mobile'], 1, 'C',0,0);	
		$pdf->MultiCell(50, 5, $row['email'], 1, 'C',0,0);	
		$pdf->MultiCell(20, 5, $row['basic'], 1, 'C',0,0);	
		$y=$y+5;
	}
}
*/
}
}

	/*$y=54;
	while($row=mysql_fetch_array($r))
	{
	//for($i=0,$y=54;$i<2;$i++,$y=$y+4)
	//{
		$pdf->SetXY(15, $y);
		$pdf->MultiCell(20, 4, $row['sr_no'], 1, 'C',0,0);
		$pdf->MultiCell(30, 4, $row['event_photo'], 1, 'C',0,0);	
		/*$pdf->MultiCell(30, 4, $row['last_name'], 1, 'C',0,0);	
		$pdf->MultiCell(50, 4, $row['email'], 1, 'C',0,0);	
		$pdf->MultiCell(20, 4, $row['mobile'], 1, 'C',0,0);	
		 $y=$y+4;
	}*/
	
/*$tbl = <<<EOD

<?php
echo "<table>";
echo "<tr>";
echo "<td>Jekil";
echo "</td>";
echo "</tr>";
echo "</table>";
?>
EOD;

$pdf->writeHTML($tbl, true, false, false, false, '');
*/
// -----------------------------------------------------------------------------


// -----------------------------------------------------------------------------

//Close and output PDF document
$pdf->Output("dept_pay_slip", 'I');
//============================================================+
// END OF FILE                                                
//============================================================+