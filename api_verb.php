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
    // API file listing
    $apicodes = Array(
    	101 => 'api_methods/select_all_jobs.php',
        102 => 'api_methods/select_single_job.php',
        read => 'api_methods/select_all_methods.php',
        104 => 'api_methods/select_all_job-methods-tracking.php',
        204 => 'api_methods/add_single_job.php',
        update => 'api_methods/add_single_method.php',
        998 => 'api_methods/test.php',
        999 => '(Unused)'
        );

?>