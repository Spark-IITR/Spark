<?php
session_start();
 
$_SESSION = array();
setcookie("username", "", time()-3600);
setcookie("role", "", time()-3600);
setcookie("name", "", time()-3600); 
session_destroy();
// ob_end_flush();/

setcookie("username", "", time()-3600);
setcookie("role", "", time()-3600);
header("location: http://localhost:8080");
exit;
?>