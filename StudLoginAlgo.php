<?php 

 session_start();
 require('connection.php');
 if ($_SERVER['REQUEST_METHOD'] === 'POST') {
 $_SESSION['username'] = $_POST['username'];

$_SESSION['password'] = $_POST['password'];

if (isset($_POST['username']) and isset($_POST['password'])){
	
$username = $_POST['username'];
$password = $_POST['password'];



$query = "SELECT * FROM `students` WHERE student_email='$username' and student_fnumber='$password'";
 
$result = mysqli_query($conn, $query) or die(mysqli_error($conn));




$count = mysqli_num_rows($result);

if ($count == 1){

		

echo "<script type='text/javascript'>alert('Login Credentials verified')</script>";


header('Location: ModMenu3.php');

}else{
echo "<script type='text/javascript'>alert('Invalid Login Credentials')</script>";
header("refresh:1 ; url=StudLogin.php");
}
}
}
?>

