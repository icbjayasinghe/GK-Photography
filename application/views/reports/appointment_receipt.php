<?php


// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);



// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.'', PDF_HEADER_STRING, array(46,46,31), array(46,46,31));
$pdf->setFooterData(array(46,46,31), array(46,46,31));

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

// Set font
$pdf->SetFont('dejavusans', '', 12, '', true);

// Add a page
$pdf->AddPage();


$html = <<<EOD
<br>
<h1 align="center" style="font-family: sans-serif; text-decoration: underline">Appointment Receipt</h1>

<table cellpadding="5" style="margin-top: 50px;font-family:sans-serif; height: 157px; width: 474px;">
<tbody>
<tr>
<td style="width: 80px"></td>
<td style="width: 246.5px; text-align: right;"><strong>Customer Name: </strong></td>
<td style="width: 246.5px;">Isuru Jayasinghe</td>
</tr>
<tr>
<td style="width: 80px"></td>
<td style="width: 246.5px; text-align: right;"><strong>Appointment ID: </strong></td>
<td style="width: 246.5px;">APP000005</td>
</tr>
<tr>
<td style="width: 80px"></td>
<td style="width: 246.5px; text-align: right;"><strong>Appointment Date: </strong></td>
<td style="width: 246.5px;">2017-12-05</td>
</tr>
<tr>
<td style="width: 80px"></td>
<td style="width: 246.5px; text-align: right;"><strong>Appointment Time: </strong></td>
<td style="width: 246.5px;">0800h to 1300h</td>
</tr>
<tr>
<td style="width: 80px"></td>
<td style="width: 246.5px; text-align: right;"><strong>Description: </strong></td>
<td style="width: 246.5px;">Wedding</td>
</tr>
</tbody>
</table>
<br>
<p style="font-family:sans-serif; text-align: center;"><em><strong>Thank you for your appointment!</strong>
<br>We are looking forward to offer our exceptional services to you for your requirement.</em></p>
<p style="font-family:sans-serif; text-align: center;">&nbsp;</p>
EOD;

// Print text using writeHTMLCell()
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

// ---------------------------------------------------------

// Close and output PDF document
$pdf->Output('example_001.pdf', 'I');

