<?php
require_once("C:\wamp64\www\Comparateur-Vehicule\Views\userViews\homeView.php");
require_once("C:\wamp64\www\Comparateur-Vehicule\Models\contactsModel.php");

class userHomeController{

    private $view;  
    private $model;

    public function showHomeController(){
        $this->view = new homeView();
        $this->view->showHome();
    }

    public function showContactPageController(){
        $this->view = new homeView();
        $this->view->showContactPage();
    }

    public function getContactsController(){
        $this->model = new contactsModel();
        return $this->model->getContactsModel(array());
    }
}

?>