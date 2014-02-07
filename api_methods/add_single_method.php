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
*******************************************************************************/ 

require_once('intercon/servercon.php');
require_once('errorcodes.php');




//See if the URL parameters  are not empty or NULL
if (isset($_GET["data"])) {
		// Initalize the JSON data to be javascript type text
		//header('Content-Type: text/javascript');
        // Put JSON Data from the URL into local variables
        $HTTP_RAW_POST_DATA = $_POST['data'];
		// Decode the JSON data to an array
		$JSONdata = json_decode(stripslashes($HTTP_RAW_POST_DATA));
				// Separate JSON arrary into local variables
				$ActiveIngredient = $JSONdata -> ActiveIngredient;
        		$ActiveIngredientDescription = $JSONdata -> ActiveIngredientDescription;
        		$ActiveIngredientPreparation = $JSONdata -> ActiveIngredientPreparation;
        		$cb_done = $JSONdata -> cb_done;
        		$CustLotNumber = $JSONdata -> CustLotNumber;
        		$CustomerName = $JSONdata -> CustomerName;
        		$CustomerOrderDescription = $JSONdata -> CustomerOrderDescription;
        		$CustomerOrderFormLineNumber = $JSONdata -> CustomerOrderFormLineNumber;
        		$LabJobName = $JSONdata -> LabJobName;
        		$method2job = $JSONdata -> method2job;
        		$Method2Mixed = $JSONdata -> Method2Mixed;
        		$methodAIStatus = $JSONdata -> methodAIStatus;
        		$methodCondition = $JSONdata -> methodCondition;
        		$methodClass = $JSONdata -> methodClass;
        		$methodDate = $JSONdata -> methodDate;
        		$methodDueDate = $JSONdata -> methodDueDate;
        		$MethodID = $JSONdata -> MethodID;
        		$MethodName = $JSONdata -> MethodName;
        		$methodReportComments = $JSONdata -> methodReportComments;
        		$methodStorageCondition = $JSONdata -> methodStorageCondition;
        		$methodTrackingNumber = $JSONdata -> methodTrackingNumber;
        		$methodType = $JSONdata -> methodType;
        		$methodUserID = $JSONdata -> methodUserID;
        		$singleMethodCustomerComments = $JSONdata -> singleMethodCustomerComments;
        		$singleMethodCustomerStabilityStudyInstructions = $JSONdata -> singleMethodCustomerStabilityStudyInstructions;
        		$singleSampleAmount = $JSONdata -> singleSampleAmount;
        		$TestTypeName = $JSONdata -> TestTypeName;
        		$methodLocation = $JSONdata -> methodLocation;
        		$methodAssigned = $JSONdata -> methodAssigned;
        		$methodMixName = $JSONdata -> methodMixName;
        		$methodLabReportButton = $JSONdata -> methodLabReportButton;
        		$methodModifyDate = $JSONdata -> methodModifyDate;
        		$methodQRData = $JSONdata -> methodQRData;
        		$methodCurrentStatus = $JSONdata -> methodCurrentStatus;
        		$methodConcentrationStandard = $JSONdata -> methodConcentrationStandard;
        		$methodDilutionFactor = $JSONdata -> methodDilutionFactor;
        		$methodAreaSamplePeak = $JSONdata -> methodAreaSamplePeak;
        		$methodAreaStandardPeak = $JSONdata -> methodAreaStandardPeak;
        		$methodAmountInSample = $JSONdata -> methodAmountInSample;
        		$methodAmountOfSample = $JSONdata -> methodAmountOfSample;
        		$methodCalcPotency = $JSONdata -> methodCalcPotency;
        		$methodCalcPotencyPercent = $JSONdata -> methodCalcPotencyPercent;
        		$methodTargetPotency = $JSONdata -> methodTargetPotency;
        		$methodCalcPotencyPercentofPotencyTarget = $JSONdata -> methodCalcPotencyPercentofPotencyTarget;
        		$methodTargetPotencyPercent = $JSONdata -> methodTargetPotencyPercent;
        		$methodCalcPotencyPercentofPotencyTargetPercent = $JSONdata -> methodCalcPotencyPercentofPotencyTargetPercent;
        		$methodMixSampleConcetration = $JSONdata -> methodMixSampleConcetration;
}else{
	//Need a way to handle when not all the parameters are passed
	echo('<b>400</b> '.$errorcodes[400]);
}

echo($ActiveIngredient);

$query = "SELECT MethodID,methodTrackingNumber FROM methods WHERE MethodID='".$MethodID."' AND methodTrackingNumber='".$methodTrackingNumber."'";



//require('api_methods/select_all_methods.php');

?>