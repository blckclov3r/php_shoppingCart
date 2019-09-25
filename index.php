<?php
    session_start();
    if(isset($_SESSION['uid']) && isset($_SESSION['name'])){
        header("location: profile.php");
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
                    <li><input type="text" class="form-control" placeholder="Search..." id="search"></li>
                    <li><button  class="btn btn-primary" id="search_btn">Search</button></li>
                   
                </ul>
                <ul class="nav navbar-nav navbar-right">

                    <li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-shopping-cart"></span>Cart<span class="badge">0</span></a>
                        <div class="dropdown-menu" style="width: 420px;">
                            <div class="panel panel-success">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-md-3">s1.No</div>
                                        <div class="col-md-3">Product Image</div>
                                        <div class="col-md-3">Product Name</div>
                                        <div class="col-md-3">Price in $.</div>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    
                                </div>
                                <div class="panel-footer">
                                    
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Signin</a>
                        <ul class="dropdown-menu">
                            <div style="width: 320px;">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">Login</div>
                                    <div class="panel-body">
                                        <form method="POST">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control"  id="email" required/>
                                            <label for="password">Password</label>
                                            <input type="password" class="form-control"  id="password" required/>
                                            <a href="#" style="list-style: none; text-decoration: none; ">Forgotten Password</a>
                                            <input type="submit" class="btn btn-success" id="loginBtn" value="Login"/>
                                        </form>
                                    </div>
                                    <div class="panel-footer" id="e_msg"></div>
                                </div>
                            </div>
                        </ul>
                    </li>
                    <li><a href="#"><span class="glyphicon glyphicon-user">Signup</span></a></li>
                </ul>
            </div>
        </div>

        <div style="display: block; content:''; clear: both;">
             <br/> <br/><br/> <br/>
        </div>
        
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-2">
                    <!-- brand & category -->
                    <div id="get_category"> </div>
                    <div style="display: block; content:''; clear: both;"><br/> <br/> </div>
                    <div id="get_brand"></div>
                   
                </div>
                <div class="col-md-8">
                
                    <div class="row">
                        <div class="col-md-12" id="product_msg"></div>
                    </div>

                    <div class="panel panel-info">
                        <div class="panel-heading">Products</div>
                        <div class="panel-body">
                             <!-- products -->
                            <div id="get_product"></div>
                        </div>
                        <div class="panel-footer">&copy; 2019</div>
                    </div>
                </div>
                <div class="col-md-1"></div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <center>
                        <ul class="pagination" id="pageno">
                            <!-- <li><a href="#">1</a></li> -->
                        </ul>    
                    </center>
                </div>
            </div>

        </div>
        <script src="js/jquery-3.4.1.min.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src="js/main.js"></script>
      
    </body>
</html>


<!-- https://developer.paypal.com/docs/classic/paypal-payments-standard/integration-guide/formbasics/# -->
<!-- https://developer.paypal.com/docs/classic/api/logos-marks/ -->