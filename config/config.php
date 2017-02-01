<?php
  /**
    * Name: config.php
    * Use For: Employee Management Portal
    * Created By: Mohit Dadu
    * Description: File containing all the data required for connecting the web application to the database.
    */
	
	// connecting to the Filemaker Api
    require_once ('filemakerapi/FileMaker.php');
	
	 // Include all the necessary files before connecting to the database
    include_once 'employee.php';
	
    // Database details of the website
    $database = 'login';
    $host = '172.16.9.62';
    $username = 'admin';
    $password = 'Mohit@249d';
	
    // Declaring the filemaker object
	$empobj = new Employee();
    $fm = new FileMaker($database, $host, $username, $password);