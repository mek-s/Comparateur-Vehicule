<?php
require_once 'C:\wamp64\www\Comparateur-Vehicule\Models\newsModel.php';
require_once 'C:\wamp64\www\Comparateur-Vehicule\Views\newsView.php';

class newsController{

    private $model;
    private $view;

    public function createNewsController($params){
        $this->model = new newsModel();
        $this->model->createNewsModel($params);
    }

    public function getAllNewsController(){
        $this->model = new newsModel();
        return $this->model->getAllNewsModel(array());
    }

    public function deleteNewsController($params){
        $this->model = new newsModel();
        $this->model->deleteNewsModel($params);
    }

    public function updateNewsController($params){

    }

    public function showAdminNewsController() {
        $this->view = new newsView();
  
        $news = $this->getAllNewsController(array());
        
        require_once("C:\wamp64\www\Comparateur-Vehicule\Views\adminViews\header.php");
         $this->view->showNewsTableView($news);
        require_once("C:\wamp64\www\Comparateur-Vehicule\Views\adminViews\/footer.php");
        
    }

    public function showNewsFormController(){
        $this->view = new newsView();

        require_once("C:\wamp64\www\Comparateur-Vehicule\Views\adminViews\header.php");
        $this->view->showNewsFormView();
        require_once("C:\wamp64\www\Comparateur-Vehicule\Views\adminViews\/footer.php");
       
    }
}
?>