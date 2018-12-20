<!DOCTYPE html>
<html>
<head>
	<title>Result</title>
	<style type="text/css">
	.class1{

		margin-left: 150px;
		margin-top: 70px;
		margin-bottom: 30px;
	}
	#table1{
		height: 200;
	width: 100%;
	border-radius: 4px;

}
#h{
	background-color: #ff8533;
	color: black;
	font-size: 18px;
	text-align: center;
	border-radius: 4px;
	font-weight: bolder;
	height: 50px;

}
#h1{
	background-color: #ffcc66;
	border: 2px solid black;
	font-size: 18px;
	color: black;
	text-align: center;
	border-radius: 4px;
	font-weight: bolder;
}
#h1:hover{
	background-color: whitesmoke;
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
		<?php
  	session_start();
  	  $conn = mysqli_connect("localhost", "root", "", "university");

		if($conn->connect_errno > 0){
		    die("Unable to connect: ". $conn->connect_error);
		}
		$id = $_SESSION["userid"];
		?>
	<?php
	  $query1="SELECT ROUND(SUM(course.credits*grade_value.grade_val)/SUM(course.credits),2) AS GPA FROM student NATURAL JOIN course NATURAL JOIN result NATURAL JOIN grade_value WHERE student.ID='$id'";
	  $result1=$conn->query($query1);
	  $row1=mysqli_fetch_array($result1);
	?>
	<div class="class1">
		<label style="font-weight: bold  ">GPA:    <?=$row1['GPA']?></label><br><br>
  <label style="font-weight: bold;">CGPA:    <?=$row1['GPA']?></label>	<br>
	</div>	
  	
  <table id="table1" border="3px solid black">
  	<tr>
  		<th id="h">SI</th>
  		<th id="h">Course_ID</th>
  		<th id="h">Course_Title</th>
  		<th id="h">Grade</th>
  		<th id="h">Grade Value</th>
  	</tr>
  	
		<?php
		$query="SELECT result.course_id as code,course.title as title,result.grade as grade,grade_value.grade_val as value FROM student NATURAL JOIN course NATURAL JOIN result NATURAL JOIN grade_value WHERE student.ID='$id'";
		$result=$conn->query($query);
		$i=1;
	    while ($row = mysqli_fetch_array($result)) { 
			 ?> 
			 <tr>
			 	<td id="h1"><?=$i?></td>
			 	<td id="h1"><?=$row['code']?></td>
			 	<td id="h1"><?=$row['title']?></td>
			 	<td id="h1"><?=$row['grade']?></td>
			 	<td id="h1"><?=$row['value']?></td>
			 	
			 </tr>

			
    		
    <?php

    $i++;
     }
        
   	?>
  </table>
		

	</div>
</body>
</html>