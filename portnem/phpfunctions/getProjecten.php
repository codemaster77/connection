<?php
require_once "config/dbConnection.php";

function getProject($conn)
{

    $limit = 3;
    if (isset($_GET["page"])) {
        $page = $_GET["page"];
    } else {
        $page = 1;
    }
    $start_from = ($page-1) * $limit;

    $sql = "SELECT id, titel, subtitel, thumbnail, foto1 FROM projecten ORDER BY id asc limit $start_from, $limit";

    $result = $conn->query($sql);

    while($row = $result->fetch_assoc()){
        ?>

<div class="col-md-6 portfolio-item">
    <img class="img-responsive" src="<?php echo $row["thumbnail"]; ?>" alt="">
    <h3>
        <a href="detail.php?id=<?php echo $row["id"]; ?>"><?php echo $row["titel"]; ?> </a>
    </h3>
    <p> <?php echo $row["subtitel"]; ?></p>
    <a href="detail.php?id=<?php echo $row["id"]; ?>&foto=<?php echo $row["foto1"];  ?>">Detail</a>
</div>
<?php
    }

}


?>



