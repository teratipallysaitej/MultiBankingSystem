<?php 
session_start();
        
if(!isset($_SESSION['customer_login'])) 
    header('location:index.php'); 
include '_inc/dbconn.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Add Beneficiary</title>
        
        <link rel="stylesheet" href="newcss.css">
        <style>
            .content_customer table,th,td {
    padding:6px;
    border: 1px solid #2E4372;
   border-collapse: collapse;
   text-align: center;
}
.content_customer td{
    
    
}

        </style>
    </head>
        <?php include 'cust_header.php' ?>
<div class='content_customer'>
            
           <?php include 'customer_navbar.php'?>
    <div class="customer_top_nav">
             <div class="text">Welcome <?php echo $_SESSION['name']?><br></div></div>
			<div class="customer_top_nav">
			<div class="text"> Current Bank: <?php echo $_SESSION['bank'];?>
			 </div>
            </div>
    <br><br>
    <form action='add_beneficiary_process.php' method='post'>
        <br><br>
        <h3 style="text-align:center;color:#2E4372;"><u>Add Beneficiary</u></h3>
        <table align="center">
            
            <tr><td><span class="heading">Payee Name: </span></td><td><input type='text' name='name' required></td></tr>
            <tr><td><span class="heading">Account No: </span></td><td><input type='text' name='account_no' required></td></tr>
            <tr><td><span class="heading">Select Bank: </span></td><td><select name='branch_select' required>
                       <?php
					$q=mysqli_query($conn,"select name from staff") or die(mysqli_error($conn));
					
					$num=mysqli_num_rows($q);
					while($num=mysqli_fetch_array($q,MYSQLI_BOTH))
					{
						echo "<option  value='" . $num['name'] ."' >" . $num['name'] ."</option>";
					}
				?></select></td></tr>
            <tr><td><span class="heading">Ifsc Code: </span></td><td><input type='text' name='ifsc_code' required></td></tr> </table>
           <table align="center"> <tr><td><input type='submit' name='submitBtn' value='Add Beneficiary' class="addstaff_button">
        </table>
        
        </form>
    
    <?php include 'footer.php'?>
           