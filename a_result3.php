<?php
     session_start();
      $conn = mysqli_connect("localhost", "root", "", "university");
      if($conn->connect_errno > 0){
          die("Unable to connect: ". $conn->connect_error);
      }
      $id = $_GET['ID'];
      $grade = $_GET['Grade'];
      $code=$_SESSION["code"]  ;
      $sec=$_SESSION["sec"]  ;
      $query="INSERT INTO `result`(`ID`, `course_id`, `grade`) VALUES ('$id','$code','$grade')";
      $result = $conn->query($query);
      $query1="DELETE FROM `registration` WHERE registration.ID='$id' and registration.course_id='$code'";
      $result1 = $conn->query($query1);
      $result2="";
      
      ?>