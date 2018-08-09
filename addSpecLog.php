<?php 
		include 'connection.php';
		$id = $_POST["id"];
		$name="";
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		if (isset($_POST['submit'])) {
				 $name=$_POST['name'];
				 $sname=$_POST['short_name'];
				$check=mysqli_escape_string($conn,$_POST['name']);
				$sql = "INSERT INTO specialities (speciality_name_long,speciality_name_short) VALUES ('$_POST[name]','$_POST[short_name]')";
				if (!empty($name)) {
					$check=mysqli_escape_string($conn,$_POST['name']);
					$sql = "INSERT INTO specialities (speciality_name_long) VALUES ('$_POST[name]')";

				} elseif (!empty($sname)) {
					$check=mysqli_escape_string($conn,$_POST['short_name']);
					$sql = "INSERT INTO specialities (speciality_name_short) VALUES ('$_POST[short_name]')";

				} else {
					echo "PRazni poleta";
				}
				
				}
			}
 ?>



