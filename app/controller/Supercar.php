<?php 

class Supercar extends Controller{
    private $supercar;
    public function __construct(){
        $this->supercar = $this->model("SupercarModel");
    }
    public function home(){
        $data=[
            'title'=>'',
            'price'=>'',
            'img'=>'',
            'title_err'=>'',
            'price_err'=>'',
            'img_err'=>'',
        ];
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
            $data['title'] = $_POST['title'];
            $data['price'] = $_POST['price'];
            $files = $_FILES['file'];
            if(empty($data['title'])){
                $data['title_err'] = "Title must be supply!";
            }
            if(empty($data['price'])){
                $data['price_err'] = "Price must be supply!";
            }
            if(empty($data['img'])){
                $data['img_err'] = "Choose image must be supply!";
            }
            if(empty($data['title_err'] && empty($data['price_err']))){
                if(!empty($files['name'])){
                   move_uploaded_file($files['tmp_name'],'assets/uploads/'.$files['name']);
                   if($this->supercar->insertSuperCar($data['title'],$data['price'],$files['name'])){
                     redirect(URLROOT."supercar/show");
                   }else{
                    flash("supercar_fail","Insert Supercar fail! try again!");
                    redirect(URLROOT."supercar/home");
                   }
                }else{
                   $this->view("admin/supercar/home",$data);
                }
            }else{
                $this->view("admin/supercar/home",$data);
            }
        }else{
            $this->view("admin/supercar/home");
        }
    }
    public function show($data=[]){
        $data=$this->supercar->getSuperCar();
        $this->view("admin/supercar/show",$data);
    }
    public function edit($param=[]){
        $data=[
            'title'=>'',
            'price'=>'',
        ];
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            $data['title'] = $_POST['title'];
            $data['price'] = $_POST['price'];
            $files = $_FILES['file'];
            $filename = $_FILES['file']['name'];

            if(!empty($files['name'])){
                move_uploaded_file($files['tmp_name'],'assets/uploads/'.$files['name']);   
              }else{
                  $filename = $_POST['old_file'];
              }

            $curId=getCurrentId();            
            deleteCurrentId();
            if($this->supercar->updateSuperCar($curId,$data['title'],$data['price'],$filename)){
                redirect(URLROOT."supercar/show");
            }else{
                flash("dis_fail","SuperCar price update fail! try again!");
                redirect(URLROOT."supercar/edit/".$curId);
            }

        }else{
            setCurrentId($param[0]);
            $data['edit']=$this->supercar->getSuperCarId($param[0]);
            $this->view("admin/supercar/edit",$data);
        }
    }
    public function delete($data=[]){
        if($this->supercar->deleteSuperCar($data[0])){
            redirect(URLROOT."supercar/show");
        }else{
            redirect(URLROOT."supercar/show");
        }
    }
}