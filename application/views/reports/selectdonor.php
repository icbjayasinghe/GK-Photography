<?php

$con = mysqli_connect('localhost','root','');
mysqli_select_db($con,'pdms');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Select Donation</title>
</head>
<body>
<p>Select Donation ID</p>
	<form method="get" action="<?php echo  base_url()?>/Pdf_Controller/pdf_donation"></form>
		<select name="donorId">
			<?php 
				$query = mysqli_query($con, 'select * from donation');
				while ($donation = mysqli_fetch_array($query)) {
					echo "<option value='".$donation['donorId'] ."'>" . $donation['donorId'] ."</option>";
					
				}

			?>
		</select>
<button  href="<?php echo  base_url()?>/Pdf_Controller/pdf_donation" name="submit" >submit</button>


	
</body>
</html>