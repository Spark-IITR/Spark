<?php

if(isset($_POST['export'])){


require_once('../config/config.php');

header('Content-Type:text/cs; charset=utf-8');
header('Content-Disposition: attachment;filename=faculty.csv');

$output = fopen("php://output","w");

	fputcsv($output, array('ID','Spark ID','Name','Email','Department','Project','1st Priority','2nd Priority','3rd Priority','4th Priority','5th Priority'));

	$query = "SELECT distinct c.id,c.sparkId,c.name,c.email,c.department,c.project, (select name from student as t1 where t1.id=c.fpriority1) as spriority1,(select name from student as t2 where t2.id=c.fpriority2) as spriority2,(select name from student as t3 where t3.id=c.fpriority3) as spriority3,(select name from student as t4 where t4.id=c.fpriority4) as spriority4,(select name from student as t5 where t5.id=c.fpriority5) as fpriority5 from faculty as c;";

	$result = mysqli_query($conn,$query);

		while($row = mysqli_fetch_assoc($result)){
			fputcsv($output, $row);
		}

		fclose($output);

mysqli_close($conn);

}
?>