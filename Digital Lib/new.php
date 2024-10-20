<?php
include "database.php";
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
			<h3 id="heading">New User Registration</h3>
			<div id="center">
			<?php
			 if(isset($_POST["submit"]))
			 {
				
					$sql="insert into student(NAME,PASS,MAIL,DEP) values('{$_POST["name"]}','{$_POST["pass"]}','{$_POST["mail"]}','{$_POST["dept"]}')";
					$db->query($sql);
					echo "<p class='success'>Successfully Registered</p>";
			 }
		
			?>
			<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post"> 
				<label>Name</label>
				<input type="text" name="name" required >
				<label>Password</label>
				<input type="text" name="pass" required >
				<label>Email ID</label>
				<input type="email" name="mail" required >
				<label>Department</label>
				<input type="text" name="dept" required >
				<button type="submit" name="submit">Register Now</button> 
			</form>
			
			</div>
		</div>
		<div id="navigation">
			<?php 
				include "Sidebar.php";
			?>
		</div>
		<div id="footer">
			<center>
			<p>copyrights &copy; Digital library 2024 </p>
			</center>
		</div>
	</div>
  
  </body>
</html>