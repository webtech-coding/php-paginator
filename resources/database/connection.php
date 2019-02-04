<?php
class Connection{

    protected static $PDO;
    function __construct(){
        $this->servername='localhost';
        $this->database='organic';
        $this->username='root';
        $this->password='';
        $this->DbConnection();
    }

    private function DbConnection(){
        self::$PDO=new PDO("mysql:host={$this->servername};dbname={$this->database}",$this->username,$this->password);
        
        if(!self::$PDO){
            echo 'Database connection could not be established';
            die();
        }
    }
}

$database=new Connection();