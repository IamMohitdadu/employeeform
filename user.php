<?php
/**
 * file-name: user.php
 * used-for: login.php
 * created-by: Mohit Dadu
 * description: it shows the user home page.
 * date:18/01/2017
*/

session_start();
		if (isset($_SESSION['email']) and (isset($_SESSION['name']))) {
			$email = $_SESSION['email'];
			$name = $_SESSION['name'];
		}
			
		// to connect the database
    require_once ('filemakerapi/FileMaker.php');
	$fm = new FileMaker('login', '172.16.9.62', 'admin', 'Mohit@249d');
	
	// find the associate layout
	$request = $fm->newFindCommand('registration');
	$email = '=="' . $email . '"';
	$request->addFindCriterion('Email', $email);
	$result = $request->execute();
	$records = $result->getRecords();
	
	if (FileMaker::isError($records)) {
		echo $records->getMessage();
		if (! isset($result->code) || strlen(trim($result->code)) < 1) {
			echo 'A System Error Occured';
		} else {
			echo 'No Records Found (Error Code: '.$result->code.')';
		}
	} else {
		foreach($records as $record){
			$id = $record->getField('Id');
			$name = $record->getField('Name');
			$email = $record->getField('Email');
		}
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
								<div class="col-lg-6">
									<ul class="nav navbar-nav nav-tabs nav-justified ">
										<li class="active"><a href="user.php"><strong><span style="font-size: 20px;">My Profile</span></strong></a></li>
										<li><a href="show_user_details.php"><strong><span style="font-size: 20px;">Edit Details</span></strong></a></li>
									</ul>
							  </div>
							</div>
							<ul class="nav navbar-nav navbar col-lg-1">
								<p style="font-style: italic; color: white;" class="navbar-text">hi <?php echo $name; ?></p>
								<!--<li><span style="font-style: italic; font-size: 20px;color: white;">hi <?php echo $name; ?></span></li>
							--></ul>
							<ul class="nav navbar-nav navbar-right">
								<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span>&nbsp;&nbsp; LOGOUT</a></li>
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
  </body>
</html>
