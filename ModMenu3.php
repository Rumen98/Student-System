<?php 
  session_start();
  include 'connection.php';
  echo "Welcome," . $_SESSION['username'];
 




 ?>



<html>
<head>
<style>
ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    width: 200px;
    background-color: #f1f1f1;
}

li a {
    display: block;
    color: #000;
    padding: 8px 16px;
    text-decoration: none;
}


li a:hover {
    background-color: #555;
    color: white;
}
</style>
</head>
<body>

<h2>Student Menu</h2>

<ul>

  <li><a href="Profile.php">My Information</a></li>
  <li><a href="logout.php">Exit</a></li>
</ul>

</body>
</html>
