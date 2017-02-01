
<?php

/**
 * file-name: savedb.php
 * used-for: user.php
 * created-by: Mohit Dadu
 * description: It is the php file to save the data entered by the user at the
		registration time into the FileMaker database.
 * date:19/01/2017
*/
	// 
	if(isset($_POST['save'])) {

		// starting the session 
		session_start();
		
		// checking the session is present or not
		if (!isset($_SESSION['email'])) {
			header("Location: login.php");
			exit;
		}
		// assign session to the session valriable
		$email = $_SESSION['email'];
		$id = $_SESSION['id'];
		
		$error = false;
		
		// to connect the database
		include("./config/config.php");
		
		$name = $empobj->Sanitize($_POST['name']);
		$pass = $empobj->Sanitize($_POST['password']);
		
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
				header("Location: user.php");
			}		
		} else {
			$errMSG = "Please Enter the correct information. ";
			echo "$errMSG";
		}
	} 

?>