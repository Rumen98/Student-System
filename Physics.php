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
    <form action="?php echo $_SERVER['PHP_SELF']; ?>" method="post">
<input type="text" name="search">

<input type="submit" name="submit" value="Search">
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
   
        if (isset($_GET['pageno'])) {
            $pageno = $_GET['pageno'];
        } else {
            $pageno = 1;
        }
        $no_of_records_per_page = 20;
        $offset = ($pageno-1) * $no_of_records_per_page;
        $total_pages_sql = "SELECT COUNT(*) FROM students";
        $result = mysqli_query($conn,$total_pages_sql);
        $total_rows = mysqli_fetch_array($result)[0];
        $total_pages = ceil($total_rows / $no_of_records_per_page);
        
     
        $sql="select * from students_assessments LEFT JOIN students on sa_student_id=student_id LEFT JOIN subjects on sa_subject_id=subject_id where student_fname like '%$search_value%' AND sa_subject_id=3 LIMIT $offset, $no_of_records_per_page ";
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
        echo "<td>";
        echo "<a href='updateNote.php?id=". $row['student_id'] ."' title='Update Record' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>";
        echo "<td>";
        echo "<a href='deleteNote.php?id=". $row['student_id'] ."' title='Delete Record' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>";
        echo "<td>";
        echo "<a href='FullNote.php?id=". $row['student_id'] ."' title='Средна Оценка' data-toggle='tooltip'><span class='glyphicon glyphicon-asterisk'></span></a>";
        echo "</td>";
        echo "</tr>";
            }       
        
         echo "</tbody>";                            
         echo "</table>";
         mysqli_free_result($res);                   
?>
                     </div>
            </div>        
        </div>
    </div>
</div>
    </body>
    <ul class="pagination">
        <li><a href="?pageno=1">First</a></li>
        <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
            <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>">Prev</a>
        </li>
        <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
            <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>">Next</a>
        </li>
        <li><a href="?pageno=<?php echo $total_pages; ?>">Last</a></li>
       
    </ul>
</body>
</html>