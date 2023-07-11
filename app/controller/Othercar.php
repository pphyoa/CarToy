<?php 

class Othercar extends Controller{
    private $othercar;
    public function __construct(){
        $this->othercar = $this->model("OthercarModel");
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
                   if($this->othercar->insertOtherCar($data['title'],$data['price'],$files['name'])){
                     redirect(URLROOT."othercar/show");
                   }else{
                    flash("othercar_fail","Insert Othercar fail! try again!");
                    redirect(URLROOT."othercar/home");
                   }
                }else{
                   $this->view("admin/othercar/home",$data);
                }
            }else{
                $this->view("admin/othercar/home",$data);
            }
        }else{
            $this->view("admin/othercar/home");
        }
    }
    public function show($data=[]){
        $data=$this->othercar->getOtherCar();
        $this->view("admin/othercar/show",$data);
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
            if($this->othercar->updateOtherCar($curId,$data['title'],$data['price'],$filename)){
                redirect(URLROOT."othercar/show");
            }else{
                flash("Othercar_fail","OtherCar price update fail! try again!");
                redirect(URLROOT."othercar/edit/".$curId);
            }

        }else{
            setCurrentId($param[0]);
            $data['edit']=$this->othercar->getOtherCarId($param[0]);
            $this->view("admin/othercar/edit",$data);
        }
    }
    public function delete($data=[]){
        if($this->othercar->deleteOtherCar($data[0])){
            redirect(URLROOT."othercar/show");
        }else{
            redirect(URLROOT."othercar/show");
        }
    }
}