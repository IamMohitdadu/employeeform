<!--
  file-name: admin.php
  used-for: form for login as admin
  created-by: Mohit Dadu
  description: it shows the option for adding new user or admin.
	date:18/01/2017
-->

<!DOCTYPE html>

<html>
  <head>
    <meta charset="utf-8"/>
    <title>LOGIN PAGE</title>
    <link rel="stylesheet" type="text/css" href="asset/css/style.css" />
    <link rel="stylesheet" type="text/css" href="asset/vendors/css/bootstrap.css" /> 
  </head>
  <body>
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
  </body>
</html>
