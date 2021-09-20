<?php 
session_start();
        
if(!isset($_SESSION['admin_login'])) 
    header('location:adminlogin.php');   
?>
<?php
include '_inc/dbconn.php';
$id=  mysqli_real_escape_string($conn,$_REQUEST['current_id']);

$q=mysqli_query($conn,"select name from staff where id='$id'") or die(mysqli_error($conn));
$arr=mysqli_fetch_array($q,MYSQLI_BOTH);
$old=$arr["name"];
$name=  mysqli_real_escape_string($conn,$_REQUEST['edit_name']);
$address=  mysqli_real_escape_string($conn,$_REQUEST['edit_address']);
$mobile=  mysqli_real_escape_string($conn,$_REQUEST['edit_mobile']);
$email=mysqli_real_escape_string($conn,$_REQUEST['edit_email']);
mysqli_query($conn,"alter table customer change column $old  $name int(10)") or die(mysqli_error($conn));
$old1="beneficiary".$old;
$old2="atm".$old;
$old3="cheque_book".$old;
$new1="beneficiary".$name;
$new2="atm".$name;
$new3="cheque_book".$name;
mysqli_query($conn,"rename table $old1 to $new1,$old2 to $new2,$old3 to $new3 ") or die(mysqli_error($conn));
$sql="UPDATE staff SET  name='$name', address='$address', 
        mobile='$mobile',email='$email' WHERE id='$id'";
		
mysqli_query($conn,$sql) or die(mysqli_error($conn));
header('location:admin_hompage.php');
?>