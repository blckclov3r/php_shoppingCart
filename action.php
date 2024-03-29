<?php
    session_start();
    require 'db.php';

    class DatabaseOperation extends Database{

        public function fetchCategory($table){
            $sql = "SELECT * FROM ".$table;
            $query = mysqli_query($this->conn,$sql);

            echo "<div class='nav nav-pills nav-stacked'>
            <li class='active'><a href='#'><h4>Categories</h4></a></li>";

             while($row = mysqli_fetch_assoc($query)){
                 if($row > 0){
                    $cat_id = $row['cat_id'];
                    $cat_name = $row['cat_title'];
                    echo "
                        <li><a href='#' class='category' cid='$cat_id' >$cat_name</a></li>
                    ";
                 }
             }
             echo " </div>";
        }

        public function fetchBrand($table){
            $sql = "SELECT * FROM ".$table;
            $query = mysqli_query($this->conn,$sql);

            echo "<div class='nav nav-pills nav-stacked'>
            <li class='active'><a href='#'><h4>Brand</h4></a></li>";
             while($row = mysqli_fetch_assoc($query)){
                 if($row > 0){
                    $bid = $row['brand_id'];
                    $cat_name = $row['brand_title'];
                    echo "<li><a href='#' class='brand' bid='$bid'>$cat_name</a></li>";
                 }
             }
             echo " </div>";
        }

        public function fetchProduct($table){
            $limit = 9;
            $start = 0;
            if(isset($_POST['setPage'])){
                $pageno = $_POST['pageNumber'];
                //formula for pagination
                $start = ($pageno * $limit) - $limit; 
            }
            $sql = "SELECT * FROM ".$table."  LIMIT $start,$limit";
            $query = mysqli_query($this->conn,$sql);
            while($row = mysqli_fetch_assoc($query)){
                if($row > 0){
                   $pro_id = $row['product_id'];
                   $pro_cat = $row['product_brand'];
                   $pro_brand = $row['product_brand'];
                   $pro_title = $row['product_title'];
                   $pro_price = $row['product_price'];
                   $pro_desc = $row['product_desc'];
                   $pro_image = $row['product_image'];
                   $pro_keywords = $row['product_keywords'];
                   echo "
                     <div class='col-md-4'>
                        <div class='panel panel-info'>
                            <div class='panel-heading'>$pro_title</div>
                            <div class='panel-body'><img src='img/$pro_image'></div>
                            <div class='panel-heading'>
                                    $ $pro_price
                                    <button pid='$pro_id' class='btn btn-danger' id='addCartBtn'>AddToCart</button>
                            </div>
                         </div>
                      </div> ";
                }
            }
            
        }


        public function fetchSelectedCategory($table){
            $cid = $_POST['cat_id'];
            $sql = "SELECT * FROM ".$table." WHERE product_cat = '$cid'";
            $query = mysqli_query($this->conn,$sql);
            while($row = mysqli_fetch_assoc($query)){
                if($row > 0){
                   $pro_id = $row['product_id'];
                   $pro_cat = $row['product_brand'];
                   $pro_brand = $row['product_brand'];
                   $pro_title = $row['product_title'];
                   $pro_price = $row['product_price'];
                   $pro_desc = $row['product_desc'];
                   $pro_image = $row['product_image'];
                   $pro_keywords = $row['product_keywords'];
                   echo "
                     <div class='col-md-4'>
                        <div class='panel panel-info'>
                            <div class='panel-heading'>$pro_title</div>
                            <div class='panel-body'><img src='img/$pro_image'></div>
                            <div class='panel-heading'>
                                    $ $pro_price
                                    <button pid='$pro_id' class='btn btn-danger' id='addCartBtn'>AddToCart</button>
                            </div>
                         </div>
                      </div> ";
                }
            }
        }

        public function fetchSelectedBrand($table){
            $bid = $_POST['brand_id'];
            $sql = "SELECT * FROM ".$table." WHERE product_brand = '$bid'";
            $query = mysqli_query($this->conn,$sql);
            while($row = mysqli_fetch_assoc($query)){
                if($row > 0){
                   $pro_id = $row['product_id'];
                   $pro_cat = $row['product_brand'];
                   $pro_brand = $row['product_brand'];
                   $pro_title = $row['product_title'];
                   $pro_price = $row['product_price'];
                   $pro_desc = $row['product_desc'];
                   $pro_image = $row['product_image'];
                   $pro_keywords = $row['product_keywords'];
                   echo "
                     <div class='col-md-4'>
                        <div class='panel panel-info'>
                            <div class='panel-heading'>$pro_title</div>
                            <div class='panel-body'><img src='img/$pro_image'></div>
                            <div class='panel-heading'>
                                    $ $pro_price
                                    <button pid='$pro_id' class='btn btn-danger' id='addCartBtn'>AddToCart</button>
                            </div>
                         </div>
                      </div> ";
                }
            }
        }

        public function searchProducts($table){
            $keyword = $this->conn->real_escape_string($_POST['keyword']);
            $sql = "SELECT * FROM ".$table." WHERE product_keywords LIKE '$keyword%'";
            $query = mysqli_query($this->conn,$sql);
            while($row = mysqli_fetch_assoc($query)){
                if($row > 0){
                   $pro_id = $row['product_id'];
                   $pro_cat = $row['product_brand'];
                   $pro_brand = $row['product_brand'];
                   $pro_title = $row['product_title'];
                   $pro_price = $row['product_price'];
                   $pro_desc = $row['product_desc'];
                   $pro_image = $row['product_image'];
                   $pro_keywords = $row['product_keywords'];
                   echo "
                     <div class='col-md-4'>
                        <div class='panel panel-info'>
                            <div class='panel-heading'>$pro_title</div>
                            <div class='panel-body'><img src='img/$pro_image'></div>
                            <div class='panel-heading'>
                                    $ $pro_price
                                    <button pid='$pro_id' class='btn btn-danger'  id='addCartBtn'>AddToCart</button>
                            </div>
                         </div>
                      </div> ";
                }
            }
        }

       public function addProducts($table,$arr){
           $session_id = $_SESSION['uid'];
           if(isset($session_id)){
                $id = "";
                $user_id = $_SESSION['uid'];
                foreach($arr as $key=>$value){
                    $id .= $key ."='".$value."'";
                }
                //retrieve data from cart 
                $sql = "SELECT * FROM cart WHERE ".$id." AND user_id = '$user_id'";
            
                $query = mysqli_query($this->conn,$sql);
                $count = mysqli_num_rows($query);
                if($count>0){
                    echo"
                    <div class='alert alert-danger' role='alert'>
                        <a href='#' class='close' data-dismiss='alert' aria-label='Close'>&times;</a>
                        <b>Product is already added in the cart</b>
                        </div> ";
                        exit();
                }else{
                
                    $id = "";
                    foreach($arr as $key=>$value){
                        $id .=  $value;
                    }
                    $sql = "SELECT * FROM products WHERE product_id = '$id'";
                    $query = mysqli_query($this->conn,$sql);
                    while($row = mysqli_fetch_assoc($query)){
                        if($row > 0){
                            $id = $row['product_id'];
                            $product_name = $row['product_title'];
                            $product_image = $row['product_image'];
                            $product_price = $row['product_price'];
                            $sql = "INSERT INTO cart (p_id, ip_add, user_id, product_title, product_image, qty, price, total_amount) VALUES ( '$id', '0', '$session_id', '$product_name', '$product_image', '1', '$product_price', '$product_price')";
                            if(mysqli_query($this->conn,$sql)){
                                echo"
                                    <div class='alert alert-success' role='alert'>
                                    <a href='#' class='close' data-dismiss='alert' aria-label='Close'>&times;</a>
                                    <b>Product succesfully added</b>
                                    </div> ";
                            }else{
                                echo"
                                <div class='alert alert-danger' role='alert'>
                                    <a href='#' class='close' data-dismiss='alert' aria-label='Close'>&times;</a>
                                    <b>Error Occured</b>
                                    </div> ";
                                        exit();
                            }
                        }
                    }
                }
            }
          
           
       }

       public function getCartProduct($table){
           $uid = $_SESSION['uid'];
           $sql = "SELECT * FROM $table WHERE user_id ='$uid'";
           $query = mysqli_query($this->conn,$sql);
           $no = 1;
           $total_amt =0;
           while($row = mysqli_fetch_assoc($query)){
                if($row > 0){
                    $pro_id = $row['p_id'];
                    $pro_image = $row['product_image'];
                    $pro_title = $row['product_title'];
                    $qty = $row['qty'];
                    $pro_price = $row['price'];
                    $total = $row['total_amount'];

                    $price_array = array($total);
                    $total_sum = array_sum($price_array);
                    $total_amt = $total_amt + $total_sum;

                    if(isset($_POST['getCartProduct'])){
                        echo "
                        <div class='row'>
                            <div class='col-md-3'> $no</div>
                            <div class='col-md-3'><img class='img-responsive' style='width: 40px; height: 40px;' src='img/$pro_image'/></div>
                            <div class='col-md-3'> $pro_title </div>
                            <div class='col-md-3'>$pro_price </div>
                        </div>";
                    }else if(isset($_POST['cart_checkout'])){
                        echo "
                        <div class='row'>
                            <div class='col-md-2'>
                                <div class='btn-group'>
                                    <a href='#' remove_id='$pro_id' class='btn btn-danger remove'><span class='glyphicon glyphicon-trash'></span></a>
                                    <a href='#' update_id='$pro_id' class='btn btn-primary update'><span class='glyphicon glyphicon-ok-sign'></span></a>
                                </div>
                            </div>
                             <div class='col-md-2'><img style='width: 50px; height: 50px;' src='img/$pro_image'></div>
                             <div class='col-md-2'>$pro_title</div>
                              <div class='col-md-2'><input type='text' class='form-control qty' pid='$pro_id' id='qty-$pro_id' value='$qty' ></div>
                               <div class='col-md-2'><input type='text' class='form-control price' pid='$pro_id' id='price-$pro_id' value='$pro_price' disabled></div>
                            <div class='col-md-2'><input type='text' class='form-control total' pid='$pro_id' id='total-$pro_id' value='$total' disabled></div>
                            </div>";
                    }
                }
                $no+=1;
           }
          
           if(isset($_POST['cart_checkout'])){
                 echo "<div class='row'>
                    <div class='col-md-8'></div>
                    <div class='col-md-4'>
                        <b>Total: $total_amt</b>
                    </div>
                </div>";

              
           }

            echo "
            <hr/>
                <div class='row'>
         
            <div class='col-md-8'>
                <form action='https://www.sandbox.paypal.com/cgi-bin/webscr' method='POST'>
                    <input type='hidden' name='cmd' value='_cart'>
                    <input type='hidden' name='business' value='shoppingtest@test.com'>
                    <input type='hidden' name='upload' value='1'> ";

                    $x = 1;
                    $sql = "SELECT * FROM cart WHERE user_id = '$uid' ";
                    $query = mysqli_query($this->conn,$sql);
                    while($row = mysqli_fetch_assoc($query)){
                        
                        echo "
                            <input type='hidden' name='item_name_".$x."' value='".$row['product_title']."'>
                            <input type='hidden' name='item_number_".$x."' value='".$x."'>
                            <input type='hidden' name='amount_".$x."' value='".$row['price']."'>
                            <input type='hidden' name='quantity_".$x."' value='".$row['qty']."'>
                        ";
        
                        $x+=1;
                        
                        
                    }
                    
        
                    
            echo "    <input type='image' name='submit'
                    src='https://www.paypalobjects.com/webstatic/en_US/i/buttons/cc-badges-ppmcvdam.png' alt='PayPal Acceptance'
                    alt='PayPal - The safer, easier way to pay online'>
                </form>
            </div>
        </div>
        ";
           
           
       }

       public function removeFromCart($table){
            $pid = $_POST['removeId'];
            $uid = $_SESSION['uid'];
            // echo $pid;
            $sql = "DELETE FROM $table WHERE user_id = '$uid' AND p_id = '$pid'";
            $query = mysqli_query($this->conn,$sql);
            if($query){
                echo"
                    <div class='alert alert-success' role='alert'>
                    <a href='#' class='close' data-dismiss='alert' aria-label='Close'>&times;</a>
                    <b>Removed</b>
                    </div> ";
            }else{
                echo"
                <div class='alert alert-danger' role='alert'>
                <a href='#' class='close' data-dismiss='alert' aria-label='Close'>&times;</a>
                <b>Error occured</b>
                 </div> ";
            }
       }

       public function updateProduct($table){
           $uid = $_SESSION['uid'];
           $pid = $_POST['updateId'];
           $qty = $_POST['qty'];
           $price = $_POST['price'];
           $total = $_POST['total'];

           $qty_price = $qty * $price;

           $sql = "UPDATE $table SET qty='$qty', price='$price', total_amount = '$qty_price' WHERE user_id = '$uid' AND p_id = '$pid'";
           $query = mysqli_query($this->conn,$sql);
           if($query){
                echo"
                <div class='alert alert-success' role='alert'>
                <a href='#' class='close' data-dismiss='alert' aria-label='Close'>&times;</a>
                <b>Updated</b>
                </div> ";
           }else{
                echo"
                <div class='alert alert-danger' role='alert'>
                <a href='#' class='close' data-dismiss='alert' aria-label='Close'>&times;</a>
                <b>Error occured</b>
                </div> ";
           }
       }

    }

    $obj = new DatabaseOperation();
    

    if(isset($_POST['category'])){
        $obj->fetchCategory("categories");
    }

    if(isset($_POST['brand'])){
        $obj->fetchBrand("brands");
    }

    if(isset($_POST['getProduct'])){
        $obj->fetchProduct("products");
    }

    if(isset($_POST['selectedCategory'])){
        $obj->fetchSelectedCategory("products");
    }
     if(isset($_POST['selectedBrand'])){
        $obj->fetchSelectedBrand("products");
    }
     if(isset($_POST['searchProduct'])){
        $obj->searchProducts("products");
    }

    //different method for retrieval
    if(isset($_POST['addToProduct'])){
        
        $id = $_POST['proId'];
        $arr = array(
            "p_id"=>$id
        );
        if(isset($_SESSION['uid'])){
            $obj->addProducts("products",$arr);
        }else{
            echo"
              <div class='alert alert-danger' role='alert'>
              <a href='#' class='close' data-dismiss='alert' aria-label='Close'>&times;</a>
              <b>Please login first</b>
              </div> ";
              exit();
        }
        
    }
   

    //cart.php & index,profile.php
    if(isset($_POST['getCartProduct']) || isset($_POST['cart_checkout'])){
        $obj->getCartProduct("cart");
    }

    if(isset($_POST['removeFromCart'])){
        $obj->removeFromCart("cart");
    }

    if(isset($_POST['updateProduct'])){
        $obj->updateProduct("cart");
    }

    if(isset($_POST['page'])){
        $sql = "SELECT * FROM products";
        $query = mysqli_query($db->conn,$sql);
        $count = mysqli_num_rows($query);
        $pageno =  ceil($count/9);
        // echo $pageno;
        for($i = 1;$i<=$pageno;$i++){
            echo "
                 <li><a href='#' id='page' page='$i' >$i</a></li>
            ";
        }
    }

    if(isset($_POST['cart_count'])){
        if(isset($_SESSION['uid'])){
            $uid = $_SESSION['uid'];
            $sql = "SELECT * FROM cart WHERE user_id ='$uid'";
            $query = mysqli_query($db->conn,$sql);
            $count = mysqli_num_rows($query);
            echo $count;
        }
    }
    
?>