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
REST URL example: http://localhost/ServerCRUD/?jobs_id=7&jobsName=Be%203%2025
*******************************************************************************/ 

require_once('intercon/servercon.php');
require_once('errorcodes.php');

/*Intialize the vars.*/
$jobs_id = NULL;
$jobsName = NULL;
$column_type_name = NULL;
$column_type_names = array();

//Build the query to get table info
$query = "SELECT * FROM methods ";

//Connect to the db and query the db
if ($result = mysqli_query($con, $query)) {
	//get the number of columns in the table
	$column_num=mysqli_num_fields($result);
	
    /* Get field information for all fields */
    while ($columninfo = mysqli_fetch_field($result)) {
		//Parse out the field's column name and build an array of column names
       	$column_type_name= ($columninfo -> name);
	   	$column_type_names[]=($column_type_name);
	   	
    }
    
    for ($x=0; $x< $column_num; $x++){
	    $column_name_array[]=($column_type_names[$x]);
    }
    //$column_name_array[]=($column_type_names[$x-1]);

}
$column_name_string= implode("', '", $column_name_array);
$query2 ="SELECT $column_name_string FROM methods";
    echo($query2);
       
/* close connection */
mysqli_close($con);

?>