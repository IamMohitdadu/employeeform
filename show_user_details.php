<!--
  file-name: show_user_details.php
  used-for: admin.php
  created-by: Mohit Dadu
  description: it is the user to show all the users at admin page.
  date:18/01/2017
-->


<!DOCTYPE html>

<html>
  <head>
    <title>Show User</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="asset/vendors/css/bootstrap.css" /> 
  </head>
  <body>

<?php
		
  session_start();
  if (isset($_SESSION['email'])) {
      $email = $_SESSION['email'];
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
              <ul class="nav navbar-nav">
                <li><a href="show_user_details.php"><strong>&nbsp;&nbsp;&nbsp;&nbsp;My Profile</strong></a></li>
              </ul>
							<ul class="nav navbar-nav navbar-right">
								<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span>&nbsp;&nbsp; LOGOUT</a></li>
							</ul>
						</div>
          </div>
        </div>
      </nav>
    </div>
    <div class="panel panel-default">
			<div class="panel-heading">My Profile Details</div>
			<div class="panel-body"></div>
      <table  class="table table-striped table-bordered table-hover table-condensed">
        <tr>
          <th>ID</th>
          <th>NAME</th>
          <th>EMAIL</th>
        </tr>
   
<?php
    $sql = "SELECT Id, Name, Email FROM user WHERE Email= '$email'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
          echo "<tr>";
          echo "<td>" . $row['Id']. "</td>";
          echo "<td>" . $row['Name']. "</td>";
          echo "<td>" . $row['Email'] . "</td>";
          echo "</tr>";
        }  // end while loop
    } else {
        echo "0 results";
    }
?>
      </table>
    </div>

<?php 
    $conn->close();
?>
    
  </body>
</html>