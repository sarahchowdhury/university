<!DOCTYPE html>
<html>
<head>
	<title>Result</title>
	<script type="text/javascript">
		function click(){
			var table=document.getElementById("table1");
         for(var i=0;i<table.rows.length;i++){
              table.rows[i].onclick=function(){
                  
                  var link="a_result3.php?ID="+this.cells[1].innerHTML+"&Grade="+document.getElementById("input)");
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
</head>
<body>
<?php
   
      $conn = mysqli_connect("localhost", "root", "", "university");
      if($conn->connect_errno > 0){
          die("Unable to connect: ". $conn->connect_error);
      }
      
      ?>
  <table id="table1">
  	<tr>
  		<th id="h">SI</th>
  		<th id="h">Student ID</th>
  		<th id="h">Grade</th>
  		<th id="h">Click</th>
  	</tr>
  	<?php
      $query="";
      $result = $conn->query($query);
      $i=1;
  while ($row = mysqli_fetch_array($result)) { 
       ?> 
  	<tr>
  		<td id="h1"><?=$i?></td>
        <td id="h1"><?=$row['id']?></td>
        <td id="h1"><<form><input type="text" id="input" name=""></form></td>
        <td id="h1"><a href="javascript:click()">Click</a></td>
  	</tr>

      <?php 
       $i++;
        } 

    $conn->close();
    ?>
  </table>
</body>
</html>