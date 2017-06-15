<?php

require_once "config/dbConnection.php";

function getBackground($conn)
{

    $id = $_GET['id'];

    $sql = "SELECT foto1, foto2, foto3 FROM projecten where id = $id ";
    $result = $conn->query($sql);

    $array = array();
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
//            echo "foto1: " . $row["foto1"]. " - foto2: " . $row["foto2"]. " - foto3: " . $row["foto3"]."<br>";
            $array = $row;
        }
    } else {
        echo "0 results";
    }

//    print_r($array);
    return $array;

}
?>