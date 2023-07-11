<?php 

class JeepcarModel{
    private $db;
    public function __construct(){
        $this->db = new Database();
    }
    public function getJeepCar(){
        $this->db->query("SELECT * FROM jeepcars ORDER BY id desc");
        return $this->db->multipleSet();
    }
    public function getJeepCarId($id){
        $this->db->query("SELECT * FROM jeepcars WHERE id=:id");
        $this->db->bind(":id",$id);
        return $this->db->singleSet();
    }
    public function insertJeepCar($title,$price,$img){
        $datty=date("Y-m-d H:m:s");
        $this->db->query("INSERT INTO jeepcars (title,price,img,created_at,updated_at)
        VALUES (:title,:price,:img,:created_at,:updated_at)");
        $this->db->bind(":title",$title);
        $this->db->bind(":price",$price);
        $this->db->bind(":img",$img);
        $this->db->bind(":created_at",$datty);
        $this->db->bind(":updated_at",$datty);
        return $this->db->execute();
     }
     public function updateJeepCar($id,$title,$price,$img){
        $this->db->query("UPDATE jeepcars SET title=:title,price=:price,img=:img WHERE id=:id");
        $this->db->bind(":title",$title);
        $this->db->bind(":price",$price);
        $this->db->bind(":img",$img);
        $this->db->bind(":id",$id);
        return $this->db->execute();
    }
    public function deleteJeepCar($id){
        $this->db->query("DELETE FROM jeepcars WHERE id=:id");
        $this->db->bind(":id",$id);
        return $this->db->execute();
    }
}