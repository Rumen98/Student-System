   $pageno = 1;
        }
        $no_of_records_per_page = 10;
        $offset = ($pageno-1) * $no_of_records_per_page;
        $total_pages_sql = "SELECT COUNT(*) FROM students";
        $result = mysqli_query($conn,$total_pages_sql);
        $total_rows = mysqli_fetch_array($result)[0];
        $total_pages = ceil($total_rows / $no_of_records_per_page);
        $sql="select * from students_assessments LEFT JOIN students on sa_student_id=student_id LEFT JOIN subjects on sa_subject_id=subject_id where student_fname like '%$search_value%' LIMIT $offset, $no_of_records_per_page ";
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