<?php

//require_once('tcpdf/tcpdf_include.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);



// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.'', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
$pdf->setFooterData(array(0,64,0), array(0,64,128));

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);



// set default font subsetting mode
$pdf->setFontSubsetting(true);


$pdf->SetFont('dejavusans', '', 14, '', true);

// Add a page
$pdf->AddPage();






//$pdf->Write(0, 'Platelet Donation Summary Report', '', 0, 'L', true, 0, false, false, 0);

//$pdf->Ln(5);

$pdf->SetFont('times', '', 16);


$html = <<<EOD
<h2 align="center">Platelet Donation Summary Report</h2>
EOD;
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
$pdf->SetFont('times', '', 10);
$pdf->Ln(7);
$table= '<table border="1">';
$table .= '<tr align="center">
 				<th>Donation ID</th>
 				<th>Donor ID</th>
 				<th>Donation Date</th>
 				<th>Machine NO</th>
 				<th>Donation WBC Count</th>
				<th>Donation Hemo Count</th>
 				<th>Donation Platelet count</th>
 			</tr>';
 
 foreach ($donation as $record) {
 	$table .= '<tr align="center>
 	  			<td>'.$record->donationId.'</td>
 	  			<td>'.$record->donorId.'</td>
 	  			<td>'.$record->donationDate.'</td>
 	  			<td>'.$record->machineName.'</td>
 	  			<td>'.$record->donationWBCCount.'</td>
 	  			<td>'.$record->donationHemoCount.'</td>
 	  			<td>'.$record->donationPlatelateCount.'</td>

 	          </tr>';
 	
 }
 	$table .= '</table>';		
 		
 			
 
 $pdf->writeHTMLCell(0, 0, '', '', $table, 0, 1, 0, true, '', true);
// $pdf->Ln(8);


$pdf->Output('example_001.pdf', 'I');


