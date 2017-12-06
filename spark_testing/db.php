<?php
define('base_url', 'http://localhost/spark/');
$servername = "localhost";
$username = "root";
$password = "99569";
$dbname = "spark2";
$con = new mysqli($servername, $username, $password, $dbname);
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}   ?>