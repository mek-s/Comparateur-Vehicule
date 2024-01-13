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

    public function authenticateUserController($params){
        $this->model = new usersModel();
        $result = $this->model->authenticateAdminModel($params);
        if ($result) {
            session_start();
            $_SESSION['authenticated'] = true;
            $_SESSION['user_id'] = $result;
            header('Location: '.'/Comparateur-Vehicule/admin');
            exit();
        } else if($result = $this->model->authenticateUserModel($params)){
            session_start();
            $_SESSION['authenticated'] = true;
            $_SESSION['user_id'] = $result;
            header('Location: '.'/Comparateur-Vehicule/');
            exit();
        } else return false;
    }

    public function logoutController(){
        session_start();
        session_unset(); 
        session_destroy(); 
        header('Location: /Comparateur-Vehicule/');
        exit();
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

    public function showUserProfilController(){
      $request_uri = $_SERVER['REQUEST_URI'];
      $uri_parts = parse_url($request_uri);
      parse_str($uri_parts['query'],$results);

      $params = array(
         1=> $results['user']
      );
  
      echo 'Page profil : '.$results['user'];
      
    }

    public function showSigninFormController(){
        $this->view = new usersView();
        $this->view->showSigninFormView();
    }

    public function showSignupFormController(){
        $this->view = new usersView();
        $this->view->showSignupFormView();
    }
}
?>