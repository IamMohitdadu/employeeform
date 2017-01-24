<!--
  file-name: register.php
  used-for: form for registration of user and admin.
  created-by: Mohit Dadu
  description: it is the php file which redirect the user to the user login or admin login page.
  date:18/01/2017
-->

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
			<marquee height=40> <h4 style="color: red;">Welcome to Employee Management Portal </h4></marquee>
		</div>
		<nav class="navbar navbar-inverse">
			<div class="row">
				<div class="container-fluid">
					<div class="collapse navbar-collapse" id="myNavbar">
						<ul class="nav navbar-nav nav-tabs nav-justified">
							
							<li><a href="register.php" style="font-weight: 900; color: lightblue;"><span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;Registration </a></li>
							<li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span>&nbsp;&nbsp;Login</a></li>
						</ul>
					</div>
				</div>
			</div>
		</nav>
		<form action="mydb.php" class="form-horizontal container" name="LoginForm" method="post" id="form">
			<div class="container-fluid form-group">
				<div class="col-sm-10">
					<label class="control-label col-sm-4">Name:</label>
					<div class="col-sm-6">
						<input type="text" id="name" name="name" class="form-control" placeholder="Your Name"/>
						<!-- <p id="usr">Enter valid email address</p> -->
					</div>
					<label class="control-label col-sm-4">User name:</label>
					<div class="col-sm-6">
						<input type="text" id="email" name="email" class="form-control" placeholder="Email address"/>
						<!-- <p id="usr">Enter valid email address</p> -->
					</div>
					<label class="control-label col-sm-4">Password:</label>
					<div class="col-sm-6">
						<input type="password" id="password" name="password" class="form-control" placeholder="should be atleast 6 characters"/>
						<!-- <p id="psd">Should be 6-character</p> -->
					</div>
					<label class="control-label col-sm-4">Register As:</label>
					<div class = "col-sm-6">
						<select id="select-user" class="from-control" name="userType">
							<option value="Admin">Admin</option>
							<option value="User">User</option>
							<!-- <p id="lgr">Select User Type</p> -->
						</select>
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
		<!-- <script type="text/javascript" src="asset/js.script.js"></script> -->
  </body>
</html>
