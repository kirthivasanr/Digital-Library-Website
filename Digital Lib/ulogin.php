<?php
session_start();
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
			<h3>User Login</h3>
			<div id="center">
			<?php
               if(isset($_POST["submit"]))
			   {
			      $sql="SELECT * FROM student where NAME='{$_POST["name"]}' and PASS='{$_POST["pass"]}'";
				  $res=$db->query($sql);
				  if($res->num_rows>0)
				  { $row=$res->fetch_assoc();
				    $_SESSION["ID"]=$row["ID"];
					$_SESSION["NAME"]=$row["NAME"];
					header("location:uhome.php");
				  }
				  else
				  {
					  echo "<p class='error'>Invalid User Details</p>";
				  }
				 
			   }
			?>
			<form action="ulogin.php" method="post">
				<label>Name</label>
				<input type="text" name="name" required>
				<label>Password</label>
				<input type="Password" name="pass" required>
				<button type="submit" name="submit">Login</button>
			</form>
			</div>
		</div>
		<div id="navigation">
			<?php 
				include "sideBar.php";
			?>
		</div>
		<div id="footer">
			<p>copyrights &copy; Digital library 2024 </p>
		</div>
	</div>
  
  </body>
</html>