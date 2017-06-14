<?php

require_once "view/Head.php";
require_once "view/Header.php";
require_once "view/Footer.php";

class ContactView
{
    function showSuccess($mail)
    {
        ?>
        <html>
        <?php Head::showHead(); ?>
        <body>
        <?php
        Header::showHeader();

        echo "Successfully to: " . $mail;

        Footer::showFooter();
        ?>
        </body>
        </html>
        <?php
    }

    function showContact()
    {
        ?>
        <html>
            <?php Head::showHead(); ?>
        <body>
            <?php
            Header::showHeader();
            ?>

                <form action="ContactController.php" method="post">
                    <div class="form-group">
                        <label for="usr">Email:</label>
                        <input type="text" class="form-control" id="usr" name="email">
                    </div>
                    <div class="form-group">
                        <label for="comment">Comment:</label>
                        <textarea class="form-control" rows="5" id="comment" name="comment"></textarea>
                    </div>
                    <input type="submit" name="Send" value="Laat een commentaar">
                </form>

            <?php
            Footer::showFooter();
            ?>
        </body>
        </html>
        <?php
    }
}
?>

