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
			<h3>Admin Login</h3>
			<div id="center">
			<?php
               if(isset($_POST["submit"]))
			   {
			      $sql="SELECT * FROM admin where ANAME='{$_POST["aname"]}' and APASS='{$_POST["apass"]}'";
				  $res=$db->query($sql);
				  if($res->num_rows>0)
				  { $row=$res->fetch_assoc();
				    $_SESSION["AID"]=$row["AID"];
					$_SESSION["ANAME"]=$row["ANAME"];
					header("location:ahome.php");
				  }
				  else
				  {
					  echo "<p class='error'>Invalid User Details</p>";
				  }
				 
			   }
			?>
			<form action="alogin.php" method="post">
				<label>Name</label>
				<input type="text" name="aname" required>
				<label>Password</label>
				<input type="Password" name="apass" required>
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