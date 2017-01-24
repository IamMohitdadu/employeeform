<!--
  file-name: mydb.php
  used-for: register.php
  created-by: Mohit Dadu
  description: it is the php file to connect with database and insert data into table.
  date:19/01/2017
-->

<?php

if(isset($_POST['btn-signup'])) {
    
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "employee";
    
    $error = false;
    try{
        // Check connection
		$conn = new mysqli($servername, $username, $password, $dbname);
	}
	catch(Exception $e) {
		echo  "Connection failed: " . $e->mysqli_connect_error();
	}
    
    // clean user input to prevent sql injection.
    $name = trim($_POST['name']);
    $name = strip_tags($name);
    $name = htmlspecialchars($name);
    
    $email = trim($_POST['email']);
    $email = strip_tags($email);
    $email = htmlspecialchars($email);
    
    $pass = trim($_POST['password']);
    $pass = strip_tags($pass);
    $pass = htmlspecialchars($pass);

    $user = trim($_POST['userType']);
    $user = strip_tags($user);
    $user = htmlspecialchars($user);
    
    // name validation
    if (empty($name)) {
      $error = true;
      $nameError = "Please enter your full name.";
    } else if (strlen($name) < 3) {
      $error = true;
      $nameError = "Name must have atleat 3 characters.";
    } else {
      $nameError = "";
    }
    // email validation
    if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
      $error = true;
      $emailError = "Please enter valid email address.";
    } else {
      $emailError = "";
    }
    
    // password validation
    if (empty($pass)) {
      $error = true;
      $passError = "Please enter password.";
    } else if (strlen($pass) < 6) {
      $error = true;
      $passError = "Password must have atleast 6 characters.";
    } else {
      $passError = "";
    }
    
    // execute if there is no error
    if(!$error){
        $sql = "INSERT INTO user (Name, Email, Password, Usertype )
                VALUES ('$name', '$email', '$pass', '$user')";
        $res= $conn->query($sql);
        if ($res) {
            echo "successfully registered.";
            header("Location: login.php");
        } 
    }else {
        $errMSG = "Something went wrong, try again later...";
        echo "$errMSG";
    }
}

?>