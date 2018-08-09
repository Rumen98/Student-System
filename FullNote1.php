<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Record</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <h2 class="pull-left">Student Details</h2>
 
                    </div>

               <?php
include 'connection.php';
	$fullnote=$maths=$info=$fizika=" ";
	$id=$_GET['id'];
if($conn->connect_error){
    echo 'Connection Faild: '.$conn->connect_error;
    }else{
       $sql="select * from students_assessments LEFT JOIN students on sa_student_id=student_id LEFT JOIN subjects on 	sa_subject_id=subject_id where sa_student_id=$id ";
       $sql1="SELECT AVG(sa_assesment) as total FROM students_assessments where sa_student_id=$id";



        $res=$conn->query($sql);
        $res1=$conn->query($sql1);
       echo "<table class='table table-bordered table-striped'>";
       echo "<thead>";
            	echo "<tr>";
            		
            		echo "<th>Предмет</th>";
            		echo "<th>Оценка</th>";

            	echo "</tr>";
         echo "</thead>";
         echo "<tbody>";    		
        while($row=$res->fetch_assoc()){

        		echo "<tr>";

echo "<td>" . $row["subject_name"] . "</td>";
echo "<td>" . $row["sa_assesment"] . "</td>";
		while ($rows=$res1->fetch_assoc()) {
			echo "<tr>";
			echo 'Средната ви оценка е : ' . $rows['total'];
		}




echo "</tr>";


            }       

        }
         echo "</tbody>";                            
          echo "</table>";
          mysqli_free_result($res);                   
?>
                     </div>
            </div>        
        </div>
    </div>
</body>
</html>
