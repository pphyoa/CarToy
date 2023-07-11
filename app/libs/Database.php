<?php 
require_once "Dbconnect.php";
class Database{
    private $stmt;
    private $con;
    public function __construct(){
        $this->con=Dbconnect::getInstance()->getCon();
    }
    public function query($qry){
       $this->stmt=$this->con->prepare($qry);
    }
    public function bind($param,$value,$type=''){
        if(empty($type))
        {
            switch($value){
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }
        }
        $this->stmt->bindValue($param, $value, $type);
    }
    public function execute(){
       return $this->stmt->execute();
    }
    public function multipleSet()
    {
        $this->stmt->execute();
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }
    public function singleSet()
    {
        $this->stmt->execute();
        return $this->stmt->fetch(PDO::FETCH_OBJ);
    }
    public function rowCount()
    {
        return $this->stmt->rowCount();
    }
    public function lastInsertId()
    {
        return $this->stmt->lastInsertId();
    }



}