<?php 

class Truckcar extends Controller{
    private $truckcar;
    public function __construct(){
        $this->truckcar = $this->model("TruckcarModel");
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
                   if($this->truckcar->insertTruckCar($data['title'],$data['price'],$files['name'])){
                     redirect(URLROOT."truckcar/show");
                   }else{
                    flash("truckcar_fail","Insert Truckcar fail! try again!");
                    redirect(URLROOT."truckcar/home");
                   }
                }else{
                   $this->view("admin/truckcar/home",$data);
                }
            }else{
                $this->view("admin/truckcar/home",$data);
            }
        }else{
            $this->view("admin/truckcar/home");
        }
    }
    public function show($data=[]){
        $data=$this->truckcar->getTruckCar();
        $this->view("admin/truckcar/show",$data);
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
            if($this->truckcar->updateTruckCar($curId,$data['title'],$data['price'],$filename)){
                redirect(URLROOT."truckcar/show");
            }else{
                flash("truckcar_fail","TruckCar price update fail! try again!");
                redirect(URLROOT."truckcar/edit/".$curId);
            }

        }else{
            setCurrentId($param[0]);
            $data['edit']=$this->truckcar->getTruckCarId($param[0]);
            $this->view("admin/truckcar/edit",$data);
        }
    }
    public function delete($data=[]){
        if($this->truckcar->deleteTruckCar($data[0])){
            redirect(URLROOT."truckcar/show");
        }else{
            redirect(URLROOT."truckcar/show");
        }
    }
}