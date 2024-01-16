<?php
require_once "C:\wamp64\www\Comparateur-Vehicule\Models\marqueModel.php";
require_once "C:\wamp64\www\Comparateur-Vehicule\Models\/vehiculeModel.php";
require_once "C:\wamp64\www\Comparateur-Vehicule\Views\marqueView.php";
require_once "C:\wamp64\www\Comparateur-Vehicule\Views\userViews\homeView.php";



class marqueController{

    private $model;
    private $view;

    // appel au model pour creer une nouvelle marque
    public function createMarqueController($params){
       $this->model = new marqueModel();
       $this->model-> createMarqueModel($params);
    }

    // appel au model pour supprimer une marque
    public function deleteMarqueController($params){
      $this->model = new marqueModel();
       $this->model-> deleteMarqueModel($params);
    }

    // appel au model pour modifier une  marque
    public function modifMarqueController($params){
      $this->model = new marqueModel();
      $this->model-> modifMarqueModel($params);
   }

   // appel au model pour recuperer les marques
   public function getMarquesController(){
       $this->model = new marqueModel();
       return $this->model-> getMarquesModel(array());
   }

    // appel au model pour recuperer les modeles d'une marque
    public function getModelesController($id){
      $this->model = new marqueModel();
      $params = array(1=> $id); 
      return $this->model->getModelesModel($params);
    }


    // appel au model pour recuperer les marques principales 
    public function getMarquesPrincipalesController(){
      $this->model = new marqueModel();
      return  $this->model-> getMarquesPrincipalesModel(array());
    }

    // appel au model pour recuperer la note d'une marque
   public function getMarqueNoteController($id){
      $this->model = new marqueModel();
      $params = array(1=> $id);  
      return $this->model->getMarqueNoteModel($params);
   }

    // appel a la vue d'affichage de la page marques 
    public function showMarquesController(){
      $this->model = new marqueModel();   
      $this->view = new marqueView();
      $home = new homeView();

      $marques = $this->getMarquesController();

      require_once("C:\wamp64\www\Comparateur-Vehicule\Views\userViews\header.php");
      $home->showMenu(); 
      $this->view->showMarquesView($marques);
      require_once("C:\wamp64\www\Comparateur-Vehicule\Views\userViews\/footer.php");
      
   }
   
   // appel a la vue d'affichage de la page details d'une marque
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

   // appel a la vue d'affichage de la page marque pour admin
   public function showAdminMarqueController(){
      
      $this->view = new marqueView();
      $marques = $this->getMarquesController(array());
      
      require_once("C:\wamp64\www\Comparateur-Vehicule\Views\adminViews\header.php");
       $this->view->showMarquesTableView($marques);
      require_once("C:\wamp64\www\Comparateur-Vehicule\Views\adminViews\/footer.php");
      
    
   }

   // appel a la vue d'affichage du formulaire de creation d'une marque
   public function showMarqueFormController(){
      $this->view = new marqueView();

      require_once("C:\wamp64\www\Comparateur-Vehicule\Views\adminViews\header.php");
       $this->view->showMarqueFormView();
      require_once("C:\wamp64\www\Comparateur-Vehicule\Views\adminViews\/footer.php");
  
   }

   // appel a la vue d'affichage du formulaire de modification d'une marque
   public function showModifMarqueFormController(){
      $this->view = new marqueView();
      $this->model = new marqueModel();
   
      $request_uri = $_SERVER['REQUEST_URI'];
      $uri_parts = parse_url($request_uri);
      parse_str($uri_parts['query'],$results);

      $params = array(
         1=> $results['marque']
      );

      $marque = $this->model-> getMarqueModel($params);

      require_once("C:\wamp64\www\Comparateur-Vehicule\Views\adminViews\header.php");
      $this->view->modifMarqueView($marque);
      require_once("C:\wamp64\www\Comparateur-Vehicule\Views\adminViews\/footer.php");
      
   }

}


?>