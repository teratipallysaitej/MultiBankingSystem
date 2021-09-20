<?php 
session_start();
        
if(!isset($_SESSION['customer_login'])) 
    header('location:index.php');   
?>
<?php
                $sender_id=$_SESSION["login_id"];
                $sender_name=$_SESSION["name"];
                
                $Payee_name=$_REQUEST['name'];
                $acc_no=$_REQUEST['account_no'];
                $bank=$_REQUEST['branch_select'];//bank name of receiver
                $ifsc=$_REQUEST['ifsc_code'];
                
                
                include '_inc/dbconn.php';
				$ben="beneficiary".$_SESSION["bank"];
                $sql1="SELECT * FROM $ben WHERE sender_id='$sender_id' AND reciever_id='$acc_no'";
                $result1=  mysqli_query($conn,$sql1);
                $rws1=  mysqli_fetch_array($result1,MYSQLI_BOTH);
                $s1=$rws1[1];
                $s2=$rws1[3];
                
                
                $sql="SELECT * FROM customer WHERE $bank='$acc_no'";
                
                $result=  mysqli_query($conn,$sql) or die(mysqli_error($conn));
                $rws=  mysqli_fetch_array($result,MYSQLI_BOTH) ;
                
                if($sender_id==$rws["$bank"]) //can't send request to himself
                {
                echo '<script>alert("You cant add yourself as a beneficiery!");';
                     echo 'window.location= "add_beneficiary.php";</script>';
                }
                
                elseif($s1==$sender_id && $s2==$acc_no)
                {
                    echo '<script>alert("You cannot add a beneficiery twice!");';
                     echo 'window.location= "add_beneficiary.php";</script>';
                }
                
                elseif($rws["name"]!=$Payee_name && $rws["$bank"]!=$acc_no && $rws["$bank"]==0)
                {
                echo '<script>alert("Beneficiary Not Found!\nPlease enter correct details");';
                     echo 'window.location= "add_beneficiary.php";</script>';
                }
                
                
                else{
                     
                    $status="PENDING";
					
                $sql="insert into $ben values('','$sender_id','$sender_name','$acc_no','$Payee_name','$status')";
                mysqli_query($conn,$sql) or die(mysqli_error($conn));
                header("location:display_beneficiary.php");
                }
                