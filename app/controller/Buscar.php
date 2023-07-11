<?php 

class Buscar extends Controller{
    private $buscar;
    public function __construct(){
        $this->buscar = $this->model("BuscarModel");
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
                   if($this->buscar->insertBusCar($data['title'],$data['price'],$files['name'])){
                     redirect(URLROOT."buscar/show");
                   }else{
                    flash("buscar_fail","Insert Buscar fail! try again!");
                    redirect(URLROOT."buscar/home");
                   }
                }else{
                   $this->view("admin/buscar/home",$data);
                }
            }else{
                $this->view("admin/buscar/home",$data);
            }
        }else{
            $this->view("admin/buscar/home");
        }
    }
    public function show($data=[]){
        $data=$this->buscar->getBusCar();
        $this->view("admin/buscar/show",$data);
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
            if($this->buscar->updateBusCar($curId,$data['title'],$data['price'],$filename)){
                redirect(URLROOT."buscar/show");
            }else{
                flash("buscar_fail","BusCar price update fail! try again!");
                redirect(URLROOT."buscar/edit/".$curId);
            }

        }else{
            setCurrentId($param[0]);
            $data['edit']=$this->buscar->getBusCarId($param[0]);
            $this->view("admin/buscar/edit",$data);
        }
    }
    public function delete($data=[]){
        if($this->buscar->deleteBusCar($data[0])){
            redirect(URLROOT."buscar/show");
        }else{
            redirect(URLROOT."buscar/show");
        }
    }
}