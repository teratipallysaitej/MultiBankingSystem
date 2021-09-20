<?php 
session_start();
        
if(!isset($_SESSION['staff_login'])) 
    header('location:banklogin.php');   
?>
 <?php
                $staff_id=$_SESSION['staff_id'];
                include '_inc/dbconn.php';
                $sql="SELECT * FROM staff WHERE id='$staff_id'";
                $result=  mysqli_query($conn,$sql) or die(mysqli_error($conn));
                $rws=  mysqli_fetch_array($result,MYSQLI_BOTH);
                
                $id=$rws[0];
                $name=$rws[1];
                $mobile=$rws["mobile"];
                $email=$rws["email"];
				$ifsc=$rws["ifsc"];
                $last_login=$rws["lastlogin"];
				$addr=$rws["address"];
                
                $_SESSION['login_id']=$email;
                $_SESSION['name1']=$name;
                $_SESSION['id']=$id;
                ?>
            
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Bank Home</title>
        
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
                <p><span class="heading">Name: </span><?php echo $name;?></p>
            <p><span class="heading">Address: </span><?php echo $addr;?></p>
            <p><span class="heading">Email: </span><?php echo $email;?></p>
            </div>
             
            </div>
        </div>
    <?php include 'footer.php';?>
<?php
$date1=date('Y-m-d H:i:s');
$_SESSION['staff_date']=$date1;
?>
            
                