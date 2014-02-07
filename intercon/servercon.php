<?php
/*******************************************************************************
David Sutton
Jan 9 2014

Protocode version 1
Version: Alpha-Test 1

This code is a API for a EXT4 based app. This code is called by the diffrent php
files using it to make the database connection.
*******************************************************************************/ 


// Create connection
	$con=mysqli_connect("localhost","fmuser","init123","fmuser");

// Check connection
	if (mysqli_connect_errno())
  {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	  exit();
  }
  else{
  // Might want to create a errorcode showing successful db connection
  	//require_once('../errorcodes.php');
  	//$dbConnectionStatus= $errorcodes[200];
  //DEBUG
	  //echo "<b>db connected</b><br>";
  }
//DEBUG  
//echo "Loaded servercon<br>";   

?>