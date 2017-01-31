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
		// find the associate layout
		$request = $fm->newFindCommand('registration');
		$request->addFindCriterion('rec_id', $id);
		$result = $request->execute();
		$records = $result->getRecords();
		foreach ($records as $record){
			$user = $record->getField('Usertype');
		}
		
		// check for existing record using record Id
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
		}
	}
	
	if($user === 'User'){
		header("Location: show_user.php");
	} else {
		header("Location: show_admin.php");
	}
?>

		
