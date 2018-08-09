<?php 
        include 'connection.php';
         session_start();
          
        $name = $lname = $fnumber = "";  
        $id=$_GET["id"];
        $sqlStud="SELECT * FROM students WHERE student_id=$id";
        $resultStud=mysqli_query($conn,$sqlStud);
        $row=mysqli_fetch_array($resultStud);
        $name=$row['student_fname'];
        $lname=$row['student_lname'];
        $fnumber=$row['student_fnumber'];
      
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['submit'])) {
            $name=$_POST['name'];
        $lname=$_POST['lname'];
        $fnumber=$_POST['fnumber'];


      
        if (!empty($name and $lname and $fnumber)) {
           $sql = "UPDATE students SET student_fname='$name', student_lname='$lname',student_fnumber='$fnumber' WHERE student_id=$id";
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

                            <label>Име</label>
                            <input type="text" name="name" class="form-control" value="<?php echo $name ; ?>">
                            
                        </div>
                        <div class="form-group ">
                            <label>Фамилия</label>
                            <input type="text" name="lname" class="form-control" value="<?php echo $lname; ?>"></input>
                     
                        </div>
                        <div class="form-group ">
                            <label>Факултетен Номер</label>
                            <input type="text" name="fnumber" class="form-control" value="<?php echo $fnumber; ?>">
                            
                        </div>
                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input type="submit" name="submit" class="btn btn-primary" value="Submit">
                        <a href="Students.php" class="btn btn-default">Cancel</a>
                        <button onclick="history.go(-1);">Back </button>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>