<?php 
session_start();

include '_inc/dbconn.php';
$date=$_SESSION['staff_date'];
$id=$_SESSION['staff_id'];
$sql="UPDATE staff SET lastlogin='$date' WHERE id='$id'";
mysqli_query($conn,$sql) or die(mysqli_error($conn));

session_destroy();
header('location:banklogin.php');
?>