<?php
    require 'db.php';
    class DatabaseOperation extends Database{

        public function fetchCategory($table){
            $sql = "SELECT * FROM ".$table;
            $query = mysqli_query($this->conn,$sql);

            echo "<div class='nav nav-pills nav-stacked'>
            <li class='active'><a href='#'><h4>Categories</h4></a></li>";

            if(mysqli_num_rows($query)){
                while($row = mysqli_fetch_array($query)){
                    $cat_id = $row['cat_id'];
                    $cat_name = $row['cat_title'];
                    echo "<li><a href='#'>$cat_name</a></li>";
                }
                echo " </div>";
             }
        }

        public function fetchBrand($table){
            $sql = "SELECT * FROM ".$table;
            $query = mysqli_query($this->conn,$sql);

            echo "<div class='nav nav-pills nav-stacked'>
            <li class='active'><a href='#'><h4>Brand</h4></a></li>";

            if(mysqli_num_rows($query)){
                while($row = mysqli_fetch_array($query)){
                    $cat_id = $row['brand_id'];
                    $cat_name = $row['brand_title'];
                    echo "<li><a href='#'>$cat_name</a></li>";
                }
                echo " </div>";
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

?>