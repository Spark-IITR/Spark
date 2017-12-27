<?php

if(isset($_POST['export'])){


require_once('../config/config.php');

header('Content-Type:text/cs; charset=utf-8');
header('Content-Disposition: attachment;filename=test.csv');

$output = fopen("php://output","w");

fputcsv($output, array('id','name','college'));

$query = "SELECT id,name,college from user";

$result = mysqli_query($connect,$query);

while($row = mysqli_fetch_assoc($result)){
	fputcsv($output, $row);
}
fclose($output);

}
?>