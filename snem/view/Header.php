<?php

class Header
{
    static function showHeader()
    {
        ?>

        <header>
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <ul class="nav navbar-nav">
                        <li><a href="IndexController.php">Index</a></li>
                        <li><a href="ContactController.php">Contact</a></li>
                    </ul>
                </div>
            </nav>
        </header>

        <?php
    }
}

?>