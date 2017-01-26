
<?php
  
/**
	* file-name: admin.php
	* used-for: form for login as admin
	* created-by: Mohit Dadu
	* description: it shows the option for adding new user or admin.
	* date:18/01/2017
* */



session_start();
		if (isset($_SESSION['email']) and (isset($_SESSION['name']))) {
				$email = $_SESSION['email'];
				$name = $_SESSION['name'];
		}
			
		//make connections
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "employee";
		
		try{
				// Check connection
				$conn = new mysqli($servername, $username, $password, $dbname);
			} catch(Exception $e) {
					echo  "Connection failed: " . $e->mysqli_connect_error();
			}
			
			$sql = "SELECT Id, Name, Email FROM user WHERE Email= '$email'";
			$result = $conn->query($sql);
			if ($result->num_rows === 1) {
					// output data of each row
					while($row = $result->fetch_assoc()) {
						$id = $row['Id'];
						$name = $row['Name'];
						$email = $row['Email'];
					}  // end while loop
			} else {
					echo "No Details Available";
			}
?>

<!DOCTYPE html>

<html>
  <head>
    <title>HOME PAGE</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="asset/vendors/css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="asset/css/styles.css" /> 
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
							<div class="col-lg-9">
								<ul class="nav navbar-nav nav-tabs nav-justified ">
									<li class="active"><a href="admin.php"><span class="glyphicon glyphicon-home" style="font-size: 20px;"></span>&nbsp;My Profile</a></li>
									<li><a href="show_user.php"><strong>SHOW USERS</strong></a></li>
									<li><a href="show_admin.php"><strong>SHOW ADMINS</strong></a></li>
								</ul>
							</div>
							<div class="nav navbar-nav col-lg-1">
								<div class="nav navbar-nav navbar-right">
									<p style="font-style: italic; color: white;" class="navbar-text">hi <?php echo $name; ?></p>
								</div>
							</div>
							<div class="nav navbar-nav navbar col-lg-2">
								<ul class="nav navbar-nav navbar-right">
									<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span>&nbsp; LOGOUT</a></li>
								</ul>
							</div>
						</div>
          </div>
        </div>
      </nav>
    </div>
		<div class="about">
			<p class="id">
				<span class="glyphicon glyphicon-user"></span> <?php echo $id ?> 
			</p>
			<p class="name">
				<span class="glyphicon glyphicon-user"></span> <?php echo $name ?>
			</p>
			<p class="email">
				<span class="glyphicon glyphicon-envelope"></span> <?php echo $email ?> 
			</p>
		</div>
		
		
  </body>
</html>