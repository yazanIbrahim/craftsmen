<?php


class Dbc{

    private $db = null;
    private $serverName = "localhost";
    private $userName   = "root";
    private $password   = "";
    private $dbName     = "craft";


    public function __construct(){
        try{
            $this->db = new PDO("mysql:host={$this->serverName};dbname={$this->dbName};charset=utf8",$this->userName,$this->password);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


            return $this->db;
        }catch(PDOException $e){
            echo "Connection failed: " . $e->getMessage();
        }

    }

    public function getConn(){
        return $this->db;
    }






}