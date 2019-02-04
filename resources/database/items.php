<?php
include('connection.php');

class Products extends Connection{

    private $sql;

    public function __construct(){
         }

    public function get_Items($limit,$offset){
        $sql="SELECT * FROM products LIMIT {$limit} OFFSET {$offset}";
        $prepare=self::$PDO->prepare($sql);
        $stm=$prepare->execute();
        return $prepare->fetchAll();
    }

    public function count_Items(){

       
        $prepare=self::$PDO->prepare('SELECT * FROM products');
        $prepare->execute();
        
        return $prepare->rowCount();
               
    }

}

