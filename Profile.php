<?php 

  include 'connection.php';
  echo "Welcome," . $_SESSION['username'];
	$email=$_SESSION['username'];


 ?>



<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
    <style type="text/css">
        .wrapper{
            width: 650px;
            margin: 0 auto;
        }
        .page-header h2{
            margin-top: 0;
        }
        table tr td:last-child a{
            margin-right: 15px;
        }
    </style>
    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <h2 class="pull-left">Student Notes Details</h2>
 
                    </div>

               <?php




if($conn->connect_error){
    echo 'Connection Faild: '.$conn->connect_error;
    }else{
        $sql="SELECT * from students LEFT JOIN specialities on  student_speciality_id= speciality_id LEFT JOIN courses on  student_course_id=course_id WHERE student_email LIKE '$email'";
            
        $res=$conn->query($sql);
       echo "<table class='table table-bordered table-striped'>";
       echo "<thead>";
            	echo "<tr>";
                    echo "<th>#</th>";
            		echo "<th>Име</th>";
            		echo "<th>Факултетен Номер</th>";
            		echo "<th>Форма на Обучение</th>";
            		echo "<th>Специалност</th>";
                    echo "<th>Курс</th>";
                    echo "<th>Оценки</th>";


            		
            	echo "</tr>";
         echo "</thead>";
                                echo "<tbody>";    		
        while($row=$res->fetch_assoc()){

        		echo "<tr>";
echo "<td>" . $row["student_id"] . "</td>";
echo "<td>" . $row["student_fname"]. "   ". $row["student_lname"] ."</td>";
echo "<td>" . $row["student_fnumber"] . "</td>";
echo "<td>" . $row["student_education_form"] . "</td>";
echo "<td>" . $row["speciality_name_long"] . "</td>";
echo "<td>" . $row["course_name"] . "</td>";
echo "<td>";
echo "<a href='Notes1.php?id=". $row['student_id'] ."' title=' Оценки' data-toggle='tooltip'><span class='glyphicon glyphicon-asterisk'></span></a>";
echo "</td>";
echo "</tr>";


            }       

        }
         echo "</tbody>";                            
          echo "</table>";


          mysqli_free_result($res);                   
?>
    <button onclick="history.go(-1);">Back </button>
                     </div>
            </div>        
        </div>
    </div>
</body>
</html>