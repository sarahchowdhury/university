<!DOCTYPE html>
<html>
<head>
	<title>Account</title>
	<style type="text/css">
		.container3{
	width: 500px;
	height: 300px;
	text-align: center;
	background-color: rgba(255, 102, 0,0.8);
	border-radius: 4px;
	margin: 0 auto;
	margin-top: 80px;
	

}
#t{

	font-size: 20px;
	font-weight: bolder;
	margin-left: -130px;
	

}
#tag{
	border-radius: 5px;
	border:2px solid black;
	background-color: whitesmoke;
	width:150px;
	height: 20px;
	text-align: center;
	margin-left: 250px;
	margin-top: -20px;
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
            <li><a href="s_show_course.php">Resource</a></li>
			<li><a href="s_account.php">Account</a></li>
			<li><a href="s_result.php">Result</a></li>
			<li><a href="s_script_check.php">Script Recheck</a></li>
			<li><a href="s_help.php">Help</a></li>
		</ul>
	</div>



	<div class="body">
		<div class="container3">
<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "university");
if($conn->connect_errno > 0){
    die("Unable to connect: ". $conn->connect_error);
}
$id=$_SESSION["userid"];
$query1= "SELECT department.tot_cred*4500 as total,student.comp_cred*4500 as paid,sum(course.credits)*4500 as due FROM student NATURAL join department NATURAL join course where student.ID='$id' and course.course_id in (SELECT registration.course_id from registration NATURAL JOIN student where student.ID='$id')";
$result = $conn->query($query1);



 
echo "<div class=wrapper1>" ;
while ($row = mysqli_fetch_array($result)) {
 
 echo " <label id=t> Total Amount: </label>";
 echo "<p id=tag>" . $row['total'] . "</p>";
 echo "</br>";
 echo " <label id=t> Total Paid: </label>";
 echo "<p id=tag>" . $row['paid'] . "</p>";
 echo "</br>";
 echo " <label id=t> Total Due: </label>";
 echo "<p id=tag>" . $row['due'] . "</p>";
 echo "</br>";


 
 
} 
echo "</div>";


$conn->close();
?>
</div>
		

	</div>
</body>
</html>