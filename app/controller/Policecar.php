<?php 

class Policecar extends Controller{
    private $policecar;
    public function __construct(){
        $this->policecar = $this->model("PoliceModel");
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
                   if($this->policecar->insertPoliceCar($data['title'],$data['price'],$files['name'])){
                     redirect(URLROOT."policecar/show");
                   }else{
                    flash("policecar_fail","Insert Policecar fail! try again!");
                    redirect(URLROOT."policecar/home");
                   }
                }else{
                   $this->view("admin/policecar/home",$data);
                }
            }else{
                $this->view("admin/policecar/home",$data);
            }
        }else{
            $this->view("admin/policecar/home");
        }
    }
    public function show($data=[]){
        $data=$this->policecar->getPoliceCar();
        $this->view("admin/policecar/show",$data);
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
            if($this->policecar->updatePoliceCar($curId,$data['title'],$data['price'],$filename)){
                redirect(URLROOT."policecar/show");
            }else{
                flash("policecar_fail","PoliceCar price update fail! try again!");
                redirect(URLROOT."policecar/edit/".$curId);
            }

        }else{
            setCurrentId($param[0]);
            $data['edit']=$this->policecar->getPoliceCarId($param[0]);
            $this->view("admin/policecar/edit",$data);
        }
    }
    public function delete($data=[]){
        if($this->policecar->deletePoliceCar($data[0])){
            redirect(URLROOT."policecar/show");
        }else{
            redirect(URLROOT."policecar/show");
        }
    }
}