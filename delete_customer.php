<?php 
session_start();
        
if(!isset($_SESSION['staff_login'])) 
    header('location:banklogin.php');   
?>
<!DOCTYPE html>
<?php
include '_inc/dbconn.php';
$bank=$_SESSION["staff_id"];
$n=mysqli_query($conn,"select name from staff where id='$bank'");
$a= mysqli_fetch_array($n,MYSQLI_BOTH);
$bank_name=$a["name"];

$sql="SELECT * FROM `customer` where `$bank_name`!=0";
$result=  mysqli_query($conn,$sql) or die(mysqli_error($conn));
$sql_min="SELECT MIN(id) from customer";
$result_min=  mysqli_query($conn,$sql_min);
$rws_min=  mysqli_fetch_array($result_min,MYSQLI_BOTH);
?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="newcss.css"/>
        <style>
            .displaystaff_content table,th,td {
    padding:6px;
    border: 1px solid #2E4372;
   border-collapse: collapse;
   text-align: center;
}

        </style>

        <title>Delete Customer</title>
    </head>
    <?php include 'header.php'?>
        
                <div class="displaystaff_content">
                    <?php include 'bank_navbar.php'?>
					
                <form action="editcustomer.php" method="POST">
            
                    <table align="center">
                        <th>id</th>
                        <th>name</th>
                        <th>gender</th>
                        <th>DOB</th>
                        
                        <th>address</th>
                        <th>mobile</th>
                        <th>email</th>
                        <?php
                        while($rws=  mysqli_fetch_array($result,MYSQLI_BOTH)){
                            echo "<tr><td><input type='radio' name='customer_id' value=".$rws[0];
                            if($rws[0]==$rws_min[0]) echo' checked';
                            echo " /></td>";
                            echo "<td>".$rws[1]."</td>";
                            echo "<td>".$rws[2]."</td>";
                            echo "<td>".$rws[3]."</td>";
                           
                            echo "<td>".$rws["address"]."</td>";
                            echo "<td>".$rws["mobile"]."</td>";
                            echo "<td>".$rws["email"]."</td>";
                            echo "</tr>";
                        }
                        ?>
                        
                    </table>
                    <table align="center">
                        <tr>
                            <td>
                                <input type="submit" name="submit2_id" value="DELETE CUSTOMER DETAILS" class='addstaff_button'/>
                            </td>
                        </tr>
                    </table>
                </form>

            
                </div>
                
                
                
         <?php include 'footer.php'?>
     
    </body>
</html>
