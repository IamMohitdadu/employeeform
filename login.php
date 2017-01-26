<?php
/**
  * file-name: login.php
  * used-for: form for user and admin login
  * created-by: Mohit Dadu
  * description: it is the user login page.
  * date:18/01/2017
**/
 
  // to set the values into the fields using cookies
    if(isset($_COOKIE['email']) and isset($_COOKIE['pass'])){
        $email = $_COOKIE['email'];
        $pass = $_COOKIE['pass'];
        echo "<script>
			document.getElementById('email').value = $email;
			document.getElementById('password').value = $pass;
			</script>";
    }

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
		$err = "Connection failed:";
	}
	
    // execute if login 
    if( isset($_POST['btn-login']) ) {
		
		$error = false;
		
		$email = trim($_POST['email']);
		$email = strip_tags($email);
		$email = htmlspecialchars($email);
		
		$pass = trim($_POST['password']);
		$pass = strip_tags($pass);
		$pass = htmlspecialchars($pass);
		
		// validation for email.
		if (empty($email)) {
			$error = true;
			$emailError = "Please enter your email address.";
		} else if ( !filter_var($email,FILTER_VALIDATE_EMAIL)) {
			$error = true;
			$emailError = "Please enter valid email address.";
		}
		
		// validation for password  
		if (empty($pass)) {
			$error = true;
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
				$err = "Please Enter the valid details, Try again...";
			}
		} 
	}
?>		
		
<!DOCTYPE html>
<html>
  <head>
    <title>LOGIN PAGE</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="asset/vendors/css/bootstrap.css" /> 
  </head>
  <body>
    <nav class="navbar navbar-default col-md-12">
      <div class="row">
		<div class="col-md-3">
		  <img src="asset/images/logo.jpg" alt="logo" height="120px" width="120px">
		</div>
		<div class="col-md-7">
		  <div class="container-fluid header text-center">
			<h1>Employee Management Portal</h1>
		  </div>
		</div>
      </div>
    </nav>
	<div class="marquee">
	  <marquee height=40> <h4 style="color: red;">Welcome to Employee Management Portal </h4></marquee>
	</div>
	<nav class="navbar navbar-inverse">
	  <div class="row">
		<div class="container-fluid">
		  <div class="collapse navbar-collapse" id="myNavbar">
				<ul class="nav navbar-nav nav-tabs nav-justified">
					<li><a href="register.php"><span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;Registration </a></li>
					<li><a href="login.php" style="font-weight: 900; color: lightblue;"><span class="glyphicon glyphicon-log-in"></span>&nbsp;&nbsp;Login</a></li>
				</ul>
		  </div>
		</div>
      </div>
    </nav>
    <form action="" class="form-horizontal container" name="LoginForm" method="post" id="form">
      <div class="container-fluid form-group">
		<div class="col-sm-10">
		  <label class="control-label col-sm-4">User name:</label>
		  <div class="col-sm-6">
		    <input type="text" id="email" name="email" class="form-control" placeholder="Email address"/>
			<span id="name-info">
			  <?php
				if(isset($emailError)){
				  echo $emailError;
				} ?>
			</span><br/>
		  </div>
		  <br>
		  <label class="control-label col-sm-4">Password:</label>
		  <div class="col-sm-6">
		    <input type="password" id="password" name="password" class="form-control" placeholder="Must be more than 6 characters"/>
			<span id="name-info">
			  <?php
				if(isset($passError)){
				  echo $passError;
				} ?>
			</span><br/>	  
		  </div>
	    </div>
      </div>
      <div class="form-style col-lg-12">
	    <div class="col-lg-6"></div>
	    <div class="col-lg-2">
	      <input type="submit" class="btn btn-lg btn-primary btn-block" name="btn-login" value="Login">
	    </div>
	    <div class="col-lg-4"></div>
	  </div>
      <div class="form-style col-lg-8"></div>    
    </form>
    <span id="name-info">
        <?php
          if(isset($err)){
            echo $err;
          } ?>
    </span><br/>
  </body>
</html>
