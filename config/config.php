<?php
define('base_url', 'http://localhost/spark/');
$servername = "localhost";
$username = "root";
$password = "toor";
$dbname = "spark";
$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}   ?>