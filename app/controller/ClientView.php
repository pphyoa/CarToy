<?php 

class ClientView extends Controller{
    private $client;
    public function __construct(){
        $this->client = $this->model("ClientModel");
    }
    public function supercar(){
        $data = $this->client->getSuperCar();
        $this->view("clientview/supercar",$data);
    }
    public function jeepcar(){
        $data = $this->client->getJeepCar();
        $this->view("clientview/jeepcar",$data);
    }
    public function truckcar(){
        $data = $this->client->getTruckCar();
        $this->view("clientview/truckcar",$data);
    }
    public function policecar(){
        $data = $this->client->getPoliceCar();
        $this->view("clientview/policecar",$data);
    }
    public function buscar(){
        $data = $this->client->getBusCar();
        $this->view("clientview/buscar",$data);
    }
    public function othercar(){
        $data = $this->client->getOtherCar();
        $this->view("clientview/othercar",$data);
    }
    public function discountcar(){
        $data = $this->client->getDiscount();
        $this->view("clientview/discountcar",$data);
    }
}