<?php
/*******************************************************************************
David Sutton
Jan 9 2014

Protocode version 1
Version: Alpha-Test 1

This code is a API for a EXT4 based app. The API will accept values from a REST
based URL of two parameters jobs_id and jobsName. It will read from a mysqldb to
find the inputs and then construct a JSON formmated return for a EXT4 proxy to 
pick up.
REST URL example: 
http://localhost/ServerCRUD/api.php?api=100&jobs_id=7&jobsName=Be%203%2025
*******************************************************************************/ 

require_once('errorcodes.php');
require_once('api_verb.php');

//Intialize the URL parameter vars
$verb = NULL;


//See if the URL parameters  are not empty or NULL
if (isset($_GET["api"])) {
        // Put parameters from the URL into local variables
        $verb = $_GET['api'];
		//Look up the file from the api_verb.php list
        $theFile = $apicodes[$verb];
        //call the file set in api_verb
        require_once($apicodes[$verb]);

}else{
	//Need a way to handle when not all the parameters are passed
	echo('<b>400</b> '.$errorcodes[400]);
}

?>