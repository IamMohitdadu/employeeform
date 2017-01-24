<!--
  file-name: user.php
  used-for: form for login as user
  created-by: Mohit Dadu
  description: it shows the option for adding new user or admin.
	date:18/01/2017
-->


<?php
		session_start();
		if(isset($_SESSION['name'])){
				$name = $_SESSION['name'];
		}
?>

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
              <ul class="nav navbar-nav col-lg-10">
                <li><a href="show_user_details.php"><strong>&nbsp;&nbsp;&nbsp;&nbsp; My Profile</strong></a></li>
              </ul>
							<ul class="nav navbar-nav navbar col-lg-1">
								<li><span style="font-style: italic; font-size: 20px;color: white;">hi <?php echo $name; ?></span></li>
							</ul>
							<ul class="nav navbar-nav navbar-right">
								<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span>&nbsp;&nbsp; LOGOUT</a></li>
							</ul>
						</div>
          </div>
        </div>
      </nav>
    </div>
  </body>
</html>
