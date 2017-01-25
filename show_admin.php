<!--
  file-name: show_admin.php
  used-for: admin.php
  created-by: Mohit Dadu
  description: it is the user to show all the admins at admin page.
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
    <title>Show Admins</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="asset/vendors/css/bootstrap.css" /> 
  </head>
  <body>

<?php

    //make connections
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "employee";
    
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

?>
		
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
                <!-- <li><a href="add_user.php"><strong>ADD USER</strong></a></li>
                <li><a href="add_admin.php"><strong>ADD ADMIN</strong></a></li> -->
 	        <li><a href="show_user.php"><strong>SHOW USERS</strong></a></li>
                <li><a href="show_admin.php"><strong>SHOW ADMINS</strong></a></li>
              </ul>
		<ul class="nav navbar-nav col-lg-1">
			<li><span style="font-style: italic; font-size: 20px;color: white;">hi <?php echo $name; ?></span></li>
		</ul>
		<ul class="nav navbar-nav navbar-right">
			<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span>&nbsp; LOGOUT</a></li>
		</ul>
	</div>
          </div>
        </div>
      </nav>
    </div>
    <div class="panel panel-default">
			<div class="panel-heading">User's Details</div>
			<div class="panel-body"></div>
			<table  class="table table-striped table-bordered table-hover table-condensed">
        <tr>
          <th>ID</th>
          <th>NAME</th>
          <th>EMAIL</th>
					<th>PASSWORD</th>
					<th></th>
					<th></th>
        </tr>
   
<?php
    $sql = "SELECT Id, Name, Email, Password FROM user WHERE Usertype='Admin'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
?>
<tr>
          <td><?php echo $row["Id"]; ?></td>
          <td><?php echo $row["Name"]; ?></td>
          <td><?php echo $row["Email"]; ?></td>
					<td><?php echo $row["Password"]; ?></td>
					<td><a href="update_admindb.php?id=<?php echo $row['Id']; ?>">Edit</a></td>
					<td><a href="delete_user.php?id=<?php echo $row['Id']; ?>">Delete</a></td>
          </tr>
<?php
				}  // end while loop
    } else {
        echo "0 results";
    }
?>
      </table>
    </div>
	</body>
</html>

<?php 
    $conn->close();
?>
    
  