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
                        <div class="panel-heading"><b>Your Order</b></div>
                        <div class="panel-body">
                           <h1>Order Details</h1>
                           <hr/>
                           <div class="row">
                               <div class="col-md-4">
                                   <img src="img/ipad.png" class="img-thumbnail">
                               </div>
                               <div class="col-md-8">
                                   <table>
                                       <tr>
                                           <td>Product Name:</td>
                                           <td>&nbsp; <b>Ipad</b></td>
                                      </tr>
                                      <tr>
                                           <td>Product Price:</td>
                                           <td>&nbsp; <b>$500</b></td>
                                      </tr>
                                      <tr>
                                           <td>Quantity:</td>
                                           <td>&nbsp; <b>3</b></td>
                                      </tr>
                                      <tr>
                                           <td>Payment:</td>
                                           <td>&nbsp; <b>Completed</b></td>
                                      </tr>
                                      <tr>
                                           <td>Transaction ID:</td>
                                           <td>&nbsp; <b>HELLOWORLD</b></td>
                                      </tr>
                                   </table>
                               </div>
                           </div>
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