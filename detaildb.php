<?php

/**
 * file-name: detaildb.php
 * used-for: show_user.php
 * created-by: Mohit Dadu
 * description: it is the used to show the user detail from database.
 * date:24/01/2017
 * */

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "employee";
    
    // Create connection
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

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $sql = "INSERT INTO user (Name, Email, Password, Usertype )
        VALUES ('$name', '$email', '$pass', '$user_type')";
        // use exec() because no results are returned
        $conn->exec($sql);
        if ($user_type === "User") {
            header("Location: add_user_details.php");
        }
    }
}

?>