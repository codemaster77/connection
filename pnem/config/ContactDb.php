<?php
include 'Contact.php'; 
include 'DatabaseFactory.php';

class ContactDb{
    
    public static function verbinding(){
        return DatabaseFactory::getDatabase(); 
    }
    
    public static function getAll(){
        $resultaat = self::verbinding()->voerSqlQueryUit("SELECT * FROM contactform");
        
       
        $resultatenArray = array();
       
        for($index = 0; $index < $resultaat->num_rows; $index++){
            $databaseRij = $resultaat->fetch_array();
            $resultatenArray[$index] = $databaseRij; 
        }
        return $resultatenArray; 
    }
    public static function insert($query){
        $resultaat = self::verbinding()->voerSqlQueryUit($query);
    }
    
    
}






































?>