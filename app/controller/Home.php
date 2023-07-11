<?php 

class Home extends Controller{
    private $adminmodel;
    public function __construct(){
        $this->adminmodel = $this->model("AdminModel");
    }
    public function index(){
        $data = $this->adminmodel->getDiscount();
        $this->view("home/index",$data);
    }
}