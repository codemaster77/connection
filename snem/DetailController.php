<?php
require_once "DetailView.php";
require_once "CookieHandler.php";

class DetailController
{
    var $view;

    function __construct()
    {
        $this->view = new DetailView();
    }

    function checkFavorite()
    {
        if(isset($_POST['toCookie']))
        {
            $id = isset($_POST["id"]) ? $_POST["id"] : -1;
            if($id != -1) {
                CookieHandler::putToCookie($id);
                return true;
            }
        }
        return false;
    }

    function showDetail()
    {
        $id = isset($_GET["id"]) ? $_GET["id"] : -1;
        if($id != -1) {
            $this->view->showDetail($id);
        } else {
            header('Location: /EXWD/IndexController.php');
        }
    }
}

$ctr = new DetailController();
if(!$ctr->checkFavorite())
    $ctr->showDetail();

?>