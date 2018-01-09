<?php
session_start();
 
$_SESSION = array();
 
session_destroy();
// ob_end_flush();/
header("location:" .base_url."index.php");
exit;
?>