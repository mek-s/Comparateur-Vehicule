<?php
require_once 'C:\wamp64\www\Comparateur-Vehicule\Models\newsModel.php';
require_once 'C:\wamp64\www\Comparateur-Vehicule\Views\newsView.php';
require_once "C:\wamp64\www\Comparateur-Vehicule\Views\userViews\homeView.php";

class newsController{

    private $model;
    private $view;

    public function showNewsController(){
        $home = new homeView();
        $news =$this->getAllNewsController();
        $this->view = new newsView();

        require_once("C:\wamp64\www\Comparateur-Vehicule\Views\userViews\header.php");
        $home->showMenu();
        $this->view->showNewsView($news);
        require_once("C:\wamp64\www\Comparateur-Vehicule\Views\userViews\/footer.php");
    }

    public function showNewsDeatailsController(){
        $home = new homeView();
        $this->model = new newsModel();
        $this->view = new newsView();

        $request_uri = $_SERVER['REQUEST_URI'];
        $uri_parts = parse_url($request_uri);
        parse_str($uri_parts['query'],$results);

        $params = array(
            1=> $results['news']
        );

        $news =$this->model->getNewsByIdModel($params);
        
        require_once("C:\wamp64\www\Comparateur-Vehicule\Views\userViews\header.php");
        $home->showMenu();
        $this->view->showNewsDeatilsView($news);
        require_once("C:\wamp64\www\Comparateur-Vehicule\Views\userViews\/footer.php");
    }

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
  
        $news = $this->getAllNewsController();
        
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