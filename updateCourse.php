<?php 
        include 'connection.php';
          error_reporting(E_ALL); 
        ini_set('display_errors', 1);
        $name = "";  
        $id=$_GET["id"];
        $sqlHid="SELECT * FROM courses WHERE course_id=$id";
        $result2=mysqli_query($conn,$sqlHid);
        $row = mysqli_fetch_array($result2);
        $name=$row['course_name'];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
       
        if (isset($_POST['submit'])) {
            $name=$_POST['name'];
           if (!empty($name)) {
               $sql = "UPDATE courses SET course_name='$name' WHERE course_id=$id";
        $result=mysqli_query($conn,$sql);
        header("Location : /index.php"); die();
           } else {
            echo "The field is blank";
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
                            <input type="text" name="name" class="form-control" value="<?php echo $name; ?>">
                            
                        </div>
                       
                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input type="submit" name="submit" class="btn btn-primary" value="Submit">
                        <a href="Courses.php" class="btn btn-default">Cancel</a>
                        <button onclick="history.go(-1);">Back </button>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>