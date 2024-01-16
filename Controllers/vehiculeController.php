<?php
require_once "C:\wamp64\www\Comparateur-Vehicule\Models\/vehiculeModel.php";
require_once "C:\wamp64\www\Comparateur-Vehicule\Views\/vehiculeView.php";

class vehiculeController{
 
    private $model;
    private $view;


    /*************** les controlleurs de l'admin **********************/
    // appel a la vue d'affichage du formulaire de creation de vehicule
    public function showVehiculeFormController(){
      $this->view = new vehiculeView();

      $request_uri = $_SERVER['REQUEST_URI'];
      $uri_parts = parse_url($request_uri);
      parse_str($uri_parts['query'],$results);

      require_once("C:\wamp64\www\Comparateur-Vehicule\Views\adminViews\header.php");
       $this->view->showVehiculeFormView($results['marque'],$results['version'],$results['show']);
      require_once("C:\wamp64\www\Comparateur-Vehicule\Views\adminViews\/footer.php");
    }
    // appel a la vue d'affichage de la page vehicule pour admin
    public function showAdminVehiculeController() {
      $this->model = new vehiculeModel();
      $this->view = new vehiculeView();

      $request_uri = $_SERVER['REQUEST_URI'];
      $uri_parts = parse_url($request_uri);
      parse_str($uri_parts['query'],$param);

      $params= array(1=> $param['marque']);
      $vehicules = $this->getVehiculesByMarque($params);
      
      require_once("C:\wamp64\www\Comparateur-Vehicule\Views\adminViews\header.php");
       $this->view->showVehiculeTableView($vehicules,$param['marque']);
      require_once("C:\wamp64\www\Comparateur-Vehicule\Views\adminViews\/footer.php");
      
    }

   // appel a la vue d'affichage des details vehicule pour admin
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

    // appel a la vue d'affichage du formulaire de modification d'un vehicule
    public function showModifVehiculeFormController(){
      $this->model = new vehiculeModel();
      $this->view = new vehiculeView();

      $request_uri = $_SERVER['REQUEST_URI'];
      $uri_parts = parse_url($request_uri);
      parse_str($uri_parts['query'],$results);

      $params = array(
         1=> $results['vehicule']
      );

      $vehicule = $this->model-> getVehiculeModel($params);
      $this->view->modifVehiculeView($vehicule,$results['marque']);
      
    }

    
    // appel au model pour creer un nouvel vehicule
    public function createVehiculeController($params){
        $this->model = new vehiculeModel();
        return $this->model->createVehiculeModel($params);   
    }

     // appel au model pour modifier un vehicule
      public function modifVehiculeController($params){
        $this->model = new vehiculeModel();
        $this->model->modifVehiculeModel($params);   
    }

    // appel au model pour  supprimer un vehicule
    public function deleteVehiculeController($params){
      $this->model = new vehiculeModel();
      $this->model-> deleteVehiculeModel($params);
    }

    // appel au model pour enregistrer les caracteristiques du nouvel vehicule
    public function createVehiculeCaracsController($params){
      $this->model = new vehiculeModel();
      return $this->model->createVehiculeCaracsModel($params);
    }

    // appel au model pour enregistrer les caracteristiques du nouvel vehicule
    public function modifVehiculeCaracsController($params){
      $this->model = new vehiculeModel();
      return $this->model->modifVehiculeCaracsModel($params);
    }


   // appel au model pour recuperer  toutes les caracteristiques
    public function getCaracsController(){
      $this->model = new vehiculeModel();
      return $this->model-> getCaracteristiquesModel(array());
    }

    // appel au model pour recuperer les caracteristiques d'un vehicule
    public function getVehiculeCaracsController($params){
      $this->model = new vehiculeModel();
      return $this->model-> getVehiculeCaracteristiquesModel($params);
    }

    // appel au model pour recuperer un vehicule by id
    public function getVehiculeController($params){
      $this->model = new vehiculeModel();
      return $this->model-> getVehiculeModel($params);
    }
    
    // appel au model pour recuperer un vehicule by version id
    public function getVehicByVersionController($params){
      $this->model = new vehiculeModel();
      return $this->model-> getVehiculeByVersionModel($params);
    }

    // appel au model pour recuperer les infos d'un vehicule
    public function getVehicCmpInfosController($params){
      $this->model = new vehiculeModel();
      return $this->model-> getVehicCmpInfosModel($params);
    }

    // appel au model pour recuperer tous les vehicules d'une marque
    public function getVehiculesByMarque($params){
      $this->model = new vehiculeModel();
      return $this->model->getMarquesVehiculesModel($params);
    }

    // appel au model pour recuperer les categories 
    public function getCategoriesController(){
      $this->model = new vehiculeModel();
      return $this->model-> getCategoriesModel(array());
    }

    // appel au model pour recuperer les caracteristiques d'une categorie 
    public function getCaracsByCategController($params){
      $this->model = new vehiculeModel();
      return $this->model->getCaracsByCategModel($params);
    }

    // appel a la vue d'affichage des details du vehicule
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

    // appel au model pour creer une comparaison
    public function createComparaisonController($params){
      $this->model = new vehiculeModel();
      $this->model-> createComparaisonModel($params);
    }

    // appel au model pour recuperer l'image d'un vehicule
    public function getVehiculeImageController($params){
      $this->model = new vehiculeModel();
      return $this->model-> getVehiculeImageModel($params);
    }

    // appel au model pour ajouter un vehicule favoris d'un utilisateur
    public function ajouterFavorisController($params){
      $this->model = new vehiculeModel();
      return $this->model-> ajouterFavorisModel($params);
    }

}

?>