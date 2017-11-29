<?php
//store the message

require 'config.php';

$name = $_POST['name'];
$email = $_POST['email'];
$contact = $_POST['contact'];
$department = $_POST['department'];
$project = $_POST['project'];
$password = $_POST['password'];

/**
echo "Your name: {$_POST['name']}<br />";
echo "Your name: {$_POST['email']}<br />";
echo "Your name: {$_POST['contact']}<br />";
echo "Your name: {$_POST['department']}<br />";
echo "Your name: {$_POST['project']}<br />";
echo "Your name: {$_POST['password']}<br />";
**/
$table = faculty;
$sql = "INSERT INTO" .$table. "(name, email,contact, department,project,password)
        VALUES ( '$name', '$email','$contact', '$department','$project','$password')";

mysqli_query($conn,$sql); //execution.


 header("location:index.php");




?>