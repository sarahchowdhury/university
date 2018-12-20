<?php
    if(isset($_POST["submit"])) {

	     //$target_dir = "uploads/";
		 
         $target = "uploads/" . basename($_FILES["file"]["name"]);
          $f=$_FILES["file"]["name"];
          $file_loc = $_FILES['file']['tmp_name'];
          $file_size = $_FILES['file']['size'];
         $file_type = $_FILES['file']['type'];
		 $text=$_POST["text"];
		 $select=$_POST["select"];
		 echo $select."--->";
          $folder="uploads/";
		 
		
	
        $db =mysqli_connect("localhost","root","","university");
        $sql="insert into upload(C_ID,course_id,file,description,path) values('','$select','$f','$text','$target')";
      mysqli_query($db,$sql);
	  if(move_uploaded_file($file_loc,$folder.$f)){
		  $msg = "file uploaded succesfully";
	  }
	  else
	  {
		  $msg="there was a problem.File not uploaded";
	  }
	  echo "UPLOAD SUCCESFULLY.";
	  
	}

 ?>
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
	<div class="container3">
 </br>
 </br>
  <input type="button" id="bt1" onclick="location.href='a_show_course.php';" value="UPLOAD_MORE" />
  <input type="button" id="bt1" onclick="location.href='a_home.php';" value="FINISH" />
  </div>
  </div>
 </body>
 </html>