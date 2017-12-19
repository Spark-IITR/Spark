<?php 
require_once '../config/config.php';

	$studentId = $_POST['studentId'];
	$recommendStatus = $_POST['recommendStatus'];
	$recommendFacultyId  = $_POST['recommendFacultyId'];
	$recommendFundingStatus  = $_POST['recommendFundingStatus'];



	$sql = "update user set recommendedFacultyId=$recommendFacultyId where id=$studentId";
	$result = $conn->query($sql);
		
			if (mysqli_query($conn, $sql1)) {
	               echo "true";
	            
	        }

    else{
    	echo 'false';
    }
   

            mysqli_close($conn);

?>



?>