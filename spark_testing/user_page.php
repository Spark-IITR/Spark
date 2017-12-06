<?php
session_start();
include 'db.php';
if(isset($_SESSION['role'])=='user')
{
$query= mysqli_query($con,"SELECT * FROM `finforex_users` WHERE `userid`='".$_SESSION['userid']."' AND  `role`='user' ");
$arr = mysqli_fetch_array($query);
$num = mysqli_num_rows($query); 
if($num==1)
{
?>
<style>
  body
  {
        width:80%;
        margin: 0 auto;
        padding: 0;
    font-family: 'Open Sans', Tahoma, Arial, helvetica, sans-serif; 
    }
</style>
<h1 style="font-weight: 400;">Welcome User</h1> 
<div style="float:right;"><a href="logout.php">Logout</a></div>
<?php   
    }
    else
    {
      header ("location:login.php");
      }
}   
else
      header ("location:login.php");
    
?>  
</body> 