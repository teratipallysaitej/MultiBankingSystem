<?php 
session_start();
        
if(!isset($_SESSION['customer_login'])) 
    header('location:index.php');   
?>
<?php
                
                include '_inc/dbconn.php';
               $a= $_POST["s_bank"];
			   $_SESSION["bank"]=$a;
			   header("location:customer_account_summary.php");
			   ?>