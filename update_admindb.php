<!--
  file-name: updatedb.php
  used-for: show_user.php and show_admin.php
  created-by: Mohit Dadu
  description: it is the php file to connect with database and update data into table.
  date:19/01/2017
-->

<?php
	session_start();
	
	if((isset($_SESSION['email']) and (isset($_SESSION['pass'])))){
		$id = $_SESSION['id'];
		$name = $_SESSION['name'];
		$email = $_SESSION['email'];
		$pass = $_SESSION['pass'];
	}

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "employee";
    
		if (isset($_GET['id'])){
		
				$error = false;
				try{
						// Check connection
						$conn = new mysqli($servername, $username, $password, $dbname);
				}
				catch(Exception $e) {
					echo  "Connection failed: " . $e->mysqli_connect_error();
				}
				$id=$_GET['id'];
				$sql = "SELECT Id, Name, Email, Password, Usertype FROM user WHERE id = $id";
				$result = $conn->query($sql);
				$row = $result->fetch_assoc();
				$email= $row['Email'];				
		}
				
				
		if (isset($_POST['save'])){
				echo $id;
				echo $_POST['name'];
				echo $email;
				echo $_POST['pass'];
				$error = false;
				try{
						// Check connection
					$conn = new mysqli($servername, $username, $password, $dbname);
				}
				catch(Exception $e) {
					echo  "Connection failed: " . $e->mysqli_connect_error();
				}
				
				// clean user input to prevent sql injection.
				$name = trim($_POST['name']);
				$name = strip_tags($name);
				$name = htmlspecialchars($name);
				
				$pass = trim($_POST['pass']);
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
						$sql = "UPDATE user SET Name='$name', Password='$pass' WHERE Id='$id'";
						if (mysqli_query($conn, $sql)) {
							  if ($_row['Usertype'] === 'Admin'){
									header("Location: show_admin.php");
								}else {
									header("Location: show_user.php");
								}
						}
				} else {
						$errMSG = "Please Enter the correct information. ";
						echo "$errMSG";
				}
				}
?>


<!DOCTYPE html>

<html>
  <head>
    <title>Show User</title>
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
                <li><a href="admin.php"><span class="glyphicon glyphicon-home"></span>&nbsp;&nbsp;Home</a></li>
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
	<form action="" method="post">
    <div class="panel panel-default">
	  <div class="panel-heading">My Profile Details</div>
	  <div class="panel-body"></div>
      <table  class="table table-striped table-bordered table-hover table-condensed">
        <tr>
          <th>ID</th>
          <th>NAME</th>
          <th>EMAIL</th>
          <th>PASSWORD</th>
		      <th></th>
        </tr>
		<tr>
          <td><?php echo $id; ?></td>
          <td><input type='text' id='name' name='name' class='form-control' placeholder='Your Name'>
							<span id="name-info">
								<?php
								if(isset($nameError)){
									echo $err;
								} ?>
							</span><br/>
					</td>
          <td><?php echo $email; ?></td>
          <td><input type='text' id='pass' name='pass' class='form-control' placeholder='Enter New Password'>
							<span id="name-info">
								<?php
								if(isset($passError)){
									echo $passError;
								} ?>
							</span><br/>
					</td>
		  <td><input type= 'submit' name='save' id='save' value='save'></td>
        </tr>
   </table>
	</div>
	</form> 
  </body>
</html>
