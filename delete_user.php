<?php

/**
 * file-name: delete_user.php
 * used-for: show_user.php
 * created-by: Mohit Dadu
 * description: it is the user to delete the particular user from database.
 * date:24/01/2017
 * */

	require_once ('filemakerapi/FileMaker.php');
	$fm = new FileMaker('login', '172.16.9.62', 'admin', 'Mohit@249d');
	

	if (isset($_GET['id'])) {
		
		$id = $_GET['id'];
		$rec = $fm->getRecordById('registration', $id);
		$result = $rec->delete();
		// Checking Errors 
		if (FileMaker::isError($result)) {
		echo $result->getMessage();
			if (! isset($result->code) || strlen(trim($result->code)) < 1) {
				echo 'A System Error Occured';
			} else {
				echo 'No Records Found (Error Code: '.$result->code.')';
			}
		} else {
			header("Location: admin.php");
		}
	}
?>
		
