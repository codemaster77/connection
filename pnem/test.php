<?php
include "Database/Connection.php";

?>

<!DOCTYPE html>
<!-- Template by Quackit.com -->
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>Portfolio, 2 Column</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS: You can use this stylesheet to override any Bootstrap styles and/or apply your own styles -->
    <link href="css/custom.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Logo and responsive toggle -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">
                	<span class="glyphicon glyphicon-fire"></span> 
                	Examen
                </a>
            </div>
            <!-- Navbar links -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="index.php">Portfolio</a>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="contact.php">Contact</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Content -->
    <div class="container">
        <!-- Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Portfolio
                    <small>Recent Work</small>
                </h1>
            </div>
        </div>
        <!-- /.row -->

        <!-- Projects Row -->
        <div class="row">

            <?php

            $limit = 3;
            if (isset($_GET["page"]))
            {
                $page = $_GET["page"];
            }
            else{
                $page = 1;
            }

            $start_from = ($page-1) * $limit;

            $sql = "SELECT * FROM projecten order by ID ASC LIMIT $start_from, $limit";
            $result = $conn->query($sql);


            while($row = $result->fetch_assoc()){
            ?>

            <div class="col-md-6 portfolio-item">

                    <img class="img-responsive" src="images/<?php echo $row["Titel"] . "/" . $row["foto"]; ?>" alt="">
                <h3>
                    <a href="detail.php?id=<?php echo $row["ID"]; ?>"><?php echo $row["Titel"]; ?> </a >
                </h3 >
                <p > <?php echo $row["Subtitel"]; ?></p >
            </div >

                <?php
                        };
                ?>

        </div>

        <!-- Pagination -->
        <div class="row text-center">
            <li class="col-lg-12">
                <?php
                $sql = "SELECT COUNT(ID) FROM projecten";
                $result = $conn->query($sql);
                $row = $result->fetch_row();
                $total_records = $row[0];
                $total_pages = ceil($total_records / $limit);
                $pageLink = "<ul class='pagination'><li>";
                for ($i = 1; $i<=$total_pages; $i++)
                {
                    $pageLink .= "<a href='index.php?page=".$i."'>".$i."</a>";
                };

                echo $pageLink . "</li></ul>";
                ?>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
	<footer>
        <div class="copyright">
        	<div class="container">
        		<p>Copyright &copy; Example.com 2015</p>
        	</div>
        </div>
	</footer>
    <!-- jQuery -->
    <script src="js/jquery-1.11.3.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>