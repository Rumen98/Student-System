<?php 
		include 'connection.php';
		$id = $_POST["id"];
		$name=$_POST['username'];
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		if (isset($_POST['submit'])) {
				if (!empty($name)) {
					  	$check=mysqli_escape_string($conn,$_POST['username']);
				$sql = "INSERT INTO Moderators (Username,Password) VALUES ('$_POST[username]','$_POST[password]')";
					  }	  else {
					  	echo "Prazno pole";
					  }
			
			
				}
			}
 ?>
