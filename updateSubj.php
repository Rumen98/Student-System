<?php 
        include 'connection.php';
         $name = $exers = $lekcii= "";  
        $id=$_GET["id"];
        $sqlSubj="SELECT * FROM subjects WHERE subject_id=$id";
        $resultSubj=mysqli_query($conn,$sqlSubj);
        $row=mysqli_fetch_array($resultSubj);
        $name=$row['subject_name'];
        $exers=$row['subject_workload_exercises'];
        $lekcii=$row['subject_workload_lectures'];
 if ($_SERVER['REQUEST_METHOD'] === 'POST') {

       

       
        if (isset($_POST['submit'])) {
                    $name=$_POST['name'];
        $exers=$_POST['exers'];
        $lekcii=$_POST['lekcii'];
            if (!empty($name and $exers and $lekcii)) {
                $sql = "UPDATE subjects SET subject_name='$name', subject_workload_exercises='$exers' ,subject_workload_lectures='$lekcii' WHERE subject_id=$id";
        $result=mysqli_query($conn,$sql);
            }else{
                echo "Prazno pole";
            }
            
           
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
                            <label>Пълно Име</label>
                            <input type="text" name="name" class="form-control" value="<?php echo $name; ?>">
                            
                        </div>
                        <div class="form-group ">
                            <label>Хорариум Упражнения</label>
                            <input type="number" name="exers" class="form-control" value="<?php echo $exers; ?>"></input>
                     
                        </div>
                          <div class="form-group ">
                            <label>Хорариум Лекции</label>
                            <input type="number" name="lekcii" class="form-control" value="<?php echo $lekcii ; ?>"></input>
                     
                        </div>
                      
                        <input type="hidden" name="id" value=""/>
                        <input type="submit" name="submit" class="btn btn-primary" value="Submit">
                        <a href="Subjects.php" class="btn btn-default">Cancel</a>
                        <button onclick="history.go(-1);">Back </button>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>