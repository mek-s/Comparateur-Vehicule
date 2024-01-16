<?php
require_once "C:\wamp64\www\Comparateur-Vehicule\Models\usersModel.php";
require_once "C:\wamp64\www\Comparateur-Vehicule\Views\usersView.php";
require_once "C:\wamp64\www\Comparateur-Vehicule\Views\userViews\homeView.php";

class usersController{

    private $model;
    private $view;


    // appel au model pour creer un utilisateur
    public function createUserController($params){ 
        $this->model = new usersModel();
        $result = $this->model->createUserModel($params);
        if ($result) {
            $_SESSION['auth_u'] = true;
            $_SESSION['user_id'] = $result;
            header('Location: '.'/Comparateur-Vehicule/');
            exit();        
        }
    }
    
    // appel au model pour bloquer un utilisateur
    public function blockUserController($params){
        $this->model = new usersModel();
        $this->model->blockUserModel($params);
    }

    // appel au model pour valider un utilisateur
    public function validateUserController($params){
        $this->model = new usersModel();
        $this->model->validateUsersModel($params);
    }

    // appel au model pour authentifier un utilisateur
    public function authenticateUserController($params){
        $this->model = new usersModel();
        $result = $this->model->authenticateAdminModel($params);
        if ($result) {
            
            $_SESSION['auth_a'] = true;
            $_SESSION['user_id'] = $result;
            header('Location: '.'/Comparateur-Vehicule/admin');
            exit();
        } else if($result = $this->model->authenticateUserModel($params)){
           
            $_SESSION['auth_u'] = true;
            $_SESSION['user_id'] = $result;
            header('Location: '.'/Comparateur-Vehicule/');
            exit();
        } else return false;
    }

    // appel au model pour deconnecter un utilisateur
    public function logoutController(){
        session_unset(); 
        session_destroy(); 
        header('Location: /Comparateur-Vehicule/');
        exit();
    }

    // appel au model pour recuperer tous les utilisateurs
    public function getAllUsersController(){
        $this->model = new usersModel();
        return $this->model->getAllUsersModel(array());    
    }

    // appel a la vue d'affichage de la page utilisateur
    public function showAdminUsersController() {
        $this->view = new usersView();
  
        $users = $this->getAllUsersController(array());
        
        require_once("C:\wamp64\www\Comparateur-Vehicule\Views\adminViews\header.php");
        echo'<h1>Gestion des Utilisateurs</h1>';
         $this->view->showUsersTableView($users);
        require_once("C:\wamp64\www\Comparateur-Vehicule\Views\adminViews\/footer.php");
        
    }

    // appel a la vue d'affichage du profil utilisateur
    public function showUserProfilController(){
        $this->view = new usersView();
        $this->model = new usersModel();
        $home = new homeView();

      $request_uri = $_SERVER['REQUEST_URI'];
      $uri_parts = parse_url($request_uri);
      parse_str($uri_parts['query'],$results);

      $params = array(
         1=> $results['user']
      );
 
      $user = $this->model->getUserModel($params);
      $vehics = $this->model->getUserVehiculesModel(array(1=> $user['user_id']));

      require_once("C:\wamp64\www\Comparateur-Vehicule\Views\userViews\header.php");
      $home->showMenu();
      $this->view->showUserProfilView($user,$vehics);
      require_once("C:\wamp64\www\Comparateur-Vehicule\Views\userViews\/footer.php");
    

    }

    // appel a la vue d'affichage du formulaire de connexion
    public function showSigninFormController(){
        $this->view = new usersView();
        $home = new homeView();
        
        require_once("C:\wamp64\www\Comparateur-Vehicule\Views\userViews\header.php");
        $home->showMenu();
        $this->view->showSigninFormView();
        require_once("C:\wamp64\www\Comparateur-Vehicule\Views\userViews\/footer.php");
    }

    // appel a la vue d'affichage du formulaire d'inscription
    public function showSignupFormController(){
        $this->view = new usersView();
        $home = new homeView();

        require_once("C:\wamp64\www\Comparateur-Vehicule\Views\userViews\header.php");
        $home->showMenu();
        $this->view->showSignupFormView();
        require_once("C:\wamp64\www\Comparateur-Vehicule\Views\userViews\/footer.php");
    }
}
?>