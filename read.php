<?php

include 'connection.php';


error_reporting(E_ALL); 
ini_set('display_errors', 1);
$id=$_GET["id"];

$sql = "SELECT *  FROM students LEFT JOIN specialities on student_speciality_id=speciality_id LEFT JOIN courses on  student_course_id=course_id WHERE student_id = $id ";

$result=mysqli_query($conn,$sql);
    if (mysqli_query($conn,$sql)) {
        
    }else{
        echo "ne";
    }


      
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Record</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="container" style="width: 700px;">
 <h3 align="">Информация</h3>
 <div class="table-resposive">
 <table class="table table-resposive" border="2">
 <tr>
 
 <th>Име</th>
 <th>Фамилия</th>
 <th>Факултетен Номер</th>
 <th>Имейл</th>
 <th>Форма на Обучение</th>
 <th>Специалност</th>
 <th>Курс</th>
 
 
 
 </tr>

 <?php 
 if (mysqli_num_rows($result) > 0) {
 while ($row = mysqli_fetch_array($result)) {
 ?> 
 <tr>
  
 <td><?php echo $row["student_fname"]; ?></td>
 <td><?php echo $row["student_lname"] ?></td>
 <td><?php echo $row["student_fnumber"]; ?></td>
 <td><?php echo $row["student_email"]; ?></td>
 <td><?php echo $row["student_education_form"]; ?></td>
 <td><?php echo $row["speciality_name_long"]; ?>  </td>
 <td><?php echo $row["course_name"] ; ?></td>
 
  

 
 </tr>

 <?php 
 }
 }
 ?>
 </table>
 </div>
</body>
</html>