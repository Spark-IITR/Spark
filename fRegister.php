<?php
//store the message

require 'config.php';

$name = $_POST['name'];
$email = $_POST['email'];
$contact = $_POST['contact'];
$department = $_POST['department'];
$project = $_POST['project'];
$password = $_POST['password'];


$sql = "INSERT INTO faculty(name, email,contact, department,project,password)
        VALUES ( '$name', '$email','$contact', '$department','$project','$password')";

mysqli_query($conn,$sql); //execution.


 header("location:index.php");




?>