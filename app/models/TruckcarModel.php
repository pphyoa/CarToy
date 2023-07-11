<?php 

class TruckcarModel{
    private $db;
    public function __construct(){
        $this->db = new Database();
    }
    public function getTruckCar(){
        $this->db->query("SELECT * FROM truckcars ORDER BY id desc");
        return $this->db->multipleSet();
    }
    public function getTruckCarId($id){
        $this->db->query("SELECT * FROM truckcars WHERE id=:id");
        $this->db->bind(":id",$id);
        return $this->db->singleSet();
    }
    public function insertTruckCar($title,$price,$img){
        $datty=date("Y-m-d H:m:s");
        $this->db->query("INSERT INTO truckcars (title,price,img,created_at,updated_at)
        VALUES (:title,:price,:img,:created_at,:updated_at)");
        $this->db->bind(":title",$title);
        $this->db->bind(":price",$price);
        $this->db->bind(":img",$img);
        $this->db->bind(":created_at",$datty);
        $this->db->bind(":updated_at",$datty);
        return $this->db->execute();
     }
     public function updateTruckCar($id,$title,$price,$img){
        $this->db->query("UPDATE truckcars SET title=:title,price=:price,img=:img WHERE id=:id");
        $this->db->bind(":title",$title);
        $this->db->bind(":price",$price);
        $this->db->bind(":img",$img);
        $this->db->bind(":id",$id);
        return $this->db->execute();
    }
    public function deleteTruckCar($id){
        $this->db->query("DELETE FROM truckcars WHERE id=:id");
        $this->db->bind(":id",$id);
        return $this->db->execute();
    }
}