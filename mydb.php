<!--
  file-name: mydb.php
  used-for: register.php
  created-by: Mohit Dadu
  description: it is the php file to connect with database and insert data into table.
  date:19/01/2017
-->

<?php

if(isset($_POST['btn-signup'])) {
    $name = mysql_real_escape_string($_POST["name"]);
    $email = mysql_real_escape_string($_POST["email"]);
    $pass =  mysql_real_escape_string($_POST["password"]);
    $user_type = mysql_real_escape_string($_POST["userType"]); 
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
     
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $sql = "INSERT INTO user (Name, Email, Password, User_Type )
        VALUES ('$name', '$email', '$pass', '$user_type')";
        // use exec() because no results are returned
        $conn->exec($sql);
        echo ('New record created successfully');
        exit();
    } else {
        echo ('Please Enter a valid email address');
        exit();
    }
  }

?>