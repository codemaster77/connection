<?php
/**
 * Created by PhpStorm.
 * User: Turga
 * Date: 11/06/2017
 * Time: 16:30
 */

session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "portfolio";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if (mysqli_connect_error()) {
    die("Database connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";
?>