<?php
// Start the session
session_start();
?>




<?php




$conn = mysqli_connect("localhost", "root", "", "university");

if($conn->connect_errno > 0){
    die("Unable to connect: ". $conn->connect_error);
}
//$userid = $_POST['Id'];
$SL=$_POST['txtSL'];
$Date=$_POST['date'];
$Timester=$_POST['timester'];
$day=$_POST['txtDay'];
$d=$_POST['details'];
$query="INSERT INTO `calender`(`SL`, `Timester`, `Date`, `Day`, `Details`) VALUES ($SL,'$Timester','$Date','$day','$d')";
$result1 = $conn->query($query);

  
$conn->close();
error_reporting(0);
ini_set('display_errors', 0);
include("a_home.php");


?>