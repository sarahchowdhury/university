<?php
// Start the session
session_start();
?>
<?php




$conn = mysqli_connect("localhost", "root", "", "university");

if($conn->connect_errno > 0){
    die("Unable to connect: ". $conn->connect_error);
}
$userid = $_POST['username'];
$password = $_POST['password'];
$_SESSION["userid"] = $userid ;
$query1= "SELECT * FROM student";
$result = $conn->query($query1);
$query2= "SELECT * FROM admin";
$result1 = $conn->query($query2);
$res=array();
$res1= array();
$res2=array();
$res3= array();
while ($row = mysqli_fetch_array($result)) { 
 $res[]=$row['ID'];
 $res1[]=$row['password'];
 
} 
while ($row = mysqli_fetch_array($result1)) { 
 $res2[]=$row['ID'];
 $res3[]=$row['password'];
 
} 
if(in_array($userid,$res) && in_array($password, $res1)){
	header('location: s_home.php');
}
elseif(in_array($userid,$res2) && in_array($password, $res3)){
	header('location: a_home.php');
}
else
echo "password incorrect";
  
$conn->close();
?>





