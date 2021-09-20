<?php 
session_start();
        
if(!isset($_SESSION['customer_login'])) 
    header('location:index.php');   
?>
<?php
                $cust_id=$_SESSION['cust_id'];
                include '_inc/dbconn.php';
                ?>

<!DOCTYPE html>
<html>
    <head>
        
        <meta charset="UTF-8">
        <title>Home - Online Banking</title>
        
        <link rel="stylesheet" href="newcss.css">
		<style>
		 .content_customer table,th,td {
    padding:6px;
    border: 1px solid #2E4372;
   border-collapse: collapse;
   text-align: center;
}
.content_customer td{
    padding:10px;
}
.head{
    
  text-align:center;
    color:#2E4372;
    font-weight:bold;
}

		</style>
    </head>
        <?php include 'cust_header.php' ?>
        <div class='content_customer'>
            
           <?php include 'customer_navbar.php'?>
            <div class="customer_top_nav">
             <div class="text">Welcome <?php echo $_SESSION['name']?></div>
            </div>
            
            <div class="customer_body">
                <div class="content1">
				<form action="changebank_process.php" method="POST">
				<select id="s_bank" name="s_bank" >
				<?php
					$q=mysqli_query($conn,"select name from staff");
					
					$num=mysqli_num_rows($q);
					while($num=mysqli_fetch_array($q,MYSQLI_BOTH))
					{
						echo "<option  value='" . $num['name'] ."' >" . $num['name'] ."</option>";
					}
				?></select>
			
       	<input type="submit" value="Select Bank"></input>
			<form>
			</div>
            <script>
			/*function givevalue()
			{
				//document.write(document.getElementById('opval').innerHTML);
	
				//document.write(document.getElementById('s_bank').value);
				document.getElementById('s_bank').value=document.getElementById('opval').value;
			}*/
			</script>
                
               
            
    </body>
</html>
<?php include 'footer.php';?>