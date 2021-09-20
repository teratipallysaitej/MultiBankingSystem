<?php 
session_start();
        
if(!isset($_SESSION['staff_login'])) 
    header('location:banklogin.php');   
?>
<?php
if(isset($_REQUEST['submit_id']))
{
	include '_inc/dbconn.php';
	$ben="beneficiary".$_SESSION["bank"];
    $id=$_REQUEST['customer_id'];
	
    $c=mysqli_query($conn,"select count(*) from $ben where status='PENDING'");
$cc=mysqli_fetch_array($c,MYSQLI_BOTH);
$count=cc[0];
if($count==0)
	header("location:bank_beneficiary.php");

    
    $sql="UPDATE $ben SET status='ACTIVE' WHERE id='$id'";
    mysqli_query($conn,$sql) or die(mysqli_error($conn));
    
   echo '<script>alert("Beneficiary status ACTIVE ");';
   echo 'window.location= "bank_beneficiary.php";</script>';
}