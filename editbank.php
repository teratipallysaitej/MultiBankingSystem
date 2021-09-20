	<?php 
session_start();
        
if(!isset($_SESSION['admin_login'])) 
    header('location:adminlogin.php');   
?>
<!DOCTYPE html>
<?php
include '_inc/dbconn.php';
$id=  mysqli_real_escape_string($conn,$_REQUEST['staff_id']);
$sql="SELECT * FROM `staff` WHERE id=$id";
$result=  mysqli_query($conn,$sql) or die(mysqli_error($conn));
$rws=  mysqli_fetch_array($result,MYSQLI_BOTH);
?>
<?php
						$name=$rws["name"];
                        $delete_id=  mysqli_real_escape_string($conn,$_REQUEST['staff_id']);
                        if(isset($_REQUEST['submit2_id'])){
							
							$q=mysqli_query($conn,"select * from customer where `$name`!=0");
							$a=mysqli_num_rows($q);
							for($i=0;$i<$a;$i++)
							{
								$res=mysqli_fetch_array($q,MYSQLI_BOTH);
								$accno="passbook".$res["$name"];
								
								mysqli_query($conn,"drop table $accno;") or die(mysqli_error($conn));
							}
                            $sql_delete="DELETE FROM `staff` WHERE `id` = '$delete_id'";
							
                            mysqli_query($conn,$sql_delete) or die(mysqli_error($conn));
							
							mysqli_query($conn,"alter table customer drop column $name");
							
							mysqli_query($conn,"drop table beneficiary".$name );
							
								mysqli_query($conn,"drop table cheque_book".$name );
							mysqli_query($conn,"drop table atm".$name );
                            header('location:delete_bank.php');
                        }
                        ?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="newcss.css"/>
        <title>Bank editing</title>
    </head>
    <?php include 'header.php'; ?>
        <div class='content_addstaff'>
    <?php include 'admin_navbar.php'?>
                <div class='addstaff'>
                <form action="alter_bank.php" method="POST">
            <table align="center" >
                <input type="hidden" name="current_id" value="<?php echo $id;?>"/>
                <tr><td colspan='2' align='center' style='color:#2E4372;'><h3><u>Edit Bank Details</u></h3></td></tr>
                <tr>
                    <td>Bank name</td>
                    <td><input type="text" name="edit_name" value="<?php echo $rws[1];?>" required=""/></td>
                </tr>
                <tr>
                    <td>Address:</td>
                    <td><textarea name="edit_address"><?php echo $rws[2];?></textarea></td>
                </tr>
                
                    <td>Mobile</td>
                    <td><input type="text" name="edit_mobile" value="<?php echo $rws[3];?>" required=""/></td>
                </tr>
				<tr>
                    <td>IFSC Code</td>
                    <td><input type="text" name="edit_ifsc" required="" value="<?php echo $rws["ifsc"];?>"/></td>
                </tr>
                <tr>
                    <td>Email id</td>
                    <td><input type="text" name="edit_email" value="<?php echo $rws[4];?>" required=""/></td>
                </tr>
                
                <tr>
                    <td colspan="2" align='center' style='padding-top:20px'><input type="submit" name="alter" value="UPDATE DATA" class='addstaff_button'/></td>
                </tr>
            </table>
        </form>
                
                
                </div>
                </div>
    </body>
</html>
