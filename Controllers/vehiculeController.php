<?php
require_once "C:\wamp64\www\Comparateur-Vehicule\Models\/vehiculeModel.php";
require_once "C:\wamp64\www\Comparateur-Vehicule\Views\/vehiculeView.php";

class vehiculeController{
 
    private $model;

    public function addVehiculeController($params){
        $this->model = new vehiculeModel();
        $this->model->addVehiculeModel($params);   
    }

    public function showVehiculeDetailsController(){
      $this->model = new vehiculeModel();
      $this->view = new vehiculeView();

      $request_uri = $_SERVER['REQUEST_URI'];
      $uri_parts = parse_url($request_uri);
      parse_str($uri_parts['query'],$results);
   
      $params = array(
         1=> $results['vehicule']
      );
     
      $vehicule = $this->model-> getVehiculeModel($params);
      $note = $this->model-> getVehiculeNoteModel($params);
      $caracs = $this->model->getVehiculeCaracteristiquesModel($params);
        
      $this->view->showVehiculeDetailsView($vehicule,$note,$caracs);
    }


}

?>