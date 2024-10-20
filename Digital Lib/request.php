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
			<h3 id="heading">New Book Request</h3>
			<div id="center">
			<?php
			 if(isset($_POST["submit"]))
			 {
				 $sql="insert into request (ID,MES,LOGS) values ({$_SESSION["ID"]},'{$_POST["msg"]}',now())"; 
				 $db->query($sql);
				 	echo "<p class='success'>Request Sent  Succesfully</p>";
				 }
				 
			 
				 ?>
			<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
				<label>Message</label>
				<textarea required name="msg"></textarea>
				<button type="submit" name="submit">Request</button> 
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