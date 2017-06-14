<?php
require_once "dao/ProjectDAO.php";
require_once "view/Head.php";
require_once "view/Header.php";
require_once "view/Footer.php";
require_once "CookieHandler.php";

class IndexView
{
    function showProjects($page)
    {
        $projs = ProjectDAO::getProjects($page);
        ?>
        <html>
            <?php Head::showHead(); ?>
            <body>
                <?php
                    Header::showHeader();
                    foreach($projs as $key => $value )
                    {
                        $this->showProject($value);
                    }
                ?>

                <ul class="pagination">
                    <li <?php if($page == 1) echo 'class="active"'; ?>><a href="/EXWD/IndexController.php/?page=1">1</a></li>
                    <li <?php if($page == 2) echo 'class="active"'; ?>><a href="/EXWD/IndexController.php/?page=2">2</a></li>
                </ul>
                <?php
                Footer::showFooter();
                ?>
            </body>
        </html>
        <?php
    }

    function showProject($proj)
    {
        ?>
        <div class="panel panel-default">
          <div class="panel-heading">
              <a href='<?php echo "/EXWD/DetailController.php/?id=" . $proj->id?>'>
                <?php echo $proj->titel; ?>
                <?php if(CookieHandler::isInCookie($proj->id)) {
                    echo '<span class="glyphicon glyphicon-star"></span>';
                }?>
              </a>
          </div>
          <div class="panel-body">
              <div class="col-sm-8">
                  <img src='<?php echo "/EXWD/" . $proj->thumbnail; ?>' alt="Project foto">
              </div>
              <div class="col-sm-4">
                  <p>
                      <?php echo $proj->subtitel;?>
                  </p>
              </div>
          </div>
        </div>
        <?php
    }
}
?>