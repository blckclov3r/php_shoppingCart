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

    $name = "/^[A-Z][a-zA-Z]+$/";
    $emailValidation = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9]+(\.[a-z]{2,4})$/";
    $number = "/^[0-9]+$/";

   

    if(empty($fname) || empty($lname) || empty($email) || empty($password) || 
         empty($repassword) || empty($mobile) || empty($address1) || empty($address2)){ ?>

            <div class='alert alert-danger' role='alert'>
                <a href='#' class='close' data-dismiss='alert' aria-label='Close'>&times;</a>
                 <b>Fill all fields</b>
              </div>
         
   <?php 
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
    
?> 