<?php
session_start();
include "database.php";

{
    if(!isset($_SESSION["AID"]))
	header("location:login.php");
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
			<h3 id="heading">Request Details</h3>
			
			<?php
				$sql="SELECT STUDENT.NAME,REQUEST.MES,REQUEST.ID,REQUEST.LOGS FROM STUDENT INNER JOIN REQUEST ON STUDENT.ID=REQUEST.ID";
				$res=$db->query("$sql");
				if($res->num_rows>0)
				{
					echo "<table>
					<tr>
						<th>SNO</th>
						<th>NAME</th>
						<th>MESSAGE</th>
						<th>LOGS</th>
						
					</tr>";
						$i=0;
					while ($row=$res->fetch_assoc())
					{
						$i++;
						echo "<tr>";
						echo "<td>{$i}</td>";
						echo "<td>{$row["NAME"]}</td>";
						echo "<td>{$row["MES"]}</td>";
						echo "<td>{$row["LOGS"]}</td>";
						echo "</tr>";
					}
					echo "</table>";
				}
				else{
						echo "<p class='error'>No Request Records Found</p>";
				    }
			?>
				
			
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