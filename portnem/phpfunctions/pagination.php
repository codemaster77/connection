<?php

require_once "config/dbConnection.php";

function pagination($conn)
{
    $limit =3;

    $sql = "SELECT COUNT(id) FROM projecten";
    $result = $conn->query($sql);
    $row = $result->fetch_row();
    $total_records = $row[0];
    $total_pages = ceil($total_records /$limit);
    $pageLink = "<ul class='pagination'><li>";
    for ($i = 1; $i<=$total_pages; $i++)
    {
        $pageLink .= "<a href='index.php?page=".$i."'>".$i."</a>";
    };

    echo $pageLink . "</li></ul>";
}





?>