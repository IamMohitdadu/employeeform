<!--
  file-name: process.php
  used-for: login page
  created-by: Mohit Dadu
  description: it is a php file to provide login to the user by checkiing the field into the database.
	date:18/01/2017
-->

<?php

		$user_name = mysql_real_escape_string($_POST["username"]);
		$pass =  mysql_real_escape_string($_POST["password"]);
		$user_type = mysql_real_escape_string($_POST["logger"]); 
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "login";
	
	  try {
			  // connecting to the data base.
				$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
				// set the PDO error mode to exception
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch(PDOException $e) {
					echo $e->getMessage();
		}
		
		if (empty($user_name)) {
				header("Location: login.php");
				echo "Please enter your email address.";
		}
		
		if (empty($pass)) {
			 header("Location: login.php");
			 $passError = "Please enter your password.";
		}
		
		$sql = "SELECT * FROM user WHERE username = $user_name";
		$res = $conn->prepare($sql);
		$res->execute();
		$result = $res->setFetchMode(PDO::FETCH_ASSOC);
		$row = result->fetch();
	
		if(($row['username'] == $user_name) && ($row['password'] == $pass) && ($row['logger'] == $user_type)) {
				header("Location: add.php");
		} else {
				$errMSG = "Incorrect Credentials, Try again...";
	  }
			
?>