<?php
ob_start();
session_start();
include("db.php");
?>
<style type="text/css">
.box
{
border:#666666 solid 1px;
}
label
{
font-weight:bold;
width:100px;
font-size:12px;
}

</style>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script> 
</head>
<body bgcolor="#FFFFFF">
<div align="center">
<div style="width:350px; border: solid 2px #333333; " align="left">
<div style="background-color:#333333; color:#FFFFFF; padding:4px;"><b>Login</b></div>
<div style="margin:25px">
<form  method="post" action="">
<?php
if($_SERVER["REQUEST_METHOD"] == "POST")
{
$myusername1=mysqli_real_escape_string($con,$_POST['username']); 
$mypassword1=mysqli_real_escape_string($con,$_POST['password']); 
$mypassword=MD5($mypassword1);

$sql="SELECT * FROM finforex_users WHERE username='$myusername1' and password='$mypassword1'";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_array($result);
$_SESSION['userid']=$row['userid'];
$_SESSION['role']=$row['role'];
$count=mysqli_num_rows($result);
if($count==1)
{
      if ($row['role']=="administrator")
      { 

                               header ("location: admin_page.php"); 
                             
      }
      else if ($row['role']=="user")
      { 
                               $_SESSION['role']=$row['role'];

                               header ("location: user_page.php"); 
                             

      }
}
else 
{
$error="Your Login Name or Password is invalid";
}
}
?>
<label>UserName  :</label><input type="text" name="username" class="box"/><br /><br />
<label>Password  :</label><br/><input type="password" name="password" class="box" /><br/><br />
<input type="submit" value=" Submit "/><br />
</form>
<div style="font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
</div>
</div>
</div>
</body>
</html>