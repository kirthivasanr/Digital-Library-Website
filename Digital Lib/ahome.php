
<?php
session_start();
include "database.php";

function countRecord($sql, $db) {
    $res = $db->query($sql);
    return $res->num_rows;
}


if (!isset($_SESSION["AID"])) {
    header("location:login.php");
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
			<h3 id="heading">Welcome Admin</h3>
			<div id="center">
				<ul class="record">
					<li>Total Students:	<?php echo countRecord("select * from student",$db);?></li>
					<li>Total Books   :	<?php echo countRecord("select * from book",$db);?></li>
					<li>Total Request :	<?php echo countRecord("select * from request",$db);?></li>
					<li>Total Comments:	<?php echo countRecord("select * from comment",$db);?></li>
					
				</ul>
			</div>
		</div>
		<div id="navigation">
			<?php 
				include "adminSidebar.php";
			?>
		</div>
		<div id="footer">
			<p>copyrights &copy; Digital library 2024 </p>
		</div>
	</div>
  
  </body>
</html>
