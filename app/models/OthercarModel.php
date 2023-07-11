<?php 

class OthercarModel{
    private $db;
    public function __construct(){
        $this->db = new Database();
    }
    public function getOtherCar(){
        $this->db->query("SELECT * FROM othercars ORDER BY id desc");
        return $this->db->multipleSet();
    }
    public function getOtherCarId($id){
        $this->db->query("SELECT * FROM othercars WHERE id=:id");
        $this->db->bind(":id",$id);
        return $this->db->singleSet();
    }
    public function insertOtherCar($title,$price,$img){
        $datty=date("Y-m-d H:m:s");
        $this->db->query("INSERT INTO othercars (title,price,img,created_at,updated_at)
        VALUES (:title,:price,:img,:created_at,:updated_at)");
        $this->db->bind(":title",$title);
        $this->db->bind(":price",$price);
        $this->db->bind(":img",$img);
        $this->db->bind(":created_at",$datty);
        $this->db->bind(":updated_at",$datty);
        return $this->db->execute();
     }
     public function updateOtherCar($id,$title,$price,$img){
        $this->db->query("UPDATE othercars SET title=:title,price=:price,img=:img WHERE id=:id");
        $this->db->bind(":title",$title);
        $this->db->bind(":price",$price);
        $this->db->bind(":img",$img);
        $this->db->bind(":id",$id);
        return $this->db->execute();
    }
    public function deleteOtherCar($id){
        $this->db->query("DELETE FROM othercars WHERE id=:id");
        $this->db->bind(":id",$id);
        return $this->db->execute();
    }
}