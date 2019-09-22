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
            $sql = "SELECT * FROM ".$table." ORDER BY RAND() LIMIT 0,9";
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
               //if the product not exists in cart respectively to the user
               return false;
           }
           return true;
       }

       public function getCartProduct($table){
           $uid = $_SESSION['uid'];
           $sql = "SELECT * FROM $table WHERE user_id ='$uid'";
           $query = mysqli_query($this->conn,$sql);
           $no = 1;
           while($row = mysqli_fetch_assoc($query)){
                if($row > 0){
                    $pro_id = $row['p_id'];
                    $pro_image = $row['product_image'];
                    $pro_title = $row['product_title'];
                    $pro_price = $row['price'];
                    echo "
                    <div class='row'>
                        <div class='col-md-3'> $no</div>
                        <div class='col-md-3'><img class='img-responsive' style='width: 40px; height: 40px;' src='img/$pro_image'/></div>
                        <div class='col-md-3'> $pro_title </div>
                        <div class='col-md-3'>$pro_price </div>
                    </div>";
                }
                $no+=1;
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
       $session_id = $_SESSION['uid'];
       $arr = array(
         "p_id"=>$id
       );
       if($obj->addProducts("products",$arr)){
          $sql = "SELECT * FROM products WHERE product_id = '$id'";
          $query = mysqli_query($db->conn,$sql);
          while($row = mysqli_fetch_assoc($query)){
            if($row > 0){
                $id = $row['product_id'];
                $product_name = $row['product_title'];
                $product_image = $row['product_image'];
                $product_price = $row['product_price'];
                $sql = "INSERT INTO cart (p_id, ip_add, user_id, product_title, product_image, qty, price, total_amount) VALUES ( '$id', '0', '$session_id', '$product_name', '$product_image', '1', '$product_price', '$product_price')";
                if(mysqli_query($db->conn,$sql)){
                    echo"
                        <div class='alert alert-success' role='alert'>
                        <a href='#' class='close' data-dismiss='alert' aria-label='Close'>&times;</a>
                        <b>Product succesfully added</b>
                        </div> ";
                }else{
                    echo"
                    <div class='alert alert-danger' role='alert'>
                    <a href='#' class='close' data-dismiss='alert' aria-label='Close'>&times;</a>
                    <b>Some error occured</b>
                     </div> ";
                     exit();
                }
            }
          }
       }else{
        echo"
            <div class='alert alert-danger' role='alert'>
                <a href='#' class='close' data-dismiss='alert' aria-label='Close'>&times;</a>
                <b>Product is already added in the cart</b>
                </div> ";
                exit();
       }
     
    }
   

    if(isset($_POST['getCartProduct'])){
        $obj->getCartProduct("cart");
    }
?>