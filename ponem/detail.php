<?php
include "Database/Connection.php";
$id = $_GET['id'];

$dirname = "images/Project $id/";
$images = glob($dirname."*.jpg");
$fotos = array();
foreach($images as $image) {
    //echo '<img src="'.$image.'" /><br />';
    $fotos[] = $image;
}

 print_r($fotos)
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

    <script language="JavaScript" type="text/javascript">
        $(document).ready(function(){

            var imgArr = <?php echo $fotos  ?>;

            var preloadArr = new Array();
            var i;

            /* preload images */
            for(i=0; i < imgArr.length; i++){
                preloadArr[i] = new Image();
                preloadArr[i].src = imgArr[i];
            }

            var currImg = 1;
            var intID = setInterval(changeImg, 1000);

            /* image rotator */
            function changeImg(){
                $('#masthead').animate({opacity: 0}, 1000, function(){
                    $(this).css('background','url(' + preloadArr[currImg++%preloadArr.length].src +') top center no-repeat');
                }).animate({opacity: 1}, 1000);
            }

        });
    </script>

    <script type="text/javascript">
        function addFav(){
            $.ajax({
                url: "/favorites/add",
                data: {"id": articleID},
                success: function(){
                    $('a#fav')
                        .addClass('active')
                        .attr('title','[-] Remove from favorites')
                        .unbind('click')
                        .bind('click', removeFav)
                    ;
                }
            });
        }

        function removeFav(){
            $.ajax({
                url: "/favorites/remove",
                data: {"id": articleID},
                success: function(){
                    $('a#fav')
                        .removeClass('active')
                        .attr('title','[+] Add as favorite')
                        .unbind('click')
                        .bind('click', addFav)
                    ;
                }
            });
        }

        $('a#fav').bind('click', addFav);
    </script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $("#favoriet").click(function(){
                $.post('favoriet.php?id=<?php echo $id; ?>',{favoriet:$(this).val()},function(d){
                    if(d>0)
                    {
                        alert('Project already in favorieten');
                    }
                    else
                    {
                        alert('project toegevoegd aan favorieten');
                    }
                });
                $(this).attr("checked");
            });
        });
    </script>

</head>

<body background="images/Project <?php echo $id ?>/beer.jpg">
<!-- <div id="slideit" style="width:700px;height:391px;"> -->
<!--          </div>-->
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
        $sql = "SELECT * FROM projecten WHERE  ID = $id";
        $result = $conn->query($sql);
        //$_SESSION["cart"] = array();
        $arry = array();
        while($row = $result->fetch_assoc()){
            ?>
            <div class="col-md-6 portfolio-item">

                <h3>
                    <a href="detail.php?id=<?php echo $row["ID"]; ?>"><?php echo $row["Titel"]; ?> </a >
                </h3 >
                <p > <?php echo $row["Subtitel"]; ?></p >
            </div >


            <?php



            $arry = $row;
            //print_r($arry);

        };

        $_SESSION["cart"] = $arry;
        print_r($_SESSION["cart"]);


        $obj =  $_SESSION["cart"];

        $obj2 = json_encode($obj,true);
        echo $obj2;

        foreach ($_SESSION["cart"] as $item)
        {
////            $idp = item[2];
////            $tit = item['Titel'];
////            $stit = item['Subtitel'];
////            $foto = item['foto'];
////            $fotopath = item['foto_path'];
//
            echo $item;
        }
//
////        echo $idp;

        ?>

        <button type="button" name="favoriet" class="favoriet" id="favoriet" >Favorite</button>
    </div>

    <!-- Pagination -->
</div>
<!-- /.row -->

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