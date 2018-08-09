<?php 
		include 'connection.php';
		$id = $_POST["id"];
		$name=$lname=$fnumber="";
		 if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		if (isset($_POST['submit'])) {
				$name=$_POST['name'];
				$lname=$_POST['lname'];
				$fnumber=$_POST['fnumber'];
				if (!empty($name)) {
				$check=mysqli_escape_string($conn,$_POST['name']);
				$sql = "INSERT INTO students (student_fname,student_lname,student_fnumber) VALUES ('$_POST[name]','$_POST[lname]','$_POST[fnumber]') WHERE student_id=$id";
				} else{
					echo "Prazno pole";
				}
				}
			}
 ?>
