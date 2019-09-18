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

    if(empty($fname) || empty($lname) || empty($email) || empty($password) || 
         empty($repassword) || empty($mobile) || empty($address1) || empty($address2)){ ?>

                <div class='alert alert-danger' role='alert'>
                    <a href='#' class='close' data-dismiss='alert' aria-label='Close'>&times;</a>
                    <b>Fill all fields</b>
                </div>
         
   <?php }
    
?> 