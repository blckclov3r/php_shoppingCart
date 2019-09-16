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
                    <li><input type="text" class="form-control" placeholder="Search..."id="search"></li>
                    <li><input type="submit" class="btn btn-primary" value="Search" id="search_btn"></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#"><span class="glyphicon glyphicon-shopping-cart"></span>Cart</a></li>
                    <li>
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Signin</a>
                        <ul class="dropdown-menu">
                            <li>Helloworld</li>
                        </ul>
                    </li>
                    <li><a href="#">Signup</a></li>
                </ul>
            </div>
        </div>
        <br/> <br/><br/> <br/>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-2">
                    <div class="nav nav-pills nav-stacked">
                        <li class="active"><a href="#"><h4>Categories</h4></a></li>
                        <li><a href="#">Categories</a></li>
                        <li><a href="#">Categories</a></li>
                        <li><a href="#">Categories</a></li>
                        <li><a href="#">Categories</a></li>
                    </div>
                    <div class="nav nav-pills nav-stacked">
                        <li class="active"><a href="#"><h4>Brand</h4></a></li>
                        <li><a href="#">Categories</a></li>
                        <li><a href="#">Categories</a></li>
                        <li><a href="#">Categories</a></li>
                        <li><a href="#">Categories</a></li>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="panel panel-info">
                        <div class="panel-heading">Products</div>
                        <div class="panel-body">
                            <div class="col-md-4">
                                <div class="panel panel-info">
                                    <div class="panel-heading">Havoc</div>
                                    <div class="panel-body"><img src="img/havoc.jpg"></div>
                                    <div class="panel-heading">
                                         $500.00
                                         <button class="btn btn-danger" id="addCartBtn">AddToCart</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="panel panel-info">
                                    <div class="panel-heading">Altrove</div>
                                    <div class="panel-body"><img src="img/altrove.jpg"></div>
                                    <div class="panel-heading">
                                         $500.00
                                         <button class="btn btn-danger" id="addCartBtn">AddToCart</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="panel panel-info">
                                    <div class="panel-heading">Byzantine</div>
                                    <div class="panel-body"><img src="img/byzantine.jpg"/></div>
                                    <div class="panel-heading"> $500.00                                       
                                         <button class="btn btn-danger" id="addCartBtn">AddToCart</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer">&copy; 2019</div>
                    </div>
                </div>
                <div class="col-md-1"></div>
            </div>
        </div>

        <script src="js/jquery-3.4.1.min.js"></script>
        <script src="js/main.js"></script>
        <script src="js/bootstrap.js"></script>
    </body>
</html>