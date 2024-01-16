<?php
require_once "C:\wamp64\www\Comparateur-Vehicule\Views\compareView.php";
require_once "C:\wamp64\www\Comparateur-Vehicule\Views\userViews\homeView.php";
require_once "C:\wamp64\www\Comparateur-Vehicule\Models\marqueModel.php";

class compareController{

    private $view;
    private $model;
    
    public function showComparateurController(){
      $home = new homeView();
      $this->view = new compareView();
      
      require_once("C:\wamp64\www\Comparateur-Vehicule\Views\userViews\header.php");
      $home->showMenu();
      $this->view->showComparateurView(array());
      require_once("C:\wamp64\www\Comparateur-Vehicule\Views\userViews\/footer.php");
      
    }

    public function showComparController(){
      $home = new homeView();
      $this->view = new compareView();

      $request_uri = $_SERVER['REQUEST_URI'];
      $uri_parts = parse_url($request_uri);
      parse_str($uri_parts['query'],$results);

      $params = array(
          1 => $results['v1'],
          2 => $results['v2']
      );

      require_once("C:\wamp64\www\Comparateur-Vehicule\Views\userViews\header.php");
      $home->showMenu();
      $this->view->showComparateurView($params);
      require_once("C:\wamp64\www\Comparateur-Vehicule\Views\userViews\/footer.php");
    }

    public function showVehiculComparaisons($params){
      $this->view = new compareView();
      $this->model = new vehiculeModel();

      $cmps = $this->model->getPopularVahicComparModel($params);
      $this->view->showComparaisonsCards($cmps);
    }

    public function showPopularComparController(){
      $this->view = new compareView();
      $this->model = new vehiculeModel();

      $cmps = $this->model->getPopularComparModel(array());
      echo '<div class="comparaisons-zone">';
      echo '<h1>Les plus recherches</h1>';
      $this->view->showComparaisonsCards($cmps);
      echo '</div>';
    }

    public function getMarquesController(){
      $this->model = new marqueModel();
      $this->view = new compareView();

      $params=array();
      return $this->model->getMarquesModel($params);
    }

    public function getModelesController($params){
      $this->model = new marqueModel();
      return $this->model->getModelesModel($params);
    }
        
    public function getVersionsController($params){
      $this->model = new marqueModel();
      return $this->model->getVersionsModel($params);
    }
    public function getVersionController($params){
      $this->model = new marqueModel();
      return $this->model->getVersionModel($params);
    }
    

}


?>