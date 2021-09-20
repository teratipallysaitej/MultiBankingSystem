<?php 
session_start();
        
if(!isset($_SESSION['staff_login'])) 
    header('location:staff_login.php');   
?>
<?php
if(isset($_REQUEST['submit_id']))
{
    include '_inc/dbconn.php';
    $id=$_REQUEST['customer_id'];
	$b=$_SESSION['bank'];
	$atm="atm".$b;
     $c=mysqli_query($conn,"select count(*) from $atm where atm_status='PENDING'");
$cc=mysqli_fetch_array($c,MYSQLI_BOTH);
$count=cc[0];
if($count==0)
	header("location:bank_atm_approve.php");
	
    $sql="SELECT * FROM $atm WHERE id='$id'";
    $result=  mysqli_query($conn,$sql) or die(mysqli_error($conn));
    $rws=  mysqli_fetch_array($result,MYSQLI_BOTH);
                
    if($rws[3]=="PENDING")
    $sql="UPDATE $atm SET atm_status='ISSUED' WHERE id='$id'";
    
    mysqli_query($conn,$sql) or die(mysqli_error($conn));
    
   echo '<script>alert("ATM Card Issued");';
   echo 'window.location= "bank_atm_approve.php";</script>';
}