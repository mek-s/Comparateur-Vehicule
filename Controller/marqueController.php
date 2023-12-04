<?php
require_once "C:\wamp64\www\Comparateur-Vehicule\Model\marqueModel.php";

class marqueController{

    private $model;

    public function createMarqueController($params){
       $this->model = new marqueModel();
       $this->model-> createMarqueModel($params);
    }
}


?>