<?php


$var = "favorite";
setcookie("TestCookie", $var, time()+60*60*24*30, '/');
?>