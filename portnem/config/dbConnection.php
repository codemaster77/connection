<?php

   define('servername', 'localhost');
   define('username', 'root');
   define('password', '');
   define('dbname', 'examportfolio');

// Create connection
    $conn = new mysqli(servername, username, password, dbname);

// Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    echo "Connected successfully";


?>