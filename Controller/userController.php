<?php
require_once "C:\wamp64\www\Comparateur-Vehicule\Model\userModel.php";
require_once "C:\wamp64\www\Comparateur-Vehicule\View\userView.php";

class userController{

    private $model;

    public function createUserController($params){ 
        $this->model = new userModel();
        $result=$model->createUserModel($params);   
    }

    public function blockUserController($id){
        $this->model = new userModel();
        $this->model->blockUserModel($id);
    }

    public function confirmUserController($id){
        $this->model = new userModel();
        $this->model->confirmUserModel($id);
    }

    public function authenticateUserController($nom,$mdp){
        $this->model = new userModel();
        if ($this->model->authenticateUserModel($nom,$mdp)) {
           return true;
        } else return false;
    }

    public function getAllUsersController(){
        $this->model = new userModel();
        return $this->model->getAllUsersModel();    
    }

}
?>