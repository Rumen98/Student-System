<html>
<head>
	<title>Admin System v.1.1</title>
	<style type="text/css">
.element {
  animation: pulse 1s infinite;
}

@keyframes pulse {
  50% {
    background-color: #001F3F;
  }
  100% {
    background-color: #FF4136;
  }
}
	body {
    background-color:grey ;

}
div {
    padding-top:320px;  
    padding-bottom: 70px;
    padding-left:750px;

}
form {
	width: 160px;
	height: 100px;
	 border-style: solid;
    border-width: 2px;
}
a:hover {
  color: green;
  text-decoration: underline overline;
}



	</style>
</head>
<body>
	
				<div class="element">
					<h1>Admin System v.1.1</h1>
					<form action="LoginSystem.php" class="forma" method="post">
							Username:<input type="text" name="username" placeholder="Enter your username.." >
								<br>
							Password:<input type="password" name="password" placeholder="Enter your password ..">
								<br>
							<input type="submit" name="submit" value="Влез">

					</form>

					<a href="ModLogin.php">Login for Moderators</a>
					<a href="TeachLogin.php">Login for Teachers</a>
					<a href="StudLogin.php">Login for Students</a>
		

					
				</div>
				
</body>
</html>