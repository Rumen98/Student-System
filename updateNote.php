
<?php 

        include 'connection.php';
          
        $ocenka=$lekcii=$uprajneniq = "";  
        $id=$_GET["id"];
        $sqlHidden="SELECT * FROM students_assessments LEFT JOIN students on sa_student_id=student_id LEFT JOIN subjects on sa_subject_id=subject_id where student_id=$id";
         $result1=mysqli_query($conn,$sqlHidden);
        $row = mysqli_fetch_array($result1);
        $ocenka = $row['sa_assesment'];
        $lekcii=$row['sa_workload_lectures'];
        $uprajneniq=$row['sa_workload_exercises'];
        
         if ($_SERVER['REQUEST_METHOD'] === 'POST') {
         
        if (isset($_POST['submit'])) {
            $ocenka=$_POST['ocenka'];
        $lekcii=$_POST['lekcii'];
        $uprajneniq=$_POST['uprajneniq'];  
            if (!empty($ocenka)) {
              $sql = "UPDATE students_assessments SET sa_assesment='$ocenka' WHERE sa_student_id=$id";

        $result=mysqli_query($conn,$sql);
        echo "Updated";
        header(" Location : /index.php"); 

            }else{
                echo "Not updated because the field 'ocenka' is empty" . "<br>";
            }
             if (!empty($lekcii)) {
              $sql = "UPDATE students_assessments SET sa_workload_lectures='$lekcii' WHERE sa_student_id=$id";

        $result=mysqli_query($conn,$sql);
        echo "Updated";
        header(" Location : /index.php"); 

            }else{
                echo "Not updated because the field 'lekcii' is empty". "<br>";
            }
             if (!empty($uprajneniq)) {
              $sql = "UPDATE students_assessments SET sa_workload_exercises='$uprajneniq' WHERE sa_student_id=$id";

        $result=mysqli_query($conn,$sql);
        echo "Updated";
      

            }else{
                echo "Not updated because the field 'uprajneniq' is empty". "<br>";
            }
            
           
        }

        if (!empty($result)) {
             header(" Location : /index.php"); 
        }

       
}
   

 
?>

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
                    <div class="page-header">
                        <h2>Update Record</h2>
                    </div>
                    <p>Please edit the input values and submit to update the record.</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                        <div class="form-group ">
                            <label>Оценка</label>
                            <input type="number" name="ocenka" class="form-control" value="<?php echo $ocenka; ?>">
                        </div>
                         <div class="form-group ">
                            <label>Лекции</label>
                            <input type="number" name="lekcii" class="form-control" value="<?php echo $lekcii; ?>">
                        </div>
                         <div class="form-group ">
                            <label>Упражнения</label>
                            <input type="number" name="uprajneniq" class="form-control" value="<?php echo $uprajneniq; ?>">
                        </div>
                      
                      
                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input type="submit" name="submit" class="btn btn-primary" value="Submit">
                        <a href="ModMenu.php" class="btn btn-default">Cancel</a>
                        <button onclick="history.go(-1);">Back </button>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>