<?php
    session_start();
    if(!isset($_SESSION['uid']) && !isset($_SESSION['name'])){
        header("location: index.php");
    }
?>
<!DOCTYPE html> 
<html class="no-js"> 
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Shopping Cart</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/style.css">
        <style>
            table tr td {
                padding: 8px;
            }
        </style>
    </head>
    <body>
        
        <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a href="#" class="navbar-brand">MyStore</a>
                </div>
                <ul class="nav navbar-nav">
                    <li><a href="index.php"><span class="glyphicon glyphicon-home"></span>Home</a></li>
                    <li><a href="profile.php"><span class="glyphicon glyphicon-modal-window"></span>Product</a></li>
                </ul>
            </div>
        </div>

        <div style="display: block; content:''; clear: both;">
             <br/> <br/><br/> <br/>
        </div>
        
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <div class="panel panel-default">
                        <div class="panel-heading"><b>Thank You</b></div>
                        <div class="panel-body">
                           <p>Thank you for purchaising items...</p>
                           <hr/>
                           <p>Hello <b><?php echo $_SESSION['name'] ?></b>, your paymeny progress is successfully completed and your transactin id is xxxxx-xxxx-xxxx.</p>
                           <br/>
                           <a href="index.php" class="btn btn-success btn-lg">Continue shoppping</a>
                        </div>
                        <div class="panel-footer"></div>
                    </div>
                </div>
                <div class="col-md-2"></div>
            </div>
        </div>
     
        <script src="js/jquery-3.4.1.min.js"></script>
        <script src="js/main.js"></script>
        <script src="js/bootstrap.js"></script>
    </body>
</html>