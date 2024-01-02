<?php
require_once("C:\wamp64\www\Comparateur-Vehicule\Views\adminViews\homeView.php");

class adminHomeController{

    private $view;  

    public function showHomeController(){
        $this->view = new adminHomeView();
        $this->view->showHome();
    }
}

?>