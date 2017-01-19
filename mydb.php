<!--
  file-name: mydb.php
  used-for:  for user and admin register.php
  created-by: Mohit Dadu
  description: it is the php file to connect with database and insert data into table.
  date:19/01/2017
-->

<?php

  if(isset($_POST['btn-signup'])) {
     $user_name = mysql_real_escape_string($_POST["username"]);
     $pass =  mysql_real_escape_string($_POST["password"]);
     $user_type = mysql_real_escape_string($_POST["logger"]); 
     $servername = "localhost";
     $username = "root";
     $password = "";
     $dbname = "login";
    
     try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      
     } catch(PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
     }
     
     if (!filter_var($user_name, FILTER_VALIDATE_EMAIL) === false) {
        $sql = "INSERT INTO user (username, password, logger)
        VALUES ('$user_name', '$pass', '$user_type')";
        // use exec() because no results are returned
        $conn->exec($sql);
        echo "<script>alert('New record created successfully')</script>"; 
    } else {
        echo "<script>alert('not a valid email address')</script>";  
    }
  }

?>