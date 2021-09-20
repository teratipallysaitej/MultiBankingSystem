<?php 
session_start();
        
if(!isset($_SESSION['customer_login'])) 
    header('location:index.php');   
?>
<?php
                $cust_id=$_SESSION['cust_id'];
                include '_inc/dbconn.php';
                $sql="SELECT * FROM customer WHERE email='$cust_id'";
                $result=  mysqli_query($conn,$sql) or die(mysqli_error($conn));
                $rws=  mysqli_fetch_array($result,MYSQLI_BOTH);
                $a=$_SESSION['bank'];
            
                
                $name= $rws["name"];
				//echo $name;
                $account_no= $rws["$a"];
				if($account_no==0)
					header("location:noaccount.php");
                $acc_status=$rws["accstatus"];
                $address=$rws["address"];
                
                $gender=$rws["gender"];
                $mobile=$rws["mobile"];
                $email=$rws["email"];
                
                $_SESSION['login_id']=$account_no;
                $_SESSION['name']=$name;
                ?>

<!DOCTYPE html>
<html>
    <head>
        
        <meta charset="UTF-8">
        <title>Home - Online Banking</title>
        
        <link rel="stylesheet" href="newcss.css">
    </head>
        <?php include 'cust_header.php' ?>
        <div class='content_customer'>
            
           <?php include 'customer_navbar.php'?>
            <div class="customer_top_nav">
             <div class="text">Welcome <?php echo $_SESSION['name']?></div>
            </div>
            
            
            <?php
			    $sql="SELECT * FROM passbook".$_SESSION['login_id'] ;
                $result=  mysqli_query($conn,$sql) or die(mysqli_error($conn));
                while($rws=  mysqli_fetch_array($result,MYSQLI_BOTH))
                {
                $balance=$rws[6];
                }            
?>
            <div class="customer_body">
                <div class="content1">
            <p><span class="heading">Account No: </span><?php echo $account_no;?></p>
             </div>
            
            <div class="content2">
            <p><span class="heading">Balance: </span>INR <?php echo $balance;?></p>
            <p><span class="heading">Account status: </span><?php echo $acc_status;?></p>
            </div>
            
            
        </div>
    
               <?php include 'footer.php';?>
            
    </body>
</html>