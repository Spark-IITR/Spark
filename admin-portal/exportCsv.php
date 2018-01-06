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

		// 


		header('Content-Type:text/cs; charset=utf-8');
		header('Content-Disposition: attachment;filename=test2.csv');

		$output1 = fopen("php://output1","w");

	fputcsv($output1, array('Student 1st Priority','Student 2nd Priority','Student 3rd Priority','Student 4th Priority','Student 5th Priority5'));

	$query1 = "SELECT faculty.name from student inner join faculty on student.spriority1 = faculty.id";

	$result1 = mysqli_query($conn,$query1);

		while($row1 = mysqli_fetch_assoc($result1)){
			fputcsv($output1, $row1);
		}

		fclose($output1);


header('Content-Type:text/cs; charset=utf-8');
		header('Content-Disposition: attachment;filename=final.csv');

		file_put_contents('final.csv',
    file_get_contents('test.csv') .
    file_get_contents('test2.csv')
);

mysqli_close($conn);

}
?>