<?php

if(isset($_POST['export'])){


require_once('../config/config.php');

header('Content-Type:text/cs; charset=utf-8');
header('Content-Disposition: attachment;filename=test.csv');

$output = fopen("php://output","w");

	fputcsv($output, array('ID','Spark ID','Name','Email','C.G.P.A','Department','Year','Degree','College','Gender','Contact','Student 1st Priority','Student 2nd Priority','Student 3rd Priority','Student 4th Priority','Student 5th Priority5','Recommended faculty','Funding Type'));

	$query = "SELECT distinct c.id,c.sparkId,c.name,c.email,c.cgpa,c.department,c.year,c.degree,c.college,c.gender,c.contact, (select name from faculty as t1 where t1.id=c.spriority1) as spriority1,(select name from faculty as t2 where t2.id=c.spriority2) as spriority2,(select name from faculty as t3 where t3.id=c.spriority3) as spriority3,(select name from faculty as t4 where t4.id=c.spriority4) as spriority4,(select name from faculty as t5 where t5.id=c.spriority5) as spriority5,(select name from faculty as t6 where t6.id=c.recommendedFaculty) as recommendedFaculty,c.fundingType from student as c where role='student' and ( spriority1!=0 or spriority2!=0 or spriority3!=0 or spriority4!=0 or spriority5!=0 );";

	$result = mysqli_query($conn,$query);

		while($row = mysqli_fetch_assoc($result)){
			fputcsv($output, $row);
		}

		fclose($output);

mysqli_close($conn);

}
?>