<!DOCTYPE html>
<html>
<head>
	<title>courses</title>
	<style type="text/css">
    #table-from{
  height: 400;
  width: 100%;
  border-radius: 4px;

}
#h{
  background-color: #ff8533;
  color: black;
  font-size: 20px;
  text-align: center;
  border-radius: 4px;
  
  height: 40px;

}
#h1{
  background-color: #ffcc66;
  border: 2px solid black;
  font-size: 20px;
  color: black;
  text-align: center;
  border-radius: 4px;
  
}
#h1:hover{
  background-color: whitesmoke;
}

#table2{
  height: 200;
  width: 100%;
  border-radius: 4px;

}
#bt1{
  background-color: rgba(230, 46, 0,0.7);
  padding: 4px 10px;
  font-size: 16px;
  cursor: pointer;
  border-radius: 5px;
  font-weight: bolder;
  border: 2px solid black;
  margin-top: 5px;
  margin-bottom: 5px;
}
  </style>
	<link rel="stylesheet"type ="text/css" href="style1.css"></link>
<script type="text/javascript">
     function selectrowtoinput(){
         var table=document.getElementById("table-from");
         for(var i=0;i<table.rows.length;i++){
              table.rows[i].onclick=function(){
                  
                   var link="s_up_show.php?c="+this.cells[1].innerHTML;
                  console.log(link);
                  window.open(link); 
               
                };
            }
        }
   
</script>
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
$id=$_SESSION["userid"];
$query1= "SELECT registration.course_id as course_id,course.title as title FROM student NATURAL JOIN course NATURAL join registration where student.ID='$id'";
$result = $conn->query($query1);

 $i=1;
$res=array();


echo " <table border=5 id=table-from>

 <tr>
 <th id=h>SI</th>
 <th id=h>Course ID</th>
 <th id=h>Course Name</th>
 <th id=h>Click</th>
 </tr>";
 $i=1;
$res=array();
while ($row = mysqli_fetch_array($result)) { 
  
 echo "<tr>";
 echo "<td id=h1>" .$i. "</td>";
 echo "<td id=h1>" . $row['course_id'] . "</td>";
 echo "<td id=h1>" . $row['title'] . "</td>";
 
 echo "<td id=h1><from>
    <input id=bt1 type=button name=select value=select onclick='selectrowtoinput()'>
 </from></td>";
 echo "</tr>";
 $i++;

} 

$conn->close();
?>
</div>

</body>

</html>