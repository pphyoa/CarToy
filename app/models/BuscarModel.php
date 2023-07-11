<?php 

class BuscarModel{
    private $db;
    public function __construct(){
        $this->db = new Database();
    }
    public function getBusCar(){
        $this->db->query("SELECT * FROM buscars ORDER BY id desc");
        return $this->db->multipleSet();
    }
    public function getBusCarId($id){
        $this->db->query("SELECT * FROM buscars WHERE id=:id");
        $this->db->bind(":id",$id);
        return $this->db->singleSet();
    }
    public function insertBusCar($title,$price,$img){
        $datty=date("Y-m-d H:m:s");
        $this->db->query("INSERT INTO buscars (title,price,img,created_at,updated_at)
        VALUES (:title,:price,:img,:created_at,:updated_at)");
        $this->db->bind(":title",$title);
        $this->db->bind(":price",$price);
        $this->db->bind(":img",$img);
        $this->db->bind(":created_at",$datty);
        $this->db->bind(":updated_at",$datty);
        return $this->db->execute();
     }
     public function updateBusCar($id,$title,$price,$img){
        $this->db->query("UPDATE buscars SET title=:title,price=:price,img=:img WHERE id=:id");
        $this->db->bind(":title",$title);
        $this->db->bind(":price",$price);
        $this->db->bind(":img",$img);
        $this->db->bind(":id",$id);
        return $this->db->execute();
    }
    public function deleteBusCar($id){
        $this->db->query("DELETE FROM buscars WHERE id=:id");
        $this->db->bind(":id",$id);
        return $this->db->execute();
    }
}