

<!DOCTYPE html>
<html>
<head>
<title>materials</title>
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
			<li><a href="s_home.php">Home</a></li>
			<li class="dropdown">
                <a href="javascript:void(0)" class="dropbtn">Registration</a>
                <div class="dropdown-content">
                  <a href="preadvising.php">Pre-Advising</a>
                  <a href="selectsection.php">Section Selection</a>
                </div>
            </li>
            <li><a href="s_account_show_course.php">Resource</a></li>
			<li><a href="s_account.php">Account</a></li>
			<li><a href="s_result.php">Result</a></li>
			<li><a href="s_script_check.php">Script Recheck</a></li>
			<li><a href="s_help.php">Help</a></li>
		</ul>
	</div>



	<div class="body">
	
	<div class="container3">
	<h3>Course Materials</h3>
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
   //$id=$row['course_id'];
   ?>
   <p> <?php echo $row['description'] ?></p>
 <a href="uploads/<?php echo $row['file'] ?>" target="_blank">view</a>
 
 </br>
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

