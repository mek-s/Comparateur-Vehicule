<?php
require_once "C:\wamp64\www\Comparateur-Vehicule\Models\/vehiculeModel.php";
require_once "C:\wamp64\www\Comparateur-Vehicule\Views\/vehiculeView.php";

class vehiculeController{
 
    private $model;
    private $view;

    // afficher le formulaire de creation de vehicule
    public function showVehiculeFormController(){
      $this->view = new vehiculeView();

      require_once("C:\wamp64\www\Comparateur-Vehicule\Views\adminViews\header.php");
       $this->view->addVehiculeView();
      require_once("C:\wamp64\www\Comparateur-Vehicule\Views\adminViews\/footer.php");
    }
    
    // creer un nouvel vehicule
    public function createVehiculeController($params){
        $this->model = new vehiculeModel();
        return $this->model->createVehiculeModel($params);   
    }

    // supprimer un vehicule
    public function deleteVehiculeController($params){
      $this->model = new vehiculeModel();
      $this->model-> deleteVehiculeModel($params);
    }

    // enregistrer les caracteristiques du nouvel vehicule
    public function createVehiculeCaracsController($params){
      $this->model = new vehiculeModel();
      return $this->model->createVehiculeCaracsModel($params);
    }

    // retourne toutes les caracteristiques
    public function getCaracsController(){
      $params= array();
      
      $this->model = new vehiculeModel();
      return $this->model-> getCaracteristiquesModel($params);
    }

    // retourne les caracteristiques d'un vehicule
    public function getVehiculeCaracsController($params){
      $this->model = new vehiculeModel();
      return $this->model-> getVehiculeCaracteristiquesModel($params);
    }

    // retourne un vehicule by id
    public function getVehiculeController($params){
      $this->model = new vehiculeModel();
      return $this->model-> getVehiculeModel($params);
    }
    
    // retourne un vehicule by version id
    public function getVehicByVersionController($params){
      $this->model = new vehiculeModel();
      return $this->model-> getVehiculeByVersionModel($params);
    }

    //retourne tous les vehicules d'une marque
    public function getVehiculesByMarque($params){
      $this->model = new vehiculeModel();
      return $this->model->getMarquesVehiculesModel($params);
    }

    public function getCategoriesController(){
      $params= array();
      
      $this->model = new vehiculeModel();
      return $this->model-> getCategoriesModel($params);
    }

    // afficher le details du vehicule
    public function showVehiculeDetailsController(){
      $this->model = new vehiculeModel();
      $this->view = new vehiculeView();

      $request_uri = $_SERVER['REQUEST_URI'];
      $uri_parts = parse_url($request_uri);
      parse_str($uri_parts['query'],$results);
   
      $params = array(
         1=> $results['vehicule']
      );
     
      $vehicule = $this-> getVehiculeController($params);
      $note = $this->model-> getVehiculeNoteModel($params);
      $caracs = $this->model->getVehiculeCaracteristiquesModel($params);

      $home = new homeView();

      require_once("C:\wamp64\www\Comparateur-Vehicule\Views\userViews\header.php");
      $home->showMenu();
      $this->view->showVehiculeDetailsView($vehicule,$note,$caracs);

      require_once("C:\wamp64\www\Comparateur-Vehicule\Views\userViews\/footer.php"); 
    }    

    // afficher la page vehicule pour admin
    public function showAdminVehiculeController() {
      $this->model = new vehiculeModel();
      $this->view = new vehiculeView();

      $request_uri = $_SERVER['REQUEST_URI'];
      $uri_parts = parse_url($request_uri);
      parse_str($uri_parts['query'],$param);

      $params= array(1=> $param['marque']);
      $vehicules = $this->getVehiculesByMarque($params);
      
      require_once("C:\wamp64\www\Comparateur-Vehicule\Views\adminViews\header.php");
       $this->view->showVehiculeTableView($vehicules);
      require_once("C:\wamp64\www\Comparateur-Vehicule\Views\adminViews\/footer.php");
      
    }

    // afficher details vehicule pour admin
    public function showAdminVehiculeDetailsController(){
      $this->model = new vehiculeModel();
      $this->view = new vehiculeView();

      $request_uri = $_SERVER['REQUEST_URI'];
      $uri_parts = parse_url($request_uri);
      parse_str($uri_parts['query'],$results);

      $params = array(
        1=> $results['vehicule']
     );
    
     $vehicule = $this-> getVehiculeController($params);
     $note = $this->model-> getVehiculeNoteModel($params);
     $caracs = $this->model->getVehiculeCaracteristiquesModel($params);
   
     require_once("C:\wamp64\www\Comparateur-Vehicule\Views\adminViews\header.php");
     echo '<h1>Details vehicule</h1>';
     $this->view->showVehiculeDetailsView($vehicule,$note,$caracs);
     require_once("C:\wamp64\www\Comparateur-Vehicule\Views\adminViews\/footer.php");

      
    }

    public function showModifVehiculeFormController(){
      $request_uri = $_SERVER['REQUEST_URI'];
      $uri_parts = parse_url($request_uri);
      parse_str($uri_parts['query'],$results);

      $params = array(
         1=> $results['vehicule']
      );

      echo 'modifier vehicule : '.$results['vehicule'];
    }

}

?>