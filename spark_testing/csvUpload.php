<?php

if(isset($_POST['export'])){
/* vars for export */
// database record to be exported
// $db_record = 'user';
// // optional where query
// $where = ' ORDER BY id';
// // filename for export
// $csv_filename = 'db_export_'.$db_record.'_'.date('Y-m-d').'.csv';
// // database variables
// $hostname = "localhost";
// $user = "root";
// $password = "99569";
// $database = "spark";
// // Database connecten voor alle services
// mysql_connect($hostname, $user, $password)
// or die('Could not connect: ' . mysql_error());
					
// mysql_select_db($database)
// or die ('Could not select database ' . mysql_error());
// create empty variable to be filled with export data
// $csv_export = '';
// // query to get data from database
// $query = mysql_query("SELECT name,id,college FROM user");
// $field = mysql_num_fields($query);
// // create line with field names
// for($i = 0; $i < $field; $i++) {
//   $csv_export.= mysql_field_name($query,$i).';';
// }
// // newline (seems to work both on Linux & Windows servers)
// $csv_export.= '
// ';
// // loop through database query and fill export variable
// while($row = mysql_fetch_array($query)) {
//   // create line with field values
//   for($i = 0; $i < $field; $i++) {
//     $csv_export.= '"'.$row[mysql_field_name($query,$i)].'";';
//   }	
//   $csv_export.= '
// ';	
// }
// // Export the data and prompt a csv file for download
// header("Content-type: text/x-csv");
// header("Content-Disposition: attachment; filename=".$csv_filename."");
// echo($csv_export);

// $result = $db_con->query('SELECT * FROM `user`');
// if (!$result) die('Couldn\'t fetch records');
// $num_fields = mysql_num_fields($result);
// $headers = array();
// for ($i = 0; $i < $num_fields; $i++) {
//     $headers[] = mysql_field_name($result , $i);
// }
// $fp = fopen('php://output', 'w');
// if ($fp && $result) {
//     header('Content-Type: text/csv');
//     header('Content-Disposition: attachment; filename="export.csv"');
//     header('Pragma: no-cache');
//     header('Expires: 0');
//     fputcsv($fp, $headers);
//     while ($row = $result->fetch_array(MYSQLI_NUM)) {
//         fputcsv($fp, array_values($row));
//     }
//     die;
// }


$connect = mysqli_connect('localhost','root','99569','spark');

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