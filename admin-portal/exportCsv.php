<?php

if(isset($_POST['export'])){


require_once('../config/config.php');

header('Content-Type:text/cs; charset=utf-8');
header('Content-Disposition: attachment;filename=test.csv');

$output = fopen("php://output","w");

fputcsv($output, array('ID','Name','Email','C.G.P.A','Department','Year','Degree','College','Gender','Contact'));

$query = "SELECT id,name,email,cgpa,department,year,degree,college,gender,contact from user where role='student' and ( spriority1!=0 or spriority2!=0 or spriority3!=0 or spriority4!=0 or spriority5!=0 )";

$result = mysqli_query($conn,$query);

while($row = mysqli_fetch_assoc($result)){
	fputcsv($output, $row);
}
fclose($output);

}
?>