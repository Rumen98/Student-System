<html>
<head>
	<title>Moderator System v.1.1</title>
	<style type="text/css">
	body {
    background-color: lightblue ;

}
div {
    padding-top:200px;  
    padding-bottom: 70px;
    padding-left:750px;

}
form {
	width: 160px;
	height: 100px;
	 border-style: solid;
    border-width: 2px;
}

	</style>
</head>
<body>
	
				<div>
					<h1>Moderator System v.1.1</h1>
					<form action="ModLoginAlgo.php" class="forma" method="post">
							Username:<input type="text" name="username" placeholder="Enter your username.." >
								<br>
							Password:<input type="password" name="password" placeholder="Enter your password ..">
								<br>
							<input type="submit" name="submit" value="Влез">

					</form>

					<a href="ModLogin.php">Login for Moderators</a>
				</div>
				
</body>
</html>