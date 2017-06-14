<?php

class Projecten{
    public $projectID;
    public $projectTitel; 
    public $projectSubTitel;
    public $projectThumbnail; 
    public $projectFoto; 
    
    public function __construct($projectID, $projectTitel, $projectThumbnail, $projectSubTitel, $projectFoto){
        $this->projectID = $projectID; 
        $this->projectTitel = $projectTitel ; 
        $this->projectThumbnail = $projectThumbnail; 
        $this->projectSubTitel = $projectSubTitel ;
        $this->projectFoto = $projectFoto; 
    }
        
}
























?>