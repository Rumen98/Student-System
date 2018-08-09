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
                    <p></p>
                    <form action="addSpecLog.php" method="post">
                        <div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
                            <label>Пълно Име</label>
                            <input type="text" name="name" class="form-control" value="<?php echo $name; ?>">
                            <span class="help-block"><?php echo $name_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($address_err)) ? 'has-error' : ''; ?>">
                            <label>Абревиатура</label>
                            <textarea name="short_name" class="form-control"><?php echo $short_name; ?></textarea>
                            <span class="help-block"><?php echo $lname_err;?></span>
                        </div>
                        
                        <input type="submit" name="submit" class="btn btn-primary" value="Submit">
                        <a href="specialnost.php" class="btn btn-default">Cancel</a>
                        <button onclick="history.go(-1);">Back </button>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>