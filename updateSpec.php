<?php 
        include 'connection.php';
          error_reporting(E_ALL); 
        ini_set('display_errors', 1);
        $name = $short_name =  "";  
        $id=$_GET["id"];
        $sqlSpec="SELECT * FROM specialities WHERE speciality_id=$id";
        $resultSpec=mysqli_query($conn,$sqlSpec);
        $row=mysqli_fetch_array($resultSpec);
        $name=$row['speciality_name_long'];
        $short_name=$row['speciality_name_short'];
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['submit'])) {
            $name=$_POST['name'];
        $short_name=$_POST['short_name'];
            if (!empty($name)) {
               $sql = "UPDATE specialities SET speciality_name_long='$name' WHERE speciality_id=$id";
        $result=mysqli_query($conn,$sql);
            }else{
                echo "Blank field";
            }
            if (!empty($short_name)) {
               
                 $sql = "UPDATE specialities SET  speciality_name_short='$short_name' WHERE speciality_id=$id";
        $result=mysqli_query($conn,$sql);

            }else{
                echo "Blank field";
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
                            <label>Абревиатура</label>
                            <input type="text" name="short_name" class="form-control" value="<?php echo $short_name; ?>"></input>
                     
                        </div>
                      
                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input type="submit" name="submit" class="btn btn-primary" value="Submit">
                        <a href="specialnost.php" class="btn btn-default">Cancel</a>
                      
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>