<?php 
		include 'connection.php';
		$id = $_POST["id"];
		$name="";
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		if (isset($_POST['submit'])) {
				  $name=$_POST['name'];
				 if (!empty($name)) {
				 	$check=mysqli_escape_string($conn,$_POST['name']);
				$sql = "INSERT INTO subjects (subject_name,subject_workload_lectures,subject_workload_exercises) VALUES ('$_POST[name]','$_POST[lekcii]','$_POST[exer]')";
				 } else{
				 	echo "Prazno pole";
				 }
				
				
				}
			}

 ?>

