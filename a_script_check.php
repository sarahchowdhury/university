<!DOCTYPE html>
<html>
<head>
  <title>Script Check</title>
  <style type="text/css">
    #table{
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
  <script type="text/javascript">
  function selectrowtoinput(){
    var table=document.getElementById("table");
    for(var i=0;i<table.rows.length;i++){
      table.rows[i].onclick=function(){
         var link="a_script_check1.php?Id="+this.cells[1].innerHTML;
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
    
  <?php
$conn = mysqli_connect("localhost", "root", "", "university");
if($conn->connect_errno > 0){
    die("Unable to connect: ". $conn->connect_error);
}

$query1= "SELECT * FROM scriptcheck";
$result = $conn->query($query1);

echo " <table border=5 id=table>

 <tr>
 <th id=h>SI</th>
 <th id=h>Student ID</th>
 <th id=h>Select</th>
 </tr>";
 $i=1;
$res=array();
while ($row = mysqli_fetch_array($result)) { 
  
 echo "<tr>";
 echo "<td id=h1>" .$i. "</td>";
 echo "<td id=h1>" . $row['ID'] . "</td>";
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