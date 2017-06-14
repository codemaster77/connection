<?php

include "Database/Connection.php";

$ipaddress = md5($_SERVER['REMOTE_ADDR']);
$projectID = $_GET["id"];
$projectTitel = $_POST["Titel"];

if (isset($_POST['favoriet']) && !empty($_POST['favoriet'])) {
    if (isset($projectID) && !empty($projectID))
    $favoriet = $conn->real_escape_string($_POST['favoriet']);
// check if user has already rated
    $sql = "SELECT `id` FROM `tbl_favorieten` WHERE `user_id`='" . $ipaddress . "'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    if ($result->num_rows > 0) {
        echo $row['id'];
    } else {

        /*$sql = "INSERT INTO `tbl_favorieten`  VALUES ('" . $favoriet . "', '" . $ipaddress . "'); ";
        //$sql = "INSERT INTO tbl_favorieten  VALUES ('','$projectID', '$favoriet', '$ipaddress'); ";
        if (mysqli_query($conn, $sql)) {
            echo "0";
        }
*/


        $sql = "INSERT INTO tbl_favorieten VALUES ('', '$ipaddress', '$ipaddress', '$ipaddress')";

        if ($conn->query($sql) === TRUE) {
            echo "Successfully ";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}