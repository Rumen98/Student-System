

<?php 
		include 'connection.php';
		$name="";
		 $id = $_POST["id"];
		 if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		if (isset($_POST['submit'])) {
				 $name=$_POST['name'];
				if (!empty($name)) {
					$check=mysqli_escape_string($conn,$_POST['name']);
				$sql = "INSERT INTO students (student_fname,student_lname,student_fnumber) VALUES ('$_POST[name]','$_POST[lname]','$_POST[fnumber]')";
				}else{
					echo "PRazno pole";
				}
				
				}
			}

 ?>
















