<?php 

class PoliceModel{
    private $db;
    public function __construct(){
        $this->db = new Database();
    }
    public function getPoliceCar(){
        $this->db->query("SELECT * FROM policecars ORDER BY id desc");
        return $this->db->multipleSet();
    }
    public function getPoliceCarId($id){
        $this->db->query("SELECT * FROM policecars WHERE id=:id");
        $this->db->bind(":id",$id);
        return $this->db->singleSet();
    }
    public function insertPoliceCar($title,$price,$img){
        $datty=date("Y-m-d H:m:s");
        $this->db->query("INSERT INTO policecars (title,price,img,created_at,updated_at)
        VALUES (:title,:price,:img,:created_at,:updated_at)");
        $this->db->bind(":title",$title);
        $this->db->bind(":price",$price);
        $this->db->bind(":img",$img);
        $this->db->bind(":created_at",$datty);
        $this->db->bind(":updated_at",$datty);
        return $this->db->execute();
     }
     public function updatePoliceCar($id,$title,$price,$img){
        $this->db->query("UPDATE policecars SET title=:title,price=:price,img=:img WHERE id=:id");
        $this->db->bind(":title",$title);
        $this->db->bind(":price",$price);
        $this->db->bind(":img",$img);
        $this->db->bind(":id",$id);
        return $this->db->execute();
    }
    public function deletePoliceCar($id){
        $this->db->query("DELETE FROM policecars WHERE id=:id");
        $this->db->bind(":id",$id);
        return $this->db->execute();
    }
}