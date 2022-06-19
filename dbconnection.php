<?php

// $servername = "smartplantdb.mysql.database.azure.com";
// $database = "smartplant";
// $username = "Smartplant";
// $password = "Admin01!!";

$servername = "localhost";
$database = "fiverr-dekolakola-website";
$username = "root";
$password = "root";

$conn = mysqli_connect($servername, $username, $password, $database);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
