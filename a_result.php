<!DOCTYPE html>
<html>
<head>
	<title>Result</title>
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
                  
                  var link="a_result1.php?Course-Id="+this.cells[1].innerHTML;
                  var xmlhttp = new XMLHttpRequest();
                  xmlhttp.onreadystatechange = function() {
                         if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                               document.getElementById("tabel2").innerHTML=xmlhttp.responseText; 
                                
                          }
                   };  
                   xmlhttp.open("GET",link,true);
                   xmlhttp.send(null);
               
                };
            }
      }
    function selectrowtoinput(){
        var table=document.getElementById("table2");
         for(var i=0;i<table.rows.length;i++){
              table.rows[i].onclick=function(){
                  
                   var link="a_result2.php?Section="+this.cells[1].innerHTML;
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
</head>
<body>
	 <?php
   
      $conn = mysqli_connect("localhost", "root", "", "university");
      if($conn->connect_errno > 0){
          die("Unable to connect: ". $conn->connect_error);
      }
      
      ?>
  <table id="tabel1">
  	<tr>
  		<th id="h">SI</th>
  		<th id="h">Course-Id</th>
  		<th id="h">Title</th>
  		<th id="h">Click</th>
  	</tr>
  	<?php
      $query="SELECT DISTINCT registration.course_id as code ,course.title as title from registration NATURAL JOIN course";
      $result = $conn->query($query);
      $i=1;
  while ($row = mysqli_fetch_array($result)) { 
       ?> 
  	<tr>
  		<td id="h1"><?=$i?></td>
        <td id="h1"><?=$row['code']?></td>
        <td id="h1"><?=$row['title']?></td>
        <td id="h1"><a href="javascript:click()">Click</a></td>
  	</tr>

      <?php 
       $i++;
        } 

    $conn->close();
    ?>
  </table>
  <table id="tabel2">
  	
  </table>
</body>
</html>