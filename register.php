<!--
  file-name: form.php
  used-for: form for registration of user and admin.
  created-by: Mohit Dadu
  description: it is the php file which redirect the user to the user login or admin login page.
  date:18/01/2017
-->

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8"/>
    <title>LOGIN PAGE</title>
    <link rel="stylesheet" type="text/css" href="asset/css/style.css"/>
    <link rel="stylesheet" type="text/css" href="asset/vendors/css/bootstrap.css" /> 
  </head>
  <body>
		<nav class="navbar navbar-inverse">
			<div class="row">
				<div class="container-fluid">
					<div class="collapse navbar-collapse" id="myNavbar">
						<ul class="nav navbar-nav">
							<li class="active"><a href="form.php"><span class="glyphicon glyphicon-home"></span>&nbsp HOME</a></li>
							<li><a href="register.php" class="active" style="color: green">Registration </a></li>
							<li><a href="login.php" >Login</a></li>
						</ul>
					</div>
				</div>
			</div>
		</nav>
		<form action="mydb.php" class="form-horizontal container" name="LoginForm" method="post" id="form">
			<div class="container-fluid form-group">
				<div class="col-sm-10">
					<label class="control-label col-sm-4">User name:</label>
					<div class="col-sm-6">
						<input type="text" id="user-name" name="username" class="form-control" placeholder="Email address"/>
						<!-- <p id="usr">Enter valid email address</p> -->
					</div>
					<br>
					<label class="control-label col-sm-4">Password:</label>
					<div class="col-sm-6">
						<input type="text" id="password" name="password" class="form-control" placeholder="Must be more than 6 characters"/>
						<!-- <p id="psd">Should be 6-character</p> -->
					</div>
					<!--
					<label class="control-label col-sm-4">Confirm Password:</label>
					<div class="col-sm-6">
						<input type="text" id="cnf-password" name="password" class="form-control" placeholder="Must be more than 6 characters"/>
						<p id="cnf-psd">Should be same as Password</p> -->
					</div>
					<label class="control-label col-sm-4">Login As:</label>
					<div class = "col-sm-6">
						<select id="select-user" class="from-control" name="logger">
							<option value="Admin">Admin</option>
							<option value="User">User</option>
							<!-- <p id="lgr">Select User Type</p> -->
						</select>
					</div>
				</div>
			</div>
			<div class="form-style">
				<a href=""><center>forget password</center></a>
			</div>
			<div class="form-style">
				<center><input type='submit' name='btn-signup' value='Sign Up'></center>
			</div>      
    </form>
		<!-- <script type="text/javascript" src="asset/js.script.js"></script> -->
  </body>
</html>
