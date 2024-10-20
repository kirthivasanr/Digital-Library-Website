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
			<h3 id="heading">Send Your Comments</h3>
			<?php
			$sql="select * from book where BID=".$_GET["id"];
			$res=$db->query($sql);
			if($res->num_rows>0)
			{
				echo "<table>";
				$row=$res->fetch_assoc();
				echo"
				<tr>
					<th>Book Name</th>
					<td>{$row["BTITLE"]}</td>
				</tr>
				<tr>
					<th>Keywords</th>
					<td>{$row["KEYWORDS"]}</td>
				</tr>
				";
				echo "</table>";
			}
			else{
				echo"<p class='error'>No Books Found</p>";
			}
			
			?>
			<div id="center">
			<form>
			<label>Your comments</label>
			<textarea name="msg" required></textarea>
			<button type="submit" name="submit">Post Now</button> 
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