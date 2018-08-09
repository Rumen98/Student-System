<?php 
		include 'connection.php';
		$name=" ";
		$id = $_POST["id"];
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		if (isset($_POST['submit'])) {
				 $name=$_POST['name'];
				if (!empty($name)) {
					$check=mysqli_escape_string($conn,$_POST['name']);

				$sql = "INSERT INTO courses (course_name) VALUES ('$_POST[name]')";
				header("Location: addCourse.php");
				}else{
					echo "Prazno pole";
				
				}
				
				
				}
			}

 ?>

