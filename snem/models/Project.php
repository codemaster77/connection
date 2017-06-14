<?php

class Project
{
    var $titel;
    var $subtitel;
    var $thumbnail;
    var $foto1;
    var $foto2;
    var $foto3;
    var $id;

    /**
     * Project constructor.
     * @param $titel
     * @param $subtitel
     * @param $thumbnail
     * @param $foto1
     * @param $foto2
     * @param $foto3
     */
    public function __construct($titel, $subtitel, $thumbnail, $foto1, $foto2, $foto3, $id)
    {
        $this->titel = $titel;
        $this->subtitel = $subtitel;
        $this->thumbnail = $thumbnail;
        $this->foto1 = $foto1;
        $this->foto2 = $foto2;
        $this->foto3 = $foto3;
        $this->id = $id;
    }

}

?>