<?php 

class Jeepcar extends Controller{
    private $jeepcar;
    public function __construct(){
        $this->jeepcar = $this->model("JeepcarModel");
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
                   if($this->jeepcar->insertJeepCar($data['title'],$data['price'],$files['name'])){
                     redirect(URLROOT."jeepcar/show");
                   }else{
                    flash("supercar_fail","Insert Jeepcar fail! try again!");
                    redirect(URLROOT."jeepcar/home");
                   }
                }else{
                   $this->view("admin/jeepcar/home",$data);
                }
            }else{
                $this->view("admin/jeepcar/home",$data);
            }
        }else{
            $this->view("admin/jeepcar/home");
        }
    }
    public function show(){
        $data = $this->jeepcar->getJeepCar();
        $this->view("admin/jeepcar/show",$data);
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
            if($this->jeepcar->updateJeepCar($curId,$data['title'],$data['price'],$filename)){
                redirect(URLROOT."jeepcar/show");
            }else{
                flash("jeep_fail","JeepCar price update fail! try again!");
                redirect(URLROOT."jeepcar/edit/".$curId);
            }

        }else{
            setCurrentId($param[0]);
            $data['edit']=$this->jeepcar->getJeepCarId($param[0]);
            $this->view("admin/jeepcar/edit",$data);
        }
    }
    public function delete($data=[]){
        if($this->jeepcar->deleteJeepCar($data[0])){
            redirect(URLROOT."jeepcar/show");
        }else{
            redirect(URLROOT."jeepcar/show");
        }
    }
}