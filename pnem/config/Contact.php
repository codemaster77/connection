<?php

class Contact{
    public $contactID;
    public $contactName; 
    public $contactEmail;
    public $contactWebsite; 
    public $contactComment; 
    public $contactGender; 
    
    public function __construct($contactID, $contactName, $contactEmail, $contactWebsite, $contactComment, $contactGender){
        $this->contactID = $contactID; 
        $this->contactName = $contactName ; 
        $this->contactEmail = $contactEmail; 
        $this->contactWebsite = $contactWebsite ;
        $this->contactComment = $contactComment; 
        $this->contactGender = $contactGender;
    }
        
}
























?>