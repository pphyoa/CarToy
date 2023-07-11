<?php 

class ClientModel{
    private $db;
    public function __construct(){
        $this->db = new Database();
    }
    public function getSuperCar(){
        $this->db->query("SELECT * FROM supercars ORDER BY id DESC");
        return $this->db->multipleSet();
    }
    public function getJeepCar(){
        $this->db->query("SELECT * FROM jeepcars ORDER BY id desc");
        return $this->db->multipleSet();
    }
    public function getTruckCar(){
        $this->db->query("SELECT * FROM truckcars ORDER BY id desc");
        return $this->db->multipleSet();
    }
    public function getPoliceCar(){
        $this->db->query("SELECT * FROM policecars ORDER BY id desc");
        return $this->db->multipleSet();
    }
    public function getBusCar(){
        $this->db->query("SELECT * FROM buscars ORDER BY id desc");
        return $this->db->multipleSet();
    }
    public function getDiscount(){
        $this->db->query("SELECT * FROM discount ORDER BY id desc");
        return $this->db->multipleSet();
    }
    public function getOtherCar(){
        $this->db->query("SELECT * FROM othercars ORDER BY id desc");
        return $this->db->multipleSet();
    }
}