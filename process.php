<!--
file-name: process.php
used-for: login page
created-by: Mohit Dadu
description: it is a php file to provide login to the user by checkiing the field into the database.
date:18/01/2017
-->

<?php
    session_start();
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "login";
    
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
    
    if ( isset($_SESSION['user'])!="" ) {
        header("Location: home.php");
       exit;
    }
    
    $error = false;
  
    if( isset($_POST['btn-login']) ) {
	
		$email = mysql_real_escape_string($_POST["email"]);
		$pass =  mysql_real_escape_string($_POST["password"]);
		$user_type = mysql_real_escape_string($_POST["userType"]); 
		
		if (empty($email)) {
			$error = true;
			header("Location: login.php");
			echo "Please enter your email address.";
		}
		  
		if (empty($pass)) {
			$error = true;
			header("Location: login.php");
			$passError = "Please enter your password.";
		}
		
		if (!$error) {
			//$pass=hash('sha256', $pass);
			$sql = "SELECT Email, Password, User_Type FROM user WHERE Email = '$email' AND Password='$pass'";
			$res = $conn->query($sql);
			$row=$res->fetch_assoc();
			$count=$res->num_rows;
			if ($count == 1) {
				//SESSION['user'] = $row["id"];
				if ($row['User_Type'] == $user_type) {
					if($user_type == "Admin" ) {
						header("Location: admin.php");
					} else {
						header("Location: user.php");
					}
				} else {
					 echo "Incorrect Credentials, Try again...";
				}
		    }
	    }
	}
?>