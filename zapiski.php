<?php 
			
			$servername = "localhost";
			$username = "root";
			$password = "1";
			$database = "students";

			$conn = new mysqli($servername,$username,$password,$database);
			mysqli_query($conn,"SET CHARACTER SET 'utf8'");
			mysqli_query($conn,"SET SESSION collation_connection ='utf8_unicode_ci'");

			if ($conn->connect_error){
				die("Connection failed" . $conn->connect_error);
			} else {
				echo "";
			}







 ?>


 //////////////////////////////


AddSTUD.php

 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
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
                        <h2>Create Record</h2>
                    </div>
                   
                    <form action="addStudLog.php" method="post">
                            
                            <label>Name</label>
                            <input type="text" name="name" placeholder="Type your name">
                            
                            <label>2nd Name</label>
                             <input type="text" name="lname" placeholder="Type your 2nd name">
                            
                            <label>F-number</label>
                            <input type="number" name="fnumber" placeholder="Type your F-number">
                            
                        </div>
                        <input type="submit" name="submit" class="btn btn-primary" value="Submit">
                        <a href="index.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>
?php 
		include 'connection.php';

		if (isset($_POST['submit'])) {
				$check=mysqli_escape_string($conn,$_POST['name']);
				$sql = "INSERT INTO students (student_fname,student_lname,student_fnumber) VALUES ('$_POST[name]','$_POST[lname]','$_POST[fnumber]')";
				if (mysqli_query($conn,$sql)) {
					echo "Added";
				}else{
					echo "666";
				}
				header("refresh:6 ; url=index.php");
				}

 ?>


///////////////////////////
Update.php 
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
                    <form action="updateLog.php" method="post">
                        <div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" value="<?php echo $name; ?>">
                            <span class="help-block"><?php echo $name_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($address_err)) ? 'has-error' : ''; ?>">
                            <label>2nd name</label>
                            <input type="text" name="lname" class="form-control"><?php echo $lname; ?></input>
                            <span class="help-block"><?php echo $lname_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($salary_err)) ? 'has-error' : ''; ?>">
                            <label>F-number</label>
                            <input type="text" name="fnumber" class="form-control" value="<?php echo $fnumber; ?>">
                            <span class="help-block"><?php echo $fnumber_err;?></span>
                        </div>
                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input type="submit" name="submit" class="btn btn-primary" value="Submit">
                        <a href="index.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>
<?php
// Include config file
require_once 'connection.php';
 
// Define variables and initialize with empty values
$name = $lname = $fnumber = "";
$name_err = $lname_err = $fnumber_err = "";
 
// Processing form data when form is submitted
if(isset($_POST["id"]) && !empty($_POST["id"])){
    // Get hidden input value
    $id = $_POST["id"];
 
    $name=$_POST['name'];
    $lname=$_POST['lname'];
    $fnumber=$_POST['fnumber'];
    
    
   
    
    // Check input errors before inserting in database
    if(empty($name_err) && empty($lname_err) && empty($fnumber_err)){
        // Prepare an update statement
        $sql = "UPDATE students SET name=student_fname,lname=student_lname, fnumber=student_fnumber WHERE id=student_id";
        
         
        if($stmt = mysqli_prepare($conn, $sql)){
            
            mysqli_stmt_bind_param($stmt, "ssii", $param_name, $param_lname, $param_fnumber, $param_id);
           
            // Set parameters
            $param_name = $name;
            $param_lname = $lname;
            $param_fnmuber = $fnumber;
            $param_id = $id;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
               echo "Updated ";
                header("location: index.php");
                exit();
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($conn);
} else{
    // Check existence of id parameter before processing further
    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
        
        $id =  trim($_GET["id"]);

        
        // Prepare a select statement
        $sql = "SELECT * FROM students WHERE id = '$_GET[id]'";
        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "i", $param_id);
            
            // Set parameters
            $param_id = $id;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);
    
                if(mysqli_num_rows($result) == 1){
                    /* Fetch result row as an associative array. Since the result set contains only one row, we don't need to use while loop */
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    
                    // Retrieve individual field value
                    $name = $row["name"];
                    $lname = $row["lname"];
                    $fnumber = $row["fnumber"];
                } else{
                    echo "Wrong ID";
                    header("location: index.php");
                    exit();
                }
                
            } else{
                echo " Please try again later.";
            }
        }
        
        // Close statement
        mysqli_stmt_close($stmt);
        
        // Close connection
        mysqli_close($conn);
    }  else{
        // URL doesn't contain id parameter. Redirect to error page
        echo "URL doesn't contain id parameter";
        
        exit();
    }
}
?>
///////////////////////////////

Read.php
<?php
// Check existence of id parameter before processing further


if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
// Include config file
require_once 'connection.php';

// Prepare a select statement


// Prepare a select statement
$sql = "SELECT * FROM students WHERE id = ?";
if($stmt = mysqli_prepare($conn, $sql)){
   

   
    $param_id = trim($_GET["id"]);
    mysqli_stmt_bind_param($stmt, "i", $param_id);

    // Attempt to execute the prepared statement
    if(mysqli_stmt_execute($stmt)){
        $result = mysqli_stmt_get_result($stmt);

        if(mysqli_num_rows($result) == 1){
            /* Fetch result row as an associative array. Since the result set contains only one row, we don't need to use while loop */
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

            // Retrieve individual field value
            $name = $row["name"];
            $lname = $row["lname"];
            $fnumber = $row["fnumber"];
        } else{
            // URL doesn't contain valid id parameter. Redirect to index page
            header("location: index.php");
            exit();
        }

    } else{
        echo "Oops! Something went wrong. Please try again later.";
    }
}

// Close statement
mysqli_stmt_close($stmt);

// Close connection
mysqli_close($conn);
} else{
// URL doesn't contain id parameter. Redirect to error page
header("location: index.php");
exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Record</title>
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
                        <h1>View Record</h1>
                    </div>
                    <div class="form-group">
                        <label>Name</label>
                        <p class="form-control-static"><?php echo $row["name"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>2nd Name</label>
                        <p class="form-control-static"><?php echo $row["lname"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>F-number</label>
                        <p class="form-control-static"><?php echo $row["fnumber"]; ?></p>
                    </div>
                    <p><a href="index.php" class="btn btn-primary">Back</a></p>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>
/////////////////////////////////////////////////////////////////////

SEARCH ENGINE 

<html>
 <head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    
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
<title>PHP, jQuery search demo</title>
<link rel="stylesheet" type="text/css" href="my.css">
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
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $("input").keyup(function () {
            $('#results').html('');
            var searchString = $("#search_box").val();
            var data = 'search_text=' + searchString;
            if (searchString) {
                $.ajax({
                    type: "POST",
                    url: 'search.php',
                    data: data,
                    dataType: 'text',
                    async: false,
                    cache: false,
                    success: function (result) {
                        $('#results').html(result);
                        //window.location.reload();

                    }
                });
            }
        });
    });
  </script>

 </head>
  <body>

 <div id="container">
 <div style="margin:20px auto; text-align: center;">
    <form method="post" action="Search.php">
        <input type="text" name="search" id="search_box" class='search_box'/>
        <input type="submit" value="Search" class="search_button"/><br/>
    </form>
</div>
<div>

    <div id="searchresults"></div>
    <ul id="results" class="update">
    </ul>

</div>
</div>
<div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <h2 class="pull-left">Student Details</h2>
                        <a href="addStud.php" class="btn btn-success pull-right">Add New Student</a>
                    </div>
                      <?php 
                      $search=$_POST['search'];
 $sql = "SELECT  student_fname,student_lname FROM students WHERE student_fname='$search' LIKE '%[^a-z]%'";
 if ($result = mysqli_query($conn, $sql)) {
  while($row = $result->fetch_assoc()) {
    echo "<table class='table table-bordered table-striped'>";
                                echo "<thead>";
                                    echo "<tr>";
                                    echo "<th>Name</th>";
                                     echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
   
      echo "<td>" . $row["student_fname"]. " " . $row["student_lname"]. "</td>";

   }


 
 }




$conn->close();
?> 

        </div>
            </div>        
        </div>
    </div>
</body>
</html>