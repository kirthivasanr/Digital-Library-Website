<?php
session_start();
include "database.php";

{
    if(!isset($_SESSION["ID"]))
	header("location:ulogin.php");
}
?>


<!DOCTYPE HTML>
<html>
 <head>
  <title> Digital library </title>
  <link rel="stylesheet" type="text/css" href="css/style.css">
 </head>
  <body>
	<div id="container">
		<div id="header">
		<img  src="Css\logo.jpeg" alt="Library Logo" class="logo">
			<h1>Digital library</h1>
		</div>
		<div id="wrapper">
			<h3 id="heading">Change Password</h3>
			<div id="center">
			<?php
			 if(isset($_POST["submit"]))
			 {
				 $sql="SELECT * from student WHERE PASS='{$_POST["opass"]}' and AID='{$_SESSION["ID"]}'";
				 $res=$db->query($sql);
				 if($res->num_rows>0)
				 {
					$s="update student set PASS='{$_POST["npass"]}' WHERE ID=".$_SESSION["ID"];
					$db->query($s);
					echo "<p class='success'>Password Changed Succesfully</p>";
				 }
				 else
				 {
					echo "<p class='error'>Invalid Password</p>";
				 }
			 }
				 ?>
			<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
				<label>Old Password</label>
				<input type="password" name="opass" required >
				<label> New Password</label>
				<input type="password" name="npass" required >
				<button type="submit" name="submit">Update Password</button> 
			</form>
			
			</div>
		</div>
		<div id="navigation">
			<?php 
				include "userSidebar.php";
			?>
		</div>
		<div id="footer">
			<p>copyrights &copy; Digital library 2024 </p>
		</div>
	</div>
  
</html>
  </body>