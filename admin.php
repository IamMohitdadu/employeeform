<!--
  file-name: admin.php
  used-for: form for login as admin
  created-by: Mohit Dadu
  description: it shows the option for adding new user or admin.
	date:18/01/2017
-->

<!DOCTYPE html>

<html>
  <head>
    <title>HOME PAGE</title>
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
    <div>
      <nav class="navbar navbar-inverse">
        <div class="row">
          <div class="container-fluid">
            <div class="collapse navbar-collapse" id="my-navbar">
              <ul class="nav navbar-nav">
                <li><a href="add_user.php"><strong>ADD USER</strong></a></li>
                <li><a href="add_admin.php"><strong>ADD ADMIN</strong></a></li>
								<li><a href="show_user.php"><strong>SHOW USERS</strong></a></li>
                <li><a href="show_admin.php"><strong>SHOW ADMINS</strong></a></li>
              </ul>
							<ul class="nav navbar-nav navbar-right">
								<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span>&nbsp; LOGOUT</a></li>
							</ul>
						</div>
          </div>
        </div>
      </nav>
    </div>
  </body>
</html>
