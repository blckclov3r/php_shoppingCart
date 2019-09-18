<?php

    require_once 'db.php';

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
            $keyword = $_POST['keyword'];
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
                                    <button pid='$pro_id' class='btn btn-danger' id='addCartBtn'>AddToCart</button>
                            </div>
                         </div>
                      </div> ";
                }
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
?>