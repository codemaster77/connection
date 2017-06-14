<?php
include_once "Database.php";

class DatabaseFactory{

    public  static  $verbinding;

    public static  function getDatabase()
    {
        if (self::$verbinding == null)
        {
            $mijnHostname = "localhost";
            $mijnUsername = "root";
            $mijnPassword = "";
            $mijnDb = "examportfolio";
            self::$verbinding = new Database($mijnHostname,$mijnUsername,$mijnPassword,$mijnDb);
        }
        return self::$verbinding;
    }

}