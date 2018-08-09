<?php 
	include 'connection.php';




 ?>


<html>
<head>
	  <meta charset="UTF-8">
	<title>Добавяне на Учител</title>
</head>
<body>
	<form action="addTeachLog.php" method="post">
		Username:<input type="text" name="username"></input>
		Password:<input type="password" name="password"></input>
		
		<input type="submit" name="submit" value="Добави">
	</form>
</body>
</html>