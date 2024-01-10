<?php
require_once "C:\wamp64\www\Comparateur-Vehicule\Models\usersModel.php";
require_once "C:\wamp64\www\Comparateur-Vehicule\Views\usersView.php";

class usersController{

    private $model;
    private $view;


    public function createUserController($params){ 
        $this->model = new usersModel();
        $result=$model->createusersModel($params);   
    }
    
    public function blockUserController($params){
        $this->model = new usersModel();
        $this->model->blockusersModel($params);
    }

    public function validateUserController($params){
        $this->model = new usersModel();
        $this->model->validateUsersModel($params);
    }

    public function authenticateUserController($nom,$mdp){
        $this->model = new usersModel();
        if ($this->model->authenticateusersModel($nom,$mdp)) {
           return true;
        } else return false;
    }

    public function getAllUsersController(){
        $this->model = new usersModel();
        return $this->model->getAllUsersModel();    
    }

    public function showAdminUsersController() {
        $this->view = new usersView();
  
        $users = $this->getAllUsersController(array());
        
        require_once("C:\wamp64\www\Comparateur-Vehicule\Views\adminViews\header.php");
        echo'<h1>Gestion des Utilisateurs</h1>';
         $this->view->showUsersTableView($users);
        require_once("C:\wamp64\www\Comparateur-Vehicule\Views\adminViews\/footer.php");
        
    }
}
?>