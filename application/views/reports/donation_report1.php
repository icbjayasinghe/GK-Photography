<?php
	 require('../../libraries/fpdf/fpdf.php');

	

	$con = mysqli_connect('localhost','root','');
	mysqli_select_db($con,'pdms');

    $query =mysqli_query($con, "select * from donation");
	$donation = mysqli_fetch_array($query);

	$pdf = new FPDF ('P','mm','A4');
	$pdf->AddPage();

		$pdf->SetFont('Arial','B',24);
   		$pdf->Cell(189 ,10,'National Cancer Hospital Blood Bank',0,1,'C');

		$pdf->SetFont('Arial','B',10);
		$pdf->Cell(189 ,5,'Maharagama, Srilanka. | Tel: 011-2369931 | Fax: 011-2842 051 ',0,1,'C');
		

		$pdf->Cell(189 ,15,'------------------------------------------------------------------------------------------------------------------------',0,1,'C');



		$pdf->SetFont('Arial','B',24);
		$pdf->Cell(189 ,15,'Platelet Donation Report',0,1,'C');


		$pdf->SetFont('Arial','',10);

		$pdf->Cell(48 ,8,'Donor ID',0,0);
		$pdf->Cell(5 ,8,':',0,0);
		$pdf->Cell(80 ,8,$donation['donorId'],0,1);

		$pdf->Cell(48 ,8,'Donation ID',0,0);
		$pdf->Cell(5 ,8,':',0,0);
		$pdf->Cell(80 ,8,$donation['donationId'],0,1);

		$pdf->Cell(48 ,8,'Donation Date',0,0);
		$pdf->Cell(5 ,8,':',0,0);
		$pdf->Cell(80 ,8,$donation['donationDate'],0,1);

		$pdf->Cell(48 ,8,'Donation Start Time',0,0);
		$pdf->Cell(5 ,8,':',0,0);
		$pdf->Cell(80 ,8,$donation['donationStartTime'],0,1);

		$pdf->Cell(48 ,8,'Donation End Time',0,0);
		$pdf->Cell(5 ,8,':',0,0);
		$pdf->Cell(80 ,8,$donation['donationEndTime'],0,1);

		$pdf->Cell(48 ,8,'Donation WBC count',0,0);
		$pdf->Cell(5 ,8,':',0,0);
		$pdf->Cell(80 ,8,$donation['donationWBCCount'],0,1);

		$pdf->Cell(48 ,8,'Donation Hemoglobin count',0,0);
		$pdf->Cell(5 ,8,':',0,0);
		$pdf->Cell(80 ,8,$donation['donationHemoCount'],0,1);

		$pdf->Cell(48 ,8,'Donation Platelet count',0,0);
		$pdf->Cell(5 ,8,':',0,0);
		$pdf->Cell(80 ,8,$donation['donationPlateletCount'],0,1);

		$pdf->Cell(48 ,8,'No of unit collected',0,0);
		$pdf->Cell(5 ,8,':',0,0);
		$pdf->Cell(80 ,8,$donation['DonationNoOfUnitCollected'],0,1);

		$pdf->Cell(48 ,8,'Machine Kit Serial No',0,0);
		$pdf->Cell(5 ,8,':',0,0);
		$pdf->Cell(80 ,8,$donation['MachineKitSerialNo'],0,1);

		$pdf->Cell(48 ,8,'Machine Kit DOE',0,0);
		$pdf->Cell(5 ,8,':',0,0);
		$pdf->Cell(80 ,8,$donation['MachineKitDOE'],0,1);

		$pdf->Cell(48 ,8,'Height of donor',0,0);
		$pdf->Cell(5 ,8,':',0,0);
		$pdf->Cell(80 ,8,$donation['donorHeight'],0,1);

		$pdf->Cell(48 ,8,'Weight of donor',0,0);
		$pdf->Cell(5 ,8,':',0,0);
		$pdf->Cell(80 ,8,$donation['donorWeight'],0,1);

		$pdf->Cell(48 ,8,'Machine No',0,0);
		$pdf->Cell(5 ,8,':',0,0);
		$pdf->Cell(80 ,8,$donation['machineNo'],0,1);

		$pdf->Cell(48 ,8,'Donation PCV',0,0);
		$pdf->Cell(5 ,8,':',0,0);
		$pdf->Cell(80 ,8,$donation['donationPCV'],0,1);

		$pdf->Cell(189 ,80,'',0,1);
		
		$pdf->Cell(150 ,3,'',0,0);
		$pdf->Cell(19 ,3,'---------------------------------',0,1,'C');
		$pdf->Cell(150 ,5,'',0,0);
		$pdf->Cell(19 ,5,'Doctor in charge',0,1,'C');

	$pdf->Output();
?>