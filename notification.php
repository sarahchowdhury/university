<?php
// Start the session
session_start();

echo "<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>";

$conn = mysqli_connect("localhost", "root", "", "university");

if($conn->connect_errno > 0){
    die("Unable to connect: ". $conn->connect_error);
}


  
$today =  date("Y-m-d");

//echo $int;

$query11= "SELECT * FROM `calender`";
$result1 = $conn->query($query11);





?>



<!DOCTYPE html>
<html>
<title>W3.CSS</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet"type ="text/css" href="style1.css"></link>
<body>


<table width="400" bgcolor="#F4F4F4" border="2" bordercolor="#FF8C00">
	<tr>
			<td>Date</td>
			<td>Day</td>
			<td>Details</td>
	</tr>

	<?php
		while ($rowa = mysqli_fetch_array($result1)) {

	?>
	<tr  <?php

			$newstring = substr($today, -2);
			$int = 2+(int)$newstring;
			$d = (string) $int;
			$incdate = substr($today, 0, -2) .$d;

			 if($incdate==@$rowa[Date])
			{?>

			 bgcolor="#32CD32" 

			 <?php
			  }
			 
			$newstring = substr($today, -2);
			$int = 1+(int)$newstring;
			$d = (string) $int;
			$incdate = substr($today, 0, -2) .$d;

			 if($incdate==@$rowa[Date])
			{?>

			 bgcolor="#FFA500" 

			 <?php
			  }
			 
			  //equal
			$newstring = substr($today, -2);
			$int = (int)$newstring;
			$d = (string) $int;
			$incdate = substr($today, 0, -2) .$d;

			 if($incdate==@$rowa[Date])
			{?>

			 bgcolor="#FF0000" 

			 <?php
			  }
			 ?>
			   >
			   
			<td><?php echo @$rowa[Date];?></td>
			<td><?php echo @$rowa[Day];?></td>
			<td><?php echo @$rowa[Details];?></td>
	</tr>
<?php 
	}
?>

</table>
</body>
</html>



