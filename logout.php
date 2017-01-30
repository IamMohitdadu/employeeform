
<?php
/**
* file-name: logout.php
* used-for: form for user and admin login
* created-by: Mohit Dadu
* description: The logout file destroys the session expires the cookie redirects to login.php
* date:19/01/2017
*/

	session_start();
	session_destroy();
	header("location: login.php");
	
?>
