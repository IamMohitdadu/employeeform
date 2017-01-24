<!--
  file-name: logout.php
  used-for: form for user and admin login
  created-by: Mohit Dadu
  description: The logout file destroys the session expires the cookie redirects to login.php
  date:19/01/2017
-->

<?php
/**
* The logout file
* destroys the session
* expires the cookie
* redirects to login.php
*/
session_start();
session_destroy();
if(isset($_COOKIE['email']) and isset($_COOKIE['pass'])){
	$email = $_COOKIE['email'];
	$pass = $_COOKIE['pass'];
    setcookie('email', '', time() - 1*24*60*60);
    setcookie('pass', '', time() - 1*24*60*60);
}
header("location: login.php");
?>