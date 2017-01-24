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
    <link rel="stylesheet" type="text/css" href="asset/css/style.css" />
    <link rel="stylesheet" type="text/css" href="asset/vendors/css/bootstrap.css" /> 
  </head>
  <body>

<?php

    //make connections
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "login";
    
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

?>
     <div>
      <nav class="navbar navbar-inverse">
        <div class="row">
          <div class="container-fluid">
            <div class="collapse navbar-collapse" id="my-navbar">
              <ul class="nav navbar-nav">
                <li><a href="add_user.php"><strong>ADD USER</strong></a></li>
                <li><a href="add_admin.php"><strong>ADD ADMIN</strong></a></li>
								        <li><a href="show_user.php"><strong>SHOW USERS</strong></a></li>
                <li><a href="show_admin.php"><strong>SHOW ADMINS</strong></a></li>
              </ul>
							       <center><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span>&nbsp; LOGOUT</a></center>
						      </div>
          </div>
        </div>
      </nav>
    </div>
    <div>
      <table  class="table-striped table-bordered table-hover table-condensed">
        <tr>
          <th>ID</th>
          <th>NAME</th>
          <th>EMAIL</th>
        </tr>
   
<?php
    $sql = "SELECT * FROM user WHERE User_Type='User'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
          echo "<tr>";
          echo "<td>" . $row["id"]. "</td>";
          echo "<td>" . $row["Name"]. "</td>";
          echo "<td>" . $row["Email"] . "</td>";
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