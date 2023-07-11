<?php 

class User extends Controller
{
    private $usermodel;
    public function __construct(){
        $this->usermodel = $this->model("UserModel");
    }
    public function register(){
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            $_POST=filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
            $data=[
                "name"=>$_POST['username'],
                "email"=>$_POST['email'],
                "password"=>$_POST['password'],
                "address"=>$_POST['address'],
                "phone"=>$_POST['phone'],
                "name_err"=>'',
                "email_err"=>'',
                "password_err"=>'',
                "address_err"=>'',
                "phone_err"=>'',
            ];
            if(empty($data['name'])){
                $data['name_err'] = "Please enter a valid username!";
            }
            if(empty($data['email'])){
                $data['email_err'] = "Please enter a valid email!";
            }else{
                if($this->usermodel->getUserByEmail($data['email'])){
                    $data['email_err'] = "Email is already in Use";
                }
            }
            if(empty($data['password'])){
                $data['password_err'] = "Please enter a valid Password!";
            }
            if(empty($data['address'])){
                $data['address_err'] = "Please enter a valid address!";
            }
            if(empty($data['phone'])){
                $data['phone_err'] = "Please enter a valid phone!";
            }
           
            if(empty($data['name_err']) && empty($data['email_err']) && empty($data['password_err']) && empty($data['address_err']) && empty($data['phone_err']) ){
                if($this->usermodel->register($data['name'],$data['email'],$data['password'],$data['address'],$data['phone'])){
                    $this->view("user/login");
                    flash("register_success","Congratulations, your account has been successfully created.");
                }else{
                    echo "Data insert fail";
                }
            }else{
                $this->view("user/register", $data);
            }

        }else{
            $this->view("user/register");
        }

    }
    public function login(){
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            $_POST=filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
            $data=[
                "email"=>$_POST['email'],
                "password"=>$_POST['password'],
                "confirm_password"=>$_POST['confirm_password'],
                "email_err"=>'',
                "password_err"=>'',
                "confirm_password_err"=>'',
            ];
      
            if(empty($data['email'])){
                $data['email_err'] = "Email do not match";
            }
            if(empty($data['password'])){
                $data['password_err'] = "Password do not match";
            }
            if(empty($data['confirm_password'])){
                $data['confirm_password_err'] = "Confirm password do not match";
            }else{
                if($data['confirm_password'] != $data['password']){
                    $data['confirm_password_err'] = "Confirm password do not match";
                }
            }
         
            if(empty($data['email_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])){
                $rowUser=$this->usermodel->getUserByEmail($data["email"]);
                if($rowUser){
                    $has_password=$rowUser->password;
                    if(password_verify($data['password'],$has_password)){
                        setUserSession($rowUser);
                        redirect(URLROOT.'admin/home');
                    }else{
                        flash("login_fail","User Credital Error!");
                        $this->view("user/login");
                    }
                }else{
                    $data['email_err'] = "Email Error!";
                }
            }else{
                $this->view("user/login", $data);
            }

        }else{
            $this->view("user/login");
        }
    }

    public function logout(){
        unsetSession();
        $this->view("user/login");
    }
}