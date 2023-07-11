<?php 

class UserModel{
    private $db;
    public function __construct(){
        $this->db=new Database();
    }
    public function getAllUser(){
        $this->db->query("SELECT * FROM users");
        return $this->db->multipleSet();
    }
    public function register($name,$email,$password,$address,$phone){
        $password = password_hash($password,PASSWORD_BCRYPT);
        $this->db->query("INSERT INTO users (username,email,password,address,phone)
        VALUES (:name,:email,:password,:address,:phone)");
        $this->db->bind(":name",$name);
        $this->db->bind(":email",$email);
        $this->db->bind(":password",$password);
        $this->db->bind(":address",$address);
        $this->db->bind(":phone",$phone);
        return $this->db->execute();
    }

    public function getUserByEmail($email){
        $this->db->query("SELECT * FROM users WHERE email=:email");
        $this->db->bind(":email",$email);
        $row = $this->db->singleSet();
        if(empty($row)){
            return false;
        }else{
            return $row;
        }
    }

}