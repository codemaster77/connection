<?php
require_once "models/Project.php";

class ProjectDAO
{
    static function getProjects($page)
    {
        $projs = [];
        $servername = "localhost";
        $username = "root";
        $password = "";

        // Create connection
        $conn = new mysqli($servername, $username, $password, "examen");

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
            return $projs;
        }

        $page -= 1;
        $sql = "SELECT * FROM project LIMIT " . (3*$page) . ", 3";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $proj = new Project(
                    $row["titel"],
                    $row["subtitel"],
                    $row["thumbnail"],
                    $row["foto1"],
                    $row["foto2"],
                    $row["foto3"],
                    $row["id"]
                );
                array_push($projs, $proj);
            }
        }

        $conn->close();
        return $projs;
    }

    static function getProject($id)
    {
        $proj = null;
        $servername = "localhost";
        $username = "root";
        $password = "";

        // Create connection
        $conn = new mysqli($servername, $username, $password, "examen");

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
            return $projs;
        }

        $sql = "SELECT * FROM project WHERE id=" . $id;
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            if($row = $result->fetch_assoc()) {
                $proj = new Project(
                    $row["titel"],
                    $row["subtitel"],
                    $row["thumbnail"],
                    $row["foto1"],
                    $row["foto2"],
                    $row["foto3"],
                    $row["id"]
                );

            }
        }

        $conn->close();
        return $proj;
    }
}
?>