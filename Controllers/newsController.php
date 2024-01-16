<?php
require_once 'C:\wamp64\www\Comparateur-Vehicule\Models\newsModel.php';
require_once 'C:\wamp64\www\Comparateur-Vehicule\Views\newsView.php';
require_once "C:\wamp64\www\Comparateur-Vehicule\Views\userViews\homeView.php";

class newsController{

    private $model;
    private $view;

    /**************** les controlleurs de l'utilisateur ********************/

    // appel a la vue d'affichage de la page news
    public function showNewsController(){
        $home = new homeView();
        $news =$this->getAllNewsController();
        $this->view = new newsView();

        require_once("C:\wamp64\www\Comparateur-Vehicule\Views\userViews\header.php");
        $home->showMenu();
        $this->view->showNewsView($news);
        require_once("C:\wamp64\www\Comparateur-Vehicule\Views\userViews\/footer.php");
    }

    // appel a la vue d'affichage de la page details de news
    public function showNewsDetailsController(){
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

    /*********************** les controlleurs de l'admin ***********************/

    // appel au model pour creer un news
    public function createNewsController($params){
        $this->model = new newsModel();
        $this->model->createNewsModel($params);
    }

    // appel au model pour recuperer tous les news
    public function getAllNewsController(){
        $this->model = new newsModel();
        return $this->model->getAllNewsModel(array());
    }

    // appel au model pour supprimer un news
    public function deleteNewsController($params){
        $this->model = new newsModel();
        $this->model->deleteNewsModel($params);
    }

    // appel au model pour modifier un news
    public function modifNewsController($params){
        $this->model = new newsModel();
        $this->model->modifNewsModel($params);
    }

    // appel a la vue d'affichage de la page news pour admin
    public function showAdminNewsController() {
        $this->view = new newsView();
  
        $news = $this->getAllNewsController();
        
        require_once("C:\wamp64\www\Comparateur-Vehicule\Views\adminViews\header.php");
         $this->view->showNewsTableView($news);
        require_once("C:\wamp64\www\Comparateur-Vehicule\Views\adminViews\/footer.php");
        
    }

    // appel a la vue d'affichage du formulaire de creation de news
    public function showNewsFormController(){
        $this->view = new newsView();

        require_once("C:\wamp64\www\Comparateur-Vehicule\Views\adminViews\header.php");
        $this->view->showNewsFormView();
        require_once("C:\wamp64\www\Comparateur-Vehicule\Views\adminViews\/footer.php");
       
    }

    // appel a la vue d'affichage du formulaire de modification de news
    public function showModifNewsController(){
        $this->view = new newsView();
        $this->model = new newsModel();
     

      $request_uri = $_SERVER['REQUEST_URI'];
      $uri_parts = parse_url($request_uri);
      parse_str($uri_parts['query'],$results);

      $params = array(
         1=> $results['news']
      );

      $news = $this->model-> getNewsByIdModel($params);

        require_once("C:\wamp64\www\Comparateur-Vehicule\Views\adminViews\header.php");
        $this->view->showModifNewsView($news);
        require_once("C:\wamp64\www\Comparateur-Vehicule\Views\adminViews\/footer.php");
       
    }
}
?>