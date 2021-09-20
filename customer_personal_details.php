<?php 
session_start();
        
if(!isset($_SESSION['customer_login'])) 
    header('location:index.php');   
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Personal Details</title>
        
        <link rel="stylesheet" href="newcss.css">
    </head>
        <?php include 'cust_header.php' ?>
        <div class='content_customer'>
            
           <?php include 'customer_navbar.php'?>
            <div class="customer_top_nav">
             <div class="text">Welcome <?php echo $_SESSION['name']?></div>
            </div>
            <br><br><br><br>
            <h3 style="text-align:center;color:#2E4372;"><u>Personal Details</u></h3>
            
            <?php
                $cust_id=$_SESSION['cust_id'];
                include '_inc/dbconn.php';
                $sql="SELECT * FROM customer WHERE email='$cust_id'";
                $result=  mysqli_query($conn,$sql) or die(mysqli_error($conn));
                $rws=  mysqli_fetch_array($result,MYSQLI_BOTH);
                
                $b=$_SESSION["bank"];
                $name= $rws[1];
                $account_no= $rws["$b"];
                //$dob=$rws[3];
                
                
                $gender=$rws[2];
                $mobile=$rws["mobile"];
                $email=$rws["email"];
                $address=$rws["address"];
                
                $last_login= $rws["lastlogin"];
                
                $acc_status=$rws["accstatus"];
                
                
                
                                
?>          <div class="customer_body">
            <div class="content3">
            <p><span class="heading">Name: </span><?php echo $name;?></p>
            <p><span class="heading">gender: </span><?php if($gender=='M') echo "Male"; else echo "Female";?></p>
            <p><span class="heading">Mobile: </span><?php echo $mobile;?></p>
            <p><span class="heading">Email: </span><?php echo $email;?></p>
            <p><span class="heading">Address: </span><?php echo $address;?></p>
            </div>
            <div class="content4">
            <p><span class="heading">Account No: </span><?php echo $account_no;?></p>
            </div>
            </div>
        </div>
               <?php include 'footer.php';?>
            
    </body>
</html>