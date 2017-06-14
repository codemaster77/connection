<?php
require_once "dao/ProjectDAO.php";
require_once "view/Head.php";
require_once "view/Header.php";
require_once "view/Footer.php";
require_once "CookieHandler.php";

class DetailView {
    function showDetail($id)
    {
        $proj = ProjectDAO::getProject($id);
        ?>
        <html>
            <?php Head::showHead(); ?>
        <body>
            <?php
                Header::showHeader();
            ?>
        <div class="container-fluid">
            <div style="display: none" id="project-id"><?php echo $proj->id; ?></div>
            <div style="display: none" id="project-path-1"><?php echo $proj->foto1; ?></div>
            <div style="display: none" id="project-path-2"><?php echo $proj->foto2; ?></div>
            <div style="display: none" id="project-path-3"><?php echo $proj->foto3; ?></div>
            <img src="" alt="bg" id="project-bg" class="row">
            <p class="row">
                <?php echo $proj->titel;?>
                <?php if(CookieHandler::isInCookie($proj->id)) {
                    echo '<span class="glyphicon glyphicon-star"></span>';
                }?>
            </p>
            <p class="row"><?php echo $proj->subtitel;?></p>
            <button id="btnAddToFavorites">Add to favorites</button>
        </div>
            <?php
            Footer::showFooter();
            ?>
        </body>
        </html>
        <?php
    }
}

?>