<?php 
session_start();
        
if(!isset($_SESSION['admin_login'])) 
    header('location:adminlogin.php');   
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Admin Homepage</title>
        
        <link rel="stylesheet" href="newcss.css">
    </head>
        <?php include 'header.php' ?>
        <div class='content'>
            
           <?php include 'admin_navbar.php'?>
            <div class='admin_staff'>
               
                <ul>
                    <li><b><u>Bank</u></b></li>
       <li> <a href="addbank.php">Add bank</a></li>
        <li><a href="display_bank.php">View/Edit bank</a></li>
        <li> <a href="delete_bank.php">Delete bank</a></li>
        </ul>
        </div>
            
        <?php include 'footer.php';?>
    </body>
</html>