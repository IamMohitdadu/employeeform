<!--
  file-name: add_user.php
  used-for: admin.php
  created-by: Mohit Dadu
  description: it is the user to add new user by admin.
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
						<ul class="nav navbar-nav col-lg-4">
							<li class="active"><a href="index.php"><span class="glyphicon glyphicon-home"></span>&nbsp HOME</a></li>
						</ul>
            <p><span class="col-lg-8" style="font-size: 50px">ADD USER</span></p>
					</div>
				</div>
			</div>
		</nav>
		<form action="process.php" class="form-horizontal container" name="addUser" method="post" id="form">
			<div class="container-fluid form-group">
				<div class="col-sm-10">
                    <label class="control-label col-sm-4">Name:</label>
					<div class="col-sm-6">
						<input type="text" id="name" name="name" class="form-control" placeholder="Your Name"/>
					</div>
					<label class="control-label col-sm-4">Email:</label>
					<div class="col-sm-6">
						<input type="text" id="email" name="email" class="form-control" placeholder="Email address"/>
					</div>
					<br>
					<label class="control-label col-sm-4">Password:</label>
					<div class="col-sm-6">
						<input type="password" id="password" name="password" class="form-control" placeholder="Must be more than 6 characters"/>
					</div>
				</div>
			</div>
			<div class="form-style">
				<center><input type='submit' name='btn-add' value='Submit'></center>
			</div>      
    </form>
  </body>
</html>
