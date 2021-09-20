<?php 
session_start();
        
if(!isset($_SESSION['staff_login'])) 
    header('location:banklogin.php');   
?>
    <?php
include '_inc/dbconn.php';
$name=  mysqli_real_escape_string($conn,$_REQUEST['customer_name']);
$gender=  mysqli_real_escape_string($conn,$_REQUEST['customer_gender']);
$dob=  mysqli_real_escape_string($conn,$_REQUEST['customer_dob']);

$credit=  mysqli_real_escape_string($conn,$_REQUEST['initial']);
$address=  mysqli_real_escape_string($conn,$_REQUEST['customer_address']);
$mobile=  mysqli_real_escape_string($conn,$_REQUEST['customer_mobile']);
$email= mysqli_real_escape_string($conn,$_REQUEST['customer_email']);
$bank=$_SESSION["staff_id"];

//salting of password
$salt="@g26jQsG&nh*&#8v";
$password=  sha1($_REQUEST['customer_pwd'].$salt);

$date=date("Y-m-d");

$n=mysqli_query($conn,"select name from staff where id='$bank'");
$a= mysqli_fetch_array($n,MYSQLI_BOTH);
$bank_name=$a["name"];

$res=mysqli_query($conn,"select * from customer where email='$email'");
$resa=mysqli_fetch_array($res,MYSQLI_BOTH);
$em_exists=mysqli_query($conn,"select * from customer where email='$email' and `$bank_name`!=0");

if(mysqli_num_rows($em_exists) != 0){
	header("location:customer_exists.php");
}
else if(mysqli_num_rows($res) == 0)
{
	$sql3="SELECT MAX(id) from customer";
	$result=mysqli_query($conn,$sql3) or die(mysqli_error($conn));
	$rws=  mysqli_fetch_array($result,MYSQLI_BOTH);
	$id=$rws[0]+1;
	$sql="insert into customer( `id`,`name`,`gender`,`dob`,`address`,`mobile`,`email`,`password`,`accstatus`)VALUES($id,'$name','$gender','$dob','$address','$mobile','$email','$password','ACTIVE')";
	mysqli_query($conn,$sql) or die(mysqli_error($conn));

} 
else{
	$id=$resa["id"];
}

$bid=strval($bank).strval($id);//new bank account number

//creation of new passbook
$sql1="CREATE TABLE passbook".$bid." (transactionid int(5) AUTO_INCREMENT, transactiondate date, name VARCHAR(255),  bank_id int(10), credit int(10), debit int(10), amount float(10,2), narration VARCHAR(255), PRIMARY KEY (transactionid))";

//updating bank account number in customer table
$sql2="update customer set `$bank_name` = '$bid' where `email`='$email'";

mysqli_query($conn,$sql1) or die(mysqli_error($conn));//creation of passbook

mysqli_query($conn,$sql2) or die(mysqli_error($conn));//update customer table

$sql4="insert into passbook".$bid." values('','$date','$name','$bank','$credit','0','$credit','Account Open')";

mysqli_query($conn,$sql4) or die(mysqli_error("table not created"));//updattion of passbook

header('location:bank_customer_display.php');
?>