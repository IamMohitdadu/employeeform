 <!-- 
  file-name: login.php
  used-for: form for user and admin login
  created-by: Mohit Dadu
  description: it is the user login page.
  date:18/01/2017
-->
 
<?php
  // to set the values into the fields using cookies
    if(isset($_COOKIE['email']) and isset($_COOKIE['pass'])){
        $email = $_COOKIE['email'];
        $pass = $_COOKIE['pass'];
        echo "<script>
	document.getElementById('email').value = $email;
	document.getElementById('password').value = $pass;
	</script>";
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
        <form action="process.php" class="form-horizontal container" name="LoginForm" method="post" id="form">
          <div class="container-fluid form-group">
	<div class="col-sm-10">
	  <label class="control-label col-sm-4">User name:</label>
	  <div class="col-sm-6">
	    <input type="text" id="email" name="email" class="form-control" placeholder="Email address"/>
	  </div>
              <br>
	  <label class="control-label col-sm-4">Password:</label>
	  <div class="col-sm-6">
	    <input type="password" id="password" name="password" class="form-control" placeholder="Must be more than 6 characters"/>
	  </div>
	  <div class="col-sm-10">
	    <center><input type="checkbox" name="remember" value="1">Remember me </center>
	  </div>
	</div>
          </div>
          <div class="form-style col-lg-12">
	<div class="col-lg-4"></div>
	<div class="col-lg-2"><a href="forget.php"><span style="font-size: medium;">Forget Password</span></a></div>
	<div class="col-lg-2">
	  <input type="submit" class="btn btn-lg btn-primary btn-block" name="btn-login" value="Login">
	</div>
	<div class="col-lg-4"></div>
          </div>
          <div class="form-style col-lg-8">
	
          </div>    
        </form>		
  </body>
</html>
