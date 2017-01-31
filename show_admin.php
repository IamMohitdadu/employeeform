
<?php

/**
 * file-name: show_admin.php
 * used-for: admin.php
 * created-by: Mohit Dadu
 * description: it is the user to show all the admins at admin page.
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
	$nm = $_SESSION['name'];

	// to connect the database
    require_once ('filemakerapi/FileMaker.php');
	$fm = new FileMaker('login', '172.16.9.62', 'admin', 'Mohit@249d');
	
	// find the associate layout
	$request = $fm->newFindCommand('registration');
	
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Show Admins</title>
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
			  <div class="col-lg-9">
				<ul class="nav navbar-nav nav-tabs nav-justified ">
				  <li><a href="admin.php">
				  <span class="glyphicon glyphicon-home" style="font-size: 20px;"></span>
					&nbsp;&nbsp;My Profile</a></li>
				  <li><a href="add_users.php"><strong>ADD USERS/ADMIN</strong></a></li>
				  <li><a href="show_user.php"><strong>SHOW USERS</strong></a></li>
				  <li class="active"><a href="show_admin.php"><strong>SHOW ADMINS</strong></a></li>
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
    <div class="panel panel-default">
	  <div class="panel-heading">Admin's Details</div>
	  <div class="panel-body"></div>
	  <table  class="table table-striped table-bordered table-hover table-condensed">
        <tr>
		  <th>ID</th>
		  <th>NAME</th>
		  <th>EMAIL</th>
		  <th>PASSWORD</th>
		  <th><span class="glyphicon glyphicon-pencil	"></span>&nbsp;&nbsp;EDIT</th>
		  <th><span class="glyphicon glyphicon-trash"></span>&nbsp;&nbsp;DELETE</th>
	    </tr>
   
		<?php

			$request->addFindCriterion('Usertype', 'Admin');
			$result = $request->execute();
			$records = $result->getRecords();
			
			// check for error
			if (FileMaker::isError($records)) {
				echo $records->getMessage();
				if (! isset($result->code) || strlen(trim($result->code)) < 1) {
					echo 'A System Error Occured';
				} else {
					echo 'No Records Found (Error Code: '.$result->code.')';
				}
			} else {
				// Loop through the associate records 
				foreach ($records as $record) {
		?>
		<tr>
		  <td><?php echo $record->getField('Id'); ?></td>
		  <td><?php echo $record->getField('Name'); ?></td>
		  <td><?php echo $record->getField('Email'); ?></td>
		  <td><?php echo $record->getField('Password'); ?></td>	
		  <td><a href="update_admindb.php?id=<?php echo $record->getField('Id'); ?>">Edit</a></td>
		  <?php if(!($email == $record->getField('Email'))) { ?>
		  <td><a href="delete_user.php?id=<?php echo $record->getField('rec_id'); ?>">Delete</a></td>
		  <?php  } else { ?>
  		  <td></td>
<?php
			}		
		}
	}
?>	
		</tr>
      </table>
    </div>
  </body>
</html> 