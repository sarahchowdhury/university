<?php
session_start();
   $conn = mysqli_connect("localhost", "root", "", "university");
	if($conn->connect_errno > 0){
			    die("Unable to connect: ". $conn->connect_error);
	}
	$code=$_GET['Course-Id'];
	$title=$_GET['Course-Title'];
	$credit=$_GET['Credits'];
	
	$id = $_SESSION["userid"];
	$query="SELECT COUNT(registration.course_id) as count FROM registration WHERE registration.ID='$id' and registration.course_id='$code'";
    $result = $conn->query($query);
    $row = mysqli_fetch_array($result);
			 
	
	if($row['count']==0){
		   $query3="SELECT COUNT(exam_routine.course_id)as count1 ,registration.course_id as course_id FROM student NATURAL JOIN registration NATURAL JOIN exam_routine WHERE student.ID='$id' and exam_routine.day = (SELECT exam_routine.day FROM exam_routine where exam_routine.course_id='$code')";
          $result3 = $conn->query($query3);
          $row1 = mysqli_fetch_array($result3);
          if($row1['count1']==0){
          	$query1="INSERT INTO `registration`(`ID`, `course_id`, `sec_id`, `semester`, `year`, `time_slot_id`, `approval`) VALUES ('$id','$code',null,null,null,null,'Not Approve')";
          $result1 = $conn->query($query1);
          echo "Successfully selected";
          }
          else{
             echo $code." confilct with ".$row1['course_id'];
          }
		 
	}
	else{
		$query2="DELETE FROM `registration` WHERE registration.ID='$id' and registration.course_id='$code'";
		$result2 = $conn->query($query2);
		echo "Course Deleted Successfully";
		
	}
	

   


?>