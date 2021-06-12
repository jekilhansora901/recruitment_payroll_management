<?php

require_once('eng.php');
require_once('tcpdf.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Jekil Hansora');
$pdf->SetTitle('Ashapura Volclay Ltd.');
$pdf->SetSubject('Employee List');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->setHeaderData('','',"Ashapura Volclay Pvt. Ltd.","Employee List");
//$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' payslip', PDF_HEADER_STRING);

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
$pdf->SetFont('helvetica', 'B', 12);

// add a page
$pdf->AddPage();

$pdf->Write(0, 'Employee List', '', 0, 'L', true, 0, false, false, 0);

$pdf->SetFont('helvetica', '', 9);

// -----------------------------------------------------------------------------
/*for($i=0;$i<2;$i++)
{
$str="Jekil";
	$pdf->Cell(0,0,$str,1,$i,'C',0,'',0,FALSE,'T','M',0,0,'C',0,'');*/
	require("connect.php");
	if(isset($_GET['deptcode']))
	{
	$dept=$_REQUEST['deptcode'];
	$sql="select * from emp_personal_detail,department_detail,desg_detail,basic_sal_master where emp_personal_detail.delete_flag=0 AND emp_personal_detail.dept_code=department_detail.dept_code AND emp_personal_detail.desg_code=desg_detail.desg_code and emp_personal_detail.emp_code=basic_sal_master.emp_code and department_detail.dept_code='$dept'";	
	$filename="department.pdf";
	}
	else if(isset($_GET['desgcode']))
	{
	$desg=$_REQUEST['desgcode'];
	$sql="select * from emp_personal_detail,department_detail,desg_detail,basic_sal_master where emp_personal_detail.delete_flag=0 AND emp_personal_detail.dept_code=department_detail.dept_code AND emp_personal_detail.desg_code=desg_detail.desg_code and emp_personal_detail.emp_code=basic_sal_master.emp_code and desg_detail.desg_code='$desg'";	
	$filename="designation.pdf";
	}
	else
	{
	$sql="select * from emp_personal_detail,department_detail,desg_detail,basic_sal_master where emp_personal_detail.delete_flag=0 AND emp_personal_detail.dept_code=department_detail.dept_code AND emp_personal_detail.desg_code=desg_detail.desg_code and emp_personal_detail.emp_code=basic_sal_master.emp_code";
	$filename="allemp.pdf";
	}
	$query=mysql_query($sql,$link);
	$no_row=mysql_num_rows($query);
if($no_row>0)
{
	$i=0;
	$y=50;
	$pdf->SetXY(2,40);
	$pdf->MultiCell(8, 10, "Sr No", 1, 'C',0,0);
	$pdf->MultiCell(12, 10, "Emp Code", 1, 'C',0, 0);
	$pdf->MultiCell(40, 10, "Name", 1, 'C',0,0,'','','','','','','',"Middle");
	$pdf->MultiCell(25, 10, "Department", 1, 'C',0, 0,'','','','','','','',"Middle");
	$pdf->MultiCell(30, 10, "Designation", 1, 'C',0, 0,'','','','','','','',"Middle");
	$pdf->MultiCell(22, 10, "Mobile", 1, 'C',0, 0,'','','','','','','',"Middle");
	$pdf->MultiCell(50, 10, "Email", 1, 'L',0, 0,'','','','','','','',"Middle");
	$pdf->MultiCell(20, 10, "Basic Salary", 1, 'C',0, 0);
	while($row=mysql_fetch_array($query))
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
$pdf->Output($filename, 'I');
//============================================================+
// END OF FILE                                                
//============================================================+