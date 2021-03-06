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

//$query = "SELECT jobs_id,jobsName,jobsStatus FROM jobs ORDER BY jobsStartDate DESC";
$query = "SELECT jobs_id, jobsName, jobsStatus, jobsStartDate, jobsModifyDate, jobsLastUser, job2customer, jobsTracking, _placeholderGlobal FROM jobs ORDER BY jobsStartDate DESC";

/* check connection */
if ($stmt = mysqli_prepare($con, $query)) {
    /* execute statement */
    mysqli_stmt_execute($stmt);
    /* bind result variables */
    mysqli_stmt_bind_result($stmt, $jobs_ids, $jobsName, $jobsStatus, $jobsStartDate, $jobsModifyDate, $jobsLastUser, $job2customer, $jobsTracking, $_placeholderGlobal);
    /* fetch values */
    while (mysqli_stmt_fetch($stmt)) {
    		    
		//Build the JSON formater
        $json_array = array(
        		"jobs_id" => $jobs_ids,
        		"jobsName" => $jobsName,
        		"jobsStatus"=> $jobsStatus,
        		"jobsStartDate" => $jobsStartDate,
        		"jobsModifyDate" => $jobsModifyDate,
        		"jobsLastUser" => $jobsLastUser,
        		"job2customer" => $job2customer,
        		"jobsTracking" => $jobsTracking,
        		"_placeholderGlobal" => $_placeholderGlobal)
        		;
        $json_arrays[] = $json_array;		
        }		
        // printout the array of JSON
        echo json_encode(array(
                "success" => mysql_errno() == 0,
                "jobs" => $json_arrays));         
   // }

    /* close statement */
    mysqli_stmt_close($stmt);
}

/* close connection */
mysqli_close($con);

?>