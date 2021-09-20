<?php 
session_start();
        
if(!isset($_SESSION['admin_login'])) 
    header('location:adminlogin.php');   
?>
<?php
include '_inc/dbconn.php';
$name=  mysqli_real_escape_string($conn,$_REQUEST['staff_name']);
$address=  mysqli_real_escape_string($conn,$_REQUEST['staff_address']);
$mobile=  mysqli_real_escape_string($conn,$_REQUEST['staff_mobile']);
$email= mysqli_real_escape_string($conn,$_REQUEST['staff_email']);
$password=  mysqli_real_escape_string($conn,$_REQUEST['staff_pwd']);
$ifsc=mysqli_real_escape_string($conn,$_REQUEST['ifsc']);
$sql="insert into staff values('','$name','$address','$mobile',
    '$email','$password','$ifsc','')";
$sql2="alter table customer add column $name int(10) default 0";
	mysqli_query($conn,$sql) or die("the bank is already registered");

	mysqli_query($conn,$sql2) or die("not executed");

$ben="beneficiary".$name;
$atm="atm".$name;
$cheq="cheque_book".$name;

	
mysqli_query($conn,"create table $ben (id int(10), sender_id int(10),sender_name varchar(20),reciever_id int(10),reciever_name varchar(20),status varchar(40))") or die(mysqli_error($conn));

mysqli_query($conn,"create table $atm (id int(10),cust_name varchar(20),account_no int(10),atm_status varchar(40))") or die(mysqli_error($conn));

mysqli_query($conn,"create table $cheq (id int(10),cust_name varchar(20),account_no int(10),cheque_book_status varchar(40))") or die(mysqli_error($conn));


header('location:admin_hompage.php');

?>