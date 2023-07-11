<?php 

class Admin extends Controller{
    private $admin;
    public function __construct(){
        $this->admin = $this->model("AdminModel");
    }
    public function home(){
        $data=[
            'originalprice'=>'',
            'discountprice'=>'',
            'title'=>'',
            'img'=>'',
            'originalprice_err'=>'',
            'discountprice_err'=>'',
            'title_err'=>'',
            'img_err'=>'',
        ];
        if($_SERVER['REQUEST_METHOD'] == "POST"){
           $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
           $data['originalprice']=$_POST['originalprice'];
           $data['discountprice']=$_POST['discountprice'];
           $data['title']=$_POST['title'];
           $files=$_FILES['file'];

           if(empty($data['originalprice'])){
            $data['originalprice_err']="Original price must be supply!";
           }
           if(empty($data['title'])){
            $data['title_err'] = "Title must be supply!";
           }
           if(empty($data['discountprice'])){
            $data['discountprice_err'] = "Discount price must be supply!";
           }
           if(empty($data['img'])){
            $data['img_err'] = "Choose image must be supply!";
           }
           if(empty($data['originalprice_err']) && empty($data['discountprice_err']) && empty($data['title_err'])){
            if(!empty($files['name'])){
              move_uploaded_file($files['tmp_name'],'assets/uploads/'.$files['name']);
              if($this->admin->insertDiscount($data['originalprice'],$data['discountprice'],$data['title'],$files['name'])){
                 redirect(URLROOT."admin/show");
              }else{
                flash("discreate_fail","Insert Discount price fail! try again!");
                 redirect(URLROOT."admin/home");
              }
            }else{
                $this->view("admin/discount/home",$data);
            }
           }else{
             $this->view("admin/discount/home",$data);
           }

        }else{
            $this->view("admin/discount/home");
        }
    }
    public function show($data=[]){
        $data = $this->admin->getDiscount();
        $this->view("admin/discount/show",$data);
    }
    public function edit($param=[]){
        $data=[
            'originalprice'=>'',
            'discountprice'=>'',
            'title'=>'',
            'img'=>'',
            'originalprice_err'=>'',
            'discountprice_err'=>'',
            'title_err'=>'',
            'img_err'=>'',
        ];
        if($_SERVER['REQUEST_METHOD'] == "POST"){
           $data['originalprice']=$_POST['originalprice'];
           $data['discountprice']=$_POST['discountprice'];
           $data['title']=$_POST['title'];
           $files=$_FILES['file'];
           $filename =$_FILES['file']['name'];

           if(empty($data['originalprice'])){
            $data['originalprice_err']="Original price must be supply!";
           }
           if(empty($data['title'])){
            $data['title_err'] = "Title must be supply!";
           }
           if(empty($data['discountprice'])){
            $data['discountprice_err'] = "Discount price must be supply!";
           }
           if(empty($data['img'])){
            $data['img_err'] = "Choose image must be supply!";
           }
           if(empty($data['originalprice_err']) && empty($data['discountprice_err']) && empty($data['title_err'])){
            if(!empty($files['name'])){
              move_uploaded_file($files['tmp_name'],'assets/uploads/'.$files['name']);   
            }else{
                $filename = $_POST['old_file'];
            }
            $curId=getCurrentId();            
            deleteCurrentId();
            if($this->admin->updateDiscount($curId,$data['originalprice'],$data['discountprice'],$data['title'],$filename)){
                redirect(URLROOT."admin/show/");
            }else{
                flash("dis_fail","Discount price update fail! try again!");
                redirect(URLROOT."admin/edit/".$curId);
            }
            
           }else{
             $this->view("admin/discount/edit",$data);
           }

        }else{
            setCurrentId($param[0]);
            $data['discount']=$this->admin->getDiscountId($param[0]);
            $this->view("admin/discount/edit",$data);
        }
    }

    public function delete($data=[]){
        if($this->admin->deleteDiscount($data[0])){
            redirect(URLROOT."admin/show");
        }else{
            redirect(URLROOT."admin/show");
        }
    }

}