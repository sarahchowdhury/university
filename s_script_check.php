<!DOCTYPE html>
<html>
<head>
  <title>Script Check</title>
  <!-- Css Library -->
      <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
      <link rel="stylesheet" type="text/css" href="bootstrap/css/all.min.css" />


  <!--link rel="stylesheet"type ="text/css" href="style1.css"></link-->
    <style type="text/css">
  #table1{
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
</head>
<body>
   <nav class="navbar navbar-default">
         <div class="container-fluid">
            <div class="navbar-header">
               <a class="navbar-brand" href="s_home.php">UIU e-Sites</a>
            </div>
            <ul class="nav navbar-nav navbar-right">
            <li class="active"><a href="s_home.php">Home</a></li>
            <li class="dropdown">
               <a class="dropdown-toggle" data-toggle="dropdown" href="#">Registration<span class="caret"></span></a>
               <ul class="dropdown-menu">
                  <li> <a href="preadvising.php">Pre-Advising</a></li>
                  <li><a href="selectsection.php">Section Selection</a></li>
                  </li>
               </ul>
            <li><a href="s_show_course.php">Resource</a></li>
            <li><a href="s_account.php">Account</a></li>
            <li><a href="s_result.php">Result</a></li>
            <li><a href="s_script_check.php">Script Recheck</a></li>
            <li><a href="s_help.php">Help</a></li>
            <li class="dropdown">
               <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user"></span><span class="caret"></span></a>
               <ul class="dropdown-menu">
                  <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> logout</a></li>
			   </ul>
			   </li>
         </div>
      </nav>
	  <div class="container text-center">
      <!-- write here your code -->
	  <?php
    session_start();
$conn = mysqli_connect("localhost", "root", "", "university");
if($conn->connect_errno > 0){
    die("Unable to connect: ". $conn->connect_error);
}
$id = $_SESSION["userid"];
$query1= "select result.course_id as course_id,course.title as title,result.grade as grade,registration.sec_id
from result natural join course natural join registration 
where result.ID='$id' and result.course_id not in(select scriptcheck.course_id from scriptcheck)";
$result = $conn->query($query1);

echo " <table border=5 id=table1>
 <tr>
 <th id=h>SI</th>
 <th id=h>Course-Id</th>
 <th id=h>Course-Title</th>
 <th id=h>Section</th>
 <th id=h>Grade</th>
 <th id=h>Select</th>
 <th id=h>Approval</th>
 
 </tr>";
 $i=1;


while ($row = mysqli_fetch_array($result)) { 
  
 echo "<tr>";
 echo "<td id=h1>" .$i. "</td>";
 echo "<td id=h1>" . $row['course_id'] . "</td>";
 echo "<td id=h1>" . $row['title'] . "</td>";
  echo "<td id=h1>" . $row['sec_id'] . "</td>";
echo "<td id=h1>" . $row['grade'] . "</td>";
 echo "<td id=h1><from>
    <input id=bt1 type=button name=select value=select onclick='selectrowtoinput()'>
 </from></td>";
 echo "<td id=h1> No </td>";
 echo "</tr>";
 $i++;
} 

$conn->close();
?>

	  </div>




  </div>
  <!-- javascript library -->
      <script type="text/javascript" src="bootstrap/js/jquery-1.10.2.min.js"></script>
      <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
      <script type="text/javascript" src="bootstrap/js/all.min.js"></script>
	  <script type="text/javascript">
     function selectrowtoinput(){
         var table=document.getElementById("table-from");
         for(var i=0;i<table.rows.length;i++){
              table.rows[i].onclick=function(){
                  
                   var link="s_script_check1.php?Course-Id="+this.cells[1].innerHTML+"&title="+this.cells[2].innerHTML+"&grade="+this.cells[3].innerHTML;
                  var xmlhttp = new XMLHttpRequest();
                  xmlhttp.onreadystatechange = function() {
                         if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                                
                                
                          }
                   };  
                   xmlhttp.open("GET",link,true);
                   xmlhttp.send(null);
               
                };
            }
        }
   </script>
</body>
</html>