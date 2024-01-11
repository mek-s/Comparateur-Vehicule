<?php
require_once("C:\wamp64\www\Comparateur-Vehicule\Views\userViews\homeView.php");
require_once("C:\wamp64\www\Comparateur-Vehicule\Views\contactsView.php");
require_once("C:\wamp64\www\Comparateur-Vehicule\Models\contactsModel.php");

class userHomeController{

    private $view;  
    private $model;

    public function showHomeController(){
        $this->view = new homeView();
        $this->view->showHome();
    }

    public function showContactPageController(){
        $this->view = new contactsView();
        $home = new homeView();

        require_once("C:\wamp64\www\Comparateur-Vehicule\Views\userViews\header.php");
        $home->showMenu();
        $this->view->showContactPage();
        require_once('C:\wamp64\www\Comparateur-Vehicule\Views\userViews\footer.php');
    }

    public function getContactsController(){
        $this->model = new contactsModel();
        return $this->model->getContactsModel(array());
    }
}

?>