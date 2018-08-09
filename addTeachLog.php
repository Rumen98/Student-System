<?php 
		include 'connection.php';
		  $id = $_POST["id"];
			$name="";
			if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		if (isset($_POST['submit'])) {
				  $name=$_POST['username'];
				  if (!empty($name)) {
				  	$check=mysqli_escape_string($conn,$_POST['username']);
				$sql = "INSERT INTO Teachers (Username,Password) VALUES ('$_POST[username]','$_POST[password]')";
				  } else{
				  	echo "Prazni poleta";
				  }
				
				
				}
			}
 ?>
