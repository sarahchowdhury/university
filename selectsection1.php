<?php
session_start();
$Course_Id = $_GET['Course-Id'];
$Course_title = $_GET['Course-Title'];
$Credits = $_GET['Credits'];
$id = $_SESSION["userid"];
$conn = mysqli_connect("localhost", "root", "", "university");
if($conn->connect_errno > 0){
    die("Unable to connect: ". $conn->connect_error);
}
$query="select time_slot.day as day,time_slot.start as start,time_slot.end as end,section.sec_id as sec_id,section.building as build,section.room_number as room
from student natural join section natural join time_slot
where student.ID= '$id' and section.course_id='$Course_Id'";
$result = $conn->query($query);
$sum="
 <tr>
 <th id=h>SI</th>
 <th id=h>Course-Id</th>
 <th id=h>Section</th>
 <th id=h>Start_time</th>
 <th id=h>End_time</th>
 <th id=h>Day</th>
 <th id=h>Building</th>
 <th id=h>Room-no</th>
 <th id=h>Select</th>
 </tr>";
 $i=1;

while ($row = mysqli_fetch_array($result)) { 
		 $sum.= "<tr>";
		 $sum.= "<td id=h1>" .$i. "</td>";
		 $sum.= "<td id=h1>" . $Course_Id . "</td>";
		 $sum.= "<td id=h1>" . $row['sec_id'] . "</td>";
		 $sum.= "<td id=h1>" . $row['start'] . "</td>";
		 $sum.= "<td id=h1>" . $row['end'] . "</td>";
		 $sum.= "<td id=h1>" . $row['day'] . "</td>";
		 $sum.= "<td id=h1>" . $row['build'] . "</td>";
		 $sum.= "<td id=h1>" . $row['room'] . "</td>";
		 $sum.= "<td id=h1><from>
		    <input id=bt1 type=button name=select value=select onclick='selectrowtoinput()'>
		 </from></td>";
		 $sum.= "</tr>";
		 $i++;
} 
echo $sum;

$conn->close();
?>
