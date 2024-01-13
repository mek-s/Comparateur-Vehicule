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
      $this->view->showComparateurView();
      require_once("C:\wamp64\www\Comparateur-Vehicule\Views\userViews\/footer.php");
      
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
    
    public function showComparResultController(){
      
    }
}


?>