<?php
session_start();
 
$_SESSION = array();
 
session_destroy();
 
header("location:" .base_url."index.php");
exit;
?>