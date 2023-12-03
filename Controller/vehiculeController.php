<?php
require_once "C:\wamp64\www\Comparateur-Vehicule\Model\/vehiculeModel.php";

class vehiculeController{
 
    private $model;

    public function addVehiculeController($nom ,$type, $marque, $modele, $version, $annee, $long, $larg, $haut, $moteur,$perf,$consm, $image, $guide){
        $this->model = new vehiculeModel();
        $this->model->addVehiculeModel($nom ,$type, $marque, $modele, $version, $annee, $long, $larg, $haut, $moteur,$perf,$consm, $image, $guide);   
    }


}

?>