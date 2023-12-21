<?php
require_once("C:\wamp64\www\Comparateur-Vehicule\Views\userViews\homeView.php");

class homeController{

    private $view;

    public function showHomeController(){
        $this->view = new homeView();
        $this->view->showHome();
    }
}

?>