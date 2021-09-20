<?php 
session_start();
        
if(!isset($_SESSION['customer_login'])) 
    header('location:index.php');   
?>
<?php
if(!isset($_REQUEST['customer_id']))
	header("location:display_beneficiary.php");
if(isset($_REQUEST['submit_id']))
{
include '_inc/dbconn.php';
$customer_id=$_REQUEST["customer_id"];
$ben="beneficiary".$_SESSION["bank"];
$sql="DELETE FROM $ben WHERE id='$customer_id'";
$result=  mysqli_query($conn,$sql) or die(mysqli_error($conn));

echo '<script>alert("Beneficiary Deleted successfully. ");';
                     echo 'window.location= "display_beneficiary.php";</script>';
                    
}
?>