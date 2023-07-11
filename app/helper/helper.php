<?php 

session_start();

function redirect($page){
    header("location:".$page);
}
function flash($name='',$message=''){
    if(!empty($name)){
        if(!empty($message)){
            if(isset($_SESSION[$name])){
                unset($_SESSION[$name]);
            }
            $_SESSION[$name] = $message;
        }else{
           if(isset($_SESSION[$name])){
            echo "
           <div class='alert alert-danger alert-dismissible fade show' role='alert'>
              ".$_SESSION[$name]."
              <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
           </div>";
            unset($_SESSION[$name]);
           }
        }
    }
}

function setUserSession($user){
    $_SESSION['currentUser'] = $user;
}
function getUserSession(){
    if(isset($_SESSION['currentUser'])){
        return $_SESSION['currentUser'];
    }
}
function unsetSession(){
    unset($_SESSION['currentUser']);
}

function setCurrentId($value)
{
    if(isset($_SESSION['curId']))
    {
        unset($_SESSION['curId']);
    }
    $_SESSION['curId'] = $value;
}
function getCurrentId()
{
    if(isset($_SESSION['curId']))
    {
        return $_SESSION['curId'];
    }
}
function deleteCurrentId()
{
    if(isset($_SESSION['curId']))
    {
        unset($_SESSION['curId']);
    }
}