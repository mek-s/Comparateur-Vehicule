<?php
require_once "C:\wamp64\www\Comparateur-Vehicule\Models\marqueModel.php";
require_once "C:\wamp64\www\Comparateur-Vehicule\Models\/vehiculeModel.php";
require_once "C:\wamp64\www\Comparateur-Vehicule\Views\marqueView.php";
require_once "C:\wamp64\www\Comparateur-Vehicule\Views\userViews\homeView.php";



class marqueController{

    private $model;
    private $view;

    public function createMarqueController($params){
       $this->model = new marqueModel();
       $this->model-> createMarqueModel($params);
    }

    public function getMarquesPrincipalesController(){
       $this->model = new marqueModel();
       $principales = $this->model-> getMarquesPrincipalesModel();
       return $principales;
    }

    public function showMarquesController(){
      $this->model = new marqueModel();   
      $this->view = new marqueView();
      $home = new homeView();

      $marques = $this->model-> getMarquesModel();

      require_once("C:\wamp64\www\Comparateur-Vehicule\Views\userViews\header.php");
      $home->showMenu(); 
      $this->view->showMarquesView($marques);
      require_once("C:\wamp64\www\Comparateur-Vehicule\Views\userViews\/footer.php");
      
   }

   public function getVehiculeCaracsController($params){
      $this->model = new vehiculeModel();
      return $this->model-> getVehiculeCaracteristiquesModel($params);
   }
   
   public function showMarqueDetailsController(){
   $this->model = new marqueModel();
   $this->view = new marqueView();

   $request_uri = $_SERVER['REQUEST_URI'];
   $uri_parts = parse_url($request_uri);
   parse_str($uri_parts['query'],$results);

   $params = array(
      1=> $results['marque']
   );
   
   $marque = $this->model-> getMarqueModel($params);

   $this->model = new vehiculeModel();

   $vehicules = $this->model->getMarquesVehiculesModel($params);
   $Pvehicules = $this->model->getPrincipalesVehiculesModel($params);
      
   $this->view->showMarqueDetailsView($marque,$Pvehicules,$vehicules);

   }
}


?>