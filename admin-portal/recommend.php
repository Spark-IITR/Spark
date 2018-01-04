<?php 
require_once '../config/config.php';

	$studentId = $_POST['studentId'];
	$recommendStatus = $_POST['recommendStatus'];
	$recommendFacultyId  = $_POST['recommendFacultyId'];
	$recommendFundingStatus  = $_POST['recommendFundingStatus'];




	$sql = "UPDATE student set recommendedFaculty=$recommendFacultyId,fundingType='$recommendFundingStatus',recommendStatus=$recommendStatus where id=$studentId";
			if($stmt = mysqli_prepare($conn, $sql)){
	            mysqli_stmt_bind_param($stmt, "isii", $recommendFacultyId,$recommendFundingStatus,$recommendStatus,$studentId);
	            $param_studentId = $studentId;
	            if(mysqli_stmt_execute($stmt)){
	                echo '<span style="color:green;font-size:20px">Recommended..</span>';
	            } else{
	                echo '<span style="color:red;font-size:20px">Something Went Wrong !..</span>';
	            }
	        }else {echo '<span style="color:red;font-size:20px">Something Went Wrong !..</span>';}
	         
	        mysqli_stmt_close($stmt);
							        
            mysqli_close($conn);
?>

