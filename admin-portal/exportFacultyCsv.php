<?php

if(isset($_POST['export'])){


require_once('../config/config.php');

header('Content-Type:text/cs; charset=utf-8');
header('Content-Disposition: attachment;filename=test.csv');

$output = fopen("php://output","w");

	fputcsv($output, array('ID','Spark ID','Name','Email','C.G.P.A','Department','Year','Degree','College','Gender','Contact','Student 1st Priority','Student 2nd Priority','Student 3rd Priority','Student 4th Priority','Student 5th Priority5','Recommended faculty','Funding Type'));

	$query = "SELECT id,sparkId,name,email,cgpa,department,year,degree,college,gender,contact,spriority1,spriority2,spriority3,spriority4,spriority5,recommendedFaculty,fundingType from user where role='student' and ( spriority1!=0 or spriority2!=0 or spriority3!=0 or spriority4!=0 or spriority5!=0 )";

	$result = mysqli_query($conn,$query);

		while($row = mysqli_fetch_assoc($result)){
			fputcsv($output, $row);
		}

		fclose($output);

mysqli_close($conn);

}
?>