<?php

class CookieHandler
{
    public static $COOKIE_NAME = "favorites";

    static function isInCookie($id)
    {
        if(!isset($_COOKIE[self::$COOKIE_NAME])) {
            return false;
        } else {
            $arr = unserialize($_COOKIE[self::$COOKIE_NAME]);
            return in_array($id, $arr);
        }
    }

    static function putToCookie($id)
    {
        $arr = [];
        if(isset($_COOKIE[self::$COOKIE_NAME])) {
            $arr = unserialize($_COOKIE[self::$COOKIE_NAME]);
        }
        array_push($arr, $id);
        setcookie(self::$COOKIE_NAME, serialize($arr));
    }
}

?>