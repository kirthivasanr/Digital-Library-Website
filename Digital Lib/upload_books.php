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
			<h3 id="heading">Upload New Books</h3>
			<div id="center">
			<?php
			if (isset($_POST["submit"])) {
			$target_dir = "upload/";
			$target_file = $target_dir . basename($_FILES["efile"]["name"]);
			$fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

			
			$allowedFileTypes = array("pdf", "jpg", "jpeg", "png", "doc", "docx", "txt");

		
				if (in_array($fileType, $allowedFileTypes)) {

					if (move_uploaded_file($_FILES["efile"]["tmp_name"], $target_file)) {
						$sql = "INSERT INTO book (BTITLE, KEYWORDS, FILE) VALUES 
								('{$_POST["bname"]}', '{$_POST["keys"]}', '{$target_file}')";
						$db->query($sql);
						echo "<p class='success'>Uploaded Successfully</p>";
					} else {
						echo "<p class='error'>Error in the Upload, Try again!</p>";
					}
				} else {
					echo "<p class='error'>Invalid file type. Only PDF, image, and document files are allowed.</p>";
				}
			}
			?>

			<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post" enctype="multipart/form-data"> 
				<label>Book Title</label>
				<input type="text" name="bname" required >
				<label>Keyword</label>
				<textarea name="keys" required></textarea>
				<label>Upload File</label>
				<input type="file" name="efile" accept=".pdf,.jpg,.jpeg,.png,.doc,.text"required >
				<button type="submit" name="submit">Upload Book</button> 
			</form>
			
			</div>
		</div>
		<div id="navigation">
			<?php 
				include "adminSidebar.php";
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