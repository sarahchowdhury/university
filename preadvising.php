<!DOCTYPE html>
<html>
<head>
  <title>Course Select</title>
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

#table2{
  height: 200;
  width: 100%;
  border-radius: 4px;

}
  </style>
  <script type="text/javascript">

    function click(){
         var table=document.getElementById("tabel1");
         for(var i=0;i<table.rows.length;i++){
              table.rows[i].onclick=function(){
                  
                  var link="preadvising1.php?Course-Id="+this.cells[1].innerHTML+"&Course-Title="+this.cells[2].innerHTML+"&Credits="+this.cells[3].innerHTML;
                  var xmlhttp = new XMLHttpRequest();
                  xmlhttp.onreadystatechange = function() {
                         if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                                alert(xmlhttp.responseText);
                                window.location.reload();
                                
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
      ?>
   <table id="tabel2" border="3px solid black">
    <tr>
      <th id="h">SI</th>
      <th id="h">Code</th>
      <th id="h">Course value</th>
      <th id="h">credits</th>
    </tr>
    <?php
      $query="SELECT registration.course_id as course,course.title as title,course.credits as credits FROM `registration` NATURAL JOIN course WHERE registration.ID='$id'";
      $result = $conn->query($query);
      $i=1;
  while ($row = mysqli_fetch_array($result)) { 
       ?> 
       <tr>
        <td id="h1"><?=$i?></td>
        <td id="h1"><?=$row['course']?></td>
        <td id="h1"><?=$row['title']?></td>
        <td id="h1"><?=$row['credits']?></td>
        
       </tr>

      
        
    <?php

    $i++;
     }
        
    ?>
   </table>

   <table id="tabel1" border="3px solid black">
    <tr>
        <th id="h">SI</th>
      <th id="h">Code</th>
      <th id="h">Course value</th>
      <th id="h">credits</th>
      <th id="h">Take/Remove</th>
    </tr>
      
      <?php
      $query1= "select course.course_id as course,course.title as title,course.credits as credits
      from (student natural join department natural join course ) left join prereq on (course.course_id=prereq.course_id) 
      where student.ID ='$id' and (prereq.course_id in (select takes.course_id from takes where takes.ID='$id') or prereq.course_id is NULL)
      ";
      $result1 = $conn->query($query1);
      $i=1;
      while ($row = mysqli_fetch_array($result1)) { 
       ?> 
       <tr>
        <td id="h1"><?=$i?></td>
        <td id="h1"><?=$row['course']?></td>
        <td id="h1"><?=$row['title']?></td>
        <td id="h1"><?=$row['credits']?></td>
        <td id="h1"><a href="javascript:click()">take/remove</a></td>
       </tr>

      
        
      <?php 
       $i++;
        } 

    $conn->close();
    ?>
   </table>
    

  </div>
</body>
</html>