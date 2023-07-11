<?php 

class AdminModel{
    private $db;
    public function __construct(){
        $this->db=new Database();
    }
    public function getDiscount(){
        $this->db->query("SELECT * FROM discount ORDER BY id desc");
        return $this->db->multipleSet();
    }
    public function getDiscountId($id){
        $this->db->query("SELECT * FROM discount WHERE id=:id");
        $this->db->bind(":id",$id);
        return $this->db->singleSet();
    }
    public function updateDiscount($id,$originalprice,$discountprice,$title,$img){
        $this->db->query("UPDATE discount SET originalprice=:originalprice,discountprice=:discountprice,title=:title,img=:img WHERE id=:id");
        $this->db->bind(":originalprice",$originalprice);
        $this->db->bind(":discountprice",$discountprice);
        $this->db->bind(":title",$title);
        $this->db->bind(":img",$img);
        $this->db->bind(":id",$id);
        return $this->db->execute();
    }
    public function deleteDiscount($id){
        $this->db->query("DELETE FROM discount WHERE id=:id");
        $this->db->bind(":id",$id);
        return $this->db->execute();
    }
    public function insertDiscount($originalprice,$discountprice,$title,$img){
        $datty = date("Y-m-d H:m:s");
        $this->db->query("INSERT INTO discount (originalprice,discountprice,title,img,created_at,updated_at)
        VALUES (:originalprice,:discountprice,:title,:img,:created_at,:updated_at)");
        $this->db->bind(":originalprice",$originalprice);
        $this->db->bind(":discountprice",$discountprice);
        $this->db->bind(":title",$title);
        $this->db->bind(":img",$img);
        $this->db->bind(":created_at",$datty);
        $this->db->bind(":updated_at",$datty);
        return $this->db->execute();
    }
    
}