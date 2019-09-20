<?php
    include 'db.php';
    session_start();

    class DatabaseOperation extends Database{

        public function login($table,$email,$password){
            $sql = "SELECT * FROM $table WHERE email = '$email' AND password = '$password'";
            $query = mysqli_query($this->conn,$sql);
            while($row = mysqli_fetch_assoc($query)){
                if($row > 0){
                    $_SESSION['uid'] = $row['user_id'];
                    $_SESSION['name'] = $row['first_name'];
                    return true;
                }else{
                    return false;
                }
            }
        }
    }

    $obj = new DatabaseOperation();

     if(isset($_POST['userLogin'])){
        $email = mysqli_real_escape_string($db->conn,$_POST['email']);
        $password = mysqli_real_escape_string($db->conn,$_POST['password']);
        if($obj->login("user_info",$email,$password)){
            echo "success";
        }else{
            echo "fail";
        }
 
     }

?>