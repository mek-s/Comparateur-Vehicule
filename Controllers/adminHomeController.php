<?php
require_once("C:\wamp64\www\Comparateur-Vehicule\Views\adminViews\homeView.php");
require_once("C:\wamp64\www\Comparateur-Vehicule\Views\contactsView.php");
require_once("C:\wamp64\www\Comparateur-Vehicule\Views\usersView.php");
require_once("C:\wamp64\www\Comparateur-Vehicule\Models\contactsModel.php");
require_once("C:\wamp64\www\Comparateur-Vehicule\Models\usersModel.php");

class adminHomeController{

    private $view;  
    private $model;


    // appel a la vue d'affichage du home
    public function showHomeController(){
        $this->view = new adminHomeView();
        $this->view->showHome();
    }
       
    // afficher profil utilisateur pour admin
    public function showAdminUserProfilController(){
        $this->view = new usersView();
        $this->model = new usersModel();
        
        // recuperer les parametres de l'url
        $request_uri = $_SERVER['REQUEST_URI'];
        $uri_parts = parse_url($request_uri);
        parse_str($uri_parts['query'],$results);

        $params = array(1=> $results['user']);
    
        $user = $this->model->getUserModel($params);
        $vehics = $this->model->getUserVehiculesModel(array(1=> $user['user_id']));

        require_once("C:\wamp64\www\Comparateur-Vehicule\Views\adminViews\header.php");
        $this->view->showUserProfilView($user,$vehics);
        require_once("C:\wamp64\www\Comparateur-Vehicule\Views\adminViews\/footer.php");
           
    }


    /*******************gestion des contacts ********************/
    // appel a la vue d'affichage des contacts
    public function showContactsController(){
        $this->view = new contactsView();
        $this->model = new contactsModel();

        $contacts = $this->model->getContactsModel(array());
        
        require_once("C:\wamp64\www\Comparateur-Vehicule\Views\adminViews\header.php");
        $this->view->showContactsTableView($contacts);
        require_once("C:\wamp64\www\Comparateur-Vehicule\Views\adminViews\/footer.php");
           
    }

    // appel a la vue d'affichage du formulaire de craetion d'un contact
    public function showContactsFormController(){
        $this->view = new contactsView();
        
        require_once("C:\wamp64\www\Comparateur-Vehicule\Views\adminViews\header.php");
        $this->view->showContactsFormView();
        require_once("C:\wamp64\www\Comparateur-Vehicule\Views\adminViews\/footer.php");
           
    }

    //appel a la vue d'affichage du formulaire de modification
    public function modifContactsFormController(){
        $this->model = new contactsModel();
        $this->view = new contactsView();

        $request_uri = $_SERVER['REQUEST_URI'];
        $uri_parts = parse_url($request_uri);
        parse_str($uri_parts['query'],$results);

        $params = array(
            1 => $results['contact']
        );

        $contact = $this->model->getContactModel($params);
        require_once("C:\wamp64\www\Comparateur-Vehicule\Views\adminViews\header.php");
        $this->view->modifContactsFormView($contact);  
        require_once("C:\wamp64\www\Comparateur-Vehicule\Views\adminViews\/footer.php");
    }

    // appel au model pour creer un contact 
    public function createContactController($params){
        $this->model = new contactsModel();
        $this->model->createContactModel($params);
    }

    // appel au model pour modifier un contact 
    public function modifContactController($params){
        $this->model = new contactsModel();
        $this->model->modifContactModel($params);
    }

    // appel au model pour supprimer un contact 
    public function deleteContactController($params){
        $this->model = new contactsModel();
        $this->model->deleteContactModel($params);
    }
}

?>