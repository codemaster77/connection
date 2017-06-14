<?php

require_once "IndexView.php";

class IndexController
{
    var $view;

    function __construct()
    {
        $this->view = new IndexView();
    }

    function showIndex($page)
    {
        $this->view->showProjects($page);
    }

    function showImages()
    {
        for($i = 0; $i < 6; $i++) {
            for($j = 1; $j < 4; $j++) {
               $name = 'img/p' . $j . '_p' . ($i+1)  . '.jpeg';
               echo "<img src='". $name  . "' alt='not found'/>";
            }
        }
    }

    function generateRandomImages()
    {
        for($i = 0; $i < 6; $i++) {
            for($j = 1; $j < 4; $j++) {
                // Create a blank image and add some text
                $im = imagecreatetruecolor(120, 120);
                $backgroundColor = imagecolorallocate($im, 200, 255, 255);
                $text_color = imagecolorallocate($im, 0, 214, 191);
                imagefill($im, 0, 0, $backgroundColor);

                imagestring($im, 25, 30, 50, 'img/p' . $j . '_p' . ($i+1), $text_color);
                // Save the image as 'simpletext.jpg'
                imagejpeg($im, 'img/' . $j . '_p' . ($i+1)  . '.jpg');
                // Free up memory
                imagedestroy($im);
            }
        }
    }
}

$ctr = new IndexController();
$page = isset($_GET["page"]) ? $_GET["page"] : 1;
$ctr->showIndex($page);

?>