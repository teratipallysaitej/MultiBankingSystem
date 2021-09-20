<?php 
session_start();
        
if(!isset($_SESSION['staff_login'])) 
    header('location:banklogin.php');   
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Add Customer</title>
        
        <link rel="stylesheet" href="newcss.css">
    </head>
<?php include 'header.php'; ?>
<div class='content_addstaff'>
    <?php include 'bank_navbar.php'?>
            <div class='addstaff'>

<form action="add_customer.php" method="POST">
            <table align="center">
                <tr><td colspan='2' align='center' style='color:#2E4372;'><h3><u>Add Customer</u></h3></td></tr>
                <tr>
                    <td> Customer's name</td>
                    <td><input type="text" name="customer_name" required=""/></td>
                </tr>
                <tr>
                    <td>Gender</td>
                    <td>
                        M<input type="radio" name="customer_gender" value="M" checked/>
                        F<input type="radio" name="customer_gender" value="F" />
                    </td>
                </tr>
                <tr>
                    <td>
                        DOB
                    </td>
                    <td>
                        <input type="date" name="customer_dob" required=""/>
                    </td>
                </tr>
               
                <tr>
                    <td>Deposit amount</td>
                    <td><input type="text" name="initial" value="1000" min="1000" required=""/></td>
                </tr>
                
                <tr>
                    <td>Address:</td>
                    <td><textarea name="customer_address" required=""></textarea></td>
                </tr>
                <tr>
                    <td>Mobile</td>
                    <td><input type="text" name="customer_mobile" required=""/></td>
                </tr>

                <tr>
                    <td>Email id</td>
                    <td><input type="email" name="customer_email" required=""/></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="password" name="customer_pwd" required=""/></td>
                </tr>
                <tr>
                    <td colspan="2" align='center' style='padding-top:20px'><input type="submit" onclick="Validate()" name="add_customer" value="Add Customer" class="addstaff_button"/></td>
                </tr>
            </table>
            </div>
    </div>
        </form>
<script>
function Validate()
mail=document.getElementById("email");   
{  
 if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(mail))  
  {  
     
  }else{  
    alert("You have entered an invalid email address!")  
    }
phone= document.getElementById("customer_mobile");   
var error = "";
    var stripped = phone.replace(/[\(\)\.\-\ ]/g, '');

   if (stripped == "") {
        error = "You didn't enter a phone number.";
    } else if (isNaN(parseInt(stripped))) {
        phone = "";
        error = "The phone number contains illegal characters.";

    } else if (!(stripped.length == 10)) {
        phone = "";
        error = "The phone number is the wrong length. Make sure you included an area code.\n";
    }
}  
   </script>
<?php include 'footer.php';?>
    </body>
</html>