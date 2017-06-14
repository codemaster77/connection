<?php

class Database
{
    protected $hostname;
    protected $username;
    protected $password;
    protected $database;
    protected $mijnVerbinding = null;

    public function __construct($hostname, $username, $password, $database)
    {
        $this->hostname = $hostname;
        $this->username = $username;
        $this->password = $password;
        $this->database = $database;
    }


    public function __destruct()
    {
        $this->verbreekVerbinding();
    }

    public function maakVerbindingDatabase()
    {
        $this->mijnVerbinding = new mysqli($this->hostname,$this->username,$this->password,$this->database);
            if($this->mijVerbinding->connect_error)
            {
                die("connect error");
            }
    }

    public function verbreekVerbinding()
    {
        if ($this->mijnVerbinding != null)
        {
            $this->mijnVerbinding->close();
        }
        $this->mijnVerbinding = null;
    }

    public function voerSqlQueryuit($query)
    {
        $this->maakVerbindingDatabase();
        $resultaat = $this->mijnVerbinding->query($query);

        if ($this->mijnVerbinding != null)
        {
            $this->verbreekVerbinding();
        }
        return $resultaat;
    }
}