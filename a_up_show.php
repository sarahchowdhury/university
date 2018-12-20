

<!DOCTYPE html>
<html>
<head>
<style>
.container3{
	width: 500px;
	height: 300px;
	text-align: center;
	background-color: rgba(255, 102, 0,0.8);
	border-radius: 4px;
	margin: 0 auto;
	margin-top: 80px;
	

}
</style>
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
			<li><a href="a_help.php">Help</a></li>
		</ul>
	</div>

	<div class="body">
		<!-- write here your code -->
		<div class="container3">
		

	
<form action="a_up_show1.php" method="post" enctype="multipart/form-data">
    <select id="sel" name="select">
	<option value="" selected="selected">COURSE CODE</option>
	<option>BBA-103</option>
	<option>BBA-119</option>
	<option>CSE-007</option>
	<option>CSE-210</option>
	<option>CSI-121</option>
	<option>CSI-122</option>
	<option>CSI-217</option>
	<option>CSI-218</option>
	<option>CSI-411</option>
	<option>CSI-412</option>
	<option>EEE-210</option>
	<option>ENE-211</option>
	</select>
	</br>
    Upload File:
    <input type="file" name="file" id="file"></br></br>
	<textarea name="text" cols="40" rows="4" placeholder="Enter File Description" ></textarea></br></br>
	
    <input type="submit" value="Submit" name="submit">
</form>
<h3>Uploaded Course Materials</h3>
<?php




$conn = mysqli_connect("localhost", "root", "", "university");
$c=$_GET['c'];
if($conn->connect_errno > 0){
    die("Unable to connect: ". $conn->connect_error);
}

$query1= "SELECT * FROM upload where upload.course_id='$c'";
$result = $conn->query($query1);
?>

<?php

while ($row =mysqli_fetch_array($result) ){
  
  //echo "<img src='".$row['file']."'>";
 
   ?>
   <p> <?php echo $row['description'] ?></p>
 <a href="uploads/<?php echo $row['file'] ?>" target="_blank">view file</a>
  
  </br>
   </br>
  
<?php
}



?>

</br></br>
</div>
</div>
</body>
</html>

