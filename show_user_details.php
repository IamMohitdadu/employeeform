<?php

/**
 * file-name: show_user_details.php
 * used-for: user.php
 * created-by: Mohit Dadu
 * description: it is the user profile details.
 * date:18/01/2017
*/

session_start();
  if (isset($_SESSION['email']) and (isset($_SESSION['id']))) {
      $email = $_SESSION['email'];
	  $id = $_SESSION['id'];
	  $name = $_SESSION['name'];
  }
		
    require_once ('filemakerapi/FileMaker.php');
	$fm = new FileMaker('login', '172.16.9.62', 'admin', 'Mohit@249d');
	
	// find the associate layout
	$request = $fm->newFindCommand('registration');
	
	
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
				<div class="col-lg-6">
					<ul class="nav navbar-nav nav-tabs nav-justified ">
						<li><a href="user.php"><strong><span style="font-size: 20px;">My Profile</span></strong></a></li>
						<li class="active"><a href="show_user_details.php"><strong><span style="font-size: 20px;">Edit Details</span></strong></a></li>
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
		<form action="updatedb.php" method="post">
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
   
<?php
	
	$request->addFindCriterion('Id', $id);
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
		foreach ($records as $record) {
?>
			<tr>
			<td><?php echo $record->getField('Id'); ?></td>
			<td><?php echo $record->getField('Name'); ?></td>
			<td><?php echo $record->getField('Email'); ?></td>
			<td><?php echo $record->getField('Password'); ?></td>
			<td><input type='submit' id='edit' name='edit' value='EDIT' onclick='edit()' style='display:block'></td>
			</tr>
<?php		
		}
    }
?>
				</table>			
			</div>
	  </form>
  </body>
</html>