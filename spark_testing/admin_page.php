<?php
ob_start();
session_start();
include 'db.php';
if(isset($_SESSION['role'])=='administrator')
{
$query1= mysqli_query($con,"SELECT * FROM `finforex_users` WHERE `userid`='".$_SESSION['userid']."' AND `role`='administrator' ");
$arr1 = mysqli_fetch_array($query1);
$num1 = mysqli_num_rows($query1); 
if($num1==1)
{
?>
<html>
    <head>
     <style>
      
            body{
                width:80%;
                margin: 0 auto;
                padding: 0;
        font-family: 'Open Sans', Tahoma, Arial, helvetica, sans-serif; 
            }
        
        </style>

    </head>
    <body>
    
<body> 
<br>
<h1 style="font-weight: 400;">Set Margins- Administrator</h1> 
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
</html>