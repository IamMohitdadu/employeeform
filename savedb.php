
<?php

/**
 * file-name: savedb.php
 * used-for: updatedb.php
 * created-by: Mohit Dadu
 * description: it is the php file to connect with database and update data into MySql table.
 * date:19/01/2017
*/

	if(isset($_POST['save'])) {
		
		$error = false;
		session_start();
		if((isset($_SESSION['email']))){
			$id = $_SESSION['id'];
			$email = $_SESSION['email'];
		}

		// to connect the database
		require_once ('filemakerapi/FileMaker.php');
		$fm = new FileMaker('login', '172.16.9.62', 'admin', 'Mohit@249d');
		
		// clean user input to prevent sql injection.
		$name = trim($_POST['name']);
		$name = strip_tags($name);
		$name = htmlspecialchars($name);
		
		$pass = trim($_POST['pass']);
		$pass = strip_tags($pass);
		$pass = htmlspecialchars($pass);

		// name validation
		if (empty($name)) {
					$error = true;
					$nameError = "Please enter your full name.";
		  } else if (strlen($name) < 3) {
					$error = true;
					$nameError = "Name must have atleat 3 characters.";
		} else {
					$nameError = "";
		}
		
		// password validation
		if (empty($pass)) {
					$error = true;
					$passError = "Please enter password.";
		} else if (strlen($pass) < 6) {
					$error = true;
					$passError = "Password must have atleast 6 characters.";
		} else {
					$passError = "";
		}
		
		// execute if there is no error
		if(!$error){
			
			$request = $fm->newFindCommand('registration');
			$request->addFindCriterion('Id', $id);
			$result = $request->execute();
			
			if (FileMaker::isError($result)) {
				echo $result->getMessage();
				if (! isset($result->code) || strlen(trim($result->code)) < 1) {
					echo 'A System Error Occured';
				} else {
					echo 'No Records Found (Error Code: '.$result->code.')';
				}
			} else {
				$records = $result->getRecords();
				foreach ($records as $record) {
					$record->setField('Name', $name);
					$record->setField('Password', $pass);
					$record->commit();
				}	
				header("Location: show_user_details.php");
			}
			
				
		} else {
			$errMSG = "Please Enter the correct information. ";
			echo "$errMSG";
		}
			
	} 

?>