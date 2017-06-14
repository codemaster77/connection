<?php
include 'Projecten.php'; 
include 'DatabaseFactory.php';

class ProjectDb{
    
    public static function verbinding(){
        return DatabaseFactory::getDatabase(); 
    }
    
    public static function getAll($start_from , $limit){
        if(isset($start_from) && isset($limit)){
        $resultaat = self::verbinding()->voerSqlQueryUit("SELECT * FROM projecten order by ID ASC LIMIT  $start_from , $limit ");
        }
        else{
            $resultaat = self::verbinding()->voerSqlQueryUit("SELECT * FROM projecten ");
        }
        $resultatenArray = array();
       
        for($index = 0; $index < $resultaat->num_rows; $index++){
            $databaseRij = $resultaat->fetch_array();
            $resultatenArray[$index] = $databaseRij; 
        }
        return $resultatenArray; 
    }
    public static function getByID($id){
        $resultaat = self::verbinding()->voerSqlQueryUit("SELECT * FROM Projecten WHERE ID='".$id."'");
        $resultatenArray = array(); 
        if($resultaat->num_rows == 1){
        for($index = 0; $index < $resultaat->num_rows; $index++){
            $databaseRij = $resultaat->fetch_array(); 
            $resultatenArray[$index] = $databaseRij; 
        }
        }
        else{
            $resultatenArray = false; 
        }
        
        return $resultatenArray;
    }
    
}






































?>