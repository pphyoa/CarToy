<?php 

class Post extends Controller{
    public function __construct(){
        echo "I am constructor method of ".__CLASS__."<br>";
    }
    public function index($data=[]){
        echo "I am index method of ".__CLASS__."<br>";
        echo "<pre>".print_r($data,true)."</pre>";
    }
}