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

        <div style="display: block; content:''; clear: both;"><br/> <br/><br/> <br/></div>
        <div class="row">
             <div class="col-md-2"></div>
             <div class="col-md-8"  id="signup_msg"></div>
             <div class="col-md-2"></div>
        </div>
      

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">Customer Signup Form</div>
                        <div class="panel-body">
                            <form method="POST">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="fname">FirstName</label>
                                        <input type="text" id="fname" name="fname" class="form-control" placeholder="FirstName" />>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="lname">LastName</label>
                                        <input type="text" id="lname" name="lname" class="form-control" placeholder="Lastname"/>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="email">Email</label>
                                        <input type="email" id="email" name="email" class="form-control" placeholder="@Email"/>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="password">Password</label>
                                        <input type="password" id="password" name="password" class="form-control" placeholder="Password"/>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="repassword">Re-enter Password</label>
                                        <input type="password" id="repassword" name="repassword" class="form-control" placeholder="re-enter Password"/>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="mobile">Mobile</label>
                                        <input type="text" id="mobile" name="mobile" class="form-control" placeholder="mobile"/>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="address1">Address Line 1</label>
                                        <input type="text" id="address1" name="address1" class="form-control" placeholder="Address Line 1"/>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="address2">Address Line 2</label>
                                        <input type="text" id="address2" name="address2" class="form-control" placeholder="Address Line 2"/>
                                    </div>
                                </div>
                                <br/>
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="submit" id="signup_btn" name="signup_btn"class="btn btn-success" value="Signup"/>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="panel-footer">footer</div>

                    </div>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>


        <script src="js/jquery-3.4.1.min.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src="js/main.js"></script>
    </body>
</html>