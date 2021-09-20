<?php 
session_start();
        
if(!isset($_SESSION['staff_login'])) 
    header('location:banklogin.php');   
?>
<?php
include '_inc/dbconn.php';
$bank=$_SESSION["staff_id"];
$n=mysqli_query($conn,"select name from staff where id='$bank'");
$a= mysqli_fetch_array($n,MYSQLI_BOTH);
$bank_name=$a["name"];
$c=mysqli_query($conn,"select count(*) from customer where `$bank_name`!=0");
$cc=mysqli_fetch_array($c,MYSQLI_BOTH);
$count=$cc[0];
if($count==0)
	header("location:display_customer.php");


$id=  mysqli_real_escape_string($conn,$_REQUEST['customer_id']);
$sql="SELECT * FROM `customer` WHERE id=$id";
$result=  mysqli_query($conn,$sql) or die(mysqli_error($conn));
$rws=  mysqli_fetch_array($result,MYSQLI_BOTH);
$name=$rws["name"];
$accq=mysqli_query($conn,"select `$bank_name` from customer where id='$id'") or die(mysqli_error($conn));
$acc=mysqli_fetch_array($accq,MYSQLI_BOTH);
$accno=$acc[0];
$chq="cheque_book".$bank_name;
$atm="atm".$bank_name;

?>
<?php
                        $delete_id=  mysqli_real_escape_string($conn,$_REQUEST['customer_id']);
                        if(isset($_REQUEST['submit2_id'])){
                            $sql_delete="update customer set `$bank_name`=0 where id=$id" ;
                            $sql_drop="DROP TABLE passbook".$accno;
							$sql_chq="DELETE FROM `$chq` WHERE `cust_name` = '$name'";
							$sql_atm="delete from `$atm`  where `cust_name`='$name'";
							
							mysqli_query($conn,$sql_chq) or die(mysqli_error($conn));
							mysqli_query($conn,$sql_atm) or die(mysqli_error($conn));
							    mysqli_query($conn,$sql_drop) or die(mysqli_error($conn));
							 mysqli_query($conn,$sql_delete) or die(mysqli_error($conn));
                     
						   header('location:delete_customer.php');
                        }
                        ?>
<!DOCTYPE HTML>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="newcss.css"/>
        
        <title>Edit customer details</title>
        
    </head>
    <?php include 'header.php'; ?>
        <div class='content_addstaff'>
    <?php include 'bank_navbar.php'?>
                <div class='addstaff'>
                <form action="alter_customer.php" method="POST">
            <table align="center">
                                <input type="hidden" name="current_id" value="<?php echo $id;?>"/>
                 <tr><td colspan='2' align='center' style='color:#2E4372;'><h3><u>Edit Customer Details</u></h3></td></tr>
                <tr>
                    <td>customer's name</td>
                    <td><input type="text" name="edit_name" value="<?php echo $rws[1];?>" required=""/></td>
                </tr>
                <tr>
                    <td>gender</td>
                    <td>
                        M<input type="radio" name="edit_gender" value="M" <?php if($rws[2]=="M") echo "checked";?>/>
                        F<input type="radio" name="edit_gender" value="F" <?php if($rws[2]=="F") echo "checked";?>/>
                    </td>
                </tr>
                <tr>
                    <td>
                        DOB
                    </td>
                    <td>
                        <input type="date" name="edit_dob" value="<?php echo $rws["dob"];?>"/>
                    </td>
                </tr>
                
                                
                <tr>
                    <td>Address:</td>
                    <td><textarea name="edit_address"><?php echo $rws["address"];?></textarea></td>
                </tr>
                
                    <td>mobile</td>
                    <td><input type="text" name="edit_mobile" value="<?php echo $rws["mobile"];?>" required=""/></td>
                </tr>

                <tr>
                    <td>email id</td>
                    <td><input type="text" name="edit_mobile" value="<?php echo $rws["email"];?>" required=""/></td>
                </tr>
                
                <tr>
                    <td colspan="2" align='center' style='padding-top:20px'><input type="submit" name="alter_customer" value="UPDATE DATA" class='addstaff_button'/></td>
                </tr>
            </table>
        </form>
                
        </div>
        </div>
                
           
    </body>
</html>
