<?php
/**
 * Created by PhpStorm.
 * User: Turga
 * Date: 15/06/2017
 * Time: 15:43
 */

function randomImage()
{
    $dir = "images/";
    $images = scandir($dir);
    return $images;
}