<?php

class ContactDAO
{
    static function saveComment($email, $comment)
    {
        $servername = "localhost";
        $username = "root";
        $password = "";

        // Create connection
        $conn = new mysqli($servername, $username, $password, "examen");

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $stmt = $conn->prepare("INSERT INTO contact (email, comment) VALUES (?, ?)");
        $stmt->bind_param("ss", $m, $c);

        $m = $email;
        $c = $comment;
        $stmt->execute();

        $conn->close();
    }
}
?>