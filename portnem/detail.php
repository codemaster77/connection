<?php
include_once "phpfunctions/projectBackground.php";

$id = $_GET['id'];

if(!setcookie("TestCookie", "A", time()+60*60*24*30, "/")) {
    echo "FAIL";
}



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
    <link href="css/slideshow.css" rel="stylesheet">

    <!-- Custom CSS: You can use this stylesheet to override any Bootstrap styles and/or apply your own styles -->
    <link href="css/custom.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <script src="js/slideshow.js"></script>
    <![endif]-->

    </head>
<?php
getBackground($conn);
$arry = getBackground($conn);
$obj = json_encode($arry);
$jsn = json_decode($obj, true);
$foto1 =  $jsn["foto1"];
$foto2 =  $jsn["foto2"];
$foto3 =  $jsn["foto3"];
?>
<body class="background" data-slides='["<?php echo $foto1; ?>","<?php echo $foto2; ?>","<?php echo $foto3; ?>"]'>
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
                    <a href="contactForm.php">Contact</a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>
<div class="row">


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
    <script type="text/javascript">

        function SendCookies(){

            if (window.XMLHttpRequest)/* code for IE7+, Firefox, Chrome, Opera, Safari */
            { xmlhttp=new XMLHttpRequest(); }
            else /* code for IE6, IE5 */
            { xmlhttp=new ActiveXObject("Microsoft.XMLHTTP"); }

            xmlhttp.onreadystatechange=function()
            {
                if (xmlhttp.readyState==4 && xmlhttp.status == 200)
                {
                    alert('done');
                }
            }

            xmlhttp.open("GET", "/web/DEV/Classes/SetCookie.php?time=" + new Date());
            xmlhttp.send();

        }

    </script>



        <div class="row">

            <input type="button" id="favoriet" name="favoriet" value="favoriet" onclick="SencCookies()"/>

            <?php
            if (isset($_COOKIE["TestCookie"])) {
               echo  '<span class="glyphicon glyphicon-star"></span>';
            } else {
                echo "nog niet in favorieten";
            }
            ?>
        </div>
    <!-- Projects Row -->




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
<script src="js/slideshow.min.js"></script>

</body>
</html>