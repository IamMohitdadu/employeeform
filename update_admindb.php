<?php
/**
 * file-name: updatedb.php
 * used-for: show_user.php and show_admin.php
 * created-by: Mohit Dadu
 * description: it is the php file to connect with database and update data into table.
 * date:19/01/2017
*/
	session_start();
	
	if((isset($_SESSION['email']) and (isset($_SESSION['pass'])))){
		
		$id = $_SESSION['id'];
		$nm = $_SESSION['name'];
		$email = $_SESSION['email'];
		$pass = $_SESSION['pass'];
	}
	
	// to connect the database
    require_once ('filemakerapi/FileMaker.php');
	$fm = new FileMaker('login', '172.16.9.62', 'admin', 'Mohit@249d');
	if (isset($_GET['id'])){

		$id=$_GET['id'];

		// find the associate layout
		$request = $fm->newFindCommand('registration');
		$request->addFindCriterion('Id', $id);
		$result = $request->execute();
		$records = $result->getRecords();
		
		if (FileMaker::isError($records)) {
			echo $records->getMessage();
			if (! isset($result->code) || strlen(trim($result->code)) < 1) {
				echo 'Please try again';
			} else {
				echo 'No Records Found (Error Code: '.$result->code.')';
			}
		} else {
			foreach($records as $record){
				$id = $record->getField('Id');
				$name = $record->getField('Name');
				$email = $record->getField('Email');
				$pwd = $record->getField('Password');
				$userType = $record->getField('Usertype');
			}	
		}			
	}
		
	if (isset($_POST['save'])){
		echo $id;
		echo $_POST['name'];
		echo $email;
		echo $_POST['pass'];
		$error = false;
		
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
				$nameError = "Please enter the name.";
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
			
			$request = $fm->newFindCommand('registration');
			$request->addFindCriterion('Id', $id);
			$result = $request->execute();
			
			if (FileMaker::isError($result)) {
				echo $result->getMessage();
				if (! isset($result->code) || strlen(trim($result->code)) < 1) {
					echo 'A System Error Occured';
				} else {
					echo 'No Records Found (Error Code: '.$result->code.')';
				}
			} else {
				$records = $result->getRecords();
				foreach ($records as $record) {
					$record->setField('Name', $name);
					$record->setField('Password', $pass);
					$record->commit();
				}
				
				if ($record->getField('Usertype') === 'Admin'){
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
              <div class="nav navbar-nav col-lg-9">
				<ul class="nav navbar-nav nav-tabs">
					<li><a href="admin.php"><span class="glyphicon glyphicon-home"></span>&nbsp;&nbsp;Home</a></li>
				</ul>
			</div>
			<div class="nav navbar-nav col-lg-1">
				<div class="nav navbar-nav navbar-right">
					<p style="font-style: italic; color: white;" class="navbar-text">hi <?php echo $nm; ?></p>
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
		<form action="" method="post">
			<div class="panel panel-default">
			<div class="panel-heading">User Profile Details</div>
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
						<td><input type='text' id='name' name='name' class='form-control' placeholder='Enter Name' value='<?php echo $name; ?>'>
							<span id="name-info" style="color: red">
								<?php
								if(isset($nameError)){
									echo $nameError;
								} ?>
							</span><br/>
						</td>
						<td><?php echo $email; ?></td>
						<td><input type='text' id='pass' name='pass' class='form-control' placeholder='Enter New Password'>
							<span id="name-info" style="color: red">
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
