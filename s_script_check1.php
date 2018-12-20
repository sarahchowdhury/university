<?php
session_start();
$Course_Id = $_GET['Course-Id'];
$Section = $_GET['sec_id'];
$Title = $_GET['title'];

$id = $_SESSION["userid"];
$conn = mysqli_connect("localhost", "root", "", "university");
if($conn->connect_errno > 0){
    die("Unable to connect: ". $conn->connect_error);
}
$query="insert into scriptcheck values ('$id','$Course_Id','$Section','No')";
$result = $conn->query($query);





$conn->close();
?>