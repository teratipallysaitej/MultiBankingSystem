<?php 
session_start();
        
if(!isset($_SESSION['staff_login'])) 
    header('location:banklogin.php');   
?>
 <!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Customers</title>
        
        <link rel="stylesheet" href="newcss.css">
    </head>
        <?php include 'header.php' ?>
        <div class="displaystaff_content">
            
           <?php include 'bank_navbar.php'?>
            <div class="customer_top_nav">
             <div class="text">Welcome <?php echo $_SESSION['name1']?></div>
            </div>
           
            <div class="customer_body">
             <div class="content1">
                <p><span class="heading"> <a href="addcustomer.php">Add Customer</a></span></p>
            <p><span class="heading"><a href="display_customer.php">View/Edit customer</a> </span></p>
            <p><span class="heading"><a href="delete_customer.php">Delete customer</a></span></p>
            </div>
             
            </div>
        </div>
    <?php include 'footer.php';?>
            
                