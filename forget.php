<!--
  file-name: forget.php
  used-for: forget password at login page
  created-by: Mohit Dadu
  description: it is the php file which sends the mail to the user when the
                user forget the password
	date:18/01/2017
-->

<?php
    $connection = mysqli_connect('localhost', 'root', '');
    if (!$connection){
        echo ("Database Connection Failed" . mysqli_error($connection));
    }
    $select_db = mysqli_select_db($connection, 'employee');
    if (!$select_db){
        echo ("Database Selection Failed" . mysqli_error($connection));
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
        <form class="form-signin" method="POST">
			<nav class="navbar navbar-inverse">
				<div class="row">
					<div class="container-fluid">
						<div class="collapse navbar-collapse" id="myNavbar">
							<p><span class="col-lg-8" style="font-size: 30px; color: white;">Forget Password</span></p>
						</div>
					</div>
				</div>
			</nav>
            
            <div class="input-group">
                <span class="input-group-addon" id="basic-addon1">Enter Your Email Address:</span>
                <input type="text" name="email" class="form-control" placeholder="Username" required>
            </div>
            <br />
            <button class="btn btn-lg btn-primary btn-block" type="submit">Submit</button>
            <a class="btn btn-lg btn-primary btn-block" href="login.php">Login</a>
        </form>
        
<?php
    if(isset($_POST) & !empty($_POST)){
        
        $email = mysqli_real_escape_string($connection, $_POST['email']);
        $sql = "SELECT Email, Password FROM user WHERE Email = '$email'";
        $res = mysqli_query($connection, $sql);
        $count = mysqli_num_rows($res);
        if($count == 1){
            $row = mysqli_fetch_assoc($res);
            $pass = $row['Password'];
            $to = $row['Email'];
            $subject = "Your Recovered Password";
    
            $message = "Please use this password to login " . $pass;
            $headers = "From : mohitdadu249@gmail.com";
            if(mail($to, $subject, $message, $headers)){
                echo "Your Password has been sent to your email id";
            }else{
                echo "Failed to Recover your password, try again";
            }
        }else{
            echo "User name does not exist in database";
        }
    }
        
?>
