<?php
require_once "C:\wamp64\www\Comparateur-Vehicule\Views\compareView.php";
require_once "C:\wamp64\www\Comparateur-Vehicule\Views\userViews\homeView.php";
require_once "C:\wamp64\www\Comparateur-Vehicule\Models\marqueModel.php";

class compareController{

    private $view;
    private $model;
    
    // appel a la vue d'affichage de la page comparateur
    public function showComparateurController(){
      $home = new homeView();
      $this->view = new compareView();
      
      require_once("C:\wamp64\www\Comparateur-Vehicule\Views\userViews\header.php");
      $home->showMenu();
      $this->view->showComparateurView(array(),false,false);
      require_once("C:\wamp64\www\Comparateur-Vehicule\Views\userViews\/footer.php");
      
    }

    // appel a la vue d'affichage de la page comparateur d'apres home
    public function showComparController(){
      $home = new homeView();
      $this->view = new compareView();

      $request_uri = $_SERVER['REQUEST_URI'];
      $uri_parts = parse_url($request_uri);
      parse_str($uri_parts['query'],$results);

      $params = array(
          1 => $results['v1'],
          2 => $results['v2'],
          3 => $results['v3'],
          4 => $results['v4']
      );

      require_once("C:\wamp64\www\Comparateur-Vehicule\Views\userViews\header.php");
      $home->showMenu();
      $this->view->showComparateurView($params,$results['result'],true);
      require_once("C:\wamp64\www\Comparateur-Vehicule\Views\userViews\/footer.php");
    }

    // appel a la vue d'affichage des comparaisons d'un vehicule
    public function showVehiculComparaisons($params){
      $this->view = new compareView();
      $this->model = new vehiculeModel();

      $cmps = $this->model->getPopularVahicComparModel($params);
      $this->view->showComparaisonsCards($cmps);
    }

    // appel a la vue d'affichage des poplaires comparaisons 
    public function showPopularComparController(){
      $this->view = new compareView();
      $this->model = new vehiculeModel();

      $cmps = $this->model->getPopularComparModel(array());
      echo '<div class="comparaisons-zone">';
      echo '<h1>Les plus recherches</h1>';
      $this->view->showComparaisonsCards($cmps);
      echo '</div>';
    }

    // appel au model pour recuperer les marques
    public function getMarquesController(){
      $this->model = new marqueModel();
      $this->view = new compareView();

      return $this->model->getMarquesModel(array());
    }

    // appel au model pour recuperer les modeles d'une marque
    public function getModelesController($params){
      $this->model = new marqueModel();
      return $this->model->getModelesModel($params);
    }

    // appel au model pour recuperer les versions d'une marque   
    public function getVersionsController($params){
      $this->model = new marqueModel();
      return $this->model->getVersionsModel($params);
    }

    // appel au model pour recuperer une version 
    public function getVersionController($params){
      $this->model = new marqueModel();
      return $this->model->getVersionModel($params);
    }
    

}


?>