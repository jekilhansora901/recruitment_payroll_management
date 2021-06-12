<?php
//============================================================+
// File name   : example_048.php
// Begin       : 2009-03-20
// Last Update : 2010-08-08
//
// Description : Example 048 for TCPDF class
//               HTML tables and table headers
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: HTML tables and table headers
 * @author Nicola Asuni
 * @since 2009-03-20
 */

require_once('eng.php');
require_once('tcpdf.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Jekil Hansora');
$pdf->SetTitle('Ashapura Volclay Ltd.');
$pdf->SetSubject('Employee Payslip');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->setHeaderData('','',"Ashapura Volclay Pvt. Ltd.","Payslip");
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
$pdf->SetFont('helvetica', 'B', 20);

// add a page
$pdf->AddPage();

$pdf->Write(0, 'Employee Payslip', '', 0, 'L', true, 0, false, false, 0);

$pdf->SetFont('helvetica', '', 9);

// -----------------------------------------------------------------------------
/*for($i=0;$i<2;$i++)
{
$str="Jekil";
	$pdf->Cell(0,0,$str,1,$i,'C',0,'',0,FALSE,'T','M',0,0,'C',0,'');*/
	$str1="Hansora";
	$pdf->SetXY(15, 50);
	$pdf->MultiCell(20, 4, "Sr No", 1, 'C',0,0);
	$pdf->MultiCell(30, 4, "Photo Name", 1, 'C',0, 0);
	/*$pdf->MultiCell(30, 4, "Last Name", 1, 'C',0,0);
	$pdf->MultiCell(50, 4, "E-Mail", 1, 'C',0, 0);
	$pdf->MultiCell(20, 4, "Mobile", 1, 'C',0, 0);
	*///$pdf->SetXY(15, 60);
	require("connect.php");
	$s="select * from event_image_master limit 0,20";
	$r=mysql_query($s,$link);
	$y=54;
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
		*/ $y=$y+4;
	}
	$pdf->AddPage();
	$str1="Hansora";
	$pdf->SetXY(15, 50);
	$pdf->MultiCell(20, 4, "Sr No", 1, 'C',0,0);
	$pdf->MultiCell(30, 4, "Photo Name", 1, 'C',0, 0);
	/*$pdf->MultiCell(30, 4, "Last Name", 1, 'C',0,0);
	$pdf->MultiCell(50, 4, "E-Mail", 1, 'C',0, 0);
	$pdf->MultiCell(20, 4, "Mobile", 1, 'C',0, 0);
	*///$pdf->SetXY(15, 60);
	require("connect.php");
	$s="select * from event_image_master limit 21,50";
	$r=mysql_query($s,$link);
	$y=54;
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
		*/ $y=$y+4;
	}
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
$pdf->Output('employee.pdf', 'I');
echo "Genereted.";
//============================================================+
// END OF FILE                                                
//============================================================+