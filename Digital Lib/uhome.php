
<?php
session_start();
include "database.php";

if (!isset($_SESSION["ID"]))

	{
    header("location:ulogin.php");
    exit(); 
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
			<h3 id="heading">Welcome <?php echo $_SESSION["NAME"]?></h3>
			
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
  
  </body>
</html>
