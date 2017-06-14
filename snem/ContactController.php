<?php

require_once "ContactView.php";
require_once "dao/ContactDAO.php";

class ContactController
{
    var $view;

    function __construct()
    {
        $this->view = new ContactView();
    }

    function validateEMAIL($email) {
        $regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';
        return (preg_match($regex, $email));
    }

    function checkInput()
    {
        $email = isset($_POST['email']) ? ($_POST['email']) : '';
        $comment = isset($_POST['comment']) ? ($_POST['comment']) : '';
        if(!empty($comment) && !$this->validateEMAIL($email))
        {
            echo "Not good... Not good the email";
            return false;
        }
        if(!empty($email))
        {
            ContactDAO::saveComment($email, $comment);
            $this->view->showSuccess($email);
            return true;
        }
        return false;
    }

    function show()
    {
        $this->view->showContact();
    }
}

$ctr = new ContactController();
if(!$ctr->checkInput())
    $ctr->show();


?>