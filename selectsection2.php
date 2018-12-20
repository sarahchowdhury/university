<?php
session_start();
$Course_Id = $_GET['Course-Id'];
$Section = $_GET['Section'];
$Start_time = $_GET['Start_time'];
$End_time = $_GET['End_time'];
$Day = $_GET['Day'];
$id = $_SESSION["userid"];
$conn = mysqli_connect("localhost", "root", "", "university");
if($conn->connect_errno > 0){
    die("Unable to connect: ". $conn->connect_error);
}
$query="select time_slot.time_slot_id as slot_id
from time_slot
where day='$Day' and time_slot.start=$Start_time and time_slot.end=$End_time";
$result = $conn->query($query);


while ($row = mysqli_fetch_array($result)) { 
	$slot_id=$row['slot_id'];
}
$query1="select section.semester as sem,section.year as year
from section
where section.sec_id='$Section'";
$result1 = $conn->query($query1);



while ($row = mysqli_fetch_array($result1)) { 
	$sem=$row['sem'];
	$year=$row['year'];
}
$res=array();
$res1= array();
$query3= "select time_slot.day,time_slot.start
from time_slot
where time_slot.time_slot_id in (select registration.time_slot_id from registration where registration.ID='$id')";
$result3 = $conn->query($query3);
while ($row = mysqli_fetch_array($result3)) { 
 $res[]=$row['day'];
 $res1[]=$row['start'];
 
} 
$sum="";
if( in_array($Day,$res) && in_array($Start_time, $res1)){
	 $sum.= $Course_Id." conflict with selected course.";
	 echo $sum;
	
   
}
else{
	$query2="UPDATE `registration` SET `sec_id`='$Section',`semester`='$sem',`year`=$year,`time_slot_id`='$slot_id' WHERE registration.ID='$id'   and  registration.course_id='$Course_Id'";

	$result2 = $conn->query($query2);
	$sum.= "Sucessfully selected.";
	echo $sum;

}



$conn->close();
?>