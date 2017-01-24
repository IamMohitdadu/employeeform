<!--
file-name: process.php
used-for: login page
created-by: Mohit Dadu
description: it is a php file to provide login to the user by checkiing the field into the database.
date:18/01/2017
-->

<?php
    // to connect the database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "employee";
    
	// Check connection
	try{
		$conn = new mysqli($servername, $username, $password, $dbname);
	}
	catch(Exception $e) {
		echo  "Connection failed: " . $e->mysqli_connect_error();
	}
    
    $error = false;
	
    // execute if login 
    if( isset($_POST['btn-login']) ) {
		
		$email = trim($_POST['email']);
		$email = strip_tags($email);
		$email = htmlspecialchars($email);
		
		$pass = trim($_POST['password']);
		$pass = strip_tags($pass);
		$pass = htmlspecialchars($pass);
		// validation for email.
		if (empty($email)) {
			$error = true;
			header("Location: login.php");
			echo "Please enter your email address.";
		} else if ( !filter_var($email,FILTER_VALIDATE_EMAIL)) {
			$error = true;
			$emailError = "Please enter valid email address.";
		}
		// validation for password  
		if (empty($pass)) {
			$error = true;
			header("Location: login.php");
			$passError = "Please enter your password.";
		}
		
		// execute if there is no error
		if (!$error) {
			//$pass=hash('sha256', $pass);
			$sql = "SELECT Id, Name, Email, Password, Usertype FROM user WHERE Email = '$email' AND Password='$pass'";
			$res = $conn->query($sql);
			$row=$res->fetch_assoc();
			$count=$res->num_rows;
			if ($count === 1) {
				if (isset($_POST['remember'])) {
					setcookie('email', $email, time()+60*60*7);
					setcookie('pass', $pass, time()+60*60*7);
				}
				// set the session 
				session_start();
				$_SESSION['id'] = $row['Id'];
				$_SESSION['email'] = $email;
				$_SESSION['pass'] = $pass;
				$_SESSION['name'] = $row['Name'];
				//SESSION['user'] = $row["id"];
				if($row['Usertype'] === "Admin" ) {
					header("Location: admin.php");
				} else { 
					header("Location: user.php");
				}
			} else {
					 echo "Please Enter the valid details, Try again...";
				}
		} else {
			header("Location: login.php");
		}
	}
?>