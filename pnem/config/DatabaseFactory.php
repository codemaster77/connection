<?php
include_once 'Database.php';
class DatabaseFactory{
    
    public static $verbinding; 
    
    public static function getDatabase(){
       if(self::$verbinding == null){
           $mijnDb = "localhost"; 
           $mijnUsername = "root";
           $mijnWachtwoord = "";
           $mijnDbnaam = "pierrot";
           self::$verbinding = new Database($mijnDb,$mijnUsername,$mijnWachtwoord,$mijnDbnaam); 
       } 
        return self::$verbinding; 
    }
    
    
    
    
    
    
    
    
}

























?>