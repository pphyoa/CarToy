<?php 


class Dbconnect{
    const DB_HOST="localhost";
    const DB_USER="root";
    const DB_PASS="";
    const DB_NAME="cartoys";
    private $con;
    private static $instance;

   private function __construct(){
      try{
        $this->con = new PDO("mysql:dbhost=".self::DB_HOST.";dbname=".self::DB_NAME,self::DB_USER,self::DB_PASS);
        $this->con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
      }catch(Exception $e){
        echo $e->getMessage();
      }
   }

   public static function getInstance(){
     if(self::$instance == null){
        self::$instance = new Dbconnect();
     }
     return self::$instance;
   }
   public function getCon(){
    return $this->con;
   }
}