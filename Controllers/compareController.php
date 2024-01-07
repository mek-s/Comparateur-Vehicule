<?php
require_once "C:\wamp64\www\Comparateur-Vehicule\Views\compareView.php";
require_once "C:\wamp64\www\Comparateur-Vehicule\Models\marqueModel.php";

class compareController{

    private $view;
    private $model;
    
    public function showComparateurController(){
      $this->view = new compareView();
      $this->view->showComparateurView();
    }

    public function getMarquesController(){
      $this->model = new marqueModel();
      $this->view = new compareView();

      $params=array();
      return $this->model->getMarquesModel($params);
      // $this->view->showMarques($marques);

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