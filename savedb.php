<!--
  
  
  
  
  
-->

<?php

/**
 * file-name: savedb.php
 * used-for: updatedb.php
 * created-by: Mohit Dadu
 * description: it is the php file to connect with database and update data into MySql table.
 * date:19/01/2017
*/

if(isset($_POST['save'])) {
    
		$error = false;
		session_start();
		if((isset($_SESSION['email']))){
			$email = $_SESSION['email'];
		}
	
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "employee";
    
    $error = false;
    try{
        // Check connection
				$conn = new mysqli($servername, $username, $password, $dbname);
		} catch(Exception $e) {
				echo  "Connection failed: " . $e->mysqli_connect_error();
		}
    
    // clean user input to prevent sql injection.
    $name = trim($_POST['name']);
    $name = strip_tags($name);
    $name = htmlspecialchars($name);
    
    $pass = trim($_POST['pass']);
    $pass = strip_tags($pass);
    $pass = htmlspecialchars($pass);

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
				$sql = "UPDATE user SET Name='$name', Password='$pass' WHERE Email='$email'";
        if (mysqli_query($conn, $sql)) {
				header("Location: show_user_details.php");
		}
    } else {
        $errMSG = "Something went wrong, try again later...";
        echo "$errMSG";
    }
}

?>