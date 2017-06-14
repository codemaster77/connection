<?php
     
     class Database {
         protected  $db; 
         protected  $username;
         protected  $wachtwoord;
         protected  $dbnaam ;
         protected  $mijnVerbinding = null;
         
         
         public function __construct ($db, $username, $wachtwoord, $dbnaam){
             $this->db = $db; 
             $this->username = $username; 
             $this->wachtwoord = $wachtwoord; 
             $this->dbnaam = $dbnaam ; 
         }
         public function __destruct (){
             
             $this->verbreekVerbinding(); 
         }
         
         protected function maakVerbindingDatabase(){
             $this->mijnVerbinding = new mysqli($this->db,$this->username, $this->wachtwoord , $this->dbnaam);
             if( $this->mijnVerbinding->connect_error){
                 die("Connect error");
             }
         }
         protected function verbreekVerbinding(){
             if($this->mijnVerbinding != null){
             $this->mijnVerbinding->close();}
             $this->mijnVerbinding = null; 
         }
         public function voerSqlQueryuit($query){
             $this->maakVerbindingDatabase();
             $resultaat = $this->mijnVerbinding->query($query);
             
            if($this->mijnVerbinding != null){
            $this->verbreekVerbinding(); } 
            
            return $resultaat;
         }
     }
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     ?>