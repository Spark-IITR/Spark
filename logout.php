<?php 
require('config/config.php');
session_start();
 
$_SESSION = array();

setcookie("username", "", time()-3600);
setcookie("role", "", time()-3600);
setcookie("name", "", time()-3600); 
session_destroy();
// ob_end_flush();/
echo '<script>
	window.location.href="'.base_url.'index.php"; 
                      </script>';
// header("location: http://localhost:4002");
exit;
?>
