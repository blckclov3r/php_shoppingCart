<?php
    session_start();
    if(isset($_SESSION['uid']) && isset($_SESSION['name'])){
       
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
    </head>
    <body>
        
        <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a href="#" class="navbar-brand">MyStore</a>
                </div>
                <ul class="nav navbar-nav">
                    <li><a href="#"><span class="glyphicon glyphicon-home"></span>Home</a></li>
                    <li><a href="#"><span class="glyphicon glyphicon-modal-window"></span>Product</a></li>
 
                </ul>
            </div>
        </div>

        <div style="display: block; content:''; clear: both;"><br/> <br/><br/><br/></div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">Cart Checkout</div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-2"><b>Action</b></div>
                                <div class="col-md-2"><b>Product Image</b></div>
                                <div class="col-md-2"><b>Product Name</b></div>
                                <div class="col-md-2"><b>Product Price</b></div>
                                <div class="col-md-2"><b>Quantity</b></div>
                                <div class="col-md-2"><b>Price in $</b></div>
                            </div>
                            <br/>
                            <div id="cart_check"></div>
                            <!-- <div class="row">
                                <div class="col-md-2">
                                    <div class="btn-group">
                                        <a href="#" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
                                        <a href="#" class="btn btn-primary"><span class="glyphicon glyphicon-ok-sign"></span></a>
                                    </div>
                                </div>
                                <div class="col-md-2"><img style='width: 50px; height: 50px;' src='img/ipad.png'></div>
                                <div class="col-md-2">Product Name</div>
                                <div class="col-md-2"><input type='text' class='form-control' value='1' ></div>
                                <div class="col-md-2"><input type='text' class='form-control' value='5000' disabled></div>
                                <div class="col-md-2"><input type='text' class='form-control' value='5000' disabled></div>
                            </div> -->
                        </div>
                        <div class="panel-footer">footer</div>
                    </div>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
        
        <script src="js/jquery-3.4.1.min.js"></script>
        <script src="js/main.js"></script>
        <script src="js/bootstrap.js"></script>
    </body>
</html>