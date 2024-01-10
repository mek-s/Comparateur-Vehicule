<?php
require_once "C:\wamp64\www\Comparateur-Vehicule\Views\avisView.php";
require_once "C:\wamp64\www\Comparateur-Vehicule\Models\avisModel.php";

class avisController{

    private $view;
    private $model;

    // afficher la page avis pour admin
    public function showAdminAvisController() {
      $this->model = new avisModel();
      $this->view = new avisView();

      $avis = $this->model->getAllAvisModel(array());
      
      require_once("C:\wamp64\www\Comparateur-Vehicule\Views\adminViews\header.php");
       $this->view->showAvisTableView($avis);
      require_once("C:\wamp64\www\Comparateur-Vehicule\Views\adminViews\/footer.php");
      
    }

    public function validateAvisController($params){
      $this->model = new avisModel();
      $this->model->validateAvisModel($params);
    }

    public function refuseAvisController($params){
      $this->model = new avisModel();
      $this->model->refuseAvisModel($params);
    }
}