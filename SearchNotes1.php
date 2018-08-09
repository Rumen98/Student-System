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
                        <h2 class="pull-left">Student Details</h2>
 
                    </div>

               <?php
include 'connection.php';
$search_value=$_POST["search"];
if($conn->connect_error){
    echo 'Connection Faild: '.$conn->connect_error;
    }else{
        $sql="select * from students_assessments LEFT JOIN students on sa_student_id=student_id LEFT JOIN subjects on 	sa_subject_id=subject_id where student_fname like '%$search_value%' ";

        $res=$conn->query($sql);
       echo "<table class='table table-bordered table-striped'>";
       echo "<thead>";
            	echo "<tr>";
            		echo "<th>Име</th>";
            		echo "<th>Предмет</th>";
            		echo "<th>Оценка</th>";
            		echo "<th>Лекции(часове)</th>";
            		echo "<th>Упражнения(часове)</th>";
            	echo "</tr>";
         echo "</thead>";
                                echo "<tbody>";    		
        while($row=$res->fetch_assoc()){

        		echo "<tr>";
echo "<td>" . $row["student_fname"]. "   ". $row["student_lname"] ."</td>";
echo "<td>" . $row["subject_name"] . "</td>";
echo "<td>" . $row["sa_assesment"] . "</td>";
echo "<td>" . $row["sa_workload_lectures"] . "</td>";
echo "<td>" . $row["sa_workload_exercises"] . "</td>";


echo "<a href='FullNote.php?id=". $row['student_id'] ."' title='Средна Оценка' data-toggle='tooltip'><span class='glyphicon glyphicon-asterisk'></span></a>";
echo "</td>";
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