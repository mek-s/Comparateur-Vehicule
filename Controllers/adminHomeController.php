<?php
require_once("C:\wamp64\www\Comparateur-Vehicule\Views\adminViews\homeView.php");
require_once("C:\wamp64\www\Comparateur-Vehicule\Views\contactsView.php");
require_once("C:\wamp64\www\Comparateur-Vehicule\Models\contactsModel.php");

class adminHomeController{

    private $view;  

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

    public function deleteContactController($params){
        $this->model = new contactsModel();
        $this->model->deleteContactModel($params);
    }

    public function updateContactController($params){

    }
}

?>