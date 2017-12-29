<?php 
require_once '../config/config.php';

	$studentId = $_POST['studentId'];
	$recommendStatus = $_POST['recommendStatus'];
	$recommendFacultyId  = $_POST['recommendFacultyId'];
	$recommendFundingStatus  = $_POST['recommendFundingStatus'];




	$sql = "UPDATE user set recommendedFaculty=$recommendFacultyId,fundingType='$recommendFundingStatus',recommendStatus=$recommendStatus where id=$studentId";
		
			if (mysqli_query($conn, $sql)) {

	               echo "true";
	            
	        }

    else{
    	echo 'false';
    }
   

            mysqli_close($conn);

?>

