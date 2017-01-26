<?php

/**
 * file-name: delete_user.php
 * used-for: show_user.php
 * created-by: Mohit Dadu
 * description: it is the user to delete the particular user from database.
 * date:24/01/2017
 * */

		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "employee";


		if (isset($_GET['id']))
		{
				$id = $_GET['id'];
				try{
						// Check connection
						$conn = new mysqli($servername, $username, $password, $dbname);
				}
				catch(Exception $e) {
						echo  "Connection failed: " . $e->mysqli_connect_error();
				}
				
				$sql = "DELETE FROM user WHERE id = $id";
				 
				if (mysqli_query($conn, $sql)) {
					  header("Location: show_user.php");
				}
				$result->close();
				$con->close();
		}
?>
		
