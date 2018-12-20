<?php

// Start the session
session_start();

echo "<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>";

$conn = mysqli_connect("localhost", "root", "", "university");

if($conn->connect_errno > 0){
    die("Unable to connect: ". $conn->connect_error);
}


  
$today =  date("Y-m-d");
echo $today;
//echo $int;

$query11= "SELECT * FROM `calender`";
$result1 = $conn->query($query11);





?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet"type ="text/css" href="style1.css"></link>
</head>
<body>
	<div class="container1">
	 <div class="wrapper">
	     <div id="top-left">
          <img src="uiu.png">
          </div>
          <div id="top-right">
              <ul>
              	<li><a href="login.html">Logout</a></li>
              </ul>
          </div>
      </div>    		
	</div>
	<div  class="container2">
		<ul>    
			<li><a href="a_home.php">Home</a></li>
			  <li>
                <a href="a_registration.php" >Registration</a>
            </li>
            <li><a href="a_show_course.php">Resource</a></li>
			<li><a href="a_section.html">Section</a></li>
			<li><a href="a_result.php">Result</a></li>
			<li><a href="a_script_check.php">Script Recheck</a></li>
			<li><a href="calender.html">Calender Input</a></li>
			<li><a href="a_help.php">Help</a></li>
		</ul>
	</div>


	<div class="body">
		<!-- write here your code -->
		<table width="500" bgcolor="#f7deb2" border="2" bordercolor="#FF8C00">
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

			 bgcolor="#8CF370" 

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

	</div>
</body>

</html>