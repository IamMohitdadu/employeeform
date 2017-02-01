<?php
    /*
     * File Name: employee.php
     * Used For: Employee form
     * Created By: Mohit Dadu
     * Description: php class for OOP application of the website.
     */
    require_once ('filemakerapi/FileMaker.php');
    class Employee {
        /*var $connection;
        var $name;
        var $email;
        var $password;
        var $admnNumber;
        var $userRole;
        function collectDetails(&$registrationDetails) {
            $registrationDetails['name'] = $this->Sanitize($_POST['name']);
            $registrationDetails['admn'] = $this->Sanitize($_POST['admn']);
            $registrationDetails['email'] = $this->Sanitize($_POST['email']);
            $registrationDetails['pass'] = $this->Sanitize($_POST['pass']);
        }
        //-------- Initialization ------------------------
        //-------- Functions for regular actions ---------
        function redirectToURL($url){
            header("Location: $url");
            exit;
        }
        function selfScriptCall () {
            return htmlentities($_SERVER['PHP_SELF']);
        }*/
		
        function Sanitize($data) {
            $retvar = trim($data);
            $retvar = strip_tags($retvar);
            $retvar = htmlspecialchars($retvar);
            return $retvar;
        }
    }
 ?>