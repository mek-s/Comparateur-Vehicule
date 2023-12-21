<?php
require_once "C:\wamp64\www\Comparateur-Vehicule\Model\/vehiculeModel.php";

class vehiculeController{
 
    private $model;

    public function addVehiculeController($params){
        $this->model = new vehiculeModel();
        $this->model->addVehiculeModel($params);   
    }


}

?>