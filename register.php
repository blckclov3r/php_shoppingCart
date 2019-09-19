<?php
    require 'db.php';

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $repassword = $_POST['repassword'];
    $mobile = $_POST['mobile'];
    $address1 = $_POST['address1'];
    $address2 = $_POST['address2'];

    //regex
    $name = "/^[A-Z][a-zA-Z]+$/";
    $emailValidation = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9]+(\.[a-z]{2,4})$/";
    $number = "/^[0-9]+$/";

     if(empty($fname) || empty($lname) || empty($email) || empty($password) || 
         empty($repassword) || empty($mobile) || empty($address1) || empty($address2)){ 
            echo"
             <div class='alert alert-danger' role='alert'>
             <a href='#' class='close' data-dismiss='alert' aria-label='Close'>&times;</a>
             <b>Fill all fields</b>
              </div> ";
      }

        
        if(!preg_match($name,$fname)){
                echo $fname." firstname is not valid";
                exit();
        }
        if(!preg_match($name,$lname)){
            echo $lname." lastname is not valid";
            exit();
        }
        if(!preg_match($emailValidation,$email)){
            echo $email." adress is not valid";
            exit();
        }
        if(strlen($password) < 5){
            echo "Password is weak, it's < 5";
            exit();
        }
        if(strlen($repassword) < 5){
            echo "rePassword is weak, it's < 5";
            exit();
        }
        if($password != $repassword){
            echo "password is not equal";
            exit();
        }
        if(!preg_match($number,$mobile)){
            echo "Mobile number is invalid";
            exit();
        }
    
//     existing email address in our database
       
        $sql = "SELECT user_id FROM user_info WHERE email = '$email' LIMIT 1";
        $query = mysqli_query($db->conn,$sql);
        $countEmail = mysqli_num_rows($query);
       
        if($countEmail > 0){
            echo "The email you entered is not available, Try another email address <br/>";
            exit();
        }else{
            echo "Email is available <br/>";
            $password = md5($password);
            $sql = "INSERT INTO user_info(first_name,last_name,email,password,mobile,address1,address2)
               VALUES('$fname','$lname','$email','$password','$mobile','$address1','$address2');";
            $query = mysqli_query($db->conn,$sql);
            if($query){
                echo"
                <div class='alert alert-success' role='alert'>
                <a href='#' class='close' data-dismiss='alert' aria-label='Close'>&times;</a>
                <b>You are registered successfully</b>
                 </div> ";
            }else{
                echo"
                <div class='alert alert-danger' role='alert'>
                <a href='#' class='close' data-dismiss='alert' aria-label='Close'>&times;</a>
                <b>Error occured</b>
                 </div> ";
            }
        }

   
?> 