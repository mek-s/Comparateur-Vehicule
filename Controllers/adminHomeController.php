<?php
require_once("C:\wamp64\www\Comparateur-Vehicule\Views\adminViews\homeView.php");
require_once("C:\wamp64\www\Comparateur-Vehicule\Views\contactsView.php");
require_once("C:\wamp64\www\Comparateur-Vehicule\Views\usersView.php");
require_once("C:\wamp64\www\Comparateur-Vehicule\Models\contactsModel.php");
require_once("C:\wamp64\www\Comparateur-Vehicule\Models\usersModel.php");

class adminHomeController{

    private $view;  
    private $model;

    public function showHomeController(){
        $this->view = new adminHomeView();
        $this->view->showHome();
    }

    public function showContactsController(){
        $this->view = new contactsView();
        $this->model = new contactsModel();

        $contacts = $this->model->getContactsModel(array());
        
        require_once("C:\wamp64\www\Comparateur-Vehicule\Views\adminViews\header.php");
        $this->view->showContactsView($contacts);
        require_once("C:\wamp64\www\Comparateur-Vehicule\Views\adminViews\/footer.php");
           
    }

    public function showContactsFormController(){
        $this->view = new contactsView();
        
        require_once("C:\wamp64\www\Comparateur-Vehicule\Views\adminViews\header.php");
        $this->view->showContactsFormView();
        require_once("C:\wamp64\www\Comparateur-Vehicule\Views\adminViews\/footer.php");
           
    }

    public function createContactController($params){
        $this->model = new contactsModel();
        $this->model->createContactModel($params);
    }

    public function modifContactController($params){
        $this->model = new contactsModel();
        $this->model->modifContactModel($params);
    }

    public function deleteContactController($params){
        $this->model = new contactsModel();
        $this->model->deleteContactModel($params);
    }

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


    public function showAdminUserProfilController(){
        $this->view = new usersView();
        $this->model = new usersModel();
        
        $request_uri = $_SERVER['REQUEST_URI'];
        $uri_parts = parse_url($request_uri);
        parse_str($uri_parts['query'],$results);

        $params = array(
            1=> $results['user']
        );
    
        $user = $this->model->getUserModel($params);

        require_once("C:\wamp64\www\Comparateur-Vehicule\Views\adminViews\header.php");
        $this->view->showUserProfilView($user);
        require_once("C:\wamp64\www\Comparateur-Vehicule\Views\adminViews\/footer.php");
           
    }
}

?>