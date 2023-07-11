<?php 

class SupercarModel{
    private $db;
    public function __construct(){
        $this->db = new Database();
    }
    public function insertSuperCar($title,$price,$img){
       $datty=date("Y-m-d H:m:s");
       $this->db->query("INSERT INTO supercars (title,price,img,created_at,updated_at)
       VALUES (:title,:price,:img,:created_at,:updated_at)");
       $this->db->bind(":title",$title);
       $this->db->bind(":price",$price);
       $this->db->bind(":img",$img);
       $this->db->bind(":created_at",$datty);
       $this->db->bind(":updated_at",$datty);
       return $this->db->execute();
    }
    public function getSuperCar(){
        $this->db->query("SELECT * FROM supercars ORDER BY id DESC");
        return $this->db->multipleSet();
    }
    public function getSuperCarId($id){
        $this->db->query("SELECT * FROM supercars WHERE id=:id");
        $this->db->bind(":id",$id);
        return $this->db->singleSet();
    }
    public function updateSuperCar($id,$title,$price,$img){
        $this->db->query("UPDATE supercars SET title=:title,price=:price,img=:img WHERE id=:id");
        $this->db->bind(":title",$title);
        $this->db->bind(":price",$price);
        $this->db->bind(":img",$img);
        $this->db->bind(":id",$id);
        return $this->db->execute();
    }
    public function deleteSuperCar($id){
        $this->db->query("DELETE FROM supercars WHERE id=:id");
        $this->db->bind(":id",$id);
        return $this->db->execute();
    }
}