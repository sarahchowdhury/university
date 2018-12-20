<?php

$conn = mysqli_connect("localhost", "root", "", "university");

if($conn->connect_errno > 0){
    die("Unable to connect: ". $conn->connect_error);
}
$course_id = $_POST['course_id'];
$section = $_POST['section'];
$semester = $_POST['semester'];
$year = $_POST['year'];
$time_slot = $_POST['time_slot'];
$building = $_POST['building'];
$room_no = $_POST['room_no'];
$dept_name = $_POST['dept_name'];
$query="delete from section where section.semester!='$semester' and section.year!='$year'";
$result = $conn->query($query);
$query1="insert into section values ('$course_id','$section','$semester','$year','$building','$room_no','$time_slot')";
$result1 = $conn->query($query1);

header('location: a_section.html');

  
$conn->close();
?>
