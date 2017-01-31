
<?php

/**
 * file-name: register.php
 * used-for: form for registration of user and admin.
 * created-by: Mohit Dadu
 * description: it is the php file which redirect the user to the user login or admin login page.
 * date:18/01/2017
*/

if(isset($_POST['btn-signup'])) {
    
	$error = false;
    // to connect the database
    require_once ('filemakerapi/FileMaker.php');
	$fm = new FileMaker('login', '172.16.9.62', 'admin', 'Mohit@249d');
	
	// find the associate layout
	$request = $fm->newFindCommand('registration');
    
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
		
		$record = $fm->createRecord('registration');
		$record->setField('Name', $name);
		$record->setField('Email', $email);
		$record->setField('Password', $pass);
		$record->setField('Usertype', 'User');
		$result = $record->commit();
		
		if (FileMaker::isError($result)) { 
			$errMSG = 'Email already exists';
		} else {
			$errMSG = 'Registered successfully. Please login...........';
		}
    }
}

?>
<!DOCTYPE html>
<html>
  <head>
    <title>REGISTER PAGE</title>
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
	  <marquee height=40> <h4 style="color: red;">Welcome to Employee Management Portal </h4></marquee>
	</div>
	<nav class="navbar navbar-inverse">
	  <div class="row">
		<div class="container-fluid">
		  <div class="collapse navbar-collapse" id="myNavbar">
			<ul class="nav navbar-nav nav-tabs nav-justified">							
			  <li><a href="register.php" style="font-weight: 900; color: lightblue;">
				<span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;Registration </a></li>
			  <li><a href="login.php"><span class="glyphicon glyphicon-log-in">
				</span>&nbsp;&nbsp;Login</a></li>
			</ul>
		  </div>
		</div>
	  </div>
	</nav>
    <form action="" class="form-horizontal container" name="LoginForm" method="post" id="form">
	  <div class="container-fluid form-group">
		<div class="col-sm-10">
		  <label class="control-label col-sm-4">Name:</label>
		  <div class="col-sm-6">
			<input type="text" id="name" name="name" class="form-control" placeholder="Your Name"/>
		  	  <span id="mailinfo" style="color: red;">
				<?php
				if(isset($nameError)){
				echo $nameError;
				}
				?>
			  </span><br/>
		  </div>
		  <label class="control-label col-sm-4">User name:</label>
		  <div class="col-sm-6">
			<input type="text" id="email" name="email" class="form-control" placeholder="Email address"/>
	  		  <span id="mailinfo" style="color: red">
				<?php
				  if(isset($emailError)){
					echo $emailError;
				  }
				 ?>
              </span><br/>
		  </div>
		  <label class="control-label col-sm-4">Password:</label>
		  <div class="col-sm-6">
			<input type="password" id="password" name="password" class="form-control" placeholder="should be atleast 6 characters"/>
			  <span id="mailinfo" style="color: red">
				<?php
				  if(isset($passError)){
					echo $passError;
				  }
				 ?>
			</span><br/>
		  </div>
		</div>
	  </div>
	  <div class="form-style">
		<div class="col-lg-6"></div>
		<div class="col-lg-2">
		  <input type='submit' class="btn btn-lg btn-primary btn-block" name='btn-signup' value='Sign Up'>
		</div>
	    <div class="col-lg-4"></div>
	  </div>      
    </form>
	<div class="col-lg-8">
	  <center><span style="color: red">
		<?php
			if (isset($errMSG)) {
				echo "$errMSG";
			}
		?>
	  </span></center>
	</div>
  </body>
</html>
