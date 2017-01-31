<?php
/**
 * file-name: user.php
 * used-for: login.php
 * created-by: Mohit Dadu
 * description: it shows the user home page.
 * date:18/01/2017
*/

	// starting the session 
	session_start();
	
	// checking the session is present or not
	if (!isset($_SESSION['email'])) {
		header("Location: login.php");
	}
	// assign session to the session valriable
	$email = $_SESSION['email'];
		
	// to connect the database
    require_once ('filemakerapi/FileMaker.php');
	$fm = new FileMaker('login', '172.16.9.62', 'admin', 'Mohit@249d');
	
	// find the associate layout
	$request = $fm->newFindCommand('registration');
	$email = '=="' . $email . '"';
	$request->addFindCriterion('Email', $email);
	$result = $request->execute();
	$records = $result->getRecords();

	foreach($records as $record){
		$id = $record->getField('Id');
		$name = $record->getField('Name');
		$email = $record->getField('Email');
	}

?>
<!DOCTYPE html>
<html>
  <head>
    <title>HOME PAGE</title>
  	  <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" type="text/css" href="asset/vendors/css/bootstrap.css"/> 
      <link rel="stylesheet" type="text/css" href="asset/css/styles.css" />  
  </head>
  <body>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script type="text/javascript" src="asset/vendors/js/bootstrap.js"></script>
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
	  <marquee height=40> 
		<h4 style="color: red;">Welcome to Employee Management Portal </h4>
	  </marquee>
	</div>
    <div>
      <nav class="navbar navbar-inverse">
        <div class="row">
          <div class="container-fluid">
            <div class="collapse navbar-collapse" id="my-navbar">
              <div class="nav navbar-nav col-lg-8">
				<div class="col-lg-6">
				  <ul class="nav navbar-nav nav-tabs nav-justified ">
					<li class="active">
					  <strong><span style="color:lightblue; font-size:25px">
						My Profile</span></strong></a>
					</li>
				  </ul>
				</div>
			  </div>
			  <ul class="nav navbar-nav navbar col-lg-2">
				<p style="font-style: italic; color: white;" class="navbar-text">
				  hi <?php echo $name; ?></p>
			  </ul>
			  <ul class="nav navbar-nav navbar-right">
			    <li><a href="logout.php"><span class="glyphicon glyphicon-log-out">
					</span>&nbsp;&nbsp; LOGOUT</a></li>
			  </ul>
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
	<div class="container">
	  <div class="row">
	    <div class="col-md-12">
		<form action="#">
	      <div class="pull-right">
	        <button class="btn btn-success" data-toggle="modal" 
				data-target="#add_new_record_modal">Edit Profile Details</button>
	      </div>
		</form>
	    </div>
	  </div>
	</div>

	<!-- Bootstrap Modal - To Edit Record -->
	<div class="modal fade" id="add_new_record_modal" tabindex="-1" 
		role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
		<form action="savedb.php" method="post">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" 
				aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="myModalLabel">Edit Profile:</h4>
	      </div>
	      <div class="modal-body">
	        <div class="form-group">
	          <label for="first_name">Name: </label>
	          <input type='text' id='name' name='name' class='form-control'
				placeholder='Enter Name' value= '<?php echo $name; ?>'>
	        </div>
	        <div class="form-group">
	          <label for="last_name">Email Address: </label><br>
	          <input type='email' id='email' name='email' class='form-control' 
				placeholder='Enter Email Address' value='<?php echo $email; ?>'>
	        </div>
	 
	        <div class="form-group">
	          <label for="email">Password: </label>
	          <input type='password' id='pass' name='pass' class='form-control' 
				placeholder='Enter New Password'>
	        </div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
	        <button type='submit' class="btn btn-primary" name='save' id='save' >Save</button>
	      </div>
		</form>
	    </div>
	  </div>
	</div>
  </body>
</html>